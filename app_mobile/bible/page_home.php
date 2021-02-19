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
?>
    <div class="box_country <?php if($is_sel=='on'){?>active<?php }?>">
        <div class="header">
            <img class="icon" src="<?php echo $url_carrot_store;?>/thumb.php?src=<?php echo $url_carrot_store;?>/app_mygirl/img/<?php echo $key_country; ?>.png&size=30&trim=1" />
            <strong class="title"><?php echo $item_country['name'];?></strong><br />
            <i style="font-size: 10px;float: left;width: 90%">
            <?php
                if($is_sel=='on'){ echo 'Đã triển khai nội dung tại đất nước này'; }else{ echo 'Chưa kích hoạt';}
            ?>
            </i>
        </div>
        
        <div class="body">
            <?php
                $query_count_book_0=mysqli_query($link,"SELECT COUNT(`name`) as count_book FROM `book` WHERE `lang` = '$key_country' AND `type`=0 ");
                $count_book_0=mysqli_fetch_array($query_count_book_0);
                $query_count_book_1=mysqli_query($link,"SELECT COUNT(`name`) as count_book FROM `book` WHERE `lang` = '$key_country' AND `type`=1 ");
                $count_book_1=mysqli_fetch_array($query_count_book_1);
                
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
            ?>
            <ul style="margin: 0px;padding: 3px;list-style: none;">
                <li><a href="<?php echo $url;?>?page=manager_book&lang=<?php echo $key_country;?>&type=0">Cựu ước :<strong><?php echo $count_book_0['count_book']; ?></strong></a> <a href="<?php echo $url;?>?page=add_book&lang=<?php echo $item_country['key']; ?>&type=0" class="buttonPro small"><i class="fa fa-book" aria-hidden="true"></i> Thêm sách</a> <a class="buttonPro small blue" href="<?php echo $url;?>?page=manager_book&lang=<?php echo $key_country;?>&type=0"><i class="fa fa-tasks"></i> Quản lý</a></li>
                <li><a href="<?php echo $url;?>?page=manager_book&lang=<?php echo $key_country;?>&type=1">Tân ước :<strong><?php echo $count_book_1['count_book']; ?></strong></a> <a href="<?php echo $url;?>?page=add_book&lang=<?php echo $item_country['key']; ?>&type=1" class="buttonPro small"><i class="fa fa-book" aria-hidden="true"></i>Thêm sách</a> <a class="buttonPro small blue" href="<?php echo $url;?>?page=manager_book&lang=<?php echo $key_country;?>&type=1"><i class="fa fa-tasks"></i> Quản lý</a></li>
                <li><a href="<?php echo $url;?>?page=manager_lang_value&lang=<?php echo $key_country;?>">Ngôn ngữ giao diện :<strong><?php echo $count_lang_val; ?></strong></a> <a href="<?php echo $url;?>?page=manager_lang_value&lang=<?php echo $key_country;?>" class="buttonPro small"><i class="fa fa-wrench"></i> Sửa</a></li>
                <li><a href="https://play.google.com/store/apps/details?id=com.carrotstore.bible&hl=<?php echo $key_country;?>" target="_blank"><i class="fa fa-android"></i> Xem đánh giá về ứng dụng</a></li>
                <?php
                $check_error_table=mysqli_query($link,"select 1 from `paragraph_$key_country` LIMIT 1");
                if($check_error_table !== FALSE){
                ?>
                    <li><a><i class="fa fa-table"></i> Có bản </a></li>
                <?php
                }else{
                ?>
                    <li ><a style="color: red;" href="<?php echo $url;?>?page=tool&sub_view=add_table&lang=<?php echo $key_country;?>"><i class="fa fa-table"></i> Chưa có bản - sửa lỗi này</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        
    </div>
<?php
}
?>