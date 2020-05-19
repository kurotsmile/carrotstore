<?php
$lang=$_GET['lang'];
$query_add_table_action=mysql_query("CREATE TABLE `flower_action_$lang` (
  `id_device` varchar(50) CHARACTER SET latin1 NOT NULL,
  `id_maxim` varchar(11) CHARACTER SET latin1 NOT NULL,
  `type` varchar(10) CHARACTER SET latin1 NOT NULL,
  `data` varchar(50) NOT NULL,`date` datetime NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

if($query_add_table_action){
    echo alert("Đã sửa lỗi thiếu bản hoặt động của nước ($lang)","alert");
}else{
    echo alert("Đã sửa lỗi thiếu bản hoặt động không thành công nước ($lang)","error");
}

echo mysql_error();
?>