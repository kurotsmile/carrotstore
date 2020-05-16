<?php
$key='';
$ver='0';
$edit='';

if(isset($_GET['delete'])){
    $delete_key=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM carrotsy_music.`game_key_lang` WHERE `key` = '$delete_key' LIMIT 1;");
    if($query_delete===true){
        echo "Xóa thành công dữ liệu hiển thị giao diện (".$delete_key.")";
    }else{
        echo "Xóa thất bại dữ liệu hiển thị giao diện (".$delete_key.")";
    }
}


if(isset($_GET['edit'])){
    $edit=$_GET['edit'];
    $key=$edit;
}

if(isset($_POST['key'])){
    $key=$_POST['key'];
    if(isset($_POST['edit'])){
        $edit=$_POST['edit'];
        $update_data_dislay=mysqli_query($link,"UPDATE carrotsy_music.`game_key_lang` SET `key` = '$key' WHERE `key` = '$edit'  LIMIT 1;");
        if($update_data_dislay===true){
            echo "Cập nhật dữ liệu hiển thị giao diện '".$key."' thành công!";
        }else{
            echo "Cập nhật dữ liệu hiển thị giao diện thất bại (".mysqli_error($link).")";
        }
    }else{
        if(mysqli_num_rows(mysqli_query($link,"SELECT * FROM carrotsy_music.`game_key_lang` WHERE `key` = '$key'  LIMIT 1"))){
            echo '<b>Lỗi:</b> Từ khóa dữ liệu hiển "'.$key.'" thị đã có với phiên bản "'.$ver.'" này!';
        }else{
            $add_data_dislay=mysqli_query($link,"INSERT INTO carrotsy_music.`game_key_lang` (`key`) VALUES ('$key');");
            if($add_data_dislay===true){
                echo "Tạo dữ liệu hiển thị giao diện '".$key."' thành công!";
                $key='';
            }else{
                echo "Tạo dữ liệu hiển thị giao diện thất bại (".mysqli_error($link).")";
            }
        }
    }
}

?>

<form id="form_loc"  method="post" enctype="multipart/form-data" name="add_game_key_lang">
    <div style="display: inline-block;float: left;margin: 2px;">
        <strong>Thêm dữ liệu hiể thị dưới trò chơi </strong>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Từ khóa dữ liệu</label>
        <input type="key" name="key" value="<?php echo $key; ?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <?php if($edit==''){?>
            <button class="buttonPro green"><i class="fa fa-plus"></i> Thêm mới</button>
        <?php }else{?>
            <button class="buttonPro yellow">Cập nhật</button>
            <input type="hidden" name="edit" value="<?php echo $edit; ?>" />
            <a class="buttonPro blue" href="<?php echo $url;?>/index.php?view=game_lang_key">Hủy</a>
        <?php }?>
    </div>
</form>

<table>
<tr>
    <th style="width: 18px;">key</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
$query_list_display_lang_data=mysqli_query($link,"SELECT * FROM carrotsy_music.`game_key_lang`");
while($row=mysqli_fetch_array($query_list_display_lang_data)){
?>
    <tr>
        <td><i class="fa fa-tag" aria-hidden="true"></i> <?php echo $row['key'];?></td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url;?>/index.php?view=game_lang_key&edit=<?php echo $row['key'];?>"><i class="fa fa-edit"></i> Sửa giá trị</a>
            <a class="buttonPro small red" onclick="return confirm('Có chắc chắn là muốn xóa?');" href="<?php echo $url;?>/index.php?view=game_lang_key&delete=<?php echo $row['key'];?>"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
<?php
}
mysqli_free_result($query_list_display_lang_data);
?>
</table>