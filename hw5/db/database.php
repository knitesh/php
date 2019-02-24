<?php
/*
 * Author: Kumar Nitesh
 * Description: Database connection object creation file.
*/

// Define the connection string for Localhost MYSQL
// $dsn ='mysql:host=localhost;dbname=cs602';

//Define the connection for free MYSQL remote server
$dsn ='mysql:host=www.db4free.net:3306;dbname=cs602_php';

// Credentials for connecting to the database
$username ='cs602_user';
$password = 'cs602_secret';

// Try created the PDO object, in case of error display the error page and exit.
try{
    $db = new PDO($dsn,$username,$password);
}catch(PDOException $e){
    $error_message =$e->getMessage();
    include('database_error.php');
    exit();
}
