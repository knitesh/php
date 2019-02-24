<?php
/*
 * Author: Kumar Nitesh
 * Description: GET all courses
*/

// Get all courses
$query = 'SELECT * FROM sk_courses ORDER BY courseID';

$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();