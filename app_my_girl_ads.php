<?php
include "app_my_girl_template.php";

$name_bk="";
$android="";
$ios="";
$window="";
$samsung="";
$func="add";
$img_edit_icon="";
$id_edit="";


if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_effect=mysql_query("SELECT * FROM `app_my_girl_ads` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $arr_data_effect=mysql_fetch_array($edit_effect);
    $name_bk=$arr_data_effect[1];
    $ios=$arr_data_effect['ios'];
    $android=$arr_data_effect['android'];
    $window=$arr_data_effect['window'];
    $samsung=$arr_data_effect['samsung'];
    $filename = 'app_mygirl/obj_ads/icon_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_icon=$filename;
    }
    $func="edit";
}

if(isset($_POST['func'])){
    $name_bk=$_POST['name_bk'];
    $ios=$_POST['ios'];
    $android=$_POST['android'];
    $window=$_POST['window'];
    $samsung=$_POST['samsung'];
    if($_POST['func']=="add"){
        $add_effect=mysql_query("INSERT INTO `app_my_girl_ads` (`name`,`android`,`ios`,`window`,`samsung`) VALUES ('$name_bk','$android','$ios','$window','$samsung');");
        $id_new=mysql_insert_id();
        $target_dir = "app_mygirl/obj_ads/icon_".$id_new.".png";
        move_uploaded_file($_FILES["file_bk_icon"]["tmp_name"], $target_dir);
    }else{
        $id_edit=$_POST['id_edit'];
        $update_effect=mysql_query("UPDATE `app_my_girl_ads` SET `name` = '$name_bk',`android`='$android',`ios`='$ios',`window`='$window',`samsung`='$samsung' WHERE `id` = '$id_edit';");
        if(isset_file($_FILES["file_bk_icon"])){
            $filename = 'app_mygirl/obj_ads/icon_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_ads/icon_".$id_edit.".png";
            move_uploaded_file($_FILES["file_bk_icon"]["tmp_name"], $target_dir);
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
    <input class="buttonPro small blue" type="file" id="file_bk_icon" name="file_bk_icon" />
    <?php
    if($img_edit_icon!=""){
    ?>
        <img src="<?php echo $img_edit_icon;?>" style="width: 200px;" />
    <?php
    }
    ?>
    </div>
    
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Android:</label> 
    <input type="text" id="android" name="android" value="<?php echo $android;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Ios:</label> 
    <input type="text" id="ios" name="ios" value="<?php echo $ios;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Window:</label> 
    <input type="text" id="window" name="window" value="<?php echo $window;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Samsung:</label> 
    <input type="text" id="samsung" name="samsung" value="<?php echo $samsung;?>" />
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
    $delete_effect=mysql_query("DELETE FROM `app_my_girl_ads` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
    $filename = 'app_mygirl/obj_ads/icon_'.$id_del.'.png';
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
    <th>android</th>
    <th>ios</th>
    <th>window</th>
    <th>Samsung</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
$list_effect=mysql_query("SELECT * FROM `app_my_girl_ads`");
while($row=mysql_fetch_array($list_effect)){
?>
    <tr>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><img src="<?php echo thumb('/app_mygirl/obj_ads/icon_'.$row[0].'.png','50') ?>" style="width: 50px;height: 50px;" /></td>
        <td><a target="_blank" href="<?php echo $row['android'];?>"><?php echo $row['android'];?></a></td>
        <td><a target="_blank" href="<?php echo $row['ios'];?>"><?php echo $row['ios'];?></a></td>
        <td><a target="_blank" href="<?php echo $row['window'];?>"><?php echo $row['window'];?></a></td>
        <td><a target="_blank" href="<?php echo $row['samsung'];?>"><?php echo $row['samsung'];?></a></td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_ads.php';?>?edit=<?php echo $row['id'];?>">Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_ads.php';?>?del=<?php echo $row['id'];?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>
</table>