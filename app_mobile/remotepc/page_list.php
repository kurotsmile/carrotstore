<?php
$date = new DateTime("now", new DateTimeZone("Asia/Ho_Chi_Minh") );
//echo $date->format('H:i:s d/m/Y');
$data_cur=$date->format('Y-m-d');

$query_weather=mysqli_query($link,"SELECT * FROM `weather` WHERE `date` = '$data_cur' LIMIT 1");
$data_weather=mysqli_fetch_assoc($query_weather);
if($data_weather==null){
    $str_weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=hue,duong%20son,vn&appid=1cfc8822c6c366984da4d0abbb58eaf2&lang=vi&cnt=3');
    $json_weather=json_decode($str_weather);
    $query_add_weather=mysqli_query($link,"INSERT INTO `weather` (`data`, `date`) VALUES ('$str_weather', NOW());");
}else{
    $str_weather=$data_weather['data'];
    $json_weather=json_decode($str_weather);
}

$data_weather=$json_weather->weather;
$data_weather_description=$data_weather[0]->description;



$data_main=$json_weather->main;
$data_main_temp=$data_main->temp;

$weather_temp=round($data_main_temp,2)-273.15;

$data_sys=$json_weather->sys;
$data_wind=$json_weather->wind;

$data_weather_icon=$data_weather[0]->icon;
if(file_exists('images/'.$data_weather_icon.'@2x.png')){
    $weather_icon=$url."/images/$data_weather_icon@2x.png";
}else{
    $weather_icon="http://openweathermap.org/img/wn/$data_weather_icon@2x.png";
}

if(isset($data_weather[1])){
    $data_tomorrow=$data_weather[1];
    $url_icon_tomorrow=$data_tomorrow->icon;
    if(file_exists('images/'.$url_icon_tomorrow.'@2x.png')){
        $url_icon_tomorrow=$url."/images/$url_icon_tomorrow@2x.png";
    }else{
        $url_icon_tomorrow="http://openweathermap.org/img/wn/$url_icon_tomorrow@2x.png";
    }
}
?>

<div class="box_info">
    <img src="<?php echo $weather_icon;?>" style="float:left" />
    <ul>
        <li><strong>Hôm nay</strong></li>
        <li><b>Mô tả thời tiết</b> : <?php echo $data_weather_description; ?></li>
        <li><b>Nhiệt độ</b> : <?php echo $weather_temp.'°C'; ?></li>
        <li><b>Hướng gió</b> : <?php echo $data_wind->deg.'°'; ?></li>
        <li><b>Tốc độ gió</b> : <?php echo $data_wind->speed.'km/h'; ?></li>
    </ul>

    <?php
    if(isset($data_weather[1])){
    ?>
    <ul>
        <li><strong>Ngày mai</strong></li>
        <li><img style="width:50px" src="<?php echo $url_icon_tomorrow;?>"/></li>
        <li><b>Mô tả thời tiết</b> : <?php echo $data_tomorrow->description; ?></li>
    </ul>
    <?php
    }
    ?>

</div>

<?php
$url_cur=$url.'/index.php?view=list';

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete_action=mysqli_query($link,"DELETE FROM `action` WHERE (`id` = '$id_delete');");
    echo msg('Xóa thành công ('.$id_delete.')','success');
}
?>
<table>
<?php
$query_list_act=mysqli_query($link,"select * from `action` ORDER BY `id` DESC");
while($row_act=mysqli_fetch_assoc($query_list_act)){
    ?>
    <tr>
        <td><i class="fa fa-microphone" aria-hidden="true"></i> <?php echo $row_act['txt']; ?></td>
        <td><?php echo $row_act['type']; ?></td>
        <td><a href="<?php echo $row_act['value']; ?>" target="_blank"><?php echo $row_act['value']; ?></a></td>
        <td><a href="<?php echo $url;?>/sound/<?php echo $row_act['mp3']; ?>" target="_blank"><?php echo $row_act['mp3']; ?></a></td>
        <td>
            <a href="<?php echo $url;?>/index.php?view=add&edit=<?php echo $row_act['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa</a>
            <a href="<?php echo $url_cur;?>&delete=<?php echo $row_act['id'];?>" onclick="return confirm('Có chắc chắn là muốn xóa?');" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
}
?>
</table>