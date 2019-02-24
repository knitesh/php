<?php
/*
 * Author: Kumar Nitesh
 * Description: Display Course List
*/

    //Get database Object
    require('./db/database.php');
    //Get list of all courses
    include ('./db/get_all_courses.php');
    // Display page header
    include('./common/header.php');

 ?>
<!--HTML Page to Display Course List and Add Course FORM-->
<div class="row">
    <div class="col s12 right">
        <a href="index.php" class="btn-large waves-effect waves-light">List Students</a></p>
<!--        <a class="btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>-->
    </div>
</div>
<div class="row">
    <div class="card col s12 m6">
        <div class="card-content">
            <span class="card-title center">Course List</span>

            <table class="striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                <!-- add code for the rest of the table here -->
                <?php foreach ($courses as $course) : ?>
                    <tr>
                        <td><?php echo $course['courseID']; ?></td>
                        <td><?php echo $course['courseName']; ?></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
    <div class="card col s12 offset-m1 m5">
        <form action="add_course.php" method="POST" id="add_course_form">
            <div class="card-content">
                <span class="card-title">Add Course</span>
                <!-- add code for the form here -->

                    <div class="input-field col s12">
                        <input  id="courseID" name="courseID" type="text" class="validate" required>
                        <label for="courseID">Course Id</label>
                    </div>
                    <div class="input-field col s12">
                        <input  id="courseName" name="courseName" type="text" class="validate" required>
                        <label for="courseName">Course Name</label>
                    </div>

            </div>
            <div class="card-action col s12">
                <button type="submit" class="btn btn-small right" value="Add Course">Submit</button>
            </div>
        </form>

    </div>

</div>

<!-- Display page footer-->
<?php include('./common/footer.php');?>

