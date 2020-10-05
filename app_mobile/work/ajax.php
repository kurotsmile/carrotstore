<?php
include "config.php";
include "database.php";
include "function.php";

$func=$_POST['function'];

if($func=='save_order'){
    $arr_help_id=json_decode($_POST['arr_id_help']);
    for($i=0;$i<sizeof($arr_help_id);$i++){
        $query_update_order=mysqli_query($link,"UPDATE `work_help` SET `orders` = '$i' WHERE `id` = '".$arr_help_id[$i]."';");
    }
    echo "Lưu lại thứ tự các sách thành công!";
}


if($func=='comment'){
    $id=$_POST["id"];
    $user_id=$_POST['user_id'];
    $content=addslashes($_POST["content"]);
    $task_id=$_POST['task_id'];
    $created=$_POST["created"];
    $task_user=$_POST['task_user'];
    $upvote_count=$_POST['upvote_count'];
    $parent=$_POST['parent'];
    $query_add_comment=mysqli_query($link,"INSERT INTO `work_task_comment` (`id_comment`, `user_id`, `comment`, `task_id`, `created`,`upvote_count`,`parent`) VALUES ('$id', '$user_id', '$content', '$task_id', '$created','$upvote_count','$parent');");
    if($query_add_comment){
        $alert_contain=get_full_name_user_by_id($user_id).' Đã bình luận về tác vụ của bạn <a class="buttonPro small blue" href="'.$url.'/task/'.$task_id.'"><i class="fas fa-comments"></i> Xem bình luận</a>';
        $query_add_alert= mysqli_query($link,"INSERT INTO `work_notification` (`contain`, `user_to`, `user_send`, `is_see`, `dates`) VALUES ('$alert_contain', '$task_user', '$user_id',0,NOW());");
    }
}

if($func=='votecomment'){
    $id=$_POST["id"];
    $task_id=$_POST['task_id'];
    $task_user=$_POST['task_user'];
    $user_id=$_POST['user_id'];
    $upvote_count=$_POST['upvote_count'];
    echo 'Đã bầu cử'.$upvote_count;
    $query_vote_comment=mysqli_query($link,"UPDATE `work_task_comment` SET  `upvote_count` = '$upvote_count' WHERE `id_comment` = '$id' AND `task_id` = '$task_id'");
    if($query_vote_comment){
        $alert_contain=get_full_name_user_by_id($user_id).' đề cử hữu ích một bình luận của tác vụ của bạn <a class="buttonPro small blue" href="'.$url.'/task/'.$task_id.'"><i class="fas fa-heart"></i> Xem bình luận</a>';
        $query_add_alert= mysqli_query($link,"INSERT INTO `work_notification` (`contain`, `user_to`, `user_send`, `is_see`, `dates`) VALUES ('$alert_contain', '$task_user', '$user_id',0,NOW());");
    }
}

if($func=='delete_work'){
    $id=$_POST['id'];
    $user=$_POST['user'];
    $query_delete=mysqli_query($link,"DELETE FROM `work_chat` WHERE (`id` = '$id' AND `user_name`='$user');");
}

if($func=='submit_report_work'){
    $id_chat=$_POST['id_chat'];
    $type_chat=$_POST['type_chat'];
    $user_work=$_POST['user_work'];
    $lang_chat=$_POST['lang_chat'];
    $type_action=$_POST['type_action'];
    $date_cur=date("Y-m-d");
    if($_POST['func']=='add'){
        $mysql_query_add=mysqli_query($link,"INSERT INTO `work_chat` (`id_chat`, `type_chat`, `user_name`,`type_action`,`lang_chat`, `dates`) VALUES ('$id_chat', '$type_chat', '$user_work','$type_action','$lang_chat','$date_cur')");
    }else{
        $report_id=$_POST['report_id'];
        $mysql_query_update=mysqli_query($link,"UPDATE `work_chat` SET `id_chat` = '$id_chat',`type_chat` = '$type_chat',`lang_chat` = '$lang_chat',`type_action` = '$type_action' WHERE `id` = '$report_id';");
    }
    echo mysqli_error($link);
    $user_name=$user_work;
    $user_role='admin';
    include "template_table_work.php";
}


if($func=='get_salary'){
    $view_by_user=$_POST['user_work'];
    $query_parameter=mysqli_query($link,"SELECT `key`,`price` FROM `work_report_parameters`");
    $total=0;
    $total_task=0;
    while($row_parameter=mysqli_fetch_array($query_parameter)){
        $query_chat_type=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `work_chat` WHERE `type_chat` = '".$row_parameter['key']."' AND `user_name` = '$view_by_user'");
        $data_count=mysqli_fetch_array($query_chat_type);
        $s=intval($data_count['c'])*intval($row_parameter['price']);
        $total_task=$total_task+intval($data_count['c']);
        $total=$total+$s;
    }
    $total_salary=number_format($total).'₫';
    echo '{"salary":"'.$total_salary.'", "total_task":'.$total_task.'}';
}
mysqli_close($link);
?>