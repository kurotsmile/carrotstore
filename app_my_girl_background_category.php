<?php
include "app_my_girl_template.php";

$name_category_bk="";
$func="add";
$app_category_bk="0";
$id_edit="";
$not_os='';

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_category=mysqli_query($link,"SELECT * FROM `app_my_girl_bk_category` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $data_category_bk=mysqli_fetch_assoc($edit_category);
    $name_category_bk=$data_category_bk['name'];
    $not_os=$data_category_bk['no_os'];
    $func="edit";
}

if(isset($_POST['func'])){
    $name_category_bk=$_POST['name_category_bk'];
    $app_category_bk=$_POST['app_category_bk'];
    $not_os=$_POST['not_os'];
    if($_POST['func']=="add"){
        $add_effect=mysqli_query($link,"INSERT INTO `app_my_girl_bk_category` (`name`,`app`) VALUES ('$name_category_bk','$app_category_bk');");
        echo mysql_error($link);
    }else{
        $id_edit=$_POST['id_edit'];
        $update_effect=mysqli_query($link,"UPDATE `app_my_girl_bk_category` SET `name` = '$name_category_bk',`app`='$app_category_bk',`no_os`='$not_os' WHERE `id` = '$id_edit';");
    }
}

?>

<form id="form_loc"  method="post" enctype="multipart/form-data">
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Tên chuyên mục:</label> 
    <input type="text" id="name_category_bk" name="name_category_bk" value="<?php echo $name_category_bk;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Ứng dụng:</label> 
    <select name="app_category_bk">
        <option value="0" <?php if($app_category_bk=='0'){?> selected="true" <?php } ?>>Virtual Lover</option>
        <option value="1" <?php if($app_category_bk=='1'){?> selected="true" <?php } ?>>Jigsaw wall</option>
    </select>
    </div>

    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Hiển thị:</label> 
    <select name="not_os">
        <option value="0" <?php if($not_os==''){?> selected="true" <?php } ?>>Hiện tất cả</option>
        <option value="android" <?php if($not_os=='1'){?> selected="true" <?php } ?>>Ngoại trừ android (chplay)</option>
        <option value="ios" <?php if($not_os=='1'){?> selected="true" <?php } ?>>Ngoại trừ Ios</option>
        <option value="samsung" <?php if($not_os=='1'){?> selected="true" <?php } ?>>Ngoại trừ samsung</option>
        <option value="window" <?php if($not_os=='1'){?> selected="true" <?php } ?>>Ngoại trừ window</option>
    </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <?php if($func=="add"){?>
            <button class="buttonPro blue">Thêm mới</button>
        <?php }else{?>
            <button class="buttonPro blue">Cập nhật</button>
        <?php }?>
        <input type="hidden" name="func" value="<?php echo $func;?>" />
        <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
    </div>
</form>

<?php
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $delete_effect=mysqli_query($link,"DELETE FROM `app_my_girl_bk_category` WHERE ((`id` = '$id_del'));");

}

$list_category_bk=mysqli_query($link,"SELECT * FROM `app_my_girl_bk_category` ORDER BY `id`"); 
?>
<table>
<tr>
    <th style="width: 18px;">id</th>
    <th style="width: 100px;">Tên chuyên mục</th>
    <th style="width: 100px;">Ứng dụng</th>
    <th style="width: 100px;">Hiển thị</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
while($row=mysqli_fetch_assoc($list_category_bk)){
?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['app'];?></td>
        <td><?php echo $row['no_os'];?></td>
        <td>
            <a class="buttonPro small yellow" target="_blank" href="<?php echo $url.'/app_my_girl_background.php';?>?cat=<?php echo $row['id'];?>">Xem</a>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_background_category.php';?>?edit=<?php echo $row['id'];?>">Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_background_category.php';?>?del=<?php echo $row['id'];?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>
</table>