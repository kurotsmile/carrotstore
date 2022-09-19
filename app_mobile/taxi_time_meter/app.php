<?php
include_once("carrot_framework.php");

if($function=="get_list_currency"){
    $lis_currency=array();
    $query_list_currency=mysqli_query($link,"SELECT * FROM `currency_unit` ORDER BY `code` ");
    while($c=mysqli_fetch_assoc($query_list_currency)){
        $item_c=new stdClass();
        $item_c->{"code"}=$c['code'];
        $item_c->{"symbol"}=$c['symbol'];
        array_push($lis_currency,$item_c);
    }
    echo json_encode($lis_currency);
}
?>