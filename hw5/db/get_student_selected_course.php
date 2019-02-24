<?php
/*
 * Author: Kumar Nitesh
 * Description: Get List of Student for a given CourseId
*/


$queryStudents = 'SELECT * FROM sk_students   WHERE courseID = :courseID ORDER BY studentID';

$statement3 = $db->prepare($queryStudents);
$statement3->bindValue(':courseID', $courseID);
$statement3->execute();
$students = $statement3->fetchAll();
$statement3->closeCursor();