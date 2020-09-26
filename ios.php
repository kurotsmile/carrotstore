<?php	
include("config.php");
include("database.php");
$function="";

if(isset($_GET['function'])){
	$function=$_GET['function'];
}

if(isset($_POST['function'])){
	$function=$_POST['function'];
}

Class User{
    public $user_name="";
}

Class IOS{
    public $chat_nv="";
    public $chat_user="";
    public $chat_id="";
    public $chat_type="";
	public $chat_fathe_type="";
	public $chat_fathe_text="";
    public $list_user="";
    public $sex_user="";
    public $sex_nv="";
    public $list="";
}

$ios=new IOS;

if($function=='get_key_chat'){
    $sex_nv=$_POST['sex_nv'];
    $sex_user=$_POST['sex_user'];

    $ios->sex_nv=$sex_nv;
    $ios->sex_user=$sex_user;

    $query_chat=mysqli_query($link,"SELECT `key`, `id_question`, `type_question` FROM `app_my_girl_key` WHERE `lang` = 'vi' AND `sex` = '$sex_user' AND `character_sex` = '$sex_nv' ORDER BY RAND() LIMIT 1");
    $data_chat=mysqli_fetch_assoc($query_chat);
    
    $id_chat=$data_chat["id_question"];
    $type_chat=$data_chat["type_question"];
    
    if($type_chat=="chat"){
        $query_fathe=mysqli_query($link,"SELECT `chat`, `id`,`text` as ftext FROM `app_my_girl_vi` WHERE `id` = '$id_chat' ORDER BY `id` LIMIT 1");
        $ios->chat_fathe_type="chat";
    }else{
        $query_fathe=mysqli_query($link," SELECT `id`, `chat`,`func` as ftext FROM `app_my_girl_msg_vi` WHERE `id` = '$id_chat' LIMIT 50");
        $ios->chat_fathe_type="msg";
    }
    $data_fathe=mysqli_fetch_assoc($query_fathe);
   	$ios->chat_nv=$data_fathe["chat"];
   	$ios->chat_user=$data_chat["key"];
   	$ios->chat_id=$id_chat;
    $ios->chat_type=$type_chat;
    $ios->chat_fathe_text=$data_fathe["ftext"];
	echo json_encode($ios);
}

if($function=='add_chat'){
    $txt_chat=$_POST["chat"];
    $txt_text=$_POST["text"];
    $type_add=$_POST["type_add"];
    $status_chat=$_POST["status_chat"];
    $id_chat="";
    $type_chat="";
    $effect_id="";
    $effect_color="";
    $face=$_POST["face"];
    $limit=$_POST["limit"];
    $action=$_POST['action'];
    $func_app=$_POST['function_app'];
    $sex_nv=$_POST['sex_nv'];
    $sex_user=$_POST['sex_user'];
    
    if($type_add=="local"){
        $id_chat=$_POST["id_chat"];
        $type_chat=$_POST["type_chat"];
    }
    
    $icon=$_POST["icon"];
    if($icon=="random"){
        $query_icon=mysqli_query($link,"SELECT `id`, `color` FROM `app_my_girl_effect` WHERE `tag` = 'chat' ORDER BY RAND() LIMIT 1");
        $data_icon=mysqli_fetch_assoc($query_icon);
        $effect_id=$data_icon["id"];
        $effect_color=$data_icon["color"];
    }else{
        $effect_id=$_POST["icon"];
        $effect_color=$_POST["color"];
    }
    
    $query_add=mysqli_query($link,"INSERT INTO `app_my_girl_vi` (`text`, `chat`, `status`, `sex`, `color`,`effect`, `action`, `face`, `author`, `character_sex`, `pater`, `pater_type`, `limit_chat`, `effect_customer`, `func_sever`, `disable`, `user_create`) VALUES ('$txt_text', '$txt_chat', '$status_chat', '$sex_user', '$effect_color','$func_app','$action', '$face', 'vi','$sex_nv' ,'$id_chat', '$type_chat', '$limit','$effect_id', '','0','2');");
    if($query_add){
        $date_view=date("Y-m-d");
        $id_new_chat=mysqli_insert_id($link);
        $query_add_work=mysqli_query($link,"INSERT INTO carrotsy_work.`work_chat` (`id_chat`, `type_chat`, `lang_chat`, `user_name`, `type_action`, `dates`) VALUES ('$id_new_chat', 'chat', 'vi', 'kurotsmile', 'add', '$date_view');");
    }
}

if($function=='get_work'){
 $sel_date=$_POST['sel_date'];
 $ios->list_user=array();
 $query_work=mysqli_query($link,"SELECT `user_name` FROM carrotsy_work.`work_user`");
 while($user=mysqli_fetch_assoc($query_work)){
    $user_name=$user['user_name'];
    if($sel_date=='today'){
        $date_view=date("Y-m-d");
        $query_count_user=mysqli_query($link,"SELECT COUNT(`id`) as c FROM carrotsy_work.`work_chat` WHERE `user_name` = '$user_name' AND `dates` = '$date_view' LIMIT 1");
    }elseif($sel_date=='yesterday'){
        $date_view=date("Y-m-d",strtotime("-1 days"));
        $query_count_user=mysqli_query($link,"SELECT COUNT(`id`) as c FROM carrotsy_work.`work_chat` WHERE `user_name` = '$user_name' AND `dates` = '$date_view' LIMIT 1");
    }else{
        $query_count_user=mysqli_query($link,"SELECT COUNT(`id`) as c FROM carrotsy_work.`work_chat` WHERE `user_name` = '$user_name'  LIMIT 1");
    }
    $data_count=mysqli_fetch_assoc($query_count_user);
    
    if($data_count['c']!='0'){
        $user=new User;
        $user->user_name=$user_name.' ('.$data_count['c'].')';
        array_push($ios->list_user,$user);
    }
 }
 echo json_encode($ios->list_user);
}

if($function=='get_list_country'){
    $ios->list=array();
    $query_list_country=mysqli_query($link,"SELECT `key`, `id` FROM `app_my_girl_country`");
    while ($c=mysqli_fetch_assoc($query_list_country)) {
        array_push($ios->list,$c['key']);
    }
    echo json_encode($ios);
}

if($function=='check_data'){
    $lang_sel=$_POST['lang_sel'];
    $sex_nv=$_POST['sex_nv'];
    $sex_user=$_POST['sex_user'];
    $query_check_data=mysqli_query($link,"SELECT `question`, `answer`, `md5`, `user_work_id`,`id_question`,`type_question` FROM `app_my_girl_brain` WHERE `langs` = '$lang_sel' AND `tick` = '0' AND `character_sex`='$sex_nv' AND `sex`='$sex_user' ORDER BY RAND() LIMIT 1");
    $data_check=mysqli_fetch_assoc($query_check_data);
    $ios->chat_fathe_type=$data_check['type_question'];
    if(trim($data_check['id_question'])!=''){
        $id_question=$data_check['id_question'];
        $query_fathe='';
        if($ios->chat_fathe_type=='chat'){
            $query_fathe=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_question' LIMIT 1");
        }else{
            $query_fathe=mysqli_query($link,"SELECT `chat` FROM `app_my_girl_msg_$lang_sel` WHERE `id` = '$id_question' LIMIT 1");
        }
        $data_fathe=mysqli_fetch_assoc($query_fathe);
        $ios->chat_fathe_text=$data_fathe['chat'];
    }

    $ios->{'question'}=$data_check['question'];
    $ios->{'answer'}=$data_check['answer'];
    $ios->{'id_brain'}=$data_check['md5'];
    echo json_encode($ios);
}

if($function=='add_check_data'){
    $lang_sel=$_POST['lang_sel'];
    $id_brain=$_POST['id_brain'];
    $sel_menu=$_POST['sel_menu'];
    
    if($sel_menu=='0'){
        $query_update_brain=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `tick` = '1' , `user_work_id` = '4' WHERE `md5` = '$id_brain' LIMIT 1;");
        echo 'Duyệt câu thoại vào hàng chờ thành công (kèm câu trò chuyện cha)';
    }

    if($sel_menu=='1'){
        $query_update_brain=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `tick` = '1' ,`id_question` = '', `type_question` = '',`user_work_id` = '4' WHERE `md5` = '$id_brain' LIMIT 1;");
        echo 'Duyệt câu thoại vào hàng chờ thành công (Không kèm câu trò chuyện cha)';
    }

    if($sel_menu=='2'){
        $query_delete_brain=mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE  `md5` = '$id_brain' LIMIT 1;");
        echo 'Xóa thành công!';
    }
}

if($function=='get_brain'){
    $id_brain=$_POST['id_brain'];
    $query_get_brain=mysqli_query($link,"SELECT * FROM `app_my_girl_brain` WHERE `md5` = '$id_brain' LIMIT 1");
    $data_brain=mysqli_fetch_assoc($query_get_brain);
    echo json_encode($data_brain);
}

if($function=='clear'){
    $sel_menu=$_POST['sel_menu'];
    if($sel_menu=='0'){
        $query_delete_report=mysqli_query($link,"DELETE FROM `app_my_girl_report`");
        echo 'Đã xóa '.mysqli_affected_rows($link).' báo lỗi của tất cả các nước!';
    }

    if($sel_menu=='1'){
        $query_delete_product=mysqli_query($link,"DELETE FROM `product_log_key`");
        echo 'Đã xóa '.mysqli_affected_rows($link).' từ khóa tìm kiếm sản phẩm!';
    }
}

?>