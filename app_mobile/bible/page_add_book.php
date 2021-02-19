<?php
$func='add';
$name_book='';
$lang_book='';
$type_book='';
$chapter_book=0;
$id_edit='';

if(isset($_GET['lang'])){
    $lang_book=$_GET['lang'];
}

if(isset($_GET['type'])){
    $type_book=$_GET['type'];
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
}

if(isset($_POST['edit'])){
    $id_edit=$_POST['edit'];
}

if($id_edit!=''){
    $query_book=mysqli_query($link,"SELECT * FROM `book` WHERE `id` = '$id_edit' LIMIT 1");
    $data_book=mysqli_fetch_array($query_book);
    $name_book=$data_book['name'];
    $type_book=$data_book['type'];
    $lang_book=$data_book['lang'];
    $chapter_book=$data_book['chapter'];
}
$query_count_book=mysqli_query($link,"SELECT * FROM `book` WHERE `lang` = '$lang_book' AND `type`=$type_book ");
$orders=mysqli_num_rows($query_count_book);
?>

<form class="box_form" action="" method="post">
    <div class="row">
    <?php
    if($id_edit==''){
    ?>
        <strong>Thêm sách mới cho quốc gia (<?php echo $lang_book;?>)</strong>
    <?php
    }else{
    ?>
        <strong>Cập nhật sách quốc gia (<?php echo $lang_book;?>)</strong>
    <?php   
    }
    
    if(isset($_POST['name_book'])){
        $name_book=addslashes(trim($_POST['name_book']));
        $lang_book=$_POST['lang_book'];
        $type_book=$_POST['type_book'];
        $chapter_book=$_POST['chapter_book'];
        
        if($id_edit==''){
            $query_add=mysqli_query($link,"INSERT INTO `book` (`name`, `lang`,`type`,`chapter`,`orders`) VALUES ('$name_book', '$lang_book',$type_book,$chapter_book,$orders);");
            if($query_add){
                $name_book='';
                echo "Thêm sách thành công!";
                echo btn_add_work(mysql_insert_id(),$lang_book,'bible_book','add');
            }elsE{
                echo "Thêm sách thất bại";
            }
        }else{
            $query_add=mysqli_query($link,"UPDATE `book` SET `name` = '$name_book', `type` = '$type_book', `lang` = '$lang_book',`chapter`=$chapter_book WHERE `id` = '$id_edit';");
            if($query_add){
                echo "Cập nhật sách thành công!";
                echo btn_add_work($id_edit,$lang_book,'bible_book','edit');
            }elsE{
                echo "Cập nhật sách thất bại";
            }
        }
    }
    ?>
    </div>
    
    <div class="row">
    <label>Tên sách</label>
    <input type="text" name="name_book" value="<?php echo $name_book;?>" />
    </div>
    
    <div class="row">
    <label>Loại</label>
    <select name="type_book">
        <option value="0" <?php if($type_book==0){ echo 'selected="true"'; }?> >Cựu ước</option>
        <option value="1" <?php if($type_book==1){ echo 'selected="true"'; }?> >Tân ước</option>
    </select>
    </div>
    
    <div class="row">
    <label>Số chương</label>
    <input type="text" name="chapter_book" value="<?php echo $chapter_book;?>" />
    </div>

    <div class="row">
        
        
        <input name="lang_book" type="hidden"  value="<?php echo $lang_book ?>"/>
        <?php
            if($id_edit!=''){
        ?>
        <input class="buttonPro yellow" type="submit" value="Cập nhật" />
        <input type="hidden" name="edit" value="<?php echo $id_edit;?>" />
        <a class="buttonPro small blue" href="<?php echo $url; ?>/?page=view_book&id=<?php echo $id_edit;?>">Trở về quả lý sách</a>
        <?php }else{?>
        <input class="buttonPro  green" type="submit" value="Thêm mới" />
        <?php }?>
    </div>
</form>

<ul style="float: left;width: 100%;">
    <li>
    <a class="buttonPro small blue" href="<?php echo $url;?>/?page=manager_book&lang=<?php echo $lang_book;?>&type=<?php echo $type_book;?>">Quản lý sách đã thêm</a>
    </li>
</ul>


