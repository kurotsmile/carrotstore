<?php
include "config.php";
include "database.php";
include "function.php";
$query_log=mysqli_query($link,"SELECT * FROM `log`");

$page_view='page_overview';
if(isset($_GET['view'])){
    $page_view=$_GET['view'];
}
?>
<html>
<head>
    <title>CMS - Rút gọn liên kết</title>
    <script src="<?php echo $url_carrot_store;?>/js/jquery.js"></script>
    <link href="<?php echo $url;?>/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="<?php echo $url;?>/icon.ico"/>
    <link rel="stylesheet" href="<?php echo $url_carrot_store; ?>/assets/css/font-awesome.min.css"/>
</head>
<body>
<div id="header">
    <img src="<?php echo $url;?>/images/icon.png" style="float: left;width:50px;margin: 5px;" />
     Đã có <b><?php echo mysqli_num_rows($query_log); ?></b> liên kết rút gọn được tạo<br />
    <a class="buttonPro <?php if($page_view=='page_overview'){ echo 'orange';}else{ echo 'green';}?> " href="<?php echo $url;?>?view=page_overview"><i class="fa fa-info-circle" aria-hidden="true"></i> Tổng quan</a>
    <a class="buttonPro <?php if($page_view=='page_active_country'){ echo 'orange';}else{ echo 'green';}?> " href="<?php echo $url;?>?view=page_active_country"><i class="fa fa-globe" aria-hidden="true"></i> Kích hoạt quốc gia</a>
    <a class="buttonPro <?php if($page_view=='page_key_lang'){ echo 'orange';}else{ echo 'green';}?> " href="<?php echo $url;?>?view=page_key_lang"><i class="fa fa-key" aria-hidden="true"></i> Từ khóa ngôn ngữ ứng dụng</a>
    <a class="buttonPro <?php if($page_view=='page_tool'){ echo 'orange';}else{ echo 'green';}?> " href="<?php echo $url;?>?view=page_tool"><i class="fa fa-tool" aria-hidden="true"></i> Công cụ</a>
</div>
</div>
<div id="body">
<?php
include $page_view.'.php';
?>
</div>

</body>
</html>
