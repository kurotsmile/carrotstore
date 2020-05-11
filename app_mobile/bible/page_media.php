<?php
$order_chap='';
$order_book='';
$type_book='';
$id_edit='';
$func='add';
$url_image='';

if(isset($_GET['order_book'])){
    $order_book=$_GET['order_book'];
}

if(isset($_GET['order_chap'])){
    $order_chap=$_GET['order_chap'];
}

if(isset($_GET['type_book'])){
    $type_book=$_GET['type_book'];
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $query_edit=mysqli_query($link,"SELECT * FROM `media` WHERE `id` = '$id_edit' LIMIT 1");
    $data_media=mysqli_fetch_array($query_edit);
    $order_book=$data_media['order_book'];
    $order_chap=$data_media['order_chap'];
    $type_book=$data_media['type'];
    $func='edit';
    $url_image='';
    $file_check_path='data/media/'.$id_edit.'.png';
    if(file_exists($file_check_path)){
        $url_image=$file_check_path;
    }
}

if(isset($_POST['order_chap'])){
    $order_chap=$_POST['order_chap'];
    $order_book=$_POST['order_book'];
    $type_book=$_POST['type_book'];
    $func=$_POST['func'];
    $error='';
    
    if(isset($_POST['url_image'])){
        $url_image=$_POST['url_image'];
    }
    if($order_chap==''){
        $error.=alert('Id chương không được bỏ trống và phải là kiểu số','error');
    }
    
    if($order_book==''){
        $error.=alert('Id sách không được bỏ trống và phải là kiểu số','error');
    }
    
    if($error==''){
        if($func=='add'){
            $query_add_media=mysqli_query($link,"INSERT INTO `media` (`order_chap`, `order_book`,`type`) VALUES ('$order_chap', '$order_book','$type_book');");
        }else{
            $query_add_media=mysqli_query($link,"UPDATE `media` SET `order_chap` = '$order_chap', `order_book` = '$order_book',`type`='$type_book' WHERE `id` = '$id_edit';");
        }
        if($query_add_media){
            $error.=alert("Thêm ảnh hoặc cập nhật thành công!","alert");
                if(isset($_FILES['image'])){
                    $target_file='data/media/'.mysql_insert_id().'.png';
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $error.=alert("Tải lên hình ảnh thất bại!");
                    } else {
                        $error.=alert("Tải lên hình ảnh thành công!");
                    }
                }
        }else{
            $error.=alert("Thêm ảnh hoặc cập nhật không thành công!","alert");
        }
    }
    echo $error;
}
?>

<div>
<form class="box_form" action="" method="post" enctype="multipart/form-data">
<div class="row">
<label>Chương</label>
<input type="text" value="<?php echo $order_chap;?>" name="order_chap" />
</div>

<div class="row">
<label>Sách</label>
<input type="text" value="<?php echo $order_book;?>" name="order_book" />
</div>

<div class="row">
<label>Loại</label>
<select name="type_book">
    <option value="0" <?php if($type_book=='0'){?>selected="true"<?php }?>>Cựu ước</option>
    <option value="1" <?php if($type_book=='1'){?>selected="true"<?php }?>>Tân ước</option>
</select>
</div>

<div class="row">
<label>Tệp hình ảnh</label>
<input type="file" class="buttonPro small blue" name="image" />
<?php
if($url_image!=''){
?><br />
<img src="<?php echo $url_image ?>" />
<input type="hidden" name="url_image" value="<?php echo $url_image;?>" />
<?php }?>
</div>

<div class="row">
    <input type="hidden" name="func" value="<?php echo $func;?>" />
    <?php if($func=='add'){?>
    <input type="submit" value="Thêm mới" class="buttonPro green" />
    <?php }else{?>
    <input type="submit" value="Cập nhật" class="buttonPro yellow" />
    <?php }?>
</div>
</form>
</div>
<?php
$id_delete='';
if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `media` WHERE ((`id` = '$id_delete'));");
    if($query_delete){
        echo alert("Xóa thành công ($id_delete)!","alert");
        $target_file='data/media/'.$id_delete.'.png';
        unlink($target_file);
    }else{
        echo alert("Xóa không thành công! ($id_delete)!","error");
    }
}
?>

<table>
<tr>
    <th>Ảnh</th>
    <th>Thứ tự sách</th>
    <th>Thứ tự chương</th>
    <th>Thao tác</th>
    <th>Xem ảnh chương ở từng quốc gia</th>
</tr>
<?php
$arr_country=array();
$query_country=mysqli_query($link,"SELECT * FROM `country`");
while($row_country=mysqli_fetch_array($query_country)){
    array_push($arr_country,$row_country['key']);    
}

$query_media=mysqli_query($link,"SELECT * FROM `media`");
while($row_media=mysqli_fetch_array($query_media)){
    $url_image='';
    $file_check_path='data/media/'.$row_media['id'].'.png';
    if(file_exists($file_check_path)){
        $url_image=$file_check_path;
    }
?>
    <tr>
        <td><?php if($url!=''){ ?><img src="<?php echo thumb($url_image,'50');?>"/><?php }?></td>
        <td><i class="fas fa-book"></i> <?php echo $row_media['order_book']; ?></td>
        <td><i class="fas fa-quote-left"></i> <?php echo $row_media['order_chap']; ?></td>
        <td>
            <a href="<?php echo $url;?>?page=media&edit=<?php echo $row_media['id'];?>" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>
            <a href="<?php echo $url;?>?page=media&delete=<?php echo $row_media['id'];?>" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>
        </td>
        <td>
            <?php
            for($i=0;$i<sizeof($arr_country);$i++){
            ?>
            <a class="buttonPro small" href="<?php echo $url;?>?page=paragraph&order_book=<?php echo $row_media['order_book']; ?>&id_chapter=<?php echo $row_media['order_chap'];?>&lang_book=<?php echo $arr_country[$i]; ?>&type_book=<?php echo $row_media['type']; ?>"><?php echo $arr_country[$i]; ?></a>
            <?php
            }
            ?>
        </td>
    </tr>
<?php
}
?>
</table>