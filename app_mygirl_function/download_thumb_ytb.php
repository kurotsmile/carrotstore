<?php
$is_run=0;
$sel_lang='vi';
$url_cur=$url.'/app_my_girl_handling.php?func=download_thumb_ytb';
if(isset($_GET['run'])){$is_run=$_GET['run'];}
if(isset($_GET['sel_lang'])){$sel_lang=$_GET['sel_lang'];}
if(isset($_POST['lang_sel'])){$sel_lang=$_POST['lang_sel'];}
if(isset($_POST['run'])){$is_run=$_POST['run'];}
?>
<form style="float: left;" name="frm_month_act" id="form_loc" action="" method="post">
Ngôn ngữ:<br/>
    <select name="lang_sel">
        <?php
        $list_country = mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while ($l = mysqli_fetch_array($list_country)) {
        ?>
            <option value="<?php echo $l['key']; ?>" <?php if($sel_lang==$l['key']){echo 'selected="true"';} ?>><?php echo $l['name']; ?></option>
        <?php }  ?>
        <input type="submit" value="Thay đổi quốc gia" class="buttonPro small blue"/>
        <input type="hidden" value="0" name="run"/>
    </select>
</form>
<?php
$limit = 150;
$query_count_all = mysqli_query($link,"SELECT COUNT(*) as c FROM `app_my_girl_video_$sel_lang`");
$data_count_all_acc = mysqli_fetch_assoc($query_count_all);
$total_records =intval($data_count_all_acc['c']);
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;


echo '<div style="width:100%;float:left">';
for($i=1;$i<$total_page;$i++){
    if($i==$current_page ){
        echo '<a class="buttonPro small yellow" href="'.$url_cur.'&page='.$i.'&run=1&sel_lang='.$sel_lang.'">Trang '.$i.'</a>';
    }else{
        echo '<a class="buttonPro small" href="'.$url_cur.'&page='.$i.'&run=1&sel_lang='.$sel_lang.'">Trang '.$i.'</a>';
    }
}
echo '</div>';

echo '<div style="width:100%;float:left">';
if($is_run==1){
    $query_music=mysqli_query($link,"SELECT * FROM `app_my_girl_video_$sel_lang` LIMIT $start, $limit");
    while($row_music=mysqli_fetch_assoc($query_music)){
        $id=$row_music['id_chat'];
        $filename_img_avatar='app_mygirl/app_my_girl_'.$sel_lang.'_img/'.$id.'.png';
        
        if(!file_exists($filename_img_avatar)){
            $link=$row_music['link'];
            $video_id = explode("?v=", $link);
            $video_id = $video_id[1];
            $thumbnail="http://img.youtube.com/vi/".$video_id."/hqdefault.jpg";
            echo 'Có chưa có ảnh đại diện: <a href="'.$url.'/music/'.$id.'/'.$sel_lang.'" target="_blank">'.$id.'</a> - ';
            $ch = curl_init($thumbnail);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE);
            $data = curl_exec($ch);
            $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
            if($size!=1097){
                $ch = curl_init($thumbnail);
                $fp = fopen('app_mygirl/app_my_girl_'.$sel_lang.'_img/'.$id.'.png', 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                fclose($fp);
                echo 'Đã lưu ảnh <a href="'.$filename_img_avatar.'" target="_blank">Xem ảnh đã lưu</a><br/>';
            }else{
                echo '<a href="'.$thumbnail.'" target="_blank">Xem ảnh YTB Lưu không được</a> <br/> ';
            }

        }
        
    }
}
echo '</div>';
?>