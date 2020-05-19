<?php 
include "config.php";
include "database.php";
include "function.php";
include "app_my_girl_function.php";
header('Content-type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
$func='';
if(isset($_GET['function']))$func=$_GET['function'];
if(isset($_POST['function']))$func=$_POST['function'];

$date_cur=date("Y-m-d");

if($func=='show_edit'){
    $key=$_GET['key'];
    $lang_sel=$_GET['lang'];
    $sex=$_GET['sex'];
    
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` LIKE '%$key%' AND `sex`='$sex'");
    if(mysqli_num_rows($result_chat)>0){
        echo '<table>';
        while ($row = mysqli_fetch_array($result_chat)) {
            echo '<tr><td>'.$row['id'].'</td><td>'.$row['text'].'</td><td>'.$row['chat'].'</td><td><img src="'.$url.'/app_mygirl/img/tip'.$row['tip'].'.png"></td><td><audio controls><source src="'.$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3" type="audio/ogg"></audio></td><td><a href="'.$url.'/app_my_girl_update.php?id='.$row['id'].'&lang='.$lang_sel.'" target="_blank">Update</a></td></tr>';
        }
        echo '</table>';
    }else{
        echo "<p style='display:block;width:100%;float:left;'>Chưa có câu trả lời</p>";
    }
    mysqli_free_result($result_chat);
    exit;
}

if($func=='show_return'){
    $key=$_GET['key'];
    $lang_sel=$_GET['lang'];
    $sex=$_GET['sex'];
    $character_sex=$_GET['character_sex'];
    $type_show=$_GET['type_show'];
    
    if($type_show=="="){
        $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text`='$key' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `pater`=''");
    }else if($type_show=="search"){
        $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (text)  AGAINST ('$key' IN BOOLEAN MODE) AND `sex`='$sex' AND `character_sex`='$character_sex' AND `pater`='' limit 2");
    }else{
        $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` LIKE '%$key%' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `pater`=''");
    }
    
    if(mysqli_num_rows($result_chat)>0){
        echo '<div style="max-height:550px;overflow-y: scroll;width:97%">';
        echo '<table>';
        while ($row = mysqli_fetch_array($result_chat)) {
            echo show_row_chat_prefab($row,$lang_sel,'');
        }
        echo '</table>';
        echo '<div>';
    }else{
        echo "<p style='display:block;width:100%;float:left;'>Chưa có câu trả lời</p>";
    }
    mysqli_free_result($result_chat);
    exit;
}


if($func=='show_id_chat'){
    $lang_sel=$_GET['lang'];
    $sex=$_GET['sex'];
    $character_sex=$_GET['character_sex'];
    $type_add=$_GET['type_add'];
    $txt_query_redirect="";
    $txt_query_id_pater="";
    
    if($type_add=="1"){
        $txt_query_redirect=" AND `id_redirect` = '' ";
    }
    
    if($type_add=="2"){
        $txt_query_id_pater=" AND `pater` = '' ";
    }
    
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `sex` = '$sex' AND `disable` = '0' AND `character_sex`='$character_sex'  $txt_query_redirect $txt_query_id_pater ORDER BY `id` DESC LIMIT 16");
    echo '<div><input onchange="search_chat(this,\''.$lang_sel.'\',\''.$sex.'\',\''.$character_sex.'\',\''.$type_add.'\');" placeholder="Seach chat"  type="text" value="" style="display:block;background:#c3c3c3" /></div>';
    if(mysqli_num_rows($result_chat)>0){
        echo '<table id="table_data">';
        while ($row = mysqli_fetch_array($result_chat)) {
            if($type_add=="0"){
                $txt_add_type_chat='<a href="#" class="buttonPro small blue" onclick="add_id_chat('.$row['id'].');return false;">Add &nbsp</a>';
            }else if($type_add=="1"){
                $txt_add_type_chat='<a href="#" class="buttonPro small green" onclick="add_id_chat_same('.$row['id'].',\'table_data_same\');return false;">Add same chat &nbsp</a>';
            }else{
                $txt_add_type_chat='<a href="#" class="buttonPro small yellow" onclick="add_id_chat_same('.$row['id'].',\'table_data_return\');return false;">Add same chat return</a>';
            }
            echo show_row_chat_prefab($row,$lang_sel,$txt_add_type_chat);
        }
        echo '</table>';
    }else{
        echo "<p  style='display:block;width:100%;float:left;'>Chưa có câu trả lời</p>";
    }
    mysqli_free_result($result_chat);
    exit;
}

if($func=='add_chat_same'){
    $lang_sel=$_GET['lang'];
    $id=$_GET['id'];
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id'");
    $result_chat=mysqli_fetch_array($result_chat);
    if($_GET['emp']=='table_data_return'){
        $btn_remove='<a href="#" class="buttonPro small red" onclick="remove_chat_same(\''.$id.'\')">Gỡ bỏ</a><input type="hidden" value="'.$id.'" name="chat_child[]" />';
    }else{
        $btn_remove='<a href="#" class="buttonPro small red" onclick="remove_chat_same(\''.$id.'\')">Gỡ bỏ</a>';
    }
    echo show_row_chat_prefab($result_chat,$lang_sel,$btn_remove);
    exit;
}

if($func=='search_chat'){
    $txt=$_GET['txt'];
    $lang_sel=$_GET['lang'];
    $sex=$_GET['sex'];
    $character_sex=$_GET['character_sex'];
    $type_add=$_GET['type_add'];
    
    $txt_query_redirect=" ";
    $txt_query_id_pater="";
    
    if($type_add=="1"){
        $txt_query_redirect=" AND `id_redirect` = '' ";
    }
    
    if($type_add=="2"){
        $txt_query_id_pater=" AND `pater` = '' ";
    }
    
 
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE ((`text` LIKE '%$txt%') OR (`chat` LIKE '%$txt%')) AND `sex` = '$sex' AND `character_sex`='$character_sex' $txt_query_redirect $txt_query_id_pater ORDER BY `id` DESC LIMIT 10");

    if(mysqli_num_rows($result_chat)>0){
        while ($row = mysqli_fetch_array($result_chat)) {
            if($type_add=="0"){
                $txt_add_type_chat='<a href="#" class="buttonPro small blue" onclick="add_id_chat('.$row['id'].');return false;">Add &nbsp</a>';
            }else if($type_add=="1"){
                $txt_add_type_chat='<a href="#" class="buttonPro small green" onclick="add_id_chat_same('.$row['id'].',\'table_data_same\');return false;">Add same chat &nbsp</a>';
            }else{
                $txt_add_type_chat='<a href="#" class="buttonPro small yellow" onclick="add_id_chat_same('.$row['id'].',\'table_data_return\');return false;">Add same chat return</a>';
            }
            echo show_row_chat_prefab($row,$lang_sel,$txt_add_type_chat);
        }
    }else{

        echo '<tr><dt>Khong tim thay!</td></tr>';

    }
    exit;
}

if($func=='delete_chat'){
    $id=$_GET['id'];
    $lang_sel=$_GET['lang'];
    
    $check_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' LIMIT 1");
    $data_chat=mysqli_fetch_array($check_chat);
    $result_chat=mysqli_query($link,"DELETE FROM `app_my_girl_$lang_sel` WHERE `id` = '$id'");
    
    $filename = 'app_mygirl/app_my_girl_'.$lang_sel.'/'.$id.'.mp3';
    echo 'Xóa câu trò chuyện #'.$id.' thành công !!!<br/>';
    if (file_exists($filename)) {
        unlink($filename);
        echo "Đã xóa file âm thanh $filename <br/>";
    } else {
        echo "Không có file âm thanh $filename để xóa <br/>";
    }
    
    $filename_img='app_mygirl/app_my_girl_'.$lang_sel.'_img/'.$id.'.png';
    if (file_exists($filename_img)) {
        unlink($filename_img);
        echo "Đã xóa file ảnh $filename_img <br/>";
    } else {
        echo "Không có file ảnh $filename_img để xóa <br/>";
    }
    
    
    $check_field_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = 'chat' LIMIT 1");
    if(mysqli_num_rows($check_field_chat)>0){
        $query_delete_field=mysqli_query($link,"DELETE FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = 'chat' LIMIT 1;");
        echo "Xóa trường dữ liệu (Field chat) thành công!";
    }else{
        echo "Không có trường dữ liệu (Field chat)";
    }
    
    if($data_chat['effect']=='2'){
        echo "<br/>Xóa các chức năng liên quan tới nhạc";
        $check_video=mysqli_query($link,"SELECT * FROM `app_my_girl_video_$lang_sel` WHERE  `id_chat` = '$id' LIMIT 1");
        if(mysqli_num_rows($check_video)>0){
            mysqli_query($link,"DELETE FROM `app_my_girl_video_$lang_sel` WHERE `id_chat` = '$id'");
            echo mysqli_error($link);
            echo "<br/>Xóa liên kết video thành công!"; 
        }
        mysqli_free_result($check_video);
        
        $show_lyrics=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `id_music` = '$id' LIMIT 1");
        if(mysqli_num_rows($show_lyrics)>0){
            mysqli_query($link,"DELETE FROM `app_my_girl_".$lang_sel."_lyrics` WHERE  `id_music` = '$id' LIMIT 1;");
            echo mysqli_error($link);
            echo "<br/>Xóa lời bài hát!";
        }
        mysqli_free_result($show_lyrics);
        
        $check_rank_music=mysqli_query($link,"SELECT * FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat`='$id' LIMIT 1");
        if(mysqli_num_rows($check_rank_music)>0){
            mysqli_query($link,"DELETE FROM `app_my_girl_music_data_$lang_sel` WHERE `id_music` = '$id' LIMIT 1;");
            echo mysqli_error($link);
            echo "<br/>Xóa bản xếp hạng liên quan đến bài hát!";
        }
        mysqli_num_rows($check_rank_music);
            
    }
    
    exit;
}

if($func=='delete_chat_select'){
    $id=$_GET['id'];
    $lang_sel=$_GET['lang'];
    $arr_id=json_decode($id);
    echo "Xóa danh sách ngôn ngữ (".$lang_sel.")\n";
    foreach($arr_id as $id_row){
        $result_chat_delete=mysqli_query($link,"DELETE FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_row'");
        
        $filename = 'app_mygirl/app_my_girl_'.$lang_sel.'/'.$id_row.'.mp3';
        
        if (file_exists($filename)) {
            unlink($filename);
            echo "The file $filename exists - id($id_row) \n";
        } else {
            echo "The file $filename does not exist - id($id_row) \n";
        }
        mysqli_free_result($result_chat_delete);
    }
    exit;
}

if($func=='os_chat_select'){
    $id=$_GET['id'];
    $lang_sel=$_GET['lang'];
    $arr_id=json_decode($id);
    $os=$_GET['os'];
    echo "cập nhật danh sách ngôn ngữ (".$lang_sel.")\n";
    foreach($arr_id as $id_row){
        $result_chat_update=mysqli_query($link,"UPDATE `app_my_girl_$lang_sel` SET `os` = '$os' WHERE `id` = '$id_row';");
        echo "update  $id_row  set os = $os \n";
        mysqli_free_result($result_chat_update);
    }
    exit;
}



if($func=='os_active'){
    $id=$_GET['id'];
    $lang_sel=$_GET['lang'];
    $arr_id=json_decode($id);
    $value=$_GET['value'];
    $os=$_GET['os'];
    echo "cập nhật danh sách ngôn ngữ (".$lang_sel.")\n";
    foreach($arr_id as $id_row){
        $result_chat_update=mysqli_query($link,"UPDATE `app_my_girl_$lang_sel` SET `$os` = '$value' WHERE `id` = '$id_row';");
        echo "update  $id_row  set $os = $value \n";
        mysqli_free_result($result_chat_update);
    }
    exit;
}

if($func=='view_history_rate'){
    $key=$_GET['key'];
    $lang=$_GET['lang'];
    $sex=$_GET['sex'];
    $sel_date=$_GET['sel_date'];
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_key` WHERE `dates` = '$sel_date' AND `key` = '$key' AND `sex` = '$sex' AND `lang` = '$lang' ");
    echo '<div style="width:99%;display:block;max-height: 400px;overflow-y: scroll;"><table id="table_data">';
    while ($row = mysqli_fetch_array($result_chat)) {
        echo show_row_history_prefab($row);
    }
    echo '</table></div>';
    exit;
}

if($func=='view_history_see'){
    $id=$_GET['id'];
    $lang=$_GET['lang'];
    $type=$_GET['type'];
    $character_sex=$_GET['char_sex'];
    $sex=$_GET['sex'];
    
    $table='';
    if($type=="msg"){
        $table='app_my_girl_msg_'.$lang;
    }else{
        $table='app_my_girl_'.$lang;
    }
    $query_chat=mysqli_query($link,"SELECT * FROM `$table` WHERE `id` = '$id' AND `sex`='$sex' AND `character_sex`='$character_sex' LIMIT 1");
    $arr_chat=mysqli_fetch_array($query_chat);
    echo "<table>";
    echo show_row_chat_prefab($arr_chat,$lang,'');
    echo "</table>";
    exit;
}

if($func=='view_chat_father'){
    $id=$_GET['id'];
    $lang_sel=$_GET['lang'];
    $type=$_GET['type'];
    
    $result_chat1='';
    
    if($type=='msg'){
        $result_chat1=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$lang_sel` WHERE `id` = $id ");
        $arr_chat1=mysqli_fetch_array($result_chat1);
        $txt_update='<a href="'.$url.'/app_my_girl_update.php?id='.$id.'&lang='.$lang_sel.'&msg=1" target="_blank" title="sửa msg"><b>'.$arr_chat1['func'].'</b></a>';
        echo "<ul><li><i class='fa fa-circle' aria-hidden='true'></i> $txt_update (msg):".$arr_chat1['chat'];
    }else{
        $result_chat1=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = $id ");
        $arr_chat1=mysqli_fetch_array($result_chat1);
        $txt_update='<a href="'.$url.'/app_my_girl_update.php?id='.$id.'&lang='.$lang_sel.'" target="_blank" title="sửa chat"><b>'.$arr_chat1['text'].'</b></a>';
        echo "<ul><li><i class='fa fa-circle' aria-hidden='true'></i> $txt_update (chat): ".$arr_chat1['chat'];
    }
 

    $result_chat2=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `pater` = ".$id." AND `pater_type`='$type'");
    echo '<ul>';
    while($row1=mysqli_fetch_array($result_chat2)){
        $txt_update='<a href="'.$url.'/app_my_girl_update.php?id='.$row1['id'].'&lang='.$lang_sel.'" target="_blank" title="sửa chat"><b>'.$row1['text'].'</b></a>';
        if($row1['id_redirect']!=''){
            $result_chat3=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '".$row1['id_redirect']."'");
            $arr_chat3=mysqli_fetch_array($result_chat3);
            echo '<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i> <b>'.$txt_update.'</b>: '.$arr_chat3['chat'].'';
            mysqli_free_result($result_chat3);
        }else{
            echo '<li><i class="fa fa-circle-o" aria-hidden="true"></i> <b>'.$txt_update.'</b>: '.$row1['chat'].'';
        }   
        
       
         $result_chat4=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `pater` = '".$row1['id']."' AND `pater_type`='".$row1['pater_type']."'");
         if(mysqli_num_rows($result_chat4)>0){
             echo '<ul>';
             while($row2=mysqli_fetch_array($result_chat4)){
                $txt_update='<a href="'.$url.'/app_my_girl_update.php?id='.$row2['id'].'&lang='.$lang_sel.'" target="_blank" title="sửa chat"><b>'.$row2['text'].'</b></a>';
                if($row2['id_redirect']!=''){
                    $result_chat5=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '".$row2['id_redirect']."'");
                    $arr_chat5=mysqli_fetch_array($result_chat5);
                    echo '<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i><i class="fa fa-circle-o" aria-hidden="true"></i> <b>'.$txt_update.'</b>: '.$arr_chat5['chat'].'</li>';
                    mysqli_free_result($result_chat5);
                }else{
                    echo '<li><i class="fa fa-circle-o" aria-hidden="true"></i> <b>'.$txt_update.'</b>: '.$row2['chat'].'</li>';
                } 
             }
             echo '</ul>';
         }
         mysqli_free_result($result_chat4);

         echo '</i>';
    } 
    echo '</ul>';
    
    
    echo "</li></ul>";
    
   
    
    if($arr_chat1['q1']!=''){
        echo '<hr/>';
        echo '<b style="color:green;">'.$arr_chat1['q1'].'</b><br/>';
        $result_chat_6=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '".$arr_chat1['r1']."'");
        $arr_chat6=mysqli_fetch_array($result_chat_6);
        $txt_update='<a href="'.$url.'/app_my_girl_update.php?id='.$arr_chat6['id'].'&lang='.$lang_sel.'" target="_blank" title="sửa chat"><b>'.$arr_chat6['text'].'</b></a>';
        echo $txt_update.' '.$arr_chat6['chat'];
        mysqli_free_result($result_chat_6);
    }
    
    if($arr_chat1['q2']!=''){
        echo '<hr/>';
        echo '<b style="color:red;">'.$arr_chat1['q2'].'</b><br/>';
        $result_chat_6=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '".$arr_chat1['r2']."'");
        $arr_chat6=mysqli_fetch_array($result_chat_6);
        $txt_update='<a href="'.$url.'/app_my_girl_update.php?id='.$arr_chat6['id'].'&lang='.$lang_sel.'" target="_blank" title="sửa chat"><b>'.$arr_chat6['text'].'</b></a>';
        echo $txt_update.' '.$arr_chat6['chat'];
        mysqli_free_result($result_chat_6);
    }
    mysqli_free_result($result_chat2);
    exit;
}

if($func=='show_map'){
    $lat=$_GET['lat'];
    $lng=$_GET['lng'];
    $dates=$_GET['dates'];
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_key` WHERE `location_lat`='$lat' AND `location_lon`='$lng' AND `dates`='$dates' ");
    $chat_item=mysqli_fetch_array($result_chat);
    echo "ID device:".$chat_item['id_device']." Lang:".$lang_sel." Os:".$chat_item['os']." Version:".$chat_item['version'].'<hr/>';
    echo '<div style="width:100%;max-height:550px;overflow-y: scroll;">';
    show_row_map($chat_item);
    while($chat_item=mysqli_fetch_array($result_chat)){
        show_row_map($chat_item);
        mysqli_free_result($result_chat1);
    }
    mysqli_free_result($chat_item);
    echo '</div>';
    exit;
}




if($func=='view_device'){
    $dates=$_GET['dates'];
    $id_device=$_GET['id_device'];
    $lang_sel=$_GET['lang'];
    $character_sex=$_GET['character_sex'];
    $sex=$_GET['sex'];
    
    $result_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_key` WHERE `id_device`='$id_device' AND `dates`='$dates' AND `sex`='$sex' AND `character_sex`='$character_sex' ");
    $chat_item=mysqli_fetch_array($result_chat);
    echo show_info_user($link,$lang_sel,$chat_item['id_device'],'1');
    echo "<div style='width:100%;float:left;margin: 3px;'>ID device:".$chat_item['id_device']." Lang:".$lang_sel." Os:".$chat_item['os']." Version:".$chat_item['version'].'</div><hr/>';
    echo '<div style="width:100%;max-height:550px;overflow-y: scroll;">';
    show_row_map($link,$chat_item);
    while($chat_item=mysqli_fetch_array($result_chat)){
        show_row_map($link,$chat_item);
    }
    echo '</div>';
    exit;
}

if($func=='delete_brain'){
    $id=$_GET['id'];
    $langsel=$_GET['lang'];
    $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE ((`md5` = '$id'));");
    if(mysqli_error($link)==""){
        $filename = 'app_mygirl/app_my_girl_'.$langsel.'_brain/'.$id.'.mp3';
        if (file_exists($filename)) {
            unlink($filename);
            echo "Có tệp âm thanh $filename đã xóa";
        } else {
            echo "Không có tệp âm thanh";
        }
        echo "- Xóa thành công!";
    }else{
        echo mysqli_error($link);
    }
    exit;
}

if($func=='ping_remove_father'){
    $id=$_POST['id'];
    $langsel=$_POST['lang_brain'];
    $status=$_POST['status'];
    $query_update_brain=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `ping_father` = '$status' WHERE `md5` = '$id' AND `langs` = '$langsel' LIMIT 1;");
    exit;
}

if($func=='delete_brain_father'){
    $id=$_GET['id'];
    $langsel=$_GET['lang'];
    $query_update=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `id_question` = '',`type_question` = ''  WHERE ((`md5` = '$id')) AND (`langs`='$langsel');");
    if(mysqli_error($link)==""){
        echo "-- gỡ câu thoại cha thành công id:('.$id.')--\n";
    }else{
        echo mysqli_error($link);
    }
    exit;
}

if($func=='change_brain'){
    $id=$_POST['id'];
    $langsel=$_POST['lang_brain'];
    $c_answer=addslashes($_POST['c_answer']);
    $c_question=addslashes($_POST['c_question']);
    $c_brain_effect=$_POST['c_brain_effect'];
    $c_brain_links=$_POST['links'];
    $query_update=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `question` = '$c_question', `answer` = '$c_answer', `effect` = '$c_brain_effect' , `links`='$c_brain_links'  WHERE ((`md5` = '$id')) AND (`langs`='$langsel');");
    if(mysqli_error($link)==""){
        echo "Cập nhật thành công bản nháp id:('.$id.')\n";
    }else{
        echo mysqli_error($link);
    }
    exit;
}

if($func=='delete_report'){
    $id_chat=$_GET['id_chat'];
    $type_chat=$_GET['type_chat'];
    $lang_chat=$_GET['lang'];
    $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_report` WHERE `id_question` = '$id_chat' AND `type_question` = '$type_chat' AND `lang` = '$lang_chat'");
    if(mysqli_error($link)==""){
        echo "Đã sửa! Xóa thành công báo cáo!";
    }else{
        echo mysqli_error($link);
    }
    exit;
}


if($func=='show_effect_chat'){
    $tag=$_GET['tag'];
    $limit=200;
    if($tag==''||$tag=='rand'){
        $query_count_all_effect = mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_effect`");
    }else{
        $query_count_all_effect = mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_effect` WHERE `tag` = '$tag' ");
    }

    $data_count_effect = mysqli_fetch_array($query_count_all_effect);
    $total_records = $data_count_effect['c'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    if($tag==''){
        $list_effect=mysqli_query($link,"SELECT `id`,`color` FROM `app_my_girl_effect` LIMIT $start, $limit ");
    }else{
        if($tag=='rand'){
            $list_effect=mysqli_query($link,"SELECT `id`,`color` FROM `app_my_girl_effect`  LIMIT $start, $limit ");
        }else{
            $list_effect=mysqli_query($link,"SELECT `id`,`color` FROM `app_my_girl_effect` WHERE `tag` = '$tag' LIMIT $start, $limit ");
        }
    }
    echo '<div><input onchange="search_effect(this);" placeholder="Seach effect"  type="text" value="" style="display:block;background:#c3c3c3" /></div>';
    if($total_page>1) {
        echo '<div style="margin-bottom: 5px;">Trang :';
        for ($i = 1; $i <= $total_page; $i++) {
            $colo_btn = 'blue';
            if ($i == $current_page) {
                $colo_btn = 'black';
            }
            echo '<span onclick="show_effect_chat(\''.$tag.'\',\''.$i.'\')"  class="buttonPro '. $colo_btn.' small">' . $i . '</span>';
        }
        echo '</div>';
    }
    echo "<div style='width:96%;float:left;overflow: auto;height: 300px;' id='table_effect'>";
    while($row_effect=mysqli_fetch_array($list_effect)){
        $url_effct='app_mygirl/obj_effect/'.$row_effect['id'].'.png';
        if($tag==''){
            echo '<img onclick="sel_effect('.$row_effect['id'].',\''.$row_effect['color'].'\');return false" style="cursor: pointer;" src="'.thumb($url_effct,'28x28').'.png"/>';
        }else{
            echo '<img onclick="sel_effect('.$row_effect['id'].',\''.$row_effect['color'].'\');return false" style="cursor: pointer;" src="'.thumb($url_effct,'35x35').'.png"/>';
        }
    }
    echo "</div>";
    if($total_page>1) {
        echo '<div style="margin-top: 5px;float: left;width: 100%;">Trang :';
        for ($i = 1; $i <= $total_page; $i++) {
            $colo_btn = 'blue';
            if ($i == $current_page) {
                $colo_btn = 'black';
            }
            echo '<span onclick="show_effect_chat(\''.$tag.'\',\''.$i.'\')"  class="buttonPro '. $colo_btn.' small">' . $i . '</span>';
        }
        echo '</div>';
    }
    mysqli_free_result($list_effect);
    exit;
}


if($func=='search_effect'){
    $txt=$_GET['txt'];
    $list_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` WHERE `name` LIKE '%$txt%' LIMIT 200");
    while($row_effect=mysqli_fetch_array($list_effect)){
        $url_effct='app_mygirl/obj_effect/'.$row_effect[0].'.png';
        echo '<img onclick="sel_effect('.$row_effect[0].',\''.$row_effect[4].'\');return false" style="cursor: pointer;" src="'.thumb($url_effct,'40x40').'.png"/>';
    }
    mysqli_free_result($list_effect);
    exit;
}


    class char{
        public $arr_date=array();
        public $arr_count=array();
        public $arr_android=array();
        public $arr_ios=array();
        public $arr_ver1=array();
        public $arr_ver2=array();
    }
    $c=new char();

if($func=='show_char_all_data_os'){
    $list_log=mysqli_query($link,"SELECT * FROM `app_my_girl_log_data` where `android`!=''");
    while($row_log=mysqli_fetch_array($list_log)){
        array_push($c->arr_date,$row_log[0]);
        array_push($c->arr_android,$row_log['android']);
        array_push($c->arr_ios,$row_log['ios']);
    }
    mysqli_free_result($list_log);
    echo json_encode($c);
    exit;
}

if($func=='show_char_all_data_ver'){
    $list_log=mysqli_query($link,"SELECT * FROM `app_my_girl_log_data` where `ver1`!=''");
    while($row_log=mysqli_fetch_array($list_log)){
        array_push($c->arr_date,$row_log[0]);
        array_push($c->arr_ver1,$row_log['ver0']);
        array_push($c->arr_ver2,$row_log['ver1']);
    }
    mysqli_free_result($list_log);
    echo json_encode($c);
    exit;
}

if($func=='show_data_month'){

    Class Data_log_item{
        public $label='';
        public $fill=false;
        public $data=array();
        public $backgroundColor='#3366ff';
    }
       
    $list_log=mysqli_query($link,"SELECT * FROM `app_my_girl_log_month`");
    while($row_log=mysqli_fetch_array($list_log)){
        array_push($c->arr_date,$row_log[0]);
        array_push($c->arr_ver1,$row_log[1]);
    }
    mysqli_free_result($list_log);
    echo json_encode($c);
    exit;
}

if($func=='show_data_in_month'){

    Class Data_log_item{
        public $label='';
        public $fill=false;
        public $data=array();
        public $backgroundColor='#3366ff';
    }
    $item_log=array();
    $data_row_log=array();
       
    $list_log=mysqli_query($link,"SELECT * FROM `app_my_girl_log_data`");
    while($row_log=mysqli_fetch_array($list_log)){
        array_push($c->arr_date,$row_log[0]);
        array_push($data_row_log,$row_log[2]);
    }
    
    for($i=0;$i<count($data_row_log);$i++){
        $d=json_decode($data_row_log[$i]);
        for($n=0;$n<count($d);$n++){
            $d_2=$d[$n];
            $i_log=new Data_log_item();
            $i_log->label=$d_2->key;
            $i_log->data=$d_2->count;
            array_push($item_log,$i_log);
        }
    }
    
    $c->arr_count=$item_log;
    mysqli_free_result($list_log);
    echo json_encode($c);
    exit;
}


if($func=='select_random_effect'){
    
    class Effect_chat{
        public $id="";
        public $color="";
    }
    
    $effect_chat=new Effect_chat();
    
    $tag_effect=$_GET['tag'];
    if($tag_effect==''){
        $rand_id_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` ORDER BY RAND() LIMIT 1");
    }else{
        $rand_id_effect=mysqli_query($link,"SELECT * FROM `app_my_girl_effect` WHERE `tag` = '$tag_effect' ORDER BY RAND() LIMIT 1");
    }
    $data_effect=mysqli_fetch_array($rand_id_effect);
    
    $effect_chat->id=$data_effect[0];
    $effect_chat->color=$data_effect[4];
    
    echo json_encode($effect_chat);
    exit;
}


if(isset($_POST['save_lyric'])){
    $type_save=$_POST['save_lyric'];
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    $lyrics=$_POST['lyrics'];
    $lyrics=addslashes($lyrics);
    $user_name='';
    if(isset($_POST['user_name'])){
        $user_name=$_POST['user_name'];
    }
    $show_lyrics=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang."_lyrics` WHERE `id_music` = '$id_music' LIMIT 1");
    if(mysqli_num_rows($show_lyrics)==0){
        mysqli_query($link,"INSERT INTO `app_my_girl_".$lang."_lyrics` (`id_music`, `lyrics`) VALUES ('$id_music', '$lyrics');");
        echo mysqli_error($link);
        if($type_save=="0"){
            echo "Thêm mới thành công !";
        }
    }else{
        mysqli_query($link,"UPDATE `app_my_girl_".$lang."_lyrics` SET `lyrics` = '$lyrics' WHERE `id_music` = '$id_music'");
        echo mysqli_error($link);
        if($type_save=="0"){
            echo "Cập nhật thành công !";
        } 
    }
    if($type_save!="0"){
        echo $lyrics;
    }
    if($user_name!=''){
        //$add_work=mysqli_query($link,"INSERT INTO carrotsy_work.`work_chat` (`id_chat`, `type_chat`, `user_name`,`type_action`,`lang_chat`, `dates`) VALUES ('$id_music', 'chat', '$user_name','edit','$lang','$date_cur')");
    }
    mysqli_free_result($show_lyrics);
    exit;
}


if(isset($_POST['save_video'])){
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    $link_video=$_POST['link'];
    $user_name='';
    if(isset($_POST['user_name'])){
        $user_name=$_POST['user_name'];
    }
    $check_video=mysqli_query($link,"SELECT * FROM `app_my_girl_video_$lang` WHERE  `id_chat` = '$id_music' LIMIT 1");
    if(mysqli_num_rows($check_video)==0){
        mysqli_query($link,"INSERT INTO `app_my_girl_video_$lang` (`id_chat`, `link`) VALUES ('$id_music', '$link_video');");
        echo mysqli_error($link);
    }else{
        mysqli_query($link,"UPDATE `app_my_girl_video_$lang` SET `link` = '$link_video' WHERE  `id_chat` = '$id_music'");
        echo mysqli_error($link);
    }
    echo $link_video;
    
    exit;
}

if(isset($_POST['view_lyric'])){
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    $msql_check_lyric=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang."_lyrics` WHERE `id_music` = '".$id_music."' LIMIT 1");
    $data_lyrics=mysqli_fetch_array($msql_check_lyric);
    mysqli_free_result($msql_check_lyric);
    echo $data_lyrics[1];
    exit;
}

if(isset($_POST['delete_select_brain'])){
    $langsel=$_POST['lang'];
    
    $arr_id=json_decode($_POST['delete_select_brain']);
    echo "Xóa các câu dạy ngôn ngữ (".$langsel.")\n";
    foreach($arr_id as $id_row){
        $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE ((`md5` = '$id_row'));");
        if(mysqli_error($link)==""){
            echo "--Xóa duyệt id:('.$id_row.')--\n";
            $filename = 'app_mygirl/app_my_girl_'.$langsel.'_brain/'.$id_row.'.mp3';
            if (file_exists($filename)) {
                unlink($filename);
                echo "Có tệp âm thanh $filename đã xóa";
            } else {
                echo "Không có tệp âm thanh";
            }
            echo "-> Xóa thành công!\n";
            echo "--------\n";
        }else{
            echo mysqli_error($link);
        }
    }
    exit;
}


if($func=='approved_brain'){
    $id_chat=$_GET['id_chat'];
    $lang=$_GET['lang'];
    $query_update_brain=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `approved` = '1' WHERE `md5` = '$id_chat' AND `langs` = '$lang'  LIMIT 1;");
    mysqli_free_result($query_update_brain);
    $query_brain=mysqli_query($link,"SELECT * FROM `app_my_girl_brain` WHERE `md5` = '$id_chat' AND `langs` = '$lang' LIMIT 1");
    $data_brain=mysqli_fetch_array($query_brain);
    if(strlen($data_brain['color_chat'])>=6){
        $txt_color_chat=str_replace('#','',$data_brain['color_chat']);
        $txt_color_chat=substr($txt_color_chat,0,6);
        $txt_color_chat='color='.$txt_color_chat;
    }else{
        $txt_color_chat='color='.str_replace('#','',$data_brain['color_chat']);
    }
    $txt_add_father='';
    if($data_brain['id_question']!=""){
        $txt_add_father='&type_question='.$data_brain['type_question'].'&id_question='.$data_brain['id_question'];
    }
    
    $txt_add_links='';
    if($data_brain['links']!=""){
        $txt_add_links='&link='.$data_brain['links'];
    }
    echo $url.'/app_my_girl_add.php?key='.$data_brain['question'].'&lang='.$data_brain['langs'].'&answer='.$data_brain['answer'].'&sex='.$data_brain['sex'].'&effect='.$data_brain['effect'].'&action='.$data_brain['status'].'&character_sex='.$data_brain['character_sex'].'&'.$txt_color_chat.''.$txt_add_father.''.$txt_add_links;
    exit;
}

if($func=='edit_brain'){
    $id_brain=$_GET['id_brain'];
    $question=addslashes($_GET['question']);
    $answer=addslashes($_GET['answer']);
    
    $lang=$_GET['lang'];
    $query_update_brain=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `question` = '$question', `answer` = '$answer' WHERE `md5` = '$id_brain' AND `langs` = '$lang'  LIMIT 1;");
    mysqli_free_result($query_update_brain);
    if(mysqli_error($link)==""){
        echo "Cập nhật câu dạy thành công!!!";
    }else{
        echo mysqli_error($link);
    }
    exit;
}

if($func=='show_type_chat_same'){
    $lang_sel=$_GET['lang'];
    $sex=$_GET['sex'];
    $character_sex=$_GET['char_sex'];
    $key=$_GET['key'];
    $type=$_GET['type'];
    if($type=='1'){
        $result_chat_key_same=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` = '$key' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `pater`='' AND `id_redirect`=''");
    }else{
       $result_chat_key_same=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` = '$key' AND `sex`='$sex' AND `character_sex`='$character_sex'"); 
    }
    if(mysql_numrows($result_chat_key_same)>0){
        while($row_key=mysqli_fetch_array($result_chat_key_same)){
            echo show_row_chat_prefab($row_key,$lang_sel,'');

        }
    }
    session_start();
    $_SESSION['show_type_chat_same']=$type;
    exit;
}

if(isset($_POST['draft_brain'])){
    $langsel=$_POST['lang'];
    $user_work=$_POST['user_work'];
    $arr_id=json_decode($_POST['draft_brain']);
    echo "Chuyển vào chờ duyệt ngôn ngữ (".$langsel.")\n";
    foreach($arr_id as $id_row){
        $query_update=mysqli_query($link,"UPDATE `app_my_girl_brain` SET `tick` = '1',`effect` = '0',`user_work_id`='$user_work'  WHERE ((`md5` = '$id_row')) AND (`langs`='$langsel');");
        if(mysqli_error($link)==""){
            echo "--Cập nhật thành công id:('.$id_row.')--\n";
        }else{
            echo mysqli_error($link);
        }
    }
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
    $s=$_GET['s'];
    $s_from=$_GET['s_from'];
    $s_to=$_GET['s_to'];
    $url_s=encodeURI("https://translate.googleapis.com/translate_a/single?client=gtx&sl=$s_from&tl=$s_to&dt=t&dt=t&q=$s");
    $a=get_content($url_s);
    $a=json_decode($a); 
    $show=$a[0][0][0];
    echo $show;
    exit;
}

if($func=='remove_chat_father'){
    $id_chat=$_GET['id'];
    $lang=$_GET['lang'];
    $query_remove_father=mysqli_query($link,"UPDATE `app_my_girl_$lang` SET `pater` = '', `pater_type` = '' WHERE `id` = '$id_chat';");
    if($query_remove_father){
        echo "-- Gỡ bỏ thành công câu trò chuyện ra khỏi cha, câu trò chuyện này đã trở thành câu thoại toàn cục --";
    }else{
        echo "-- Gỡ bỏ không thành công!!! --";
    }
    exit;
}


if($func=='save_avatar_music'){
    $id_ytb=$_POST['id_ytb'];
    $id_music=$_POST['id_music'];
    $lang_sel=$_POST['lang'];
    $url ="http://img.youtube.com/vi/$id_ytb/sddefault.jpg";
    $img = 'app_mygirl/app_my_girl_'.$lang_sel.'_img/'.$id_music.'.png';
                            
    $ch = curl_init($url);
    $fp = fopen($img, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    echo $url_carrot_store.'/'.$img;
    exit;
}

if($func=='save_avatar_music_url'){
    $id_music=$_POST['id_music'];
    $lang_sel=$_POST['lang'];
    $url =$_POST['url_img'];
    $img = 'app_mygirl/app_my_girl_'.$lang_sel.'_img/'.$id_music.'.png';
                            
    $ch = curl_init($url);
    $fp = fopen($img, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    echo $url_home.'/'.$img;
    exit;
}

if($func=='create_url_slug_music'){
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    $name_song=$_POST['name_song'];
    $url_slug=slug_url(vn_to_str($name_song)).'-'.$id_music;
    $query_update_slug=mysqli_query($link,"UPDATE `app_my_girl_$lang` SET `slug` = '$url_slug' WHERE `id` = '$id_music';");
    echo '<a href="'.$url.'/song/'.$lang.'/'.$url_slug.'" target="_blank">'.$url.'/song/'.$lang.'/<b style="color: #ff5e00;">'.$url_slug.'</b></a>';
    exit;
}

if($func=='update_info_music'){
    $type='0';
    if(isset($_POST['type'])){
        $type=$_POST['type'];
    }
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    if($type=='0') {
        $song_artist = addslashes(trim($_POST['song_artist']));
        $song_album = addslashes(trim($_POST['song_album']));
        $song_year = addslashes(trim($_POST['song_year']));
        $song_genre = addslashes(trim($_POST['song_genre']));
    }else{
        $song_artist = addslashes(trim($_POST['artist']));
        $song_album = addslashes(trim($_POST['album']));
        $song_year = addslashes(trim($_POST['year']));
        $song_genre = addslashes(trim($_POST['genre']));
        echo json_encode($_POST);
    }
    $song_genre=str_replace("&"," and ",$song_genre);
    $query_update_info_music=mysqli_query($link,"UPDATE `app_my_girl_".$lang."_lyrics` SET `artist` = '$song_artist', `album` = '$song_album', `year` = '$song_year', `genre` = '$song_genre' WHERE `id_music` = '$id_music' LIMIT 1;");
    exit;
}


if ($func == 'get_chat_by_audio_url') {
    $url_file=$_GET['url_file'];
    $extrac='';
    if(isset($_GET['extrac'])){
        $extrac=$_GET['extrac'];
    }
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_array($query_list_lang)) {
        $lang=$row_lang['key'];
        $query_check_chat = mysqli_query($link,"SELECT `id`,`chat` FROM `app_my_girl_".$lang."` WHERE `file_url` = '$url_file' AND `file_url` != '' LIMIT 1");
        if(mysqli_num_rows($query_check_chat)>0) {
            $data_chat = mysqli_fetch_array($query_check_chat);
            if($extrac=='') {
                $c->{'error'}='0';
                $c->data = "Đối tượng sử dụng tệp này<br/><a target='_blank' href='".$url."/app_my_girl_update.php?id=" . $data_chat['id'] . "&lang=$lang'>" . $data_chat['id'] . " - " . $data_chat['chat'] . "</a>";
                echo 'datacallback(' . json_encode($c) . ')';
                exit;
            }else{
                $c->{'error'}='0';
                $c->data =$data_chat['chat'];
                $c->{'song_lang'}=$lang;
                $c->{'id_song'}=$data_chat['id'];
                $img_url_avatar = 'app_mygirl/app_my_girl_' . $lang . '_img/' . $data_chat['id'] . '.png';
                $img_url_avatar_sever ='';
                $txt_link_video='';
                $check_video = mysqli_query($link,"SELECT * FROM `app_my_girl_video_$lang` WHERE  `id_chat` = '".$data_chat['id']."' LIMIT 1");
                if (mysqli_num_rows($check_video) > 0) {
                    $data_video = mysqli_fetch_array($check_video);
                    $txt_link_video = $data_video['link'];
                    parse_str(parse_url($txt_link_video, PHP_URL_QUERY), $my_array_of_vars);
                    $txt_link_thumb = $my_array_of_vars['v'];
                    $img_url_avatar_sever='http://img.youtube.com/vi/'.$txt_link_thumb.'/sddefault.jpg';
                }

                if (file_exists($img_url_avatar)) {
                    $img_url_avatar_sever = $url . '/' . $img_url_avatar;
                }

                $c->{'linkytb'}=$txt_link_video;
                $c->{'avatar'}=$img_url_avatar_sever;
                $txt_lyrics = '';
                $show_lyrics = mysqli_query($link,"SELECT * FROM `app_my_girl_" . $lang . "_lyrics` WHERE  `id_music` = '".$data_chat['id']."' LIMIT 1");
                if (mysqli_num_rows($show_lyrics) > 0) {
                    $data_lyrics = mysqli_fetch_array($show_lyrics);
                    $txt_lyrics = $data_lyrics[1];
                }
                mysqli_free_result($show_lyrics);
                $c->{'lyrics'}=$txt_lyrics;
                echo 'gettitlecallback(' . json_encode($c) . ')';
                exit;
            }
        }
    }
    if($extrac=='') {
        $c->{'error'}='1';
        $c->data = "Không tìm thấy đối tượng sử dụng <br/> <i>Nên xóa tệp tin này để đảm bảo tính dư thừa dữ liệu</i>";
        echo 'datacallback(' . json_encode($c) . ')';
    }else{
        $c->{'error'}='1';
        $c->data = "Không tìm thấy đối tượng sử dụng <br/> <i>Nên xóa tệp tin này để đảm bảo tính dư thừa dữ liệu</i>";
        echo 'gettitlecallback(' . json_encode($c) . ')';
    }
    exit;
}

if($func=='update_carrotstore_music'){
    $data_song_id=$_GET['data_song_id'];
    $data_song_artist=addslashes($_GET['data_song_artist']);
    $data_song_album=addslashes($_GET['data_song_album']);
    $data_song_year=$_GET['data_song_year'];
    $data_song_genre=addslashes($_GET['data_song_genre']);
    $data_song_lang=$_GET['data_song_lang'];
    $query_update_music=mysqli_query($link,"UPDATE `app_my_girl_".$data_song_lang."_lyrics` SET `artist` = '$data_song_artist',`album` = '$data_song_album',`year` = '$data_song_year',`genre` = '$data_song_genre' WHERE `id_music` = '$data_song_id' LIMIT 1;");
    if(mysqli_error($link)==''){
        $c->{'error'}='0';
    }else{
        $c->{'error'}='1';
        $c->data=mysqli_error($link);
    }
    echo 'updatemusiccarrotstorecallback(' . json_encode($c) . ')';
    exit;
}

if ($func == 'login_work') {
    $username=$_GET['username'];
    $password=$_GET['password'];
    $query_login_work=mysqli_query($link,"SELECT * FROM  carrotsy_work.`work_user` WHERE `user_name` = '$username' AND `user_pass` = '$password' LIMIT 1");
    if(mysqli_num_rows($query_login_work)>0){
        $data_user=mysqli_fetch_array($query_login_work);
        $c->{'username'}=$data_user['user_name'];
        $c->{'avatar'}=$url_work.'/img.php?url=avatar_user/'.$data_user['user_id'].'.png&size=20';
        $c->{'id'}=$data_user['user_id'];
        if($data_user['full_name']!='') {
            $c->{'full_name'} = $data_user['full_name'];
        }else{
            $c->{'full_name'} = $data_user['user_name'];
        }
        $c->{'error'} = "0";
    }else{
        $c->{'error'} = "1";
    }
    echo 'logincallback(' . json_encode($c) . ')';
    exit;
}

if($func=='data_syn_get_table'){
    $name_table=$_POST['table'];
    $query_data=mysqli_query($link,"select * FROM `$name_table`");
    echo mysqli_error($link);
    $data=array();
    while ($row=mysql_fetch_assoc($query_data)){
        array_push($data,$row);
    }
    $txt_data=json_encode($data);
    file_put_contents("data_temp/data_table.txt",$txt_data);
    echo $url.'/data_temp/data_table.txt';
    exit;
}

if($func=='check_data_syn'){
    class item_table{
        public $key_table='';
        public $count_table='';
    }
    $table=$_POST['table'];
    $arr_table=json_decode($table);
    $arr_item=array();
    for($i=0;$i<count($arr_table);$i++){
        $item=new item_table();
        $item->key_table=$arr_table[$i];
        $k_table=$arr_table[$i];
        $query_count=mysqli_query($link,"SELECT COUNT(1) as c FROM `$k_table`");
        $data_count=mysqli_fetch_assoc($query_count);
        $item->count_table=$data_count['c'];
        array_push($arr_item,$item);
    }
    echo json_encode($arr_item);
    exit;
}

if($func=='count_data_syn'){
    class item_table{
        public $key_table='';
        public $count_table='';
    }
    $table=$_POST['table'];
    $arr_table=json_decode($table);
    $arr_item=array();
    for($i=0;$i<count($arr_table);$i++){
        $item=new item_table();
        $item->key_table=$arr_table[$i];
        $k_table=$arr_table[$i];
        $query_count=mysqli_query($link,"SELECT *  FROM `$k_table`");
        if($query_count) {
            $item->count_table = mysqli_num_rows($query_count);
        }else{
            $item->count_table=0;
        }
        array_push($arr_item,$item);
    }
    echo json_encode($arr_item);
    exit;
}

?>