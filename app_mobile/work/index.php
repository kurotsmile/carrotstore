<?php
ob_start("ob_gzhandler");
include "config.php";
include "database.php";
session_start();
class Work{
    public $lang=array();
}

$work=new Work();

Class Lang{
    public $id="";
    public $name="";
}

$query_list_lang=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
while($row_lang=mysqli_fetch_array($query_list_lang)){
    $lang_item=new Lang();
    $lang_item->id=$row_lang['key'];
    $lang_item->name=$row_lang['name'];
    array_push($work->lang,$lang_item);
}

$page_show='work';

if(isset($_POST['submit_login'])){
    $user_id=$_POST['user_id'];
    $user_pass=$_POST['user_pass'];
    $mysql_query_user=mysqli_query($link,"SELECT * FROM `work_user` WHERE `user_name` = '$user_id' AND `user_pass`='$user_pass' LIMIT 1");
    if(mysqli_num_rows($mysql_query_user)>0){
        $_SESSION['login_user']=$_POST['user_id'];
        $_SESSION['msg']="đăng nhập thành công !";
        if($_POST['id_object']!=''){
            $id_object=$_POST['id_object'];
            $lang=$_POST['lang'];
            $type_chat=$_POST['type_chat'];
            $type_action=$_POST['type_action'];
            header('Location: '.$url.'?id_object='.$id_object.'&lang='.$lang.'&type_chat='.$type_chat.'&type_action='.$type_action);
        }
        unset($_POST);
    }else{
        $_SESSION['msg']="đăng nhập thất bại (kiểm tra tên và mật khẩu)!";
    }
}

if(isset($_GET['log_out'])){
    session_unset();
}

if(isset($_GET['page_show'])){
    $page_show=$_GET['page_show'];
}

if(isset($_POST['page_show'])){
    $page_show=$_POST['page_show'];
}



?>

<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Làm Việc - Carrot</title>
    <link href="<?php echo  $url;?>/style.min.css?v=<?php echo $ver;?>" rel="stylesheet" />
    <link href="<?php echo  $url;?>/css/buttonPro.css?v=<?php echo $ver;?>" rel="stylesheet" />
    <link rel="icon" href="<?php echo $url;?>/favicon.ico?v=<?php echo $ver;?>" type="image/x-icon"/>
    <script src="<?php echo $url;?>/js/work.js?v=<?php echo $ver;?>"></script>
    <script src="<?php echo $url_carrot_store;?>/js/jquery.js?v=<?php echo $ver;?>"></script>
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/fonts5/css/fontawesome-all.css"/>
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/js/jquery-ui.css"/>
    <link href="<?php echo  $url;?>/css/jquery-comments.min.css?v=<?php echo $ver;?>" rel="stylesheet" />
    <script src="<?php echo $url_carrot_store; ?>/js/jquery-ui.js?v=<?php echo $ver;?>"></script>
</head>
<body>
<?php 

    if(isset($_SESSION['login_user'])){
        include "page_$page_show.php";
        include "template_add_report.php";
    }else{
        include "page_login.php";
    }

?>

</body>
</html>