<?php
$name_key='';
$id_edit='';

$url_cur=$url.'?view=page_key_lang';
if(isset($_GET['edit_id'])){
    $name_key=$_GET['name_key'];
    $id_edit=$_GET['edit_id'];
}

if(isset($_POST['name_key'])){
    $name_key=$_POST['name_key'];
}
?>
<form class="box_form" action="" method="post">
    <div class="row">
    <?php
    if($id_edit==''){
    ?>
        <strong><i class="fa fa-key" aria-hidden="true"></i> Thêm trường ngôn ngữ</strong>
    <?php
    }else{
    ?>
        <strong><i class="fa fa-key" aria-hidden="true"></i> Cập nhật trường ngôn ngữ</strong>
    <?php   
    }
    
    if(isset($_POST['name_key'])){
        $name_key=$_POST['name_key'];
        if(isset($_POST['edit_id'])){
            $id_edit=$_POST['edit_id'];
        }
        
        if($name_key==''){
            echo 'Trường ngôn ngữ không được để trống!';
        }else{
            if($id_edit==''){
                $query_add=mysql_query("INSERT INTO `key_lang` (`key`) VALUES ('$name_key');");
                if($query_add){
                    $name_key='';
                    echo "Thêm sách thành công!";
                }elsE{
                    echo "Thêm sách thất bại";
                }
            }else{
                $query_add=mysql_query("UPDATE `key_lang` SET `key` = '$name_key' WHERE `key` = '$id_edit';");
                if($query_add){
                    echo "Cập nhật sách thành công!";
                }elsE{
                    echo "Cập nhật sách thất bại";
                }
            }
        }
        echo mysql_error();
    }
    ?>
    </div>
    
    <div class="row">
    <label>Tên trường</label>
    <input type="text" name="name_key" value="<?php echo $name_key;?>" />
    </div>
    

    <div class="row">
        <?php
            if($id_edit!=''){
        ?>
        <input class="buttonPro small yellow" type="submit" value="Cập nhật" />
        <input type="hidden" name="edit_id" value="<?php echo $id_edit;?>" />
        <a href="<?php echo $url_cur; ?>" class="buttonPro small blue"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Thêm trường khác</a>
        <?php }else{?>
        <input class="buttonPro small green" type="submit" value="Thêm mới" />
        <?php }?>
    </div>
</form>

<?php
if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysql_query("DELETE FROM `key_lang` WHERE ((`key` = '$id_delete'));");
    echo "Xóa thành công trường ngôn ngữ (".$id_delete.")";
}
?>

<table>
<tr>
    <th>ID</th>
    <th>Name key</th>
    <th>Thao tác</th>
</tr>
<?php
$query_list_key=mysql_query("SELECT * FROM `key_lang`");
while($row_key=mysql_fetch_array($query_list_key)){
?>
<tr>
    <td><?php echo $row_key['id']; ?></td>
    <td><?php echo $row_key['key']; ?></td>
    <td>
        <a href="<?php echo $url_cur; ?>&edit_id=<?php echo $row_key['key']; ?>&name_key=<?php echo $row_key['key']; ?>" class="buttonPro small yellow"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
        <a href="<?php echo $url_cur; ?>&delete=<?php echo $row_key['key']; ?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
    </td>
</tr>
<?php 
}
?>
</table>