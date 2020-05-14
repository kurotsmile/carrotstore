<?php
session_start();
include "config.php";
include "database.php";
include "function.php";
$page='home';
if(isset($_GET['page'])){
    $page=$_GET['page'];
}

if(isset($_POST['page'])){
    $page=$_POST['page'];
}

if(isset($_GET['logout'])){
    unset($_SESSION);
}

$user_name='';
$error_login='';
if(isset($_POST['user_name'])){
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];
    $query_login=mysqli_query($link,"SELECT * FROM carrotsy_work.`work_user` WHERE `user_name`='$user_name' AND `user_pass`='$user_pass' LIMIT 1");
    if(mysqli_num_rows($query_login)>0){
        $data_user=mysqli_fetch_array($query_login);
        $_SESSION['login_id']=$data_user['user_id'];
        header('Location: '.$url);
    }else{
        $error_login=alert("Đăng nhập không thành công! Hãy kiểm tra lại mật khẩu và tên đăng nhập","error");
    }
    
}

?>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Làm việc - Kinh thánh</title>
    <link href="<?php echo $url;?>/style.css" rel="stylesheet" />
    <link href="<?php echo $url;?>/buttonPro.css" rel="stylesheet" />
    <link rel="icon" href="icon.ico" type="image/x-icon"/>
    <script src="<?php echo $url_carrot_store;?>/js/jquery.js"></script>
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/js/jquery-ui.css"/>
    <script src="<?php echo $url_carrot_store;?>/js/jquery-ui.js"></script>
    <script src="<?php echo $url;?>/js/sweetalert.min.js"></script>
</head>
<body>
<div id="header">
<span id="title">Kinh thánh</span>
<a href="<?php echo $url;?>?logout=1" style="float: right;margin-right: 10px;color: white;margin-top: 10px;"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
</div>
<ul id="menu_work">
<?php
$query_list_app=mysqli_query($link,"SELECT * FROM carrotsy_work.`work_app` WHERE `id` != '$app_id'");
while($item_app=mysqli_fetch_array($query_list_app)){
?>
    <li><a href="<?php echo $item_app['url'] ?>" target="_blank"><img src="<?php echo $url_work;?>/img.php?url=avatar_app/<?php echo $item_app['id'];?>.png&size=18&type=app"  title="<?php echo $item_app['nam']; ?>" /> <span class="name"><?php echo $item_app['name']; ?></span></a></li>
<?php
}
?>
</ul>
<?php
if(isset($_SESSION['login_id'])){
?>
<ul id="menu">
    <li><a href="<?php echo $url;?>?page=home" class="buttonPro <?php if($page=='home'){ echo 'orange';}else{ echo 'red'; }?>"><i class="fa fa-globe" aria-hidden="true"></i> Tổng quang</a></li>
    <li><a href="<?php echo $url;?>?page=media" class="buttonPro <?php if($page=='media'){ echo 'orange';}else{ echo 'red'; }?>"><i class="fa fa-picture-o" aria-hidden="true"></i> Hình ảnh</a></li>
    <li><a href="<?php echo $url;?>?page=manager_country" class="buttonPro <?php if($page=='manager_country'){ echo 'orange';}else{ echo 'red'; }?>"><i class="fa fa-globe"></i> Quản lý quốc gia triển khai</a></li>
    <li><a href="<?php echo $url;?>?page=manager_lang_key" class="buttonPro <?php if($page=='manager_lang_key'){ echo 'orange';}else{ echo 'red'; }?>"><i class="fa fa-tags"></i> Trường ngôn ngữ</a></li>
    <li><a href="<?php echo $url;?>?page=tool" class="buttonPro <?php if($page=='tool'){ echo 'orange';}else{ echo 'red'; }?>"><i class="fa fa-wrench"></i> Công cụ</a></li>
</ul>
<?php
}
?>
<div id="body">
<?php
if(isset($_SESSION['login_id'])){
    include 'page_'.$page.'.php';
}else{
    include 'page_login.php';
}
mysqli_close($link);
?>
</div>
</body>
</html>