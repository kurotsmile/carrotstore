<?php
include "config.php";
include "database.php";
include "function.php";
$view_page='list';
if(isset($_GET['view'])){
    $view_page=$_GET['view'];
}
?>
<html>
<header>
    <title>Trợ lý ảo PC</title>
    <link rel="shortcut icon" href="<?php echo $url;?>/icon.ico">
    <link href="<?php echo $url;?>/style.css" rel="stylesheet" />
    <link href="<?php echo $url_carrot_store;?>/assets/css/buttonPro.min.css?v=<?php echo $ver;?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $url_carrot_store;?>/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url_carrot_store;?>/dist/sweetalert.min.css"/>
    <script src="<?php echo $url_carrot_store;?>/js/jquery.min.js"></script>
    <script src="<?php echo $url_carrot_store;?>/dist/sweetalert.min.js"></script>
</header>
<body>
<?php
$date = new DateTime("now", new DateTimeZone("Asia/Ho_Chi_Minh") );
//echo $date->format('H:i:s d/m/Y');
$data_cur=$date->format('Y-m-d');

$query_weather=mysqli_query($link,"SELECT * FROM `weather` WHERE `date` = '$data_cur' LIMIT 1");
$data_weather=mysqli_fetch_assoc($query_weather);
if($data_weather==null){
    $str_weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=hue,duong%20son,vn&appid=1cfc8822c6c366984da4d0abbb58eaf2&lang=vi');
    $json_weather=json_decode($str_weather);
    echo var_dump($json_weather);
    $query_add_weather=mysqli_query($link,"INSERT INTO `weather` (`data`, `date`) VALUES ('$str_weather', NOW());");
}else{
    $str_weather=$data_weather['data'];
    $json_weather=json_decode($str_weather);
    $data_weather=$json_weather->weather;
    $data_weather_description=$data_weather[0]->description;
    echo 'Mô tả thời tiết '.$data_weather_description.'</br>';
    $data_main=$json_weather->main;
    $data_main_temp=$data_main->temp;
    echo 'Nhiệt độ:'.$data_main_temp.'</br>';

}
?>

<ul id="menu_top">
    <li><a href="<?php echo $url;?>/index.php?view=list"><i class="fa fa-list" aria-hidden="true"></i> Danh sách các câu lệnh</a></li>
    <li><a href="<?php echo $url;?>/index.php?view=add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a></li>
    <li><a href="<?php echo $url;?>/index.php?view=audio"><i class="fa fa-file-audio-o" aria-hidden="true"></i> Giọng đọc</a></li>
</ul>

<?php
include "page_".$view_page.".php";
?>
</body>
</html>