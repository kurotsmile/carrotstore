<?php
include "config.php";
include "database.php";
$type='';
$value='';


if(isset($_POST['txt'])){
    $value=$_POST['txt'];
    $type='voice';
    $data=json_encode($_POST);
}
$query_add_log=mysqli_query($link,"INSERT INTO `log` (`ip`, `type`, `value`,`data`) VALUES ('1', '$type', '$value','$data');");
echo mysqli_error($link);
?>