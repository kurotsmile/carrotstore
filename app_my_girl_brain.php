<?php
include "app_my_girl_template.php";

$sex='0';
$langsel='vi';
$character_sex='1';
$is_music='';
$is_criterion='';
$txt_query_music='';
$is_unicode='';
$is_approved='0';
$sql_criterion='';
$lenth_answer='20';
$lenth_question='18';
$filter='0';

if(isset($_GET['sex'])){
    $sex=$_GET['sex'];
}

if(isset($_GET['character_sex'])){
    $character_sex=$_GET['character_sex'];
}

if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
}

if(isset($_GET['criterion'])){
    $is_criterion=$_GET['criterion'];
}

if(isset($_GET['approved'])){
    $is_approved=$_GET['approved'];
}

if(isset($_POST['sex'])){
    $sex=$_POST['sex'];
    $langsel=$_POST['lang'];
    if(isset($_POST['is_music'])) $is_music=$_POST['is_music'];
    if(isset($_POST['is_unicode'])) $is_unicode=$_POST['is_unicode'];
    if(isset($_POST['is_criterion'])) $is_criterion=$_POST['is_criterion'];
}

if(isset($_POST['character_sex'])){
    $character_sex=$_POST['character_sex'];
}

if(isset($_POST['filter'])){
    $filter='1';
    $lenth_answer=$_POST['lenth_answer'];
    $lenth_question=$_POST['lenth_question'];
    $sex=$_POST['sex'];
    $character_sex=$_POST['character_sex'];
    $langsel=$_POST['lang'];
}

if(isset($_POST)&&isset($_POST['clear'])){
    mysqli_query($link,"DELETE FROM `app_my_girl_brain` WHERE `langs`='$langsel' ");
    $files = glob('app_mygirl/app_my_girl_'.$langsel.'_brain/*'); // get all file names
    foreach($files as $file){ // iterate files
      if(is_file($file))
        echo "Delete file audio ".$file." <br/>";
        unlink($file); // delete file
    }
    echo "Delete all success!";
}

if($is_music!=''){
    $txt_query_music=" AND `effect`='1' ";
}

if($is_criterion!=''){
    $sql_criterion="AND `criterion`=1";
}


if($filter=='0'){
    if($is_approved=='0'){
        $result_tip=mysqli_query($link,"SELECT DISTINCT * FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `approved` = '0' AND `tick` = '0' $txt_query_music $sql_criterion ");
    }else{
        $result_tip=mysqli_query($link,"SELECT DISTINCT * FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `sex`='$sex' AND `character_sex`='$character_sex' AND `approved` = '1' AND `tick` = '0' $txt_query_music $sql_criterion ");  
    }
}else{
    $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_brain` WHERE `langs`='$langsel'  AND `sex`='$sex' AND `character_sex`='$character_sex' AND  LENGTH(`question`) > '$lenth_question'  AND LENGTH(`answer`) > '$lenth_answer' AND `question`!=`answer` AND `tick` = '0'");
}

?>
<script>
function delete_brain(id){
    var lang='<?php echo $langsel;?>';
    var character_sex='<?php echo $character_sex;?>';
    if(confirm("Có chắc là sẽ xóa cài này không mày?")){
        $(".brain_"+id).remove();
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=delete_brain&id="+id+"&lang="+lang+"&character_sex="+character_sex, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                   alert(data);
            }
        });
    
    }
    return false;
}

function delete_select(){
    if (confirm('Có chắc là sẽ xóa?')) {
        var id_arr=[];
        $(".sel_row").each(function() {
            if($(this).prop('checked')) {
                var id_del=$(this).val();
                id_arr.push(id_del);
                $('.chat_row_'+id_del).remove();
            }
        });
    
        
        $.ajax({
                url: "app_my_girl_jquery.php",
                type: "post", //kiểu dũ liệu truyền đi
                data: "delete_select_brain="+JSON.stringify(id_arr)+"&lang=<?php echo $langsel;?>", //tham số truyền vào
                success: function(data, textStatus, jqXHR)
                {
                    alert(data);
                }
            
        });
        
        return false;
    }
}

function draft_select(){
    if (confirm('Có chắc là chuyển và bản nháp để chờ xuất bản?')) {
        var id_arr=[];
        var user_work_send=$("#user_work_send").val();
        $(".sel_row").each(function() {
            if($(this).prop('checked')) {
                var id_del=$(this).val();
                id_arr.push(id_del);
                $('.chat_row_'+id_del).remove();
            }
        });
    
        
        $.ajax({
                url: "app_my_girl_jquery.php",
                type: "post", //kiểu dũ liệu truyền đi
                data: "draft_brain="+JSON.stringify(id_arr)+"&lang=<?php echo $langsel;?>&user_work="+user_work_send, //tham số truyền vào
                success: function(data, textStatus, jqXHR)
                {
                    alert(data);
                }
            
        });
        
        return false;
    }
}



function show_edit_brain(id_brain,lang_brain){
    var brain_question=$(".brain_"+id_brain+"_question").attr("title");
    var brain_links=$(".brain_"+id_brain+"_question").attr("links");
    var brain_answer=$(".brain_"+id_brain+"_answer").attr("title");
    var txt_effect='<select id="c_brain_effect">';
    txt_effect=txt_effect+'<option value="">None</option>';
    <?php
        for($i=0;$i<count($data_app->arr_function_app);$i++){
                $data_i=$data_app->arr_function_app[$i];
    ?>
        txt_effect=txt_effect+'<option value="<?php echo $data_i->key; ?>"><?php echo $data_i->name; ?></option>';
    <?php
        }
    ?>
    txt_effect=txt_effect+'</select>';
    
    var txt_add_key_func='';
    <?php
        foreach($arr_func as $key_func){
    ?>
         txt_add_key_func=txt_add_key_func+'<span class="buttonPro small" onclick="add_key_func(\'<?php echo $key_func; ?>\');return false;"><?php echo $key_func; ?></span>';
    <?php
        }
    ?>
    
    var html_show='<table>';
    html_show=html_show+'<tr><td><b>ID:</b></td><td>'+id_brain+'</td></tr>';
    html_show=html_show+'<tr><td>Câu hỏi</td><td><input id="c_brain_question" style="display: block;" value="'+brain_question+'"/></td></tr>';
    html_show=html_show+'<tr><td>Câu trả lời</td><td><input id="c_brain_answer" style="display: block;" value="'+brain_answer+'"/></td></tr>';
    html_show=html_show+'<tr><td>Từ khòa chức năng</td><td>'+txt_add_key_func+'</td></tr>';
    html_show=html_show+'<tr><td>Chức năng</td><td>'+txt_effect+'</td></tr>';
    html_show=html_show+'<tr><td>Liên kết</td><td><input id="c_brain_links" style="display: block;" value="'+brain_links+'"/></td></tr>';
    html_show=html_show+'</table>';
    swal({
        title:"Thay đổi nội dung nhanh của bản nháp",
        html: true,
        text:html_show,
        showCancelButton: true,
        confirmButtonText: 'Thay đổi',
        cancelButtonText: "Hủy bỏ",
        closeOnConfirm: false,
        closeOnCancel: false
    },
     function(isConfirm){
       if (isConfirm){
            var c_brain_question=$('#c_brain_question').val();
            var c_brain_answer=$('#c_brain_answer').val();
            var c_brain_effect=$('#c_brain_effect').val();
            var c_brain_links=$('#c_brain_links').val();
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "post",
                data: "function=change_brain&id="+id_brain+"&lang_brain="+lang_brain+"&c_answer="+c_brain_answer+"&c_question="+c_brain_question+"&c_brain_effect="+c_brain_effect+"&links="+c_brain_links, 
                success: function(data, textStatus, jqXHR)
                {
                    $(".brain_"+id_brain+"_question").attr("title",c_brain_question);
                    $(".brain_"+id_brain+"_question").attr("links",c_brain_links);
                    $(".brain_"+id_brain+"_question").html(c_brain_question);
                    $(".brain_"+id_brain+"_answer").attr("title",c_brain_answer);
                    $(".brain_"+id_brain+"_answer span").html(c_brain_answer);
                    swal("Bản nháp", "Bản nháp đã được thay đổi!"+data, "success");
                }
            });
       } else {
            swal("Hủy bỏ", "Đã hủy thay đổi", "error");
       }
     });
    return false;
}

function select_all_check(){
    $(".sel_row").each(function() {
       $(this).attr('checked','checked');
    });
}

</script>
<form method="post" id="form_loc" class="notranslate">

<div style="display: inline-block;float: left;margin: 2px;">
<label>Đối tượng:</label> 
<select name="sex" >
    <option value="0" <?php if($sex=='0'){?> selected="true"<?php }?>>Nam</option>
    <option value="1" <?php if($sex=='1'){?> selected="true"<?php }?>>Nữ</option>
</select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
<label>Giới tính nhân vật:</label> 
<select name="character_sex" >
    <option value="0" <?php if($character_sex=='0'){?> selected="true"<?php }?>>Nam</option>
    <option value="1" <?php if($character_sex=='1'){?> selected="true"<?php }?>>Nữ</option>
</select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">

    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php     
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_array($query_list_lang)){?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
<label>Dữ liệu đúng:</label> 
<input type="checkbox" name="is_criterion" <?php if($is_criterion!=''){echo 'checked="true"';}?> />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
<label>Duyệt nhạc:</label> 
<input type="checkbox" name="is_music" <?php if($is_music!=''){echo 'checked="true"';}?> />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
<label>Unicode:</label> 
<input type="checkbox" name="is_unicode" <?php if($is_unicode!=''){echo 'checked="true"';}?> />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="clear" value="Dọn sạch" class="link_button red" />
</div>



<div style="display: inline-block;float: left;margin: 2px;">
    <?php if($is_approved=='0'){?>
        <a class="buttonPro purple" href="<?php echo $url;?>/app_my_girl_brain.php?lang=<?php echo $langsel;?>&approved=1&sex=<?php echo $sex;?>&character_sex=<?php echo $character_sex;?>&criterion=<?php echo $is_criterion ?>"> <i class="fa fa-list-alt" aria-hidden="true"></i> Các dữ liệu đã bấm nút duyệt</a>
    <?php }else{?>
        <a class="buttonPro pink" href="<?php echo $url;?>/app_my_girl_brain.php?lang=<?php echo $langsel;?>&approved=0&sex=<?php echo $sex;?>&character_sex=<?php echo $character_sex;?>&criterion=1"> <i class="fa fa-list-alt" aria-hidden="true"></i> Trở về danh sách chưa duyệt</a>
    <?php }?>

</div>



</form>

<form method="post" id="form_loc" class="notranslate" style="display: none;">
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Giới hạn câu hỏi</label>
        <input type="text" value="<?php echo $lenth_question; ?>" name="lenth_question" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Giới hạn trả lời</label>
        <input type="text" value="<?php echo $lenth_answer; ?>" name="lenth_answer" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <input type="submit" value="Lọc" name="filter" class="buttonPro lager blue" />
    </div>
    <input name="character_sex"  value="<?php echo $character_sex;?>"  type="hidden"/>
    <input name="sex"  value="<?php echo $sex;?>" type="hidden"/>
    <input name="lang" value="<?php echo $langsel;?>" type="hidden"  />
</form>

<?php
if(isset($_POST)&&isset($_POST['clear'])){
}else{
    echo '<p class="tip">Có '.mysqli_num_rows($result_tip).' câu thoại chờ duyệt</p>';  
}


echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green" class="notranslate" ><th>Câu hỏi</th><th width="500px">Câu trả lời</th><th>Ngôn ngữ</th><th>Giới tính - đối tượng</th><th>Thông tin mở rộng</th><th>Hiệu ứng & chức năng</th><th>Giới hạng</th><th>Lời thoại cha</th><th>Âm thanh</th><th>Hành động</th></tr>';

        while ($row = mysqli_fetch_array($result_tip)) {
            if($is_unicode!=''){
                if (strlen($row['question']) != strlen(utf8_decode($row['question']))){
                    show_row_brain($link,$row,$langsel);
                }
           }else{
                show_row_brain($link,$row,$langsel);
           }
            
        }
echo '</table>';

function show_row_brain($link,$row,$lang_key){
    global $url;
    $txt_id_audio='';
    $txt_color_chat='';
    $color_criterion='';
    $txt_check_chat='';
    $txt_add_father='';
    
    if($row['criterion']!='0'){
        $color_criterion='background-color: #7fffe6;';
    }
    
    $txt_check_chat='<input class="sel_row review" value="'.$row['md5'].'" type="checkbox" style="width:auto">';
    
    if(file_exists('app_mygirl/app_my_girl_'.$lang_key.'_brain/'.$row['md5'].'.mp3')){
        $txt_audio='<a href="'.$url.'/app_mygirl/app_my_girl_'.$lang_key.'_brain/'.$row['md5'].'.mp3" target="_blank">Đường dẫn âm thanh</a>';
        $txt_id_audio='&id_audio='.$row['md5'];
    }else{
        $txt_audio='<img src="'.$url.'/app_mygirl/img/iconoffsound.png"/>'; 
    }
    
    if(strlen($row['color_chat'])>=6){
        $txt_color_chat=str_replace('#','',$row['color_chat']);
        $txt_color_chat=substr($txt_color_chat,0,6);
        $txt_color_chat='color='.$txt_color_chat;
    }else{
        $txt_color_chat='color='.str_replace('#','',$row['color_chat']);
    }
    
    $txt_icon_add='<i class="fa fa-plus-square"></i>';
    if($row['type_question']=='msg'){
        $txt_icon_add='<i class="fa fa-plus-circle"></i>';
    }
    
    if($row['id_question']!=""){
        $txt_add_father='&type_question='.$row['type_question'].'&id_question='.$row['id_question'];
    }
       
    $txt_btn_add='<a href="'.$url.'/app_my_girl_add.php?key='.urlencode($row['question']).'&lang='.$row['langs'].'&answer='.urlencode($row['answer']).'&sex='.$row['sex'].'&effect='.$row['effect'].'&action='.$row['status'].'&character_sex='.$row['character_sex'].'&'.$txt_color_chat.''.$txt_add_father.'" target="_blank" class="buttonPro small green" >'.$txt_icon_add.'</a>';
    $txt_btn_add.='<a onclick="show_edit_brain(\''.$row['md5'].'\',\''.$row['langs'].'\')" class="buttonPro small light_blue" title="Sửa câu gợi ý này"><i class="fa fa-wrench" aria-hidden="true"></i></a>';
    $txt_btn_del='<a class="buttonPro small red" onclick="delete_brain(\''.$row['md5'].'\');return false;" title="Xóa câu gợi ý này!"><i class="fa fa-trash" aria-hidden="true"></i> xóa </a>';

    $txt_chat_show='';
    $txt_show_contain_father='';
    if($row['type_question']=='msg'){
        $txt_chat_show='<a href="'.$url.'/app_my_girl_update.php?id='.$row['id_question'].'&lang='.$lang_key.'&msg=1" target="_blank" class="buttonPro small orange"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> '.$row['id_question'].' - '.$row['type_question'].'</a>';
        $txt_chat_show.="<a class='buttonPro small yellow notranslate' onclick=\"view_pater('".$row['langs']."','".$row['id_question']."','msg','0','1');return false;\"><i class='fa fa-plane' aria-hidden='true' ></i> xem nhanh - msg</a>";
        $query_msg=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_".$row['langs']."` WHERE `id` = '".$row['id_question']."' LIMIT 1");
        if(mysqli_num_rows($query_msg)>0){
            $data_msg=mysqli_fetch_array($query_msg);
            $txt_show_contain_father='<span class="tag_brain"><i class="fa fa-angle-double-left" aria-hidden="true"></i> msg:'.$data_msg['func'].' <i class="fa fa-angle-double-right" aria-hidden="true"></i> '.$data_msg['chat'].'</span><br/>';
        }
    }
    
    if($row['type_question']=='chat'){
        $txt_chat_show='<a href="'.$url.'/app_my_girl_update.php?id='.$row['id_question'].'&lang='.$lang_key.'" target="_blank" class="buttonPro small orange"><i class="fa fa-pencil-square" aria-hidden="true"></i> '.$row['id_question'].' - '.$row['type_question'].'</a>';
        $txt_chat_show.="<a class='buttonPro small yellow notranslate' onclick=\"view_pater('".$row['langs']."','33','".$row['id_question']."','0','1');return false;\"><i class='fa fa-plane' aria-hidden='true' ></i> xem nhanh - chat</a>";
        $query_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_".$row['langs']."` WHERE `id` = '2' LIMIT 1");
        if(mysqli_num_rows($query_chat)>0){
            $data_chat=mysqli_fetch_array($query_chat);
            $txt_show_contain_father='<span class="tag_brain"><i class="fa fa-angle-double-left" aria-hidden="true"></i> chat:'.$data_chat['text'].' <i class="fa fa-angle-double-right" aria-hidden="true"></i> '.$data_chat['chat'].'</span><br/>';
        }
    }
    
    $txt_sex='';
    if($row['sex']=='0'){
        $txt_sex.='<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    }else{
        $txt_sex.='<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }
    $txt_sex.=' <i class="fa fa-angle-double-right" aria-hidden="true"></i> ';
    if($row['character_sex']=='0'){
        $txt_sex.='<i style="font-size:14px;color:blue" class="fa fa-male" aria-hidden="true" title="Nam"></i>';
    }else{
        $txt_sex.='<i style="font-size:14px;color:red" class="fa fa-female" aria-hidden="true" title="Nữ"></i>';
    }
    
    $txt_os='';
    if($row['os']=='android'){
        $txt_os=' <i class="fa fa-android" aria-hidden="true" title="Hiển thị trên nền tản Android"></i> ';
    }
    
    if($row['os']=='window'){
        $txt_os=' <i class="fa fa-windows" aria-hidden="true" title="Hiển thị trên nền tản Window"></i> ';
    }
    
    if($row['os']=='ios'){
        $txt_os=' <i class="fa fa-apple" aria-hidden="true" title="Hiển thị trên nền tản Ios"></i> ';
    }
    
    $btn_check_key='<a href="'.$url.'/app_my_girl_handling.php?func=check_key&key='.$row['question'].'&sex='.$row['sex'].'&character_sex='.$row['character_sex'].'&lang='.$lang_key.'" class="buttonPro small yellow" target="_blank" ><i class="fa fa-share-square-o" aria-hidden="true"></i> kiểm tra tồn tại</a>';
    echo '<tr style="border:solid 1px green;font-size:10px;'.$color_criterion.'" class="brain_'.$row['md5'].' chat_row_'.$row['md5'].' row_brain "><td class="brain_'.$row['md5'].'_question question_brain" title="'.$row['question'].'"  links="'.$row['links'].'">'.limit_words(addslashes($row['question']),10).'</td><td class="brain_'.$row['md5'].'_answer" title="'.$row['answer'].'" style="background-color:'.$row['color_chat'].'">'.$txt_show_contain_father.' <span class="tag_brain_data">'.limit_words(addslashes($row['answer']),20).'</span></td><td class="notranslate">'.$row['langs'].'</td><td>'.$txt_sex.'</td><td>'.$txt_os.' - version:'.$row['version'].'</td><td>'.$row['effect'].'</td><td>'.$row['limit_chat'].'</td><td>'.$txt_chat_show.'</td><td>'.$txt_audio.'</td><td class="notranslate">'.$txt_btn_del.' '.$txt_btn_add.''.$btn_check_key.''.$txt_check_chat.'</td></tr>';
}
?>

<div id="form_loc" style="position: fixed;right: 50%;bottom: 0px;" class="notranslate">
    <span class="buttonPro yellow small" onclick="select_all_check()"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Chọn tất cả</span>
    <span class="buttonPro red small" onclick="delete_select()"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa nhiều</span>
    <span class="buttonPro blue small" onclick="draft_select()"><i class="fa fa-file-text" aria-hidden="true"></i> Chờ Xuất bản</span>
    <select style="float: right;width: 100px;" id="user_work_send">
    <?php
    $query_all_user_work=mysqli_query($link,"SELECT * FROM  carrotsy_work.`work_user` ");
    while($op_user=mysqli_fetch_array($query_all_user_work)){
    ?>
        <option value="<?php echo $op_user['user_id']; ?>"><?php echo $op_user['user_name']; ?></option>
    <?php
    }
    ?>
    </select>
</div>

<script>

$(document).ready(function(){
   $(".row_brain").contextmenu(function(){
        $(this).find("input").click();
        return false;
   }); 
});

function add_key_func(key){
    var txt=$('#c_brain_answer').val();
    $('#c_brain_answer').val(txt+" "+key);
    return false;
}
</script>



