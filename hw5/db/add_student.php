<?php
/*
 * Author: Kumar Nitesh
 * Description: Insert statement for Students
*/

$query = 'INSERT INTO sk_students (courseID, firstName, lastName, email) VALUES (:courseID, :firstName, :lastName, :email)';

$statement = $db->prepare($query);
$statement->bindValue(':courseID', $courseID);
$statement->bindValue(':firstName', $firstName);
$statement->bindValue(':lastName', $lastName);
$statement->bindValue(':email', $email);
$statement->execute();
$statement->closeCursor();