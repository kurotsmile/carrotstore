<?php
include_once("carrot_framework.php");

if($function=="list_player"){
    $search='';if(isset($_POST['search'])) $search=$_POST['search'];
    $playing_position='';if(isset($_POST['playing_position'])) $playing_position=$_POST['playing_position'];
    $arr_player=array();
    if($search=='')
        $q_list_player=mysqli_query($link,"SELECT * FROM `player`  WHERE `playing_position`='$playing_position' ORDER BY RAND() LIMIT 30");
    else
        $q_list_player=mysqli_query($link,"SELECT * FROM `player` WHERE `name_player` LIKE '%$search%' LIMIT 30");

    while($player=mysqli_fetch_assoc($q_list_player)){
        $player['icon']=$url.'/data_player/'.$player['id'].'.png';
        array_push($arr_player,$player);
    }
    echo json_encode($arr_player);
    exit;
}

if($function=="show_list_scores"){
    $arr_list_score=array();
    $query_list_scores=mysqli_query($link,"SELECT * FROM `scores` ORDER BY `score` DESC LIMIT 50");
    while ($rank=mysqli_fetch_assoc($query_list_scores)) {
        $rank_lang=$rank['lang'];
        $user_id=$rank['id_user'];
        $query_name_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$rank_lang` WHERE `id_device` = '$user_id' LIMIT 1");
        $data_name=mysqli_fetch_assoc($query_name_user);
        if($data_name['name']!=null){
            $rank['name']=$data_name['name'];
            $rank['avatar']=get_url_avatar_user_thumb($user_id,$rank_lang,'50');
            array_push($arr_list_score,$rank);
        }
    }
    echo json_encode($arr_list_score);
    exit;
}

if($function=="upload_scores"){
    $lang=$_POST['lang'];
    $scores=$_POST['scores'];
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];

    $query_check_scores=mysqli_query($link,"SELECT `score` FROM `scores` WHERE `id_user` = '$user_id' AND `lang`='$user_lang' LIMIT 1");
    if(mysqli_num_rows($query_check_scores)>0){
        $data_scores=mysqli_fetch_assoc($query_check_scores);
        $cur_scores=$data_scores['score'];
        if($scores>$cur_scores){
            $query_update_scores=mysqli_query($link,"UPDATE `scores` SET `score` = '$scores' WHERE `id_user` = '$user_id' AND `lang`='$user_lang' LIMIT 1;");
        }
    }else{
        $query_add_scores=mysqli_query($link,"INSERT INTO `scores` (`id_user`, `score`, `lang`) VALUES ('$user_id', '$scores', '$user_lang');");
    }
    exit;
}
?>