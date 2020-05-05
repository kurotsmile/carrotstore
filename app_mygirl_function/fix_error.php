<div class="body">
<?php
    
    $langsel='';
    if(isset($_GET['lang'])){
        $langsel=$_GET['lang'];
    }
    
    function fix_error_by_lang($link,$langsel){
        $count_error=0;
        echo '<strong><i class="fa fa-wrench" aria-hidden="true"></i> Sửa lỗi ('.$langsel.')</strong><br/>';
        
        $query_error_msg=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE (`q1` != '' AND `r1` = '') or (`q2` != '' AND `r2` = '') or (`q1`= '' AND `r1` != '') or (`q2`= '' AND `r2` != '')");
        if(mysqli_num_rows($query_error_msg)>0){
            echo '<i>Lỗi câu thoại thiếu tham số câu hỏi và câu trả lời</i>';
            echo '<table>';   
        }
        while($row_error_msg=mysqli_fetch_array($query_error_msg)){
            $count_error++;
            echo show_row_chat_prefab($link,$row_error_msg,$langsel,'');
        }
        
        if(mysqli_num_rows($query_error_msg)>0){
            echo '</table>';   
        }
        mysqli_free_result($query_error_msg);
        echo '<hr/>';
        
        
        $query_error=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE (`q1` != '' AND `r1` = '') or (`q2` != '' AND `r2` = '') or (`q1`= '' AND `r1` != '') or (`q2`= '' AND `r2` != '')");
        if(mysqli_num_rows($query_error)>0){
            echo '<i>Lỗi trò chuyện thiếu tham số câu hỏi và câu trả lời</i>';
            echo '<table>';   
        }
        while($row_error=mysqli_fetch_array($query_error)){
            $count_error++;
            echo show_row_chat_prefab($row_error,$langsel,'');
        }
        
        if(mysqli_num_rows($query_error)>0){
            echo '</table>';   
        }
        mysqli_free_result($query_error);
        echo '<hr/>';
        
        
        $query_error_no_father=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = '0' AND `id_redirect` != ''");
        $txt_show='';
        if(mysqli_num_rows($query_error_no_father)>0){
            while($row_error_no_father=mysqli_fetch_array($query_error_no_father)){
                $id_father=$row_error_no_father['id_redirect'];
                $check_redirect=mysqli_query($link,"SELECT * FROM `app_my_girl_vi` WHERE `id` = '$id_father' LIMIT 1");
                if(mysqli_num_rows($check_redirect)==0){
                    $count_error++;
                    $txt_show.=show_row_chat_prefab($row_error_no_father,$langsel,'');
                }
            }
        }
        mysqli_free_result($query_error_no_father);
        
        if($txt_show!=''){
            echo '<i>Lỗi thiếu câu trò chuyện ghi lại khiến câu trò chuyện trở nên dư thừa!</i>';
            echo '<table>';
            echo $txt_show;
            echo '</table>';
            echo '<hr/>';
        }

        $key_music=get_key_lang($link,'key_music',$langsel);
        $query_error_music_key=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = '0' AND ((`effect` = '2' AND `text` != '$key_music') or (`effect` != '2' AND  `text` = '$key_music'))");
        if(mysqli_num_rows($query_error_music_key)>0){
            echo '<i>Lỗi câu thoại có chức năng nghe nhạc và từ khóa không trùng khớp</i>';
            echo '<table>';
            while($row_error_music_key=mysql_fetch_array($query_error_music_key)){
                $count_error++;
                echo show_row_chat_prefab($row_error_music_key,$langsel,'');
            }
            echo '</table>';
            echo '<hr/>';
        }
        mysqli_free_result($query_error_music_key);
        
        //kiem tra am thanh
        $key_quote=get_key_lang($link,'key_quote',$langsel);
        $query_error_quote_key=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = '0' AND ((`effect` = '36' AND `text` != '$key_quote') or (`effect` != '36' AND  `text` = '$key_quote')) AND `id_redirect`=''");
        if(mysqli_num_rows($query_error_quote_key)>0){
            echo '<i>Lỗi câu thoại có chức năng châm ngôn và từ khóa không trùng khớp</i>';
            echo '<table>';
            while($row_error_quote_key=mysql_fetch_array($query_error_quote_key)){
                $count_error++;
                echo show_row_chat_prefab($row_error_quote_key,$langsel,'');
            }
            echo '</table>';
            echo '<hr/>';
        }
        mysqli_free_result($query_error_quote_key);
        
        $api_voice_sex_1=get_key_lang($link,'voice_character_sex_1',$langsel);
        $query_sex='';
        if($api_voice_sex_1=='google'){
            $query_sex=" `sex` = '0' AND `character_sex` = '1' ";
        }else{
            $query_sex=" `sex` = '1' AND `character_sex` = '0' ";
        }
        
        
        $query_error_no_sound=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = '0' AND `id_redirect` = '' AND $query_sex ");
        $txt_show='';
        if(mysqli_num_rows($query_error_no_sound)>0){
            while($row_error_no_sound=mysqli_fetch_array($query_error_no_sound)){
                $id_row=$row_error_no_sound[0];
                if(!file_exists("app_mygirl/app_my_girl_$langsel/$id_row.mp3")){
                    //$name_voice='voice_character_sex_'.$row_error_no_sound['character_sex'];
                    //if(get_key_lang($name_voice,$langsel)!=='google'){
                        $count_error++;
                        $bnt_del='<a href="#" class="buttonPro small red" onclick="delete_table('.$id_row.');return false;"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
                        $txt_show.=show_row_chat_prefab($link,$row_error_no_sound,$langsel,$bnt_del);
                    //}
                }
                
            }
        }
        
        if($txt_show!=''){
            echo '<i>Lỗi thiếu âm thanh câu trò chuyện</i>';
            echo '<table>';
            echo $txt_show;
            echo '</table>';
        }
        
        mysqli_free_result($query_error_no_sound);
        

        $query_error_no_sound_msg=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `disable` = '0' AND $query_sex AND `func`!='thong_bao'");
        $txt_show='';
        if(mysqli_num_rows($query_error_no_sound_msg)>0){
            while($row_error_no_sound=mysql_fetch_array($query_error_no_sound_msg)){
                $id_row=$row_error_no_sound[0];
                if(!file_exists("app_mygirl/app_my_girl_msg_$langsel/$id_row.mp3")){
                    $count_error++;
                    $bnt_del='<a href="#" class="buttonPro small red" onclick="delete_table('.$row_error_no_sound['id'].');return false;"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
                    $txt_show.=show_row_chat_prefab($row_error_no_sound,$langsel,$bnt_del); 
                }
                
            }
        }
        
        if($txt_show!=''){
            echo '<i>Lỗi thiếu âm thanh câu Thoại</i>';
            echo '<table>';
            echo $txt_show;
            echo '</table>';
        }
        
        mysqli_free_result($query_error_no_sound_msg);
        
        //Lỗi Api Google không tạo được
        $key_quote=get_key_lang('key_quote',$langsel);
        $query_error_quote_key=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = '0' AND ((`effect` = '36' AND `text` != '$key_quote') or (`effect` != '36' AND  `text` = '$key_quote')) AND `id_redirect`=''");
        if(mysqli_num_rows($query_error_quote_key)>0){
            echo '<i>Lỗi câu thoại có chức năng châm ngôn và từ khóa không trùng khớp</i>';
            echo '<table>';
            while($row_error_quote_key=mysql_fetch_array($query_error_quote_key)){
                $count_error++;
                echo show_row_chat_prefab($row_error_quote_key,$langsel,'');
            }
            echo '</table>';
            echo '<hr/>';
        }
        mysqli_free_result($query_error_quote_key);
        
        $api_voice_sex_1=get_key_lang('voice_character_sex_1',$lang_sel);
        $query_sex='';
        if($api_voice_sex_1=='google'){
            $query_sex=" `sex` = '1' AND `character_sex` = '0' ";
        }else{
            $query_sex=" `sex` = '0' AND `character_sex` = '1' ";
        }
        
        
        $query_error_no_sound=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = '0' AND `id_redirect` = '' AND $query_sex  AND CHAR_LENGTH(`chat`)>196");
        $txt_show='';
        if(mysqli_num_rows($query_error_no_sound)>0){
            while($row_error_no_sound=mysql_fetch_array($query_error_no_sound)){
                $id_row=$row_error_no_sound[0];
                if(!file_exists("app_mygirl/app_my_girl_$langsel/$id_row.mp3")){
                    //$name_voice='voice_character_sex_'.$row_error_no_sound['character_sex'];
                    //if(get_key_lang($name_voice,$langsel)!=='google'){
                        $count_error++;
                        $bnt_del='<a href="#" class="buttonPro small red" onclick="delete_table('.$row_error_no_sound['id'].');return false;"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
                        $txt_show.=show_row_chat_prefab($row_error_no_sound,$langsel,$bnt_del); 
                    //}
                }
                
            }
        } 
        
        if($txt_show!=''){
            echo '<i>lỗi thiếu âm thanh do API google tạo giọng đọc không được</i>';
            echo '<table>';
            echo $txt_show;
            echo '</table>';
        }
        
        $query_error_no_sound_msg=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `disable` = '0' AND $query_sex AND CHAR_LENGTH(`chat`)>196 AND `func`!='thong_bao'");
        $txt_show='';
        if(mysqli_num_rows($query_error_no_sound_msg)>0){
            while($row_error_no_sound=mysql_fetch_array($query_error_no_sound_msg)){
                $id_row=$row_error_no_sound[0];
                if(!file_exists("app_mygirl/app_my_girl_msg_$langsel/$id_row.mp3")){
                    $count_error++;
                    $txt_show.=show_row_chat_prefab($row_error_no_sound,$langsel,''); 
                }
                
            }
        }
        
        if($txt_show!=''){
            echo '<i>Lỗi thiếu âm thanh câu Thoại do API google tạo giọng đọc không được</i>';
            echo '<table>';
            echo $txt_show;
            echo '</table>';
        }
        
        mysqli_free_result($query_error_no_sound_msg);
        
        $txt_show='';
        $query_chat_error_father=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = '0' AND `pater` = `id`");
        if(mysql_num_rows($query_chat_error_father)>0){
            while($row_error_father=mysql_fetch_array($query_chat_error_father)){
                $id_row=$row_error_father[0];
                $count_error++;
                $txt_show.=show_row_chat_prefab($row_error_father,$langsel,''); 
            }
        }
        
        if($txt_show!=''){
            echo '<i>Câu trò chuyện cha không được liên kết đúng</i>';
            echo '<table>';
            echo $txt_show;
            echo '</table>';
        }
        


        
        
        echo '<hr style="border: solid 2px black;"/>';
        echo "<h2>có $count_error câu thoại phát hiện lỗi ở nước (".$langsel.") !!!!</h2>";
        echo '<hr style="width:100%;border: solid 2px black;"/>';
        


        
    }
    
    if($langsel==''){
        $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
        while($l=mysqli_fetch_array($list_country)){
            $langsel=$l['key'];
            fix_error_by_lang($link,$langsel);
        }
    }else{
        fix_error_by_lang($link,$langsel);
    }
    
?>
</div>

<script>
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
</script>