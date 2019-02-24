<?php
/*
 * Author: Kumar Nitesh
 * Description: Handle Adding a new course
*/

// Get the course name and course Id from Post data, sanitize and save it in database
$courseName = filter_input(INPUT_POST, 'courseName',FILTER_SANITIZE_STRING);
$courseId = filter_input(INPUT_POST, 'courseID',FILTER_SANITIZE_STRING);

// Validate inputs, In case of missing required data show error page
if ($courseName == null || $courseId == null) {
    $error = "Invalid course data. Check all fields and try again.";
    include('./common/error.php');
} else {
    //Get the database object
    require_once('./db/database.php');
    //save new course to database
    include_once('./db/add_course.php');
    // Display the updated Course List page
    include('course_list.php');
}