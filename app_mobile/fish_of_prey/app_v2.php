<?php
include "carrot_framework.php";

if($function=='upload_scores'){
    $scores=$_POST['scores'];
    $user_id=$_POST['user_id'];
    $user_name=$_POST['user_name'];
    $key_lang=get_code_lang_by_name($link,$lang_name);
    
    $query_check_user=mysqli_query($link,"SELECT `id_device` FROM `scores` WHERE `id_device` = '$user_id' LIMIT 1");
    if(mysqli_num_rows($query_check_user)>0){
        $query_update_scores=mysqli_query($link,"UPDATE `scores` SET `score` = '$scores', `name_play` = '$user_name', `lang_key` = '$key_lang', `lang_name` = '$lang_name' WHERE `id_device` = '$user_id' LIMIT 1;");
    }else{
        $query_add_scores=mysqli_query($link,"INSERT INTO `scores` (`id_device`, `score`, `name_play`, `lang_key`, `lang_name`) VALUES ('$user_id', '$scores', '$user_name', '$key_lang', '$lang_name');");
    }
}

if($function=='list_scores'){
    $arr_scores=array();
    $query_list_socers=mysqli_query($link,"SELECT * FROM `scores` ORDER BY `score` DESC LIMIT 60");
    while($row=mysqli_fetch_assoc($query_list_socers)){
        $row["avatar"]=$url_carrot_store."/img.php?url=app_mygirl/app_my_girl_".$row["lang_key"]."_user/".$row["id_device"].".png&size=80";
        array_push($arr_scores,$row);
    }
    echo json_encode($arr_scores);
}

?>