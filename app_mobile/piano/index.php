<?php
session_start();
include "config.php";
include "database.php";
$userlogin=null;
if(isset($_SESSION['userlogin'])) $userlogin=$_SESSION['userlogin'];

function msg($txt,$type='warning'){
    return '<script>swal("Thông báo", "'.$txt.'", "'.$type.'");</script>';
}

if(isset($_GET['logout'])){unset($_SESSION['userlogin']);$userlogin=null;}
if(isset($_REQUEST['userlogin'])){
    $userlogin=''; if(isset($_REQUEST["userlogin"])) $userlogin=$_REQUEST["userlogin"];
    $password='';   if(isset($_REQUEST["password"])) $password=$_REQUEST["password"];
    $query_login=mysqli_query($link,"SELECT * FROM carrotsy_work.`work_user` WHERE `user_name` = '$userlogin' AND `user_pass` = '$password' LIMIT 1");
    $userlogin=mysqli_fetch_assoc($query_login);
    if(isset($userlogin)){
        $_SESSION['userlogin']=$userlogin;
    }

}

if(isset($_SESSION['userlogin'])){
    $page_view='home';
    if(isset($_GET['view'])){
        $page_view=$_GET['view'];
    }
}else{
    $page_view='login';
}
?>
<html>
<head>
    <title>Piano</title>
    <link rel="icon" href="<?php echo $url;?>/icon.ico"/>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo $url;?>/style.css"/>
    <script src="<?php echo $url_carrot_store;?>/js/jquery.js"></script>
    <link href="<?php echo $url_carrot_store;?>/assets/css/buttonPro.min.css" rel="stylesheet" />
    <script src="<?php echo $url_carrot_store;?>/dist/sweetalert.min.js?v=<?php echo $ver;?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo $url_carrot_store;?>/dist/sweetalert.min.css?v=<?php echo $ver;?>"/>
</head>
<body>
<div id="menu_head">
    <a href="<?php echo $url;?>" class="title">Piano Carrot</a>
    <?php if(isset($userlogin)){?>
    <a href="<?php echo $url;?>?view=edit" class="item_menu" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
    <a href="<?php echo $url;?>?view=category" class="item_menu" ><i class="fa fa-list" aria-hidden="true"></i> Chủ đề</a>
    <a href="<?php echo $url;?>?view=lang" class="item_menu" ><i class="fa fa-globe" aria-hidden="true"></i> Ngôn ngữ ứng dụng</a>
    <a id="btn_logout" class="buttonPro small yellow" href="<?php echo $url;?>?logout=1"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
    <?php }?>
</div>
<?php
    include "page_".$page_view.".php";
?>
</body>
</htnml>