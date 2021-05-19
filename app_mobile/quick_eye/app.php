<?php
include_once "carrot_framework.php";

if($function=="list_rank"){
    $arr_list_rank=array();
    $query_list_scores=mysqli_query($link,"SELECT * FROM `scores` ORDER BY `level` DESC LIMIT 30");
    while ($rank=mysqli_fetch_assoc($query_list_scores)) {
        $rank_lang=$rank['lang'];
        $user_id=$rank['id_device'];
        $query_name_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$rank_lang` WHERE `id_device` = '$user_id' LIMIT 1");
        $data_name=mysqli_fetch_assoc($query_name_user);
        if($data_name['name']!=null){
            $rank['name']=$data_name['name'];
            $rank['avatar']=get_url_avatar_user_thumb($user_id,$rank_lang,'50');
            array_push($arr_list_rank,$rank);
        }
    }
    echo json_encode($arr_list_rank);
    exit;
}

if($function=="upload_rank"){
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $level=$_POST['level'];
    $level_type=$_POST['level_type'];
    
    $query_check_rank=mysqli_query($link,"SELECT `level` FROM `scores` WHERE  `id_device`='$user_id' AND `lang` = '$user_lang' LIMIT 1");
    if(mysqli_num_rows($query_check_rank)>0){
        $data_rank=mysqli_fetch_assoc($query_check_rank);
        $level_rank=$data_rank['level'];
        if(intval($level)>intval($level_rank)) $query_update_rank=mysqli_query($link,"UPDATE `scores` SET `level` = '$level' , `type`='$level_type' WHERE `id_device` = '$user_id' AND `lang` = '$user_lang' LIMIT 1;");
    }else{
        $query_add_rank=mysqli_query($link,"INSERT INTO `scores` (`id_device`, `level`, `date`, `type`, `lang`) VALUES ('$user_id', '$level', NOW(), '$level_type', '$user_lang');");
    }
    echo mysqli_error($link);
    exit;
}

if($function=='get_list_image'){
    $length=$_POST['limit'];
    $level_type=intval($_POST['level_type']);
    $array_type=array('chat','love','animal','emoji','foods','music');
    $arr_icon=array();
    $tag_icon=$array_type[$level_type];
    $query_list_icon=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_effect` WHERE `tag`='$tag_icon' ORDER BY RAND() LIMIT $length");
    while($icon=mysqli_fetch_assoc($query_list_icon)){
        $url_icon=$url_carrot_store."/app_mygirl/obj_effect/".$icon["id"].".png";
        array_push($arr_icon,$url_icon);
    }
    echo json_encode($arr_icon);
    exit;
}
?>