<?php
include_once("config.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Happy Diary",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/happy_diary";
$cms->database_mysql=$mysql_database;
$cms->set_icon("favicon.ico");
$cms->add_css("style.css");
$cms->add_menu_page("Tổng quang","fa-tachometer","page_home.php");
$cms->add_menu_table("Từ khóa ngôn ngữ","fa-tag","lang_key");
$cms->add_menu_function("Ngôn ngữ ứng dụng","fa-language",'{"function":"show_lang","table_key":"lang_key","table_data":"lang_val","field_key":"key","field_data":"data","field_data_lang_id":"lang"}');
$cms->add_menu_page("Quản lý quốc gia triển khai","fa-globe","page_active_app.php");
$cms->html_show();
?>
