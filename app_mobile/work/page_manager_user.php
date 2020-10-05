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
<h2> <i class="fas fa-users"></i> Quản lý nhân viên</h2>
<?php if($sub_view==''){?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_user&sub_show=add" class="buttonPro small green"><i class="fas fa-user-plus"></i> Thêm nhân viên</a></li>
</ul>
<?php }else{?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_user" class="buttonPro small blue"><i class="fas fa-chevron-circle-left"></i> Trở về</a></li>
</ul>
<?php }?>
<?php
if($sub_view=='add'){
    $func_type='add';
    $user_name_add='';
    $user_password_add='';
    $user_wage_add='';
    $user_pay='';
    $user_role='';
    $id_edit='';
    $user_price_task='';
    
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
        $user_name_add='';
        $user_password_add='';
        $user_wage_add='';
        $user_pay='';
        $user_role='';
        $user_price_task='';
    }else{
        $query_user_edit=mysqli_query($link,"SELECT * FROM `work_user` WHERE `user_id` = '$id_edit' LIMIT 1");
        $data_user_edit=mysqli_fetch_array($query_user_edit);
        $user_name_add=$data_user_edit['user_name'];
        $user_password_add=$data_user_edit['user_pass'];
        $user_wage_add=$data_user_edit['user_wage'];
        $user_role=$data_user_edit['user_role'];
        $user_pay=$data_user_edit['payment'];
        $user_price_task=$data_user_edit['price_task'];
    }
    
    if(isset($_POST['username'])){
        $error='';
        $user_name_add=$_POST['username'];
        $user_password_add=$_POST['password'];
        $user_wage_add=$_POST['wage'];
        $user_role=$_POST['user_role'];
        $user_pay=$_POST['user_pay'];
        $user_price_task=$_POST['price_task'];
        
        if($user_name_add==''){
            $error.='Tên đăng nhập không được để trống!<br/>'; 
        }
        
        if($user_password_add==''){
            $error.='Mật khẩu không được để trống!<br/>';
        }
        
        if($user_wage_add==''){
            $error.='Mức lương không được để trống!<br/>';
        }
        
        if($error==''){
            if($func_type=='add'){
                $query_add_user=mysqli_query($link,"INSERT INTO `work_user` (`user_name`, `user_wage`, `user_pass`, `user_role`, `payment`,`price_task`) VALUES ('$user_name_add', '$user_wage_add', '$user_password_add', '$user_role', '$user_pay','$user_price_task');");
                if($query_add_user){
                    $user_name_add='';
                    $user_password_add='';
                    $user_wage_add='';
                    $user_pay='';
                    $user_role='';
                    $user_price_task='';
                }else{
                    $error.='Không thêm được thành viên - lỗi:'.mysql_error().'<br/>';
                }
            }else{
               $query_update=mysqli_query($link,"UPDATE `work_user` SET  `user_name` = '$user_name_add', `user_wage` = '$user_wage_add', `user_pass` = '$user_password_add', `user_role` = '$user_role', `payment` = '$user_pay' , `price_task`='$user_price_task' WHERE `user_id` = '$id_edit';");
               if($query_update){
               }else{
                  $error.='Không thể cập nhật thành viên - lỗi:'.mysql_error().'<br/>';  
               }
            }
        }
        
        
        if($error==''){
            if($func_type=='add'){
                echo alert('Thêm nhân viên thành công!!!','alert');
            }else{
               echo alert('Cập nhật thông tin nhân viên thành công!!!','alert'); 
            }
        }else{
            echo alert($error,'error'); 
        }
    }
    ?>
        <form class="box_form_add_chat" method="post" action="" style="width: 500;">
            <div class="row line">
                <strong><i class="fas fa-user-plus"></i> Tạo tài khoản nhân viên</strong><br />
                <i style="font-size:10px;">Thêm nhân viên mới vào làm việc</i>
            </div>
            
            <div class="row line">
                <label>Tên đăng nhập</label>
                <input name="username" type="text" placeholder="Tên đăng nhập của nhân viên" value="<?php echo $user_name_add;?>" />
            </div>
            
            <div class="row line">
                <label>Mật khẩu</label>
                <input name="password" type="text" placeholder="Mật khẩu cấp quyền truy cập cho nhân viên" value="<?php echo $user_password_add;?>" />
            </div>
            
            <div class="row line">
                <label>Mức lương</label>
                <input name="wage" type="text" placeholder="Nhập mức lương cho nhân viên" value="<?php echo $user_wage_add;?>" />
            </div>
        
            <div class="row line">
                <label>Chức vụ</label>
                <select name="user_role">
                    <option value="editor" <?php if($user_role=='editor'){ echo 'selected="true"';} ?>>Editor - Người biên tập nội dung</option>
                    <option value="leader" <?php if($user_role=='leader'){ echo 'selected="true"';} ?>>Leader - Người quả lý tác vụ</option>
                    <option value="admin" <?php if($user_role=='admin'){ echo 'selected="true"';} ?>>Admin - Người quản trị viên</option>
                    <option value="support" <?php if($user_role=='support'){ echo 'selected="true"';} ?>>Support - Hỗ trợ viên</option>
                </select>
            </div>
            
            <div class="row line">
                <label>Giá mỗi tác vụ</label>
                <input name="price_task" type="text" placeholder="Nhập giá mỗi tác của của nhân viên tương ứng" value="<?php echo $user_price_task;?>" />
            </div>
            
            <div class="row line">
                <label>Kiểu thanh toán</label>
                <select name="user_pay">
                    <option value="0" <?php if($user_pay=='0'){ echo 'selected="true"';} ?>>Tiền mặt</option>
                    <option value="1" <?php if($user_pay=='1'){ echo 'selected="true"';} ?>>Tài khoản ngân hàng</option>
                </select>
            </div>
            
            <div class="row">
                <label>&nbsp;</label>
                <input type="submit" class="buttonPro green" value="Hoàn tất" />
            </div>
            
            <div class="row">
                <input type="hidden" name="func" value="<?php echo $func_type; ?>" />
                <input type="hidden" name="sub_show" value="add" />
                <input type="hidden" name="page_show" value="manager_user" />
                <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
            </div>
        </form>
    <?php
}else{
    
    $id_delete='';
    if(isset($_GET['delete'])){
        $id_delete=$_GET['delete'];
        $query_delete=mysqli_query($link,"DELETE FROM `work_user` WHERE ((`user_id` = '$id_delete'));");
        if($query_delete){
            echo alert("Xóa thành công nhân viên (id:".$id_delete.")",'alert');
        }else{
            echo alert("Xóa không thành công nhân viên (id:".$id_delete.")",'error');
        }
    }
    $query_users=mysqli_query($link,"SELECT * FROM `work_user` ");
    ?>
    <table>
    <tr>
        <th>ID</th>
        <th>Tên đăng nhập</th>
        <th>Mứt lương</th>
        <th>Mật khẩu</th>
        <th>Chức vụ</th>
        <th>Giá mỗi tác vụ</th>
        <th>Thanh toán từ xa</th>
        <th>Tác vụ</th>
    </tr>
    <?php
    while($row_user=mysqli_fetch_array($query_users)){
        $url_avart_user=$url.'/image/avatar_default.png';
        if(file_exists("avatar_user/".$row_user['user_id'].".png")){
            $url_avart_user=$url."/avatar_user/".$row_user['user_id'].".png";;
        }
    ?>
    <tr>
        <td><?php echo $row_user['user_id']; ?></td>
        <td><img style="float: left;margin-right: 8px;" src="<?php echo thumb_img($url_avart_user,'30');?>" /> <?php echo $row_user['user_name']; ?></td>
        <td><?php echo $row_user['user_wage']; ?></td>
        <td><?php echo $row_user['user_pass']; ?></td>
        <td><?php echo $row_user['user_role']; ?></td>
        <td><?php echo $row_user['price_task'];?></td>
        <td><?php if($row_user['payment']=="0"){?> <i class="fas fa-money-bill-alt" title="Thanh toán bằng tiền mặt"></i><?php }else{?> <i class="far fa-credit-card" title="Thanh toán qua tài khoản ngân hàng"></i><?php }?></td>
        <td>
            <a href="<?php echo $url;?>/?page_show=manager_user&sub_show=add&id_edit=<?php echo $row_user['user_id']; ?>" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>
            <a href="<?php echo $url;?>/?page_show=manager_user&delete=<?php echo $row_user['user_id']; ?>" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </table>
    <?php 
}?>