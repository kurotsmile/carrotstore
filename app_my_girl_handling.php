<?php
include "app_my_girl_template.php";

$func=$_GET['func'];
if($func=='delete_all_brain'){
    include "app_mygirl_function/delete_all_brain.php";
}

if($func=='delete_chat'){
    include "app_mygirl_function/delete_chat.php";
}

if($func=='delete_all_key_music'){
    echo '<h2>Xóa dữ liệu tìm kiếm nhạc</h2>';
    $query_delete_log_key_music=mysql_query("DELETE FROM `app_my_girl_log_key_music`");
    echo '<p style="float:left;width:100%">Đã xóa '.mysql_affected_rows().' từ khóa tìm kiếm nhạc của tất cả các nước!</p>';
    mysql_free_result($query_delete_log_key_music);
    exit;
}

if($func=='delete_all_report'){
    echo '<h2>Xóa dữ liệu báo lỗi</h2>';
    $query_delete_report=mysql_query("DELETE FROM `app_my_girl_report`");
    echo '<p style="float:left;width:100%">Đã xóa '.mysql_affected_rows().' báo lỗi của tất cả các nước!</p>';
    mysql_free_result($query_delete_report);
    exit;
}

if($func=='fix_error'){
    include "app_mygirl_function/fix_error.php";
}

if($func=='clear_the_trash'){
    include "app_mygirl_function/clear_the_trash.php";
}

if($func=='zip_code'){
    include "app_mygirl_function/zip_code.php";
}

if($func=='create_audio'){
    include "app_mygirl_function/create_audio.php";
}


if($func=='command_mysql'){
    ?>
    <form method="get" name="act_chat_month" style="width: 200px;padding: 10px;">
        <label><i class="fa fa-database" aria-hidden="true"></i> Nhập câu lệnh thực hiện mysql cho tất cả các nước với thẻ <strong>{lang}</strong> là tham số từ khóa ngôn ngữ</label><br />
        <textarea name="val_txt"><?php if(isset($_GET['val_txt'])){ echo $_GET['val_txt'];} ?></textarea>
        <input name="act" value="create" type="hidden" />
        <input type="hidden" value="command_mysql" name="func" />
        <input type="submit" value="Thực hiện" class="buttonPro blue" />
    </form>
    <?php
    if(isset($_GET['act'])){
        $txt_mysql_val=$_GET['val_txt'];
        
        $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
        while($l=mysql_fetch_array($list_country)){
                $langsel=$l['key'];
                $txt_mysql=str_replace('{lang}',$langsel,$txt_mysql_val);
                $query_create=mysql_query($txt_mysql);
                if(mysql_error()==""){
                    echo "Thự hiện câu lệnh thành công nước (".$langsel.")<br/>";
                }else{
                    echo "Thự hiện câu lệnh thành công nước (".$langsel.")<br/>";
                    echo mysql_error()."<br/>";
                }
                mysql_freeresult($query_create);
        }
    }
}


if($func=='active_chat_month'){
    $msg='';
    $month=$_GET['month'];
    if($month!=''){
        $set_act=mysql_query("UPDATE `app_my_girl_vi` SET `disable` = '0' WHERE `limit_month` = '$month'");
        $count_act=mysql_num_rows($set_act);
        if($count_act>0){
            $msg="Kích hoạt $count_act câu trò chuyện trong tháng $month thành công!";
        }else{
            $msg="Không có câu trò chuyện nào được kích hoạt";
        }
        
        $set_disable=mysql_query("UPDATE `app_my_girl_vi` SET `disable` = '0' WHERE `limit_month` = '$month'");
        $count_disable=mysql_num_rows($set_disable);
        if($count_disable>0){
            
        }
    }
    ?>
    <form method="get" name="act_chat_month">
        <label>Nhập tháng muốn kích hoạt bằng tay, các câu trò chuyện khác sẽ bị ngừn hoặt động</label>
        <input name="month" value="<?php echo $month;?>" />
        <input type="hidden" value="active_chat_month" name="func" />
        <?php if($msg!=''){?><p style="color: red;font-size: larger;"></p><?php }?>
    </form>
    <?php
    
}

if($func=='delete_field_music_error'){
    $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
    while($l=mysql_fetch_array($list_country)){
        $key_lang=$l['key'];
        $query_delete_field=mysql_query("DELETE FROM `app_my_girl_music_data_$key_lang` WHERE `id_chat` = ''");
        if(mysql_error($link)==""){
            $count_delete_row=mysql_affected_rows($link);
            echo "</br>Xóa ($count_delete_row) lỗi siêu dữ liệu âm nhạc thành công nước ($key_lang)!";
        }else{
            echo "</br>Xóa lỗi siêu dữ liệu âm nhạc thất bại ($key_lang)!";
        }
        
    }
    mysql_free_result($list_country);
}


if($func=='move_chat'){
    include "app_mygirl_function/move_chat.php";
}

if($func=='move_msg'){
    include "app_mygirl_function/move_msg.php";
}

if($func=='check_music'){
    include "app_mygirl_function/check_music.php";
}

if($func=='check_key'){
    include "app_mygirl_function/check_key.php";
}

if($func=='keyword_warning'){
    include "app_mygirl_function/keyword_warning.php";
}

if($func=='event_management'){
    include "app_mygirl_function/event_management.php";
}

if($func=='lang_2'){
    $msg='';
    if(isset($_GET['act'])){
        $lang_2=$_GET['lang2'];
        $_SESSION['lang_2']=$lang_2;
        $msg='<br/><strong style="color:green">Thay đổi thành công!!!</strong><br>';
    }
    ?>
    <form method="get" name="act_chat_month" style="width: 500px;padding: 10px;">
        <h3><i class="fa fa-language" aria-hidden="true"></i> Chọn ngôn ngữ thứ 2 muốn dịch sang</h3>
        <i>Hiện tại bạn đang chọn dịch sang ngôn ngữ (<strong><?php echo $lang_2;?></strong>)</i><br /><br />
        <?php
        if($msg!='') echo $msg;
        ?>
        <select name="lang2">
        <?php
        $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
        while($l=mysql_fetch_array($list_country)){
        ?>
            <option value="<?php echo $l['key'];?>" <?php if($lang_2==$l['key']){?> selected="true" <?php }?> ><?php echo $l['name'];?></option>
        <?php
        }
        ?>
        </select><br /><br />
        <input name="act" value="lang2" type="hidden" />
        <input type="hidden" value="lang_2" name="func" />
        <input type="submit" value="Thực hiện" class="buttonPro blue" />
    </form>
    <?php
}

if($func=='backup'){
    $date = date('m-d-Y H:i:s', time()).'.sql';
    $filename = "db-Virtuallover-".$date;
?>
    <form method="get" name="act_chat_month" style="width: 500px;padding: 10px;" action="app_my_girl_backup.php">
        <h3><i class="fa fa-download" aria-hidden="true"></i> Sao lưu dữ liệu</h3>
        <i>Thay đổi tên file backup</i><br /><br />
        <input type="text" name="name_file" value="<?php echo $filename;?>" />
        <input name="act" value="lang2" type="hidden" />
        <input type="hidden" value="lang_2" name="func" />
        <input type="submit" value="Thực hiện" class="buttonPro blue" />
    </form>
<?php
}    

if($func=='move_lyrics'){
    $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
    while($l=mysql_fetch_array($list_country)){
        $lang_sel=$l['key'];
        $query_get_lyrics=mysql_query("SELECT * FROM `app_my_girl_music_lyrics` WHERE `lang` = '$lang_sel'");
        if(mysql_numrows($query_get_lyrics)){
            while($row_lyrics=mysql_fetch_array($query_get_lyrics)){
                $data_lyrics=mysql_fetch_array($query_get_lyrics);
                $id_chat=$data_lyrics['id_music'];
                $txt_lyrics=addslashes($data_lyrics['lyrics']);
                $query_add_lyrics=mysql_query("INSERT INTO `app_my_girl_".$lang_sel."_lyrics` (`id_music`, `lyrics`) VALUES ('$id_chat', '$txt_lyrics');");
                if($query_add_lyrics===true){
                    echo 'Cập nhật thành công lời nhạc id:'.$id_chat.' Nước '.$lang_sel.'<br/>';
                }else{
                    echo 'Cập nhật thất bại lời nhạc id:'.$id_chat.' Nước '.$lang_sel.'<br/>';
                }
            }
            
        }else{
            echo '<hr/>Khôn có lời nhạc ở quốc gia ('.$lang_sel.') này!<br/>';
        }
        mysql_free_result($query_get_lyrics);
    }
}

if($func=='error'){
    include "app_mygirl_function/error.php";
}

if($func=='delete_audio'){
    include "app_mygirl_function/delete_audio.php";
}


if($func=='test_search'){
     $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
     $txt_query='';
     $seach_music='love';
     $count_l=mysql_num_rows($list_country);
     $count_index=0;
     while($l=mysql_fetch_array($list_country)){
        $key=$l['key'];
        $txt_query.="(SELECT * FROM `app_my_girl_$key` WHERE  `chat` LIKE '%$seach_music%' AND  `effect`='2' AND `disable` = '0' limit 21)";
        $count_index++;
        if($count_index!=$count_l){
            $txt_query.=" UNION ALL ";
        }
     }
     
     echo $txt_query;
     $list_music=mysql_query($txt_query);
     while($r=mysql_fetch_array($list_music)){
        echo var_dump($r);
     }
     echo mysql_error();
     echo ' leng: '.$count_l;
}

if($func=='draft_brain'){
    include "app_mygirl_function/draft_brain.php";
}

if($func=='bk'){
    $query_bk=mysql_query("SELECT * FROM `app_my_girl_background` WHERE `version` = '1'");
    while($row_bk=mysql_fetch_array($query_bk)){
        $url_file_1='app_mygirl/obj_background/place_'.$row_bk['id'].'.png';
        $url_file_2='app_mygirl/obj_background/view_'.$row_bk['id'].'.png';
        echo $row_bk['id'].'<br/>';
        echo '<a href='.$url.'/'.$url_file_1.'>link</a><br/>';
        echo '<a href='.$url.'/'.$url_file_2.'>link</a><br/>';
        unlink($url_file_1);
        unlink($url_file_2);
        echo '<hr/>';
    }
}

if($func=='off_color'){
    if(isset($_SESSION['off_color'])){
        unset($_SESSION['off_color']);
        show_alert('Đã bật chức năng màu!','alert');
    }else{
        $_SESSION['off_color']='1';
        show_alert('Đã tắt chức năng màu!','alert');
    }
}

if($func=='create_f'){
    $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
    while($l=mysql_fetch_array($list_country)){
        $key=$l['key'];
        $path_file='app_mygirl/app_my_girl_'.$key.'_img';
        if (!file_exists($path_file)) {
            mkdir($path_file);
        }
    }
}

if($func=='create_slug'){
    include "app_mygirl_function/create_slug.php";
}

if($func=='manager_country_work'){
    include "app_mygirl_function/manager_country_work.php";
}

if($func=='disk_capacity'){
    include "app_mygirl_function/disk_capacity.php";
}

if($func=='avatar_user_resize'){
    include "app_mygirl_function/avatar_user_resize.php";
}
?>

