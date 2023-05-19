<?php
$mysql_host='localhost';
$mysql_pass='';
$mysql_user='root';
$mysql_database='php_test';

$conn = mysqli_connect($mysql_host, $mysql_user,$mysql_pass);
if ($conn) {
    //echo 'Connection is successfully';
}else{
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($conn,$mysql_database);
mysqli_set_charset($conn,"utf8");
mysqli_query($conn,"SET NAMES 'utf8';"); 
mysqli_query($conn,"SET CHARACTER SET 'utf8';"); 
mysqli_query($conn,"SET SESSION collation_connection = 'utf8_general_ci';"); 
include "layouts.php";
?>