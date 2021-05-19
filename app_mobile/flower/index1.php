<?php
session_start();
include "config.php";
include "function.php";
$view='home';
if(isset($_GET['view'])){
    $view=$_GET['view'];
}

if(isset($_GET['log_out'])){
    unset($_SESSION['login']);
}

if(isset($_POST['username'])){
    $user_name=$_POST['username'];
    $user_pass=$_POST['passsword'];
    $query_login=mysqli_query($link,"SELECT * FROM  `carrotsy_work`.`work_user` WHERE `user_name` = '$user_name' AND `user_pass` = '$user_pass' LIMIT 1");
    if(mysqli_num_rows($query_login)){
        $_SESSION['login']='1';
    }
}


?>

<html>
    <head>
        <title>Yêu hay không yêu</title>
        <link rel="icon" href="<?php echo $url;?>/image/iconFlower.ico" type="image/gif" sizes="16x16"/>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="<?php echo $url;?>/style.css"/>
        <script src="<?php echo $url_carrot_store;?>/js/jquery.js"></script>
    </head>
<body>

<?php
if(isset($_SESSION['login'])){
?>
<ul id="menu_home">
    <li <?php if($view=='home'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=home"><i class="fa fa-home"></i> Quảng lý hoa</a></li>
    <li <?php if($view=='msg'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=msg"><i class="fa fa-comment"></i> Châm ngôn chờ duyệt</a></li>
    <li <?php if($view=='msg_active'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=msg_active"><i class="fa fa-comments" aria-hidden="true"></i> Châm ngôn sử dụng</a></li>
    <li <?php if($view=='follow'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=follow"><i class="fa fa-universal-access" aria-hidden="true"></i> Theo dõi</a></li>
    <li <?php if($view=='sound'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=sound"><i class="fa fa-music" aria-hidden="true"></i> Âm thanh bấm</a></li>
    <li <?php if($view=='manager_country'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=manager_country"><i class="fa fa-globe" aria-hidden="true"></i> Quốc gia triển khai</a></li>
    <li <?php if($view=='manager_lang_key'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=manager_lang_key"><i class="fa fa-key" aria-hidden="true"></i> Từ khóa ngôn ngữ</a></li>
    <li <?php if($view=='tool'){?>class="active"<?php } ?>><a href="<?php echo $url;?>?view=tool"><i class="fa fa-archive" aria-hidden="true"></i> Công cụ</a></li>
    <li style="float: right;"><a href="<?php echo $url;?>?log_out=1"><i class="fa fa-user" aria-hidden="true"></i> Đăng xuất</a></li>
</ul>

<?php 
    include "page_$view.php";
}else{
   include "page_login.php"; 
}
?>
</body>
</html>