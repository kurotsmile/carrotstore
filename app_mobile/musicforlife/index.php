<?php
session_start();
include "config.php";
include "function.php";

$view='index';
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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Music For Life</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <link rel="icon" href="<?php echo $url;?>/favicon.ico" type="image/x-icon"/>
		<meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="<?php echo $url;?>/css/manager.css" />
        <script src="<?php echo $url_carrot_store;?>/js/jquery.js"></script>
	</head>
	<body>
    <?php
    if(isset($_SESSION['login'])){
    ?>
        <div id="head">
            <ul id="menu">
                <li class="active"><a href="<?php echo $url; ?>/index.php?view=index"><i class="fa fa-music" aria-hidden="true"></i> Music for life</a></li>
                <li ><a href="<?php echo $url; ?>/index.php?view=search"><i class="fa fa-search" aria-hidden="true"></i> Key search</a></li>
                <li><a href="<?php echo $url; ?>/index.php?view=lang_key"><i class="fa fa-globe" aria-hidden="true"></i> Quản lý ngôn ngữ <b style="font-weight: bold;font-size: 10px;">(Ứng dụng)</b></a></li>
                <li><a href="<?php echo $url; ?>/index.php?view=game_lang_key"><i class="fa fa-language" aria-hidden="true"></i> Quản lý ngôn ngữ <b style="font-weight: bold;font-size: 10px;">(Game)</b></a></li>
                <li><a href="<?php echo $url; ?>/index.php?view=tool"><i class="fa fa-wrench" aria-hidden="true"></i> Công cụ</a></li>
                <li style="float: right;"><a href="<?php echo $url;?>/index.php?log_out=1"><i class="fa fa-user" aria-hidden="true"></i> Đăng xuất</a></li>
            </ul>
        </div>

        <div id="body">
            <?php 
                include "manage_".$view.".php";
            ?>
        </div>
    <?php
    }else{
        include "page_login.php"; 
    }
    ?>
	</body>
</html>