<?php
$ip_rate=$_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
$sel_rate='-1';
$query_check_rate=mysql_query("SELECT * FROM `app_my_girl_music_data_$lang_sel` WHERE `device_id` = '$ip_rate' AND `id_chat` = '$id_music' LIMIT 1");
if(isset($_GET['rate'])){
    $sel_rate=$_GET['rate'];
    if(mysql_num_rows($query_check_rate)){
        $query_update_rate=mysql_query("UPDATE `app_my_girl_music_data_$lang_sel` SET `value` = '$sel_rate'  WHERE `device_id` = '$ip_rate' AND `device_id` = 'aaaaa' AND `id_chat` = '$id_music' LIMIT 1;");
    }else{
       $query_add_rate=mysql_query("INSERT INTO `app_my_girl_music_data_$lang_sel` (`device_id`, `value`, `id_chat`) VALUES ('$ip_rate', '$sel_rate', '$id_music');"); 
    }
 
?>
<script>
    swal({
        title: "<?php echo lang($link,'danh_gia');?>",
        text: "<?php echo lang($link,'danh_gia_done');?>",
        type: "success",
    });
</script>
<?php
}

if(mysql_num_rows($query_check_rate)){
    $data_rate=mysql_fetch_array($query_check_rate);
    $sel_rate=$data_rate['value'];
}
$url_page_cur=$url.'/music/'.$id_music.'/'.$lang_sel;
$data_m_0='0';
$data_m_1='0';
$data_m_2='0';
$data_m_3='0';
$is_ready_data_music='1';
$count_status_0=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='0' LIMIT 1");
$count_status_1=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='1' LIMIT 1");
$count_status_2=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='2' LIMIT 1");
$count_status_3=mysql_query("SELECT count(*) FROM `app_my_girl_music_data_$lang_sel` WHERE `id_chat` = '$id_music' AND `value`='3' LIMIT 1");
$data_0=mysql_fetch_array($count_status_0);
$data_1=mysql_fetch_array($count_status_1);
$data_2=mysql_fetch_array($count_status_2);
$data_3=mysql_fetch_array($count_status_3);
                
$data_m_0=$data_0[0];
$data_m_1=$data_1[0];
$data_m_2=$data_2[0];
$data_m_3=$data_3[0];
$total_data_m=intval($data_m_0)+intval($data_m_1)+intval($data_m_2)+intval($data_m_3);

mysql_free_result($count_status_0);
mysql_free_result($count_status_1);
mysql_free_result($count_status_2);
mysql_free_result($count_status_3);
if($total_data_m==0){
    $is_ready_data_music='0';
}

?>
            <div  style="color: #515151;font-size: 11px;font-weight: normal;margin-top: 20px;float: left;width: 100%;background-color: #ffffffa6;padding: 10px;border-radius: 10px;">
                <i class="fa fa-star-half-o" style="float: left;font-size: 60px;margin-right: 10px;" aria-hidden="true"></i>
                <strong><?php echo lang($link,'danh_gia'); ?></strong> (<?php echo $total_data_m; ?>)<br />
                <i><?php echo lang($link,'dang_gia_music_tip'); ?></i><br />

                    <span onclick="go_to_url(this);" class="buttonPro small <?php if($sel_rate=='0'){ ?>blue<?php }else{?>yellow<?php } ?>" href_url="<?php echo $url_page_cur.'&rate=0'; ?>"><i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_0'); ?> (<?php echo $data_m_0; ?>)</span>
                    <span onclick="go_to_url(this);" class="buttonPro small <?php if($sel_rate=='1'){ ?>blue<?php }else{?>yellow<?php } ?>"  href_url="<?php echo $url_page_cur.'&rate=1'; ?>"><i style="font-size: 15px;" class="fa fa-frown-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_1'); ?> (<?php echo $data_m_1; ?>)</span>
                    <span onclick="go_to_url(this);" class="buttonPro small <?php if($sel_rate=='2'){ ?>blue<?php }else{?>yellow<?php } ?>"  href_url="<?php echo $url_page_cur.'&rate=2'; ?>"><i style="font-size: 15px;" class="fa fa-meh-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_2'); ?> (<?php echo $data_m_2; ?>)</span>
                    <span onclick="go_to_url(this);" class="buttonPro small <?php if($sel_rate=='3'){ ?>blue<?php }else{?>yellow<?php } ?>"  href_url="<?php echo $url_page_cur.'&rate=3'; ?>"><i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_3'); ?> (<?php echo $data_m_3; ?>)</span>
                 
                <?php if($is_ready_data_music=='1'){?>   
                <div style="float: left;width: 100%;">
                    <ul>
                        <?php
                        $arr_icon_face=array(   '<i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i>',
                                                '<i style="font-size: 15px;" class="fa fa-frown-o" aria-hidden="true"></i>',
                                                '<i style="font-size: 15px;" class="fa fa-meh-o" aria-hidden="true"></i>',
                                                '<i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i>',
                                                '<i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i>');
                        $lang_music=$data_music['author'];
                        $check_music_all_data=mysql_query("SELECT `value`,`device_id` FROM `app_my_girl_music_data_$lang_music` WHERE `id_chat` = '$id_music' ORDER BY RAND() LIMIT 10");
                        while($row_data=mysql_fetch_array($check_music_all_data)){
                            $id_row_data_music=$row_data['device_id'];
                            $query_account=mysql_query("SELECT `name` FROM `app_my_girl_user_$lang_music` WHERE `id_device` = '$id_row_data_music' AND `status`='0' LIMIT 1");
                            if(mysql_num_rows($query_account)){
                                $data_account=mysql_fetch_array($query_account);
                                if($id_row_data_music!=''&&$row_data['value']!=''){
                                    $index_icon=intval($row_data['value']);
                                    $url_img='app_mygirl/app_my_girl_'.$lang_music.'_user/'.$id_row_data_music.'.png';
                                    $url_avatar=$url.'/thumb.php?src='.$url.'/images/avatar_default.png&size=15x15&trim=1';
                                    if(file_exists($url_img)){
                                        $url_avatar=$url.'/thumb.php?src='.$url.'/'.$url_img.'&size=15x15&trim=1';
                                    }
                                    echo '<li ><a href="'.$url.'/user/'.$id_row_data_music.'/'.$lang_music.'"> '.$arr_icon_face[$index_icon].' <img src="'.$url_avatar.'"/>  <b>'.$data_account['name'].'</b> <i style="color:#cccccc">'.$id_row_data_music.'</i></a></li>';
                                }
                                mysql_free_result($query_account);
                            }
                        }
                        mysql_free_result($check_music_all_data);
                        ?>
                    </ul>
                </div>
                <?php }?>
            </div>
<script>
function go_to_url(emp){
    var url_s=$(emp).attr('href_url');
    window.location=url_s;
}
</script>