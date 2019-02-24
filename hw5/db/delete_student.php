<?php
/*
 * Author: Kumar Nitesh
 * Description: DELETE Student database operations
*/

$query = 'DELETE FROM sk_students WHERE studentID = :studentID';

$statement = $db->prepare($query);
$statement->bindValue(':studentID', $studentID);
$success = $statement->execute();
$statement->closeCursor();