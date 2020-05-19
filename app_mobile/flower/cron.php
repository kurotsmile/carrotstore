<?php
include "config.php";
include "data.php";

class Item_Log{
    public $key;
    public $count;
}

$arr_log=array();

for($i=0;$i<count($app_flower->list_lang);$i++){
    $query_log_dat=mysql_query("SELECT count(*) FROM `log_day` where `lang`='".$app_flower->list_lang[$i]->key."'");
    $count_log=mysql_fetch_array($query_log_dat);
    $item_log=new Item_Log();
    $item_log->key=$app_flower->list_lang[$i]->key;
    $item_log->count=$count_log[0];
    array_push($arr_log,$item_log);
}

echo json_encode($arr_log);