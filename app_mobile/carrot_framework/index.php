<?php
include_once("config.php");
include_once("database.php");
include_once("carrot_cms.php");

$cms=new Carrot_CMS("Carrot Framework",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/carrot_framework";
$cms->database_mysql=$mysql_database;
$cms->add_css("style.css");
$cms->add_menu_page("Khiểm duyệt","fa-umbrella","page_inspection.php");
$cms->add_menu_page("Hàm và phương thức","fa-code","page_help.php");
$cms->add_menu_page("Ứng dụng","fa-rocket","page_app.php");
$cms->add_menu_page("Avatar người dùng","fa-picture-o","page_user_avatar.php");
$cms->add_menu_page("Mua hàng (in-app)","fa-buysellads","page_inapp.php");
$cms->add_menu_page("Chia sẻ","fa-share-alt-square","page_share.php");
$cms->add_menu_page("Quảng cáo","fa-modx","page_ads.php");
$cms->add_menu_page("Đài phát thanh","fa-wifi","page_radio.php");
$cms->add_menu_page("Quản trị viên","fa-user","page_user.php");
$cms->html_show();
?>
