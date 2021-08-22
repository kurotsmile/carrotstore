<?php
$data_app=new stdClass();
$data_app->{"function"}='page_lang_vl';
$data_app->{"table_key"}='cr_framework_lang_key';
$data_app->{"table_data"}='cr_framework_lang_val';
$data_app->{"field_key"}='key';
$data_app->{"field_data"}='data';
$data_app->{"field_data_lang_id"}='lang';

$this->data_temp=$data_app;
include_once("../carrot_framework/carrot_cms_lang.php");
?>
