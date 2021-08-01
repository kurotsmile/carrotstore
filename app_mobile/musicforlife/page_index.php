<?php
if(isset($_GET['act'])){
    $q_del=$this->q("DELETE FROM carrotsy_music.`log_key` WHERE `date` <= NOW() - INTERVAL 30 DAY");
    if($q_del) echo $this->msg("Đã xóa các từ khóa hết hạng kiểm duyệt (cách đây 1 tháng)!");
}
?>
<script src="<?php echo $this->url_carrot_store;?>/js/Chart.min.js"></script>
<canvas id="char_music" style="position: relative;" width="100%" height="20px">
</canvas>  
<?php
$array_lang=$this->get_list_lang();

$limit_show_date=14;
$array_category_day=array();
$query_log_day=$this->q("SELECT DATE(date) FROM carrotsy_music.`log_key` WHERE `date` BETWEEN DATE_SUB(NOW(), INTERVAL $limit_show_date DAY) AND NOW() GROUP BY DATE(date)  ORDER BY `date`");
while($row_day=mysqli_fetch_array($query_log_day)){
    array_push($array_category_day,$row_day[0]);
}

$array_data_map=array();

for($i_lang=0;$i_lang<count($array_lang);$i_lang++){
    $item_data=array();
    for($i_day=0;$i_day<count($array_category_day);$i_day++){
        $date_show=$array_category_day[$i_day];
        $lang_show=$array_lang[$i_lang];
        $lang_key=$lang_show['key'];
        $data_count_log=$this->q_data("SELECT COUNT(`key`) as c FROM carrotsy_music.`log_key` WHERE DATE(date) = '$date_show' AND `lang`='$lang_key'");
        array_push($item_data,$data_count_log['c']);
    }
    array_push($array_data_map,$item_data);
}

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
                        $item_lang=$array_lang[$i];
                        $lang_key=$item_lang['key'];
                        $color='rgb('.rand(0,225).', '.rand(0,225).', '.rand(0,225).')';
                        $data=json_encode($array_data_map[$i]);
                        echo '{';
                            echo 'label:"'.$lang_key.'",';
                            echo 'fill: false,';
                            echo "backgroundColor: '$color',";
                            echo "borderColor: '$color',";
                            echo "data:$data,";
                        echo '},';
                    }
                ?>
            ]
        },
        options: {}
    });
}
show_char_log_day();
</script>
      
<ul id="menu_sub">
    <li><a class="buttonPro small red" href="<?php echo $this->cur_url;?>&act=del_all_key"><i class="fa fa-trash" aria-hidden="true"></i> Xóa dữ liệu hết hạng kiểm duyệt</a></li>
</ul>

<?php 
for($i=0;$i<count($array_lang);$i++){
    $l=$array_lang[$i];
?>
                <div class="app_lang">
                <b class="name_lang"><?php  echo $l['name'];?></b><br />
                <a href="<?php echo $this->url_carrot_store;?>/app_my_girl_music.php?lang=<?php echo $l['key'];?>"  target="_blank"><img src="<?php echo $l['icon'];?>" style="float: left;margin: 3px;width: 30px;" /></a>
                <?php
                $mysql_count_search=$this->q("SELECT COUNT(`key`) FROM carrotsy_music.`log_key` WHERE `lang` = '".$l['key']."' LIMIT 50");
                $data_key_count=mysqli_fetch_array($mysql_count_search);
                $mysql_count_playlist=$this->q("SELECT COUNT(`id`) FROM `playlist_".$l['key']."`");
                $data_playlist_count=mysqli_fetch_array($mysql_count_playlist);
                ?>
                <div class="data_other">
                    <a href="<?php echo $this->url;?>?page=search&lang=<?php echo $l['key'];?>" target="_blank"><i class="fa fa-search-plus" aria-hidden="true"></i> Từ khóa tìm kiếm:<?php echo $data_key_count[0]; ?></a><br />
                    <a href="https://play.google.com/store/apps/details?id=com.CarrotApp.musicforlife&hl=<?php echo $l['key'];?>" title="Chplay" target="_blank"><i class="fa fa-android" aria-hidden="true"></i> CH play</a><br />
                    <a href="<?php echo $this->url;?>?page=playlist&lang=<?php echo $l['key'];?>" target="_blank"><i class="fa fa-play-circle" aria-hidden="true"></i> Danh sách phát:<?php echo $data_playlist_count[0];?></b></a>
                </div>
                </div>
<?php
}
?>