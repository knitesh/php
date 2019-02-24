<?php
/*
 * Author: Kumar Nitesh
 * Description:  Page to handle Delete Student
*/

require_once('./db/database.php');

// Get IDs
$studentID = filter_input(INPUT_POST, 'studentID');
$courseID = filter_input(INPUT_POST, 'courseID');


if (isset($_POST['delete'])) {
// Delete the product from the database
    if ($studentID != false && $courseID != false) {
        include('./db/delete_student.php');
    }
}

// Display the Product List page
include('index.php');