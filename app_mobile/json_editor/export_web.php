<?php
include_once("config.php");

$id="";
if(isset($_GET['id'])) $id=$_GET['id'];
if($id=="") exit;


$q_json=mysqli_query($link,"SELECT `data` FROM `json` WHERE `id` = '$id' LIMIT 1");
$q_data=mysqli_fetch_assoc($q_json);

echo $q_data['data'];
?>