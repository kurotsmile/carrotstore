<?php
include "../config.php";
include "../database.php";

function thumb($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size&trim=1";
}

class App{
    public $all_user=array();
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
}
$app=new App;

$func=$_POST['func'];

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
    
    if($s_type=="0"){
        $list_users=mysql_query("SELECT `id_device`,`name`,`sex`,`sdt`,`address`,`status`,DATEDIFF(date_cur,date_start) as 'count_date' FROM `app_my_girl_user_$lang_sel` WHERE  `id_device`='$id_device_show' AND `name`!='' LIMIT 1");
        while($row=mysql_fetch_array($list_users)){
            $filename_avatar= 'app_my_girl_'.$lang_sel.'_user/'.$row['id_device'].'.png';
            if($row['sex']=='1'){
                $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default1.png','80x50');
            }else{
                $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default.png','80x50');
            }
            if (file_exists($filename_avatar)) {
                  $txt_img_url=thumb(URL.'/app_mygirl/'.$filename_avatar,'50x50');
            } 
                
            $u=new User();
            $u->id=$row['id_device'];
            $u->name=$row['name'];
            $u->avatar=$txt_img_url;
            $u->address=$row['address'];
            $u->phone=$row['sdt'];
            $u->status=$row['status'];
            $u->sex=$row['sex'];
            if($row['count_date']==''){
                $u->count_date=1;
            }else{
                $u->count_date=$row['count_date'];
            }
            array_push($app->all_user,$u);
        }
    }
    echo json_encode($app);
    exit;
}

if($func=='get_list_contact'){
    $seach=$_POST['search'];
    
    if($seach!=""){
        $list_users=mysql_query("SELECT `id_device`,`name`,`sex`,`sdt`,`address`,`status` FROM `app_my_girl_user_$lang_sel` WHERE `status` = '0'  AND `sdt`!='' AND  (MATCH (name)  AGAINST ('$seach' IN BOOLEAN MODE) or `sdt` LIKE '%$seach%') ORDER BY RAND() LIMIT 20");
    }else{
        $list_users=mysql_query("SELECT `id_device`,`name`,`sex`,`sdt`,`address`,`status` FROM `app_my_girl_user_$lang_sel` WHERE `status` = '0'  AND `sdt`!='' ORDER BY RAND() LIMIT 21");
    }
    
    while($row=mysql_fetch_array($list_users)){
        $filename_avatar= 'app_my_girl_'.$lang_sel.'_user/'.$row['id_device'].'.png';
        if($row['sex']=='1'){
            $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default1.png','80x50');
        }else{
            $txt_img_url=thumb(URL.'/app_mygirl/img/avatar_default.png','80x50');
        }
        if (file_exists($filename_avatar)) {
            $txt_img_url=thumb(URL.'/app_mygirl/'.$filename_avatar,'50x50');
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
    

    echo json_encode($app);
    exit;
}

if($func=='set_status'){
    $text=$_POST['text'];
    $update_status=mysql_query("UPDATE `app_my_girl_user_$lang_sel` SET `status` = '$text' WHERE `id_device`='$id_device'");
    $update_sex=mysql_query("UPDATE `app_my_girl_user_$lang_sel` SET `sex`='$sex' WHERE `id_device` = '$id_device';");
    echo mysql_error();
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
        $txt_dc=$place->results[0]->formatted_address;
        $txt_dc=str_replace('Unnamed Road,','',$txt_dc);
    }
                
    $new_name=$_POST['new_name'];
    $new_phone=$_POST['new_phone'];
    $check_user=mysql_query("SELECT `id_device` FROM `app_my_girl_user_$lang_sel` WHERE `id_device` = '$id_device' LIMIT 1");
    if(mysql_num_rows($check_user)>0){
        if($txt_dc==""){
            $add_account=mysql_query("UPDATE `app_my_girl_user_$lang_sel` SET `name` = '$new_name', `date_cur` = now(),`sdt` = '$new_phone' WHERE `id_device` = '$id_device'");
        }else{
            $add_account=mysql_query("UPDATE `app_my_girl_user_$lang_sel` SET `name` = '$new_name', `date_cur` = now(), `address` = '$txt_dc',`sdt` = '$new_phone' WHERE `id_device` = '$id_device'");
        }
    }else{
        $update_account=mysql_query("INSERT INTO `app_my_girl_user_$lang_sel` (`id_device`,`name`,`sex`,`date_start`,`date_cur`,`sdt`,`address`) VALUES ('$id_device','$new_name','$sex',now(),now(),'$new_phone','$txt_dc');");
    }
    echo "1";
    exit;
}


mysql_close($link);