<div style="float: left;padding: 10px;width: auto;">
<form action="" method="post">
    <h2>Quản lý các từ khóa ngôn ngữ</h2>
    <label>Từ khóa:</label>
    <input type="text" name="key_name" />
    <input type="submit" class="buttonPro green" value="Thêm mới" />
</form>

<?php
if(isset($_POST['key_name'])){
    $key_lang=$_POST['key_name'];
    $query_check=mysqli_query($link,"SELECT * FROM `key_lang` WHERE `key` = '$key_lang' LIMIT 1");
    if(mysqli_num_rows($query_check)>0){
        echo alert("Từ khóa này đã tồn tại","error");
    }else{
        $add_query=mysqli_query($link,"INSERT INTO `key_lang` (`key`) VALUES ('$key_lang');");
        if($add_query){
            echo alert("Thêm mới từ khóa thành công!","alert");
        }else{
            echo alert("Thêm mới từ khóa không thành công!","error");
        }
    }
}

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `key_lang` WHERE `key` = '$id_delete' LIMIT 1");
    if($query_delete){
        echo alert("Xóa thành công từ khóa '".$id_delete.'"',"alert");
    }else{
        echo alert("Xóa không thành công từ khóa '".$id_delete.'"',"error");
    }
}
?>

<table style="width: auto;border: solid 2px #D2D2D2;">
<tr>
    <th>Từ khóa</th>
    <th>Thao tác</th>
</tr>

<?php
$query_list=mysqli_query($link,"SELECT * FROM `key_lang`");
while($row_key=mysqli_fetch_array($query_list)){
?>
    <tr>
        <td><i class="fa fa-flag"></i> <?php echo $row_key['key'];?></td>
        <td><a href="<?php echo $url;?>?view=key_lang&delete=<?php echo $row_key['key'];?>" class="buttonPro red small"><i class="fa fa-trash"></i> Xóa</a></td>
    </tr>
<?php
}
?>
</table>
</div>