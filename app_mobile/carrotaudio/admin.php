<?php
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}

include "config.php";
include "database.php";
include "function.php";
session_start();
$page_view = 'admin_home';
if (isset($_GET['view'])) {
    $page_view = $_GET['view'];
}

if (isset($_GET['user_login'])) {
    $_SESSION['user_login'] = $_GET['user_login'];
    $_SESSION['avatar_login'] = $_GET['avatar_login'];
    $_SESSION['full_name_login'] = $_GET['full_name_login'];
}

if(isset($_GET['logout'])){
    unset($_SESSION['user_login'] );
    unset($_SESSION['avatar_login'] );
    unset($_SESSION['full_name_login'] );
}

if(!isset($_SESSION['user_login'])){
    if($page_view!='admin_home'){
        header("location: ".$url_admin);
    }
}

?>
<html>
<head>
    <title>Máy chủ dữ liệu</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/css/style.admin.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>/css/buttonPro.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>/css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>/css/sweetalert.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src="<?php echo $url; ?>/js/jquery.js"></script>
    <link href="<?php echo $url; ?>/icon.ico" rel="shortcut icon" type="image/x-icon"/>
    <script src="<?php echo $url; ?>/js/sweetalert.min.js"></script>
</head>
<body>
<div id="header">
    <ul id="menu_header">
        <li <?php if ($page_view == 'admin_home') {
            echo 'class="active"';
        } ?>><a href="<?php echo $url; ?>/admin"><i class="fa fa-database"aria-hidden="true"></i> Tổng quát</a></li>
        <?php if (isset($_SESSION['user_login'])) { ?>
            <li <?php if ($page_view == 'admin_tool') { echo 'class="active"'; } ?>><a href="<?php echo $url; ?>/tool"><i class="fa fa-wrench" aria-hidden="true"></i> Công cụ</a></li>
            <li style="float: right"><a href="<?php echo $url_admin; ?>?logout=1"><i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo $_SESSION['full_name_login'];?></a></li>
        <?php } ?>
    </ul>
</div>
<?php
include $page_view . '.php';
?>
<script>

    datacallback = function (data) {
        var html_txt = data["data"];
        swal({html: true, title: "Kiểm tra", text: html_txt});
    };

    function check_file(file_url) {
        $.ajax({
            url: '<?php echo $url_carrot_store;?>/app_my_girl_jquery.php',
            jsonp: "datacallback",
            data: "function=get_chat_by_audio_url&url_file=" + file_url,
            dataType: 'jsonp',
        });
    }
</script>
</body>
</html>