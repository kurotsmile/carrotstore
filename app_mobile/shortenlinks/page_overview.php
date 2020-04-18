<?php
$query_list_country=mysql_query("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country`");
?>
<?php
while($country=mysql_fetch_array($query_list_country)){
    $key_country=$country['key'];
    $is_sel='off';
    $count_data_key_lang=0;
    $query_check_sel=mysql_query("SELECT `key` FROM `country` WHERE `key` = '$key_country' LIMIT 1");
    $query_count_log=mysql_query("SELECT * FROM `log` WHERE `lang` = '$key_country'");
    if(mysql_num_rows($query_check_sel)>0){
        $is_sel='on';
    }else{
        $is_sel='off';
    }
    $query_count_data_key=mysql_query("SELECT `value` FROM `value_lang` WHERE `id_country` = '$key_country' LIMIT 1");
    if(mysql_num_rows($query_count_data_key)>0){
        $data_count_data_key=mysql_fetch_array($query_count_data_key);
        $data_count_data_key=json_decode($data_count_data_key['value']);
        $data_count_data_key=(array)$data_count_data_key;
        $count_data_key_lang=sizeof($data_count_data_key);
    }
    ?>
    <div class="box <?php if($is_sel=='on'){?>active<?php }?>">
        <div class="header">
            <img style="float: left;margin-right: 5px;" src="<?php echo $url_home;?>/thumb.php?src=<?php echo $url_home;?>/app_mygirl/img/<?php echo $country['key'];?>.png&size=60&trim=1"/>
            <strong><?php echo $country['name']; ?></strong><br />
            <a class="buttonPro small black" href="<?php echo $url;?>?view=page_key_value&lang=<?php echo $key_country;?>"><i class="fa fa-anchor" aria-hidden="true"></i> thay đổi ngôn ngữ ứng dụng</a>
        </div>
        <div class="body">
            <ul>
                <li>Đã có <b><?php echo mysql_num_rows($query_count_log);?></b> liên kết rút gọn được tạo ở quốc gian này</li>
                <li>
                    <?php if($is_sel=='on'){?>
                        Quốc gia này đã được phân bố ứng dụng
                    <?php }else{?>
                        Quốc gia này chưa được triển khai ứng dụng
                    <?php }?>
                </li>
                <li>
                    Có <b><?php echo $count_data_key_lang;?></b> từ khóa ngôn ngữ ứng dụng được tạo
                </li>
            </ul>
        </div>
    </div>
    <?php
}
?>