<?php
include "config.php";
include "database.php";
$type='';
$value='';
$ip='';
if(isset($_GET['id'])){
    $value=$_GET['id'];
    $type='input';
}

if(isset($_GET['txt'])){
    $value=$_GET['txt'];
    $type='voice';
}
$query_add_log=mysqli_query($link,"INSERT INTO `log` (`ip`, `type`, `value`) VALUES ('1', '$type', '$value');");
?>