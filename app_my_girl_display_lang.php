<?php
include "app_my_girl_template.php";
$key='';
$ver='0';
$edit='';
$edit_ver='';

if(isset($_GET['ver'])){
    $ver=$_GET['ver'];
}

if(isset($_GET['delete'])){
    $delete_key=$_GET['delete'];
    $delete_ver=$_GET['ver'];
    $query_delete=mysql_query("DELETE FROM `app_my_girl_display_lang_data` WHERE `key` = '$delete_key' AND `version` = '$delete_ver' LIMIT 1;");
    if($query_delete===true){
        echo "Xóa thành công dữ liệu hiển thị giao diện (".$delete_key.")";
    }else{
        echo "Xóa thất bại dữ liệu hiển thị giao diện (".$delete_key.")";
    }
}


if(isset($_GET['edit'])){
    $edit=$_GET['edit'];
    $key=$edit;
    $edit_ver=$_GET['ver'];
    $ver=$edit_ver;
}

if(isset($_POST['key'])){
    $key=$_POST['key'];
    $ver=$_POST['version'];
    
    if(isset($_POST['edit'])){
        $edit=$_POST['edit'];
        $edit_ver=$_POST['edit_ver'];
        $update_data_dislay=mysql_query("UPDATE `app_my_girl_display_lang_data` SET `key` = '$key',`version` = '$ver' WHERE `key` = '$edit'  AND `version` = '$edit_ver' LIMIT 1;");
        if($update_data_dislay===true){
            echo "Cập nhật dữ liệu hiển thị giao diện '".$key."' thành công!";
        }else{
            echo "Cập nhật dữ liệu hiển thị giao diện thất bại (".mysql_error().")";
        }
    }else{
        if(mysql_num_rows(mysql_query("SELECT * FROM `app_my_girl_display_lang_data` WHERE `key` = '$key' AND `version` = '$ver' LIMIT 1"))){
            echo '<b>Lỗi:</b> Từ khóa dữ liệu hiển "'.$key.'" thị đã có với phiên bản "'.$ver.'" này!';
        }else{
            $add_data_dislay=mysql_query("INSERT INTO `app_my_girl_display_lang_data` (`key`, `version`) VALUES ('$key', '$ver');");
            if($add_data_dislay===true){
                echo "Tạo dữ liệu hiển thị giao diện '".$key."' thành công!";
                $key='';
            }else{
                echo "Tạo dữ liệu hiển thị giao diện thất bại (".mysql_error().")";
            }
        }
    }
}

?>

<form id="form_loc"  method="post" enctype="multipart/form-data" name="delete_key_lang">
    <div style="display: inline-block;float: left;margin: 2px;">
        <strong>Thêm dữ liệu hiể thị dưới ứng dụng</strong>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Từ khóa dữ liệu</label>
        <input type="key" name="key" value="<?php echo $key; ?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Phiên bản ứng dụng</label>
        <select name="version">
            <option value="0" <?php if($ver=='0'){?>selected="true"<?php }?>>Phiên bản 2d</option>
            <option value="1" <?php if($ver=='1'){?>selected="true"<?php }?>>Phiên bản 3d - Onichan</option>
            <option value="2" <?php if($ver=='2'){?>selected="true"<?php }?>>Phiên bản 3d - Pro</option>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <?php if($edit==''){?>
            <button class="buttonPro green">Thêm mới</button>
        <?php }else{?>
            <button class="buttonPro yellow">Cập nhật</button>
            <input type="hidden" name="edit" value="<?php echo $edit; ?>" />
            <input type="hidden" name="edit_ver" value="<?php echo $edit_ver; ?>" />
            <a class="buttonPro blue" href="<?php echo $url.'/app_my_girl_display_lang.php';?>">Hủy</a>
        <?php }?>
    </div>
</form>

<?php
if($edit==''){
?>
<form id="form_loc"  method="get" >
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Hiển thị theo phiên bản ứng dụng</label>
        <select name="ver">
            <option value="0" <?php if($ver=='0'){?>selected="true"<?php }?>>Phiên bản 2d</option>
            <option value="1" <?php if($ver=='1'){?>selected="true"<?php }?>>Phiên bản 3d - Onichan</option>
            <option value="2" <?php if($ver=='2'){?>selected="true"<?php }?>>Phiên bản 3d - Pro</option>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
            <button class="buttonPro blue">Lọc</button>
    </div>
</form>
<?php
}
?>

<table>
<tr>
    <th style="width: 18px;">key</th>
    <th style="width: 100px;">phiên bản</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
$query_list_display_lang_data=mysql_query("SELECT * FROM `app_my_girl_display_lang_data` WHERE `version`='".$ver."'");
while($row=mysql_fetch_array($query_list_display_lang_data)){
?>
    <tr>
        <td><i class="fa fa-tag" aria-hidden="true"></i> <?php echo $row['key'];?></td>
        <td><?php echo $row['version'];?></td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_display_lang.php';?>?edit=<?php echo $row['key'];?>&ver=<?php echo $row['version'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa giá trị</a>
            <a class="buttonPro small red" onclick="return confirm('Có chắc chắn là muốn xóa?');" href="<?php echo $url.'/app_my_girl_display_lang.php';?>?delete=<?php echo $row['key'];?>&ver=<?php echo $row['version'];?>"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
<?php
}
mysql_free_result($query_list_display_lang_data);
?>
</table>