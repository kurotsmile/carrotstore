<?php
include_once("config.php");
include_once("database.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Flower",$link);
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/appai";
$cms->database_mysql=$mysql_database;
$cms->html_show();
?>