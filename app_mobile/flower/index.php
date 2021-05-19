<?php
include_once("config.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Flower",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/flower";
$cms->database_mysql=$mysql_database;
$cms->add_menu_table("Nhật ký hoặt động","","log_day");
$cms->add_menu_table("Nhật ký hoặt động","","log_month");
$cms->add_menu_table("Dữ liệu","","flower");
$cms->add_menu_table("Các nước kích hoặt","","country");
$cms->add_menu_table("Từ khóa ngôn ngữ","","key_lang");
$cms->add_menu_function("Ngôn ngữ ứng dụng","",'{"function":"show_lang","table_key":"key_lang","table_data":"lang_value","field_key":"name_key","field_data":"value","field_data_lang_id":"id_country"}');
$cms->html_show();
?>
