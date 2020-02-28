<?php
include "app_my_girl_template.php";

$name_view="";
$price_bk="";
$func="add";
$img_edit_icon="";
$id_edit="";
$url_android="";
$url_ios="";
$is_free="";


if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_effect=mysql_query("SELECT * FROM `app_my_girl_view_3d` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $arr_data=mysql_fetch_array($edit_effect);
    $name_view=$arr_data[1];
    $url_android=$arr_data[2];
    $url_ios=$arr_data[3];
    if($arr_data[4]!=""){
        $is_free="on";
    }
    $filename = 'app_mygirl/obj_view_3d/icon_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_icon=$filename;
    }
    mysql_free_result($edit_effect);
    $func="edit";
}

if(isset($_POST['func'])){
    if($_POST['func']=="add"){
        $name_view=$_POST['name_view'];
        $url_android=$_POST['url_android'];
        $url_ios=$_POST['url_ios'];
        if(isset($_POST['is_free'])){
            $is_free="on";
        }
        $add_view_3d=mysql_query("INSERT INTO `app_my_girl_view_3d` (`name`,`android`,`ios`,`is_free`) VALUES ('$name_view','$url_android','$url_ios','$is_free');");
        $id_new=mysql_insert_id();
        $target_dir = "app_mygirl/obj_view_3d/icon_".$id_new.".png";
        move_uploaded_file($_FILES["file_icon"]["tmp_name"], $target_dir);
        mysql_free_result($add_view_3d);
    }else{
        $name_view=$_POST['name_view'];
        $id_edit=$_POST['id_edit'];
        $url_android=$_POST['url_android'];
        $url_ios=$_POST['url_ios'];
        if(isset($_POST['is_free'])){
            $is_free="on";
        }
        $update_view_3d=mysql_query("UPDATE `app_my_girl_view_3d` SET `name` = '$name_view',`android`='$url_android',`ios`='$url_ios',`is_free`='$is_free' WHERE `id` = '$id_edit';");
        
        if(isset_file($_FILES["file_icon"])){
            $filename = 'app_mygirl/obj_view_3d/icon_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_view_3d/icon_".$id_edit.".png";
            move_uploaded_file($_FILES["file_icon"]["tmp_name"], $target_dir);
        }
        
        mysql_free_result($update_view_3d);
    }
}

?>

<form id="form_loc"  method="post" enctype="multipart/form-data">
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Tên:</label> 
    <input type="text" id="name_view" name="name_view" value="<?php echo $name_view;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
    <label>Biểu tượng:</label> 
    <input type="file" id="file_icon" name="file_icon" />
    <?php
    if($img_edit_icon!=""){
    ?>
        <img src="<?php echo $img_edit_icon;?>" style="width: 200px;" />
    <?php
    }
    ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
    <label>Đường dẫn gói Android:</label> 
    <input type="text" id="url_android" name="url_android" value="<?php echo $url_android;?>" />
    </div>

    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Đường dẫn gói Ios:</label> 
    <input type="text" id="url_ios" name="url_ios" value="<?php echo $url_ios;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>No Free</label> 
    <input type="checkbox" id="is_free" name="is_free" <?php if($is_free!=""){?> checked="on"<?php }?>/>
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
    $delete_effect=mysql_query("DELETE FROM `app_my_girl_view_3d` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
    $filename = 'app_mygirl/obj_view_3d/icon_'.$id_del.'.png';
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
    <th>Gói Android</th>
    <th>Gói Ios</th>
    <th>Tính phí</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
$list_effect=mysql_query("SELECT * FROM `app_my_girl_view_3d`");
while($row=mysql_fetch_array($list_effect)){
?>
    <tr>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><img src="<?php echo thumb('/app_mygirl/obj_view_3d/icon_'.$row[0].'.png','50'); ?>" style="width: 50px;height: 50px;" /></td>
        <td><?php echo $row['android'];?></td>
        <td><?php echo $row['ios'];?></td>
        <td><?php echo $row['is_free'];?></td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_view_3d.php';?>?edit=<?php echo $row['id'];?>">Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_view_3d.php';?>?del=<?php echo $row['id'];?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>
</table>