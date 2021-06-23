<?php
include_once("config.php");
include_once("database.php");
include_once("carrot_cms.php");

$cms=new Carrot_CMS("Carrot Framework",$link,dirname(__FILE__));
$cms->url_carrot_store=$url_carrot_store;
$cms->url=$url_carrot_store."/app_mobile/carrot_framework";
$cms->database_mysql=$mysql_database;
$cms->add_css("style.css");
$cms->add_menu_page("Hướng dẫn","fa-info-circle","page_help.php");
$cms->add_menu("Từ khóa ngôn ngữ","","cr_framework_lang_key");
$cms->add_menu("Giá trị ngôn ngữ","","cr_framework_lang_val");
$cms->add_menu_function("Ngôn ngữ ứng dụng","",'{"function":"show_lang","table_key":"cr_framework_lang_key","table_data":"cr_framework_lang_val","field_key":"Key","field_data":"data","field_data_lang_id":"lang"}');
$cms->html_show();
?>
