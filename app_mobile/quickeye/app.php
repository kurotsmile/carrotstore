<?php
header("Access-Control-Allow-Origin: *");
include "config.php";

$func="";
if(isset($_POST['function']))$func=$_POST['function'];

if($func=='get_icon'){
    $length=$_POST['length'];
    $arr_icon=array();
    $query_list_icon=mysqli_query($link,"SELECT `id` FROM `app_my_girl_effect` ORDER BY RAND() LIMIT $length");
    while($icon=mysqli_fetch_assoc($query_list_icon)){
        $url_icon=$url_carrot_store."/app_mygirl/obj_effect/".$icon["id"].".png";
        array_push($arr_icon,$url_icon);
    }
    echo json_encode($arr_icon);
}
?>