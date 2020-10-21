<?php
include "config.php";
include "database.php";
include "function.php";
$view_page='list';
if(isset($_GET['view'])){
    $view_page=$_GET['view'];
}
?>
<html>
<head>
    <title>Trợ lý ảo PC</title>
    <link rel="shortcut icon" href="<?php echo $url;?>/icon.ico"/>
    <link href="<?php echo $url;?>/style.css" rel="stylesheet" />
    <link href="<?php echo $url_carrot_store;?>/assets/css/buttonPro.min.css?v=<?php echo $ver;?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url_carrot_store;?>/dist/sweetalert.min.css"/>
    <script src="<?php echo $url_carrot_store;?>/js/jquery.min.js"></script>
    <script src="<?php echo $url_carrot_store;?>/dist/sweetalert.min.js"></script>
</head>
<body>

<ul id="menu_top">
    <li><a href="<?php echo $url;?>/index.php?view=list"><i class="fa fa-list" aria-hidden="true"></i> Danh sách các câu lệnh</a></li>
    <li><a href="<?php echo $url;?>/index.php?view=add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a></li>
    <li><a href="<?php echo $url;?>/index.php?view=audio"><i class="fa fa-file-audio-o" aria-hidden="true"></i> Giọng đọc</a></li>
</ul>

<?php
include "page_".$view_page.".php";
?>
</body>
</html>