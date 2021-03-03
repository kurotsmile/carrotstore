<?php
$func_page=$_REQUEST['funcs'];

if($func_page=='del_all_key'){
    $query_delete_all=mysqli_query($link,"DELETE FROM `log_key`");
    if($query_delete_all){
        echo alert('Xóa toàn bộ từ khóa thành công!!!');
    }else{
        echo alert('Xóa nhật ký thất bại','error');
    }
}
?>