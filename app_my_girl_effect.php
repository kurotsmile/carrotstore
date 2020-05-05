<?php
include "app_my_girl_template.php";
?>
<script src="<?php echo $url; ?>/js/jscolor.min.min.js"></script>
<?php

$name_effect="";
$func="add";
$img_edit="";
$id_edit="";
$loop="";
$tag_effect="";
$category_effect="";
$color="ffffff";
$tag_display='table';

$limit = 80;

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

if(isset($_GET['tag_effect'])){
    $category_effect=$_GET['tag_effect'];
}

if(isset($_GET['tag_display'])){
    $tag_display=$_GET['tag_display'];
    if($tag_display=='table'){
        $limit=80;
    }else{
        $limit=200;
    }
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` WHERE ((`id` = '$id_edit')) LIMIT 1;");
    $arr_data_effect=mysqli_fetch_array($edit_effect);
    $loop=$arr_data_effect[2];
    $name_effect=$arr_data_effect[1];
    $tag_effect=$arr_data_effect[3];
    $color=$arr_data_effect[4];
    $filename = 'app_mygirl/obj_effect/'.$id_edit.'.png';
    if (file_exists($filename)) {
        $img_edit=$filename;
    }
    $func="edit";
}

if(isset($_POST['func'])){
    $name_effect=$_POST['name_effect'];
    $tag_effect=$_POST['tag_effect'];
    $current_page=$_POST['page'];
    $color=$_POST['color'];
    if($_POST['loop']=="on"){
        $loop=1;
    }else{
        $loop=0;
    }
    ;
    if($_POST['func']=="add"){
        $add_effect=mysqli_query($link,"INSERT INTO `app_my_girl_effect` (`name`,`loop`,`tag`,`color`) VALUES ('$name_effect','$loop','$tag_effect','$color');");
        $id_new=mysqli_insert_id($link);
        $target_dir = "app_mygirl/obj_effect/".$id_new.".png";
        if(move_uploaded_file($_FILES["file_effect"]["tmp_name"], $target_dir)) {
            echo "The file ". basename( $_FILES["file_effect"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }else{

        $id_edit=$_POST['id_edit'];
        $update_effect=mysqli_query($link,"UPDATE `app_my_girl_effect` SET `name` = '$name_effect' , `loop`='$loop',`tag`='$tag_effect',`color`='$color' WHERE `id` = '$id_edit';");
        
        if(isset_file($_FILES["file_effect"])){
            $filename = 'app_mygirl/obj_effect/'.$id_edit.'.png';
            if (file_exists($filename)) {
                unlink($filename);
            } 
            
            $target_dir = "app_mygirl/obj_effect/".$id_edit.".png";
            if(move_uploaded_file($_FILES["file_effect"]["tmp_name"], $target_dir)) {
                echo "The file ". basename( $_FILES["file_effect"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

?>

<form id="form_loc"  method="post" enctype="multipart/form-data">
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>Tên hiệu ứng:</label> 
    <input type="text" id="name_effect" name="name_effect" value="<?php echo $name_effect;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>Biểu tượng:</label> 
    <input type="file" id="file_effect" name="file_effect" style="width: 197px;" />
    <?php
    if($img_edit!=""){
    ?>
        <img src="<?php echo $img_edit;?>" />
    <?php
    }
    ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>Lặp:</label> 
    <input type="checkbox" <?php if($loop==1){?> checked="true"<?php } ?> name="loop" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>Thẻ gẫu nhiên:</label> 
        <select name="tag_effect">
            <option value="">none</option>
            <?php for($i=0;$i<count($arr_tag_effect);$i++){?>
            <option value="<?php echo $arr_tag_effect[$i];?>" <?php if($tag_effect==$arr_tag_effect[$i]){?> selected="true" <?php } ?> ><?php echo $arr_tag_effect[$i];?></option>
            <?php }?>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>Màu:</label>         
        <input name="color" value="<?php echo $color;?>"  class="jscolor" type="text"/>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <?php if($func=="add"){?>
            <button class="buttonPro blue">Thêm mới</button>
        <?php }else{?>
            <button class="buttonPro blue">Cập nhật</button>
        <?php }?>
        <input type="hidden" name="func" value="<?php echo $func;?>" />
        <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
        <input type="hidden" name="page" value="<?php echo $current_page; ?>" />
    </div>
    
</form>

<form id="form_loc"  method="get" enctype="multipart/form-data">
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>Loại hiệu ứng:</label> 
        <select name="tag_effect">
            <option value="">none</option>
            <?php for($i=0;$i<count($arr_tag_effect);$i++){?>
            <option value="<?php echo $arr_tag_effect[$i];?>" <?php if($category_effect==$arr_tag_effect[$i]){?> selected="true" <?php } ?> ><?php echo $arr_tag_effect[$i];?></option>
            <?php }?>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>kiểu hiển thị:</label> 
        <select name="tag_display">
            <option value="table" <?php if($tag_display=='table'){?> selected="true" <?php }?>>Dạ bản</option>
            <option value="grid" <?php if($tag_display=='grid'){?> selected="true" <?php }?>>Dạ lưới</option>
        </select>
    </div>

    <div style="display: inline-block;float: left;margin: 2px;">
        <button class="buttonPro blue">Lọc</button>
        <input type="hidden" name="page" value="<?php echo $current_page; ?>" />
        <input type="hidden" name="category" value="1" />
    </div>
</form>
<?php
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $delete_effect=mysqli_query($link,"DELETE FROM `app_my_girl_effect` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
    $filename = 'app_mygirl/obj_effect/'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
}

    if($category_effect==""){
        $result_tip_count=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` ORDER BY `id` DESC");
    }else{
        $result_tip_count=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` WHERE `tag` = '$category_effect' ORDER BY `id` DESC");
    }

    $total_records=mysqli_num_rows($result_tip_count);
    
    
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    if($category_effect==""){
        $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` ORDER BY `id` DESC LIMIT $start, $limit ");
    }else{
        $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` WHERE `tag` = '$category_effect' ORDER BY `id` DESC LIMIT $start, $limit ");
    }
    
?>
    <div id="form_loc" style="width: 90%;">
    <strong>Trang hiển thị:</strong>
        <?php
            for($i=1;$i<=$total_page;$i++){
                if($i==$current_page){
                    echo '<a href="'.$url.'/app_my_girl_effect.php?page='.$i.'&category='.$category_effect.'" class="buttonPro small">'.$i.'</a>';
                }else{
                    echo '<a href="'.$url.'/app_my_girl_effect.php?page='.$i.'&category='.$category_effect.'" class="buttonPro small blue">'.$i.'</a>';
                }
            }
        ?>
         / <?php echo $limit;?> từ khóa
    </div>

<?php
if($tag_display=='table'){
?>  
    <table>
    <tr>
        <th style="width: 18px;">Id</th>
        <th>Tên hiệu ứng</th>
        <th>biểu tượng</th>
        <th>Lặp</th>
        <th>Thẻ</th>
        <th>Màu</th>
        <th style="width: 100px;">Thao tác</th>
    </tr>
    <?php
    while($row=mysqli_fetch_array($list_effect)){
    ?>
        <tr>
            <td><?php echo $row[0];?></td>
            <td><?php echo $row[1];?></td>
            <td><img src="<?php echo thumb('/app_mygirl/obj_effect/'.$row[0].'.png',16);?>" style="width: 16px;height: 16px;" /></td>
            <td><?php echo $row[2];?></td>
            <td><?php echo $row[3];?></td>
            <td><span style="background-color:#<?php echo $row[4];?>;"><?php echo $row[4];?></span></td>
            <td>
                <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_effect.php';?>?edit=<?php echo $row['id'];?>&page=<?php echo $current_page;?>&category=<?php echo $category_effect;?>">Sửa</a>
                <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_effect.php';?>?del=<?php echo $row['id'];?>&page=<?php echo $current_page;?>&category=<?php echo $category_effect;?>">Xóa</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
<?php
}else{
?>
<div style="width: 100%;float: left;">
    <?php
    while($row=mysqli_fetch_array($list_effect)){
        echo '<div class="box_icon" style="float:left;display:block;"><img src="'.thumb('/app_mygirl/obj_effect/'.$row[0].'.png',50).'"/> <span class="color" style="background-color:#'.$row[4].'"></span> <a class="buttonPro small yellow" href="'.$url.'/app_my_girl_effect.php?edit='.$row['id'].'&page='.$current_page.'&tag_display=grid">Sửa</a> <a href="'.$url.'/app_my_girl_effect.php?del='.$row['id'].'" class="buttonPro small red">Xóa</a></div>';
    }
    ?>
</div>
<?php }?>