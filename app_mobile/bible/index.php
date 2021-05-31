<?php
include_once("config.php");
include_once("database.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Bible",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/bible";
$cms->database_mysql=$mysql_database;
$cms->add_css("style.css");
$cms->add_menu_page("Tổng quang","fa-tachometer","page_home.php");
$cms->add_menu_table("Sách","fa-book","book");
$cms->add_menu_page("Hình ảnh","fa-picture-o","page_media.php");
$cms->add_menu_page("Quản lý quốc gia triển khai","fa-globe","page_manager_country.php");
$cms->add_menu_table("Từ khóa ngôn ngữ","fa-tag","key_lang");
$cms->add_menu_function("Ngôn ngữ ứng dụng","fa-language",'{"function":"show_lang","table_key":"key_lang","table_data":"lang_value","field_key":"name_key","field_data":"value","field_data_lang_id":"id_country"}');
$cms->html_show();
?>
