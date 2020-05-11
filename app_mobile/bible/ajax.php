<?php
include "config.php";
include "database.php";

$func=$_POST['function'];

if($func=='save_order'){
    $type_book=$_POST['type_book'];
    $arr_book_id=json_decode($_POST['arr_id_book']);
    for($i=0;$i<sizeof($arr_book_id);$i++){
        $query_update_order=mysql_query("UPDATE `book` SET `orders` = '$i' WHERE `id` = '".$arr_book_id[$i]."';");
    }
    echo "Lưu lại thứ tự các sách thành công!";
}

if($func=='save_order_p'){
    $id_book=$_POST['id_book'];
    $id_chapter=$_POST['id_chapter'];
    $lang_book=$_POST['lang_book'];
    
    $arr_id_p=json_decode($_POST['arr_id_p']);
    for($i=0;$i<sizeof($arr_id_p);$i++){
        $query_update_order=mysql_query("UPDATE `paragraph_$lang_book` SET `orders` = '$i' WHERE `id` = '".$arr_id_p[$i]."';");
    }
    echo "Lưu lại thứ tự các sách thành công!";
}


mysql_close($link);
?>