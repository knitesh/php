<?php
/*
 * Author: Kumar Nitesh
 * Description: GET name of a course based on courseId
*/


$queryCourse = 'SELECT * FROM sk_courses  WHERE courseID = :courseID';

$statement1 = $db->prepare($queryCourse);
$statement1->bindValue(':courseID', $courseID);
$statement1->execute();
$course = $statement1->fetch();
$courseName = $course['courseName'];
$statement1->closeCursor();