<?php
include "app_my_girl_template.php";

$name_bk="";
$price_bk="";
$id_store_bk="";
$version="";
$func="add";
$img_edit_icon="";
$img_edit_view="";
$img_edit_place="";
$id_edit="";
$id_category="";

if(isset($_GET['cat'])){
    $id_category=$_GET['cat'];
}


if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_background` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $arr_data_effect=mysqli_fetch_array($edit_effect);
    $name_bk=$arr_data_effect[1];
    $id_store_bk=$arr_data_effect['id_store'];
    $price_bk=$arr_data_effect['price'];
    $version=$arr_data_effect['version'];
    $id_category=$arr_data_effect['category'];
    $filename = 'app_mygirl/obj_background/icon_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_icon=$filename;
    }
    
    $filename = 'app_mygirl/obj_background/view_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_view=$filename;
    }
    
    $filename = 'app_mygirl/obj_background/place_'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit_place=$filename;
    }
    $func="edit";
}

if(isset($_POST['func'])){
    $name_bk=$_POST['name_bk'];
    $id_store_bk=$_POST['id_store_bk'];
    $price_bk=$_POST['price_bk'];
    $version=$_POST['ver'];
    $id_category=$_POST['category'];
        
    if($_POST['func']=="add"){

        $add_effect=mysqli_query($link,"INSERT INTO `app_my_girl_background` (`name`,`price`,`id_store`,`version`,`category`) VALUES ('$name_bk','$price_bk','$id_store_bk','$version','$id_category');");
        $id_new=mysql_insert_id();
        $target_dir = "app_mygirl/obj_background/icon_".$id_new.".png";
        move_uploaded_file($_FILES["file_bk_icon"]["tmp_name"], $target_dir);
        $target_dir = "app_mygirl/obj_background/view_".$id_new.".png";
        move_uploaded_file($_FILES["file_bk_view"]["tmp_name"], $target_dir);
        $target_dir = "app_mygirl/obj_background/place_".$id_new.".png";
        move_uploaded_file($_FILES["file_bk_place"]["tmp_name"], $target_dir);
        
        echo '<a class="buttonPro blue" target="_blank" href="http://work.carrotstore.com/?id_object='.$id_new.'&lang=vi&type_chat=bk&type_action=add">Thêm vào bàn làm việc</a>';
    }else{
        $id_edit=$_POST['id_edit'];
        $update_effect=mysqli_query($link,"UPDATE `app_my_girl_background` SET `name` = '$name_bk',`price`='$price_bk',`id_store`='$id_store_bk',`version`='$version',`category`='$id_category' WHERE `id` = '$id_edit';");
        
        if(isset_file($_FILES["file_bk_icon"])){
            $filename = 'app_mygirl/obj_background/icon_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_background/icon_".$id_edit.".png";
            move_uploaded_file($_FILES["file_bk_icon"]["tmp_name"], $target_dir);
        }
        
        if(isset_file($_FILES["file_bk_view"])){
            $filename = 'app_mygirl/obj_background/view_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_background/view_".$id_edit.".png";
            move_uploaded_file($_FILES["file_bk_view"]["tmp_name"], $target_dir);
        }
        
        if(isset_file($_FILES["file_bk_place"])){
            $filename = 'app_mygirl/obj_background/place_'.$id_edit.'.png';
            if (file_exists($filename)) {unlink($filename);} 
            $target_dir = "app_mygirl/obj_background/place_".$id_edit.".png";
            move_uploaded_file($_FILES["file_bk_place"]["tmp_name"], $target_dir);
        }
    }
}

?>
<script>
function check_ver_bk(){
    var bk_ver=$("#bk_ver").val();
    if(bk_ver=='1'){
        $("#bk_2").hide();
        $("#bk_3").hide();
    }else{
        $("#bk_2").show();
        $("#bk_3").show();
    }
}

$(document).ready(function(){
   check_ver_bk(); 
});

</script>

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
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;" id="bk_2">
    <label>Nền cảnh:</label> 
    <input type="file" id="file_bk_view" name="file_bk_view" />
    <?php
    if($img_edit_view!=""){
    ?>
        <img src="<?php echo $img_edit_view;?>" style="width: 200px;" />
    <?php
    }
    ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;" id="bk_3">
    <label>Nền đất: (ver 2)</label> 
    <input type="file" id="file_bk_place" name="file_bk_place"  />
    <?php
    if($img_edit_place!=""){
    ?>
        <img src="<?php echo $img_edit_place;?>" style="width: 200px;" />
    <?php
    }
    ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
        <label>Loại (category)</label>
        <?php
        $list_category_bk=mysqli_query($link,"SELECT * FROM `app_my_girl_bk_category` ORDER BY `id`");
        ?>
        <select name="category" >
            <option value="">none</option>
            <?php while($row_cat=mysqli_fetch_array($list_category_bk)){ ?>
            <option value="<?php echo $row_cat['id']; ?>" <?php if($row_cat['id']==$id_category){?>selected="true"<?php }?>><?php echo get_key_lang($link,$row_cat['name'],'vi');?></option>
            <?php }?>
        </select>
        <?php
        mysqli_free_result($list_category_bk);
        ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Giá:</label> 
    <input type="text" id="price_bk" name="price_bk" value="<?php echo $price_bk;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>ID store:</label> 
    <input type="text" id="id_store_bk" name="id_store_bk" value="<?php echo $id_store_bk;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
        <label>Version</label>
        <select name="ver" id="bk_ver" onchange="check_ver_bk();">
            <option value="1" <?php if($version=='1'){?> selected="true" <?php }?>>Ver 1 (2d)</option>
            <option value="2" <?php if($version=='2'){?> selected="true" <?php }?>>Ver 2 (3d)</option>
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
    $delete_effect=mysqli_query($link,"DELETE FROM `app_my_girl_background` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
    $filename = 'app_mygirl/obj_background/icon_'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
    
    $filename = 'app_mygirl/obj_background/view_'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
    
    $filename = 'app_mygirl/obj_background/place_'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
}


    $txt_query_cat="";
    $txt_query_page_cat="";
    if($id_category!=""){
        if($id_category=="0"){
            $id_category="";
        }
        $txt_query_cat=" WHERE `category`='$id_category' ";
        $txt_query_page_cat="&cat=$id_category";
    }


    $result_tip_count=mysqli_query($link,"SELECT * FROM `app_my_girl_background` $txt_query_cat ORDER BY `id` DESC");

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
    

    $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_background` $txt_query_cat ORDER BY `id` DESC LIMIT $start, $limit ");
?>
    <div id="form_loc">
    <strong>Trang hiển thị:</strong>
        <?php
            for($i=1;$i<=$total_page;$i++){
                $color='blue';
                if($i==$current_page){
                    $color='black';
                }
                echo '<a href="'.$url.'/app_my_girl_background.php?page='.$i.''.$txt_query_page_cat.'" class="buttonPro small '.$color.'">'.$i.'</a>';
            }
        ?>
         / <?php echo $limit;?> từ khóa
    </div>
    
    <div id="form_loc">
        <a href="<?php echo $url;?>/app_my_girl_background_category.php" class="buttonPro small blue">Category</a>
    </div>
    
    <div id="form_loc">
            <strong>Loại (category)</strong>
            <?php
            $list_category_bk=mysqli_query($link,"SELECT * FROM `app_my_girl_bk_category` ORDER BY `id`");
            ?>
            <select name="category" onchange="show_cat(this.value);return false;">
                <option value="0">none</option>
                <?php while($row_cat=mysqli_fetch_array($list_category_bk)){ ?>
                <option value="<?php echo $row_cat['id']; ?>" <?php if($row_cat['id']==$id_category){?>selected="true"<?php }?>><?php echo get_key_lang($link,$row_cat['name'],'vi');?></option>
                <?php }?>
            </select>
            <?php
            mysqli_free_result($list_category_bk);
            ?>
    <script>
    function show_cat(id_cat){
        window.location="<?php echo $url;?>/app_my_girl_background.php?cat="+id_cat;
    }
    </script>
    </div>
<table>
<tr>
    <th style="width: 18px;">Id</th>
    <th>Tên</th>
    <th>biểu tượng</th>
    <th>Cảnh</th>
    <th>mặt đất</th>
    <th>Giá</th>
    <th>id store</th>
    <th>Version</th>
    <th>Chuyên mục</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
while($row=mysqli_fetch_array($list_effect)){
?>
    <tr>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td <?php if($row['version']=='1'){ ?>colspan="3"<?php }?>><img src="<?php echo thumb('app_mygirl/obj_background/icon_'.$row[0].'.png','60');?>" style="width: 50px;height: 50px;" /></td>
        <?php if($row['version']=='2'){ ?><td><img src="<?php echo thumb('app_mygirl/obj_background/view_'.$row[0].'.png','60');?>" style="width: 50px;height: 50px;" /></td><?php }?>
        <?php if($row['version']=='2'){ ?><td><img src="<?php echo thumb('app_mygirl/obj_background/place_'.$row[0].'.png','60');?>" style="width: 50px;height: 50px;" /></td><?php }?>
        <td><?php echo $row['price'];?></td>
        <td><?php echo $row['id_store'];?></td>
        <td><?php echo $row['version'];?></td>
        <td>
        <?php 
        $id_cat=$row['category'];
        $query_cat=mysqli_query($link,"SELECT `name` FROM `app_my_girl_bk_category` WHERE `id` = '$id_cat' LIMIT 1");
        $data_cat=mysqli_fetch_array($query_cat);
        echo get_key_lang($link,$data_cat['name'],'vi');
        mysqli_free_result($query_cat);
        ?>
        </td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_background.php';?>?edit=<?php echo $row['id'];?>&page=<?php echo $current_page;?>">Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_background.php';?>?del=<?php echo $row['id'];?>&page=<?php echo $current_page;?>&cat=<?php echo $id_category; ?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>
</table>