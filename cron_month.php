<?php
include "config.php";
include "database.php";




$mysql_count_key=mysql_query("SELECT SUM(`key`) FROM `app_my_girl_log_data`");
$data_query=mysql_fetch_array($mysql_count_key);
$count_data=$data_query[0];


$add_log_month=mysql_query("INSERT INTO `app_my_girl_log_month` (`month`, `data`) VALUES (NOW(), '$count_data');");


$delete_all_log=mysql_query("DELETE FROM `app_my_girl_log_data`");


$date = date('Y/m/d', time());
$month=date('m', strtotime($date));

//t?t b?t msg hàn tháng
$list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
while($l=mysql_fetch_array($list_country)){
    $key_lang=$l['key'];
    $mysql_update1_lang=mysql_query("UPDATE `app_my_girl_msg_$key_lang` SET `disable` = '1' WHERE `limit_month` != '$month' AND `limit_month` != ''");
    $mysql_update2_lang=mysql_query("UPDATE `app_my_girl_msg_$key_lang` SET `disable` = '0' WHERE `limit_month` = '$month' AND `limit_month` != ''");
}
mysql_free_result($list_country);

/*
$list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
while($l=mysql_fetch_array($list_country)){
    $key_lang=$l['key'];
    $delete_music_data=mysql_query("DELETE FROM `app_my_girl_music_data_$key_lang`");
}
mysql_free_result($list_country);
*/

    $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($l=mysql_fetch_array($list_country)){
        $langsel=$l['key'];
        $dirname='app_mygirl/app_my_girl_temp_'.$langsel;
        $dir = opendir($dirname);

        while(false != ($file = readdir($dir)))
        {
            if(($file != ".") and ($file != "..") and ($file != "index.php"))
            {
                unlink($dirname.'/'.$file);
            }
        }
    }
