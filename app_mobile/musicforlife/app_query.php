<?php
include "config.php";
include "app_function.php";

Class App{
    public $list=array();
    public $list_country=array();
}

Class Item{
    public $name='';
    public $icon='';
    public $id='';
    public $type='';
    public $lyrics='';
    public $img_video='';
    public $link_ytb='';
    public $link_store='';
    public $lang='';
    public $artist='';
    public $album='';
    public $genre='';
    public $year='';
}

$app=new App();

$func='';
$lang='';
$id_device='';
$c_country_show='1';

if(isset($_POST['func'])){
    $func=$_POST['func'];
}
if(isset($_POST['lang'])){ $lang=$_POST['lang'];}
if(isset($_POST['id_device'])){$id_device=$_POST['id_device'];}
if(isset($_POST['c_country'])){$c_country_show=$_POST['c_country'];}

if($func=='list_music'){
    $sel_lang=$_POST['lang_music'];
    $app->list=Array();
    $query_music=mysql_query("SELECT `id`,`chat`,`color`,`file_url`,`author` FROM carrotsy_virtuallover.`app_my_girl_$sel_lang` WHERE `effect` = '2' ORDER BY rand() LIMIT 15");
    while($row=mysql_fetch_assoc($query_music)){
        $item_music=new Item();
        $item_music->id=$row['id'];
        $item_music->name=$row['chat'];
        if($row['file_url']!=''){
            $item_music->{"url"} = $row['file_url'];
        }else {
            $item_music->{"url"} = 'https://carrotstore.com/app_mygirl/app_my_girl_' . $row['author'] . '/' . $row['id'] . '.mp3';
        }
        $item_music->{"color"}=$row['color'];
        $item_music->type='0';
        $item_music->link_store='http://carrotstore.com/music/'.$row['id'].'/'.$row['author'];
        $item_music->lang=$row['author'];

        $query_lyrics=mysql_query("SELECT `lyrics`,`genre`,`year`,`album`,`artist` FROM carrotsy_virtuallover.`app_my_girl_".$row['author']."_lyrics` WHERE `id_music` = '".$row['id']."' LIMIT 1");
        if(mysql_num_rows($query_lyrics)>0){
            $data_lyrics=mysql_fetch_assoc($query_lyrics);
            $item_music->lyrics=$data_lyrics['lyrics'];
            $item_music->genre=$data_lyrics['genre'];
            $item_music->year=$data_lyrics['year'];
            $item_music->album=$data_lyrics['album'];
            $item_music->artist=$data_lyrics['artist'];
        }

        $query_video=mysql_query("SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_".$row['author']."` WHERE `id_chat` = '".$row["id"]."' LIMIT 1");
        if(mysql_num_rows($query_video)){
            $data_video=mysql_fetch_array($query_video);
            $item_music->link_ytb=$data_video['link'];
        }

        if(does_url_exists("https://carrotstore.com/app_mygirl/app_my_girl_".$row['author']."_img/".$row['id'].".png")){
            $item_music->img_video='https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/app_my_girl_'.$row['author'].'_img/'.$row['id'].'.png&size=60';
        }else{
            if($item_music->link_ytb!=''){
                $my_array_of_vars=null;
                parse_str( parse_url($item_music->link_ytb, PHP_URL_QUERY ), $my_array_of_vars );
                $item_music->img_video='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg';
            }
        }

        array_push($app->list,$item_music);
    }

    if(intval($c_country_show)<=1) {
        $query_list_country = mysql_query("SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while ($row_lang = mysql_fetch_assoc($query_list_country)) {
            $country_item = new Item();
            $country_item->id = $row_lang['id'];
            $country_item->name = $row_lang['name'];
            $country_item->{"key"} = $row_lang['key'];
            $country_item->{"type"} = '0';
            $country_item->icon = 'http://carrotstore.com//app_mygirl/img/' . $row_lang['key'] . '.png';
            array_push($app->list_country, $country_item);
        }
    }
}

if($func=='list_radio'){
    $sel_lang=$_POST['lang_radio'];
    $app->list=Array();
    $query_radio=mysql_query("SELECT `id`,`stream`,`name_radio` FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `lang` = '$sel_lang' LIMIT 20");
    while($row_radio=mysql_fetch_assoc($query_radio)){
        $item_radio=new Item();
        $item_radio->id=$row_radio['id'];
        $item_radio->{"url"}=$row_radio['stream'];
        $item_radio->name=$row_radio['name_radio'];
        $item_radio->{"color"}='#C70039';
        $item_radio->type='1';
        $item_radio->{"img_video"}="http://carrotstore.com/thumb.php?src=http://carrotstore.com//app_mygirl/obj_radio/icon_".$item_radio->id.".png&size=50&trim=1";
        array_push($app->list,$item_radio);
    }
    mysql_free_result($query_radio);

    if(intval($c_country_show)<=1) {
        $query_list_country = mysql_query("SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while ($row_lang = mysql_fetch_array($query_list_country)) {
            $country_item = new Item();
            $country_item->id = $row_lang['id'];
            $country_item->name = $row_lang['name'];
            $country_item->{"key"} = $row_lang['key'];
            $country_item->{"type"} = '1';
            $country_item->icon = 'http://carrotstore.com//app_mygirl/img/' . $row_lang['key'] . '.png';
            array_push($app->list_country, $country_item);
        }
    }
}

if($func=='list_sound'){
    $query_sound=mysql_query("SELECT `id`,`name` FROM carrotsy_sheep.`sound` LIMIT 50");
    while($row_sound=mysql_fetch_assoc($query_sound)){
        $item_sound=new Item();
        $item_sound->id=$row_sound['id'];
        $item_sound->{"url"}='http://sheep.carrotstore.com/music/'.$row_sound['id'].'.mp3';
        $item_sound->name=$row_sound['name'];
        $item_sound->{"color"}='#3498DB';
        $item_sound->type='2';
        $item_sound->{"img_video"}="";
        array_push($app->list,$item_sound);
    }
    mysql_free_result($query_sound);
}


if($func=='list_lang'){
    $app->list=array();
    $query_list_country=mysql_query("SELECT `id`,`name`,`key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysql_fetch_array($query_list_country)){
        $country_item=new Item();
        $country_item->id=$row_lang['id'];
        $country_item->name=$row_lang['name'];
        $country_item->{"key"}=$row_lang['key'];
        $country_item->icon='http://carrotstore.com//app_mygirl/img/'.$row_lang['key'].'.png';
        array_push($app->list_country,$country_item);
    }
}

if($func=='download_lang'){
    $lang_sel=$_POST['lang_sel'];
    $query_value_lang=mysql_query("SELECT `data` FROM carrotsy_music.`key_value` WHERE `lang` = '$lang_sel' LIMIT 1");
    $data_val=mysql_fetch_array($query_value_lang);
    $data_display=json_decode($data_val['data']);
    foreach($data_display as $k=>$v){
        $app->{$k}=$v;
    }
}

if($func=='list_search_key'){
    $sel_lang=$_POST['lang'];
    $app->list=Array();
    $query_list_key=mysql_query("SELECT `key` FROM carrotsy_music.`log_key` WHERE `lang` = '$sel_lang' ORDER BY RAND() LIMIT 12");
    while($row_key=mysql_fetch_assoc($query_list_key)){
        $key_item=new Item();
        $key_item->name=$row_key['key'];
        array_push($app->list,$key_item);
    }
}

if($func=='search'){
    $key_search=$_POST['key'];
    $save_key=$_POST['save_key'];
    $app->list=Array();

    if($save_key=='1'){
        $lang_app=$_POST['lang'];
        $query_inster_key=mysql_query("INSERT INTO carrotsy_music.`log_key` (`key`, `lang`,`date`) VALUES ('$key_search', '$lang_app',now())");
    }
    
    $list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
    $txt_query='';
    $txt_query_2='';
    $count_l=mysql_num_rows($list_country);
    $count_index=0;
    while($l=mysql_fetch_array($list_country)){
        $key=$l['key'];
        $txt_query.="(SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE  `chat` LIKE '%$key_search%' AND  `effect`='2' AND `disable` = '0' limit 21)";
        $txt_query_2.=" (SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$key_search' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
        $count_index++;
        if($count_index!=$count_l){
        $txt_query.=" UNION ALL ";
        $txt_query_2.=" UNION ALL ";
        }
    }
    
    $query_music=mysql_query($txt_query);
    
    if(mysql_num_rows($query_music)==0){
        $query_music=mysql_query($txt_query_2);
    }
    
    while($row=mysql_fetch_assoc($query_music)){
        $item_music=new Item();
        $item_music->id=$row['id'];
        $item_music->name=$row['chat'];
        if($row['file_url']!=''){
            $item_music->{"url"} = $row['file_url'];
        }else {
            $item_music->{"url"} = 'https://carrotstore.com/app_mygirl/app_my_girl_' . $row['author'] . '/' . $row['id'] . '.mp3';
        }
        $item_music->{"color"}=$row['color'];
        $item_music->type='0';
        $item_music->link_store='http://carrotstore.com/music/'.$row['id'].'/'.$row['author'];
        $item_music->lang=$row['author'];
        
        $query_lyrics=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_".$row['author']."_lyrics` WHERE `id_music` = '".$row['id']."' LIMIT 1");
        if(mysql_num_rows($query_lyrics)>0){
            $data_lyrics=mysql_fetch_assoc($query_lyrics);
            $item_music->lyrics=$data_lyrics['lyrics'];
            $item_music->genre=$data_lyrics['genre'];
            $item_music->year=$data_lyrics['year'];
            $item_music->album=$data_lyrics['album'];
            $item_music->artist=$data_lyrics['artist'];
        }else{
            $item_music->lyrics="";
        }
                
        $query_video=mysql_query("SELECT `link` FROM carrotsy_virtuallover.`app_my_girl_video_".$row['author']."` WHERE `id_chat` = '".$row["id"]."' LIMIT 1");
        if(mysql_num_rows($query_video)){
                $data_video=mysql_fetch_array($query_video);
                $item_music->link_ytb=$data_video['link'];
                if($data_video['link']!=''){
                        $my_array_of_vars=null;
                        parse_str( parse_url($data_video['link'], PHP_URL_QUERY ), $my_array_of_vars );
                        $item_music->img_video='https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/hqdefault.jpg'; 
                }
        }else{
            $item_music->img_video="";
            $item_music->link_ytb="";
        }
        array_push($app->list,$item_music);
    }
}

if($func=='list_ads'){
    $os=$_POST['os'];
    $app->list=array();
    $query_app_more=mysql_query("SELECT `id`,`name`,`$os` FROM carrotsy_virtuallover.`app_my_girl_ads` LIMIT 50");
    while($row_app=mysql_fetch_array($query_app_more)){
        $item_ads=new Item();
        $item_ads->icon='http://carrotstore.com/img.php?url=app_mygirl/obj_ads/icon_'.$row_app['id'].'.png&size=60';
        $item_ads->name=$row_app["name"];
        $item_ads->type=$row_app[$os];
        array_push($app->list,$item_ads);
    }
    mysql_free_result($query_app_more);
    echo json_encode($app);
}

if($func=='rate_music'){
    $id_music=$_POST['id_music'];
    $lang_music=$_POST['lang_music'];
    $id_device=$_POST['id_device'];
    $sel_rate=$_POST['sel_rate'];
    $query_data_select=mysql_query("SELECT `value` FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `device_id` = '$id_device' LIMIT 1");
    if(mysql_num_rows($query_data_select)){
        $update_rate=mysql_query("UPDATE `app_my_girl_music_data_$lang_music` SET  `value` = '$sel_rate' WHERE `device_id` = '$id_device'  AND `id_chat` = '$id_music' LIMIT 1;");
    }else{
        $add_rate=mysql_query("INSERT INTO `app_my_girl_music_data_$lang_music` (`device_id`, `value`, `id_chat`) VALUES ('$id_device', '$sel_rate', '$id_music');");
    }
}

if($func=='rate_get'){
    $id_music=$_POST['id_music'];
    $lang_music=$_POST['lang_music'];
    $id_device=$_POST['id_device'];
    $query_data_select=mysql_query("SELECT `value` FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `device_id` = '$id_device' LIMIT 1");
    $query_data_0=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '0'");
    $query_data_1=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '1'");
    $query_data_2=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '2'");
    $query_data_3=mysql_query("SELECT COUNT(`device_id`) FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' AND `value` = '3'");
    $arr_data=array();
    if(mysql_num_rows($query_data_0)){
        $data_0=mysql_fetch_array($query_data_0);
        array_push($arr_data,$data_0[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_1)){
        $data_1=mysql_fetch_array($query_data_1);
        array_push($arr_data,$data_1[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_2)){
        $data_2=mysql_fetch_array($query_data_2);
        array_push($arr_data,$data_2[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_3)){
        $data_3=mysql_fetch_array($query_data_3);
        array_push($arr_data,$data_3[0]);
    }else{
        array_push($arr_data,0);
    }
    
    if(mysql_num_rows($query_data_select)){
        $data_select=mysql_fetch_array($query_data_select);
        array_push($arr_data,$data_select['value']);
    }else{
        array_push($arr_data,-1); 
    }
    echo json_encode($arr_data);
    exit;
}

if($func=='check_login') {
    $user_phone = $_POST['user_phone'];
    $query_user_login=mysql_query("SELECT `name`,`sdt`,`address`,`sex`,`email`,`status`,`avatar_url`,`date_start`,`id_device`,`password` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `sdt`='$user_phone' AND `password`!='' ");

    if(mysql_num_rows($query_user_login)){
        $arr_user=array();
        while($row_user=mysql_fetch_assoc($query_user_login)){
            if(does_url_exists('https://carrotstore.com/app_mygirl/app_my_girl_'.$lang.'_user/'.$row_user['id_device'].'.png')) {
                $row_user["avatar_url"] = "https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/" . $row_user['id_device'] . ".png&size=60";
            }
            array_push($arr_user,$row_user);
        }
        echo json_encode($arr_user);
    }else{
        echo "none";
    }
    exit;
}

if($func=='update_account') {
    $user_phone=$_POST['user_phone'];
    $user_pass=$_POST['user_password'];
    $account_name=$_POST['name'];
    $account_sex=$_POST['sex'];
    $account_sdt=$_POST['sdt'];
    $account_address=$_POST['address'];
    $account_status=$_POST['status'];
    $account_email=$_POST['email'];
    $txt_error='';
    if(trim($account_name)==""||strlen($account_name)<5){
        $txt_error="account_error_name";
    }
    if(trim($account_email)!=""&&$txt_error==''){
        if (!filter_var($account_email, FILTER_VALIDATE_EMAIL)) {
            $txt_error="account_error_email";
        }
    }
    if($txt_error==''){
        $query_update_user = mysql_query("UPDATE carrotsy_virtuallover.app_my_girl_user_$lang SET `name` = '$account_name',`sdt` = '$account_sdt',`sex`='$account_sex',`status`='$account_status',`address`='$account_address' WHERE `sdt` = '$user_phone' AND `password`='$user_pass' LIMIT 1");
        unset($_POST['os']);
        unset($_POST['func']);
        unset($_POST['user_password']);
        unset($_POST['user_phone']);
        unset($_POST['lang']);
        unset($_POST['c_country']);
        $_POST['password'] = $user_pass;
        $app->{"error"}="";
        $app->{"data"} = json_encode($_POST);
    }else{
        $app->{"error"}=$txt_error;
    }
    echo json_encode($app);
    exit;
}

if($func=='add_account') {
    $id_device=uniqid().uniqid();
    $user_phone=$_POST['user_phone'];
    $user_pass=$_POST['user_password'];
    $account_name=$_POST['name'];
    $account_sex=$_POST['sex'];
    $account_address=$_POST['address'];
    $account_status=$_POST['status'];
    $account_email=$_POST['email'];
    if(trim($account_name)==""||strlen($account_name)<5){
        $app->{"error"}="account_error_name";
    }else {
        $query_add_user = mysql_query("INSERT INTO carrotsy_virtuallover.app_my_girl_user_$lang (`id_device`, `name`,`sdt`,`status`,`sex`,`date_start`,`date_cur`,`address`,`password`) VALUES ('" . $id_device . "', '$account_name', '$user_phone', '$account_status','$account_sex',NOW(),NOW(),'$account_address','$user_pass');");
        if (mysql_error() != '') {
            $app->{"error"} = mysql_error();
        } else {
            unset($_POST['os']);
            unset($_POST['func']);
            unset($_POST['user_password']);
            unset($_POST['user_phone']);
            unset($_POST['lang']);
            unset($_POST['c_country']);
            $_POST['password'] = $user_pass;
            $_POST['sdt'] = $user_phone;

            $app->{"error"}="";
            $app->{"user_id"} = $id_device;
            $app->{"data"} = json_encode($_POST);
        }
    }
    echo json_encode($app);
    exit;
}

if($func=='change_password') {
    $user_phone=$_POST['user_phone'];
    $user_pass=$_POST['user_password'];
    $new_password=$_POST['new_password'];
    $query_change_password = mysql_query("UPDATE carrotsy_virtuallover.app_my_girl_user_$lang SET `password`='$new_password' WHERE `sdt` = '$user_phone' AND `password`='$user_pass' LIMIT 1");
    if($query_change_password){
        echo '1';
    }else{
        echo '0';
    }
    exit;
}

if($func=='show_list_playlist') {
    $id_device=$_POST['id_device'];
    $query_playlist=mysql_query("SELECT `id`,`name`,`data`,`length` FROM `playlist_$lang` WHERE `user_id` = '$id_device'");
    $array_playlist=array();
    while($playlist=mysql_fetch_assoc($query_playlist)){
        $item_playlist=new Item();
        $item_playlist->name=$playlist['name'];
        $item_playlist->desc=$playlist['data'];
        $item_playlist->id=$playlist['id'];
        $item_playlist->{"length"}=$playlist['length'];
        array_push($array_playlist,$item_playlist);
    }
    echo json_encode($array_playlist);
    exit;
}

if($func=='delete_playlist'){
    $id_playlist=$_POST['id'];
    $query_delete_playlist=mysql_query("DELETE FROM `playlist_$lang` WHERE `id` = '$id_playlist'");
    exit;
}

if($func=='delete_song_in_playlist'){
    $id_delete=$_POST['id_delete'];
    $lang_delete=$_POST['lang_delete'];
    $id_playlist=$_POST['id_playlist'];
    $s_data=preg_replace( "/\r|\n/", "", $_POST['data']);
    $data_playlist=json_decode($s_data);
    $array_new=array();
    for($i=0;$i<count($data_playlist);$i++){
        $item_song=$data_playlist[$i];
        if($id_delete==$item_song->id&&$lang_delete==$item_song->author){
        }else{
            array_push($array_new,$item_song);
        }
    }
    $length=count($array_new);
    $data_new=json_encode($array_new,JSON_UNESCAPED_UNICODE);
    $query_update_playlist=mysql_query("UPDATE `playlist_$lang` SET `data` = '$data_new' , `length` = '$length' WHERE `id` = '$id_playlist'  LIMIT 1;");
    echo mysql_error();
    echo json_encode($array_new);
    exit;
}

if($func=='create_playlist'){
    $name_playlist=$_POST['name_playlist'];
    $id_new=uniqid().''.uniqid();
    $array_playlist=array();
    $data=json_encode($array_playlist);
    $query_add_playlist=mysql_query("INSERT INTO `playlist_vi` (`id`, `user_id`, `data`, `name`, `length`) VALUES ('$id_new', '$id_device', '$data', '$name_playlist', '0');");
    echo var_dump($_POST);
    exit;
}

if($func=='add_song_playlist'){
    $id_music_add=$_POST['id_music_add'];
    $lang_music_add=$_POST['lang_music_add'];
    $id_playlist=$_POST['id_playlist'];
    $s_data=preg_replace( "/\r|\n/", "", $_POST['data_playlist']);
    $data_playlist=json_decode($s_data,JSON_UNESCAPED_UNICODE);
    $query_music=mysql_query("SELECT `id`,`chat`,`color`,`file_url`,`author` FROM carrotsy_virtuallover.`app_my_girl_$lang_music_add` WHERE `id`='$id_music_add' LIMIT 1");
    $data_music=mysql_fetch_assoc($query_music);

    array_push($data_playlist,$data_music);
    $length=count($data_playlist);
    $data_playlist=json_encode($data_playlist,JSON_UNESCAPED_UNICODE);
    $query_update_playlist=mysql_query("UPDATE `playlist_$lang` SET `data` = '$data_playlist' , `length` = '$length' WHERE `id` = '$id_playlist'  LIMIT 1;");
    echo mysql_error();
    exit;
}

if($func=='update_name_playlist'){
    $name_playlist=$_POST['name_playlist'];
    $id_playlist=$_POST['id_playlist'];
    $query_update_playlist=mysql_query("UPDATE `playlist_$lang` SET `name` = '$name_playlist' WHERE `id` = '$id_playlist' LIMIT 1;");
    echo mysql_error();
    exit;
}

if($func=='list_background'){
    $query_bk=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_background WHERE `version` = '1' ORDER BY RAND() LIMIT 21");
    $array_bk=array();
    while ($row_bk=mysql_fetch_assoc($query_bk)){
        $item_bk=new Item();
        $item_bk->url="https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/obj_background/icon_".$row_bk['id'].".png&size=80&trim=1";
        $item_bk->{"url_bk"}="https://carrotstore.com/app_mygirl/obj_background/icon_".$row_bk['id'].".png";
        array_push($array_bk,$item_bk);
    }
    echo json_encode($array_bk);
    echo mysql_error();
    exit;
}

if($func=='list_info'){
    $type=$_POST['type'];
    $txt_order=' ORDER BY RAND() ';
    if($type=='year'){
        $txt_order=' ORDER BY `year` DESC ';
    }
    $query_artist=mysql_query("SELECT DISTINCT `$type` FROM carrotsy_virtuallover.`app_my_girl_".$lang."_lyrics` WHERE `$type`!='' $txt_order LIMIT 50");
    $array_artist=array();
    while($row_artist=mysql_fetch_assoc($query_artist)){
        $item_artist=new Item();
        $item_artist->name=$row_artist[$type];
        array_push($array_artist,$item_artist);
    }
    echo json_encode($array_artist);
    exit;
}

if($func=='get_list_item_info'){
    $type=$_POST['type'];
    $s_id=$_POST['s_id'];
    $s_lang=$_POST['s_lang'];
    if($s_lang==''){
        $s_lang=$lang;
    }
    $array_music=array();
    $list_music = mysql_query("SELECT m.`id`, m.`chat`,m.`color`, m.`file_url`, m.`slug`,m.`author`,l.`lyrics`,l.`artist`,l.`album`,l.`year`,l.`genre`,y.`link` From carrotsy_virtuallover.`app_my_girl_".$s_lang."` as `m` LEFT JOIN carrotsy_virtuallover.`app_my_girl_".$s_lang."_lyrics` as `l` ON m.id= l.id_music LEFT JOIN carrotsy_virtuallover.`app_my_girl_video_".$s_lang."` as `y` ON m.id= y.id_chat  WHERE l.$type ='".$s_id."' ORDER BY RAND() LIMIT 20");
    while($row_music=mysql_fetch_assoc($list_music)){
        $item_music=new Item();
        $url_img='https://carrotstore.com/thumb.php?src=https://carrotstore.com/app_mygirl/app_my_girl_'.$row_music['author'].'_img/'.$row_music['id'].'.png&size=60';
        if(does_url_exists("https://carrotstore.com/app_mygirl/app_my_girl_".$row_music['author']."_img/".$row_music['id'].".png")){
            $item_music->img_video=$url_img;
        }else{
            $item_music->img_video='';
        }
        $item_music->album=$row_music['album'];
        $item_music->year=$row_music['year'];
        $item_music->artist=$row_music['artist'];
        $item_music->genre=$row_music['genre'];
        $item_music->name=$row_music['chat'];
        $item_music->lang=$row_music['author'];
        $item_music->id=$row_music['id'];
        $item_music->{'color'}=$row_music['color'];
        $item_music->link_ytb=$row_music['link'];
        if($row_music['file_url']!=''){
            $item_music->{"url"} = $row_music['file_url'];
        }else {
            $item_music->{"url"} = 'https://carrotstore.com/app_mygirl/app_my_girl_' . $row_music['author'] . '/' . $row_music['id'] . '.mp3';
        }
        $item_music->lyrics=$row_music['lyrics'];
        array_push($array_music,$item_music);
    }
    echo json_encode($array_music);
    exit;
}

if($func=='account_sync'){
    $user_phone=$_POST['user_phone'];
    $user_password=$_POST['user_password'];
    $query_user_login=mysql_query("SELECT `name`,`sdt`,`address`,`sex`,`email`,`status`,`avatar_url`,`date_start`,`id_device`,`password` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `sdt`='$user_phone' AND `password`='$user_password' AND `id_device`='$id_device' Limit 1");
    if(mysql_num_rows($query_user_login)>0){
        $data_user=mysql_fetch_assoc($query_user_login);
        if(does_url_exists('https://carrotstore.com/app_mygirl/app_my_girl_'.$lang.'_user/'.$data_user['id_device'].'.png')) {
            $app->{"avatar_url"}="https://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/" . $data_user['id_device'] . ".png&size=60";
        }else{
            $app->{"avatar_url"}="";
        }
        $app->{"error"}="";
        $app->{"user_id"} = $id_device;
        $app->{"data"} = json_encode($data_user);
    }else{
        $app->{"error"}=mysql_error();
    }
    echo json_encode($app);
    exit;
}
echo json_encode($app);
