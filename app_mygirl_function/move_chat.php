<?php
    $id_chat_from=$_GET['id'];
    $lang_move=$_GET['lang'];
    
    $lang_to='';
    $type_move='0';
    
    $chat_text='';
    
        $get_data=mysql_query("SELECT * from `app_my_girl_$lang_move` where `id`='$id_chat_from' LIMIT 1");
        $data_chat_move=mysql_fetch_array($get_data);
    
    if(isset($_GET['lang_to'])){
        $lang_to=$_GET['lang_to'];
        $type_move=$_GET['type_move'];
        $chat_text=$_GET['chat_text'];

        $mysql_move=mysql_query("INSERT INTO `app_my_girl_$lang_to` (`text`, `chat`, `status`, `sex`, `color`, `q1`, `q2`, `r1`, `r2`, `tip`, `link`, `vibrate`, `effect`, `action`, `face`, `author`, `character_sex`, `id_redirect`, `pater`, `pater_type`, `ver`, `os`, `limit_chat`, `limit_date`, `limit_month`, `effect_customer`, `func_sever`, `disable`, `limit_day`, `user_create`, `user_update`,`os_window`,`os_ios`,`os_android`,`slug`,`file_url`) SELECT '".addslashes($chat_text)."', '".addslashes($data_chat_move['chat'])."', '".$data_chat_move['status']."', '".$data_chat_move['sex']."', '".$data_chat_move['color']."', '".$data_chat_move['q1']."','".$data_chat_move['q2']."', '".$data_chat_move['r1']."', '".$data_chat_move['r2']."', '".$data_chat_move['tip']."', '".$data_chat_move['link']."','".$data_chat_move['vibrate']."', '".$data_chat_move['effect']."', '".$data_chat_move['action']."', '".$data_chat_move['face']."', '$lang_to', '".$data_chat_move['character_sex']."', '".$data_chat_move['id_redirect']."', '".$data_chat_move['pater']."', '".$data_chat_move['pater_type']."', '".$data_chat_move['ver']."', '".$data_chat_move['os']."', '".$data_chat_move['limit_chat']."', '".$data_chat_move['limit_date']."', '".$data_chat_move['limit_month']."', '".$data_chat_move['effect_customer']."', '".$data_chat_move['func_sever']."', '".$data_chat_move['disable']."', '".$data_chat_move['limit_day']."', '".$data_chat_move['user_create']."', '".$data_chat_move['user_update']."', '".$data_chat_move['os_window']."', '".$data_chat_move['os_ios']."', '".$data_chat_move['os_android']."', '".$data_chat_move['slug']."', '".$data_chat_move['file_url']."' FROM `app_my_girl_$lang_move` WHERE ((`id` = '$id_chat_from'));");
        $id_new=mysql_insert_id();
        echo 'Di chuyển thành công! Id mới là: <a href="'.$url.'/app_my_girl_update.php?id='.$id_new.'&lang='.$lang_to.'" class="buttonPro small" >'.$id_new.'</a><br/>';
        echo mysql_error();
        if($data_chat_move['effect']=='2'){
            $check_video=mysql_query("SELECT * FROM `app_my_girl_video_$lang_move` WHERE `id_chat`='$id_chat_from' LIMIT 1");
            $btn_check_video='';
            if(mysql_num_rows($check_video)>0){
                $data_video=mysql_fetch_array($check_video);
                $link_video=$data_video['link'];
                $query_copy_video=mysql_query("INSERT INTO `app_my_girl_video_$lang_to` (`id_chat`, `link`) VALUES ('$id_new', '$link_video');");
                mysql_free_result($query_copy_video);
                echo '<br/>Di chuyển thành công liên kết video của bài hát này và xóa dữ liệu từ bài hát cũ! ('.$link_video.')';
            }else{
                echo '<br/>Không có liên kết video của bài hát này!';
            }
            mysql_free_result($check_video);
            
            $check_lyrics=mysql_query("SELECT * FROM `app_my_girl_".$lang_move."_lyrics` WHERE `id_music` = '".$id_chat_from."' LIMIT 1");
            if(mysql_num_rows($check_lyrics)>0){
                $data_lyric=mysql_fetch_array($check_lyrics);
                $txt_lyrics=$data_lyric['lyrics'];
                $query_copy_lyrics=mysql_query("INSERT INTO `app_my_girl_".$lang_to."_lyrics` (`id_music`, `lyrics`) VALUES ('$id_new', '$txt_lyrics');");
                echo '<br/>Di chuyển thành công lời bài hát!';
            }else{
                echo '<br/>Không có lời bài hát muốn di chuyển!';
            }
        }
        
        
        $filename = 'app_mygirl/app_my_girl_'.$lang_move.'/'.$id_chat_from.'.mp3';
        if (file_exists($filename)) {
            $filename_new = 'app_mygirl/app_my_girl_'.$lang_to.'/'.$id_new.'.mp3';
            copy($filename, $filename_new);
            if($type_move=='1'){
                delete_chat_by_lang($id_chat_from,$lang_move);
            }
            echo "Sao chép âm thanh $filename thành công! <br/>";
        }else{
            if($type_move=='1'){
                delete_chat_by_lang($id_chat_from,$lang_move);
            }
        }
        
        $filename_img='app_mygirl/app_my_girl_'.$lang_move.'_img/'.$id_chat_from.'.png';
        if (file_exists($filename_img)) {
            $filename_img_new='app_mygirl/app_my_girl_'.$lang_to.'_img/'.$id_new.'.png';
            copy($filename_img, $filename_img_new);
            if($type_move=='1'){
                unlink($filename_img);
            }
            echo "Đã sao chép ảnh $filename_img thành công<br/>";
        }
    
        echo mysql_error($link);
        mysql_free_result($mysql_move);
    }
?>
<form method="GET" action="">
<table style="width: 50%;">
    <tr>
        <td>
                <label>Câu trò chuyện từ nước (<?php echo $lang_move; ?>):</label> <br />
                <input type="text" name="id" value="<?php echo $id_chat_from;?>" />
        </td>
        <td style="text-align: center;">
            <i class="fa fa-angle-double-right" aria-hidden="true" style="font-size: 20px;"></i>
        </td>
        <td>
                <label>Chọn nước chuyển sang:</label><br />
                <select name="lang_to">
                <?php
                $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `key`!='$lang_move'");
                while($l=mysql_fetch_array($list_country)){
                    ?>
                        <option value="<?php echo $l['key'];?>"  <?php if($l['key']==$lang_to){?>selected="true"<?php }?> ><?php echo $l['name']; ?></option>
                    <?php
                }
                mysql_free_result($list_country);
                ?>
                </select>
        </td>
        <td style="text-align: center;">
            <i class="fa fa-cogs" aria-hidden="true" style="font-size: 20px;"></i>
        </td>
        <td>
            <label>Chọn kiểu di chuyển:</label>
            <select name="type_move">
                <option value="0" <?php if($type_move=='0'){?>selected="true"<?php }?>>Sao chép</option>
                <option value="1" <?php if($type_move=='1'){?>selected="true"<?php }?>>Di chuyển</option>
            </select>
        </td>
        <td>
            <input type="submit" value="Chuyển" class="buttonPro lager blue" />
            <input type="hidden" name="func" value="move_chat" />
            <input type="hidden" name="lang" value="<?php echo $lang_move;?>" />
        </td>
    </tr>
    
    <tr>
        <td colspan="5"><strong>Tùy chỉnh dữ liệu trước khi di chuyển</strong></td>
    </tr>
    
    <tr>
        <td colspan="5">
            <label>Từ khóa (Text)</label>
            <input value="<?php echo $data_chat_move['text']; ?>" name="chat_text" id="inp_text_chat"  type="text"/><br />
            <?php
            $key_tip='';
            if($data_chat_move['effect']=='2'){
                echo '<div style="width:100%;float:left;">';
                $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `key`!='$lang_move'");
                while($l=mysql_fetch_array($list_country)){
                    $key_tip=get_key_lang("key_music",$l['key']);
                    ?>
                    <span style="display: inline-block;;background-color: black;color:white;cursor: pointer;padding: 3px;margin: 2px;border-radius: 10px;" onclick="$('#inp_text_chat').val('<?php echo $key_tip;?>');"><img style="float: left;margin-right: 5px;" src="<?php echo thumb('app_mygirl/img/'.$l['key'].'.png','20x20'); ?>" /> <?php echo $key_tip;?></span>
                    <?php
                }
                echo '</div>';
            }
            ?>
            
        </td>
        <td>
          <a href="#" class="buttonPro small black" onclick="translation_tag('inp_text_chat','<?php echo $lang_move; ?>','<?php echo $lang_move; ?>');return false;"><i class="fa fa-language" aria-hidden="true"></i> Dịch thuật</a>  
        </td>
    </tr>
</table>
</form>
 