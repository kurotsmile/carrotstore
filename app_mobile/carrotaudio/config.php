<?php
session_start();
$name_host='carrotaudio.com';
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url=$protocol.$name_host;
$url_admin=$url.'/admin.php';
$url_carrot_store='https://carrotstore.com/';
$url_work='http://carrotstore.com/work';
$mysql_host='localhost';
$mysql_pass='28091993';
$mysql_user='carrot';
$mysql_database='data_music';

//Seo
$seo_title='Carrot Audio';
$seo_description='Carrot Audio';
