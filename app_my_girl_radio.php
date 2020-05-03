<?php
include "app_my_girl_template.php";
$langsel='vi';
$name_radio="";
$stream_radio="";
$lang_radio="vi";
$func="add";
$img_edit_icon="";
$id_edit="";

if(isset($_GET['lang'])){
    $lang_radio=$_GET['lang'];
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $arr_data_effect=mysqli_fetch_array($edit_effect);
    $name_radio=$arr_data_effect['name_radio'];
    $stream_radio=$arr_data_effect['stream'];
    $lang_radio=$arr_data_effect['lang'];
    $filename = 'app_mygirl/obj_radio/icon_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_icon=$filename;
    }
    $func="edit";
}

if(isset($_POST['func'])){
    $name_radio=$_POST['name_radio'];
    $stream_radio=$_POST['stream_radio'];
    $lang_radio=$_POST['lang_radio'];
        
    if($_POST['func']=="add"){
        $add_effect=mysqli_query($link,"INSERT INTO `app_my_girl_radio` (`name_radio`,`stream`,`lang`) VALUES ('$name_radio','$stream_radio','$lang_radio');");
        $id_new=mysqli_insert_id($link);
        $target_dir = "app_mygirl/obj_radio/icon_".$id_new.".png";
        move_uploaded_file($_FILES["file_radio_icon"]["tmp_name"], $target_dir);
        echo '<a href="http://work.carrotstore.com/?id_object='.$id_new.'&lang='.$lang_radio.'&type_chat=radio&type_action=add" target="_blank" class="buttonPro light_blue"><i class="fa fa-desktop" aria-hidden="true"></i> Thêm vào bàn làm việc (Editor)</a>';
    }else{
        $id_edit=$_POST['id_edit'];
        $update_effect=mysqli_query($link,"UPDATE `app_my_girl_radio` SET `name_radio` = '$name_radio',`stream`='$stream_radio',`lang`='$lang_radio' WHERE `id` = '$id_edit';");
        
        if(isset_file($_FILES["file_radio_icon"])){
            $filename = 'app_mygirl/obj_radio/icon_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_radio/icon_".$id_edit.".png";
            move_uploaded_file($_FILES["file_radio_icon"]["tmp_name"], $target_dir);
        }
    }
}

?>

<form id="form_loc"  method="post" enctype="multipart/form-data">
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Tên:</label> 
    <input type="text" id="name_radio" name="name_radio" value="<?php echo $name_radio;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
    <label>Biểu tượng:</label> 
    <input type="file" id="file_radio_icon" name="file_radio_icon" />
    <?php
    if($img_edit_icon!=""){
    ?>
        <img src="<?php echo $img_edit_icon;?>" style="width: 200px;" />
    <?php
    }
    ?>
    </div>

    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Đường dẫn trực tuyến:</label> 
        <input type="text" id="stream_radio" name="stream_radio" value="<?php echo $stream_radio;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
        <label>Lang</label>
        <select name="lang_radio">
            <?php for($i=0;$i<count($lang_app->menu_lang);$i++){?>
                <option value="<?php echo $lang_app->menu_lang[$i]->key;?>" <?php if($lang_radio==$lang_app->menu_lang[$i]->key){?> selected="true"<?php }?>><?php echo $lang_app->menu_lang[$i]->name;?></option>
            <?php }?>
        </select>
    </div>


    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Ngôn ngữ:</label>
        <select name="lang">
            <?php
            $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
            while($row_lang=mysqli_fetch_array($query_list_lang)){?>
                <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
            <?php }?>
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
    $delete_effect=mysqli_query($link,"DELETE FROM `app_my_girl_radio` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
    $filename = 'app_mygirl/obj_radio/icon_'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
}


    $result_tip_count=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` where `lang`='$lang_radio' ORDER BY `id` DESC");  

    $total_records=mysqli_num_rows($result_tip_count);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 80;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    if($lang_radio!=''){
        $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` where `lang`='$lang_radio' ORDER BY `id`  DESC LIMIT $start, $limit ");
    }else{
        $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_radio` ORDER BY `id`  DESC LIMIT $start, $limit ");
    }
?>
    <div id="form_loc">
    <strong>Trang hiển thị:</strong>
        <?php
            for($i=1;$i<=$total_page;$i++){
                if($i==$current_page){
                    echo '<a href="'.$url.'/app_my_girl_radio.php?page='.$i.'" class="buttonPro small">'.$i.'</a>';
                }else{
                    echo '<a href="'.$url.'/app_my_girl_radio.php?page='.$i.'" class="buttonPro small blue">'.$i.'</a>';
                }
            }
        ?>
         / <?php echo $limit;?> Đài phát thanh
    </div>
<table>
<tr>
    <th style="width: 18px;">Id</th>
    <th>Tên</th>
    <th>biểu tượng</th>
    <th>Bộ đệm trực tuyến</th>
    <th>Ngôn ngữ</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
while($row=mysqli_fetch_array($list_effect)){
?>
    <tr>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><img src="<?php echo thumb('/app_mygirl/obj_radio/icon_'.$row[0].'.png',50);?>" style="width: 50px;height: 50px;" /></td>
        <td><?php echo $row['stream'];?></td>
        <td><?php echo $row['lang'];?></td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_radio.php';?>?edit=<?php echo $row['id'];?>">Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_radio.php';?>?del=<?php echo $row['id'];?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>
</table>