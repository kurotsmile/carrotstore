<?php
include "page_template.php";
$view_by_user_date=$_GET['dates'];
$view_by_user=$_GET['user'];
$user_login_role=$data_user['user_role'];
$mysql_query_chat=mysqli_query($link,"SELECT * FROM `work_chat` WHERE `user_name` = '$view_by_user' AND `dates` = '$view_by_user_date' ORDER BY `id` DESC LIMIT 500");
?>
<div style="float: left;width: 100%;">
<div class="box_form_add_chat" style="width: auto;margin-left: 5px;">
    <div class="row line">
        <strong><i class="fas fa-clipboard-check"></i> Các tác vụ đã làm</strong><br />
        <i style="font-size:10px;"><b style="color: red;"><?php echo $view_by_user;?></b> đã hoàn thành <b style="color: red;"><?php echo mysqli_num_rows($mysql_query_chat);?></b> tác vụ trong ngày <b style="color: red;"><?php echo $view_by_user_date;?></i></b>
    </div>
    
<div class="row line">   
<?php
   if(mysqli_num_rows($mysql_query_chat)>0){
?>
<table class="table_work" style="background-color: white;">
    <tr>
        <th>Id</th>
        <th>Loại</th>
        <th>Nước</th>
        <th>Thành viên</th>
        <th>Thao tác</th>
        <th>Ngày</th>
        <th>Tác vụ</th>
    </tr>

    
    <?php
           $query_list_parameters = mysqli_query($link,"SELECT `key`,`url_action` FROM `work_report_parameters`");
           $obj_para=new stdClass();
           while($row_para=mysqli_fetch_assoc($query_list_parameters)){
               $obj_para->{$row_para['key']}=$row_para['url_action'];
           }

        while($row=mysqli_fetch_array($mysql_query_chat)){
            ?>
            <tr>
                <td><?php echo $row['id_chat'];?></td>
                <td><?php echo $row['type_chat'];?></td>
                <td><?php echo $row['lang_chat'];?></td>
                <td><?php echo $row['user_name'];?></td>
                <td><?php echo $row['type_action'];?></td>
                <td><?php echo $row['dates'];?></td>
                <td>
                    <?php  echo btn_go_to_obj($link,$row['id_chat'],$row['type_chat'],$row['lang_chat'],$obj_para);?>
                    <a target="_blank" href="<?php echo $url?>?page_show=manager_report&id=<?php echo $row['id'];?>&username=<?php echo $row['user_name'];?>" class="buttonPro small red" onclick="$(this).addClass('black');"><i class="fas fa-bug"></i> Báo lỗi</a>
                    <?php if($user_login_role=='admin'){?>
                        <a target="_blank" onclick="delete_work(this,'<?php echo $row['id'];?>','<?php echo $row['user_name'];?>');return false;" class="buttonPro small red" onclick="$(this).addClass('black');"><i class="fas fa-trash-alt"></i> Xóa</a>
                    <?php } ?>
                </td>
            </tr>
            <?php
        }
    ?>
    
</table>
<?php

    }else{
        echo '<p><i class="far fa-frown"></i> <strong> Không có dữ liệu !</strong></p>';
    }
?>
</div>
</div>
</div>

<script>
    function delete_work(emp,id,user){
        $(emp).html('<i class="fa fa-spinner" aria-hidden="true"></i> Đang xử lý...');
        $.ajax({
            type: 'post',
            url: '<?php echo $url;?>/ajax.php',
            data: {'function': 'delete_work','id':id,'user':user},
            success: function(data) {
                $(emp).parent().parent().remove();
            },
        });
    }
</script>