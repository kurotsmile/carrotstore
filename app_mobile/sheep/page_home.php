<?php
$query_list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country`");
while($row_lang=mysqli_fetch_array($query_list_country)){
    $lang_key=$row_lang['key'];
    $is_sel='off';
    $query_check_sel=mysqli_query($link,"SELECT `key` FROM `country` WHERE `key` = '$lang_key' LIMIT 1");
    if(mysqli_num_rows($query_check_sel)>0){
        $is_sel='on';
    }else{
        $is_sel='off';
    }
    ?>
    <div class="box_lang" <?php if($is_sel=='on'){?>style="background-color: #F2E2A4;"<?php }?>>
    <img src="<?php echo $url_carrot_store;?>/thumb.php?src=<?php echo $url_carrot_store;?>/app_mygirl/img/<?php echo $lang_key;?>.png&size=50&trim=1" />
    <strong><?php echo $row_lang['name'];?></strong><br />
    ID:<?php echo $row_lang['id'];?><br />
    Key:<?php echo $row_lang['key'];?><br />
    
    <?php 
    $count_msg=mysqli_query($link,"SELECT COUNT(`id`) FROM `good_night` WHERE `lang` = '".$lang_key."' AND `active`='0'");
    $number_msg=mysqli_fetch_array($count_msg);
    mysqli_free_result($count_msg);
    
    $count_msg_no_active=mysqli_query($link,"SELECT COUNT(`id`) FROM `good_night` WHERE `lang` = '".$lang_key."' AND `active`='1'");
    $number_msg_no_active=mysqli_fetch_array($count_msg_no_active);
    mysqli_free_result($count_msg_no_active);
    
    $coun_scores=mysqli_query($link,"SELECT COUNT(*) FROM `scores` WHERE `lang` = '".$lang_key."'");
    $number_scores=mysqli_fetch_array($coun_scores);
    mysqli_free_result($coun_scores);
    
    $num_value_lang='0';
    $count_value_lang=mysqli_query($link,"SELECT `value` FROM `value_lang` WHERE `id_country` = '".$lang_key."' LIMIT 1");
    if(mysqli_num_rows($count_value_lang)>0){
        $data_value=mysqli_fetch_array($count_value_lang);
        $data_value=$data_value['value'];
        $data_value=(array)json_decode($data_value);
        $num_value_lang=count($data_value);
    }
    
     ?>
    
    <p>
        <a href="<?php echo $url;?>?view=good_night_add&lang=<?php echo $lang_key;?>"><i class="fa fa-plus-circle"></i> Thêm msg</a><br />
        <a href="<?php echo $url;?>?view=scores_add&lang=<?php echo $lang_key;?>"><i class="fa fa-plus-circle"></i> Thêm điểm số</a><br />
        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.kurotsmile.demcuu3d&hl=<?php echo $lang_key;?>"><i class="fa fa-android"></i> Xem ứng dụng trên chplay</a><br />
        <a target="_blank" href="https://itunes.apple.com/vn/app/id1409909203?l=<?php echo $lang_key;?>"><i class="fa fa-apple"></i> Xem ứng dụng trên Appstore</a><br />
        <a href="<?php echo $url;?>?view=value_key&lang=<?php echo $lang_key;?>"><i class="fa fa-globe"></i> Ngôn ngữ ứng dụng (<?php echo $num_value_lang;?>)</a>
    </p>
    
    <p>
        <a href="<?php echo $url;?>?view=good_night&lang=<?php echo $lang_key;?>&active=0"><i class="fa fa-comments"></i> Số lượng sử dụng: <span><?php echo $number_msg[0]; ?></span></a><br />
        <a href="<?php echo $url;?>?view=good_night&lang=<?php echo $lang_key;?>&active=1"><i class="fa fa-comment"></i> Số lượng chư duyệt: <span><?php echo $number_msg_no_active[0]; ?></span></a><br />
        <a href="<?php echo $url;?>?view=scores&lang=<?php echo $lang_key;?>&active=1"><i class="fa fa-list-ul"></i> Điểm số : <span><?php echo $number_scores[0]; ?></span></a><br />
    </p>
    
    <?php
    if(mysqli_num_rows($count_value_lang)>0){
    ?>
    <div class="table_value">
        <table style="float: left;width: 100%;">
        <?php 
        foreach($data_value as $key=>$val){?>
            <tr>
                <td><?php echo $key;?></td>
                <td><?php echo $val;?></td>
            </tr>
        <?php } 
        ?>
        </table>
    </div>
    <?php }?>
    </div>
    <?php
}
?>