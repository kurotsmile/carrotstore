<?php
include_once("config.php");

$id="";
if(isset($_GET['id'])) $id=$_GET['id'];
if($id=="") exit;


$q_json=mysqli_query($link,"SELECT `data`,`name` FROM `json` WHERE `id` = '$id' LIMIT 1");
$q_data=mysqli_fetch_assoc($q_json);
$q_name=$q_data["name"];

header('Content-disposition: attachment; filename='.$q_name.'.json');
header('Content-type: application/json');
echo $q_data['data'];
?>