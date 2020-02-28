<?php
include "config.php";
include "database.php";
include "function.php";

        class acc_login{
            public $id='';
            public $name='';
            public $avatar='';
        };

        class Place{
            public  $id=0;
            public  $name='';
            public  $icon='';
            public  $address='';
            public  $address_lat='';
            public  $address_lng='';
            public  $desc='';
            public  $type='';
            public  $rate=0;
            public  $users='';
            public  $time='';
            public $time_start='';
            public $time_end='';
            public $date='';
            public $item_place_name='';
            public $item_place_price='';
        }
        
        class Img_place{
            public $url='';
            public $full_url='';
        }
        
        class Place_type{
            public  $id=0;
            public  $name='';
        }
                
        class App{
            public $all_place=array();
            public $all_place_type=array();
            public $all_img_view=array();
            public $all_comment=array();
            public $info=array();
        }
        
        class Comment{
            public $avatar='';
            public $name='';
            public $comment='';
            public $username='';
        }
        
        
        $app=new App;
        
if($_POST){
    $function=$_POST['func'];
    if($function=="get_gprs"){
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
    
    $function=$_POST['func'];
    if($function=="add_place"){
        
        if($_POST['names']==""){
            echo "Name not null!";
            exit;
        }
        
        if($_POST['address']==""){
            echo "Address not null!";
            exit;
        }
        
        if($_POST['desc']==""){
            echo "Describe not null!";
            exit;
        }
        
        if($_POST['is_add']=="True"){
            if(isset($_FILES['file'])){
            }else{
                echo "Please Upload 1 image place!";
                exit;
            }
        }
        
        $describe=$_POST['desc'];
        $names=$_POST['names'];
        $address=new Address;
        $address->address=$_POST['address'];
        $address->lat=$_POST['lat'];
        $address->lng=$_POST['lng'];
        $address=json_encode($address,JSON_UNESCAPED_UNICODE);
        $type=$_POST['type'];
        
        $url_file_avatar='';
        if($_POST['is_add']!='True'){
            //Delete data old
            $data_old=get_row('place',$_POST['id']);
            if(trim($data_old['avatar'])!=''){
                unlink($data_old['avatar']);
            }
            
        }
        
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
              
              if($file_size > 10097152){
                 $errors[]='File size must be excately 2 MB';
              }
              
              if(empty($errors)==true){
                 $url_file_avatar="app_place/".time().rand(0,1000).$file_name;
                 move_uploaded_file($file_tmp,$url_file_avatar);
              }else{
                 print_r($errors);
              }
        }
        
        $images=array();
        if($_POST['is_add']!='True'){
            //Delete data old
            $data_old=get_row('place',$_POST['id']);
            $fodel_img=json_decode($data_old['images']);
            foreach($fodel_img as $imgs){
                unlink($imgs);
            }
        }
        
            
            for($i=0;$i<intval($_POST['leng_img_libary']);$i++){
                  $errors= array();
                  $file_name = $_FILES['img_libary'.$i]['name'];
                  $file_size =$_FILES['img_libary'.$i]['size'];
                  $file_tmp =$_FILES['img_libary'.$i]['tmp_name'];
                  $file_type=$_FILES['img_libary'.$i]['type'];
                  $file_ext=strtolower(end(explode('.',$_FILES['img_libary'.$i]['name'])));
                  
                  $expensions= array("jpeg","jpg","png");
                  
                  if(in_array($file_ext,$expensions)=== false){
                     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                  }
                  
                  if($file_size > 10097152){
                     $errors[]='File size must be excately 2 MB';
                  }
                  
                  if(empty($errors)==true){
                     $url_file="app_place/libary/".time().$i.rand(0,1000).$file_name;
                     move_uploaded_file($file_tmp,$url_file);
                  }else{
                     print_r($errors);
                  }
                  array_push($images,$url_file);
            }
        $images=json_encode($images);
        
        if($_POST['is_add']=='True'){
            $user=$_POST['user'];
            if($user==""){
               $user="andanh@gmail.com";
            }
            $a=mysql_query("INSERT INTO `place` (`name`, `describe`, `avatar`, `address`, `type`,`users`,`images`) VALUES ('$names', '$describe', '$url_file_avatar', '$address','$type','$user','$images')");
            if($a){
                echo "Add place success!";
            }
        }else{
            $id=$_POST['id'];
            $a=mysql_query("UPDATE `place` SET `avatar`='$url_file_avatar' ,`name` = '$names', `describe` = '$describe', `address` = '$address',`type` = '$type',`images`='$images' WHERE `id` = '$id';");
            if($a){
                echo "Update place success!";
            }else{
                echo mysql_error($link);
            }
        }
        
        if(isset($_POST['item_menu_name'])){
            $item_menu_name=$_POST['item_menu_name'];
            $item_menu_price=$_POST['item_menu_price'];
            if($_POST['is_add']!='True'){
                mysql_query("DELETE FROM `place_menu_item` WHERE `place_id` = '$id'");
            }
            for($i=0;$i<count($item_menu_name);$i++){
                $i_name=$item_menu_name[$i];
                $i_price=$item_menu_price[$i];
                mysql_query("INSERT INTO `place_menu_item` (`place_id`, `names`, `price`) VALUES ('$id', '$i_name', '$i_price');");
            }
        }
        
        if(isset($_POST['time_start'])){
                $check_time=0;
                if($_POST['is_add']=='True'){
                    $id=mysql_insert_id();
                }
                $mysq_check_time=mysql_query("SELECT * FROM `place_time` WHERE `place_id` = '$id' LIMIT 1");
                $check_time=mysql_num_rows($mysq_check_time);
                $time_start=$_POST['time_start'];
                $time_end=(isset($_POST['time_end'])? $_POST['time_end']:"");
                $t2=strtolower($_POST['t2']);
                $t3=strtolower($_POST['t3']);
                $t4=strtolower($_POST['t4']);
                $t5=strtolower($_POST['t5']);
                $t6=strtolower($_POST['t6']);
                $t7=strtolower($_POST['t7']);
                $cn=strtolower($_POST['cn']);
                if($check_time>0){
                    $result=mysql_query("UPDATE `place_time` SET  `time_start` = '$time_start', `time_end` = '$time_end', `t2` = '$t2', `t3` = '$t3', `t4` = '$t4', `t5` = '$t5', `t6` = '$t6', `t7` = '$t7', `cn` = '$cn' WHERE `place_id` = '$id' ");
                }else{
                    $result=mysql_query("INSERT INTO `place_time` (`place_id`, `time_start`, `time_end`, `t2`, `t3`, `t4`, `t5`, `t6`, `t7`, `cn`) VALUES ('$id','$time_start', '$time_end', '$t2', '$t3', '$t4', '$t5', '$t6', '$t7', '$cn');");
                }
        }
        
        
    }
    
    $function=$_POST['func'];
    if($function=="get_list"){
        session_start();
        $_SESSION['lang']="vi";
        $type=$_POST['type_view'];

        if($type==''){
            $result = mysql_query("SELECT * FROM `place` ORDER BY RAND() LIMIT 20",$link);
        }else{
            if($type=='search'){
                $key=$_POST['key'];
                $result = mysql_query("SELECT * FROM `place` WHERE `name` LIKE '%$key%' LIMIT 50",$link);
            }else if($type=='view'){
                $id=$_POST['id'];
                $result = mysql_query("SELECT * FROM `place` WHERE `id`='$id'",$link);
            }else if($type=='user'){
                $id=$_POST['id'];
                $result = mysql_query("SELECT * FROM `place` WHERE `users`='$id'",$link);
            }else{
                $result = mysql_query("SELECT * FROM `place` WHERE `type`='$type' ",$link);
            }
        }
        
        while ($row = mysql_fetch_array($result)) {
            if(trim($row[4])!=''){
                $address=json_decode($row[4]);
            }else{
                $address=new Address();
            }
            $p=new Place;
            $p->id=$row[0];
            $p->name=$row[1];
            $p->address=$address->address;
            $p->address_lat=$address->lat;
            $p->address_lng=$address->lng;
            if($type=='view'){
                $p->icon=thumb($row[3],'620x300');
                if(trim($row[8])!=''){
                    $arr_img=json_decode($row[8]);
                    foreach($arr_img as $i_url){
                        $img=new Img_place();
                        $img->url=thumb($i_url,'130x130');
                        $img->full_url=$url.'/'.$i_url;
                        array_push($app->all_img_view,$img);
                    }
                }
                
                $mysq_check_time=mysql_query("SELECT * FROM `place_time` WHERE `place_id` = '$id' LIMIT 1");
                if(mysql_num_rows($mysq_check_time)>0){
                    $place_time=mysql_fetch_array($mysq_check_time);
                    $p->time=$place_time['time_start'].' - '.$place_time['time_end'];
                    $p->time_start=check_time_int($place_time['time_start']);
                    $p->time_end=check_time_int($place_time['time_end']);
                    $p->date=array($place_time['t2'],$place_time['t3'],$place_time['t4'],$place_time['t5'],$place_time['t6'],$place_time['t7'],$place_time['cn']);
                }
                
                $mysq_check_menu_place=mysql_query("SELECT * FROM `place_menu_item` WHERE `place_id` = '$id'");
                if(mysql_num_rows($mysq_check_menu_place)>0){
                    $p->item_place_name=array();
                    $p->item_place_price=array();
                    while ($item_place = mysql_fetch_array($mysq_check_menu_place)) {
                        array_push($p->item_place_name,$item_place['names']);
                        array_push($p->item_place_price,$item_place['price']);
                    }
                }
                
            }else{
                $p->icon=thumb($row[3],'130x130');
            }
            $p->desc=$row[2];
            $p->type=lang($row['type']);
            $p->rate=count_rate($row['id']);
            $p->users=$row['users'];
            array_push($app->all_place,$p);
        }
        
        if($type==''){
            $result_type = mysql_query("SELECT * FROM `place_type`",$link);
            $type_place=new Place_type();
            $type_place->id="";
            $type_place->name=lang('tat_ca');
            array_push($app->all_place_type,$type_place);
            
            while ($row = mysql_fetch_array($result_type)) {
                $type_place=new Place_type();
                $type_place->id=$row['names'];
                $type_place->name=lang($row['names']);
                array_push($app->all_place_type,$type_place);
            }
        }
        
        if($type=='view'){
            $id=$_POST['id'];
            $result_comment=mysql_query("SELECT * FROM `comment` WHERE `productid` = '$id'");
            while ($row = mysql_fetch_array($result_comment)) {
                $comment=new Comment();
                $acc=get_account($row['username']);
                $comment->avatar=thumb($acc['avatar'],'80x80');
                $comment->comment=$row['comment'];
                $comment->name=show_name_User($row['username']);
                $comment->username=$row['username'];
                array_push($app->all_comment,$comment);
            }
            

        }
        
        if($type!=''){
            array_push($app->info,mysql_num_rows($result));
        }
        
        echo json_encode($app);
        exit;
    }
    
    if($function=="comment"){
        $id=$_POST["id_c"];
        $created=date("Y-m-d")."T".date("H:i:s")."Z"; 
        $content=addslashes($_POST["content"]);
        $productid=$_POST['id'];
        $usernames=$_POST['username'];
        $upvote_count=0;
        $parent=0;
        $type_comment='place';
        mysql_query("INSERT INTO `comment` (`id_c`, `username`, `comment`, `productid`, `created`,`upvote_count`,`parent`,`type_comment`) VALUES ('$id', '$usernames', '$content', '$productid', '$created','$upvote_count','$parent','$type_comment');");
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
                    $acc->avatar=thumb($data_user['avatar'],'80x80');
                    array_push($app->all_place,$acc);
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
    
    if(isset($_POST['func'])&&$_POST['func']=='delete'){
        $id=$_POST['id'];
        $place=get_row('place',$id);
        if (file_exists($place['avatar'])) {
            unlink($place['avatar']);
        }
        mysql_query("DELETE FROM `place` WHERE ((`id` = '$id'));");
        echo "Delete place success!!!";
        exit;
    }
    
}

function count_rate($id){
    $count_rate=mysql_query("SELECT `rate` FROM `place_rate` WHERE `place` = '".$id."'");
    if($count_rate){
        $count_rate=mysql_num_rows($count_rate);
        $sum_rate=mysql_query("SELECT SUM(`rate`) FROM `place_rate` WHERE `place` = '".$id."'");
        $sum_rate=mysql_fetch_array($sum_rate);
        if(intval($sum_rate[0])>0){
            $sum_rate=$sum_rate[0];
            $sum_rate=($sum_rate/$count_rate);
            $width_rate=(($sum_rate/5)*125);
        }else{
            $width_rate=0;
        }
        
    }else{
        $width_rate=0;
    }
    return $width_rate;
}


function check_time_int($s_time){
    $array_date=Array("7:00 AM","8:00 AM","9:00 AM","10:00 AM","11:00 AM","12:00 AM","13:00 PM","14:00 PM","15:00 PM","16:00 PM","17:00 PM","18:00 PM","19:00 PM","20:00 PM","21:00 PM","22:00 PM","23:00 PM","24:00 PM");
    for($i=0;$i<count($array_date);$i++){
        if($array_date[$i]==$s_time){
            return $i;
        }
    }
}
?>