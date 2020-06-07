<?php
include "../config.php";
include "../database.php";


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

function thumb($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size&trim=1";
}

class App{
    public $all_user=array();
    public $all_tip=array();
};

class User{
    public $id="";
    public $name="";
    public $phone="";
    public $address="";
    public $avatar="";
    public $status="";
    public $sex="";
    public $count_date="";
    public $type="";
    public $news=0;
    public $arr_data_other="";
}

Class Item_value{
    public $id='';
    public $icon='';
    public $key='';
    public $value='';
    public $value_data='';
    public $value_lang='0';
    public $link='';
    public $type='';
    public $tip='';
    public $btn_del='0';
}

$app=new App;
$func='';
if(isset($_POST['func']))$func=$_POST['func'];

$lang_sel='vi';
$sex=0;
$version='';
$os='';

if(isset($_POST['lang'])){$lang_sel=$_POST['lang'];}
if(isset($_POST['sex'])){$sex=$_POST['sex'];}



$os='unclear';
$version='0';
$character='0';
$character_sex='1';
$id_question='';
$type_question='unclear';
$id_device='';
$location_lon='';
$location_lat='';
        
if(isset($_POST['os'])){ $os=$_POST['os'];}
if(isset($_POST['character'])){ $character=$_POST['character'];}
if(isset($_POST['version'])){ $version=$_POST['version'];}
if(isset($_POST['character_sex'])){ $character_sex=$_POST['character_sex'];}
if(isset($_POST['id_question'])){ $id_question=$_POST['id_question'];}
if(isset($_POST['type_question'])){ $type_question=$_POST['type_question'];}
if(isset($_POST['id_device'])){ $id_device=$_POST['id_device'];}
if(isset($_POST['location_lon'])){ $location_lon=$_POST['location_lon'];}
if(isset($_POST['location_lat'])){ $location_lat=$_POST['location_lat'];}

if($func=='changer_avatar'){
    $table="app_my_girl_".$lang_sel."_user";
    if(isset($_FILES['img'])){
        $target_file = $table.'/'.$id_device.'.png';
        move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
    }
    echo var_dump($_POST);
    exit;
}

if($func=='delete_avatar'){
    $table="app_my_girl_".$lang_sel."_user";
    $target_file = $table.'/'.$id_device.'.png';
    if (file_exists($target_file)) {
        unlink($target_file);
    }
    exit;
}

if($func=='get_info'){
    if($_POST['text']!=''){
        $id_device_show=$_POST['text'];
    }else{
        $id_device_show=$id_device;
    }
    
    $s_type='0';
    if(isset($_POST['stype'])){
        $s_type=$_POST['stype'];
    }
    
    $u=new User();
    $arr_other_field=Array();
    $is_user=0;
    
    if($s_type=="0"){
        $list_users=mysqli_query($link,"SELECT *,DATEDIFF(date_cur,date_start) as 'count_date' FROM `app_my_girl_user_$lang_sel` WHERE  `id_device`='$id_device_show' AND `name`!='' LIMIT 1");
        while($row=mysqli_fetch_array($list_users)){
            $filename_avatar= 'app_my_girl_'.$lang_sel.'_user/'.$row[0].'.png';
            if($row[2]=='1'){
                $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default1.png','80x50');
            }else{
                $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default.png','80x50');
            }
            if (file_exists($filename_avatar)) {
                  $txt_img_url=thumb(URL.'/app_mygirl/'.$filename_avatar,'50x50');
            } 
                

            $u->id=$row[0];
            
            $u->name=$row[1];
            $value_item=new Item_value();
            if($row[2]=='1'){
                $value_item->icon='https://contact.carrotstore.com/image/girl.png';
            }else{
                $value_item->icon='https://contact.carrotstore.com/image/boy.png';
            }
            $value_item->key='user_name';
            $value_item->value=$row[1];
            array_push($arr_other_field,$value_item);
            
            $u->phone=$row[6];
            $value_item=new Item_value();
            $value_item->icon='https://contact.carrotstore.com/field_icon/13.png';
            $value_item->key='user_phone';
            $value_item->value=$row[6];
            $value_item->link='tel://'.$row[6];
            array_push($arr_other_field,$value_item);
            
        
            $u->avatar=$txt_img_url;
            $u->address=$row[5];
            if($row[5]!=''){
            $value_item=new Item_value();
            $value_item->icon='https://contact.carrotstore.com/image/maps.png';
            $value_item->key='user_address';
            $value_item->value=$row[5];
            $value_item->link='https://www.google.com/maps?q='.$row[5];
            array_push($arr_other_field,$value_item);
            }

            $u->status=$row[7];
            $u->sex=$row[2];
            if($row['count_date']==''){
                $u->count_date=1;
            }else{
                $u->count_date=$row['count_date'];
            }
            $value_item=new Item_value();
            $value_item->icon='https://contact.carrotstore.com/field_icon/19.png';
            $value_item->key='user_count_date';
            $value_item->value=$u->count_date;
            array_push($arr_other_field,$value_item);
            
            $is_user=1;
        }
    }
    

        $query_check_field=mysqli_query($link,"SELECT * FROM carrotsy_contacts.user_field_data WHERE `id_device` = '$id_device_show' LIMIT 1");
        if(mysqli_num_rows($query_check_field)>0){
            $data_user=mysqli_fetch_array($query_check_field);
            $data_field=json_decode($data_user['data']);
            foreach($data_field as $i_key=>$i_val){
                $query_get_field=mysqli_query($link,"SELECT * FROM carrotsy_contacts.field_contacts WHERE `name`='$i_key' LIMIT 1");
                if(mysqli_num_rows($query_get_field)>0){
                    $data_item_field=mysqli_fetch_array($query_get_field);
                    $value_item=new Item_value();
                    $value_item->icon='https://contact.carrotstore.com/field_icon/'.$data_item_field['id'].'.png';
                    $value_item->key=$i_key;
                    $value_item->value=$i_val;
                    if($data_item_field['link']!=''){
                        $value_item->link=$data_item_field['link'].''.$i_val;
                    }
                    array_push($arr_other_field,$value_item);
                }
                mysqli_free_result($query_get_field);
            }
        }
        mysqli_free_result($query_check_field);
        
        //?ng d?ng d?m c?u
        $query_app_sheep=mysqli_query($link,"SELECT * FROM carrotsy_sheep.scores WHERE `id_user` = '$id_device_show' LIMIT 1");
        if(mysqli_num_rows($query_app_sheep)>0){
            $data_app_sheep=mysqli_fetch_array($query_app_sheep);
            $value_item=new Item_value();
            $value_item->icon='https://contact.carrotstore.com//image/sheep.png';
            $value_item->key='Counting sheep';
            $value_item->value='Go to bed (scores:'.$data_app_sheep['scores'].')';
            if($os=='android'){
                $value_item->link='https://play.google.com/store/apps/details?id=com.kurotsmile.demcuu3d';
            }else{
                $value_item->link='https://itunes.apple.com/us/app/id1409909203';
            }
            array_push($arr_other_field,$value_item);
        }
        mysqli_free_result($query_app_sheep);
     $u->arr_data_other=$arr_other_field;  
      
    
    if($is_user==1){
        $get_music_feel=mysqli_query($link,"SELECT * FROM `app_my_girl_music_data_$lang_sel` WHERE `device_id` = '$id_device_show' ORDER BY RAND() LIMIT 10");
        if(mysqli_num_rows($get_music_feel)>0){
            while($row_feel=mysqli_fetch_array($get_music_feel)){
                $get_song_name=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_$lang_sel` WHERE `id` = '".$row_feel['id_chat']."' LIMIT 1");
                if(mysqli_num_rows($get_song_name)>0){
                    $data_song=mysqli_fetch_array($get_song_name);
                    $status_feel_id=$row_feel['value'];
                    $status_feel_music=get_key_lang($link,"statu_music_user_$status_feel_id",$lang_sel);
                    $txt_show=$status_feel_music.' "'.$data_song[0].'"';
                    $item_user_test=array($row_feel['id_chat'],"$lang_sel","show_chat",$txt_show);
                    array_push($app->all_tip,$item_user_test);
                }
                mysqli_free_result($get_song_name);
            }
        }
        mysqli_free_result($get_music_feel);
        array_push($app->all_user,$u);
    }
    echo json_encode($app);
    exit;
}

if($func=='get_list_contact'){
    $id_sub_menu='';
    $txt_query_sex='';
    if(isset($_POST['id_sub_menu'])){
        $id_sub_menu=$_POST['id_sub_menu'];
    }
    
    if($id_sub_menu!=""){
        if($id_sub_menu!='2'){
            $txt_query_sex=" AND `sex`='$id_sub_menu' ";
        }
    }
    
    $seach=$_POST['search'];

    if($seach!=""){
        $list_users=mysqli_query($link,"SELECT `id_device`,`name`,`sex`,`sdt`,`address`,`status` FROM `app_my_girl_user_$lang_sel` WHERE `status` = '0'  AND `sdt`!='' AND  (MATCH (name)  AGAINST ('$seach' IN BOOLEAN MODE) or `sdt` LIKE '%$seach%') $txt_query_sex ORDER BY RAND() LIMIT 20");
    }else{
        $list_users=mysqli_query($link,"SELECT `id_device`,`name`,`sex`,`sdt`,`address`,`status` FROM `app_my_girl_user_$lang_sel` WHERE `status` = '0'  AND `sdt`!='' $txt_query_sex ORDER BY RAND() LIMIT 21");
    }
    
    if($list_users){
        while($row=mysqli_fetch_array($list_users)){
            $filename_avatar= 'app_my_girl_'.$lang_sel.'_user/'.$row['id_device'].'.png';
            if($row['sex']=='1'){
                $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default1.png','80x50');
            }else{
                $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default.png','80x50');
            }
            if (file_exists($filename_avatar)) {
                $txt_img_url=thumb(URL.'/app_mygirl/'.$filename_avatar,'80x50');
            } 
            $u=new User();
            $u->id=$row['id_device'];
            $u->name=$row['name'];
            $u->avatar=$txt_img_url;
            $u->address=$row['address'];
            $u->phone=$row['sdt'];
            $u->status=$row['status'];
            $u->sex=$row['sex'];
            $u->type="0";
            array_push($app->all_user,$u);
        }
    }
    
    $color_sel='000000';
    if($id_sub_menu=='2'){$color_sel='ff6347';}
    $arr_data_item=Array('2','2','msg_box_func',get_key_lang($link,'contact_all',$lang_sel),$color_sel);
    array_push($app->all_tip,$arr_data_item);
    
    $color_sel='000000';
    if($id_sub_menu=='0'){$color_sel='ff6347';}
    $arr_data_item=Array('0','2','msg_box_func',get_key_lang($link,'contact_sex_0',$lang_sel),$color_sel);
    array_push($app->all_tip,$arr_data_item);
    
    $color_sel='000000';
    if($id_sub_menu=='1'){$color_sel='ff6347';}
    $arr_data_item=Array('1','2','msg_box_func',get_key_lang($link,'contact_sex_1',$lang_sel),$color_sel);
    array_push($app->all_tip,$arr_data_item);
    echo json_encode($app);
    
    exit;
}

if($func=='set_status'){
    $text=$_POST['text'];
    $update_status=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `status` = '$text' WHERE `id_device`='$id_device'");
    $update_sex=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `sex`='$sex' WHERE `id_device` = '$id_device';");
    echo mysqli_error($link);
    echo "1";
    exit;
}

if($func=='add_user'){
    $txt_dc='';
    if($location_lon!='0'){
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
		if(isset($place->results[0]->formatted_address))$txt_dc=$place->results[0]->formatted_address;
        $txt_dc=str_replace('Unnamed Road,','',$txt_dc);
    }
                
    $new_name=$_POST['new_name'];
    $new_phone=$_POST['new_phone'];
    $check_user=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang_sel` WHERE `id_device` = '$id_device' LIMIT 1");
    if(mysqli_num_rows($check_user)>0){
        if($txt_dc==""){
            $add_account=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `name` = '$new_name', `date_cur` = now(),`sdt` = '$new_phone' WHERE `id_device` = '$id_device'");
        }else{
            $add_account=mysqli_query($link,"UPDATE `app_my_girl_user_$lang_sel` SET `name` = '$new_name', `date_cur` = now(), `address` = '$txt_dc',`sdt` = '$new_phone' WHERE `id_device` = '$id_device'");
        }
    }else{
        $update_account=mysqli_query($link,"INSERT INTO `app_my_girl_user_$lang_sel` (`id_device`,`name`,`sex`,`date_start`,`date_cur`,`sdt`,`address`) VALUES ('$id_device','$new_name','$sex',now(),now(),'$new_phone','$txt_dc');");
    }
    echo "1";
    mysqli_free_result($check_user);
    mysqli_close($link);
    exit;
}

if($func=="music_emotion"){
    $sub_func=$_POST['sub_func'];
    $id_music=$_POST['id_music'];
    $user_sel_emotion='-1';
    
    $m_count_fun="0";
    $m_count_sad="0";
    $m_count_serenity="0";
    $m_count_excited="0";
    
    $check_emotion=mysqli_query($link,"SELECT `value` FROM `app_my_girl_music_data_$lang_sel` WHERE `device_id` = '$id_device' AND `id_chat` = '$id_music' LIMIT 1");
    if(mysqli_num_rows($check_emotion)>0){
        $data_check=mysqli_fetch_array($check_emotion);
        $user_sel_emotion=$data_check[0];
        
        $query_count_fun=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '0' AND `id_chat` = '$id_music'");
        $query_count_sad=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '1' AND `id_chat` = '$id_music'");
        $query_count_serenity=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '2' AND `id_chat` = '$id_music'");
        $query_count_excited=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '3' AND `id_chat` = '$id_music'");
        
        $data_0=mysqli_fetch_array($query_count_fun);
        $data_1=mysqli_fetch_array($query_count_sad);
        $data_2=mysqli_fetch_array($query_count_serenity);
        $data_3=mysqli_fetch_array($query_count_excited);
        
        $m_count_fun=$data_0[0];
        $m_count_sad=$data_1[0];
        $m_count_serenity=$data_2[0];
        $m_count_excited=$data_3[0];
        
        mysqli_free_result($query_count_fun);
        mysqli_free_result($query_count_sad);
        mysqli_free_result($query_count_serenity);
        mysqli_free_result($query_count_excited);
        
    }else{
        $user_sel_emotion='-1';
    }
    mysqli_free_result($check_emotion);
    
    if($sub_func=="set"){
        $sel_emotion=$_POST['sel_emotion'];
        
        if($user_sel_emotion=='-1'){
            $add_emotion_music=mysqli_query($link,"INSERT INTO `app_my_girl_music_data_$lang_sel` (`device_id`, `value`, `id_chat`) VALUES ('$id_device', '$sel_emotion', '$id_music');");
        }else{
            $update_emotion_music=mysqli_query($link,"UPDATE `app_my_girl_music_data_$lang_sel` SET  `value` = '$sel_emotion' WHERE `device_id` = '$id_device' AND `id_chat` = '$id_music' LIMIT 1;");
        }
        
        $user_sel_emotion=$sel_emotion;
        
        $query_count_fun=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '0' AND `id_chat` = '$id_music'");
        $query_count_sad=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '1' AND `id_chat` = '$id_music'");
        $query_count_serenity=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '2' AND `id_chat` = '$id_music'");
        $query_count_excited=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `value` = '3' AND `id_chat` = '$id_music'");
        
        $data_0=mysqli_fetch_array($query_count_fun);
        $data_1=mysqli_fetch_array($query_count_sad);
        $data_2=mysqli_fetch_array($query_count_serenity);
        $data_3=mysqli_fetch_array($query_count_excited);
        
        $m_count_fun=$data_0[0];
        $m_count_sad=$data_1[0];
        $m_count_serenity=$data_2[0];
        $m_count_excited=$data_3[0];
        
        mysqli_free_result($query_count_fun);
        mysqli_free_result($query_count_sad);
        mysqli_free_result($query_count_serenity);
        mysqli_free_result($query_count_excited);
    }
    
    $arr_music=array("$user_sel_emotion","$m_count_fun","$m_count_sad","$m_count_serenity","$m_count_excited");
    echo json_encode($arr_music);
    mysqli_close($link);
    exit;
}


mysqli_close($link);