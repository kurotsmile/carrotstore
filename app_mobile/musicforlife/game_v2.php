<?php
include_once "carrot_framework.php";

if($function=='list_song'){
    $arr_list_song=array();
    $key_search='';
    if(isset($_POST['search'])){ $key_search=$_POST['search'];}

    if($key_search==''){
        $query_music=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `effect` = '2' ORDER BY rand() LIMIT 20");
    }else{
            $list_country=mysqli_query($link,"SELECT `key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
            $txt_query='';
            $txt_query_2='';
            $count_l=mysqli_num_rows($list_country);
            $count_index=0;
            while($l=mysqli_fetch_assoc($list_country)){
                $key=$l['key'];
                $txt_query.="(SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE  `chat` LIKE '%$key_search%' AND  `effect`='2' AND `disable` = '0' limit 21)";
                $txt_query_2.=" (SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$key_search' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
                $count_index++;
                if($count_index!=$count_l){
                $txt_query.=" UNION ALL ";
                $txt_query_2.=" UNION ALL ";
                }
            }
            
            $query_music=mysqli_query($link,$txt_query);
            
            if(mysqli_num_rows($query_music)==0){
                $query_music=mysqli_query($link,$txt_query_2);
            }
    }

    while($row=mysqli_fetch_assoc($query_music)){
        $item_music=new stdClass();
        $item_music->{"id"}=$row['id'].''.$row['author'];
        $item_music->{"name"}=$row['chat'];
        if($row['file_url']!=''){
            $item_music->{"url"} = $row['file_url'];
        }else {
            $item_music->{"url"} = $url_carrot_store.'/app_mygirl/app_my_girl_' . $row['author'] . '/' . $row['id'] . '.mp3';
        }
        $item_music->{"color"}=$row['color'];
        $item_music->{"type"}='0';
        $item_music->{"link_store"}=$url_carrot_store.'/music/'.$row['id'].'/'.$row['author'];
        $item_music->{"lang"}=$row['author'];
        
        $query_lyrics=mysqli_query($link,"SELECT `lyrics` FROM carrotsy_virtuallover.`app_my_girl_".$row['author']."_lyrics` WHERE `id_music` = '".$row['id']."' LIMIT 1");
        if(mysqli_num_rows($query_lyrics)>0){
            $data_lyrics=mysqli_fetch_assoc($query_lyrics);
            $item_music->{"lyrics"}=$data_lyrics["lyrics"];
        }else{
            $item_music->{"lyrics"}="";
        }
        $url_avatar="app_mygirl/app_my_girl_".$lang."_img/".$row['id'].".png";
        $file_avatar="../../app_mygirl/app_my_girl_".$lang."_img/".$row['id'].".png";
        if (file_exists($file_avatar)){
            $item_music->{"img"}=$url_carrot_store.'/'.$url_avatar;
        } else {
            $item_music->{"img"}="";
        }
        array_push($arr_list_song,$item_music);
    }

    echo json_encode($arr_list_song);
}

if($function=='upload_scores'){
    $scores=$_POST['scores'];
    $user_id=$_POST['user_id'];
    $query_check_user=mysqli_query($link,"SELECT `scores` FROM `game_scores_".$lang."` WHERE `user_id` = '$user_id' LIMIT 1");
    if(mysqli_num_rows($query_check_user)>0){
        $query_update_scores=mysqli_query($link,"UPDATE `game_scores_".$lang."` SET `scores` = '$scores'  WHERE `user_id` = '$user_id'  LIMIT 1;");
    }else{
        $query_add_scores=mysqli_query($link,"INSERT INTO `game_scores_".$lang."` (`user_id`, `scores`) VALUES ('$user_id', '$scores');");
    }
}

if($function=='list_ranking'){
    $arr_rank=array();
    $query_list_rank=mysqli_query($link,"SELECT * FROM `game_scores_$lang` ");
    while ($s=mysqli_fetch_assoc($query_list_rank)) {
        $user_id=$s["user_id"];
        $query_name_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$user_id' LIMIT 1");
        $data_name_user=mysqli_fetch_assoc($query_name_user);
        if($data_name_user!=null){
            $item=new stdClass();
            $item->{"user_id"}=$user_id;
            $item->{"user_name"}=$data_name_user['name'];
            $item->{"scores"}=$s["scores"];
            $item->{"user_avatar"}=get_url_avatar_user($user_id,$lang);
            array_push($arr_rank,$item);
        }
    }
    echo json_encode($arr_rank);
}