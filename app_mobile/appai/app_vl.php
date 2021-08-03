<?php
$date_cur=date("Y-m-d");
include_once "carrot_framework_vl.php";

$sex='';if(isset($_POST['sex'])) $sex=$_POST['sex'];
$character_sex='';if(isset($_POST['character_sex'])) $character_sex=$_POST['character_sex'];

function get_data_chat($q_result,$type_chat){
    global $url_carrot_store;
    global $link;
    $data_chat=mysqli_fetch_assoc($q_result);
    if($data_chat!=null){
        $id_chat=$data_chat["id"];
        $data_chat["id_chat"]=$id_chat;
        $data_chat["type_chat"]=$type_chat;
        if($data_chat['effect']=='2'){
            $chat_lang=$data_chat['author'];
            $data_chat["mp3"]=$url_carrot_store.'/app_mygirl/app_my_girl_'.$chat_lang.'/'.$id_chat.'.mp3';
            $q_data_music=mysqli_query($link,"SELECT `lyrics`, `artist`, `album`, `year`, `genre` FROM carrotsy_virtuallover.`app_my_girl_".$chat_lang."_lyrics` WHERE `id_music` = '$id_chat' LIMIT 1");
            $data_music=mysqli_fetch_assoc($q_data_music);
            if($data_music!=null){
                $data_chat["data_text"]=$data_music['lyrics'];
                $data_chat["artist"]=$data_music['artist'];
                $data_chat["year"]=$data_music['year'];
                $data_chat["genre"]=$data_music['genre'];
                $data_chat["album"]=$data_music['album'];
                $data_chat['avatar_music']=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/app_my_girl_'.$chat_lang.'_img/'.$id_chat.'.png&size=100x100&trim=1';
            }else{
                $data_chat["data_text"]="";
                $data_chat["artist"]="";
                $data_chat["year"]="";
                $data_chat["genre"]="";
                $data_chat["album"]="";
                $data_chat['avatar_music']="";
            }

            $q_video_music=mysqli_query($link,"SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_vi` WHERE `id_chat` = '$id_chat' LIMIT 1");
            $data_video_music=mysqli_fetch_assoc($q_video_music);
            $data_chat['video']=$data_video_music['link'];

        }
        else
            $data_chat["mp3"]=$url_carrot_store.'/alert.mp3';
    }
    return $data_chat;
}

if($function=="chao"){
    $hour=$_POST['hour'];
    $obj_chat=new stdClass();
    $q_msg=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func` = 'chao_$hour' AND `sex` = '$sex' AND `character_sex` = '$character_sex' LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_msg,"msg");

    $arr_tip=array();
    $q_tip=mysqli_query($link,"SELECT `text` FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `tip` = '1' AND `sex` = '$sex' AND `character_sex` = '$character_sex' LIMIT 20");
    while($tip=mysqli_fetch_assoc($q_tip)){
        array_push($arr_tip,$tip['text']);
    }
    $obj_chat->{"tip_chat"}=$arr_tip;
    echo json_encode($obj_chat);
    exit;
}

if($function=='bat_chuyen'){
    $obj_chat=new stdClass();
    $q_msg=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE `func` = 'bat_chuyen' AND `sex` = '$sex' AND `character_sex` = '$character_sex' ORDER BY RAND() LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_msg,"msg");
    echo json_encode($obj_chat);
    exit;
}

if($function=="chat"){
    $text=addslashes($_POST['text']);
    $obj_chat=new stdClass();
    $data_chat=null;
    $q_chat=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `text`='$text' AND `sex` = '$sex' AND `character_sex` = '$character_sex' ORDER BY RAND() LIMIT 1");
    $data_chat=get_data_chat($q_chat,"chat");
    if($data_chat==null){
        $q_chat=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `text` LIKE '%$text%' AND `sex` = '$sex' AND `character_sex` = '$character_sex' ORDER BY RAND() LIMIT 1");
        $data_chat=get_data_chat($q_chat,"chat");
        if($data_chat==null){
            $q_bambay=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_msg_$lang` WHERE MATCH (`text`) AGAINST ('$text') AND `sex` = '$sex' AND `character_sex` = '$character_sex' ORDER BY RAND() LIMIT 1");
            $data_chat=get_data_chat($q_bambay,"msg");
        }
    }
    $obj_chat->{"chat"}=$data_chat;
    echo json_encode($obj_chat);
    exit;
}

if($function=='show_chat'){
    $id_chat=$_POST['id_chat'];
    $lang_chat=$lang;
    if(isset($_POST['lang_chat'])) $lang_chat=$_POST['lang_chat'];
    $obj_chat=new stdClass();
    $q_chat=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang_chat` WHERE `id`='$id_chat' LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_chat,"chat");
    echo json_encode($obj_chat);
    exit;
}

if($function=='chat_tip'){
    $text=$_POST['text'];
    $obj_chat=new stdClass();
    $q_chat=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `text`='$text' AND `sex` = '$sex' AND `character_sex` = '$character_sex' ORDER BY RAND() LIMIT 1");
    $obj_chat->{"chat"}=get_data_chat($q_chat,"chat");
    echo json_encode($obj_chat);
    exit;
}

if($function=='list_background'){
    $obj=new stdClass();
    $list_background=array();
    $q_bk=mysqli_query($link,"SELECT `id` FROM carrotsy_virtuallover.`app_my_girl_background` ORDER BY RAND() LIMIT 25");
    while($bk=mysqli_fetch_assoc($q_bk)){
        $bk_id=$bk['id'];
        $bk["url"]=$url_carrot_store."/app_mygirl/obj_background/icon_".$bk_id.".png";
        $bk["url_thumb"]=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_background/icon_".$bk_id.".png&size=80x30&trim=1";
        array_push($list_background,$bk);
    }
    $obj->{"list_bk"}=$list_background;
    $obj->{"list_menu"}=array();
    echo json_encode($obj);
    exit;
}

if($function=='list_music'){
    $list_music=array();
    $q_music=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `effect` = '2' ORDER BY RAND() LIMIT 30");
    while($m=mysqli_fetch_assoc($q_music)){
        $m_id=$m['id'];
        $m['id_chat']=$m_id;
        $m['lang_chat']=$m['author'];
        array_push($list_music,$m);
    }
    echo json_encode($list_music);
    exit;
}

if($function=='list_contact'){
    $list_contact=array();
    $q_user=mysqli_query($link,"SELECT `name`, `sex`, `id_device`, `address`, `sdt` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `sdt` != '' AND `address` != '' AND `status` = '0' ORDER BY RAND() LIMIT 50");
    while($u=mysqli_fetch_assoc($q_user)){
        $u_id=$u['id_device'];
        $u["lang"]=$lang;
        $u["id"]=$u_id;
        $u["avatar"]=get_url_avatar_user_thumb($u_id,$lang,'100x60');
        array_push($list_contact,$u);
    }
    echo json_encode($list_contact);
    exit;
}

if($function=='list_person'){
    $sex=$_POST['sex'];
    $list_person=array();
    $q_per=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_preson` WHERE `sex` = '$sex'  ORDER BY RAND() LIMIT 21");
    while ($p=mysqli_fetch_assoc($q_per)) {
        $id_p=$p['id'];
        $per = new stdClass();
        $per->id=$id_p;
        $per->icon=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_preson/icon_".$id_p.".png&size=90x60";
        $per->data=$p['data'];
        array_push($list_person, $per);
    }
    echo json_encode($list_person);
    exit;
}

if($function=='list_radio'){
    $list_radio=array();
    $q_list_radio=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `lang` = '$lang' LIMIT 30");
    while($r=mysqli_fetch_assoc($q_list_radio)){
        $id_r=$r['id'];
        if(file_exists("../../app_mygirl/obj_radio/icon_$id_r.png"))
        $r['avatar']=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_radio/icon_".$id_r.".png&size=90x60&trim=1";
        array_push($list_radio,$r);
    }
    echo json_encode($list_radio);
    exit;
}

if($function=="music_emotion"){
    $lang_sel=$lang;
    $sub_func=$_POST['sub_func'];
    $id_music=$_POST['id_music'];
    $user_sel_emotion='-1';
    
    $m_count_fun="0";
    $m_count_sad="0";
    $m_count_serenity="0";
    $m_count_excited="0";
    
    $check_emotion=mysqli_query($link,"SELECT `value` FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `device_id` = '$id_device' AND `id_chat` = '$id_music' LIMIT 1");
    if(mysqli_num_rows($check_emotion)>0){
        $data_check=mysqli_fetch_array($check_emotion);
        $user_sel_emotion=$data_check[0];
        
        $query_count_fun=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '0' AND `id_chat` = '$id_music'");
        $query_count_sad=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '1' AND `id_chat` = '$id_music'");
        $query_count_serenity=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '2' AND `id_chat` = '$id_music'");
        $query_count_excited=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '3' AND `id_chat` = '$id_music'");
        
        $data_0=mysqli_fetch_assoc($query_count_fun);
        $data_1=mysqli_fetch_assoc($query_count_sad);
        $data_2=mysqli_fetch_assoc($query_count_serenity);
        $data_3=mysqli_fetch_assoc($query_count_excited);
        
        $m_count_fun=$data_0['c'];
        $m_count_sad=$data_1['c'];
        $m_count_serenity=$data_2['c'];
        $m_count_excited=$data_3['c'];
        
    }else{
        $user_sel_emotion='-1';
    }

    if($sub_func=="set"){
        $sel_emotion=$_POST['sel_emotion'];
        
        if($user_sel_emotion=='-1')
            $add_emotion_music=mysqli_query($link,"INSERT INTO carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` (`device_id`, `value`, `id_chat`) VALUES ('$id_device', '$sel_emotion', '$id_music');");
        else
            $update_emotion_music=mysqli_query($link,"UPDATE carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` SET  `value` = '$sel_emotion' WHERE `device_id` = '$id_device' AND `id_chat` = '$id_music' LIMIT 1;");

        $user_sel_emotion=$sel_emotion;
        
        $query_count_fun=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '0' AND `id_chat` = '$id_music'");
        $query_count_sad=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '1' AND `id_chat` = '$id_music'");
        $query_count_serenity=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '2' AND `id_chat` = '$id_music'");
        $query_count_excited=mysqli_query($link,"SELECT count(*) as c FROM carrotsy_virtuallover.`app_my_girl_music_data_$lang_sel` WHERE `value` = '3' AND `id_chat` = '$id_music'");
        
        $data_0=mysqli_fetch_assoc($query_count_fun);
        $data_1=mysqli_fetch_assoc($query_count_sad);
        $data_2=mysqli_fetch_assoc($query_count_serenity);
        $data_3=mysqli_fetch_assoc($query_count_excited);
        
        $m_count_fun=$data_0['c'];
        $m_count_sad=$data_1['c'];
        $m_count_serenity=$data_2['c'];
        $m_count_excited=$data_3['c'];
    }
    
    $arr_music=array("$user_sel_emotion","$m_count_fun","$m_count_sad","$m_count_serenity","$m_count_excited");
    echo json_encode($arr_music);
    exit;
}

if($function=='teaching'){
    $question=addslashes($_POST['question']);
    $answer=addslashes($_POST['answer']);
    $os='android';if(isset($_POST['os'])) $os=$_POST['os'];
    $md5=uniqid().md5($date_cur);
    mysqli_query($link,"INSERT INTO `app_my_girl_brain` (`question`, `answer`,`sex`,`character_sex`,`os`,`md5`, `id_device`,`date_pub`) VALUES ('$question','$answer','$sex','$character_sex','$os','$md5','$id_device',NOW());");
    echo mysqli_error($link);
    exit;
}
?>
