<?php
include "config.php";
include "database.php";

$date = date('Y/m/d', time());

Class Log_item{
    public $key='';
    public $count='';
}

$body_mail_send="Dữ liệu đã trò chuyện Virtual lover ngày (".$date.")\n";
$data_country=array();
$total_data=0;


$list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
while($l=mysqli_fetch_array($list_country)){
    $key_lang=$l['key'];
    $count_data_country_query=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_key` WHERE `lang` = '$key_lang'");
    $count_data_country=mysqli_fetch_array($count_data_country_query);
    $count_data_country=$count_data_country[0];
    $body_mail_send.=$key_lang." : ".$count_data_country."\n";
    $total_data=$total_data+intval($count_data_country);
    $item_log=new Log_item();
    $item_log->key=$key_lang;
    $item_log->count=$count_data_country;
    array_push($data_country,$item_log);
    mysqli_free_result($count_data_country_query);
    
    $files = glob('app_mygirl/app_my_girl_'.$key_lang.'_brain/*'); 
    foreach($files as $file){ 
      if(is_file($file)) unlink($file); 
    }
}

$count_android=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_key` WHERE `os` = 'android'");
$count_ios=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_key` WHERE `os` = 'ios'");
$count_ver1=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_key` WHERE `version` = '1'");
$count_ver2=mysqli_query($link,"SELECT count(*) FROM `app_my_girl_key` WHERE `version` = '2'");

$count_android_data=mysqli_fetch_array($count_android);
$count_android_data=$count_android_data[0];
$count_ios_data=mysqli_fetch_array($count_ios);
$count_ios_data=$count_ios_data[0];
$count_ver1_data=mysqli_fetch_array($count_ver1);
$count_ver1_data=$count_ver1_data[0];
$count_ver2_data=mysqli_fetch_array($count_ver2);
$count_ver2_data=$count_ver2_data[0];

$body_mail_send.="\n\nAndroid:".$count_android_data."\n";
$body_mail_send.="Ios:".$count_ios_data."\n";
$body_mail_send.="Version 1:".$count_ver1_data."\n";
$body_mail_send.="Version 2:".$count_ver2_data."\n\n";

$body_mail_send.="Tổng dữ liệu:".$total_data."\n\n";
echo var_dump($data_country);



$log_data=json_encode($data_country);
$query_add=mysqli_query($link,"INSERT INTO `app_my_girl_log_data` (`dates`,`key`,`data`,`android`,`ios`,`ver0`,`ver1`) VALUES (now(),'$total_data','$log_data','$count_android_data','$count_ios_data','$count_ver1_data','$count_ver2_data');");

$delete_query=mysqli_query($link,"DELETE FROM `app_my_girl_key`");
//$delete_query=mysqli_query($link,"DELETE FROM `app_my_girl_key` where (`lang` != 'ja' AND `lang`!='ko' AND `lang`!='ar')");
$num_delete=mysqli_affected_rows($link);
$body_mail_send.="Đã xóa dữ liệu từ khóa:".$num_delete."\n";
/*
$delete_query_brain=mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE  `criterion` = '0' OR `approved` = '1'");
$num_delete_brain=mysqli_affected_rows($link);
$body_mail_send.="Đã xóa dữ liệu dạy:".$num_delete_brain."\n";
*/

echo $body_mail_send;

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Virtual lover <kurotsmile@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
mail('kurotsmile@gmail.com','Virtual lover ('.$total_data.') - '.$date.' ',$body_mail_send,$headers);
?>