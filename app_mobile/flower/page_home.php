<?php
$query_list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country`");
while($item_country=mysqli_fetch_array($query_list_country)){
    $key_country=$item_country['key'];
    $is_sel='off';
    $query_check_sel=mysqli_query($link,"SELECT `key` FROM `country` WHERE `key` = '$key_country' LIMIT 1");
    if(mysqli_num_rows($query_check_sel)>0){
        $is_sel='on';
    }else{
        $is_sel='off';
    }

    $count_lang_val=0;
    $query_count_lang_val=mysqli_query($link,"SELECT * FROM `lang_value` WHERE `id_country` = '$key_country' LIMIT 1");
    if(mysqli_num_rows($query_count_lang_val)>0){
        $data_lang_val=mysqli_fetch_array($query_count_lang_val);
        if($data_lang_val['value']!=''){
            $arr_lang_val=json_decode($data_lang_val['value']);
            $arr_lang_val=(array)$arr_lang_val;
            $count_lang_val=sizeof($arr_lang_val);
        }
    }

    $msg_active=mysqli_query($link,"SELECT COUNT(`id`) FROM carrotsy_virtuallover.app_my_girl_".$key_country." WHERE `effect` = '36' AND `disable` = '0'");
    $arr_active=mysqli_fetch_array($msg_active);
    $msg_no_active=mysqli_query($link,"SELECT * FROM `flower` WHERE `lang`='".$key_country."' AND `active` = '1'");
    ?>
    <div class="box_lang <?php if($is_sel=="on"){ echo 'active'; } ?>">
        <img class="icon" src="<?php echo $url_carrot_store;?>/thumb.php?src=<?php echo $url_carrot_store;?>/app_mygirl/img/<?php echo $key_country; ?>.png&size=30&trim=1" />
        <b>ID:</b><?php echo $item_country["id"]; ?><br />
        <b>Key:</b><?php echo $key_country; ?><br />
        <b>Name</b><?php echo $item_country["name"]; ?><br />

        <a href="<?php echo $url ?>?view=msg_add&lang=<?php echo $key_country; ?>"><i class="fa fa-plus"></i> Thêm châm ngôn</a><br /><br />
        <a href="<?php echo $url ?>?view=manager_lang_value&lang=<?php echo $key_country; ?>"><i class="fa fa-language"></i> Ngôn ngữ ứng dụng (<b><?php echo $count_lang_val; ?></b>)</a><br />
        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.kurotsmile.LoveorNoLove&hl=<?php echo $key_country;?>"><i class="fa fa-android"></i> Xem ứng dụng trên chplay</a><br />
  
       <a href="<?php echo $url ?>?view=msg_active&lang=<?php echo $key_country; ?>"><i class="fa fa-comments"></i> châm ngôn sử dụng <?php echo $arr_active[0]; ?></a><br />
       <a href="<?php echo $url ?>?view=msg&lang=<?php echo $key_country; ?>"><i class="fa fa-comment"></i> châm ngôn chưa duyệt <?php echo mysqli_num_rows($msg_no_active); ?></a><br />
        <?php
            $check_error_table=mysqli_query($link,"select 1 from `flower_action_$key_country` LIMIT 1");
            if($check_error_table !== FALSE){
        ?>
            <a><i class="fa fa-table"></i> Không có lỗi </a>
        <?php }else{ ?>
            <a style="color: red;" href="<?php echo $url;?>?view=tool&sub_view=fix_error&lang=<?php echo $key_country;?>"><i class="fa fa-table"></i> Phát hiện lỗi - sửa lỗi này</a>
        <?php } ?>
    </div>
    <?php
}
?>