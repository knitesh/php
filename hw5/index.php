<?php
require_once('database.php');

// Get courseId
if (!isset($courseID)) {
    $courseID = filter_input(INPUT_GET, 'courseID');

}



// Get all courses
$query = 'SELECT * FROM sk_courses
                       ORDER BY courseID';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();

if ($courseID == NULL || $courseID == FALSE) {
    $courseID = $courses[0]['courseID'];
}


$statement->closeCursor();


// Get name for selected course
$queryCourse = 'SELECT * FROM sk_courses
                  WHERE courseID = :courseID';
$statement1 = $db->prepare($queryCourse);
$statement1->bindValue(':courseID', $courseID);
$statement1->execute();
$course = $statement1->fetch();
//echo $queryCourse;
//echo $courseID ;
//echo $course['courseName'];
$courseName = $course['courseName'];
$statement1->closeCursor();

// Get students  for selected category
$queryStudents = 'SELECT * FROM sk_students
                  WHERE courseID = :courseID
                  ORDER BY studentID';
$statement3 = $db->prepare($queryStudents);
$statement3->bindValue(':courseID', $courseID);
$statement3->execute();
$students = $statement3->fetchAll();
$statement3->closeCursor();
?>
<?php include('header.php');?>
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
    </div>

<?php include('footer.php');?>