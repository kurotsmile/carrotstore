<?php
$func_id='';
$func_icon='';
$func_name='';
$func_describe='';
$func_url='';
$func_type='add';

if(isset($_POST['func_name'])){
    $func_name=$_POST['func_name'];
    $func_describe=$_POST['func_describe'];
    $func_icon=$_POST['func_icon'];
    $func_url=$_POST['func_url'];
    $func_type=$_POST['func_type'];
    if($func_type=='add'){
        $query_add_func=mysqli_query($link,"INSERT INTO `app_my_girl_function` (`icon`, `name`, `describe`, `url`) VALUES ('$func_icon', '$func_name', '$func_describe', '$func_url');");
        if($query_add_func) echo msg("Thêm mới chức năng thành công"); else echo msg("Thêm chức năng mới thất bại","warning");
    }else{
        $func_id=$_POST['func_id'];
        $query_add_func=mysqli_query($link,"UPDATE `app_my_girl_function` SET `icon` = '$func_icon', `name` = '$func_name', `describe` = '$func_describe', `url` = '$func_url' WHERE `id` = '$func_id';");
        if($query_add_func) echo msg("Cập nhật chức năng thành công");else echo msg("Cập nhật chức năng mới thất bại","warning");
    }
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $query_function=mysqli_query($link,"SELECT `id`,`url`,`icon`,`describe`,`name` FROM `app_my_girl_function` where `id`='$id_edit'");
    $data_function=mysqli_fetch_assoc($query_function);
    $func_id=$data_function['id'];
    $func_icon=$data_function['icon'];
    $func_name=$data_function['name'];
    $func_describe=$data_function['describe'];
    $func_url=$data_function['url'];
    $func_type='edit';
}
?>
<form method="post" style="width:320px;float:left;margin:5px;">

<strong>Tạo chức năng mới</strong><br/>
<p>
    <label>Biểu tượng</label><br/>
    <input type="text" name="func_icon" value="<?php echo $func_icon;?>">
</p>
<p>
    <label>Tên chức năng</label><br/>
    <input type="text" name="func_name" value="<?php echo $func_name;?>" >
</p>
<p>
    <label>Mô tả chức năng</label><br/>
    <input type="text" name="func_describe" value="<?php echo $func_describe;?>">
</p>
<p>
    <label>Đường dẫn</label><br/>
    <i>Không bao gồm địa chỉ máy chủ <b><?php echo $url;?></b> (ví dụng:app_my_girl_handling.php?func=manager_function)</i><br/>
    <input type="text" name="func_url" value="<?php echo $func_url;?>">
</p>
<p>
    <input type="hidden" name="func" value="manager_function"  />
    <input type="hidden" name="func_type" value="<?php echo $func_type;?>"  />
    <input type="hidden" name="func_id" value="<?php echo $func_id;?>"  />
    <button class="buttonPro green"><i class="fa fa-check-circle" aria-hidden="true"></i> Hoàn tất</button>
</p>
</form>

<table id="list_function" style="width:90%;float:left;">
<?php
$query_function=mysqli_query($link,"SELECT `id`,`url`,`icon`,`describe`,`name` FROM `app_my_girl_function` ORDER BY `orders`");
while($row_func=mysqli_fetch_assoc($query_function)){
?>
<tr func_id="<?php echo $row_func['id'];?>">
    <td><i class="<?php echo $row_func['icon'];?> fa-3x" aria-hidden="true"></i></td>
    <td>
        <b><?php echo $row_func['name'];?></b><br/>
        <?php echo $row_func['describe'];?>
    </td>
    <td>
        <a class="buttonPro small yellow" href="<?php echo $url;?>/app_my_girl_handling.php?func=manager_function&edit=<?php echo $row_func['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
    </td>
    <td>
        <i class="fa fa-sort" aria-hidden="true"></i>
    </td>
</tr>
<?php }?>
</table>

<button id="save_order" onClick="save_all_order();" class="buttonPro yellow" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu thứ tự các chức năng</button>

<script>
$(document).ready(function(){
    $("tbody").sortable({change: function( event, ui ) {
        $("#save_order").show();
    }});
});

function save_all_order(){
    var arr_id=[];
    $("#list_function tr").each(function( index, value ){
        var id_func=$(this).attr("func_id");
        arr_id.push(id_func);
    });
    
    $.ajax({
        url: "app_my_girl_jquery.php",
        type: "post", 
        data: "function=save_order&arr_id="+JSON.stringify(arr_id)+"&type_obj=app_my_girl_function", 
        success: function(data, textStatus, jqXHR)
        {
            swal(data);
        }
        
    });
}
</script>