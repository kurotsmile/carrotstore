<?php
include "app_my_girl_template.php";

$name_bk="";
$price_bk="";
$type_skin="";
$func="add";
$img_edit_icon="";
$img_edit_view="";
$img_edit_place="";
$id_edit="";


if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_skin` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $arr_data_effect=mysqli_fetch_array($edit_effect);
    $name_bk=$arr_data_effect[1];
    $type_skin=$arr_data_effect['type'];
    $price_bk=$arr_data_effect['price'];
    $filename = 'app_mygirl/obj_skin/icon_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_icon=$filename;
    }
    
    $filename = 'app_mygirl/obj_skin/skin_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_view=$filename;
    }
    
    $func="edit";
}

if(isset($_POST['func'])){
    if($_POST['func']=="add"){
        $name_bk=$_POST['name_bk'];
        $type_skin=$_POST['type_skin'];
        $price_bk=$_POST['price_bk'];
        $add_effect=mysqli_query($link,"INSERT INTO `app_my_girl_skin` (`name`,`price`,`type`) VALUES ('$name_bk','$price_bk','$type_skin');");
        $id_new=mysqli_insert_id($link);
        $target_dir = "app_mygirl/obj_skin/icon_".$id_new.".png";
        move_uploaded_file($_FILES["file_bk_icon"]["tmp_name"], $target_dir);
        $target_dir = "app_mygirl/obj_skin/skin_".$id_new.".png";
        move_uploaded_file($_FILES["file_bk_view"]["tmp_name"], $target_dir);
    }else{
        $name_bk=$_POST['name_bk'];
        $id_edit=$_POST['id_edit'];
        $type_skin=$_POST['type_skin'];
        $price_bk=$_POST['price_bk'];
        $update_effect=mysqli_query($link,"UPDATE `app_my_girl_skin` SET `name` = '$name_bk',`price`='$price_bk',`type`='$type_skin' WHERE `id` = '$id_edit';");
        
        echo mysqli_error($link);
        
        if(isset_file($_FILES["file_bk_icon"])){
            $filename = 'app_mygirl/obj_skin/icon_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_skin/icon_".$id_edit.".png";
            move_uploaded_file($_FILES["file_bk_icon"]["tmp_name"], $target_dir);
        }
        
        if(isset_file($_FILES["file_bk_view"])){
            $filename = 'app_mygirl/obj_skin/skin_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_skin/skin_".$id_edit.".png";
            move_uploaded_file($_FILES["file_bk_view"]["tmp_name"], $target_dir);
        }

    }
}

?>

<form id="form_loc"  method="post" enctype="multipart/form-data">
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Tên:</label> 
    <input type="text" id="name_bk" name="name_bk" value="<?php echo $name_bk;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
    <label>Biểu tượng:</label> 
    <input type="file" id="file_bk_icon" name="file_bk_icon" />
    <?php
    if($img_edit_icon!=""){
    ?>
        <img src="<?php echo $img_edit_icon;?>" style="width: 200px;" />
    <?php
    }
    ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
    <label>Trang phục:</label> 
    <input type="file" id="file_bk_view" name="file_bk_view" />
    <?php
    if($img_edit_view!=""){
    ?>
        <img src="<?php echo $img_edit_view;?>" style="width: 200px;" />
    <?php
    }
    ?>
    </div>

    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Giá:</label> 
    <select name="price_bk">
        <option value="0" <?php if($price_bk=='0'){ echo 'selected="true"';}?>>Miễn phí</option>
        <option value="1" <?php if($price_bk=='1'){ echo 'selected="true"';}?>>Tính phí</option>
    </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>type:</label> 
    <input type="text"  name="type_skin" value="<?php echo $type_skin;?>" />
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
    $delete_effect=mysqli_query($link,"DELETE FROM `app_my_girl_skin` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
    $filename = 'app_mygirl/obj_skin/icon_'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
    
    $filename = 'app_mygirl/obj_skin/skin_'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
    
}

?>

<table>
<tr>
    <th style="width: 18px;">Id</th>
    <th>Tên</th>
    <th>biểu tượng</th>
    <th>Skin</th>
    <th>Giá</th>
    <th>Loại</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
$list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_skin`");
while($row=mysqli_fetch_array($list_effect)){
?>
    <tr>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><img src="<?php echo thumb('/app_mygirl/obj_skin/icon_'.$row[0].'.png','50'); ?>" style="width: 50px;height: 50px;" /></td>
        <td><img src="<?php echo thumb('/app_mygirl/obj_skin/skin_'.$row[0].'.png','50'); ?>" style="width: 50px;height: 50px;" /></td>
        <td><?php if($row['price']=='0'){;?><i class="fa fa-money" aria-hidden="true"></i> Miễn phí<?php }else{?><i class="fa fa-shopping-cart" aria-hidden="true"></i> Tính phí<?php } ?></td>
        <td><?php echo $row['type'];?></td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_skin.php';?>?edit=<?php echo $row['id'];?>">Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_skin.php';?>?del=<?php echo $row['id'];?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>
</table>