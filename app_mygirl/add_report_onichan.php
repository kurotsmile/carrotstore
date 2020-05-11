<?php
include "../config.php";
include "../database.php";

$type=$_POST['type'];
$sel_report=$_POST['sel_report'];
$id_question=$_POST['id_question'];
$type_question=$_POST['type_question'];
$id_device=$_POST['id_device'];
$limit_chat=$_POST['limit_chat'];
$os='unclear';
if(isset($_POST['os'])){ $os=$_POST['os'];}
$value_report=mysql_real_escape_string($_POST['value_report']);
$lang=$_POST['lang'];
$msql_query=mysql_query("INSERT INTO `app_my_girl_report` (`type`, `sel_report`, `value_report`, `id_question`, `type_question`,`id_device`,`limit_chat`,`lang`,`os`) VALUES ('$type', '$sel_report', '$value_report', '$id_question', '$type_question','$id_device','$limit_chat','$lang','$os');");
echo "yes";