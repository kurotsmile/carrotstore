<?php
include "page_template.php";
$task_id=$_GET['id'];
$query_task=mysqli_query($link,"SELECT * FROM `work_task` WHERE `id` = '$task_id' LIMIT 1");
$data_task=mysqli_fetch_array($query_task);
?>
<form class="box_form_add_chat" style="margin-left: 5px;width: 450px;" method="post" >
    <div class="row line">
        <strong style="font-size: 16px;"><i class="fas fa-flask"></i> Thông tin tác vụ</strong>
    </div>
    <div class="row line">
        <label><i class="far fa-file-alt"></i> Nội dung:</label>
        <p>
            <?php echo $data_task['contain']; ?>
        </p>
    </div>
    <?php
    if($data_task['links']!='') {
        ?>
        <div class="row line">
            <label><i class="fas fa-link"></i> Liên kết:</label>
            <ul id="task_list_link">
            <?php
            $list_link=(array)json_decode($data_task['links']);
            for($i=0;$i<sizeof($list_link);$i++){
                echo '<li><a style="width:100%;float:left;min-width: 90px;" target="_blank" href="'.$list_link[$i].'" title="Nhất vào để đi đến liên kết"><i class="fas fa-link"></i> Liên kết '.($i+1).'</a></li>';
            }?>
            </ul>
        </div>
        <?php
    }
    ?>
    <div class="row line">
        <label><i class="fas fa-thermometer-three-quarters"></i> Cấp độ ưu tiên thực hiện:</label>
        <?php
        if($data_task['type']=="0"){ echo '<i style="color:red" class="fas fa-thumbtack"></i> Cao';}
        if($data_task['type']=="1"){ echo '<i style="color:#ffa46d" class="fas fa-thumbtack"></i> Trung bình';}
        if($data_task['type']=="2"){ echo '<i style="color:#bba668" class="fas fa-thumbtack"></i> Thấp';}
        ?>
    </div>
    <div class="row line">
        <label><i class="fas fa-clipboard-check"></i> Trạng thái thực hiện:</label>
        <?php
        if($data_task['status']=='0'){echo '<i class="far fa-life-ring fa-pulse"></i> Đang thực thi';}
        if($data_task['status']=='1'){echo '<i class="fas fa-exclamation-circle"></i> Tạm hoãn';}
        if($data_task['status']=='2'){echo '<i class="fas fa-clipboard-check"></i> Hoàn tất';}
        if($data_task['status']=='3'){echo '<i class="fas fa-hourglass-start"></i> Chờ xác nhận';}
        ?>
    </div>
    <div class="row line">
        <label><i class="fas fa-user"></i> Người thực hiện:</label>
        <?php if(trim($data_task['user_work'])=='0'){ echo '<i class="fas fa-users" aria-hidden="true"></i> Tất cả';}else{ echo box_user_info($link,$data_task['user_work']);}; ?>
    </div>
    <div class="row line">
        <label><i class="far fa-user"></i> Người tạo ra tác vụ:</label>
        <?php
            echo box_user_info($link,$data_task['user_send']);
        ?>
    </div>
    <div class="row line">
        <label><i class="fas fa-calendar"></i> Ngày bắt đầu thực hiện:</label><?php echo $data_task['dates']; ?>
    </div>
    <div class="row line">
        <label><i class="fas fa-clock"></i> Ngày dự kiến hoàn thành:</label>
        <?php
            if($data_task['deadline']==''){
                echo 'Chưa xác định';
            }else{
                echo $data_task['deadline'];
            }
        ?>
    </div>

    <?php
    $key_parameter=$data_task['report_parameters'];
    if($key_parameter!=''){
        $query_parameter=mysqli_query($link,"SELECT `key`, `name`, `price` FROM `work_report_parameters` WHERE `key` = '$key_parameter' LIMIT 1");
        $data_parameter=mysqli_fetch_array($query_parameter);
    ?>
        <div class="row line">
            <label><i class="fas fa-paragraph" aria-hidden="true"></i> Tham số báo cáo:</label> <?php echo $data_parameter['name']; ?>
        </div>

        <div class="row line">
            <label><i class="fas fa-dollar-sign"></i> Giá mỗi tác vụ:</label><?php echo $data_parameter['price']; ?>
        </div>
    <?php }?>

    <div class="row line">
        <?php
        if($data_user['user_role']=='admin'){
            ?>
                <a href="<?php echo $url;?>/?page_show=manager_task&sub_show=add&id_edit=<?php echo $data_task['id']; ?>" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa công việc</a>
                <?php if($key_parameter!=''){?><a target="_blank" href="<?php echo $url;?>/?page_show=tool_report_parameters&key=<?php echo $data_parameter['key'];?>" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa tham số báo cáo</a><?php }?>
                <a href="<?php echo $url;?>/?page_show=manager_task&delete=<?php echo $data_task['id']; ?>" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>
            <?php
        }
        ?>
    </div>
</form>
<script type="text/javascript" src="<?php echo $url;?>/js/jquery-comments.js"></script>
<form class="box_form_add_chat" style="margin-left: 5px;width: 500px;" method="post" >
    <div class="row line">
        <strong style="font-size: 16px;"><i class="fas fa-comments"></i> Bình luận</strong><br/>
        <i>Nếu các thành viên muốn đóng góp ý tưởng về tác vụ này hoặc chưa hiểu , có thắc mắc về tác vụ thì hãy bình luận vào đây để trao đổi với người tạo ra tác vụ</i>
    </div>

    <div id="contain_comment">
        Bình luận
    </div>
</form>
<script>
    $('#contain_comment').comments({
        profilePictureURL: '<?php echo get_url_avatar_user($data_user['user_id'],'40x40'); ?>',   textareaPlaceholderText: 'Nhập bình luận của bạn vào đây!',
        sendText: 'đăng bình luận',
        replyText: 'Trả lời',
        newestText: 'Mới nhất',
        oldestText: 'Cũ nhất',
        popularText: 'Phổ biến nhất',
        noCommentsText: 'Chưa có bình luận!',
        enableAttachments: true,
        enableHashtags: true,
        getComments: function(success, error) {
            var commentsArray = [
                <?php
                    $query_comment_task=mysqli_query($link,"SELECT * FROM `work_task_comment` WHERE `task_id` = '$task_id'");
                    while ($row_comment=mysqli_fetch_array($query_comment_task)){
                        echo '{';
                        echo  "id:'".$row_comment['id_comment']."',";
                        echo  "created:'".$row_comment['created']."',";
                        echo  "content:'".$row_comment['comment']."',";
                        echo  "fullname:'".get_full_name_user_by_id($row_comment['user_id'])."',";
                        echo  "profile_picture_url:'".get_url_avatar_user($row_comment['user_id'])."',";
                        echo  "upvote_count:'".$row_comment['upvote_count']."',";
                        echo  "user_has_upvoted: false,";
                        echo '},';
                    }
                ?>
           ];
            success(commentsArray);
        },
        postComment: function(commentJSON, success, error) {
            commentJSON["task_id"] = '<?php echo $task_id;?>';
            commentJSON["user_id"] = '<?php echo $data_user['user_id'];?>';
            commentJSON["task_user"] = '<?php echo $data_task['user_work'];?>';
            commentJSON["function"] = 'comment';
            $('#loading').fadeIn(200);
            $.ajax({
                type: 'post',
                url: '<?php echo $url;?>/ajax.php',
                data: commentJSON,
                success: function(comment) {
                    $('#loading').fadeOut(200);
                },
            });
            success(commentJSON);
        },

        upvoteComment: function(commentJSON, success, error) {
            commentJSON["task_id"] = '<?php echo $task_id;?>';
            commentJSON["user_id"] = '<?php echo $data_user['user_id'];?>';
            commentJSON["task_user"] = '<?php echo $data_task['user_work'];?>';
            commentJSON["function"] = 'votecomment';
            $('#loading').fadeIn(200);
            $.ajax({
                type: 'post',
                url: '<?php echo $url;?>/ajax.php',
                data: commentJSON,
                success: function(comment) {
                    $('#loading').fadeOut(200);
                },
            });
        },
    });
</script>
