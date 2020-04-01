<?php
header('Content-type: text/html; charset=utf-8');
include "app_my_girl_template.php";
$sel_lang='vi';
$sel_sex_user='-1';
$sel_sex_char='-1';
$check_key_tip='1';

$count_lenth=500;
if(isset($_GET['skip'])){
    $skip=$_GET['skip'];
    if($skip=='0'){
        $count_lenth=$_SESSION['mission_count'];
    }else{
        $count_lenth=$_SESSION['mission_count'];
        $count_lenth=$count_lenth-1;
        $_SESSION['mission_count']=$count_lenth;
    }
}else{
    $_SESSION['mission_count']=$count_lenth;
}



if(isset($_POST['sel_lang'])){
    $_SESSION['sel_lang_miss']=$_POST['sel_lang'];
    $sel_lang=$_SESSION['sel_lang'];
    $_SESSION['sel_sex_user']=$_POST['sel_sex_user'];
    $sel_sex_user=$_SESSION['sel_sex_user'];
    $_SESSION['sel_sex_char']=$_POST['sel_sex_char'];
    $sel_sex_char=$_SESSION['sel_sex_char'];
    $check_key_tip=$_POST['check_key_tip'];
    echo 'Thay đổi thành công!!!';
}


if(isset($_SESSION['sel_lang_miss'])){
    $sel_lang=$_SESSION['sel_lang_miss'];
}
if(isset($_SESSION['sel_sex_user'])){
    $sel_sex_user=$_SESSION['sel_sex_user'];
}
if(isset($_SESSION['sel_sex_char'])){
    $sel_sex_char=$_SESSION['sel_sex_char'];
}

$sql_query_sex='';
if($sel_sex_user!='-1'){
    $sql_query_sex=" AND `sex`='$sel_sex_user'  ";
}

$sql_query_sex_char='';
if($sel_sex_char!='-1'){
    $sql_query_sex_char=" AND `character_sex`='$sel_sex_char' ";
}

if($check_key_tip=='1') {
    $arr_tip_key = array();
    $query_tip_chat = mysql_query("SELECT `text` FROM `app_my_girl_" . $sel_lang . "` WHERE `tip` = '1' $sql_query_sex_char");
    while ($row_tip = mysql_fetch_array($query_tip_chat)) {
        array_push($arr_tip_key, $row_tip['text']);
    }
}

if($check_key_tip=='1') {
    $query_get_chat = mysql_query("SELECT * FROM `app_my_girl_key` WHERE char_length(`key`) <20 AND `key` NOT IN ( '" . implode("', '", $arr_tip_key) . "' ) AND `lang` = '$sel_lang'   $sql_query_sex $sql_query_sex_char ORDER BY RAND() LIMIT 1");
}else{
    $query_get_chat = mysql_query("SELECT * FROM `app_my_girl_key` WHERE  char_length(`key`) <20 AND `lang` = '$sel_lang'   $sql_query_sex $sql_query_sex_char ORDER BY RAND() LIMIT 1");
}

$data_chat=mysql_fetch_array($query_get_chat);
$id_device=$data_chat['id_device'];
$sex=$data_chat['sex'];
$character_sex=$data_chat['character_sex'];
$id_father='';
$link_edit_show_chat='';
if($data_chat['id_question']!=''){
    $id_father=$data_chat['id_question'];
    if($data_chat['type_question']=='chat'){
        $query_father_chat=mysql_query("SELECT `chat` FROM `app_my_girl_$sel_lang` WHERE `id` = '$id_father' LIMIT 50");
        $link_edit_show_chat=$url."/app_my_girl_update.php?id=$id_father&lang=$sel_lang";
    }else{
        $query_father_chat=mysql_query("SELECT `chat` FROM `app_my_girl_msg_$sel_lang` WHERE `id` = '$id_father' LIMIT 50");
        $link_edit_show_chat=$url."/app_my_girl_update.php?id=$id_father&lang=$sel_lang&msg=1";
    }
    $data_father=mysql_fetch_array($query_father_chat);
    mysql_free_result($query_father_chat);
}
?>
<div class="body">
<div style="float: left;width:100%;font-size: 20px;">
    Trả lời trò chuyện của người dùng
</div>
    
<form style="margin: 5px;float: left;width: 80%;background-color: whitesmoke;padding: 10px;" action="" method="post">
    <div style="float: left;width: 200px;margin: 3px;">
        Chọn ngôn ngữ: <br />
        <select id="sel_lang" style="width: 200px;" name="sel_lang">
            <?php 
            $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active` = '1'");
            while($row_lang=mysql_fetch_array($list_country)){
            ?>
            <option value="<?php echo $row_lang['key'];?>" <?php if($sel_lang==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
            <?php }?>
        </select>
    </div>
    
    <div style="float: left;width: 160px;margin: 3px;">
        Giới tính người dùng:<br />
        <select name="sel_sex_user">
            <option value="-1" <?php if($sel_sex_user=='-1'){?> selected="true"<?php }?>>Ngẫu nhiên</option>
            <option value="0" <?php if($sel_sex_user=='0'){?> selected="true"<?php }?>>Nam</option>
            <option value="1" <?php if($sel_sex_user=='1'){?> selected="true"<?php }?>>Nữ</option>
        </select>
    </div>
    
    <div style="float: left;width: 160px;margin: 3px;">
        Giới tính nhân vật:<br />
        <select name="sel_sex_char">
            <option value="-1" <?php if($sel_sex_char=='-1'){?> selected="true"<?php }?>>Ngẫu nhiên</option>
            <option value="0" <?php if($sel_sex_char=='0'){?> selected="true"<?php }?>>Nam</option>
            <option value="1" <?php if($sel_sex_char=='1'){?> selected="true"<?php }?>>Nữ</option>
        </select>
    </div>

    <div style="float: left;width: 160px;margin: 3px;">
        Loại trừ từ khóa gợi ý
        <select name="check_key_tip">
            <option value="1" <?php if($check_key_tip=='1'){?> selected="true" <?php }?>>Bật</option>
            <option value="0" <?php if($check_key_tip=='0'){?> selected="true" <?php }?>>Tắt</option>
        </select>
    </div>
    
    <div style="float: left;width: 100px;margin: 3px;">
        <button class="buttonPro small" >Thay đổi</button>
    </div>
</form>


<div style="float: left;width: 100%">
<div  style="width: 50%;border: solid 4px #DFDFDF;margin: 3px; float: left;text-align: center;background-color: #F2F2F2;">
<?php if($count_lenth>=1){?>
    <div style="padding-top: 20px;padding-bottom: 20px;background-color: #DFDFDF;width: 100%;float: left;">Trả lời câu hỏi của người dùng</div>
    <div style="text-align: center;width: 95%;padding: 10px;">
    <i>Người dùng  <img src="<?php $url;?>/app_mygirl/img/<?php echo $data_chat["sex"] ?>.png" /> Nói chuyện với nhân vật <img src="<?php $url;?>/app_mygirl/img/<?php echo $data_chat["character_sex"] ?>.png" /> người yêu ảo</i>
    <br /><br />
    Người yêu ảo<b><img src="<?php $url;?>/app_mygirl/img/<?php echo $data_chat["character_sex"] ?>.png" />=> "<a target="_blank" href="<?php echo $link_edit_show_chat;?>"><?php echo $data_father['chat'] ?></a>"</b><br />
    <?php if($sel_lang!='vi'){?>
        Dịch thuật:<div style="font-weight: bold;" id="answer_char"></div>
    <?php }?>
    Người dùng<b><img src="<?php $url;?>/app_mygirl/img/<?php echo $data_chat["sex"] ?>.png" />=> "<?php echo $data_chat['key'] ?>"</b>
    <?php if($sel_lang!='vi'){?>
        <br />
        Dịch thuật:<div style="font-weight: bold;" id="question_char"></div>
    <?php }?>
    <br /><br />
    
    <?php if($id_father!=''){?>
    <a href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $sel_lang;?>&sex=<?php echo $data_chat["sex"] ?>&character_sex=<?php echo $data_chat["character_sex"] ?>&key=<?php echo $data_chat['key'] ?>&type_question=<?php echo $data_chat['type_question'];?>&id_question=<?php echo $id_father;?>" class="buttonPro small blue" target="_blank"><i class="fa fa-plus" aria-hidden="true"></i> Trả lời đầy đủ (cục bộ)</a>
    <?php }?>
    <a href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $sel_lang;?>&sex=<?php echo $data_chat["sex"] ?>&character_sex=<?php echo $data_chat["character_sex"] ?>&key=<?php echo $data_chat['key'] ?>" class="buttonPro small blue" target="_blank"><i class="fa fa-plus-square" aria-hidden="true"></i> Trả lời (Toàn cục)</a>
    <a href="<?php echo $url;?>/app_my_girl_handling.php?func=check_key&key=<?php echo $data_chat['key'] ?>&sex=<?php echo $data_chat["sex"] ?>&character_sex=<?php echo $data_chat["character_sex"] ?>" class="buttonPro small yellow"  target="_blank"><i class="fa fa-share-square-o" aria-hidden="true"></i> kiểm tra trả lời</a>
    <a href="<?php echo $url;?>/app_my_girl_mission.php?skip=0" class="buttonPro small orange"><i class="fa fa-fast-forward" aria-hidden="true"></i> Bỏ qua</a>
    <a href="<?php echo $url;?>/app_my_girl_mission.php?skip=1" class="buttonPro small green"><i class="fa fa-check-circle" aria-hidden="true"></i> Hoàn tất</a>
    </div>
<?php }else{?>
    <strong><i class="fa fa-thumbs-up" aria-hidden="true"></i> Đã xong! Làm tốt lắm</strong>
<?php }?>
</div>

    <div class="contain notranslate" style="background-color: #fefff5;padding: 0px;width: 40%;float: left" id="form_loc">
        <div style="width: 100%;float: left;background-color: #6edfff;">
            <strong style="padding: 10px;float: left;"><i class="fa fa-info-circle" aria-hidden="true"></i> Những lưu ý khi trả lời những câu trò chuyện của người dùng</strong>
        </div>
        <div style="float: left;padding: 10px;overflow-y: scroll;max-height: 200px;">
            <ul style="list-style: lower-latin;">
                <li>Đúng chính tả,ngữ pháp. không được viết tắt</li>
                <li>Cố gắng khai thát và tưởng tượng ra những câu trả lời thú vị . Thỉnh thoản dùng từ khóa <b>{ten_user}</b> để gọi tên người dùng vào câu trả lời trả lời (vd <a href="<?php echo $url;?>/app_my_girl_update.php?id=71022&lang=vi" target="_blank">như câu trò chuyện này - bấm vào để xem</a>)</li>
                <li>Chọn giới hạn mức độ thô tục cho phù hợp với nội dung (mức 1:Nhiêm ngặc- không có tình dục,ma túy,thuốt,súng,bom,mìn,bạo lực,kích động người dùng,mức 2:cho phép tình dục thô tục nhẹ,mức 3:có tình dục vừa phải,thô tục mức độ vừa phải,mức 4:có tình dục nặng,thô tục nặng)</li>
                <li>Thỉnh thoản thêm những câu trò chuyện hỏi lại người dùng sau câu trả lời để tăng tính tương tác trò chuyện liền mạch (vd <a href="<?php echo $url;?>/app_my_girl_update.php?id=70966&lang=vi" target="_blank">như câu trò chuyện này - bấm vào để xem</a>) và lôi kéo người dùng đánh giá ứng dụng, hoặc bấm vào quảng cáo hoặc like fanpage (vd <a href="<?php echo $url;?>/app_my_girl_update.php?id=70401&lang=vi" target="_blank">như câu trò chuyện này - bấm vào để xem</a>)</li>
                <li>Nếu người dùng nhờ mở hay bật tắt chức năng nào đó thì hãy chọn đúng chức năng <b>(effect)</b> liên quan khi nội dung câu dạy có đề cập tới (vd: "mở đèn pin giúp tôi"  nên thiết đặt chức năng tắt đèn pin "Tắt đèn phin" , "mở bài hát khác"  "Mở nhạc khác",Nếu người dùng muốn nhân vật cởi áo quần hoặc cho xem các bộ phận nhạy cảm trên cơ thể thì chọn  "Mở shop trang phục (ver 2 - 3D) (app) , nhằm tăng tỉ lệ mua hàng trong ứng dụng" v.v... ) nhớ kèm theo nội dung trả (chat) lời bình thường như người thật (vd <a href="<?php echo $url;?>/app_my_girl_update.php?id=61262&lang=vi" target="_blank">như câu trò chuyện này - bấm vào để xem</a>)</li>
                <li>Khi gặp những câu trả lời khó, hoặc không biết giải quyết thì có thể bỏ qua hoặc nhắn tin quản trị viên để được giúp đỡ tư vấn <i class="fa fa-smile-o" aria-hidden="true"></i></li>
            </ul>
        </div>
 </div>

<?php
mysql_free_result($query_get_chat);
?>
<br />
<div id="show_device" class="ui-dialog ui-corner-all ui-widget ui-widget-content ui-front ui-draggable ui-resizable" style="position: static;background-color: #878792;width: 90%;float: left;margin-top: 20px;">
<p id="dialog_data">
<h4>Nội dung đầy đủ của cuộc trò chuyện:</h4>
<?php
    $result_chat=mysql_query("SELECT * FROM `app_my_girl_key` WHERE `id_device`='$id_device'  AND `sex`='$sex' AND `character_sex`='$character_sex' ");
    $chat_item=mysql_fetch_array($result_chat);
    echo "<div style='width:100%;float:left;margin: 3px;'>ID device:".$chat_item['id_device']." Lang:".$lang_sel." Os:".$chat_item['os']." Version:".$chat_item['version'].'</div><hr/>';

    show_row_map($chat_item);
    while($chat_item=mysql_fetch_array($result_chat)){
        show_row_map($chat_item);
        mysql_free_result($result_chat1);
    }
    mysql_free_result($chat_item);
?>
</p>
</div>
<script>
function translate(s_from,s_to,s_show,emp_show){
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=translate&s_from="+s_from+"&s_to="+s_to+"&s="+s_show, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                $(emp_show).html(data);
            }
        });
}

$(document).ready(function(){
    translate("<?php echo $sel_lang;?>","vi","<?php echo $data_father['chat']; ?>",$("#answer_char"));
    translate("<?php echo $sel_lang;?>","vi","<?php echo $data_chat['key']; ?>",$("#question_char"));
});
</script>
</div>