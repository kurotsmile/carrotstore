<?php
include "config.php";
include "database.php";

class App{
    public $all_data=array();
}

class Editor_item{
    public $question="";
    public $answer="";
    public $md5="";
    public $msg_father="";
    public $id_father="";
    public $type_father="";
    public $mp3="";
    public $color="";
    public $effect="";
    public $status="";
    public $action="";
    public $face="";
    public $disable="";
    public $links="";
    public $limit="";
    public $count_child="0";
    public $count_select_box="0";
    public $effect_system="";
    public $id_redirect="";
}

function thumb($urls,$size){
    return URLS."/thumb.php?src=$urls&size=$size&trim=1";
}

$app=new App();
$func=$_POST['func'];

$user_sex=$_POST['sex_user'];
$char_sex=$_POST['sex_char'];
$langs=$_POST['lang'];
$type_view=$_POST['type_view'];
$user_name=$_POST['user_name'];
$date_cur=date("Y-m-d");

if($func=="list_editor"){
    $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_brain` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' AND `langs` = '$langs' LIMIT 20");
    while($row=mysql_fetch_array($query_list_editor)){
        $editor_item=new Editor_item();
        $editor_item->question=$row['question'];
        $editor_item->answer=$row['answer'];
        $editor_item->md5=$row['md5'];
        $editor_item->id_father=$row['id_question'];
        $editor_item->type_father=$row['type_question'];
        $id_father=$row['id_question'];
        if($id_father!=''){
            if($row['type_question']=="chat"){
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }else{
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }
            if(mysql_num_rows($get_chat_father)>0){
                $data_chat=mysql_fetch_array($get_chat_father);
                $editor_item->msg_father=$data_chat['0'];
            }
        }
        array_push($app->all_data,$editor_item);
    }
    mysql_free_result($query_list_editor);
    
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

if($func=="list_chat"){
    $type_view=$_POST['type_view'];
    $search=$_POST['search'];
    $view_father=$_POST['view_father'];
    $type_chat='chat';
    if($search!=''){
        if($type_view=='2'){
            $type_chat='msg';
            $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_msg_$langs` WHERE (`chat` LIKE '%$search%') AND `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
        }else{
            $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE (`text` LIKE '%$search%' OR `chat` LIKE '%$search%') AND `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
        }
    }else{
        if($view_father==''){
            if($type_view=='2'){
                $type_chat='msg';
                $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_msg_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
            }else{
                $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
            }
        }else{
            $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' AND `pater` = '$view_father' AND `pater_type` = 'chat' ORDER BY `id` DESC LIMIT 50");
        }
    }
    while($row=mysql_fetch_array($query_list_editor)){
        $editor_item=new Editor_item();
        if($type_view=='2'){
            $editor_item->question=$row['func'];
        }else{
           $editor_item->question=$row['text']; 
        }
        $editor_item->answer=$row['chat'];
        $editor_item->md5=$row['id'];
        if($type_view=='2'){
            $editor_item->id_father="";
            $editor_item->type_father="";
        }else{
            $editor_item->id_father=$row['pater'];
            $editor_item->type_father=$row['pater_type'];
            $editor_item->id_redirect=$row['id_redirect'];
            $editor_item->links=$row['link'];
        }
        $editor_item->color=$row['color'];
        $editor_item->effect=$row['effect_customer'];
        $editor_item->disable=$row['disable'];
        $editor_item->status=$row['status'];
        $editor_item->face=$row['face'];
        $editor_item->action=$row['action'];
        $editor_item->effect_system=$row['effect'];
        
        $editor_item->limit=$row['limit_chat'];
        $query_count_child=mysql_query("SELECT * FROM `app_my_girl_vi` WHERE `pater_type` = 'chat' AND `pater` = '".$row['id']."' LIMIT 20");
        $editor_item->count_child=mysql_num_rows($query_count_child);
        mysql_free_result($query_count_child);
        $check_field_chat=mysql_query("SELECT * FROM `app_my_girl_field_$langs` WHERE `id_chat` = '".$row['id']."' AND `type_chat` = '$type_chat'");
        $editor_item->count_select_box=mysql_num_rows($check_field_chat);
        mysql_free_result($check_field_chat);
        
        $id_father=$row['pater'];
        if($type_view=='2'){
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_msg_'.$langs.'/'.$editor_item->md5.'.mp3';
        }else{
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_'.$langs.'/'.$editor_item->md5.'.mp3';
        }
        if($id_father!=''){
            if($row['pater_type']=="chat"){
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }else{
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }
            if(mysql_num_rows($get_chat_father)>0){
                $data_chat=mysql_fetch_array($get_chat_father);
                $editor_item->msg_father=$data_chat['0'];
            }
        }
        array_push($app->all_data,$editor_item);
    }
    mysql_free_result($query_list_editor);
    
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

if($func=="delete_editor"){
    $id=$_POST['md5'];
    $langsel=$_POST['lang'];
    if($type_view=='0'){
        $query_delete=mysql_query("DELETE FROM `app_my_girl_brain` WHERE ((`md5` = '$id'));");
        if(mysql_error()==""){
            $filename = 'app_mygirl/app_my_girl_'.$langsel.'_brain/'.$id.'.mp3';
            if (file_exists($filename)) {
                unlink($filename);
                echo "Có tệp âm thanh $filename đã xóa";
            } else {
                echo "Không có tệp âm thanh";
            }
            echo "- Xóa thành công!";
        }else{
            echo mysql_error();
        }
        mysql_free_result($query_delete);
        
    }else{
        $query_delete=mysql_query("DELETE FROM `app_my_girl_$langs` WHERE `id` = '$id'");
        
        $filename = 'app_mygirl/app_my_girl_'.$langs.'/'.$id.'.mp3';
        echo 'Xóa câu trò chuyện #'.$id.' thành công !!!<br/>';
        if (file_exists($filename)) {
            unlink($filename);
            echo "Đã xóa file âm thanh $filename <br/>";
        } else {
            echo "Không có file âm thanh $filename để xóa <br/>";
        }
        
        mysql_free_result($query_delete);
        
        $check_field_chat=mysql_query("SELECT * FROM `app_my_girl_field_$langs` WHERE `id_chat` = '$id' AND `type_chat` = 'chat' LIMIT 1");
        if(mysql_num_rows($check_field_chat)>0){
            $query_delete_field=mysql_query("DELETE FROM `app_my_girl_field_$langs` WHERE `id_chat` = '$id' AND `type_chat` = 'chat' LIMIT 1;");
            mysql_free_result($query_delete_field);
            echo "Xóa trường dữ liệu (Field chat) thành công!";
        }else{
            echo "Không có trường dữ liệu (Field chat)";
        }
        mysql_free_result($check_field_chat);

    }
    mysql_close($link);
    exit;
}

if($func=="add_chat"){
    $question=$_POST['question'];
    $answer=addslashes($_POST['answer']);
    $status=$_POST['status'];
    $action=$_POST['action'];
    $face=$_POST['face'];
    $effect=$_POST['effect'];
    $color=$_POST['color'];
    $id_father=$_POST['id_father'];
    $type_father=$_POST['type_father'];
    $links=$_POST['links'];
    $disable=$_POST['disable'];
    $limit_chat=intval($_POST['limit_chat']);
    $effect_system=$_POST['effect_system'];
    $id_redirect=$_POST['id_redirect'];
    if($type_view=='2'){
        $query_add=mysql_query("INSERT INTO `app_my_girl_msg_$langs` (`func`, `chat`,`status`, `sex`,`character_sex`,`face`,`action`,`effect_customer`,`color`,`disable`,`author`,`effect`,`limit_chat`,`user_create`) VALUES ('$question','$answer','$status','$user_sex','$char_sex','$face','$action','$effect','#$color','$disable','$langs','$effect_system','$limit_chat','2');");
    }else{
        $query_add=mysql_query("INSERT INTO `app_my_girl_$langs` (`text`, `chat`,`status`, `sex`,`character_sex`,`face`,`action`,`effect_customer`,`color`,`pater`,`pater_type`,`link`,`disable`,`author`,`effect`,`limit_chat`,`id_redirect`,`user_create`) VALUES ('$question','$answer','$status','$user_sex','$char_sex','$face','$action','$effect','#$color','$id_father','$type_father','$links','$disable','$langs','$effect_system','$limit_chat','$id_redirect','2');");
    }
    $id_new=mysql_insert_id();
    
    /*
    if(isset($_FILES['audio'])){
        $target_file = 'app_mygirl/app_my_girl_'.$langs.'/'.$id_new.'.mp3';
        move_uploaded_file($_FILES['audio']['tmp_name'],$target_file);
    }*/
    
    $type_chat='chat';
    if($type_view=='2'){
        $type_chat='msg';
    }
    
    $item_select="";
    if(isset($_POST['item_select_id'])) $item_select=$_POST['item_select_id'];

    if($item_select!=""){
        $array_item_data=array();
        $item_select_label=$_POST['item_select_label'];
        $item_select_color=$_POST['item_select_color'];
        $item_select_func=$_POST['item_select_func'];
        for($i=0;$i<count($item_select);$i++){
            $id_i=$item_select[$i];
            $label_i=$item_select_label[$i];
            $color_i=$item_select_color[$i];
            $func_name=$item_select_func[$i];
            $data_item_chat=array("$id_i","$langs","$func_name","$label_i","$color_i");
            array_push($array_item_data,$data_item_chat);
        }
         $array_item_data=json_encode($array_item_data,JSON_UNESCAPED_UNICODE);
        $query_add_select_box=mysql_query("INSERT INTO `app_my_girl_field_vi` (`id_chat`, `type_chat`, `data`, `type`, `author`, `color`) VALUES ($id_new, '$type_chat', '$array_item_data', 'field_chat', 'unclear', '#000000');");
    }
    
    if($user_name!=''){
        $add_work=mysql_query("INSERT INTO carrotsy_work.`work_chat` (`id_chat`, `type_chat`, `user_name`,`type_action`,`lang_chat`, `dates`) VALUES ('$id_new', '$type_chat', '$user_name','add','$langs','$date_cur')");
        mysql_freeresult($add_work);
    }
    echo mysql_error($link);
    echo "add success!!!";
    mysql_free_result($query_add);
    mysql_close($link);
    exit;
}

if($func=='update_chat'){
    $id=$_POST['id'];
    $question=$_POST['question'];
    $answer=addslashes($_POST['answer']);
    $status=$_POST['status'];
    $action=$_POST['action'];
    $face=$_POST['face'];
    $effect=$_POST['effect'];
    $color=$_POST['color'];
    $id_father=$_POST['id_father'];
    $type_father=$_POST['type_father'];
    $links=$_POST['links'];
    $disable=$_POST['disable'];
    $limit_chat=intval($_POST['limit_chat']);
    $effect_system=$_POST['effect_system'];
    $id_redirect=$_POST['id_redirect'];
    if($type_view=='2'){
        $query_add=mysql_query("UPDATE `app_my_girl_msg_$langs` SET `func` = '$question',`chat` = '$answer',`status` = '$status',`color` = '$color',`face`='$face',`action`='$action',`effect_customer`='$effect',`disable` =$disable,`limit_chat`='$limit_chat',`effect`='$effect_system',`user_update`='2' WHERE `id` = '$id';");
    }else{
        $query_add=mysql_query("UPDATE `app_my_girl_$langs` SET `text` = '$question',`chat` = '$answer',`status` = '$status',`color` = '$color',`link` = '$links',`face`='$face',`action`='$action',`effect_customer`='$effect',`disable` =$disable,`limit_chat`='$limit_chat',`effect`='$effect_system',`pater`='$id_father',`pater_type`='$type_father',`id_redirect`='$id_redirect',`user_update`='2' WHERE `id` = '$id';");
    }
    
    /*
    if(isset($_FILES['audio'])){
        $target_file = 'app_mygirl/app_my_girl_'.$langs.'/'.$id.'.mp3';
        move_uploaded_file($_FILES['audio']['tmp_name'],$target_file);
    }*/
    
    $type_chat='chat';
    if($type_view=='2'){
        $type_chat='msg';
    }
        
    $item_select="";
    if(isset($_POST['item_select_id'])){$item_select=$_POST['item_select_id'];}

    if($item_select!=""){
        $array_item_data=array();
        $item_select_label=$_POST['item_select_label'];
        $item_select_color=$_POST['item_select_color'];
        $item_select_func=$_POST['item_select_func'];
        for($i=0;$i<count($item_select);$i++){
            $id_i=$item_select[$i];
            $label_i=$item_select_label[$i];
            $color_i=$item_select_color[$i];
            $func_name=$item_select_func[$i];
            $data_item_chat=array("$id_i","$langs","$func_name","$label_i","$color_i");
            array_push($array_item_data,$data_item_chat);
        }
        $array_item_data=json_encode($array_item_data,JSON_UNESCAPED_UNICODE);
        
        $check_field_chat=mysql_query("SELECT * FROM `app_my_girl_field_$langs` WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1");
        if(mysql_num_rows($check_field_chat)>0){
            $query_update_field=mysql_query("UPDATE `app_my_girl_field_$langs` SET `data` = '$array_item_data' WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1;");
        }else{
            $query_add_select_box=mysql_query("INSERT INTO `app_my_girl_field_$langs` (`id_chat`, `type_chat`, `data`, `type`, `author`) VALUES ($id, '$type_chat', '$array_item_data', 'field_chat', 'unclear');");
        }
       
    }else{
        $id_delete=$_POST['is_delete'];
        if($id_delete=="1"){
            $query_delete_field=mysql_query("DELETE FROM `app_my_girl_field_$langs` WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1;");
            mysql_free_result($query_delete_field);
        }
    }
    mysql_free_result($check_field_chat);
    
    if($user_name!=''){
        $add_work=mysql_query("INSERT INTO carrotsy_work.`work_chat` (`id_chat`, `type_chat`, `user_name`,`type_action`,`lang_chat`, `dates`) VALUES ('$id', '$type_chat', '$user_name','edit','$langs','$date_cur')");
        mysql_freeresult($add_work);
    }
    echo mysql_error($link);
    echo "add success!!!";
    mysql_free_result($query_add);
    mysql_close($link);
    exit;
}


if($func=="icon_color"){
    $category=$_POST['category'];
    if($category!=""){
        $list_effect=mysql_query("SELECT * FROM `app_my_girl_effect` WHERE `tag`='$category' ORDER by RAND() LIMIT 20");
    }else{
        $list_effect=mysql_query("SELECT * FROM `app_my_girl_effect` ORDER by RAND() LIMIT 20");
    }
    while($row_effect=mysql_fetch_array($list_effect)){
        $url_effct='app_mygirl/obj_effect/'.$row_effect[0].'.png';
        $url_icon=thumb($url_effct,'45x45');
        $editor_item=new Editor_item();
        $editor_item->question=$row_effect['color'];
        $editor_item->answer=$row_effect[0];
        $editor_item->md5=$url_icon;
        array_push($app->all_data,$editor_item);
    }
    echo mysql_error($link);
    echo json_encode($app);
    mysql_free_result($list_effect);
    mysql_close($link);
    exit;
}


if($func=="list_lang"){
    include "app_mygirl/data_lang_vr1.php";
    for($i=0;$i<count($lang_app->menu_lang);$i++){
        $cur_lang=$lang_app->menu_lang[$i];
        $item_editor=new Editor_item();
        $item_editor->question=$cur_lang->name;
        $item_editor->md5=$cur_lang->key;
        $item_editor->answer=$cur_lang->url_icon;
        array_push($app->all_data,$item_editor);
    }
    echo json_encode($app);
    exit;
}

if($func=='get_chat_miss'){
    $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_key` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' AND `lang` = '$langs' ORDER BY RAND() LIMIT 1");
    $row=mysql_fetch_array($query_list_editor);
        $editor_item=new Editor_item();
        $editor_item->question=$row['key'];
        $editor_item->answer=$row['key'];
        $editor_item->md5=$row['id_device'];
        $editor_item->id_father=$row['id_question'];
        $editor_item->type_father=$row['type_question'];
        $id_father=$row['id_question'];
        if($id_father!=''){
            if($row['type_question']=="chat"){
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }else{
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }
            if(mysql_num_rows($get_chat_father)>0){
                $data_chat=mysql_fetch_array($get_chat_father);
                $editor_item->msg_father=$data_chat['0'];
            }
        }

    array_push($app->all_data,$editor_item);

    mysql_free_result($query_list_editor);
    
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

function encodeURI($uri)
{
    return preg_replace_callback("{[^0-9a-z_.!~*'();,/?:@&=+$#-]}i", function ($m) {
        return sprintf('%%%02X', ord($m[0]));
    }, $uri);
}

function get_content($URL){
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_URL, $URL);
          $data = curl_exec($ch);
          curl_close($ch);
          return $data;
}

if($func=='translate'){
    $s=$_POST['s'];
    $s_from=$_POST['s_from'];
    $s_to=$_POST['s_to'];
    $url=encodeURI("https://translate.googleapis.com/translate_a/single?client=gtx&sl=$s_from&tl=$s_to&dt=t&dt=t&q=$s");
    $a=get_content($url);
    $a=json_decode($a); 
    $show=$a[0][0][0];
    echo $show;
    exit;
}

if($func=='get_login'){
    $user_id=$_POST['s_user'];
    $user_pass=$_POST['s_pass'];
    
    $mysql_query_user=mysql_query("SELECT * FROM carrotsy_work.`work_user` WHERE `user_name` = '$user_id' AND `user_pass`='$user_pass' LIMIT 1");
    if(mysql_numrows($mysql_query_user)>0){
        $data_user=mysql_fetch_array($mysql_query_user);
        $app->{"user_id"}=$data_user['user_id'];
        $app->{"user_name"}=$data_user['user_name'];
        $app->{"user_role"}=$data_user['user_role'];
        $app->{"user_wage"}=$data_user['user_wage'];
        $app->{"user_work_curent"}=$data_user['user_work_curent'];
    }else{
        $app->{"user_id"}="";
        $app->{"user_name"}="";
        $app->{"user_role"}="";
        $app->{"user_wage"}="";
        $app->{"user_work_curent"}="";
    }
    echo json_encode($app);
    mysql_close($link);
    exit;
}

if($func=="list_chat_sub"){
    $type_view=$_POST['type_view'];
    $search=$_POST['search'];
    if($type_view=='2'){
        $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_msg_$langs` WHERE (`func` LIKE '%$search%') AND `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
    }else{
        $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE (`text` LIKE '%$search%') AND `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
    }

    while($row=mysql_fetch_array($query_list_editor)){
        $editor_item=new Editor_item();
        if($type_view=='2'){
            $editor_item->question=$row['func'];
        }else{
           $editor_item->question=$row['text']; 
        }
        $editor_item->answer=$row['chat'];
        $editor_item->md5=$row['id'];
        if($type_view=='2'){
            $editor_item->id_father="";
            $editor_item->type_father="";
        }else{
            $editor_item->id_father=$row['pater'];
            $editor_item->type_father=$row['pater_type'];
        }
        $editor_item->color=$row['color'];
        $editor_item->effect=$row['effect_customer'];
        $editor_item->disable=$row['disable'];
        $editor_item->status=$row['status'];
        $editor_item->face=$row['face'];
        $editor_item->action=$row['action'];
        $editor_item->effect_system=$row['effect'];
        if($type_view=='2'){
            $editor_item->links="";
        }else{
            $editor_item->links=$row['link'];
        }
        $editor_item->limit=$row['limit_chat'];
        $query_count_child=mysql_query("SELECT * FROM `app_my_girl_vi` WHERE `pater_type` = 'chat' AND `pater` = '".$row['id']."' LIMIT 20");
        $editor_item->count_child=mysql_num_rows($query_count_child);
        mysql_free_result($query_count_child);
        $id_father=$row['pater'];
        if($type_view=='2'){
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_msg_'.$langs.'/'.$editor_item->md5.'.mp3';
        }else{
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_'.$langs.'/'.$editor_item->md5.'.mp3';
        }
        if($id_father!=''){
            if($row['pater_type']=="chat"){
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }else{
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }
            if(mysql_num_rows($get_chat_father)>0){
                $data_chat=mysql_fetch_array($get_chat_father);
                $editor_item->msg_father=$data_chat['0'];
            }
        }
        array_push($app->all_data,$editor_item);
    }
    mysql_free_result($query_list_editor);
    
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

if($func=="list_select_box"){
    $type_chat='chat';
    if($type_view=='2'){
        $type_chat='msg';
    }
    $id=$_POST['chat_id'];
    $query_get_list=mysql_query("SELECT * FROM `app_my_girl_field_$langs` WHERE `id_chat` = '$id' AND `type_chat` = '$type_chat' LIMIT 1");
    if(mysql_num_rows($query_get_list)>0){
        $data_field=mysql_fetch_array($query_get_list);
        $editor_item=new Editor_item();
        $data_field=json_decode($data_field['data']);
        for($i=0;$i<count($data_field);$i++){
            $item_field_data=$data_field[$i];
            $item_field_data_id=$item_field_data[0];
            $item_field_data_id_sub=$item_field_data[1];
            $item_field_data_func=$item_field_data[2];
            $item_field_data_label=$item_field_data[3];
            $item_field_data_color=$item_field_data[4];
            array_push($app->all_data,array($item_field_data_id,$item_field_data_id_sub,$item_field_data_func,$item_field_data_label,$item_field_data_color));   
        }
    }
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

if($func=="list_fix"){
    $type_view=$_POST['type_view'];
    $search=$_POST['search'];
    $view_father=$_POST['view_father'];
    $type_chat='chat';
    if($search!=''){
        if($type_view=='2'){
            $type_chat='msg';
            $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_msg_$langs` WHERE (`chat` LIKE '%$search%') AND `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
        }else{
            $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE (`text` LIKE '%$search%' OR `chat` LIKE '%$search%') AND `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
        }
    }else{
        if($view_father==''){
            if($type_view=='2'){
                $type_chat='msg';
                $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_msg_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
            }else{
                $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' ORDER BY `id` DESC LIMIT 50");
            }
        }else{
            $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' AND `pater` = '$view_father' AND `pater_type` = 'chat' ORDER BY `id` DESC LIMIT 50");
        }
    }
    while($row=mysql_fetch_array($query_list_editor)){
        $editor_item=new Editor_item();
        if($type_view=='2'){
            $editor_item->question=$row['func'];
        }else{
           $editor_item->question=$row['text']; 
        }
        $editor_item->answer=$row['chat'];
        $editor_item->md5=$row['id'];
        if($type_view=='2'){
            $editor_item->id_father="";
            $editor_item->type_father="";
        }else{
            $editor_item->id_father=$row['pater'];
            $editor_item->type_father=$row['pater_type'];
        }
        $editor_item->color=$row['color'];
        $editor_item->effect=$row['effect_customer'];
        $editor_item->disable=$row['disable'];
        $editor_item->status=$row['status'];
        $editor_item->face=$row['face'];
        $editor_item->action=$row['action'];
        $editor_item->effect_system=$row['effect'];
        if($type_view=='2'){
            $editor_item->links="";
        }else{
            $editor_item->links=$row['link'];
        }
        $editor_item->limit=$row['limit_chat'];
        $query_count_child=mysql_query("SELECT * FROM `app_my_girl_vi` WHERE `pater_type` = 'chat' AND `pater` = '".$row['id']."' LIMIT 20");
        $editor_item->count_child=mysql_num_rows($query_count_child);
        mysql_free_result($query_count_child);
        $check_field_chat=mysql_query("SELECT * FROM `app_my_girl_field_$langs` WHERE `id_chat` = '".$row['id']."' AND `type_chat` = '$type_chat'");
        $editor_item->count_select_box=mysql_num_rows($check_field_chat);
        mysql_free_result($check_field_chat);
        
        $id_father=$row['pater'];
        if($type_view=='2'){
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_msg_'.$langs.'/'.$editor_item->md5.'.mp3';
        }else{
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_'.$langs.'/'.$editor_item->md5.'.mp3';
        }
        if($id_father!=''){
            if($row['pater_type']=="chat"){
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }else{
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }
            if(mysql_num_rows($get_chat_father)>0){
                $data_chat=mysql_fetch_array($get_chat_father);
                $editor_item->msg_father=$data_chat['0'];
            }
        }
        array_push($app->all_data,$editor_item);
    }
    mysql_free_result($query_list_editor);
    
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

if($func=='get_list_fix'){
    $type_view=$_POST['type_view'];
    $search=$_POST['search'];
    $view_father=$_POST['view_father'];
    $type_chat='chat';
    $type_fix=$_POST['type'];
    
    $query_list_editor=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' AND `pater` = '$view_father' AND `pater_type` = 'chat' ORDER BY `id` DESC LIMIT 50");
    
    while($row=mysql_fetch_array($query_list_editor)){
        $editor_item=new Editor_item();
        if($type_view=='2'){
            $editor_item->question=$row['func'];
        }else{
           $editor_item->question=$row['text']; 
        }
        $editor_item->answer=$row['chat'];
        $editor_item->md5=$row['id'];
        if($type_view=='2'){
            $editor_item->id_father="";
            $editor_item->type_father="";
        }else{
            $editor_item->id_father=$row['pater'];
            $editor_item->type_father=$row['pater_type'];
        }
        $editor_item->color=$row['color'];
        $editor_item->effect=$row['effect_customer'];
        $editor_item->disable=$row['disable'];
        $editor_item->status=$row['status'];
        $editor_item->face=$row['face'];
        $editor_item->action=$row['action'];
        $editor_item->effect_system=$row['effect'];
        if($type_view=='2'){
            $editor_item->links="";
        }else{
            $editor_item->links=$row['link'];
        }
        $editor_item->limit=$row['limit_chat'];
        $query_count_child=mysql_query("SELECT * FROM `app_my_girl_vi` WHERE `pater_type` = 'chat' AND `pater` = '".$row['id']."' LIMIT 20");
        $editor_item->count_child=mysql_num_rows($query_count_child);
        mysql_free_result($query_count_child);
        $check_field_chat=mysql_query("SELECT * FROM `app_my_girl_field_$langs` WHERE `id_chat` = '".$row['id']."' AND `type_chat` = '$type_chat'");
        $editor_item->count_select_box=mysql_num_rows($check_field_chat);
        mysql_free_result($check_field_chat);
        
        $id_father=$row['pater'];
        if($type_view=='2'){
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_msg_'.$langs.'/'.$editor_item->md5.'.mp3';
        }else{
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_'.$langs.'/'.$editor_item->md5.'.mp3';
        }
        if($id_father!=''){
            if($row['pater_type']=="chat"){
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }else{
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }
            if(mysql_num_rows($get_chat_father)>0){
                $data_chat=mysql_fetch_array($get_chat_father);
                $editor_item->msg_father=$data_chat['0'];
            }
        }
        array_push($app->all_data,$editor_item);
    }
    mysql_free_result($query_list_editor);
    
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

if($func=='get_chat'){
    $id_chat=$_POST['id'];
    $query_get_chat=mysql_query("SELECT * FROM `app_my_girl_$langs` WHERE `sex` = '$user_sex' AND `character_sex` = '$char_sex' AND `id`='$id_chat'  LIMIT 1");
    $data_chat=mysql_fetch_array($query_get_chat);
    $editor_item=new Editor_item();
        if($type_view=='2'){
            $editor_item->question=$data_chat['func'];
        }else{
           $editor_item->question=$data_chat['text']; 
        }
        $editor_item->answer=$data_chat['chat'];
        $editor_item->md5=$data_chat['id'];
        if($type_view=='2'){
            $editor_item->id_father="";
            $editor_item->type_father="";
        }else{
            $editor_item->id_father=$data_chat['pater'];
            $editor_item->type_father=$data_chat['pater_type'];
            $editor_item->id_redirect=$data_chat['id_redirect'];
            $editor_item->links=$data_chat['link'];
        }
        $editor_item->color=$data_chat['color'];
        $editor_item->effect=$data_chat['effect_customer'];
        $editor_item->disable=$data_chat['disable'];
        $editor_item->status=$data_chat['status'];
        $editor_item->face=$data_chat['face'];
        $editor_item->action=$data_chat['action'];
        $editor_item->effect_system=$data_chat['effect'];
        
        $editor_item->limit=$data_chat['limit_chat'];
        $query_count_child=mysql_query("SELECT * FROM `app_my_girl_vi` WHERE `pater_type` = 'chat' AND `pater` = '".$data_chat['id']."' LIMIT 20");
        $editor_item->count_child=mysql_num_rows($query_count_child);
        mysql_free_result($query_count_child);
        $check_field_chat=mysql_query("SELECT * FROM `app_my_girl_field_$langs` WHERE `id_chat` = '".$data_chat['id']."' AND `type_chat` = '$type_chat'");
        $editor_item->count_select_box=mysql_num_rows($check_field_chat);
        mysql_free_result($check_field_chat);
        
        $id_father=$data_chat['pater'];
        if($type_view=='2'){
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_msg_'.$langs.'/'.$editor_item->md5.'.mp3';
        }else{
            $editor_item->mp3=$urls.'/app_mygirl/app_my_girl_'.$langs.'/'.$editor_item->md5.'.mp3';
        }
        if($id_father!=''){
            if($data_chat['pater_type']=="chat"){
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }else{
                $get_chat_father=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$langs` WHERE `id` = '$id_father' LIMIT 1");
            }
            if(mysql_num_rows($get_chat_father)>0){
                $data_chat=mysql_fetch_array($get_chat_father);
                $editor_item->msg_father=$data_chat['0'];
            }
        }
    array_push($app->all_data,$editor_item);
    mysql_free_result($query_get_chat);
    echo json_encode($app);
    echo mysql_error($link);
    mysql_close($link);
    exit;
}

if($func=='create_audio'){
    $text=urlencode($_POST['text']);
    $link_audio="http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=".strlen($_POST['text'])."&client=tw-ob&q=$text&tl=$langs";
    $ch = curl_init($link_audio);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    $output = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($status == 200) {
        file_put_contents(dirname(__FILE__) . '/audio.mp3', $output);
    }
    echo $urls.'/audio.mp3';
}