<?php
include "config.php";
include "database.php";
header('Content-type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
$function='';if(isset($_REQUEST['function'])) $function=$_REQUEST['function'];

if($function=='syn_database'){
    $arr_table=json_decode($_POST['arr_table']);
    $arr_db=json_decode($_POST['arr_db']);

    $obj=new stdClass();
    $arr_item=array();
    for($i=0;$i<count($arr_table);$i++){
        $table_name=$arr_table[$i];
        $db_name=$arr_db[$i];
        $q_table=mysqli_query($link,"SELECT COUNT(*) as c FROM $db_name.`$table_name` LIMIT 1");
        $data_table=mysqli_fetch_assoc($q_table);
        
        $item=new stdClass();
        $item->{"table"}=$table_name;
        $item->{"db"}=$db_name;
        $item->{"c"}=$data_table['c'];
        array_push($arr_item,$item);
    }
    $obj->{"all_item"}=$arr_item;
    echo json_encode($obj);
    exit;
}
?>