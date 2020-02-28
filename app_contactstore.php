<?php
include "config.php";
include "database.php";

include "function.php";
class acc_login{
    public $id='';
    public $name='';
    public $avatar='';
};

class App{
    public $all_contact=array();
};
$app=new App;

class Contact{
    public  $id='';
    public  $full_name='';
    public  $phone='';
    public $address='';
    public $note='';
    public $avatar='';
    public $email='';
    public $is_login='';
    public $facebook='';
    public $twitter='';
    public $linkedin='';
    public $skype='';
    public $sex='';
}


if(isset($_POST['func'])&&$_POST['func']=="get_list"){
    if(isset($_POST['search'])){
        $search=$_POST['search'];
        $result = mysql_query("SELECT * FROM `accounts` WHERE `fullname` LIKE '%$search%' or `phone` LIKE '%$search%' AND `phone` IS NOT NULL ORDER BY RAND() LIMIT 20",$link);
    }else if(isset($_POST['view'])){
        $view_id=$_POST['view'];
         $result = mysql_query("SELECT * FROM `accounts` WHERE `id`='$view_id' LIMIT 1",$link);
    }else{
        $result = mysql_query("SELECT * FROM `accounts` WHERE `phone`!='' ORDER BY RAND() LIMIT 20",$link);
    }
    while ($row = mysql_fetch_array($result)) {
        $contact=new Contact();
        $contact->id=$row['id'];
        
        if(isset($_POST['view'])){
            $phone=(array)json_decode($row['phone']);
        }else{
            $phone=(array)json_decode($row['phone']);
            $phone=$phone[0];
        }
        
        if(isset($_POST['view'])){
            if(trim($row['fullname'])!=''){
                if(is_array(json_decode($row['fullname']))){
                    $contact->full_name=json_decode($row['fullname']);
                }else{
                    $contact->full_name=array($row['fullname']);
                }
            }else{
                $contact->full_name=array('None');
            }
        }else{
            if(trim($row['fullname'])!=''){
                if(is_array(json_decode($row['fullname']))){
                    $fullname=json_decode($row['fullname']);
                    $contact->full_name=$fullname[0];
                }else{
                    $contact->full_name=$row['fullname'];
                }
            }else{
                $contact->full_name=$row[0];
            }
        }
    

    
        $contact->phone=$phone;
        if(isset($_POST['view'])){
            if($row['address']!=''){
                $address=json_decode($row['address']);
                $contact->address=array($address->address,$address->lat,$address->lng);
            }else{
                $contact->address=array("none","0","0");
            }
        }else{
            if($row['address']!=''){
                $address=json_decode($row['address']);
                $contact->address=$address->address;
            }else{
                $contact->address="None";
            }
        }
        
        if(isset($_POST['view'])){
            $contact->email=json_decode($row['email']);
        }
        
        if(isset($_POST['view'])){
            $data=json_decode($row['data']);
            $note=$data->info->introduire;
            if($$note==''){
                $contact->note="";
            }else{
                $contact->note=$note;
            }
            $contact->facebook=$data->info->facebook;
            $contact->sex=$data->info->sex;
            $contact->twitter=$data->info->twitter;
            $contact->linkedin=$data->info->linkedin;
            $contact->skype=$data->info->skype;
        }
        if(isset($_POST['view'])){
            $contact->avatar=thumb($row['avatar'],'150x150');
        }else{
            $contact->avatar=thumb($row['avatar'],'130x130');
        }
        array_push($app->all_contact,$contact);
    }
    
    echo json_encode($app);
    mysql_close($link);
    exit;
}


if(isset($_POST['func'])&&$_POST['func']=="update"){
	ini_set('default_charset', 'UTF-8');
    $fullname=$_POST['full_name'];
    $phone=$_POST['phone'];
    
    if($fullname[0]==''){
        echo "Name not null!";
        exit;
    }
    
    if($phone[0]==''){
        echo "Phone not null!";
        exit;
    }
    
    if(isset($_POST['add'])){
    
    }else{
        $id=$_POST['pid'];
    }
    $str_update="UPDATE `accounts` SET ";
    
    
    
    $full_name=json_encode($fullname,JSON_UNESCAPED_UNICODE);
    $str_update.="`fullname` = '$full_name',";
    
    
    
    $usernames=$phone[0];
    $phone=json_encode($phone);
    $str_update.="`phone` = '$phone',";
    
    
    $address=new Address();
    $address->address=$_POST['address'];
    $address->lat=$_POST['lat'];
    $address->lng=$_POST['lng'];
    $address=json_encode($address,JSON_UNESCAPED_UNICODE);
    $str_update.="`address`='$address',";
    
    $acc=new Accoun_Data();
    $info=new Account_info();
    if(isset($_POST['note'])){
        $note=$_POST['note'];
        $info->introduire=$note;
    }
    
    if(isset($_POST['facebook'])){
        $facebook=$_POST['facebook'];
        $info->facebook=$facebook;
    }
    
    if(isset($_POST['twitter'])){
        $twitter=$_POST['twitter'];
        $info->twitter=$twitter;
    }
    
    if(isset($_POST['linkedin'])){
        $linkedin=$_POST['linkedin'];
        $info->linkedin=$linkedin;
    }
    
    if(isset($_POST['skype'])){
        $skype=$_POST['skype'];
        $info->skype=$skype;
    }
    
    if(isset($_POST['sex'])){
        $sex=$_POST['sex'];
        $info->sex=$sex;
    }
    
    $acc->info=$info;
    $acc=json_encode($acc,JSON_UNESCAPED_UNICODE);
    $str_update.="`data` = '$acc',";
    
    $email=json_encode(array());
    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $email=json_encode($email);
        $str_update.="`email` = '$email',";
    }
    
    $url_file='';
    if(isset($_FILES['file'])){
              $errors= array();
              $file_name = $_FILES['file']['name'];
              $file_size =$_FILES['file']['size'];
              $file_tmp =$_FILES['file']['tmp_name'];
              $file_type=$_FILES['file']['type'];
              $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
              
              $expensions= array("jpeg","jpg","png");
              
              if(in_array($file_ext,$expensions)=== false){
                 $errors[]="extension not allowed, please choose a JPEG or PNG file.";
              }
              
              if($file_size > 100907152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){

                    $url_file="app_contactstore/image/".time().rand(0,1000).$file_name;
                    move_uploaded_file($file_tmp,$url_file);
                 if(isset($_POST['add'])){
                    
                 }else{
                     $img_old=get_row('accounts',$id);
                     if (file_exists($img_old["avatar"])) {
                        unlink($img_old["avatar"]);
                     }
                 }
              }else{
                 print_r($errors);
                 exit;
              }
              $str_update.="`avatar` = '$url_file',";
    }
    
    if(isset($_POST['delete_avatar'])){
        $img_old=get_row('accounts',$id);
        if (file_exists($img_old["avatar"])) {
            unlink($img_old["avatar"]);
        }
        $url_file="";
        $str_update.="`avatar` = '$url_file',";
    }
                    
    $str_update=substr($str_update,0,strlen($str_update)-1);
    
    $country='';
    if(isset($_POST['country'])){
        $country=$_POST['country'];
    }
    
    if(isset($_POST['add'])){
        $str_add="INSERT INTO `accounts` (`usernames`,`contry`, `address`, `phone`, `avatar`, `fullname`,`data`,`email`) VALUES ('$usernames','$country', '$address', '$phone', '$url_file','$full_name', '$acc','$email');";
        $result = mysql_query($str_add,$link);
        if($result){
            echo "Add Success!";
        }else{
            echo "Add Fail!";
        }
    }else{
        $str_update.=" WHERE `id` = '$id';";
        $result = mysql_query($str_update,$link);
        if($result){
            echo "Update Success!";
        }else{
            echo "Update Fail!";
        }
    }
    exit;   
}


if(isset($_POST['func'])&&$_POST['func']=="get_gprs"){
        $lat=$_POST['lat'];
        $lng=$_POST['lng'];
        $place="http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&sensor=true";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $place);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        $curlData = curl_exec($curl);
        curl_close($curl);
        
        $place = json_decode($curlData);

        $address=new Address();
        $address->address=$place->results[0]->formatted_address;
        $address->lat=$place->results[0]->geometry->location->lat;
        $address->lng=$place->results[0]->geometry->location->lng;
        $address_components=$place->results[0]->address_components;
        $count_c=count($address_components)-1;
        $address_components=$place->results[0]->address_components[$count_c];
        $address->country=strtolower($address_components->short_name);
        
        echo '{"address":['.json_encode($address).']}';
        exit;
}


if(isset($_POST['func'])&&$_POST['func']=='login'){
     $username=$_POST['usernames'];
     $password=$_POST['passwords'];
     $type_action=$_POST['function_type'];
    if(trim($_POST['passwords'])==""&&trim($_POST['usernames'])==""){
        echo "Phone, Email and password not null!";
        exit;
    }else{
        
        if($type_action=='login'){
             $result=mysql_query("SELECT * FROM `accounts` WHERE `usernames` = '$username' AND `password`='$password' LIMIT 1");
             if(mysql_num_rows($result)>0){
                 $data=mysql_fetch_array($result);
                $acc=new acc_login();
                $acc->id=$data[11];
                $names=$data[11];
                $data_user=get_row('accounts',$data[11]);
                if($data_user['fullname']!=''){
                    $full_name=json_decode($data_user['fullname']);
                    $names=$full_name[0];
                }
                $acc->name=$names;
                array_push($app->all_contact,$acc);
                echo json_encode($app);
                exit;
             }else{
                 echo "0";
                 exit;
             }
        }else{
             $result_check_login=mysql_query("SELECT * FROM `accounts` WHERE `usernames` = '$username' AND `password`='$password' LIMIT 1");
             if(mysql_num_rows($result_check_login)>0){
                echo "Account is ready, You can login!";
             }else{
                $result_check_username=mysql_query("SELECT * FROM `accounts` WHERE `usernames` = '$username' LIMIT 1");
                if(mysql_num_rows($result_check_username)){
                    $data_user=mysql_fetch_array($result_check_username);
                    $data_user_id=$data_user[11];
                    $data_user_full_name=$data_user[8];
                    $result_update=mysql_query("UPDATE `accounts` SET `password` = '$password' WHERE `id` = '$data_user_id'");
                    echo "Hello $data_user_full_name!, Register success - You can login!";
                }else{
                    $phone='';
                    $email='';
                    if(is_int($username)){
                        $phone=$username;
                        $email="";
                    }else{
                        $phone="";
                        $email=$username;
                    }
                    
                    $country='';
                    if(isset($_POST['country'])){
                        $country=$_POST['country'];
                    }
                    $result_add=mysql_query("INSERT INTO `accounts` (`usernames`, `password`, `phone`,`email`,`contry`) VALUES ('$username','$password','$phone','$email','$country');");
                    echo "Register success - You can login!";
                }
             }
        }
    }
    mysql_close($link);
    exit;
}

if(isset($_POST['func'])&&$_POST['func']=='backup'){
    $full_name=$_POST['full_name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    $profile=$_POST['profile'];
    $type_backup=$_POST['type'];
    for($i=0;$i<count($full_name);$i++){
        $contact_backup=new Contact_backup();
        if(isset($_POST['id'])){
            $contact_backup->id=$id[$i];
        }
        $contact_backup->name=$full_name[$i];
        $contact_backup->email=$email[$i];
        $contact_backup->phone=$phone[$i];
        array_push($app->all_contact,$contact_backup);
    }
    $data=json_encode($app->all_contact,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
    $info="Backup ".count($full_name)." contact at ".date('m/d/Y h:i:s a', time());
    $result_backup=mysql_query("INSERT INTO `contact_backup` (`info`, `data`, `type`, `date`, `user`) VALUES ('$info', '$data','$type_backup',NOW(),'$profile')");
    if($result_backup){
        echo "Backup Success!";
    }else{
        echo mysql_error($link);
        echo mysql_error($result_backup);
        echo "Backup Fail!";
    }

    exit;
}

if(isset($_POST['func'])&&$_POST['func']=='restore'){
    $id_restore=$_POST['id'];
    $result_restore=mysql_query("SELECT * FROM `contact_backup` WHERE `user` = '$id_restore'");
    while ($row = mysql_fetch_array($result_restore)) {
        $contact_restore=new Contact_Restore();
        $contact_restore->id=$row["id"];
        $contact_restore->count_contact=$row['info'];
        $contact_restore->date=$row['date'];
        $contact_restore->type=$row['type'];
        array_push($app->all_contact,$contact_restore);
    }
    echo json_encode($app);
    exit;
}

if(isset($_POST['func'])&&$_POST['func']=='delete_backup'){
    $id=$_POST['id'];
    $result_delete=mysql_query("DELETE FROM `contact_backup` WHERE ((`id` = '$id'));");
    if($result_delete){
        echo "Delete Backup success!";
    }else{
        echo "Delete Backup Fail!"; 
    }
    exit;
}

if(isset($_POST['func'])&&$_POST['func']=='restore_data'){
    $id=$_POST['id'];
        $result_backup=mysql_query("SELECT * FROM `contact_backup` WHERE `id` = '$id' LIMIT 1");
    if(mysql_num_rows($result_backup)>0){
        $data=mysql_fetch_array($result_backup);
        $i=0;
        foreach(json_decode($data[2]) as $phone){
            $contact=new Contact();
            $contact->id=$i;
            $contact->full_name=array($phone->name);
            $contact->phone=array($phone->phone);
            $contact->email=array($phone->email);
            array_push($app->all_contact,$contact);
            $i++;
        }
    }
    echo json_encode($app);
    exit;
}

