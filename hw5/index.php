<?php
    /*
     * Author: Kumar Nitesh
     * Description: Application Home Page - By default, tt displays the Course Manager -> Courses List and Student Listed for the Very first
     * Course in the Course list.
    */


    // Get the PDO object
    require_once('./db/database.php');

    //If CourseId is provided, get its value, sanitize for harmful characters and assign it to CourseId
    if (!isset($courseID)) {
        $courseID = filter_input(INPUT_GET, 'courseID',FILTER_SANITIZE_STRING);
    }

    //Get the list of all courses
    include('./db/get_all_courses.php');
    // If no courseId is passed in the querystring, get the very first courseId from the course List
    if ($courseID == NULL || $courseID == FALSE) {
    $courseID = $courses[0]['courseID'];
    }
    // Get the name of the selected course based on the $courseID above
    include('./db/get_name_of_selected_course.php');
    // Get the list of all student for the above courseId
    include('./db/get_student_selected_course.php');

 ?>

<!--Add Common page header-->
<?php include('./common/header.php');?>

<!-- Body Content-->
    <div class="row">
        <!-- display a list of categories -->
        <div class="col s12 m4">
            <h5>Courses</h5>
            <div>
                <ul  class="collection">
                    <?php foreach ($courses as $course) : ?>
                        <li class="collection-item">
                            <a href="./?courseID=<?php echo $course['courseID']; ?>">
                                <?php echo $course['courseName']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <!--  display list of students      -->
        <div class="col s12 m8">
            <div class="col s12">
            <!-- display a table of products -->
                <h5 class="center">Student List</h5>
                <div class="card z-depth-1">
                    <div class="card-content">
                        <span class="card-title"><?php echo $courseName; ?></span>
                        <?php if (sizeof($students) > 0) :?>
                        <table class="responsive-table">
                            <tr>
                                <th>FirstName</th>
                                <th>LastName</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr>
                                <?php foreach ($students as $student) : ?>
                                    <tr>
                                        <td><?php echo $student['firstName']; ?></td>
                                        <td><?php echo $student['lastName']; ?></td>
                                        <td><?php echo $student['email']; ?></td>
                                        <td>
                                            <form action="delete_student.php" method="post">
                                                <input type="hidden" name="studentID" value="<?php echo $student['studentID']; ?>">
                                                <input type="hidden" name="courseID" value="<?php echo $student['courseID']; ?>">
                                                <button type="submit" class='btn btn-flat'value="delete" name="delete">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                        <?php else: ?>
                        <label> No student found for this course. Please add student by clicking on 'Add Student'.</label>
                        <?php endif; ?>

                    </div>
                    <div class="card-action" style="margin-top: 5px;">
                        <a href="add_student_form.php" class="btn">
                            Add Student</a>
                        <a href="course_list.php" class="btn right">List Course</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


<!-- Add Common Footer-->

<?php include('./common/footer.php');?>