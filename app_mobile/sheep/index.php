<?php
session_start();
include "config.php";
include "function.php";
$get_view='home';

if(isset($_GET['view'])){
    $get_view=$_GET['view'];
}

function isset_file($file) {
    return (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE);
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
    <link rel="icon" href="<?php echo $url;?>/icon.ico" type="image/gif" sizes="16x16"/>
    <title>Đếm cừu - chống mất ngủ</title>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo $url;?>/style.css"/>
    <script src="<?php echo $url?>/js/jquery-3.4.1.min.js" type="text/javascript"></script>
</head>
<body>

<?php
if(isset($_SESSION['login'])){
?>
<ul id="menu_home">
    <li <?php if($get_view=='home'){?>class="active"<?php }?>><a href="<?php echo $url;?>?view=home"><i class="fa fa-home"></i> Đếm cừu</a></li>
    <li <?php if($get_view=='good_night'){?>class="active"<?php }?>><a href="<?php echo $url;?>?view=good_night"><i class="fa fa-comment"></i> Chúc ngủ ngon</a></li>
    <li <?php if($get_view=='sound'){?>class="active"<?php }?>><a href="<?php echo $url;?>?view=sound"><i class="fa fa-music"></i> Âm thanh</a></li>
    <li <?php if($get_view=='scores'){?>class="active"<?php }?>><a href="<?php echo $url;?>?view=scores"><i class="fa fa-list-ol"></i> Điểm số</a></li>
    <li <?php if($get_view=='lang'){?>class="active"<?php }?>><a href="<?php echo $url;?>?view=lang"><i class="fa fa-university"></i> Ngôn ngữ ứng dụng</a></li>
    <li <?php if($get_view=='key_lang'){?>class="active"<?php }?>><a href="<?php echo $url;?>?view=key_lang"><i class="fa fa-language"></i> Từ khóa ngôn ngữ</a></li>
    <li <?php if($get_view=='active_app'){?>class="active"<?php }?>><a href="<?php echo $url;?>?view=active_app"><i class="fa fa-globe"></i> Quốc gia triển khai</a></li>
    <li style="float: right;margin-right: 10px;"><a href="<?php echo $url;?>?log_out=1"><i class="fa fa-user" aria-hidden="true"></i> Đăng xuất</a></li>
</ul>
<ul id="menu_work">
<?php
$query_list_app=mysqli_query($link,"SELECT * FROM carrotsy_work.`work_app` WHERE `id` != '$app_id'");
while($item_app=mysqli_fetch_assoc($query_list_app)){
?>
    <li><a href="<?php echo $url_carrot_store.'/'.$item_app['url'] ?>" target="_blank"><img src="<?php echo $url_work;?>/img.php?url=avatar_app/<?php echo $item_app['id'];?>.png&size=18&type=app" style="" title="<?php echo $item_app['name']; ?>" /> <span class="name"><?php echo $item_app['name']; ?></span></a></li>
<?php
}
?>
</ul>
<?php
 
    include "page_".$get_view.".php";
}else{
   include "page_login.php"; 
}
?>
</body>
</html>