<?php
$cur_url=$this->cur_url;
$func='view';
$user_id='';
$user_name='';
$user_full_name='';
$user_pass='';

if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];

if($func=='view'){
?>
<div class="cms_tool_page">
    <a class="buttonPro small green" href="<?php echo $cur_url;?>&func=add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm quản trị viên</a>
</div>
<table>
<tr>
    <th>Tên đăng nhập</th>
    <th>Mật khẩu</th>
    <th>Vai trò</th>
    <th>Thao tác</th>
</tr>
<?php
$query_list_user=$this->q("SELECT * FROM `work_user`");
while($user=mysqli_fetch_assoc($query_list_user)){
?>
<tr>
    <td><i class="fa fa-user-o" aria-hidden="true"></i> <?php echo $user['user_name'];?></td>
    <td><i class="fa fa-key" aria-hidden="true"></i> <?php echo $user['user_pass'];?></td>
    <td><?php echo $user['user_role'];?></td>
    <td>
        <a class="buttonPro small yellow" href="<?php echo $cur_url.'&func=edit&id='.$user['user_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
        <a class="buttonPro small red" href=""><i class="fa fa-trash" aria-hidden="true"></i></a>
    </td>
</tr>
<?php
}
?>
</table>
<?php }

if($func=='edit'||$func=='add'){
    if(isset($_GET['id'])){
        $user_id=$_GET['id'];
        $data_user=$this->q_data("SELECT * FROM `work_user` WHERE `user_id` = '$user_id' LIMIT 1");
        $user_id=$data_user['user_id'];
        $user_name=$data_user['user_name'];
        $user_full_name=$data_user['full_name'];
        $user_pass=$data_user['user_pass'];
    }

    if(isset($_POST['user_name'])){
        $user_id=$_POST['user_id'];
        $user_name=$_POST['user_name'];
        $user_full_name=$_POST['full_name'];
        $user_pass=$_POST['user_pass'];

        echo $this->msg("Cập nhật thành công!!!");
    }
?>
<form action="" method="post" style="width:auto;float:left;padding:10px">
<h3>
    Chỉnh sửa thông tin quản trị viên
</h3>
<table>
    <tr>
        <td>Tên đăng nhập (user_name)</td>
        <td><input type="text" name="user_name" value="<?php echo $user_name;?>" ></td>
    </tr>
    <tr>
        <td>Tên đầy đủ</td>
        <td><input type="text" name="full_name" value="<?php echo $user_full_name;?>" ></td>
    </tr>
    <tr>
        <td>Mật khẩu đăng nhập</td>
        <td><input type="text" name="user_pass" value="<?php echo $user_pass;?>" ></td>
    </tr>
</table>
<a class="buttonPro black" href="<?php echo $cur_url;?>&func=view"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
<?php if($func=='edit'){?>
    <button class="buttonPro yellow"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button>
<?php }else{?>
    <button class="buttonPro green"><i class="fa fa-check-circle" aria-hidden="true"></i> Thêm mới</button>
<?php }?>
<input type="hidden" value="<?php echo $user_id;?>" name="user_id" />
<form>
<?php
}