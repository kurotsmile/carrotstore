<?php
include "config.php";
include "database.php";

function msg($txt,$type='warning'){
    return '<script>swal("Thông báo", "'.$txt.'", "'.$type.'");</script>';
}

$page_view='home';
if(isset($_GET['view'])){
    $page_view=$_GET['view'];
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
    <a href="<?php echo $url;?>?view=edit" class="item_menu" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
</div>
<?php
    include "page_".$page_view.".php";
?>
</body>
</htnml>