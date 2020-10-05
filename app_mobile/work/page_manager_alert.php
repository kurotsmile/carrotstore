<?php
include "page_template.php";
$sub_view='';
$user_id_view='';
if(isset($_GET['user_id'])){
    $user_id_view=$_GET['user_id'];
}

function show_row_link($txt=''){
    $txt_html="<div style='margin-top:2px'>";
    $txt_html.="<input style='width:80%;' type='text' name='links[]' value='".$txt."' />";
    $txt_html.="<span onclick='$(this).parent().remove();' class='buttonPro small red'><i class='fas fa-trash-alt'></i> Xóa</span>";
    $txt_html.="</div>";
    return $txt_html;
}
    
if(isset($_GET['sub_show'])){
    $sub_view=$_GET['sub_show'];
}
if(isset($_POST['sub_show'])){
    $sub_view=$_GET['sub_show'];
}

if($data_user['user_role']=='admin'){
?>
<div class="page_title">
    <h2> <i class="fas fa-bell"></i> Thông báo </h2>
</div>
<?php if($sub_view==''){?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_alert&sub_show=add" class="buttonPro small green"><i class="fas fa-plus-square"></i> Thêm thông báo</a></li>
</ul>
<?php }else{?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_alert" class="buttonPro small blue"><i class="fas fa-chevron-circle-left"></i> Trở về</a></li>
</ul>
<?php 
}
}

if($sub_view=='add'||$sub_view=='edit'){
    $func_type='add';
    $alert_contain='';
    $alert_user_to='';
    $alert_user_send=$data_user['user_id'];
    $id_edit='';
    $is_see='0';
    
    if(isset($_GET['id_edit'])){ 
        $func_type='edit';
        $id_edit=$_GET['id_edit'];
        $query_edit=mysqli_query($link,"SELECT * FROM `work_notification` WHERE `id` = '$id_edit' LIMIT 1");
        $data_edit=mysqli_fetch_array($query_edit);
        $alert_contain=$data_edit['contain'];
        $alert_user_to=$data_edit['user_to'];
        $alert_user_send=$data_edit['user_send'];
        $is_see=$data_edit['is_see'];
    }
    
    if(isset($_POST['id_edit'])){
        $id_edit=$_POST['id_edit'];
    }
    
    if(isset($_POST['func'])){ 
        $func_type=$_POST['func'];
    }

    if(isset($_POST['alert_status'])){
        $is_see=$_POST['alert_status'];
    }
        
    if($func_type=='add'){
        $alert_contain='';
        $alert_user_to='';
    }
    
    if(isset($_POST['alert_contain'])){
        $error='';
        $alert_contain=$_POST['alert_contain'];
        $alert_user_to=$_POST['alert_user_to'];
        $alert_user_send=$_POST['alert_user_send'];

        if($alert_contain==''){
            $error.='Nội dung thông báo không được để trống!<br/>'; 
        }


        if($func_type=='add') {
            if(empty($alert_user_to)){
                $error.='Chư chọn thành viên nhận thông báo!<br/>';
            }

            for ($i = 0; $i < sizeof($alert_user_to); $i++) {
                $item_user_send = $alert_user_to[$i];
                if ($error == '') {
                    if ($func_type == 'add') {
                        $query_add_user = mysqli_query($link,"INSERT INTO `work_notification` (`contain`, `user_to`, `user_send`, `is_see`, `dates`) VALUES ('$alert_contain', '$item_user_send', '$alert_user_send',0,NOW());");
                        if ($query_add_user) {

                        } else {
                            $error .= 'Không thêm được tác vụ - lỗi:' . mysql_error() . '<br/>';
                        }
                    }
                }
            }
        }else{
            $query_update_alert=mysqli_query($link,"UPDATE `work_notification` SET  `contain` = '$alert_contain',`user_to` = '$alert_user_to', `user_send` = '$alert_user_send', `is_see` = '$is_see', `dates` = NOW() WHERE `id` = '$id_edit';");
        }
        
        
        if($error==''){
            if($func_type=='add'){
                echo alert('Thêm thông báo thành công!!!','alert');
            }else{
               echo alert('Cập nhật thông báo thành công !!!','alert'); 
            }
        }else{
            echo alert($error,'error'); 
        }
    }
    ?>
        <form class="box_form_add_chat" method="post" action="" style="width: 500;">
            <div class="row line">
                <?php
                if($sub_view=='add'){?>
                    <strong> <i class="fas fa-plus-square"></i> Tạo thông báo cho nhân viên</strong><br />
                <?php }else{?>
                    <strong> <i class="fas fa-edit"></i> Chỉnh sửa thông báo</strong><br />
                <?php }?>
                <i style="font-size:10px;">Giúp các thành viên biết tin tức và sự kiện</i>
            </div>
            
            <div class="row line">
                <label>Nội dung</label>
                <textarea style="width: 100%;height: 300px;" name="alert_contain"><?php echo $alert_contain;?></textarea>
            </div>

            <?php if($sub_view=='add'){?>
            <div class="row line">
                <label style="width: 100%;float: left;">Thành viên nhận thông báo</label>
                    <?php
                    $query_all_user=mysqli_query($link,"SELECT * FROM `work_user`");
                    while($row_user_info=mysqli_fetch_array($query_all_user)){ 
                    ?>
                    <span style="width: 40%;float: left;">
                    <input type="checkbox" name="alert_user_to[]" value="<?php echo $row_user_info['user_id']; ?>" /> <?php echo box_user_info($link,$row_user_info['user_id'],'20'); ?>
                    </span>
                    <?php
                    }
                    ?>
                <input type="hidden" name="alert_user_send" value="<?php echo $data_user['user_id'];?>" />
            </div>
            <?php } ?>

            <?php if($sub_view=='edit'){?>
                <div class="row line">
                    <label style="width: 100%;float: left;">Thành viên gửi thông báo</label>
                    <select name="alert_user_to">
                        <?php
                        $query_all_user=mysqli_query($link,"SELECT * FROM `work_user`");
                        while($row_user_info=mysqli_fetch_array($query_all_user)){
                            ?>
                            <option value="<?php echo $row_user_info['user_id'];?>" <?php if($alert_user_to==$row_user_info['user_id']){?>selected="true"<?php }?>><?php echo $row_user_info['user_name'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row line">
                    <label style="width: 100%;float: left;">Thành viên gửi thông báo</label>
                    <select name="alert_user_send">
                        <?php
                        $query_all_user=mysqli_query($link,"SELECT * FROM `work_user`");
                        while($row_user_info=mysqli_fetch_array($query_all_user)){
                            ?>
                            <option value="<?php echo $row_user_info['user_id'];?>" <?php if($alert_user_send==$row_user_info['user_id']){?>selected="true"<?php }?>><?php echo $row_user_info['user_name'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row line">
                    <label style="width: 100%;float: left;">Trạng thái</label>
                    <select name="alert_status">
                        <option value="0" <?php if($is_see=='0'){?>selected="true"<?php }?>>Chưa đọc</option>
                        <option value="1" <?php if($is_see=='1'){?>selected="true"<?php }?>>đã đọc</option>
                    </select>
                </div>
            <?php } ?>
            
            <div class="row">
                <label>&nbsp;</label>
                <input type="submit" class="buttonPro green" value="Hoàn tất" />
            </div>
            
            <div class="row">
                <input type="hidden" name="func" value="<?php echo $func_type; ?>" />
                <input type="hidden" name="sub_show" value="<?php echo $sub_view;?>>" />
                <input type="hidden" name="page_show" value="manager_alert" />
                <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
            </div>
        </form>
        <script>
        function add_link(){
            $("#list_link").append("<?php echo show_row_link(''); ?>")
        }
        </script>
    <?php
    

}else{
    
    $id_delete='';
    if(isset($_GET['delete'])){
        $id_delete=$_GET['delete'];
        $query_delete=mysqli_query($link,"DELETE FROM `work_notification` WHERE ((`id` = '$id_delete'));");
        if($query_delete){
            echo alert("Xóa thành thông báo (id:".$id_delete.")",'alert');
        }else{
            echo alert("Xóa không thành công thông báo (id:".$id_delete.")",'error');
        }
    }
    
    if($data_user['user_role']=='admin'){
        $query_tasks=mysqli_query($link,"SELECT * FROM `work_notification` ORDER BY `id` DESC");
    }else{
        $query_tasks=mysqli_query($link,"SELECT * FROM `work_notification` WHERE `user_to`='".$data_user['user_id']."' ORDER BY `id` DESC");
    }
    ?>
    <table>
    <tr>
        <th>ID</th>
        <th >Nội dung</th>
        <th>Trạng thái</th>
        <th>Thời gian</th>
        <th>Người nhận</th>
        <th>Người gửi</th>
        <?php if($data_user['user_role']=='admin'){?><th>Tác vụ</th><?php }?>
    </tr>
    <?php
    while($row_alert=mysqli_fetch_array($query_tasks)){
    ?>
    <tr>
        <td><?php echo $row_alert['id']; ?></td>
        <td style="width: 50%"><?php echo nl2br($row_alert['contain']); ?></td>
        <td>
            <?php
                if($row_alert['is_see']=='0'){
                    echo '<i class="far fa-eye"></i> chưa đọc';
                }else{
                    echo '<i class="fas fa-eye"></i> đã đọc';
                }
            ?>
        </td>
        <td><?php echo $row_alert['dates']; ?></td>
        <td><?php echo box_user_info($link,$row_alert['user_to']); ?></td>
        <td><?php echo box_user_info($link,$row_alert['user_send']); ?></td>
        <?php
        if($data_user['user_role']=='admin'){
        ?>
        <td>
            <a href="<?php echo $url;?>/?page_show=manager_alert&delete=<?php echo $row_alert['id']; ?>" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>
            <a href="<?php echo $url;?>/?page_show=manager_alert&sub_show=edit&id_edit=<?php echo $row_alert['id']; ?>" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>
        </td>
        <?php
        }
        ?>
    </tr>
    <?php
    }
    ?>
    </table>
    <?php 
}
?>
