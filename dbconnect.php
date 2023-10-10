<?php


$database = 'db_tutor';
$user_db = 'naruemol';
$pass_db = 'Op4A^U~x';

/*
$database = 'tutor';
$user_db = 'root';
$pass_db = '123456';

$database = 'db_tutor';
$user_db = "db_appregis";
$pass_db = "sFfkU38wWOwYz44HLJwV";
*/
// connect to  mysql server
#$my_connect = mysql_connect("mysql", $user_db, $pass_db) or die("ไม่สามารถติดต่อฐานข้อมูลได้");
$my_connect = mysqli_connect("mysql", $user_db, $pass_db, $database) or die("Error " . mysqli_error($my_connect));

//select the  database
#mysql_select_db($database, $my_connect);
//echo "ติดต่อฐานข้อมูลได้แล้ว";

error_reporting(E_ALL ^ E_NOTICE);
mysqli_query($my_connect, "SET time_zone = '+7:00'");
mysqli_query($my_connect, "SET character_set_results=utf8");
mysqli_query($my_connect, "SET collation_connection=utf8_general_ci");
mysqli_query($my_connect, "SET NAMES 'utf8'");

global $my_connect;
?>
