<?php
include "config.php";
include "database.php";

$id_link=$_GET['id_link'];
$query_link=mysqli_query($link,"SELECT * FROM `link` WHERE `id` = '$id_link' LIMIT 1");
if(mysqli_num_rows($query_link)>0){
    $data_link=mysqli_fetch_array($query_link);
    $view_link=$data_link['view'];
    $url_go_to=$data_link['link'];
    $view_link=intval($view_link)+1;
    $query_update_link=mysqli_query($link,"UPDATE `link` SET `view` = '$view_link' WHERE `id` = '$id_link';");
    header("Location: $url_go_to");
    echo var_dump($data_link);
}
?>