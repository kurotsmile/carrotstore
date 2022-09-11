<?php
function arithmetic($expression)
{
	$temp_op = preg_replace('([^\\+\\-*\\/%\\^])', ' ', trim($expression));
	$temp_op = explode(' ', trim($temp_op));
	foreach ($temp_op as $key => $val) if ($val) $operators[] = $val;
	$numbers = preg_replace('([^0-9])', ' ', trim($expression));
	$numbers = explode(' ', $numbers);$i = 0;
	foreach ($numbers AS $key => $val)
	{
		if ($key == 0){ $answer = $val;continue;}
		if ($val)
		{
			switch ($operators[$i])
			{
				case '+':$answer += $val;break;
				case '-':$answer -= $val;break;
				case '*':$answer *= $val;break;
				case '/': $answer /= $val; break;
                case '^': $answer ^= $val;break;
				case '%': $answer %= $val;
			}
			$i++;
		}
	}
	return $answer;
}

function special_keyword($txt_chat){
    if(isset($_POST['text'])) $txt_chat=str_replace("{key_chat}",$_POST['text'],$txt_chat);
    return $txt_chat;
}

function get_msg($link,$func,$lang,$sex,$character_sex,$limit_day,$limit_date,$limit_month){
    if($limit_day==''&&$limit_date==''){
        $query_msg=mysqli_query($link,"SELECT `id`, `chat`, `face`, `action`,`color` FROM `app_my_girl_msg_$lang` WHERE `func` = '$func'  AND `character_sex`='$character_sex' AND `sex`='$sex' AND `disable`=0 AND `limit_month` = '$limit_month' ORDER BY RAND() LIMIT 1");
    }else if($limit_date==''&&$limit_month==''){
        $query_msg=mysqli_query($link,"SELECT `id`, `chat`, `face`, `action`,`color` FROM `app_my_girl_msg_$lang` WHERE `func` = '$func'  AND `character_sex`='$character_sex' AND `sex`='$sex' AND `disable`=0 AND `limit_day`='$limit_day' ORDER BY RAND() LIMIT 1");
    }else{
        $query_msg=mysqli_query($link,"SELECT `id`, `chat`, `face`, `action`,`color` FROM `app_my_girl_msg_$lang` WHERE `func` = '$func'  AND `character_sex`='$character_sex' AND `sex`='$sex' AND `disable`=0  ORDER BY RAND() LIMIT 1");
    }
    return get_msg_by_query($query_msg,$lang);
}

function get_msg_by_query($sql_query,$lang){
    $data_msg=mysqli_fetch_assoc($sql_query);
    if($data_msg!=null){
        $id_msg=$data_msg['id'];
        $data_msg['chat']=special_keyword($data_msg['chat']);
        $data_msg['url_edit']=URL.'/app_my_girl_update.php?id='.$id_msg.'&lang='.$lang.'&msg=1';
        $data_msg['pater']=$id_msg;
        $data_msg['pater_type']="msg";
        if(file_exists("../../app_mygirl/app_my_girl_msg_".$lang."/".$id_msg.".mp3"))  $data_msg['mp3']=URL."/app_mygirl/app_my_girl_msg_".$lang."/".$id_msg.".mp3";
        return $data_msg;
    }else{
        return null;
    }
}

function get_chat($link,$txt_sqli_query,$lang){
    $query_chat=mysqli_query($link,$txt_sqli_query);
    $data_chat=mysqli_fetch_assoc($query_chat);
    if($data_chat!=null){
        if($data_chat['id_redirect']!=""){
            $id_redirect=$data_chat['id_redirect'];
            $txt_query_redirect="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `id`='$id_redirect'  AND `disable`=0  LIMIT 1";
            $data_chat=get_chat($link,$txt_query_redirect,$lang);
        }

        $id_chat=$data_chat['id'];
        $data_chat['chat']=special_keyword($data_chat['chat']);
        $data_chat['url_edit']=URL.'/app_my_girl_update.php?id='.$data_chat['id'].'&lang='.$lang;
        $data_chat['pater']=$data_chat['id'];
        if($data_chat['effect_customer']!=""){
            $data_chat['icon_chat']=URL.'/thumb.php?src='.URL.'/app_mygirl/obj_effect/'.$data_chat['effect_customer'].'.png&size=64&trim=1';
        }

        if(isset($data_chat['func_sever'])){
            if($data_chat['func_sever']!='') $data_chat['pater_type']=$data_chat['func_sever']; else $data_chat['pater_type']="chat";
        }else
            $data_chat['pater_type']="chat";

        if($data_chat['file_url']!='')
        $data_chat['mp3']=$data_chat['file_url'];
        else{
            if(file_exists("../../app_mygirl/app_my_girl_".$lang."/".$id_chat.".mp3"))  $data_chat['mp3']=URL."/app_mygirl/app_my_girl_".$lang."/".$id_chat.".mp3";
        }

        if($data_chat['effect']=='2'){
            $id_music=$id_chat;
            if(file_exists("../../app_mygirl/app_my_girl_".$lang."_img/".$id_music.".png")) $data_chat['avatar']=URL."/app_mygirl/app_my_girl_".$lang."_img/".$id_music.".png";

            $query_lyrics=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang."_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
            $data_lyrics=mysqli_fetch_assoc($query_lyrics);
            if($data_lyrics!=null){
                if($data_lyrics['lyrics']!="")$data_chat['lyrics']=$data_lyrics['lyrics'];
                if($data_lyrics['artist']!="")$data_chat['artist']=$data_lyrics['artist'];
                if($data_lyrics['album']!="")$data_chat['album']=$data_lyrics['album'];
                if($data_lyrics['year']!="")$data_chat['year']=$data_lyrics['year'];
                if($data_lyrics['genre']!="")$data_chat['genre']=$data_lyrics['genre'];
            }

            $query_link_ytb=mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang` WHERE `id_chat` = '$id_music' LIMIT 1");
            $data_link_ytb=mysqli_fetch_assoc($query_link_ytb);
            if($data_link_ytb!=null) $data_chat['link_ytb']=$data_link_ytb['link'];

            if($data_chat['slug']!='') $data_chat['link_store']=URL.'/song/'.$lang.'/'.$data_chat['slug']; else $data_chat['link_store']=URL.'/music/'.$id_music.'/'.$lang;
        }
    }
    return $data_chat;
}

function get_new_song($link,$name_song,$lang){
    $data_song=null;
    if(trim($name_song)==''){
        $data_song=get_chat($link,"SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `effect` = '2' AND `id_redirect` = ''  ORDER BY RAND() LIMIT 1",$lang);
    }else{
        $data_song=get_chat($link,"SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `chat` LIKE '%$name_song%' AND `effect` = '2' AND `id_redirect` = ''  ORDER BY RAND() LIMIT 1",$lang);
        if($data_song==null){
            $data_song=get_chat($link,"SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE MATCH (`chat`) AGAINST ('$name_song' IN BOOLEAN MODE) AND `effect` = '2' AND `id_redirect` = ''  LIMIT 1",$lang);
        }

        if($data_song==null){
            $query_list_lang=mysqli_query($link,"SELECT `key` FROM `app_my_girl_country` WHERE `key` != '$lang' AND `active` = '1'");
            while($item_lang=mysqli_fetch_array($query_list_lang)){
                $lang_key=$item_lang['key'];
                $data_song=get_chat($link,"SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`color` FROM `app_my_girl_$lang_key` WHERE MATCH (`chat`) AGAINST ('$name_song' IN BOOLEAN MODE) AND `effect` = '2' AND `id_redirect` = ''  LIMIT 1",$lang_key);
                if($data_song!=null) break;
            }
        }

        if($data_song==null){
            $query_add_key_music=mysqli_query($link,"INSERT INTO `app_my_girl_log_key_music`(`key`, `lang`,`type`) VALUES ('$name_song', '$lang','1')");
        }
    }
    return $data_song;
}

function get_lyrics_song($link,$text,$lang){
    $data_song=null;
    $query_lyrics=mysqli_query($link,"SELECT `id_music` FROM `app_my_girl_".$lang."_lyrics` WHERE `lyrics` LIKE '%$text%' LIMIT 1");
    $data_lyrics=mysqli_fetch_assoc($query_lyrics);
    if($data_lyrics!=null){
        $id_music=$data_lyrics['id_music'];
        $txt_query_music="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang` WHERE `id`='$id_music'  AND `disable`=0  LIMIT 1";
        $data_song=get_chat($link,$txt_query_music,$lang);
    }else{
        $query_list_lang=mysqli_query($link,"SELECT `key` FROM `app_my_girl_country` WHERE `key` != '$lang' AND `active` = '1'");
        while($item_lang=mysqli_fetch_array($query_list_lang)){
            $lang_key=$item_lang['key'];
            $query_lyrics=mysqli_query($link,"SELECT `id_music` FROM `app_my_girl_".$lang_key."_lyrics` WHERE `lyrics` LIKE '%$text%' LIMIT 1");
            $data_lyrics=mysqli_fetch_assoc($query_lyrics);
            if($data_lyrics!=null){
                $id_music=$data_lyrics['id_music'];
                $txt_query_music="SELECT `id`, `chat`, `link`, `face`, `action`,`id_redirect`,`effect`,`slug`,`file_url`,`func_sever`,`effect_customer`,`color` FROM `app_my_girl_$lang_key` WHERE `id`='$id_music'  AND `disable`=0  LIMIT 1";
                $data_song=get_chat($link,$txt_query_music,$lang_key);
                if($data_song!=null) break;
            }
        }
    }
    return $data_song;
}

function get_users($link,$sdt_or_name_or_mail,$lang){
    $list_user=array();
    $query_list_user=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang` WHERE `name` LIKE '%$sdt_or_name_or_mail%' OR `sdt` LIKE '%$sdt_or_name_or_mail%' OR `email` LIKE '%$sdt_or_name_or_mail%' LIMIT 20");
    while($row_user=mysqli_fetch_assoc($query_list_user)){
        $id_user=$row_user['id_device'];
        if(file_exists("../../app_mygirl/app_my_girl_".$lang."_user/".$id_user.".png")){
            $row_user["avatar"]=get_url_avatar_user_thumb($id_user,$lang,'50x50');
        }
        array_push($list_user,$row_user);
    }
    return $list_user;
}
?>