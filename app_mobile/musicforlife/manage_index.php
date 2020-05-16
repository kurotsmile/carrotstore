<script src="<?php echo $url_carrot_store;?>/js/Chart.min.js"></script>
<canvas id="char_music" style="position: relative;" width="100%" height="20px">
</canvas>  
<?php
$array_lang=array();
$list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
while($l=mysqli_fetch_array($list_country)){
    array_push($array_lang,$l['key']);
}


$limit_show_date=360;
$array_category_day=array();
$query_log_day=mysqli_query($link,"SELECT  DATE(date) FROM carrotsy_music.`log_key` WHERE `date` BETWEEN DATE_SUB(NOW(), INTERVAL $limit_show_date DAY) AND NOW() GROUP BY DATE(date)  ORDER BY `date`");
while($row_day=mysqli_fetch_array($query_log_day)){
    array_push($array_category_day,$row_day[0]);
}

$array_data_map=array();

for($i_lang=0;$i_lang<mysqli_num_rows($list_country);$i_lang++){
    $item_data=array();
    for($i_day=0;$i_day<count($array_category_day);$i_day++){
        
        $date_show=$array_category_day[$i_day];
        $lang_show=$array_lang[$i_lang];
        $query_count_lang=mysqli_query($link,"SELECT COUNT(`key`) FROM carrotsy_music.`log_key` WHERE DATE(date) = '$date_show' AND `lang`='$lang_show'");
        $arr_data=mysqli_fetch_array($query_count_lang);
        array_push($item_data,$arr_data[0]);
        mysqli_free_result($query_count_lang);
    }
    array_push($array_data_map,$item_data);
}
mysqli_free_result($query_log_day);
?>
<script>
var ctx = document.getElementById('char_music').getContext('2d');
var chart = null;

function show_char_log_day(){
    chart = new Chart(ctx, {
    
        type: 'bar',
        data: {
            labels: <?php echo json_encode($array_category_day); ?>,
            datasets: [
                <?php
                    for($i=0;$i<count($array_lang);$i++){
                        $color='rgb('.rand(0,225).', '.rand(0,225).', '.rand(0,225).')';
                        $data=json_encode($array_data_map[$i]);
                        echo '{';
                            echo 'label:"'.$array_lang[$i].'",';
                            echo 'fill: false,';
                            echo "backgroundColor: '$color',";
                            echo "borderColor: '$color',";
                            echo "data:$data,";
                        echo '},';
                    }
                ?>
                ]
        },
    
        // Configuration options go here
        options: {}
    });
}

show_char_log_day();
</script>
      
        <ul id="menu_sub">
            <li><a class="buttonPro small red" href="<?php echo $url; ?>index.php?view=handle&funcs=del_all_key"><i class="fa fa-trash" aria-hidden="true"></i> Xóa tất cả các từ khóa</a></li>
        </ul>

            <?php 
            $list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1'");
            while($l=mysqli_fetch_array($list_country)){
                ?>
                <div class="app_lang <?php if($l['ver0']=='1'){?>active<?php }?>">
                <b class="name_lang"><?php  echo $l['name'];?></b><br />
                <img src="<?php echo $url_carrot_store;?>/app_mygirl/img/<?php  echo $l['key'];?>.png" style="float: left;margin: 3px;width: 50px;" />
                <?php
                $mysql_count_search=mysqli_query($link,"SELECT COUNT(`key`) FROM carrotsy_music.`log_key` WHERE `lang` = '".$l['key']."' LIMIT 50");
                $data_key_count=mysqli_fetch_array($mysql_count_search);
                $mysql_count_playlist=mysqli_query($link,"SELECT COUNT(`id`) FROM `playlist_".$l['key']."`");
                $data_playlist_count=mysqli_fetch_array($mysql_count_playlist);
                ?>
                <div class="data_other">
                    <a href="<?php echo $url;?>/index.php?view=search&lang=<?php echo $l['key'];?>"><i class="fa fa-search-plus" aria-hidden="true"></i> Từ khóa tìm kiếm:<?php echo $data_key_count[0]; ?></a><br />
                    <a href="https://play.google.com/store/apps/details?id=com.CarrotApp.musicforlife&hl=<?php echo $l['key'];?>" title="Chplay" target="_blank"><i class="fa fa-android" aria-hidden="true"></i> CH play</a><br />
                    <a href="<?php echo $url;?>/index.php?view=lang_value&lang=<?php echo $l['key'];?>"><i class="fa fa-language" aria-hidden="true"></i> Ngô ngữ <b style="font-weight: bold;font-size: 10px;font-size: 7px;color: #5f5f5f;">(<i class="fa fa-mobile" aria-hidden="true"></i> Ứng dụng)</b></a><br />
                    <a href="<?php echo $url;?>/index.php?view=game_lang_value&lang=<?php echo $l['key'];?>"><i class="fa fa-language" aria-hidden="true"></i> Ngô ngữ <b style="font-weight: bold;font-size: 10px;font-size: 7px;color: #5f5f5f;">(<i class="fa fa-gamepad" aria-hidden="true"></i> Trò chơi)</b></a><br />
                    <a href=""><i class="fa fa-play-circle" aria-hidden="true"></i> Danh sách phát:<?php echo $data_playlist_count[0];?></b></a>
                </div>
                </div>
                <?php
            }
            ?>