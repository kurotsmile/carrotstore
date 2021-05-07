<?php
include_once "carrot_framework.php";

if($function=="send_good_night"){
    $user_name=$_POST['user_name'];
    $lang=$_POST['lang'];
    $msg=$_POST['msg'];
    $user_type=$_POST['user_type'];
    $add_good_night=mysqli_query($link,"INSERT INTO `good_night` (`msg`, `lang`, `user_type`, `user_name`, `date`,`active`) VALUES ('$msg', '$lang', '$user_type', '$user_name',NOW(),'0');");
    echo "Send success!";
    exit;
}

if($function=='get_good_night'){
    $good_night=new stdClass();
    
    $query_good_night=mysqli_query($link,"SELECT * FROM `good_night` WHERE `lang`='$lang' order by Rand() LIMIT 1");
    $data_good_night=mysqli_fetch_assoc($query_good_night);

    $good_night->{"msg"}=$data_good_night["msg"];
    if($data_good_night["user_type"]=='0'){
        $good_night->{"name_user"}=$data_good_night["user_name"];
        $good_night->{"avatar_user"}="";
        $good_night->{"id_user"}="";
    }else{
        $id_good_night_user=$data_good_night["user_name"];
        $query_get_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$id_good_night_user' LIMIT 1");
        $arr_data_user=mysqli_fetch_assoc($query_get_user);
        if($arr_data_user!=null){
            $good_night->{"name_user"}=$arr_data_user['name'];
            $good_night->{"avatar_user"}=$url_carrot_store."/img.php?url=app_mygirl/app_my_girl_".$lang."_user/$id_good_night_user.png&size=50";
            $good_night->{"id_user"}=$id_good_night_user;
        }else{
            $good_night->{"name_user"}=$data_good_night["user_name"];
            $good_night->{"avatar_user"}="";
            $good_night->{"id_user"}="";
        }
    }
    $good_night->{"date"}=$data_good_night["date"];
    echo json_encode($good_night);
    exit;
}

if($function=='list_music'){
    $arr_music=array();
    $query_list_music=mysqli_query($link,"SELECT * FROM `sound` ORDER BY RAND()");
    while ($row_music = mysqli_fetch_assoc($query_list_music)) {
        $item_m=new stdClass();
        $item_m->{"id"}=$row_music['id'];
        $item_m->{"name"}=$row_music['name'];
        $item_m->{"buy"}=$row_music['buy'];
        $item_m->{"url"}=$url.'/music/'.$row_music['id'].'.mp3';
        array_push($arr_music,$item_m);
    }
    echo json_encode($arr_music);
    exit;
}

if($function=='list_top_player'){    
    $arr_list_top=array();
    $type_view=$_POST['type'];
    
    if($type_view=='1'){
        $query_get_list_top_player=mysqli_query($link,"SELECT * FROM `scores2` WHERE `lang`='$lang' ORDER BY `scores` DESC LIMIT 20");
    }else{
        $query_get_list_top_player=mysqli_query($link,"SELECT * FROM `scores` WHERE `lang`='$lang' ORDER BY `scores` DESC LIMIT 20");
    }
    $index=0;
    while ($row_player=mysqli_fetch_assoc($query_get_list_top_player)) {
        $item_player=new stdClass();
        $item_player->{"id_user"}=$row_player['id_user'];
        $item_player->{"scores"}=$row_player['scores'];
        
        $id_user=$row_player['id_user'];
        $query_get_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
        if(mysqli_num_rows($query_get_user)){
            $arr_data_user=mysqli_fetch_assoc($query_get_user);
            $item_player->{"name_user"}=$arr_data_user['name'];
            $item_player->{"avatar_user"}=$url_carrot_store."/img.php?url=app_mygirl/app_my_girl_".$lang."_user/$id_user.png&size=50";
            $index++;
            $item_player->{"index"}=$index;
            array_push($arr_list_top,$item_player);
        }
    }
    echo json_encode($arr_list_top);
    exit;
}

if($function=='update_scores'){
    $lang=$_POST['lang'];
    $user_id=$_POST['user_id'];
    $new_scores=$_POST['new_scores'];
    $check_scores=mysqli_query($link,"SELECT `id_user` FROM `scores` WHERE `id_user` = '$user_id' AND `lang`='$lang' LIMIT 1");
    if(mysqli_num_rows($check_scores)>0){
        $update_scores=mysqli_query($link,"UPDATE `scores` SET `scores` = '$new_scores' WHERE `id_user` = '$user_id' AND `lang` = '$lang' ");
    }else{
        $add_scores=mysqli_query($link,"INSERT INTO `scores` (`id_user`, `scores`, `lang`) VALUES ('$user_id', '$new_scores', '$lang');");
    }
    exit;
}

if($function=='update_scores2'){
    $lang=$_POST['lang'];
    $user_id=$_POST['user_id'];
    $new_scores=$_POST['new_scores'];
    $check_scores=mysqli_query($link,"SELECT `id_user` FROM `scores2` WHERE `id_user` = '$user_id' AND `lang`='$lang' LIMIT 1");
    if(mysqli_num_rows($check_scores)>0){
        $update_scores=mysqli_query($link,"UPDATE `scores2` SET `scores` = '$new_scores' WHERE `id_user` = '$user_id' AND `lang` = '$lang' ");
    }else{
        $add_scores=mysqli_query($link,"INSERT INTO `scores2` (`id_user`, `scores`, `lang`) VALUES ('$user_id', '$new_scores', '$lang');");
    }
    exit;
}

?>