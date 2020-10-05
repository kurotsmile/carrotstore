<?php
include "page_template.php";
$sub_view='';
$user_id_view='';
$url_p=$url.'/?page_show=manager_task';

if(isset($_GET['user_id'])){
    $user_id_view=$_GET['user_id'];
    $url_p.='&user_id='.$user_id_view;
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
    $url_p.='&sub_show='.$sub_view;
}
if(isset($_POST['sub_show'])){
    $sub_view=$_GET['sub_show'];
    $url_p.='&sub_show='.$sub_view;
}

?>
<h2> <i class="fas fa-flask"></i> Quản lý tác vụ</h2>
<?php if($sub_view==''){?>
<ul class="page_sub_menu">
    <?php if($data_user['user_role']=='admin'){?><li><a href="<?php echo $url;?>/?page_show=manager_task&sub_show=add" class="buttonPro small green"><i class="fas fa-plus-square"></i> Thêm tác vụ</a></li><?php }?>
    
    <?php if($user_id_view==''){?>
    <li><a href="<?php echo $url;?>/?page_show=manager_task&sub_show=view&type=0" class="buttonPro small"><i style="color:red" class="fas fa-thumbtack"></i> Cao</a></li>
    <li><a href="<?php echo $url;?>/?page_show=manager_task&sub_show=view&type=1" class="buttonPro small"><i style="color:#ffa46d" class="fas fa-thumbtack"></i> Trung bình</a></li>
    <li><a href="<?php echo $url;?>/?page_show=manager_task&sub_show=view&type=2" class="buttonPro small"><i style="color:#bba668" class="fas fa-thumbtack"></i> Thấp</a></li>

    <li><a href="<?php echo $url;?>/?page_show=manager_task&sub_show=view&status=0" class="buttonPro small"><i class="far fa-life-ring fa-pulse"></i> Thực hiện</a></li>
    <li><a href="<?php echo $url;?>/?page_show=manager_task&sub_show=view&status=1" class="buttonPro small"><i class="fas fa-exclamation-circle"></i>Tạm hủy</a></li>
    <li><a href="<?php echo $url;?>/?page_show=manager_task&sub_show=view&status=2" class="buttonPro small"><i class="fas fa-clipboard-check"></i> Hoàn tất</a></li>
    <?php }?>
</ul>
<?php }else{?>
<ul class="page_sub_menu">
    <li><a href="<?php echo $url;?>/?page_show=manager_task" class="buttonPro small blue"><i class="fas fa-chevron-circle-left"></i> Trở về</a></li>
</ul>
<?php 
}

if($sub_view=='add'){
    $func_type='add';
    $task_contain='';
    $task_type='';
    $task_status='';
    $task_user_work='';
    $task_user_send=$data_user['user_id'];
    $task_deadline='';
    $task_report_parameters='';
    $arr_link='';
    
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
        $task_contain='';
        $task_type='';
        $task_status='';
        $task_user_work='';
    }else{
        $query_task_edit=mysqli_query($link,"SELECT * FROM `work_task` WHERE `id` = '$id_edit' LIMIT 1");
        $data_task_edit=mysqli_fetch_array($query_task_edit);
        $task_contain=$data_task_edit['contain'];
        $task_type=$data_task_edit['type'];
        $task_status=$data_task_edit['status'];
        $task_user_work=$data_task_edit['user_work'];
        $task_user_send=$data_task_edit['user_send'];
        $arr_link=$data_task_edit['links'];
        $task_deadline=$data_task_edit['deadline'];
        $task_report_parameters=$data_task_edit['report_parameters'];
    }
    
    if(isset($_POST['task_contain'])){
        $error='';
        $task_contain=$_POST['task_contain'];
        $task_type=$_POST['task_type'];
        $task_status=$_POST['task_status'];
        $task_user_work=$_POST['task_user_work'];
        $task_user_send=$_POST['task_user_send'];
        $task_deadline=$_POST['task_deadline'];
        $task_report_parameters=$_POST['report_paramenter'];

        $arr_link='';
        
        if(isset($_POST['links'])){
            $arr_link=json_encode($_POST['links']);
        }
        
        if($task_contain==''){
            $error.='Nội dung tác vụ không được để trống!<br/>'; 
        }

        if($error==''){
            if($func_type=='add'){
                $query_add_user=mysqli_query($link,"INSERT INTO `work_task` (`contain`, `type`, `status`, `dates`, `user_work`,`user_send`,`links`,`deadline`,`report_parameters`) VALUES ('$task_contain', '$task_type', '$task_status',NOW(), '$task_user_work', '$task_user_send','$arr_link','$task_deadline','$task_report_parameters');");
                if($query_add_user){
                    $task_contain='';
                    $task_type='';
                    $task_status='';
                    $task_user_work='';
                }else{
                    $error.='Không thêm được tác vụ - lỗi:'.mysql_error().'<br/>';
                }
            }else{
               $query_update=mysqli_query($link,"UPDATE `work_task` SET  `contain` = '$task_contain', `type` = '$task_type', `status` = '$task_status', `user_work` = '$task_user_work' ,`user_send`='$task_user_send',`links`='$arr_link',`deadline`='$task_deadline',`report_parameters`='$task_report_parameters' WHERE `id` = '$id_edit';");
               if($query_update){
               }else{
                  $error.='Không thể cập nhật tác vụ - lỗi:'.mysql_error().'<br/>';  
               }
            }
        }
        
        
        if($error==''){
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
    <script>
        $(document).ready(function() {
            $("#task_deadline").datepicker();
            $("#task_deadline").datepicker("option", "dateFormat", "yy-mm-dd");
        });
    </script>

        <form class="box_form_add_chat" method="post" action="" style="width: 500;">
            <div class="row line">
                <strong> <i class="fas fa-plus-square"></i> Tạo tác vụ cho nhân viên</strong><br />
                <i style="font-size:10px;">Giao việc cho nhân viên</i>
            </div>
            
            <div class="row line">
                <label>Nội dung</label>
                <textarea style="width: 100%;height: 300px;" name="task_contain"><?php echo $task_contain;?></textarea>
            </div>
            
            <div class="row line">
                <label>Liên kết</label>
                <div id="list_link" style="width: 100%;float:left;">
                <?php
                if($arr_link!=''){
                    $list_link=(array)json_decode($arr_link);
                    for($i=0;$i<sizeof($list_link);$i++){
                        echo show_row_link($list_link[$i]);
                    }
                    
                }
                ?>
                </div>
                <span class="buttonPro small light_blue" onclick="add_link();return false;"><i class="fas fa-plus-circle"></i> Thêm liên kết</span>
            </div>
            
            <div class="row line">
                <label>Cấp độ ưu tiên</label>
                <select name="task_type">
                    <option value="0" <?php if($task_type=='0'){?>selected="true"<?php }?>>cao</option>
                    <option value="1" <?php if($task_type=='1'){?>selected="true"<?php }?>>trung bình</option>
                    <option value="2" <?php if($task_type=='2'){?>selected="true"<?php }?>>thấp</option>
                </select>
            </div>
            
            <div class="row line">
                <label>Trạng thái</label>
                <select name="task_status">
                    <option value="0" <?php if($task_status=='0'){?>selected="true"<?php }?>>Thực hiện</option>
                    <option value="1" <?php if($task_status=='1'){?>selected="true"<?php }?>>Tạm hủy</option>
                    <option value="2" <?php if($task_status=='2'){?>selected="true"<?php }?>>Hoàn tất</option>
                    <option value="3" <?php if($task_status=='3'){?>selected="true"<?php }?>>Chờ xác nhận hoàn tất</option>
                </select>
            </div>
            
            <div class="row line">
                <label>Nhân viên thực hiện</label>
                <select name="task_user_work">
                    <option value="0" <?php if($task_user_work=='0'){?>selected="true"<?php }?>>Tất cả</option>
                    <?php
                    $query_all_user=mysqli_query($link,"SELECT * FROM `work_user`");
                    while($row_user_info=mysqli_fetch_array($query_all_user)){ 
                    ?>
                        <option value="<?php echo $row_user_info['user_id']; ?>" <?php if($task_user_work==$row_user_info['user_id']){?>selected="true"<?php }?>><?php echo $row_user_info['user_name']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="row line">
                <label>Ngày dự kiến hoàn tất</label>
                <?php echo $task_deadline;?>
                <input name="task_deadline" value="<?php echo $task_deadline;?>" id="task_deadline">
            </div>

         <div class="row line">
                <label>Tham số báo cáo</label>
                <select name="report_paramenter">
                    <option value="">Không sử dụng</option>
                    <?php
                    $query_paramenter=mysqli_query($link,"SELECT `key`, `name` FROM `work_report_parameters`");
                    while($paramenter=mysqli_fetch_array($query_paramenter)){
                    ?>
                    <option value="<?php echo  $paramenter['key'];?>" <?php if($task_report_parameters==$paramenter['key']){?>selected="true"<?php }?>><?php echo $paramenter['name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        
            
            <div class="row">
                <label>&nbsp;</label>
                <input type="submit" class="buttonPro green" value="Hoàn tất" />
            </div>
            
            <div class="row">
                <input type="hidden" name="func" value="<?php echo $func_type; ?>" />
                <input type="hidden" name="sub_show" value="add" />
                <input type="hidden" name="page_show" value="manager_task" />
                <input type="hidden" name="task_user_send" value="<?php echo $data_user['user_id'];?>" />
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
        $query_delete=mysqli_query($link,"DELETE FROM `work_task` WHERE ((`id` = '$id_delete'));");
        if($query_delete){
            echo alert("Xóa thành công tác vụ (id:".$id_delete.")",'alert');
        }else{
            echo alert("Xóa không thành công tác vụ (id:".$id_delete.")",'error');
        }
    }
    
    $query_type='';
    if(isset($_GET['type'])){
        $type_task=$_GET['type'];
        $query_type=' AND `type`='.$type_task.' ';
        $url_p.='&type='.$type_task;
    }
    
    $query_status='';
    if(isset($_GET['status'])){
        $status_task=$_GET['status'];
        $query_status=' AND `status`='.$status_task.' ';
        $url_p.='&status='.$status_task;
    }
    
    $txt_query_task='';
    if($user_id_view==''){
        if($data_user['user_role']=='admin'){
            $txt_query_task="SELECT * FROM `work_task` WHERE  1=1 $query_type $query_status ORDER BY `id` DESC";
        }else{
            $txt_query_task="SELECT * FROM `work_task` WHERE  `user_work`='".$data_user['user_id']."' $query_type $query_status ORDER BY `id` DESC";
        }
    }else{
        $txt_query_task="SELECT * FROM `work_task` WHERE `user_work`='$user_id_view' $query_type $query_status ORDER BY `id` DESC";
    }
    
    $query_tasks=mysqli_query($link,$txt_query_task);
    
    if(mysqli_num_rows($query_tasks)>0){
        
        $row_in_page=20;
        $toal_row=mysqli_num_rows($query_tasks);
        $number_page=$toal_row/$row_in_page;
        $page=0;
        if(isset($_GET['page'])){
            $page=intval($_GET['page']);
            $row_statr=intval($_GET['page'])*$row_in_page;
            $row_end=$row_statr+$row_in_page;
            $txt_limit=" limit $row_statr,$row_end";
            $txt_query_task.=" ".$txt_limit;
        }else{
            $txt_limit=" limit 0,$row_in_page";
            $txt_query_task.=" ".$txt_limit;
        }
        
        $query_show_task=mysqli_query($link,$txt_query_task);


    ?>
    
    <div style="float: left;width:100%;background-color: #ACACD7;">
        <div style="padding: 10px;">
        <strong>Trang:</strong>
        <?php
            for($i=0;$i<$number_page;$i++){
                ?>
                <a <?php if($i==$page){ echo 'class="buttonPro small yellow"';}else{ echo 'class="buttonPro small black"'; }?> href="<?php echo $url_p.'&page='.$i;?>"  ><?php echo $i+1;?></a>
                <?php
            }
        ?>
        <span> / trong </span>
        <span><?php echo $toal_row; ?></span>
        <span>nhiệm vụ</span>
        </div>
    </div>
    
    <table class="table_work">
    <tr>
        <th>ID</th>
        <th>Nội dung</th>
        <th>Liên kết</th>
        <th>Cấp độ</th>
        <th>Trạng thái</th>
        <th>Thời gian</th>
        <th>Người thực hiện</th>
        <th>Người giao</th>
        <?php if($data_user['user_role']=='admin'){?><th>Tác vụ</th><?php }?>
    </tr>
    <?php
    while($row_task=mysqli_fetch_array($query_show_task)){
    ?>
    <tr>
        <td>
            <strong style="color: gray;color: gray;font-size: 11px;"><?php echo $row_task['id']; ?></strong>
        </td>
        <td style="width: 50%;"><a href="<?php echo $url;?>/?page_show=task&id=<?php echo $row_task['id'];?>"><?php echo nl2br($row_task['contain']); ?></a></td>
        <td>
        <?php
        if($row_task['links']!=''){
            $list_link=(array)json_decode($row_task['links']);
            for($i=0;$i<sizeof($list_link);$i++){
                echo '<a style="width:100%;float:left;min-width: 90px;" target="_blank" href="'.$list_link[$i].'" title="Nhất vào để đi đến liên kết"><i class="fas fa-link"></i> Liên kết '.($i+1).'</a>';
            }
        }else{
            echo 'Không có liên kết';
        }
        ?>
        </td>
        <td>
        <?php 
        if($row_task['type']=="0"){ echo '<i style="color:red" class="fas fa-thumbtack"></i> Cao';}
        if($row_task['type']=="1"){ echo '<i style="color:#ffa46d" class="fas fa-thumbtack"></i> Trung bình';}
        if($row_task['type']=="2"){ echo '<i style="color:#bba668" class="fas fa-thumbtack"></i> Thấp';}
        ?>
        </td>
        <td>
        <?php 
        if($row_task['status']=='0'){echo '<i class="far fa-life-ring fa-pulse"></i> Đang thực thi';} 
        if($row_task['status']=='1'){echo '<i class="fas fa-exclamation-circle"></i> Tạm hoãn';} 
        if($row_task['status']=='2'){echo '<i class="fas fa-clipboard-check"></i> Hoàn tất';} 
        if($row_task['status']=='3'){echo '<i class="fas fa-hourglass-start"></i> Chờ xác nhận';} 
        ?>
        </td>
        <td style="font-size: 9px;"><?php echo $row_task['dates']; ?></td>
        <td><?php if(trim($row_task['user_work'])=='0'){ echo '<i class="fas fa-users" aria-hidden="true"></i> Tất cả';}else{ echo box_user_info($link,$row_task['user_work']);}; ?></td>
        <td><?php echo box_user_info($link,$row_task['user_send']); ?></td>
        <?php
        if($data_user['user_role']=='admin'){
        ?>
        <td>
            <a href="<?php echo $url;?>/?page_show=manager_task&sub_show=add&id_edit=<?php echo $row_task['id']; ?>" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>
            <a href="<?php echo $url;?>/?page_show=manager_task&delete=<?php echo $row_task['id']; ?>" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>
        </td>
        <?php
        }
        ?>
    </tr>
    <?php
    }
    ?>
    </table>
    
    <div style="float: left;width:100%;background-color: #ACACD7;">
        <div style="padding: 10px;">
        <strong>Trang:</strong>
        <?php
            for($i=0;$i<$number_page;$i++){
                ?>
                <a <?php if($i==$page){ echo 'class="buttonPro small yellow"';}else{ echo 'class="buttonPro small black"'; }?> href="<?php echo $url_p.'&page='.$i;?>"  ><?php echo $i+1;?></a>
                <?php
            }
        ?>
        <span> / trong </span>
        <span><?php echo $toal_row; ?></span>
        <span>nhiệm vụ</span>
        </div>
    </div>
    
    <?php 
    }else{
        echo '<p style="width:100%;padding:10px"><i class="far fa-sticky-note"></i> Chưa có dữ liệu về mục này!</p>';
    }
}
?>
