<?php
include "config.php";
include "database.php";

$id_link=$_GET['id_link'];
$list_country=mysqli_query($link,"SELECT `key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1'");
while($row_country=mysqli_fetch_assoc($list_country)){
    $key_lang=$row_country['key'];
    $query_link=mysqli_query($link,"SELECT * FROM carrotsy_shortenlinks.`link_$key_lang` WHERE `id` = '$id_link' LIMIT 1");
    if(mysqli_num_rows($query_link)>0){
        $data_link=mysqli_fetch_array($query_link);
        $view_link=$data_link['view'];
        $url_go_to=$data_link['link'];
        $view_link=intval($view_link)+1;
        $query_update_link=mysqli_query($link,"UPDATE carrotsy_shortenlinks.`link_$key_lang` SET `view` = '$view_link' WHERE `id` = '$id_link';");
        header("Location: $url_go_to");
        exit;
    }
}
?>