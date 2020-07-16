<?php
ini_set('upload_max_filesize', '90M');
ini_set('post_max_size', '90M');
ini_set('max_input_time', 900);
ini_set('max_execution_time', 900);

header('Content-type: text/html; charset=utf-8');
session_start();

include "../config.php";


if(isset($_POST['key_contry'])){
   $_SESSION['lang']=$_POST['key_contry'];     
}

if(isset($_SESSION['lang'])){

}else{
    $_SESSION['lang']='vi';
}



include "../database.php";
include "../function.php";  
include "function.php";  

if(isset($_POST['logout'])){
    unset($_SESSION['user_login']);
}

if(isset($_SESSION['user_login'])) {
    $user_login=json_decode($_SESSION['user_login']);
}

$user_name='';
$error_login='';


if(isset($_POST['user_name'])){
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];
    $query_login=mysqli_query($link,"SELECT * FROM carrotsy_work.`work_user` WHERE `user_name`='$user_name' AND `user_pass`='$user_pass' LIMIT 1");
    if(mysqli_num_rows($query_login)>0){
        $data_login_user=mysqli_fetch_array($query_login);
        $user_login=new User_login();
        $user_login->id=$data_login_user['user_id'];
        $user_login->name=$user_name;
        $user_login->type='admin';
        $user_login->link=$url.'/admin';
        $user_login->avatar='http://work.carrotstore.com/avatar_user/'.$data_login_user['user_id'].'.png';
        $user_login->email=$data_login_user['email'];
        $user_login->lang=$_SESSION['lang'];
        $_SESSION['user_login']=json_encode($user_login);
    }else{
        $error_login=alert("Đăng nhập không thành công! Hãy kiểm tra lại mật khẩu và tên đăng nhập","error");
    }
}



if($_GET&&isset($_GET['page_view'])){
    $page_file=$_GET['page_view'];
}else{
    $page_file="page_product"; 
}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html lang="en-US">
<head>
	<meta name="author" content="Trần Thiện Thanh" />
    <link href="<?php echo $url_admin; ?>/style.min.css" rel="stylesheet" />
	<title>Carrot - Admin </title>
    <meta charset="utf-8"/>
    <meta name="title" content="Admin CarrotStore" />
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/font-awesome.min.css"/>
    <link rel="canonical" href="<?php echo $url; ?>" />
    <link rel="shortcut icon" href="<?php echo $url; ?>/images/icon.png"/>
    <link href="<?php echo $url_admin; ?>/style.min.css" rel="stylesheet" />
    <link href="<?php echo $url_carrot_store; ?>/assets/css/buttonPro.min.css" rel="stylesheet" />
    <meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />
    <script src="<?php echo $url; ?>/js/jquery.js"></script>
</head>
<body>
<?php
if(isset($_SESSION['user_login'])&&$user_login->type=='admin') {
?>

<div id="header">
    <a  href="<?php echo $url_admin; ?>"><img alt="logo" src="<?php echo $url; ?>/images/logo.png" id="logo" /></a>

    <a id="sell_product" href="<?php echo $url; ?>/admin/?page_view=page_product&sub_view=page_product_update">
        <?php
        $result = mysqli_query($link,"SELECT * FROM `products`");
        ?>
        <i class="fa fa-rocket fa-3x" style="float: left;margin-right: 10px;"></i>
        <strong style="font-size: 15px;width: 100px;">Thêm sản phẩm</strong><br />
        <span>(<span id="num_cart_show"><?php echo mysqli_num_rows($result); ?></span>) <?php echo lang($link,'sp'); ?></span>
    </a>

    <div id="bar_menu">
    <a href="<?php echo $url_admin; ?>/?page_view=page_product" <?php if($page_file=="page_product"){ echo 'class="active"';} ?>>Quản lý sản phẩm</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_ads" <?php if($page_file=="page_ads"){ echo 'class="active"';} ?>>Quảng cáo</a>
    <a href="<?php echo $url_admin; ?>/?page_view=page_music_lyrics" <?php if($page_file=="page_music_lyrics"){ echo 'class="active"';} ?>>Đóng góp lời</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_country_key_manager" <?php if($page_file=='page_country_key_manager'){ echo 'class="active"';} ?>>Ngôn ngữ hệ thống</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_login_manager" <?php if($page_file=='page_login_manager'){ echo 'class="active"';} ?>>Quản lý đăng nhập</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_trash" <?php if($page_file=='page_trash'){ echo 'class="active"';} ?>>Dọn rác</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_setting" <?php if($page_file=='page_setting'){ echo 'class="active"';} ?>>Cài đặt</a>
    <a href="<?php echo $url_admin;?>/?page_view=page_order" <?php if($page_file=='page_order'){ echo 'class="active"';} ?>>Đơn đặt hàng</a>

        <form  method="post" id="info_account" action="<?php echo $url_admin;?>/index.php" >
            <img class="login_avatar"  src="<?php echo $user_login->avatar;?>" />
            <strong class="username"><a target="_blank" style="float: left;color: yellow;padding: 5px;" href="http://work.carrotstore.com/?page_show=info_user"><?php echo $user_login->name ?></a></strong>
            <input class="buttonPro small blue" type="button" onclick="window.location.replace('<?php echo $url;?>')" value="CarrotStore"/>
            <input style="float: none;" type="submit" value="Đăng xuất" class="buttonPro purple small" id="btn_logout"  />
            <input type="hidden" name="logout" value="1" />
            <input type="hidden" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" name="urls" />
        </form>


    </div>
</div>
<?php
}
?>

<div style="float: left;width: 100%;">
<?php

if(isset($_SESSION['user_login'])&&$user_login->type=='admin') {
    include $page_file.'.php'; 
}else{    
    include "page_login.php";
}
?>

</div>

<div id="go_top" onclick="go_top()">
    <i class="fa fa-angle-double-up fa-3x"></i>
</div>

<div id="loading">
    <i class="fa fa-refresh fa-spin fa-3x" style="float: left;margin-right: 10px;"></i>
    <strong style="font-size: 15px;width: 100px;"><?php echo lang($link,'dang_xu_ly'); ?></strong><br />
    <span><?php echo lang($link,'dang_lay_du_lieu'); ?></span>
</div>

</body>
</html>
<?php
mysqli_close($link);
?>
