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
$my_connect = mysql_connect("mysql", $user_db, $pass_db) or die("�������ö�Դ��Ͱҹ��������");

//select the  database
mysql_select_db($database, $my_connect);
//echo "�Դ��Ͱҹ������������";

error_reporting(E_ALL ^ E_NOTICE);
mysql_query("SET time_zone = '+7:00'", $my_connect);
mysql_query("SET character_set_results=utf8", $my_connect);
mysql_query("SET collation_connection=utf8_general_ci", $my_connect);
mysql_query("SET NAMES 'utf8'", $my_connect);
?>
