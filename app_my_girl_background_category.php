<?php
include "app_my_girl_template.php";

$name_category_bk="";
$func="add";
$app_category_bk="0";
$id_edit="";


if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_category=mysql_query("SELECT * FROM `app_my_girl_bk_category` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $arr_data_category=mysql_fetch_array($edit_category);
    $name_category_bk=$arr_data_category[1];
    $func="edit";
    mysql_free_result($edit_category);
}

if(isset($_POST['func'])){
    $name_category_bk=$_POST['name_category_bk'];
    $app_category_bk=$_POST['app_category_bk'];
        
    if($_POST['func']=="add"){

        $add_effect=mysql_query("INSERT INTO `app_my_girl_bk_category` (`name`,`app`) VALUES ('$name_category_bk','$app_category_bk');");
        echo mysql_error();
        mysql_free_result($add_effect);
    }else{
        $id_edit=$_POST['id_edit'];
        $update_effect=mysql_query("UPDATE `app_my_girl_bk_category` SET `name` = '$name_category_bk',`app`='$app_category_bk' WHERE `id` = '$id_edit';");
        mysql_free_result($update_effect);
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
    $delete_effect=mysql_query("DELETE FROM `app_my_girl_bk_category` WHERE ((`id` = '$id_del'));");

}


    $list_category_bk=mysql_query("SELECT * FROM `app_my_girl_bk_category` ORDER BY `id`"); 
?>
<table>
<tr>
    <th style="width: 18px;">id</th>
    <th style="width: 100px;">Tên chuyên mục</th>
    <th style="width: 100px;">Ứng dụng</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
while($row=mysql_fetch_array($list_category_bk)){
?>
    <tr>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><?php echo $row[2];?></td>
        <td>
            <a class="buttonPro small yellow" target="_blank" href="<?php echo $url.'/app_my_girl_background.php';?>?cat=<?php echo $row['id'];?>">Xem</a>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_background_category.php';?>?edit=<?php echo $row['id'];?>">Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_background_category.php';?>?del=<?php echo $row['id'];?>">Xóa</a>
        </td>
    </tr>
<?php
}
mysql_free_result($list_category_bk);
?>
</table>