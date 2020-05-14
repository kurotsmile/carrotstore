<div id="page_contain">
<h3>Quản lý sách</h3>
<i>Kéo thả từng mục để thay đổi thứ tự của các sách</i>
<?php
$lang=$_GET['lang'];
$type=$_GET['type'];
$url_cur=$url.'?page=manager_book&lang='.$lang.'&type='.$type;

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `book` WHERE `id` = '$id_delete' AND `type`='$type' AND `lang`='$lang';");
    if($query_delete){
        echo 'Xóa thành công sách ('.$id_delete.')';
    }else{
        echo 'Xóa không thành công sách ('.$id_delete.')';
    }
}

$query_book=mysqli_query($link,"SELECT * FROM `book` WHERE `lang` = '$lang' AND `type`=$type ORDER BY `orders`");
if(mysqli_num_rows($query_book)>0){
?>
<ul id="list_book">
    <?php 
    while($book=mysqli_fetch_array($query_book)){
    ?>
    <li id_book="<?php echo $book['id']; ?>" >
        <i class="fa fa-book"></i> 
        <?php echo $book['name']; ?>  
        <a class="buttonPro small blue" href="<?php echo $url;?>/?page=view_book&id=<?php echo $book['id']; ?>"><i class="fa fa-play"></i> Xem (<?php echo $book['chapter']; ?> chương)</a>
        <a class="buttonPro small yellow" href="<?php echo $url;?>?page=add_book&edit=<?php echo $book['id']; ?>"><i class="fa fa-edit"></i> Sửa</a> 
        <a class="buttonPro small red" href="<?php echo $url_cur;?>&delete=<?php echo $book['id']; ?>"><i class="fa fa-trash"></i> Xóa</a>
    </li>
    <?php }
    mysqli_free_result($query_book);
    ?>
</ul>
<a id="btn_save" class="buttonPro small yellow" onclick="save_all_item();return false;"><i class="fa fa-save"></i> Lưu thay đổi thứ tự</a>
<script>
$(document).ready(function(){
    $("#btn_save").hide();
    $("#list_book").sortable({change: function( event, ui ) {
        $("#btn_save").show();
    }});
});

function save_all_item(){
    var type_book='<?php echo $type;?>';
    var arr_id=[];
    $("#list_book li").each(function( index, value ){
        var id_book=$(this).attr("id_book");
        arr_id.push(id_book);
    });
    
    $.ajax({
        url: "ajax.php",
        type: "post", 
        data: "function=save_order&arr_id_book="+JSON.stringify(arr_id)+"&type_book="+type_book, 
        success: function(data, textStatus, jqXHR)
        {
            swal(data);
        }
        
    });
}

</script>
<?php
}else{
    echo 'Chưa có sách nào được tạo, hãy tạo sách cho quốc gia này!';
}
?>

<ul style="float: left;width: 100%;">
    <li>
    <a class="buttonPro small green" href="<?php echo $url;?>/?page=add_book&lang=<?php echo $lang;?>&type=<?php echo $type;?>">Thêm sách</a>
    </li>
</ul>
</div>


