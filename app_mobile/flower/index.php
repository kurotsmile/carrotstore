<?php
include_once("config.php");
include_once("../carrot_framework/carrot_cms.php");

$cms=new Carrot_CMS("Flower",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/flower";
$cms->database_mysql=$mysql_database;
$cms->add_css("style.css");
$cms->add_menu_page("Tổng quang","fa-tachometer","page_home.php");
$cms->add_menu_table("Nhật ký ngày","","log_day");
$cms->add_menu_table("Nhật ký tháng","","log_month");
$cms->add_menu_page("Các nước kích hoặt","fa-map","page_manager_country.php");
$cms->add_menu_table("Từ khóa ngôn ngữ","","key_lang");
$cms->add_menu_function("Ngôn ngữ ứng dụng","",'{"function":"show_lang","table_key":"key_lang","table_data":"lang_value","field_key":"name_key","field_data":"value","field_data_lang_id":"id_country"}');
$cms->html_show();
?>
