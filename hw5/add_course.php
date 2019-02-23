<?php
// Get the category data
$courseName = filter_input(INPUT_POST, 'courseName');
$courseId = filter_input(INPUT_POST, 'courseID');

// Validate inputs
if ($courseName == null || $courseId == null) {
    $error = "Invalid course data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database
    $query = 'INSERT INTO sk_courses
                 (courseId,courseName)
              VALUES
                 (:courseId,:courseName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':courseId', $courseId);
    $statement->bindValue(':courseName', $courseName);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('course_list.php');
}