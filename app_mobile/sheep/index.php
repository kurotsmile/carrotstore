<?php
include_once("config.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Counting sheep",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/sheep";
$cms->database_mysql=$mysql_database;
$cms->set_icon("icon.ico");
$cms->add_css("style.css");
$cms->add_menu_page("Tổng quang","fa-tachometer","page_home.php");
$cms->add_menu_page("Nhạc không lời","fa-music","page_sound.php");
$cms->add_menu_table("Từ khóa ngôn ngữ","fa-tag","key_lang");
$cms->add_menu_function("Ngôn ngữ ứng dụng","fa-language",'{"function":"show_lang","table_key":"key_lang","table_data":"value_lang","field_key":"key","field_data":"value","field_data_lang_id":"id_country"}');
$cms->add_menu_page("Quản lý quốc gia triển khai","fa-globe","page_active_app.php");
$cms->html_show();
?>
