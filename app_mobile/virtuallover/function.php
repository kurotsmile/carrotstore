<?php
function get_key_lang_app($link,$key,$lang){
    $value='';
    $data_display=mysqli_fetch_array(mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '".$lang."' AND `version` = '0' LIMIT 1"));
    $data_display=(Array)json_decode($data_display['data']);
    if(isset($data_display[$key])){
        $value=$data_display[$key];
    }
    mysqli_fetch_array($data_display);
    return $value;
}



function chat_func($link,$func){
    $lang_sel=$_POST['lang'];
    $version='';
    $os='';
    $sex=0;
    $txt_limit='';
    $character_sex='0';

    
    if(isset($_POST['sex'])){
        $sex=$_POST['sex'];
    }
    
    if(isset($_POST['version'])){
        $version=$_POST['version'];
    }
    
    if(isset($_POST['os'])){
        $os=$_POST['os'];
    }
    
    if($version!=''&$os!=''){
        $txt_limit=" AND `ver`!= '$version' AND `os`!='$os'";
    }
    
    if(isset($_POST['character_sex'])){
        $character_sex=$_POST['character_sex'];
    }
    
    $txt_limit_one_show='';
    if($func=='bat_chuyen'){
        $id_question='';
        if(isset($_POST['id_question'])){ $id_question=$_POST['id_question'];}
        $txt_limit_one_show=" AND `id` !='$id_question' ";
    }
    
    $day_week="AND (`limit_day` = '".$_POST['day_week']."' OR `limit_day` = '')";
    
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_".$lang_sel."` WHERE `func` = '$func'  AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' $day_week $txt_limit_one_show $txt_limit ORDER BY RAND() LIMIT 1");
    return mysqli_fetch_array($result_chat);
}

function Chat_report($data_row,$type_chat,$lang_sel,$link){
    $app=new App;
    $location_lon='';
    $location_lat='';
    $hour='';
    $minute='';
    $second='';
    $key_chat='';
        
    if(isset($_POST['text'])){ $key_chat=$_POST['text'];}
    if(isset($_POST['hour'])){ $hour=$_POST['hour'];}
    if(isset($_POST['minute'])){ $minute=$_POST['minute'];}
    if(isset($_POST['second'])){ $second=$_POST['second'];}    
    if(isset($_POST['location_lon'])){ $location_lon=$_POST['location_lon'];}
    if(isset($_POST['location_lat'])){ $location_lat=$_POST['location_lat'];}
        
    
    $os="";
    if(isset($_POST['os'])){$os=$_POST['os'];}
    $chat=new Chat();
    
    $txt_chat=str_replace("{ten_user}",get_name_device($link,$lang_sel),$data_row['chat']);    
    if($hour!='') $txt_chat=str_replace("{gio}",$hour,$txt_chat);
    if($minute!='') $txt_chat=str_replace("{phut}",$minute,$txt_chat);
    if($second!='') $txt_chat=str_replace("{giay}",$second,$txt_chat);    
    $txt_chat=str_replace('{key_chat}',$key_chat,$txt_chat);      
    
    if($type_chat=="chat"){
        if($data_row['id_redirect']!=''){ 
            $id_redirect=$data_row['id_redirect'];
            $result_chat5=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
            $data_row=mysqli_fetch_array($result_chat5);
            $txt_chat=str_replace("{ten_user}",get_name_device($link,$lang_sel),$data_row['chat']);
            mysqli_free_result($result_chat5);
        }
        
        if($data_row['func_sever']!=''){ 
            if($data_row['func_sever']=='sua_ten'){
                Chat_report(chat_func($link,'chua_biet_ten'),'nho_ten',$lang_sel,$link);
            }
            
            if($data_row['func_sever']=='doc_ten'){
                if(get_name_device($link,$lang_sel)==''){
                    Chat_report(chat_func($link,'chua_biet_ten'),'nho_ten',$lang_sel,$link);
                }
            }
            
            if($data_row['func_sever']=='dem_ngay_gap'){
                if(get_name_device($link,$lang_sel)!=''){
                    $id_device="";
                    if(isset($_POST['id_device'])){ 
                        $id_device=$_POST['id_device'];
                    }
                    $date_count=mysqli_query($link,"SELECT DATEDIFF(date_cur,date_start),`date_start` FROM `app_my_girl_user_$lang_sel` WHERE `id_device` = '$id_device' LIMIT 1");
                    $val_date_count=mysqli_fetch_array($date_count);
                    if($val_date_count[0]=='0'){
                        Chat_report(chat_func($link,'khong_biet_ngay_gap'),'msg',$lang_sel,$link);
                    }else if($val_date_count[0]==''){
                        Chat_report(chat_func($link,'khong_biet_ngay_gap'),'msg',$lang_sel,$link);
                    }else{
                        $txt_chat=str_replace('{dem_ngay_gap}',$val_date_count[0],$data_row['chat']);
                    }
                    mysqli_free_result($date_count);
                }else{
                    Chat_report(chat_func($link,'khong_biet_ngay_gap'),'msg',$lang_sel,$link);
                }
            }


            if($data_row['func_sever']=='vi_tri'){
                $id_device="";
                if(isset($_POST['id_device'])){ 
                    $id_device=$_POST['id_device'];
                }
                if($location_lon=='0'){
                    Chat_report(chat_func($link,'chua_bat_dinh_vi'),'msg',$lang_sel,$link);
                }
                $place="https://maps.googleapis.com/maps/api/geocode/json?latlng=$location_lat,$location_lon&sensor=true&key=$key_api_google";
        
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $place);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_ENCODING, "");
                $curlData = curl_exec($curl);
                curl_close($curl);
                
                $place = json_decode($curlData);
                $txt_dc=$place->results[0]->formatted_address;
                $txt_address='"'.$txt_dc.'"';
                $txt_address=str_replace('Unnamed Road,','',$txt_address);
                $txt_dc=str_replace('Unnamed Road,','',$txt_dc);
                $txt_chat=str_replace("{vi_tri}",$txt_address,$txt_chat);
                
                if(get_name_device($link,$lang_sel)!=''){
                    $update_user_address=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `address` = '$txt_dc' WHERE `id_device` = '$id_device';");
                }
            }
            
            if($data_row['func_sever']=='vi_tri_map'){
                if($location_lon=='0'){
                    Chat_report(chat_func($link,'chua_bat_dinh_vi'),'msg',$lang_sel,$link);
                }
               $data_row['link']="https://maps.google.com/maps/api/staticmap?center=$location_lat,$location_lon&size=390x260&zoom=15&markers=$location_lat,$location_lon";
            }
            
            if($data_row['func_sever']=='tim_duong'){
                Chat_report(chat_func($link,'hoi_tim_duong'),'tim_duong',$lang_sel,$link);
            }
            
        }

    }

    $chat->chat=$txt_chat;
    $chat->status=$data_row['status']; 
    $chat->color=$data_row['color'];
    $chat->q1=$data_row['q1'];
    $chat->q2=$data_row['q2'];
    $chat->r1=$data_row['r1'];
    $chat->r2=$data_row['r2'];
    $chat->effect=$data_row['effect'];
    $chat->id_chat=$data_row['id'];
    
    if($type_chat=="chat"){
        if($chat->effect=='2'){
            $id_music=$data_row['id'];
            
            $version="";
            if(isset($_POST['version'])){
                $version=$_POST['version'];
            }

                $show_lyric_query=mysqli_query($link,"SELECT `lyrics` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
                if(mysqli_num_rows($show_lyric_query)>0){
                    $data_lyric=mysqli_fetch_array($show_lyric_query);
                    $chat->data_text=$data_lyric[0];
                }else{  
                    $chat->data_text="";
                }
                mysqli_free_result($show_lyric_query);

                $arr_top_music=array(); 
                array_push($arr_top_music,array('-1','0','msg_box_func',get_key_lang($link,"top_music_0",$lang_sel)));
                array_push($arr_top_music,array('0','0','msg_box_func',get_key_lang($link,"top_music_1",$lang_sel)));
                array_push($arr_top_music,array('1','0','msg_box_func',get_key_lang($link,"top_music_2",$lang_sel)));
                array_push($arr_top_music,array('2','0','msg_box_func',get_key_lang($link,"top_music_3",$lang_sel)));
                array_push($arr_top_music,array('3','0','msg_box_func',get_key_lang($link,"top_music_4",$lang_sel)));
                $app->all_tip=$arr_top_music;

            
            $check_video=mysqli_query($link,"SELECT `link` FROM `app_my_girl_video_$lang_sel` WHERE  `id_chat` = '$id_music' LIMIT 1");
            if(mysqli_num_rows($check_video)){
                $data_video=mysqli_fetch_assoc($check_video);
                $chat->video=$data_video['link'];
            }
        }
        
        if($chat->effect=='4'){
            $query_get_notification=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_msg_$lang_sel` WHERE `func` = 'thong_bao' Order by rand() LIMIT 1");
            if(mysqli_num_rows($query_get_notification)){
                $data_msg=mysqli_fetch_array($query_get_notification);
                $chat->data_text=str_replace("{ten_user}",get_name_device($link,$lang_sel),$data_msg[0]);
            }
            mysqli_free_result($query_get_notification);
        }
        

        $chat->link=$data_row['link'];
    }else{
        //Tìm kiếm danh bạ
        if($data_row['effect']=="31"){
            $chat->link=$_POST['text'];
        }
        
        if($data_row['effect']=="43"){
            $chat->link="https://maps.google.com/maps?q=".urlencode($_POST['text']);
        }

    }
    $chat->vibrate=$data_row['vibrate'];
    $chat->face=$data_row['face'];
    $chat->action=$data_row['action'];
    
    $chat->type_chat=$type_chat; 
    if($type_chat=="chat"){
        if($data_row['func_sever']=='tim_danh_ba'){ 
            $chat->type_chat='tim_danh_ba';
        }
        
        if($data_row['func_sever']=='tim_nhac'){ 
            $chat->type_chat='tim_nhac';
        }
        
        if($data_row['func_sever']=='tim_loi_nhac'){ 
            $chat->type_chat='tim_loi_nhac';
        }
    }
    
    $table_app='';
    if($type_chat=="chat"){
        $table_app='app_mygirl/app_my_girl_'.$lang_sel;
    }else{
        $table_app='app_mygirl/app_my_girl_msg_'.$lang_sel;
    }
    
    if($data_row['effect_customer']!=""){
        $chat->effect_customer=URL.'/app_mygirl/obj_effect/'.$data_row['effect_customer'].'.png';
    }else{
        $chat->effect_customer="";
    }


    $table_app_temp='app_mygirl/app_my_girl_temp_'.$lang_sel;
    if ($data_row['file_url'] != "") {
        $chat->mp3=$data_row['file_url'];
    } else {
        if($chat->effect!='2'){
                $id_device=$_POST['id_device'];
                $voice_lang=get_key_lang($link,'voice_character_sex_'.$data_row['character_sex'],$lang_sel);
                if($voice_lang=='google'){
                    if (file_exists($table_app.'/'.$data_row['id'].'.mp3')) {
                        $chat->mp3=URL.'/'.$table_app.'/'.$data_row['id'].'.mp3';
                    }else{
                        $txt_chat=$chat->chat;
                        $link_audio='http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen='.strlen($chat->chat).'&client=tw-ob&q='.urlencode($chat->chat).'&tl='.$lang_sel;
                        $ch = curl_init($link_audio);
                        curl_setopt($ch, CURLOPT_HEADER, 0);
                        curl_setopt($ch, CURLOPT_NOBODY, 0);
                        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                        $output = curl_exec($ch);
                        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        curl_close($ch);
                        if ($status == 200) {
                            file_put_contents(dirname(__FILE__) . '/'.$table_app_temp.'/'.$id_device.'.mp3', $output);
                        }
                        $chat->mp3=URL.'/'.$table_app_temp.'/'.$id_device.'.mp3';
                    }
                }else{
                    if (file_exists($table_app.'/'.$data_row['id'].'.mp3')) {
                        $chat->mp3=URL.'/'.$table_app.'/'.$data_row['id'].'.mp3';
                    }
                }
        }else{
                if (file_exists($table_app.'/'.$data_row['id'].'.mp3')) {
                    $chat->mp3=URL.'/'.$table_app.'/'.$data_row['id'].'.mp3';
                }
        }
    }
    

    //Field chat
    $id=$chat->id_chat;
    $check_field_chat=mysqli_query($link,"SELECT `data`,`option` FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1");
    if(mysqli_num_rows($check_field_chat)>0){
        $data_field=mysqli_fetch_array($check_field_chat);
        $arr_data_field=json_decode($data_field['data']);
        if($data_field['option']=='1'){
            shuffle($arr_data_field);
        }
        $app->all_tip=$arr_data_field;
    }else{
        /*
        if($lang_sel=='vi'){
            $list_chat_select=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `pater` = '$id' AND `pater_type` = '$type_chat' ORDER BY rand() LIMIT 50");
            if(mysqli_num_rows($list_chat_select)>0){
                while($row_select=mysqli_fetch_array($list_chat_select)){
                     array_push($app->all_tip,array($row_select['id'],"$lang_sel",'show_chat',$row_select['text'],'8A00FF'));
                }
            }
            mysqli_free_result($list_chat_select);
        }*/
    }
    mysqli_free_result($check_field_chat);

    
    array_push($app->all_chat,$chat);
    echo json_encode($app);
    mysqli_close($link);
    exit;
}


function get_name_device($link,$lang_sel){
    $id_device="";
    $name_user="";
    if(isset($_POST['id_device'])){ 
        $id_device=$_POST['id_device'];
        $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang_sel` WHERE `id_device`='$id_device' LIMIT 1");
        if($list_effect!=false){
            if(mysqli_num_rows($list_effect)>0){
                $arr_data=mysqli_fetch_array($list_effect);
                $name_user='"'.$arr_data[1].'" ';
            }
        }
        mysqli_free_result($list_effect);
    }
    return $name_user;
}

function check_func_msg_sevrer($type_question,$id_device,$text,$lang_sel,$link,$sex){
    if($type_question=="nho_ten"){
        if(get_name_device($link,$lang_sel)==""){
            $add_effect=mysqli_query($link,"INSERT INTO `app_my_girl_user_$lang_sel` (`id_device`,`name`,`sex`,`date_start`) VALUES ('$id_device','$text','$sex',now());");
        }else{
            $add_effect=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `name` = '$text',`sex`='$sex' WHERE `id_device` = '$id_device';");
        }
        
        Chat_report(chat_func($link,'da_biet_ten'),'msg',$lang_sel,$link);
        
    }
    
    if($type_question=="tim_danh_ba"){
        Chat_report(chat_func($link,'hien_ds_sdt'),'msg',$lang_sel,$link);
    }
    
    if($type_question=="tim_duong"){
        Chat_report(chat_func($link,'tra_loi_tim_duong'),'msg',$lang_sel,$link);
    }
    
    if($type_question=="tim_nhac"){
        $result_music=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (chat)  AGAINST ('$text' IN BOOLEAN MODE)  AND `pater`='' AND `effect` = '2' AND `disable` = '0' LIMIT 1");
        if($result_music!=false){
            if(mysqli_num_rows($result_music)>0){
                Chat_report(mysqli_fetch_array($result_music),'chat',$lang_sel,$link);
            }
        }
        mysqli_free_result($result_music);
    }
    
    if($type_question=="tim_loi_nhac"){
        $result_lyricst=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang_sel."_lyrics` WHERE lyrics LIKE '%".$text."%' LIMIT 1");
        if($result_lyricst!=false){
            $data_lyrics=mysqli_fetch_array($result_lyricst);
            $id_song=$data_lyrics['id_music'];
            $get_music_by_lyrics=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang_sel."` WHERE `id` = '".$id_song."' LIMIT 1");
            if($get_music_by_lyrics!=false){
                if(mysqli_num_rows($get_music_by_lyrics)>0){
                    Chat_report(mysqli_fetch_array($get_music_by_lyrics),'chat',$lang_sel,'');
                }
            }
            mysqli_free_result($get_music_by_lyrics);
        }else{
            $result_music=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (chat)  AGAINST ('$text' IN BOOLEAN MODE)  AND `pater`='' AND `effect` = '2' AND `disable` = '0' LIMIT 1");
            if($result_music!=false){
                if(mysqli_num_rows($result_music)>0){
                    Chat_report(mysqli_fetch_array($result_music),'chat',$lang_sel,$link);
                }
            }
            mysqli_free_result($result_music);
        }
        mysqli_free_result($result_lyricst);

    }
}

function wikidefinition($s,$lang_sel) {
    $url = "http://$lang_sel.wikipedia.org/w/api.php?action=opensearch&search=".urlencode($s)."&format=xml&limit=1";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
    curl_setopt($ch, CURLOPT_POST, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_NOBODY, FALSE);
    curl_setopt($ch, CURLOPT_VERBOSE, FALSE);
    curl_setopt($ch, CURLOPT_REFERER, "");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 4);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $page = curl_exec($ch);
    $xml = simplexml_load_string($page);
    if((string)$xml->Section->Item->Description) {
        return $xml->Section->Item->Description;
    } else {
        return "";
    }
}

function get_key_lang($link,$key,$lang){
    $val='';
    $query_get_value=mysqli_query($link,"SELECT `value` FROM `app_my_girl_key_lang` WHERE `key` = '$key' AND `lang` = '$lang' LIMIT 1");
    if(mysqli_num_rows($query_get_value)>0){
        $data_val=mysqli_fetch_array($query_get_value);
        $val=$data_val[0];
    }else{
        $val=$key;
    }
    mysqli_free_result($query_get_value);
    return $val;
}