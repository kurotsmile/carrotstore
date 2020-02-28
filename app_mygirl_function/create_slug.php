<?php
$list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
while($l=mysql_fetch_array($list_country)){
    $k=$l['key'];
    $query_music=mysql_query("SELECT * FROM `app_my_girl_$k` WHERE `effect` = '2'");
    while($data_music=mysql_fetch_array($query_music)){
        $id_music=$data_music['id'];
        $url_slug=slug_url(vn_to_str($data_music['chat'])).'-'.$id_music;
        $query_update_slug=mysql_query("UPDATE `app_my_girl_$k` SET `slug` = '$url_slug' WHERE `id` = '$id_music';");
        echo "tạo thành công slug url:".$url_slug.' Bài hát id:'.$id_music.' ngôn ngữ : '.$k;
    }
    echo '<hr/>';
}
mysql_free_result($list_country);