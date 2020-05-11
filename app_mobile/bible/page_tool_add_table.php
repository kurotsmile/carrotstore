<?php
$key_country=$_GET['lang'];
$query_create_table=mysql_query("
CREATE TABLE `paragraph_$key_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `contain` text NOT NULL,
  `orders` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
");
echo mysql_error();
if($query_create_table){
    echo alert('Tạo bản dữ liệu cho nước ('.$key_country.') Thành công!','alert');
}else{
    echo alert('Tạo bản dữ liệu cho nước ('.$key_country.') Không thành công!','error');
}
?>