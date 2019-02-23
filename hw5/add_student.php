<?php


// Get the product data
    $courseID = filter_input(INPUT_POST, 'courseID');
    $firstName = filter_input(INPUT_POST, 'firstName');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');

// Validate inputs
    if ($courseID == null || $firstName == false || $lastName == null || $email == null) {
        $error = "Invalid student data. Check all fields and try again.";
        include('error.php');
    } else {
        require_once('database.php');

        // Add the product to the database
        $query = 'INSERT INTO sk_students
                 (courseID, firstName, lastName, email)
              VALUES
                 (:courseID, :firstName, :lastName, :email)';
        $statement = $db->prepare($query);
        $statement->bindValue(':courseID', $courseID);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();

        // Display the Student List page
        include('index.php');

}