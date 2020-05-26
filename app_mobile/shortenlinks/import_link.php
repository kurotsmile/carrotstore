<?php
include "config.php";
include "database.php";

$query_link=mysqli_query($link,"SELECT * FROM `link`");
while($row_link=mysqli_fetch_assoc($query_link)){
    $id=$row_link['id'];
    $lang=$row_link['lang'];
    $link_web=$row_link['link'];
    $id_user=$row_link['id_user'];
    $password=$row_link['password'];
    $status=$row_link['status'];
    $view=$row_link['view'];
    $date=$row_link['date'];
    $query_add_link=mysqli_query($link,"INSERT INTO `link_$lang` (`id`, `link`, `id_user`, `password`, `status`, `view`, `date`) VALUES ('$id', '$link_web', '$id_user', '$password', '$status', '$view', '$date');");
    if($query_add_link){
        echo "sao chép liên kết thất bại ($id) thành công!!! <br/>";
    }else{
        echo "sao chép liên kết thất bại ($id) lỗi ".mysqli_error($link)." <br/>";
    }
}
