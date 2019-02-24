<?php
/*
 * Author: Kumar Nitesh
 * Description: Add new Student to a given course
*/

// Get the student data from POST body and sanitize it before saving
    $courseID = filter_input(INPUT_POST, 'courseID',FILTER_SANITIZE_STRING);
    $firstName = filter_input(INPUT_POST, 'firstName',FILTER_SANITIZE_STRING);
    $lastName = filter_input(INPUT_POST, 'lastName',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email');

// Validate inputs, and in case of missing required data show error page
    if ($courseID == null || $firstName == false || $lastName == null || $email == null) {
        $error = "Invalid student data. Check all fields and try again.";
        include('./common/error.php');
    } else {
        //Get the database connection object
        require_once('./db/database.php');
        //add student
        include_once('./db/add_student.php');
        // Display Updated Student List page
        include('index.php');

    }