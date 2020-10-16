
<?php
$act_txt='';
$act_type='';
$act_val='';
$act_func='add';
$act_id='';

    if(isset($_GET['edit'])){
        $act_id=$_GET['edit'];
        $query_get_act=mysqli_query($link,"SELECT * FROM `action` WHERE `id` = '$act_id' ORDER BY `id` DESC LIMIT 1");
        $data_act=mysqli_fetch_assoc($query_get_act);
        $act_txt=$data_act['txt'];
        $act_type=$data_act['type'];
        $act_val=$data_act['value'];
        $act_func='edit';
    }

    if(isset($_POST['act_txt'])){
        $act_func=$_POST['act_func'];
        $act_txt=trim(strtolower($_POST['act_txt']));
        $act_type=$_POST['act_type'];
        $act_val=$_POST['act_val'];
        if($act_func=='add'){
            $query_add_act=mysqli_query($link,"INSERT INTO `action` (`txt`, `type`, `value`, `mp3`) VALUES ('$act_txt', '$act_type', '$act_val', '');");
            if($query_add_act){
                $act_txt='';
                $act_type='';
                $act_val='';
                echo msg('Thêm câu lệnh mới thành công!');
            }
        }else{
            $act_id=$_POST['act_id'];
            $query_update_act=mysqli_query($link,"UPDATE `action` SET `txt` = '$act_txt', `type` = '$act_type',`value`='$act_val' WHERE `id` = '$act_id';");
            if($query_update_act){
                echo msg('Cập nhật câu lệnh thành công!');
            }
        }
    }

?>
<form method="post" >
<table style="width:auto">
<tr>
    <td>
        <strong>Thêm mới lệnh</strong>
    </td>
</tr>
<tr>
    <td>Lệnh gọi</td>
    <td><input name="act_txt" id="act_txt" value="<?php echo $act_txt;?>"   x-webkit-speech></td>
    <td>
        <span class="buttonPro small" onclick="record('en-US')"><i class="fa fa-microphone" aria-hidden="true"></i> en</span>
        <span class="buttonPro small" onclick="record('vi-VN')"><i class="fa fa-microphone" aria-hidden="true"></i> vi</span>
    </td>
</tr>
<tr>
    <td>Loại</td>
    <td>
        <select name="act_type">
            <option value="web" <?php if($act_type=='web'){ echo 'selected';}?>>web</option>
            <option value="app" <?php if($act_type=='app'){ echo 'selected';}?>>app</option>
            <option value="search" <?php if($act_type=='search'){ echo 'selected';}?>>search</option>
        </select>
    </td>
</tr>
<tr>
    <td>Liên kết thực thi</td>
    <td><input name="act_val" value="<?php echo $act_val;?>"></td>
</tr>
<tr>
    <td>
        <?php
        if($act_func=='add'){
        ?>
            <input type="submit" class="buttonPro green" value="Hoàn tất">
        <?php }else{?>
            <input type="submit" class="buttonPro orange" value="Cập nhật">
            <input type="hidden" name="act_id" value="<?php echo $act_id;?>">
        <?php } ?>
        <input type="hidden" name="act_func" value="<?php echo $act_func;?>">
    </td>
    <td></td>
</tr>
</table>
</form>

<script>
    function record(lang_act){
        var recognition = new webkitSpeechRecognition();
        recognition.lang = lang_act;
        recognition.onresult = function(event) {
            document.getElementById('act_txt').value = event.results[0][0].transcript;
        }
        recognition.start();
    }
</script>