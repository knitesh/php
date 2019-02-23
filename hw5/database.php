<?php
/**
 * Created by PhpStorm.
 * User: Knitesh
 * Date: 2019-02-17
 * Time: 18:59
 */
$dsn ='mysql:host=localhost;dbname=cs602';
$username ='cs602_user';
$password = 'cs602_secret';

try{
    $db = new PDO($dsn,$username,$password);
}catch(PDOException $e){
    $error_message =$e->getMessage();
    include('database_error.php');
    exit();
}
