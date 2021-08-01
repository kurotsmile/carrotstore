<?php
include "app_my_girl_template.php";
$limit='500';

$langsel='vi';
$disable_chat='';
$sexsel="0";
$sex_char="1";
$key_search='';
$limit_chat='';
$effect='0';
$tip="";
$os="";
$os_ios='';
$os_window='';
$user_work='';

$q_key_word='';
$q_character_sex='';
$q_sex='';
$q_tip='';
$q_disable='';
$q_os='';
$q_os_ios='';
$q_os_window='';
$q_effect='';
$q_user_work='';
$q_limit_chat='';

if(isset($_REQUEST['lang']))$langsel=$_REQUEST['lang'];
if(isset($_REQUEST['sex'])){
    $sexsel=$_REQUEST['sex'];
    if($sexsel!='') $q_sex=" AND `sex`='$sexsel' ";
}

if(isset($_REQUEST['character_sex'])){
    $sex_char=$_REQUEST['character_sex'];
    if($sex_char!='')$q_character_sex=" AND `character_sex`='$sex_char' ";
}
if(isset($_REQUEST['key_word'])) { 
    $key_search=$_REQUEST['key_word'];
    if(trim($key_search)!='') $q_key_word="AND  (`chat` LIKE '%$key_search%')";
}

if(isset($_REQUEST['disable_chat'])){
    $disable_chat=$_REQUEST['disable_chat']; 
    if($disable_chat!='') $q_disable=" AND `disable` = '$disable_chat'";
}

if(isset($_REQUEST['tip'])){
    $tip=$_REQUEST['tip'];
    if($tip!='') $q_tip=" AND `tip` = '$tip' ";
}

if(isset($_REQUEST['os'])){
    $os=$_REQUEST['os'];
    if($os!='') $q_os=" AND `os`!='$os' ";
}

if(isset($_REQUEST['os_ios'])){
    $os_ios=$_REQUEST['os_ios'];
    if($os_ios!='')$q_os_ios=" AND `os`!='$os_ios' ";
}

if(isset($_REQUEST['os_window'])){
    $os_window=$_REQUEST['os_window'];
    if($os_window!='') $q_os_window=" AND `os_window`!='$os_window' ";
}

if(isset($_REQUEST['effect'])){
    $effect=$_REQUEST['effect'];
}

if(isset($_REQUEST['user_work'])){
    $user_work=$_REQUEST['user_work'];
    if($user_work!='') $q_user_work=" AND `user_create`='$user_work' ";
}

if(isset($_REQUEST['limit'])){
    $limit=$_REQUEST['limit'];
}

if(isset($_REQUEST['limit_chat'])){
    $limit_chat=$_REQUEST['limit_chat'];
    if($limit_chat!='')$q_limit_chat=" AND `limit_chat`='$limit_chat' ";
}

if($limit!="")$q_limit=" LIMIT  ".$limit; else $q_limit="";

$q_effect=" AND  `effect`='$effect' ";
$result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE 1=1 $q_tip $q_sex $q_character_sex $q_disable $q_key_word $q_os $q_os_ios $q_os_window $q_effect $q_user_work $q_limit_chat ORDER BY `id` DESC $q_limit");
echo mysqli_error($link);
?>
<form method="post" id="form_loc">
<div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Đối tượng:</label> 
    <select name="sex">
        <option value="" <?php if($sexsel==''){?> selected="true"<?php }?>>Tất cả</option>
        <option value="0" <?php if($sexsel=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($sexsel=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 120px;">
    <label>Giới tính nhân vật:</label> 
    <select name="sex_char">
        <option value="" <?php if($sex_char==''){?> selected="true"<?php }?>>Tất cả</option>
        <option value="0" <?php if($sex_char=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($sex_char=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php     
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_array($query_list_lang)){?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 120px;">
    <label>Từ khóa:</label> 
    <input type="text" name="key_word" value="<?php echo $key_search;?>"/>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Gợi ý:</label> 
    <select name="tip">
        <option value="" <?php if($tip==''){?> selected="true"<?php }?>>All</option>
        <option value="1" <?php if($tip=='1'){?> selected="true"<?php }?>>on</option>
        <option value="0" <?php if($tip=='0'){?> selected="true"<?php }?>>off</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Chức năng:</label> 
        <select name="effect" >
            <option value="" <?php if($effect==''){ echo 'selected="true"';} ?>>None</option>
            <?php
            for($i=0;$i<count($data_app->arr_function_app);$i++){
                $data_i=$data_app->arr_function_app[$i];
                ?>
                <option value="<?php echo $data_i->key; ?>" <?php if($effect==$data_i->key){ echo 'selected="true"';} ?>><?php echo $data_i->name; ?></option>
                <?php
            }
            ?>
        </select>
</div>


<div style="display: inline-block;float: left;margin: 2px;width: 100px;">
    <label>Giới hạng:</label> 
    <select name="limit">
        <option <?php if($limit=='500'){ echo 'selected="true"';}?> value="500">500 dòng</option>
        <option <?php if($limit=='1000'){ echo 'selected="true"';}?>  value="1000">1000 dòng</option>
        <option <?php if($limit=='1500'){ echo 'selected="true"';}?>  value="1500">1500 dòng</option>
        <option <?php if($limit==''){ echo 'selected="true"';}?> value="">không giới hạng</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width:90px;">
    <label>Giới hạng os</label> 
    <select name="os">
        <option value="" <?php if($os==''){?> selected="true"<?php }?>>All</option>
        <option value="android" <?php if($os=='android'){?> selected="true"<?php }?>>Android</option>
        <option value="ios" <?php if($os=='ios'){?> selected="true"<?php }?>>Ios</option>
        <option value="window" <?php if($os=='window'){?> selected="true"<?php }?>>Window</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 130px;">
    <label>Thô tục và tình dục :</label> 
    <select name="limit_chat">
        <option <?php if($limit_chat==''){ echo 'selected="true"';}?> value="">0</option>
        <option <?php if($limit_chat=='1'){ echo 'selected="true"';}?>  value="1">1</option>
        <option <?php if($limit_chat=='2'){ echo 'selected="true"';}?>  value="2">2</option>
        <option <?php if($limit_chat=='3'){ echo 'selected="true"';}?> value="3">3</option>
        <option <?php if($limit_chat=='4'){ echo 'selected="true"';}?> value="4">4</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 120px;">
    <label>OS Window</label> 
    <select name="os_window">
        <option <?php if($os_window==''){ echo 'selected="true"';}?>  value="">Không truy vấn</option>
        <option <?php if($os_window=='0'){ echo 'selected="true"';}?>  value="0">Hiển thị</option>
        <option <?php if($os_window=='1'){ echo 'selected="true"';}?>  value="1">không hiển thị</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 120px;">
    <label>OS Ios</label> 
    <select name="os_ios">
        <option <?php if($os_ios==''){ echo 'selected="true"';}?>  value="">Không truy vấn</option>
        <option <?php if($os_ios=='0'){ echo 'selected="true"';}?>  value="0">Hiển thị</option>
        <option <?php if($os_ios=='1'){ echo 'selected="true"';}?>  value="1">không hiển thị</option>
    </select>
</div>

<?php
    if($data_user_carrot["user_role"]=="admin"){
?>
<div style="display: inline-block;float: left;margin: 2px;width: 120px;">
    <label>Nhân viên</label> 
    <select name="user_work">
    <option value="">Tất cả</option>
    <?php
    $query_all_user_work=mysqli_query($link,"SELECT * FROM  carrotsy_work.`work_user` ");
    while($op_user=mysqli_fetch_array($query_all_user_work)){
    ?>
        <option value="<?php echo $op_user['user_id']; ?>" <?php if($user_work==$op_user['user_id']){?> selected="true" <?php } ?>><?php echo $op_user['user_name']; ?></option>
    <?php
    }
    ?>
    </select>
</div>
<?php }?>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="hidden" value="<?php echo $disable_chat;?>" name="disable_chat" />
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <a href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel;?>&sex=<?php echo $sexsel; ?>&character_sex=<?php echo $sex_char;?>" class="link_button">Thêm trò chuyện (<?php echo $langsel;?>)</a>
</div>
</form>


<div id="form_loc" style="position: fixed;right: 50%;bottom: 0px;">
    <span class="buttonPro yellow small" onclick="select_disable()"><i class="fa fa-check-square-o" aria-hidden="true"></i> Chọn toàn bộ</span>
    <span class="buttonPro red small" onclick="os_active('os_window','1')"><i class="fa fa-windows" aria-hidden="true"></i> Ẩn window</span>
    <span class="buttonPro blue small" onclick="os_active('os_window','0')"><i class="fa fa-windows" aria-hidden="true"></i> Hiện window</span>
    <span class="buttonPro red small" onclick="os_active('os_ios','1')"><i class="fa fa-apple" aria-hidden="true"></i> Ẩn Ios</span>
    <span class="buttonPro blue small" onclick="os_active('os_ios','0')"><i class="fa fa-apple" aria-hidden="true"></i> Hiện Ios</span>
    <span class="buttonPro red small" onclick="os_active('os_android','3')"><i class="fa fa-check" aria-hidden="true"></i> Không kích hoạt</span>
</div>

<script>


function os_active(os,value){
    var txt_value='bật';
    if(value=="1"){
        txt_value="tắt";
    }
    
    if (confirm('Có chắc là '+txt_value+' các câu thoại này trên cho các ứng dụng '+os+' ?')) {
        var id_arr=[];
        $(".sel_row").each(function() {
            if($(this).is(':checked')){
                var id_del=$(this).val();
                id_arr.push(id_del);
                if(value=="1"){
                $('.chat_row_'+id_del).remove();
                }
            }
        });
        
        if(id_arr.length==0){
            alert("Chưa có mục nào được chọn!");
        }else{
            $.ajax({
                    url: "app_my_girl_jquery.php",
                    type: "get",
                    data: "function=os_active&id="+JSON.stringify(id_arr)+"&lang=<?php echo $langsel;?>&value="+value+"&os="+os,
                    success: function(data, textStatus, jqXHR)
                    {
                        alert(data);
                    }
            });
        }
        return false;
    }
}

function delete_table(id_row){
    if (confirm('Có chắc là sẽ xóa?')) {
        $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=delete_chat&id="+id_row+"&lang=<?php echo $langsel;?>", //tham số truyền vào
                success: function(data, textStatus, jqXHR)
                {
                    $('.chat_row_'+id_row).remove();
                    alert('Delete success!!!');
                }
            
            });
        return false;
    }

}

var sel_tick=false;
function select_disable(){
    if(sel_tick==false){
        $(".sel_row").prop('checked', true);
        sel_tick=true;
    }else{
        $(".sel_row").prop('checked', false);
        sel_tick=false;
    }
}


function os_select(){
    var person = prompt("Nhập mật khẩu để thực hiện");
    if(person=="vl"){
        var os_inp = prompt("nhập lệnh để thay đổi os");
        var id_arr=[];
        $(".sel_row").each(function() {
            var id_del=$(this).val();
            id_arr.push(id_del);
            $('.chat_row_'+id_del).remove();
        });
    
        $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", 
                data: "function=os_chat_select&id="+JSON.stringify(id_arr)+"&lang=<?php echo $langsel;?>&os="+os_inp+"",
                success: function(data, textStatus, jqXHR)
                {
                    alert(data);
                }
            
            });
        return false;
    }else{
        alert("sai mật khẩu");
    }
    
}
</script>
<?php
echo '<table  style="border:solid 1px green;margin-bottom: 80px;">';
echo '<tr style="border:solid 1px green"><th>id</th><th>Loại</th><th>Trả lời</th><th>Nội dung</th><th>Giới tính</th><th>Chức năng</th><th>Hiển thị</th><th>Giọng</th><th>Thao tác 1</th><th>Thao tác 2</th></tr>';
        while ($row = mysqli_fetch_assoc($result_tip)) {
            $bnt_del='<a href="#" class="buttonPro small red" onclick="delete_table('.$row['id'].');return false;"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
            $bnt_history='<a href="'.$url.'/app_my_girl_history.php?id_chat_see='.$row['id'].'&type_chat_see=chat&lang='.$langsel.'&sex='.$row['sex'].'&character_sex='.$row['character_sex'].'" target="_blank" class="buttonPro small blue" title="Xem lịch sử dùng của câu trò chuyện này"><i class="fa fa-history" aria-hidden="true"></i></a>';
            if($row['disable']=='0'){
                $check_select='<input class="sel_row" value="'.$row['id'].'" type="checkbox" style="width:auto;float:none"/>';
            }else{
                $check_select='<input class="sel_row review" value="'.$row['id'].'" type="checkbox" style="width:auto;float:none"/>';
            }
            echo show_row_chat_prefab($link,$row,$langsel,$bnt_history.' '.$bnt_del.' '.$check_select);
        }
echo '</table>';
?>

