<?php
include_once("config.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Music",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/musicforlife";
$cms->database_mysql=$mysql_database;
$cms->set_icon("favicon.ico");
$cms->add_css("style.css");
$cms->add_menu_page("Tổng quang","fa-tachometer","page_index.php");
$cms->add_menu_page("Tìm kiếm","fa-search","page_search.php");
$cms->add_menu_page("Ngôn ngữ","fa-language","page_lang.php");
$cms->html_show();
?>