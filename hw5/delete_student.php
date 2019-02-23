<?php
require_once('database.php');

// Get IDs
$studentID = filter_input(INPUT_POST, 'studentID');
$courseID = filter_input(INPUT_POST, 'courseID');
if (isset($_POST['delete'])) {
// Delete the product from the database
    if ($studentID != false && $courseID != false) {
        $query = 'DELETE FROM sk_students
              WHERE studentID = :studentID';
        $statement = $db->prepare($query);
        $statement->bindValue(':studentID', $studentID);
        $success = $statement->execute();
        $statement->closeCursor();
    }
}

// Display the Product List page
include('index.php');