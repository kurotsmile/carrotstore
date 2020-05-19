<?php
include "config.php";
include "data.php";

$func=$_POST['func'];

class Comment{
    public $avatar='';
    public $username='';
    public $id_device=''; 
    public $data='';   
}
    
class Flower{
    public $id='';
    public $msg='';
    public $author='';
    public $voice='';
    public $count_like='';
    public $count_distlike='';
    public $count_comment='';
    public $list_coment=array();
}
    

Class Contacts{
    public $id;
    public $name;
    public $address;
    public $phone;
    public $avatar;
    public $sex;
    public $type;
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

Class Contact_view{
    public $contact='';
    public $arr_value=array();
}
    

if($func=='load_lang'){
    echo json_encode($app_flower);
    exit;
}


if($func=="download_lang"){
    $id=$_POST['id'];
    echo json_encode($app_flower->list_lang[$id]);
    exit;
}

if($func=='get_flower'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    class Flower{
        public $msg='';
        public $author='';
    }
    $mysql_get_flower=mysql_query("SELECT * FROM `flower` WHERE `lang`='$lang' order by rand() LIMIT 1");
    $data_flower=mysql_fetch_array($mysql_get_flower);
    $flower=new Flower();
    $flower->msg=$data_flower['msg'];
    $flower->author=$data_flower['author'];
    mysql_free_result($mysql_get_flower);
    
    $mysql_add_log=mysql_query("INSERT INTO `log_day` (`id_user`, `msg`, `dates`, `lang`) VALUES ('$id_device', '".$data_flower['id']."', NOW(), '$lang');");
    mysql_free_result($mysql_add_log);
    echo json_encode($flower);
}

if($func=="list_music"){
    Class Item_music{
        public $id='';
        public $name='';
        public $url='';
        public $buy='';    
    }
    
    $app_flower=new App_flower();
    $app_flower->list_lang=array();
    $query_list_music=mysql_query('SELECT * FROM carrotsy_sheep.sound  ORDER BY RAND()');
    while ($row_music = mysql_fetch_array($query_list_music)) {
        $item_m=new Item_music();
        $item_m->id=$row_music['id'];
        $item_m->name=$row_music['name'];
        $item_m->buy=$row_music['buy'];
        $item_m->url='http://sheep.carrotstore.com/music/'.$row_music['id'].'.mp3';
        array_push($app_flower->list_lang,$item_m);
    }
    echo json_encode($app_flower);
    exit;
}


if($func=='get_list_app'){
    Class App_info{
        public $icon;
        public $name;
        public $url;
    }
    $os=$_POST['os'];
    
    $app_flower=new App_flower();
    $app_flower->list_lang=array();
    $query_get_app=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_ads");
    while ($app_i = mysql_fetch_array($query_get_app)) {
        $app_item=new App_info();
        $app_item->icon='http://carrotstore.com/img.php?url=app_mygirl/obj_ads/icon_'.$app_i['id'].'.png&size=60';
        $app_item->name=$app_i['name'];
        if($os=='android'){
            $app_item->url=$app_i['android'];
        }else{
            $app_item->url=$app_i['ios'];
        }
        array_push($app_flower->list_lang,$app_item);
    }
    echo json_encode($app_flower);
    exit;
}

if($func=='add_maxim'){
    $maxim_msg=$_POST['msg'];
    $maxim_author=$_POST['author'];
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    $query_add_maxim=mysql_query("INSERT INTO `flower` (`msg`, `user_name`,`author`,`active`, `lang`) VALUES ('$maxim_msg', '$id_device', '$maxim_author', '1', '$lang');");
    mysql_free_result($query_add_maxim);
}


if($func=='get_list_msg'){
    class Item_msg{
        public $msg='';
        public $author='';
    }
    
    $lang=$_POST['lang'];
    $query_get_list=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_$lang WHERE `effect` = '36' AND `disable` = '0' AND `id_redirect`='' ORDER BY RAND() LIMIT 20");
    $app_flower=new App_flower();
    $app_flower->list_lang=array();
    
    while($row_msg=mysql_fetch_array($query_get_list)){
        $item_msg=new Item_msg();
        $item_msg->msg=$row_msg['chat'];
        $item_msg->author='';
        array_push($app_flower->list_lang,$item_msg);
    }
    
    mysql_free_result($query_get_list);
    echo json_encode($app_flower);
    exit;
}

if($func=='count_maxim'){
    $lang=$_POST['lang'];
    $count_maxim=mysql_query("SELECT COUNT(`id`) FROM carrotsy_virtuallover.app_my_girl_$lang WHERE `effect` = '36' AND `id_redirect`=''");
    $arr_data=mysql_fetch_array($count_maxim);
    echo $arr_data[0];
    exit;
}

if($func=='get_maxim'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];

    $mysql_get_flower=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_$lang WHERE `effect` = '36' AND `disable` = '0' AND `id_redirect`='' ORDER BY RAND() LIMIT 1");
    $data_flower=mysql_fetch_array($mysql_get_flower);
    $flower=new Flower();
    $flower->id=$data_flower['id'];
    $flower->msg=$data_flower['chat'];
    $flower->voice="http://carrotstore.com/app_mygirl/app_my_girl_$lang/".$data_flower['id'].".mp3";
    //$flower->author=$data_flower['author'];
    
    $query_count_like=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '".$data_flower['id']."'");
    $data_count_like=mysql_fetch_array($query_count_like);
    $flower->count_like=$data_count_like[0];
    mysql_free_result($query_count_like);
    
    $query_count_distlike=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '".$data_flower['id']."'");
    $data_count_distlike=mysql_fetch_array($query_count_distlike);
    $flower->count_distlike=$data_count_distlike[0];
    mysql_free_result($query_count_distlike);
    
    $query_count_comment=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '".$data_flower['id']."'");
    $data_count_comment=mysql_fetch_array($query_count_comment);
    $flower->count_comment=$data_count_comment[0];
    mysql_free_result($query_count_comment);
    
    $query_list_comment=mysql_query("SELECT * FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '".$data_flower['id']."'");
    while ($row_comment = mysql_fetch_array($query_list_comment)) {
        $cm=new Comment();
        $cm->id_device=$row_comment['id_device'];
        $query_account=mysql_query("SELECT * FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '".$cm->id_device."'");
        if(mysql_num_rows($query_account)>0){
            $data_account=mysql_fetch_array($query_account);
            $cm->username=$data_account['name'];
            $cm->avatar="http://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$cm->id_device.".png&size=80";
            $cm->id_device=$data_account['id_device'];
        }
        $cm->data=$row_comment['data'];
        mysql_free_result($query_account);
        array_push($flower->list_coment,$cm);
    }
    mysql_free_result($query_list_comment);
    
    mysql_free_result($mysql_get_flower);
    
    $mysql_add_log=mysql_query("INSERT INTO `log_day` (`id_user`, `msg`, `dates`, `lang`) VALUES ('$id_device', '".$data_flower['id']."', NOW(), '$lang');");
    mysql_free_result($mysql_add_log);
    echo json_encode($flower);
}


if($func=='get_style_flower'){
    $query_get_flower=mysql_query("SELECT * FROM `flower_style` ORDER BY RAND() LIMIT 1");
    $data_flower=mysql_fetch_array($query_get_flower);
    mysql_free_result($data_flower);
    $d_flower=json_decode($data_flower['data']);
    $d_flower->sound=$url.'/sound/'.$d_flower->sound.'.mp3';
    echo json_encode($d_flower);
    exit;
}

if($func=='list_background'){
    class Skin_item{
        public $name='';
        public $icon='';
        public $url='';
        public $url2='';
        public $id_store='';
    }

    $list_view=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_background WHERE `version`!='2' ORDER BY RAND() LIMIT 15");
    
    $app_flower=new App_flower();
    $app_flower->list_data=array();
    
    while($row=mysql_fetch_array($list_view)){
        $skin_item=new Skin_item();
        $skin_item->name=$row['name'];
        $skin_item->url='http://carrotstore.com/app_mygirl/obj_background/icon_'.$row[0].'.png';
        $skin_item->icon='http://carrotstore.com/img.php?url=app_mygirl/obj_background/icon_'.$row[0].'.png&size=150';
        array_push($app_flower->list_data,$skin_item);
    }
    echo json_encode($app_flower);
    mysql_free_result($list_view);
    exit;
}

if($func=='view_contact'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    $os=$_POST['os'];
    
    $contact_view=new Contact_view();

    $query_contact=mysql_query("SELECT * FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_device'");
    
    $contacts_item=new Contacts();
    if(mysql_num_rows($query_contact)>0){
        $contacts=mysql_fetch_array($query_contact);
        
        $contacts_item->type='1';
        $contacts_item->id=$contacts['id_device'];
        $contacts_item->name=$contacts['name'];
        $contacts_item->address=$contacts['address'];
        $contacts_item->phone=$contacts['sdt'];
        $contacts_item->sex=$contacts['sex'];
        $contacts_item->avatar="http://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$contacts_item->id.".png&size=80";

        //Tên
        $value_item=new Item_value();
        if($contacts['sex']=='1'){
            $value_item->icon='http://contact.carrotstore.com/image/girl.png';
        }else{
            $value_item->icon='http://contact.carrotstore.com/image/boy.png';
        }
        $value_item->key='account_name';
        $value_item->value=$contacts['name'];
        array_push($contact_view->arr_value,$value_item);
        
        //G? di?n
        $value_item=new Item_value();
        if($contacts['sex']=='1'){
            $value_item->icon='http://contact.carrotstore.com/image/call_girl.png';
        }else{
            $value_item->icon='http://contact.carrotstore.com/image/call_boy.png';
        }
        $value_item->key='phone';
        $value_item->value=$contacts['sdt'];
        $value_item->link='tel://'.$contacts['sdt'];
        array_push($contact_view->arr_value,$value_item);
        
        //Nh?n tin - sms
        $value_item=new Item_value();
        $value_item->icon='http://contact.carrotstore.com/image/sms.png';
        $value_item->key='sms';
        $value_item->value='sms_value';
        $value_item->value_lang='1';
        $value_item->link='sms://'.$contacts['sdt'];
        array_push($contact_view->arr_value,$value_item);
        
        //Ð?a ch? - b?n d?
        if($contacts['address']!=''){
            $value_item=new Item_value();
            $value_item->icon='http://contact.carrotstore.com/image/maps.png';
            $value_item->key='address';
            $value_item->value=$contacts['address'];
            $value_item->link='https://www.google.com/maps?q='.$contacts['address'];
            array_push($contact_view->arr_value,$value_item);
        }
        
        //Gi?i tính
        $value_item=new Item_value();
        $value_item->key='sex';
        if($contacts['sex']=='0'){
            $value_item->icon='http://contact.carrotstore.com/image/sex_boy.png';
            $value_item->value='sex_boy';
        }else{
            $value_item->icon='http://contact.carrotstore.com/image/sex_girl.png';
            $value_item->value='sex_girl';
        }
        $value_item->value_lang='1';
        array_push($contact_view->arr_value,$value_item);

        //Hi?n các tru?ng b? sung
        //Ki?m tra t?n t?i
        $query_check_field=mysql_query("SELECT * FROM `user_field_data` WHERE `id_device` = '$id_device' LIMIT 1");
        if(mysql_num_rows($query_check_field)>0){
            $data_user=mysql_fetch_array($query_check_field);
            $data_field=json_decode($data_user['data']);
            foreach($data_field as $i_key=>$i_val){
                $query_get_field=mysql_query("SELECT * FROM `field_contacts` WHERE `name`='$i_key' LIMIT 1");
                if(mysql_num_rows($query_get_field)>0){
                    $data_item_field=mysql_fetch_array($query_get_field);
                    $value_item=new Item_value();
                    $value_item->icon='http://contact.carrotstore.com/field_icon/'.$data_item_field['id'].'.png';
                    $value_item->key=$i_key;
                    $value_item->value=$i_val;
                    if($data_item_field['link']!=''){
                        $value_item->link=$data_item_field['link'].''.$i_val;
                    }
                    array_push($contact_view->arr_value,$value_item);
                }
                mysql_free_result($query_get_field);
            }
        }
        
        //?ng d?ng d?m c?u
        $query_app_sheep=mysql_query("SELECT * FROM carrotsy_sheep.scores WHERE `id_user` = '$id_device' LIMIT 1");
        if(mysql_num_rows($query_app_sheep)>0){
            $data_app_sheep=mysql_fetch_array($query_app_sheep);
            $value_item=new Item_value();
            $value_item->icon='http://contact.carrotstore.com/image/sheep.png';
            $value_item->key='account_app_active';
            $value_item->value='Counting sheep - go to bed (scores:'.$data_app_sheep['scores'].')';
            if($os=='android'){
                $value_item->link='https://play.google.com/store/apps/details?id=com.kurotsmile.demcuu3d';
            }else{
                $value_item->link='https://itunes.apple.com/us/app/id1409909203';
            }
            array_push($contact_view->arr_value,$value_item);
        }
        mysql_free_result($query_app_sheep);
        
        //Tr?ng thái tài kho?n
        $value_item=new Item_value();
        $value_item->icon='http://contact.carrotstore.com/image/status.png';
        $value_item->key='account_status';
        if($contacts['status']=='0'){
            $value_item->value='account_statu_1';
        }else{
            $value_item->value='account_statu_2';
        }
        $value_item->value_lang='1';
        array_push($contact_view->arr_value,$value_item);
        

    }else{
        $contacts_item->id=$id_device;
        $contacts_item->type='0';
    }

    $contact_view->contact=$contacts_item;
    
    mysql_free_result($query_contact);
    echo json_encode($contact_view);
    exit;
}



if($func=='view_contact_edit'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];

    $contact_view=new Contact_view();
    $query_contact=mysql_query("SELECT * FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_device'");
    if(mysql_num_rows($query_contact)>0){
        $contacts=mysql_fetch_array($query_contact);
    }else{
        $contacts=array('name'=>'','sdt'=>'','address'=>'','sex'=>'0','status'=>'0');
    }
    
    //Tên
    $value_item=new Item_value();
    $value_item->icon='http://contact.carrotstore.com/image/name.png';
    $value_item->key='account_name';
    $value_item->value=$contacts['name'];
    $value_item->tip='account_name_tip';
    $value_item->type='0';
    array_push($contact_view->arr_value,$value_item);

    //s? di?n tho?i
    $value_item=new Item_value();
    $value_item->icon='http://contact.carrotstore.com/image/contact_phone.png';
    $value_item->key='phone';
    $value_item->value=$contacts['sdt'];
    $value_item->tip='phone_tip';
    $value_item->type='1';
    array_push($contact_view->arr_value,$value_item);
    
    //?nh d?i di?n
    $value_item=new Item_value();
    $value_item->icon="http://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$id_device.".png&size=80";
    $value_item->key='account_avatar';
    $value_item->tip='account_avatar_tip';
    $value_item->value="http://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$id_device.".png&size=80";
    $value_item->type='3';
    array_push($contact_view->arr_value,$value_item);

    //Ð?a ch? - b?n d?
    $value_item=new Item_value();
    $value_item->icon='http://contact.carrotstore.com/image/maps.png';
    $value_item->key='address';
    $value_item->value=$contacts['address'];
    $value_item->tip='address_tip';
    $value_item->type='4';
    array_push($contact_view->arr_value,$value_item);
    
    //Gi?i tính
    $value_item=new Item_value();
    $value_item->icon='http://contact.carrotstore.com/image/sex.png';
    $value_item->key='sex';
    $value_item->value=$contacts['sex'];
    $value_item->tip='sex_tip';
    $value_item->value_data=array('sex_boy','sex_girl');
    $value_item->type='2';
    array_push($contact_view->arr_value,$value_item);
    
    //Tr?ng thái tài kho?n
    $value_item=new Item_value();
    $value_item->icon='http://contact.carrotstore.com/image/status.png';
    $value_item->key='account_status';
    $value_item->value=$contacts['status'];
    $value_item->tip='account_status_tip';
    $value_item->value_data=array('account_statu_1','account_statu_2');
    $value_item->type='2';
    array_push($contact_view->arr_value,$value_item);
    
    
    mysql_free_result($query_contact);
    echo json_encode($contact_view);
    exit;
}


if($func=='update_contact'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    
    $account_name=$_POST['account_name'];
    $phone=$_POST['phone'];
    $address='';
    if(isset($_POST['address'])){
      $address=$_POST['address'];
    }
    $sex=$_POST['sex'];
    $account_status=$_POST['account_status'];

    Class Error_Field{
        public $key;
        public $msg;
        public $type;
    }
    $error=new Error_Field();
    
    if($account_name==''||strlen($account_name)<5){
        $error->key='account_name';
        $error->msg='error_name';
        $error->type='0';
        echo json_encode($error);
        exit;
    }
    
    if($phone==''||strlen($phone)<6){
        $error->key='phone';
        $error->msg='error_phone';
        $error->type='0';
        echo json_encode($error);
        exit;
    }
    
    $data_field=json_encode($_POST,JSON_UNESCAPED_UNICODE);
    $data_field=addslashes($data_field);
    $query_get_user=mysql_query("SELECT * FROM carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '$id_device' LIMIT 1");
    if(mysql_num_rows($query_get_user)>0){
            $query_update_user=mysql_query("UPDATE carrotsy_virtuallover.app_my_girl_user_$lang SET `name` = '$account_name',`sdt` = '$phone',`sex`='$sex',`status`='$account_status',`address`='$address' WHERE `id_device` = '$id_device'");
            $error->msg='account_update_success';
            $error->type='1';
            mysql_free_result($query_update_user); 
    }else{
            $query_add_user=mysql_query("INSERT INTO carrotsy_virtuallover.app_my_girl_user_$lang (`id_device`, `name`,`sdt`,`status`,`sex`,`date_start`,`date_cur`,`address`) VALUES ('$id_device', '$account_name', '$phone', '$account_status','$sex',NOW(),NOW(),'$address');");
            $error->msg='account_add_success';
            $error->type='1';
            mysql_free_result($query_add_user);
    }
    
    mysql_free_result($query_get_user);
    
    echo json_encode($error);
    exit;
}

if($func=='get_gprs'){
    $location_lat=$_POST['lat'];
    $location_lon=$_POST['lng'];
    $place="http://maps.googleapis.com/maps/api/geocode/json?latlng=$location_lat,$location_lon&sensor=true";
        
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
    $txt_address=str_replace('Unnamed Road,','',$txt_dc);
    echo $txt_address;
    exit;
}               

if($func=='flower_action'){
    $lang=$_POST['lang'];
    $id_device=$_POST['id_device'];
    $id_maxim=$_POST['id_maxim'];
    $type=$_POST['type'];
    $data='';
    
    if(isset($_POST['data_txt'])){
        $data=$_POST['data_txt'];
    }
    
    if($type=='like'){
        $query_count_like_user=mysql_query("SELECT * FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '".$id_maxim."' AND `id_device` = '".$id_device."'");
        if(mysql_num_rows($query_count_like_user)>0){
            $query_delete_like=mysql_query("DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'like'");
            mysql_free_result($query_delete_like);
        }else{
            $query_act_like=mysql_query("INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
            mysql_free_result($query_act_like);
        }
        mysql_free_result($query_count_like_user);
    }

    if($type=='distlike'){
        $query_count_like_user=mysql_query("SELECT * FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '".$id_maxim."' AND `id_device` = '".$id_device."'");
        if(mysql_num_rows($query_count_like_user)>0){
            $query_delete_like=mysql_query("DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'distlike'");
            mysql_free_result($query_delete_like);
        }else{
            $query_act_like=mysql_query("INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
            mysql_free_result($query_act_like);
        }
        mysql_free_result($query_count_like_user);
    }
    
    if($type=='comment'){
        $query_act_comment=mysql_query("INSERT INTO `flower_action_$lang` (`id_device`, `id_maxim`, `type`, `data`,`date`) VALUES ('$id_device', '$id_maxim', '$type', '$data',NOW());");
        mysql_free_result($query_act_comment);
    }
    
    if($type=='delete_comment'){
        $query_act_delete_comment=mysql_query("DELETE FROM `flower_action_$lang` WHERE `id_device` = '".$id_device."' AND `id_maxim` = '$id_maxim' AND `type` = 'comment'");
        mysql_free_result($query_act_delete_comment);
    }
    
    $flower=new Flower();
    $flower->id=$id_maxim;
    
    $query_count_like=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '".$id_maxim."'");
    $data_count_like=mysql_fetch_array($query_count_like);
    $flower->count_like=$data_count_like[0];
    mysql_free_result($query_count_like);
    
    $query_count_distlike=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '".$id_maxim."'");
    $data_count_distlike=mysql_fetch_array($query_count_distlike);
    $flower->count_distlike=$data_count_distlike[0];
    mysql_free_result($query_count_distlike);
    
    $query_count_comment=mysql_query("SELECT COUNT(*)FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '".$id_maxim."'");
    $data_count_comment=mysql_fetch_array($query_count_comment);
    $flower->count_comment=$data_count_comment[0];
    mysql_free_result($query_count_comment);
    
    $query_list_comment=mysql_query("SELECT * FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '".$id_maxim."'");
    while ($row_comment = mysql_fetch_array($query_list_comment)) {
        $cm=new Comment();
        $cm->id_device=$row_comment['id_device'];
        $query_account=mysql_query("SELECT * FROM  carrotsy_virtuallover.app_my_girl_user_$lang WHERE `id_device` = '".$cm->id_device."'");
        if(mysql_num_rows($query_account)>0){
            $data_account=mysql_fetch_array($query_account);
            $cm->username=$data_account['name'];
            $cm->avatar="http://carrotstore.com/img.php?url=app_mygirl/app_my_girl_".$lang."_user/".$cm->id_device.".png&size=80";
            $cm->id_device=$data_account['id_device'];
        }
        $cm->data=$row_comment['data'];
        mysql_free_result($query_account);
        array_push($flower->list_coment,$cm);
    }
    mysql_free_result($query_list_comment);

    
    echo json_encode($flower);
    exit;
}
?>