<?php
$lang='vi';
if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['delete'])){
    $key_delete=$_GET['delete'];
    $query_list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country`");
    while($row_l=mysqli_fetch_assoc($query_list_country)){
        $key_country=$row_l['key'];
        $query_delete=mysqli_query($link,"DELETE FROM `lang_$key_country` WHERE `key` = '$key_delete' LIMIT 1;");
        if($query_delete){
            if(mysqli_error($query_delete)==''){
                echo alert("Xóa thành công từ khóa <b>$key_delete</b> !");
            }else{
                echo alert("Xóa không thành công từ khóa <b>$key_delete</b> !",'error');
            }
        }
    }
}
?>
<table>
<?php
$query_list_key=mysqli_query($link,"SELECT `key`,`value` FROM `lang_$lang`");
while($row_key=mysqli_fetch_assoc($query_list_key)){
    echo '<tr>';
    echo '<td>'.$row_key['key'].'</td>';
    echo '<td>'.$row_key['value'].'</td>';
    echo '<td><a class="buttonPro small yellow" href="'.$url.'/admin/?page_view=page_lang&sub_view=lang_add&edit='.$row_key['key'].'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa giá trị</a></td>';
    echo '<td><a class="buttonPro small red" href="'.$url.'/admin/?page_view=page_lang&sub_view=lang_key&delete='.$row_key['key'].'" onclick="return confirm(\'Có chắc chắn là muốn xóa?\');"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></td>';
    echo '</tr>';
}
?>
</table>