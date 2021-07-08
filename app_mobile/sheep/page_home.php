<?php
$list_lang=$this->get_list_lang();
for($i=0;$i<count($list_lang);$i++){
    $item_lang=$list_lang[$i];
    $lang_key=$item_lang['key'];
    $is_sel='off';
    $query_check_sel=$this->q("SELECT `key` FROM `country` WHERE `key` = '$lang_key' LIMIT 1");
    if(mysqli_num_rows($query_check_sel)>0){
        $is_sel='on';
    }else{
        $is_sel='off';
    }
    ?>
    <div class="box_lang" <?php if($is_sel=='on'){?>style="background-color: #d4f9ff;"<?php }?>>
    <img src="<?php echo $item_lang['icon'];?>" />
    <strong><?php echo $item_lang['name'];?></strong><br />
    <?php 
    $count_msg=$this->q_data("SELECT COUNT(`id`) as c FROM `good_night` WHERE `lang` = '".$lang_key."' AND `active`='0'");
    $number_msg=$count_msg['c'];

    $count_msg_no_active=$this->q_data("SELECT COUNT(`id`) as c FROM `good_night` WHERE `lang` = '".$lang_key."' AND `active`='1'");
    $number_msg_no_active=$count_msg_no_active['c'];

    $count_scores=$this->q_data("SELECT COUNT(*) as c FROM `scores` WHERE `lang` = '".$lang_key."'");
    $number_scores=$count_scores['c'];

    $num_value_lang='0';
    $count_value_lang=$this->q_data("SELECT `value` FROM `value_lang` WHERE `id_country` = '".$lang_key."' LIMIT 1");
    if($count_value_lang!=null){
        $data_value=$count_value_lang['value'];
        $data_value=(array)json_decode($data_value);
        $num_value_lang=count($data_value);
    }
    
     ?>
    
    <p>
        <a href="<?php echo $this->url;?>?page=good_night_add&lang=<?php echo $lang_key;?>"><i class="fa fa-plus-circle"></i> Thêm msg</a><br />
        <a href="<?php echo $this->url;?>?page=scores_add&lang=<?php echo $lang_key;?>"><i class="fa fa-plus-circle"></i> Thêm điểm số</a><br />
        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.kurotsmile.demcuu3d&hl=<?php echo $lang_key;?>"><i class="fa fa-android"></i> Xem ứng dụng trên chplay</a><br />
        <a target="_blank" href="https://itunes.apple.com/vn/app/id1409909203?l=<?php echo $lang_key;?>"><i class="fa fa-apple"></i> Xem ứng dụng trên Appstore</a><br />
        <a href="<?php echo $this->url;?>?view=value_key&lang=<?php echo $lang_key;?>"><i class="fa fa-globe"></i> Ngôn ngữ ứng dụng (<?php echo $num_value_lang;?>)</a>
    </p>
    
    <p>
        <a href="<?php echo $this->url;?>?page=good_night&lang=<?php echo $lang_key;?>&active=0"><i class="fa fa-comments"></i> Số lượng sử dụng: <span><?php echo $number_msg; ?></span></a><br />
        <a href="<?php echo $this->url;?>?page=good_night&lang=<?php echo $lang_key;?>&active=1"><i class="fa fa-comment"></i> Số lượng chư duyệt: <span><?php echo $number_msg_no_active; ?></span></a><br />
        <a href="<?php echo $this->url;?>?page=scores&lang=<?php echo $lang_key;?>&active=1"><i class="fa fa-list-ul"></i> Điểm số : <span><?php echo $number_scores; ?></span></a>
    </p>
    
    </div>
    <?php
}
?>