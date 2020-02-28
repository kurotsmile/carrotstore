<?php
include "config.php";
include "database.php";
include "function.php";
class App{
    public $all_product=array();
    public $all_menu=array();
    public $title_show='';
    public $tip='';
    public $all_contact=array();
    public $image_tip='';
    public $all_price_country=array();
}

class country{
    public $price_value='';
    public $price_unit='';
    public $key_country='';
}

class acc_login{
    public $id='';
    public $name='';
    public $avatar='';
    public $tip='';
    public $username_login='';
    public $pay='';
    public $email='';
};

class product_image_item{
    public $url_full='';
    public $url_thumb='';
};

class Product{
    public $id='';
    public $name='';
    public $desc='';
    public $type='';
    public $avatar='';
    public $price='';
    public $price_unit='';
    public $price_value='';
    public $all_image=array();
    public $author=null;
    public $company=null;
}

class Menu_Item{
    public $menu_id='';
    public $menu_name='';
}



$app=new App();
session_start();
$_SESSION['lang']="en";

$func=$_POST['func'];
if($func=='get_list'){
    $type='';
    if(isset($_POST['types'])){
        $type=$_POST['types'];
        if($type=="view_product"){
            $id_view_product=$_POST['id'];
            $mysql_txt_all_product="SELECT * FROM `products` WHERE `id` = '$id_view_product'";
            $mysql_all_product=mysql_query($mysql_txt_all_product);
            $image_tip=$url.'/images/paypallogo.png';
        }else if($type=="search"){
            $key=$_POST['key'];
            $mysql_txt_all_product="SELECT * FROM `products` WHERE `content` LIKE '%$key%' OR `name_product` LIKE '%$key%' OR `desc_product` LIKE '%$key%' ORDER BY RAND() LIMIT 50";
            $mysql_all_product=mysql_query($mysql_txt_all_product);
            $app->title_show="Search Result";
            $app->tip="Fond ".mysql_num_rows($mysql_all_product)." product has key seach '".$key."'";
        }else if($type=="user"){
            $key=$_POST['user'];
            $mysql_txt_all_product="SELECT * FROM `products` WHERE `users` = '$key' ";
            $mysql_all_product=mysql_query($mysql_txt_all_product);
            $app->title_show="View By user";
            $app->tip="User have ".mysql_num_rows($mysql_all_product)." product, published by ".show_name_User($key);
            $acc=get_account($key);
            $app->image_tip=thumb($acc['avatar'],'80x80');
        }else if($type=="company"){
            $key=$_POST['company'];
            $app->title_show="View By Company";
            $company=get_row('company',$key);
            $arr_id=(array)json_decode($company[5]);
            $app->image_tip=thumb($company[6],'80x80');
            $mysql_txt_all_product="SELECT * FROM `products` WHERE `id` IN (".implode(",",$arr_id).")";
            $mysql_all_product=mysql_query($mysql_txt_all_product);
            $app->tip=$company[1].' has '.count($arr_id).' products in the system of carrots';
        }else{
            $mysql_txt_all_product="SELECT * FROM `products` WHERE `type` = '$type' ORDER BY RAND()";
            $mysql_all_product=mysql_query($mysql_txt_all_product);
            $app->title_show=lang($type);
            $app->tip="Fond ".mysql_num_rows($mysql_all_product)." product in ".lang($type);  
        }
    }else{
        $mysql_all_product="SELECT * FROM `products` ORDER BY RAND() LIMIT 20";
        $mysql_all_product=mysql_query($mysql_all_product); 
    }
    
    $mysql_all_type="SELECT * FROM `type` LIMIT 50";
    $mysql_all_type=mysql_query($mysql_all_type);
    
    
    
    while ($row = mysql_fetch_array($mysql_all_product)) {
        $p=new Product();
        $p->id=$row[0];
        $p->name=$row[1];
        $p->desc=$row[2];
        $p->type=lang($row[8]);
        $p->avatar=thumb($row[3],'80x80');
        if($row[10]!=''&&$row[10]!='0'){
            $p->price=convert_price($row[11],$_SESSION['lang'],$row[10]);
        }else{
            $p->price=lang("mien_phi");
        }
        array_push($app->all_product,$p);
        if($type=="view_product"){
            $arr_img=json_decode($row[16]);
            if(count($arr_img)>0){
                foreach($arr_img as $img){
                    $p_image_item=new product_image_item();
                    $p_image_item->url_full=$url.'/'.$img;
                    $p_image_item->url_thumb=thumb($img,'80x80');
                    array_push($p->all_image,$p_image_item);
                }
            }
            
            $acc=get_account($row[9]);
            
            //Author
            $p->author=new acc_login();
            $p->author->id=$row[9];
            $p->author->avatar=thumb($acc['avatar'],'80x80');
            $p->author->name=show_name_User($row[9]);
            $products_count=mysql_query("SELECT * FROM `products` WHERE `users` = '".$row[9]."'");
            $p->author->tip=show_name_User($row[9]).' has '.mysql_num_rows($products_count).' products in the system of carrots';
            $p->price_value=$row[10];
            $p->price_unit=$row[11];
  
            //Author
            $company=get_comapy_product($row[0]);
            if($company!=null){
                $p->company=new acc_login();
                $p->company->id=$company[0];
                $p->company->avatar=thumb($company[6],'80x80');
                $p->company->name=$company[1];
                $arr_product=json_decode($company['product']);
                $p->company->tip=$company[1].' has '.count($arr_product).' products in the system of carrots';
            }
        }
    }
    
    while ($row_menu_item = mysql_fetch_array($mysql_all_type)) {
        $menu_item=new Menu_Item();
        $menu_item->menu_id=$row_menu_item[0];
        $menu_item->menu_name=lang($row_menu_item[0]);
        array_push($app->all_menu,$menu_item);
    }
    
    $result_get_list_country = mysql_query("SELECT * FROM `contry`");
    while ($row_country = mysql_fetch_array($result_get_list_country)) {
        $country=new country();
        $country->key_country=$row_country[1];
        $country->price_value=$row_country[3].'-'.$row_country[2];
        $country->price_unit=$row_country[3];
        array_push($app->all_price_country,$country);
    }
    
    echo json_encode($app);
}

if($func=='add_product'){
        $name_product=addslashes($_POST['names']);
        $desc_product=addslashes($_POST['desc']);
        $price_value=$_POST['price_value'];
        $type_product=$_POST['types'];

        $address=new Address;
        $address=json_encode($address,JSON_UNESCAPED_UNICODE);
        if($_POST['users']==''){
            $id_user="andanh@gmail.com";
        }else{
            $id_user=$_POST['users'];
        }
        $price_unit=$_POST['price_unit'];
        
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
    
                        $url_file="app_carrotstore/".time().rand(0,1000).$file_name;
                        move_uploaded_file($file_tmp,$url_file);
                  }else{
                     print_r($errors);
                     exit;
                  }
        }
        
        if($_POST['id_update']!='-1'){
            $id_update=$_POST['id_update'];
            if($url_file!=''){
                $str_update=",`icon` ='$url_file'";
            }else{
                $str_update="";
            }
            $update=mysql_query("UPDATE `products` SET `name_product` = '$name_product', `desc_product` = '$desc_product',`type` = '$type_product',`users` = '$id_user',`price` = '$price_value',`price_country` = '$price_unit', `date_edit` = NOW() $str_update WHERE `id` = '$id_update';");
            echo "Update success!!!";
        }else{
            $a=mysql_query("INSERT INTO `products` (`name_product`, `desc_product`,`type`,`users`,`price`,`price_country`,`date`,`icon`) VALUES ('$name_product','$desc_product','$type_product','$id_user','$price_value','$price_unit',NOW(),'$url_file');");
            echo "Add success!!!";
        }
       
    exit;
}

if($func=='login'){
     $username=$_POST['usernames'];
     $password=$_POST['passwords'];
     $type_action=$_POST['function_type'];
    if(trim($_POST['passwords'])==""&&trim($_POST['usernames'])==""){
        echo "0";
        exit;
    }else{
        
        if($type_action=='login'){
             $result=mysql_query("SELECT * FROM `accounts` WHERE `usernames` = '$username' AND `password`='$password' LIMIT 1");
             if(mysql_num_rows($result)>0){
                 $data=mysql_fetch_array($result);
                $acc=new acc_login();
                $acc->id=$username;
                $names=$data[11];
                $data_user=get_row('accounts',$data[11]);
                if($data_user['fullname']!=''){
                    $full_name=json_decode($data_user['fullname']);
                    $names=$full_name[0];
                }
                $acc->name=$names;
                $acc->pay=$data[9];
                $acc->email=$data[12];
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

if($func=='delete_product'){
    $id_product=$_POST['id'];
    $delete_query=mysql_query("DELETE FROM `products` WHERE ((`id` = '$id_product'));");
    echo 'Delete success!!!';
    exit;
}

if($func=='additional_info'){
    $type_update=$_POST['type'];
    $usernames=$_POST['id_login'];
    //update payment
    if($type_update=="0"){
        $values=$_POST['value'];
        $update_query="UPDATE `accounts` SET `pay` = '$values' WHERE `usernames` = '$usernames';";
        mysql_query($update_query);
        echo "0";
        exit;
    }
    
    if($type_update=="1"){
        $phone=(array)json_decode($_POST['value']);
        $update_query="UPDATE `accounts` SET `phone` = '$values' WHERE `usernames` = '$usernames';";
        echo "1";
        exit;
    }
    echo "-1";
    exit;
}
?>