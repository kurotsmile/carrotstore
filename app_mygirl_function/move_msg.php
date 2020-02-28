<?php
$lang_move='';
$id_msg=$_GET['id'];
if(isset($_GET['lang'])){
    $lang_move=$_GET['lang'];
}

$query_msg=mysql_query("SELECT * FROM `app_my_girl_msg_$lang_move` WHERE `id` = '$id_msg' LIMIT 1");
if(mysql_num_rows($query_msg)>0){
$data_msg=mysql_fetch_array($query_msg);

if(isset($_GET['act'])){
    $lang_to=$_GET['lang_to'];
    $mysql_move=mysql_query("INSERT INTO `app_my_girl_msg_$lang_to` (`func`, `chat`, `status`, `sex`, `color`, `q1`, `q2`, `r1`, `r2`, `vibrate`, `effect`, `action`, `face`, `certify`, `author`, `character_sex`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `disable`, `limit_day`, `user_create`, `user_update`) SELECT '".addslashes($data_msg['func'])."', '".addslashes($data_msg['chat'])."', '".$data_msg['status']."', '".$data_msg['sex']."', '".$data_msg['color']."', '".$data_msg['q1']."','".$data_msg['q2']."', '".$data_msg['r1']."', '".$data_msg['r2']."','".$data_msg['vibrate']."', '".$data_msg['effect']."', '".$data_msg['action']."', '".$data_msg['face']."', '".$data_msg['certify']."', '$lang_to', '".$data_msg['character_sex']."', '".$data_msg['ver']."', '".$data_msg['os']."', '".$data_msg['limit_chat']."', '".$data_msg['limit_date']."', '".$data_msg['limit_month']."', '".$data_msg['effect_customer']."', '".$data_msg['disable']."', '".$data_msg['limit_day']."', '".$data_msg['user_create']."', '".$data_msg['user_update']."' FROM `app_my_girl_msg_$lang_move` WHERE ((`id` = '$id_msg'));");
    if(mysql_error()==''){
        $id_new=mysql_insert_id();
        echo 'Sao chép câu thoại (<a href="'.$url.'/app_my_girl_update.php?id='.$id_msg.'&lang='.$lang_move.'&msg=1" class="buttonPro" target="_blank">msg - '.$id_msg.'</a>) từ nước '.$lang_move.' sang nước '.$lang_to.'  thành công! id câu thoại mới tạo là <a href="'.$url.'/app_my_girl_update.php?id='.$id_new.'&lang='.$lang_to.'&msg=1" class="buttonPro" target="_blank">msg - '.$id_new.'</a>';
    }else{
        echo mysql_error();
    }
    exit;
}
?>
<form method="GET" action="">
<table style="width: 50%;">
    <tr>
        <td>
                <label>Câu thoại (msg) từ nước (<?php echo $lang_move; ?>):</label> <br />
                <select name="func" disabled="true">
                    <?php for($i=0;$i<count($data_app->msg_func);$i++){?>
                    <option value="<?php echo $data_app->msg_func[$i]->key;?>" <?php if($data_msg['func']==$data_app->msg_func[$i]->key){?> selected="true"<?php }?>><?php echo $data_app->msg_func[$i]->value;?></option>
                    <?php }?>
                </select>
        </td>
        <td style="text-align: center;">
            <i class="fa fa-angle-double-right" aria-hidden="true" style="font-size: 20px;"></i>
        </td>
        <td>
                <label>Chọn nước chuyển sang:</label><br />
                <select name="lang_to">
                <?php
                $query_list_lang=mysql_query("SELECT * FROM `app_my_girl_country` WHERE  `active` = '1' AND `key`!='$lang_move' ORDER BY `id`");
                while($row_lang=mysql_fetch_array($query_list_lang)){
                    ?>
                        <option value="<?php echo $row_lang['key'];?>"  <?php if($row_lang['key']==$lang_to){?>selected="true"<?php }?> ><?php echo $row_lang['name']; ?></option>
                    <?php
                }
                ?>
                </select>
        </td>
        <td>
            <input type="submit" value="Sao chép" class="buttonPro lager blue" />
            <input type="hidden" name="func" value="move_msg" />
            <input type="hidden" name="lang" value="<?php echo $lang_move;?>" />
            <input type="hidden" name="id" value="<?php echo $id_msg;?>" />
            <input type="hidden" name="act" value="move" />
        </td>
    </tr>
</table>
</form>
<?php
}else{
?>
<p>Câu thoại không còn tồn tại! trở về danh sách và kiểm tra lại!</p>
<?php
}
?>