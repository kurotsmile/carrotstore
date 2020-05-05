<?php
include "../app_my_girl_template.php";
$type=$_GET['type'];
$val=$_GET['val'];
$dir='app_mygirl';
if($type=='folder'){
    mkdir("../$dir/$val", 0700);
    show_alert('Tạo thành công thư mục '.$val,'alert');
}
