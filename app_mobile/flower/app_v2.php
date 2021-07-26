<?php
include_once("carrot_framework.php");

if($function=='get_quote'){
    $id_show='';if(isset($_POST['quote_id'])) $id_show=$_POST['quote_id'];
    if($id_show==''){
        $query_get_flower=mysqli_query($link,"SELECT `id`,`chat`,`effect_customer` FROM carrotsy_virtuallover.app_my_girl_$lang WHERE `effect`='36' AND `disable`='0' AND `id_redirect`='' ORDER BY RAND() LIMIT 1");
    }else{
        $query_get_flower=mysqli_query($link,"SELECT `id`,`chat`,`effect_customer` FROM carrotsy_virtuallover.app_my_girl_$lang WHERE `effect`='36' AND `disable`='0' AND `id_redirect`='' AND `id`='$id_show' LIMIT 1");
    }
    $data_flower=mysqli_fetch_assoc($query_get_flower);
    $path_icon="../../app_mygirl/obj_effect/".$data_flower['effect_customer'].".png";
    if(file_exists($path_icon))
        $data_flower["icon"]=$url_carrot_store."/app_mygirl/obj_effect/".$data_flower['effect_customer'].".png";
    else
        $data_flower["icon"]="";

    $id_maxim=$data_flower['id'];
    $data_flower['link_share']=$url_carrot_store."/quote/$id_maxim/$lang";
    
    $query_count_like=mysqli_query($link,"SELECT COUNT(id_device) as c FROM `flower_action_$lang` WHERE `type`='like' AND `id_maxim`='$id_maxim'");
    $data_count_like=mysqli_fetch_assoc($query_count_like);
    $data_flower['count_like']=$data_count_like['c'];

    
    $query_count_distlike=mysqli_query($link,"SELECT COUNT(id_device) as c FROM `flower_action_$lang` WHERE `type`='distlike' AND `id_maxim`='$id_maxim'");
    $data_count_distlike=mysqli_fetch_assoc($query_count_distlike);
    $data_flower['count_distlike']=$data_count_distlike['c'];


    $list_comment=array();
    $query_list_comment=mysqli_query($link,"SELECT `id_device`,`data` FROM `flower_action_$lang` WHERE `type`='comment' AND `id_maxim`='$id_maxim'");
    while ($row_comment = mysqli_fetch_assoc($query_list_comment)) {
        $user_id_comment=$row_comment['id_device'];
        $user_lang_comment=$lang;
        $query_account=mysqli_query($link,"SELECT `name` FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device`='$user_id_comment'");
        if(mysqli_num_rows($query_account)>0){
            $data_account=mysqli_fetch_assoc($query_account);
            $data_comment=$row_comment;
            $data_comment["avatar"]=get_url_avatar_user_thumb($user_id_comment, $user_lang_comment,'50');
            $data_comment["username"]=$data_account['name'];
            $data_comment["user_id"]=$user_id_comment;
            $data_comment["user_lang"]=$user_lang_comment;
            array_push($list_comment,$data_comment);
        }
    }
    $data_flower['comments']=$list_comment;

    if(isset($_POST['user_id'])){
        $user_id=$_POST['user_id'];
        $user_lang=$_POST['user_lang'];
        $mysql_add_log=mysqli_query($link,"INSERT INTO `log_day` (`id_user`, `msg`, `dates`, `lang`) VALUES ('$user_id', '$id_maxim', NOW(), '$user_lang');");
    }else{
        $mysql_add_log=mysqli_query($link,"INSERT INTO `log_day` (`id_user`, `msg`, `dates`, `lang`) VALUES ('$id_device', '$id_maxim', NOW(), '$lang');");
    }
    
    echo json_encode($data_flower);
    exit;
}

if($function=='flower_action'){
    $id_maxim=$_POST['id_maxim'];
    $type=$_POST['type'];
    $data='';if(isset($_POST['data_txt'])) $data=$_POST['data_txt'];
    if(isset($_POST['user_id'])) $id_device=$_POST['user_id'];
    if($type=='like'){
        $query_count_like_user=mysqli_query($link,"SELECT * FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '".$id_maxim."' AND `id_device` = '".$id_device."'");
        if(mysqli_num_rows($query_count_like_user)>0){
            $query_delete_like=mysqli_query($link,"DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'like'");
        }else{
            $query_act_like=mysqli_query($link,"INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
        }
    }

    if($type=='distlike'){
        $query_count_like_user=mysqli_query($link,"SELECT * FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '".$id_maxim."' AND `id_device` = '".$id_device."'");
        if(mysqli_num_rows($query_count_like_user)>0){
            $query_delete_like=mysqli_query($link,"DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'distlike'");
        }else{
            $query_act_like=mysqli_query($link,"INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
        }
    }
    
    if($type=='comment'){
        $query_act_comment=mysqli_query($link,"INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
    }
    
    if($type=='delete_comment'){
        $query_act_delete_comment=mysqli_query($link,"DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'comment'");
    }

    echo $id_maxim;
    exit;
}

if($function=='list_icon'){
    $list_icon=array();
    $query_list_icon=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_effect` ORDER BY RAND() LIMIT 30");
    while($row_icon=mysqli_fetch_assoc($query_list_icon)){
        $row_icon["url"]=$url_carrot_store."/app_mygirl/obj_effect/".$row_icon['id'].".png";
        array_push($list_icon,$row_icon);
    }
    echo json_encode($list_icon);
    exit;
}

if($function=='add_maxim'){
    $maxim_msg=$_POST['msg'];
    if(isset($_POST['user_id'])){
        $user_id=$_POST['user_id'];
        $user_lang=$_POST['user_lang'];
        if($user_lang==$lang) $id_device=$user_id;
    }
    $query_add_maxim=mysqli_query($link,"INSERT INTO `flower` (`msg`, `user_name`,`active`, `lang`) VALUES ('$maxim_msg', '$id_device', '1', '$lang');");
}
?>