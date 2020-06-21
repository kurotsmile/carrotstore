<?php
    $type='chat';
    if(isset($_GET['type'])){ $type=$_GET['type'];}
    $id=$_GET['id'];
    $lang_sel=$_GET['lang'];
    
    if($type=='chat'){
        $check_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' LIMIT 1");
        $data_chat=mysqli_fetch_array($check_chat);
        $result_chat=mysqli_query($link,"DELETE FROM `app_my_girl_$lang_sel` WHERE `id` = '$id'");
        
        $filename = 'app_mygirl/app_my_girl_'.$lang_sel.'/'.$id.'.mp3';
        echo '<i class="fa fa-trash" aria-hidden="true"></i> Xóa câu trò chuyện #'.$id.' thành công !!!<br/>';
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
            $query_delete_field=mysqli_query($link,"DELETE FROM `app_my_girl_field_$lang_sel` WHERE `id_chat` = '$id' AND `type_chat` = 'chat' LIMIT 1;");;
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

            
            $show_lyrics=mysqli_query($link,"SELECT * FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `id_music` = '$id' LIMIT 1");
            if(mysqli_num_rows($show_lyrics)>0){
                mysqli_query($link,"DELETE FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `id_music` = '$id' LIMIT 1;");
                echo mysqli_error($link);
                echo "<br/>Xóa lời bài hát!";
            }

            
            $check_rank_music=mysqli_query($link,"SELECT * FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat`='$id' LIMIT 1");
            if(mysqli_num_rows($check_rank_music)>0){
                mysqli_query($link,"DELETE FROM `app_my_girl_music_data_$lang_sel` WHERE `id_music` = '$id' LIMIT 1;");
                echo mysqli_error($link);
                echo "<br/>Xóa bản xếp hạng liên quan đến bài hát!";
            }
        }
        
        mysqli_free_result($check_field_chat);
        mysqli_free_result($check_chat);
    }else{
        $result_chat=mysqli_query($link,"DELETE FROM `app_my_girl_msg_$lang_sel` WHERE `id` = '$id'");
        
        $filename = 'app_mygirl/app_my_girl_msg_'.$lang_sel.'/'.$id.'.mp3';
        echo '<i class="fa fa-trash" aria-hidden="true"></i> Xóa câu thoại (msg) #'.$id.' thành công !!!<br/>';
        if (file_exists($filename)) {
            unlink($filename);
            echo "Đã xóa file âm thanh $filename <br/>";
        } else {
            echo "Không có file âm thanh $filename để xóa <br/>";
        } 
    }
    exit;
?>