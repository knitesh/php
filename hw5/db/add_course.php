<?php
/*
 * Author: Kumar Nitesh
 * Description: Insert statement for Courses
*/

// Add the product to the database
$query = 'INSERT INTO sk_courses  (courseId,courseName)  VALUES (:courseId,:courseName)';

$statement = $db->prepare($query);
$statement->bindValue(':courseId', $courseId);
$statement->bindValue(':courseName', $courseName);
$statement->execute();
$statement->closeCursor();