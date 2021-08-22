<?php
$data_app=new stdClass();
$data_app->{"function"}='lang_extension_data';
$data_app->{"table_key"}='key_lang';
$data_app->{"table_data"}='value_lang';
$data_app->{"field_key"}='key';
$data_app->{"field_data"}='value';
$data_app->{"field_data_lang_id"}='id_country';

$this->cur_url=$this->cur_url."&func=extension_data";
$this->data_temp=$data_app;
include_once("../carrot_framework/carrot_cms_lang.php");
?>