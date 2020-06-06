<?php
$link = mysqli_connect($mysql_host, $mysql_user,$mysql_pass);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
mysqli_select_db($link,$mysql_database);
mysqli_set_charset($link,"utf8");
mysqli_query($link,"SET NAMES 'utf8';"); 
mysqli_query($link,"SET CHARACTER SET 'utf8';"); 
mysqli_query($link,"SET SESSION collation_connection = 'utf8_general_ci';"); 
?>