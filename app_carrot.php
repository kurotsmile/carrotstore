<?php
include "config.php";
include "database.php";
include "function.php";

class App{
    public $all_contact=array();
};
$app=new App;

class Score{
    public $id='';
    public $username='';
    public $avatar='';
    public $score='';
}

class acc_login{
    public $id='';
    public $name='';
    public $avatar='';
};

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

if(isset($_POST['func'])&&$_POST['func']=='top'){
    $id_app=$_POST['id_app'];
     $result = mysql_query("SELECT * FROM `app_carrot`  WHERE `product_id` = '$id_app' LIMIT 50",$link);
     while ($row = mysql_fetch_array($result)) {
        $score=new Score();
        $acc=get_account($row['username']);
        $score->id=$row['username'];
        $score->username=show_name_User($row['username']);
        $score->avatar=thumb($acc['avatar'],'80x80');
        $score->score='Score:'.$row['data'];
        array_push($app->all_contact,$score);
     }
     echo json_encode($app);
     mysql_close($link);
     exit;  
}

if(isset($_POST['func'])&&$_POST['func']=='post_score'){
    $score=$_POST['score'];
    $username=$_POST['username'];
    $id_app=$_POST['id_app'];
    $result = mysql_query("SELECT * FROM `app_carrot`  WHERE `username` = '$username' LIMIT 1",$link);
    if(mysql_num_rows($result)>0){
        mysql_query("UPDATE `app_carrot` SET `data` = '2' WHERE `username` = '$username';",$link);
    }else{
        mysql_query("INSERT INTO `app_carrot` (`username`, `product_id`, `data`) VALUES ('$username', '$id_app', '$score');",$link);
    }
     echo var_dump($_POST);
     exit;  
}