<?php
include "page_template.php";
$sub_view='';
$user_id_view='';
$order='';
$help_url_image=$url.'/image_help/help_default.png';
if(isset($_GET['user_id'])){
    $user_id_view=$_GET['user_id'];
}

if(isset($_GET['order'])){
    $order='1';
}
    
if(isset($_GET['sub_show'])){
    $sub_view=$_GET['sub_show'];
}
if(isset($_POST['sub_show'])){
    $sub_view=$_GET['sub_show'];
}
?>

<div class="page_title">
    <h2> <i class="fas fa-book"></i> Quản lý chỉ dẫn</h2>
</div>

<?php if($sub_view==''){?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_help&sub_show=add" class="buttonPro small green"><i class="fas fa-plus-square"></i> Thêm hướng dẫn</a></li>
    <li><a href="<?php echo $url;?>/?page_show=manager_help&order=1" class="buttonPro small green"><i class="fas fa-sort"></i> Sắp xếp</a></li>
</ul>
<?php }else{?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_help" class="buttonPro small blue"><i class="fas fa-chevron-circle-left"></i> Trở về</a></li>
</ul>
<?php 
}
?>
<div id="page_contain" style="padding: 10;">
<?php
if($order!=''){
?>
<i>Kéo thả các mục để sắp xếp thứ tự</i>
<script>
$(document).ready(function(){
    $("#btn_save").hide();
    $("#list_help").sortable({change: function( event, ui ) {
        $("#btn_save").show();
    }});
});


function save_all_item(){
    var arr_id=[];
    $("#list_help li").each(function( index, value ){
        var id_help=$(this).attr("id_help");
        arr_id.push(id_help);
    });
    
    $.ajax({
        url: "ajax.php",
        type: "post", 
        data: "function=save_order&arr_id_help="+JSON.stringify(arr_id), 
        success: function(data, textStatus, jqXHR)
        {
            alert(data);
        }
        
    });
}

</script>
<?php
}
if($sub_view=='add'){
    $func_type='add';
    $help_title='';
    $help_contain='';
    $help_user_create=$data_user['user_id'];
    $help_url_image=$url.'/image_help/help_default.png';
    $help_father_id='0';
    $id_edit='';
    $help_order=0;
    
    if(isset($_GET['id_edit'])){ 
        $func_type='edit';
        $id_edit=$_GET['id_edit'];
    }
    
    if(isset($_POST['id_edit'])){
        $id_edit=$_POST['id_edit'];
    }
    
    if(isset($_POST['func'])){ 
        $func_type=$_POST['func'];
    }
    
        
    if($func_type=='add'){
        $help_title='';
        $help_contain='';
        $help_father_id='0';
        $help_order=0;
    }else{
        $query_task_edit=mysqli_query($link,"SELECT * FROM `work_help` WHERE `id` = '$id_edit' LIMIT 1");
        $data_help=mysqli_fetch_array($query_task_edit);
        $help_contain=$data_help['contain'];
        $help_title=$data_help['title'];
        $help_user_create=$data_help['user_create'];
        $help_father_id=$data_help['father_id'];
        $help_order=$data_help['orders'];
        if(file_exists('image_help/'.$id_edit.'.png')){
            $help_url_image=$url.'/image_help/'.$id_edit.'.png';
        }
    }
    
    if(isset($_POST['help_contain'])){
        $error='';
        $help_title=$_POST['help_title'];
        $help_contain=$_POST['help_contain'];
        $help_user_create=$_POST['help_user_create'];
        $help_father_id=$_POST['help_father'];
        $help_order=$_POST['help_order'];
        
        if($help_title==''){
            $error.='Tiêu đề dướng dẫn không được để trống!<br/>';
        }
        
        if($help_contain==''){
            $error.='Nội dung hướng dẫn không được để trống!<br/>'; 
        }

        if($error==''){
            if($func_type=='add'){
                $query_add=mysqli_query($link,"INSERT INTO `work_help` (`title`, `contain`, `user_create`,`father_id`,`orders`) VALUES ('$help_title', '$help_contain', '$help_user_create','$help_father_id',$help_order);");
                if($query_add){
                    $help_title='';
                    $help_contain='';
                    $help_url_image=$url.'/image_help/help_default.png';
                    $help_father_id='0';
                    $help_order=0;
                    $id_edit=mysqli_insert_id($link);
                }else{
                    $error.='Không thêm được chỉ dẫn - lỗi:'.mysql_error().'<br/>';
                }
            }else{
               $query_update=mysqli_query($link,"UPDATE `work_help` SET  `title` = '$help_title', `contain` = '$help_contain', `user_create` = '$help_user_create',`father_id`='$help_father_id',`orders`='$help_order' WHERE `id` = '$id_edit';");
               if($query_update){
               }else{
                  $error.='Không thể cập nhật chỉ dẫn - lỗi:'.mysql_error().'<br/>';  
               }
            }
        }
        
        
        if($error==''){
            if($_FILES["image_help"]["tmp_name"]!=''){
                $target_dir_img="image_help/".$id_edit.".png";
                move_uploaded_file($_FILES["image_help"]["tmp_name"], $target_dir_img);
            }
            if($func_type=='add'){
                echo alert('Thêm nhiệm vụ thành công!!!','alert');
            }else{
               echo alert('Cập nhật nhiệm vụ thành công !!!','alert'); 
            }
        }else{
            echo alert($error,'error'); 
        }
    }
    ?>

        <form class="box_form_add_chat" method="post" action="" enctype="multipart/form-data" style="width: 500;">
            <div class="row line">
                <strong> <i class="fas fa-plus-square"></i> Tạo tài liệu hướng dẫn</strong><br />
                <i style="font-size:10px;">Tài liệu này giúp hướng dẫn mọi người làm việc dễ dàng hơn</i>
            </div>
            
            <div class="row line">
                <label>Ảnh chỉ dẫn</label>
                <img src="<?php echo thumb_img($help_url_image,'500px');?>/" />
                <input type="file" class="buttonPro small blue" name="image_help" />
            </div>
            
            <div class="row line">
                <label>Tiêu đề chỉ dẫn</label>
                <input name="help_title" value="<?php echo $help_title; ?>" />
            </div>
            
            <div class="row line">
                <label>Nội dung</label><br/>
                <textarea style="width: 100%;height: 300px;float: left" name="help_contain" id="help_contain"><?php echo $help_contain;?></textarea>
            </div>
            
            <div class="row line">
                <label>Chủ đề cha</label>
                <select name="help_father">
                    <option value="0">Không chọn mục cha</option>
                    <?php 
                    $query_help_father=mysqli_query($link,"SELECT `father_id`,`id`,`title` FROM `work_help` WHERE `id`!='$id_edit'");
                    while($row_help_father=mysqli_fetch_assoc($query_help_father)){
                        if($row_help_father['father_id']=='0') {
                            ?><option value="<?php echo $row_help_father['id']; ?>" <?php if ($help_father_id == $row_help_father['id']){ ?>selected="true"<?php } ?>><?php echo $row_help_father['title']; ?></option><?php
                        }else{
                            ?><option value="<?php echo $row_help_father['id']; ?>" <?php if ($help_father_id == $row_help_father['id']){ ?>selected="true"<?php } ?>>--<?php echo $row_help_father['title']; ?></option><?php
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="row line">
                <label>Thứ tự</label>
                <input name="help_order" value="<?php echo $help_order; ?>" />
            </div>

            <div class="row">
                <label>&nbsp;</label>
                <input type="submit" class="buttonPro green" value="Hoàn tất" />
            </div>
            
            <div class="row">
                <input type="hidden" name="func" value="<?php echo $func_type; ?>" />
                <input type="hidden" name="sub_show" value="add" />
                <input type="hidden" name="page_show" value="manager_help" />
                <input type="hidden" name="help_user_create" value="<?php echo $data_user['user_id'];?>" />
                <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
            </div>
        </form>

    <script src="<?php echo $url;?>/js/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'help_contain',{
            language: 'vi',
            customConfig: 'build-config.js',
        });
    </script>
    <?php
}else{
    
    $id_delete='';
    if(isset($_GET['delete'])){
        $id_delete=$_GET['delete'];
        $query_delete=mysqli_query($link,"DELETE FROM `work_help` WHERE ((`id` = '$id_delete'));");
        if($query_delete){
            if(file_exists('image_help/'.$id_delete.'.png')){
                unlink('image_help/'.$id_delete.'.png');
            }
            echo alert("Xóa thành công tác vụ (id:".$id_delete.")",'alert');
        }else{
            echo alert("Xóa không thành tác vụ (id:".$id_delete.")",'error');
        }
    }
    

$query_help_father=mysqli_query($link,"SELECT * FROM `work_help` WHERE `father_id`=0 ORDER BY `orders`");
echo '<ul id="list_help">';
while($item_father=mysqli_fetch_array($query_help_father)){
    $query_help_childs=mysqli_query($link,"SELECT * FROM `work_help` WHERE `father_id`=".$item_father['id']." ORDER BY `orders`");
    echo '<li class="item_father" id_help="'.$item_father['id'].'"><a href="'.$url.'/?page_show=help&id='.$item_father['id'].'">'.$item_father['title'].'</a>';
    echo ' <a href="'.$url.'/?page_show=manager_help&sub_show=add&id_edit='.$item_father['id'].'" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>';
    if($order==''){
        if(mysqli_num_rows($query_help_childs)>1){
            echo ' <a href="'.$url.'/?page_show=manager_help&sub_show=add&id_edit='.$item_father['id'].'" class="buttonPro small yellow"><i class="fas fa-sort"></i> Sắp xếp</a>';
        }
    }
    
    echo ' <a href="'.$url.'/?page_show=manager_help&delete='.$item_father['id'].'" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>';
    echo box_user_info($link,$item_father['user_create']);
    
    if($order!=''){
        echo ' ('.$item_father['orders'].')';
    }
    
    if($order==''){
        if(mysqli_num_rows($query_help_childs)>0){
            echo '<ul>';
            while($item_help_child=mysqli_fetch_array($query_help_childs)){
                $query_help_childs2=mysqli_query($link,"SELECT * FROM `work_help` WHERE `father_id`=".$item_help_child['id']." ORDER BY `orders`");
                
                echo '<li><a href="'.$url.'/?page_show=help&id='.$item_help_child['id'].'">'.$item_help_child['title'].'</a> ';
                echo ' <a href="'.$url.'/?page_show=manager_help&sub_show=add&id_edit='.$item_help_child['id'].'" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>';
                
                if(mysqli_num_rows($query_help_childs2)>1){
                    echo ' <a href="'.$url.'/?page_show=manager_help&sub_show=add&id_edit='.$item_help_child['id'].'" class="buttonPro small yellow"><i class="fas fa-sort"></i> Sắp xếp</a>';
                }
                
                echo ' <a href="'.$url.'/?page_show=manager_help&delete='.$item_help_child['id'].'" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>';
                echo box_user_info($link,$item_help_child['user_create']);
                echo '</li>';

                if(mysqli_num_rows($query_help_childs2)>0){
                    echo '<ul>';
                    while($item_help_child2=mysqli_fetch_array($query_help_childs2)){
                        echo '<li><a href="'.$url.'/?page_show=help&id='.$item_help_child2['id'].'">'.$item_help_child2['title'].'</a> ';
                        echo ' <a href="'.$url.'/?page_show=manager_help&sub_show=add&id_edit='.$item_help_child2['id'].'" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>';
                        echo ' <a href="'.$url.'/?page_show=manager_help&delete='.$item_help_child2['id'].'" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>';
                        echo box_user_info($link,$item_help_child2['user_create']);
                        echo '</li>';
                        $query_help_childs3=mysqli_query($link,"SELECT * FROM `work_help` WHERE `father_id`=".$item_help_child2['id']." ORDER BY `orders`");
                        if(mysqli_num_rows($query_help_childs3)>0){
                            echo '<ul>';
                            while($item_help_child3=mysqli_fetch_array($query_help_childs3)){
                                echo '<li><a href="'.$url.'/?page_show=help&id='.$item_help_child3['id'].'">'.$item_help_child3['title'].'</a> ';
                                echo ' <a href="'.$url.'/?page_show=manager_help&sub_show=add&id_edit='.$item_help_child3['id'].'" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>';
                                echo ' <a href="'.$url.'/?page_show=manager_help&delete='.$item_help_child3['id'].'" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>';
                                echo box_user_info($link,$item_help_child3['user_create']);
                                echo '</li>';
                            }
                            echo '</ul>';
                        }
                    }
                    echo '</ul>';
                }
            }
            echo '</ul>';
        }
    }
    echo '</li>';
}
echo '</ul>';
?>
<span class="buttonPro blue" id="btn_save" style="display: none;" onclick="save_all_item();"><i class="far fa-save"></i> Lưu thay đổi thứ tự</span>
<?php
}
?>
</div>
