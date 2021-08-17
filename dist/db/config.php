<?php
mysqli_report(MYSQLI_REPORT_STRICT);
try{
    $connect = new mysqli('localhost', 'root', '', 'persanv1');
    //$connect = new mysqli('localhost', 'root', 'root', 'persanv1');

}catch(Exception $e){
    echo 'ERROR:'.$e->getMessage();
}
/* //Host name of the MySQL server.
$host = 'localhost';

//MySQL account username
$user = 'root';

//MySQL account password.
$passwd = '';

//The default schema you want to use.
$db = 'persanv1';

//The PDO object.
$pdo = NULL;

//Connection string, or "data source name".
$dsn = 'mysql:host=' . $host . ';dbname=' . $db;

//Connection inside a try/catch block.
try
{  
   //PDO object creation.
   $pdo = new PDO($dsn, $user,  $passwd);
   
   //Enable exceptions on errors. 
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
   //If there is an error, an exception is thrown.
   echo 'Database connection failed.';
   die();
} */
?>