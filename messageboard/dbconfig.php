<?php
//Set all of the database login information:
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "PHPAdvClassSpring2016";

//Attempt to connect to the database:
try
{
        //http://www.w3schools.com/php/php_mysql_connect.asp
        //Try connecting to the database:
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
//PDO exception in case it does not connect:
catch(PDOException $e)
{       //Give the user a exception message signifying that the database is unreachable currently:
	echo $e->getMessage();
}


//The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is class.crud.php :
include_once 'class.crud.php';
//The include_once() statement can be used to include a php file in another one, when you may need to include the called file more than once. In this case the file is class.crud.php :
include_once 'class.pcrud.php';


//Creates a new object and allows the DB_con varaible to use it and then stores it all in a new varaible:
$crud = new crud($DB_con);
//Creates a new object and allows the DB_con varaible to use it and then stores it all in a new varaible:
$pcrud = new pcrud($DB_con);

?>