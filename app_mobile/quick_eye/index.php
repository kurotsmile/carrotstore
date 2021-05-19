<?php
include_once("config.php");
include_once("database.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Quick Eye",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/quick_eye";
$cms->database_mysql=$mysql_database;
$cms->add_menu_table("Điểm số","","scores");
$cms->html_show();
?>
