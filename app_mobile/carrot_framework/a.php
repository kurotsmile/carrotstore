<?php
$item=new stdClass();
$item->{"function"}="show_lang";
$item->{"table_key"}="cr_framework_lang_key";
$item->{"table_data"}="cr_framework_lang_val";
$item->{"field_key"}="Key";
$item->{"field_data"}="data";
$item->{"field_data_lang_id"}="lang";
echo json_encode($item);

?>