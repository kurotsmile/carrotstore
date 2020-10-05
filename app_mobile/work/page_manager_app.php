<?php
include "page_template.php";
$sub_view='';
if(isset($_GET['sub_show'])){
    $sub_view=$_GET['sub_show'];
}
if(isset($_POST['sub_show'])){
    $sub_view=$_GET['sub_show'];
}
?>
<h2> <i class="fas fa-rocket"></i> Quản lý ứng dụng</h2>
<?php if($sub_view==''){?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_app&sub_show=add" class="buttonPro small green"><i class="fas fa-user-plus"></i> Thêm ứng dụng</a></li>
</ul>
<?php }else{?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_app" class="buttonPro small blue"><i class="fas fa-chevron-circle-left"></i> Trở về</a></li>
</ul>
<?php }?>
<?php
if($sub_view=='add'){
    $func_type='add';
    $app_name='';
    $app_url='';
    $id_edit='';
    
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
        $app_name='';
        $app_url='';
    }else{
        $query_user_edit=mysqli_query($link,"SELECT * FROM `work_app` WHERE `id` = '$id_edit' LIMIT 1");
        $data_app_edit=mysqli_fetch_array($query_user_edit);
        $app_name=$data_app_edit['name'];
        $app_url=$data_app_edit['url'];
    }
    

    
    if(isset($_POST['name_app'])){
        $error='';
        $app_name=$_POST['name_app'];
        $app_url=$_POST['url_app'];

        
        if($app_name==''){
            $error.='Tên ứng dụng không được để trống!<br/>'; 
        }
        
        if($app_url==''){
            $error.='Đường dẫn (cms) ứng dụng không được để trống!<br/>';
        }
        

        if($error==''){
            if($func_type=='add'){
                $query_add_user=mysqli_query($link,"INSERT INTO `work_app` (`name`, `url`) VALUES ('$app_name', '$app_url');");
                if($query_add_user){
                    $app_name='';
                    $app_url=''; 
                    $id_edit=mysqli_insert_id($link);
                    echo ' ID app:'.$id_edit;
                }else{
                    $error.='Không thêm được thông tin ứng dụng - lỗi:'.mysqli_error($link).'<br/>';
                }
            }else{
               $query_update=mysqli_query($link,"UPDATE `work_app` SET  `name` = '$app_name', `url` = '$app_url' WHERE `id` = '$id_edit';");
               if($query_update){
               }else{
                  $error.='Không thể cập nhật thông tin ứng dụng - lỗi:'.mysqli_error($link).'<br/>';  
               }
            }
        }
        
        if($error==''){
            
            if($_FILES["icon_app"]["tmp_name"]!=''){
                $target_dir_avatar="avatar_app/".$id_edit.".png";
                move_uploaded_file($_FILES["icon_app"]["tmp_name"], $target_dir_avatar);
            }
      
            if($func_type=='add'){
                echo alert('Thêm thông tin ứng dụng thành công!!!','alert');
            }else{
               echo alert('Cập nhật thông tin ứng dụng thành công!!!','alert'); 
            }
        }else{
            echo alert($error,'error'); 
        }
    }
    ?>
        <form class="box_form_add_chat" enctype="multipart/form-data"  method="post" action="" style="width: 500;">
            <div class="row line">
                <strong><i class="fas fa-puzzle-piece"></i> Khai báo ứng dụng</strong><br />
                <i style="font-size:10px;">Thêm thông tin ứng dụng vào quản lý làm việc</i>
            </div>
            
            <div class="row line">
                <label>Biểu tượng ứng dụng</label>
                <?php if($func_type=='add'){?>
                    <img src="<?php echo url_image_app(0,'40'); ?>" />
                <?php }else{ ?>
                    <img src="<?php echo url_image_app($id_edit,'40'); ?>" />
                <?php }?>
                <input name="icon_app" type="file" class="buttonPro small blue" placeholder="Tải lên biểu tượng ứng dụng"  />
            </div>
            
            <div class="row line">
                <label>Tên ứng dụng</label>
                <input name="name_app" type="text" placeholder="Tên ứng dụng" value="<?php echo $app_name;?>" />
            </div>
            
            <div class="row line">
                <label>Đường dẫn (cms)</label>
                <input name="url_app" type="text" placeholder="Nhập đường dẫn tới trình quản lý ứng dụng" value="<?php echo $app_url;?>" />
            </div>
            
            
            <div class="row">
                <label>&nbsp;</label>
                <input type="submit" class="buttonPro green" value="Hoàn tất" />
            </div>
            
            <div class="row">
                <input type="hidden" name="func" value="<?php echo $func_type; ?>" />
                <input type="hidden" name="page_show" value="manager_app" />
                <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
            </div>
        </form>
    <?php
}else{
    
    $id_delete='';
    if(isset($_GET['delete'])){
        $id_delete=$_GET['delete'];
        $query_delete=mysqli_query($link,"DELETE FROM `work_app` WHERE ((`id` = '$id_delete'));");
        if($query_delete){
            echo alert("Xóa thành công ứng dụng (id:".$id_delete.")",'alert');
        }else{
            echo alert("Xóa không thành ứng dụng (id:".$id_delete.")",'error');
        }
    }
    $query_app=mysqli_query($link,"SELECT * FROM `work_app` ");
    ?>
    <table>
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Đường dẫn cms</th>
        <th>Tác vụ</th>
    </tr>
    <?php
    while($row_app=mysqli_fetch_array($query_app)){

    ?>
    <tr>
        <td><?php echo $row_app['id']; ?></td>
        <td><img style="float: left;margin-right: 8px;" src="<?php echo url_image_app($row_app['id'],'30');?>" /> <?php echo $row_app['name']; ?></td>
        <td><?php echo $row_app['url']; ?></td>
        <td>
            <a href="<?php echo $url;?>/?page_show=manager_app&sub_show=add&id_edit=<?php echo $row_app['id']; ?>" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>
            <a href="<?php echo $url;?>/?page_show=manager_app&delete=<?php echo $row_app['id']; ?>" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </table>
    <?php 
}?>