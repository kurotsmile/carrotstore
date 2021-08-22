<?php
include_once("config.php");
include_once("database.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Password",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/createpassword";
$cms->database_mysql=$mysql_database;
$cms->set_icon("icon.ico");
$cms->add_css("style.css");
$cms->add_menu_page("Tổng quang","fa-tachometer","page_overview.php");
$cms->add_menu_page("Quản lý quốc gia kích hoạt","fa-adjust","page_active_country.php");
$cms->add_menu_page("Đa ngôn ngữ","fa-language","page_lang.php");
$cms->html_show();
?>
