<?php
$data_app=new stdClass();
$data_app->{"function"}='lang_app';
$data_app->{"table_key"}='app_key_lang';
$data_app->{"table_data"}='app_key_value';
$data_app->{"field_key"}='key';
$data_app->{"field_data"}='data';
$data_app->{"field_data_lang_id"}='lang';

$this->data_temp=$data_app;
include_once("../carrot_framework/carrot_cms_lang.php");
?>