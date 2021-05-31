<?php
include_once "carrot_framework.php";

if($function=="list_rank"){
    $arr_list_rank=array();
    $query_list_scores=mysqli_query($link,"SELECT * FROM `scores` ORDER BY `score` DESC LIMIT 30");
    while ($rank=mysqli_fetch_assoc($query_list_scores)) {
        $rank_lang=$rank['lang'];
        $user_id=$rank['user_id'];
        $query_name_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$rank_lang` WHERE `id_device` = '$user_id' LIMIT 1");
        $data_user=mysqli_fetch_assoc($query_name_user);
        if($data_user['name']!=null){
            $rank['name']=$data_user['name'];
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
    $score=$_POST['score'];
    
    $query_check_rank=mysqli_query($link,"SELECT `score` FROM `scores` WHERE  `user_id`='$user_id' AND `lang` = '$user_lang' LIMIT 1");
    if(mysqli_num_rows($query_check_rank)>0){
        $data_rank=mysqli_fetch_assoc($query_check_rank);
        $score_user=$data_rank['score'];
        if(intval($score)>intval($score_user)) $query_update_rank=mysqli_query($link,"UPDATE `scores` SET `score` = '$score'  WHERE `user_id` = '$user_id' AND `lang` = '$user_lang' LIMIT 1;");
    }else{
        $query_add_rank=mysqli_query($link,"INSERT INTO `scores` (`user_id`, `score`, `date`, `lang`) VALUES ('$user_id', '$score', NOW(), '$user_lang');");
    }
    echo mysqli_error($link);
    exit;
}

if($function=='list_category'){
    $categorys=array();
    $query_list_category=mysqli_query($link,"SELECT `name`,`id` FROM carrotsy_virtuallover.`app_my_girl_bk_category` ORDER BY RAND()");
    while($row_category=mysqli_fetch_assoc($query_list_category)){
        $item=new stdClass();
        $item->{"id"}=$row_category['id'];
        $key_name=$row_category['name'];
        $query_get_name_category=mysqli_query($link,"SELECT `value` FROM carrotsy_virtuallover.`app_my_girl_key_lang` WHERE `key` = '$key_name' AND `lang` = '$lang' LIMIT 1");
        if(mysqli_num_rows($query_get_name_category)>0){
            $data_val=mysqli_fetch_assoc($query_get_name_category);
            $item->{"name"}=$data_val["value"];
        }else{
            $item->{"name"}=$key_name;
        }
        $query_bk_in_cat=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_background` WHERE `category` = '".$row_category['id']."' AND `version` = '1' ORDER BY  RAND() LIMIT 3");
        $arr_url=array();
        $arr_url_game1=array();
        $arr_url_game2=array();
        while($row_bk=mysqli_fetch_assoc($query_bk_in_cat)){
            $url_bk=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png&size=160x80';
            $url_game1=$url_carrot_store.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png';
            $url_game2=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png&size=300x300';
            array_push($arr_url,$url_bk);
            array_push($arr_url_game1,$url_game1);
            array_push($arr_url_game2,$url_game2);
        }
        $item->{"url"}=$arr_url;
        $item->{"url_game1"}=$arr_url_game1;
        $item->{"url_game2"}=$arr_url_game2;
        $query_count_cat=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_background` WHERE `category` = '".$row_category['id']."' AND `version` = '1' ");
        $item->{"desc"}=mysqli_num_rows($query_count_cat).' Background images and games in this category';
        array_push($categorys,$item);
    }
    echo json_encode($categorys);
    exit;
}

if($function=='search'){
    $arr_list_bk=array();
    $key_search=$_POST['key_search'];
    $query_list_search=mysqli_query($link,"SELECT `id`,`name`,`category` FROM carrotsy_virtuallover.`app_my_girl_background` WHERE `name` LIKE '%$key_search%' AND `version` = '1' ORDER BY  RAND() LIMIT 30");
    while($row_bk=mysqli_fetch_array($query_list_search)){
        $item=new stdClass();
        $item->{"id"}=$url_carrot_store.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png';
        $item->{"name"}=$row_bk['name'];
        $item->{"url"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_background/icon_'.$row_bk['id'].'.png&size=60x60';
        $id_category=$row_bk['category'];
        if($id_category!=""){
            $query_category=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_bk_category` WHERE `id`='$id_category' LIMIT 1");
            $data_category=mysqli_fetch_assoc($query_category);
            $item->{"category"}=$data_category['name'];
        }else{
            $item->{"category"}="(None)";
        }
        array_push($arr_list_bk,$item);
    }
    echo json_encode($arr_list_bk);
    exit;
}

if($function=='get_background'){
    $cat_id=$_POST['id_cat'];
    $query_bk_in_cat=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_background` WHERE `category` = '".$cat_id."' AND `version` = '1' ORDER BY  RAND() LIMIT 1");
    $item=new stdClass();
    $data_bk=mysqli_fetch_array($query_bk_in_cat);
    $item->{"url"}=$url_carrot_store.'/app_mygirl/obj_background/icon_'.$data_bk['id'].'.png';
    echo json_encode($item);
    exit;
}
?>