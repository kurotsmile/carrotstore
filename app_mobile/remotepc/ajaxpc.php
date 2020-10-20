<?php
header("Access-Control-Allow-Origin: *");
include "config.php";
include "database.php";

function vn_to_str ($str){
    $unicode = array(
    'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
    'd'=>'đ',
    'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    'i'=>'í|ì|ỉ|ĩ|ị',
    'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
    'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
    'D'=>'Đ',
    'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
    'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
    'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
    'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
     
    foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    $str = str_replace(' ',' ',$str);
    return $str;
}

$function='';
if(isset($_POST['function'])){
    $function=$_POST['function'];
}

if($function=='get_log'){
    $query_log=mysqli_query($link,"SELECT * FROM `log` LIMIT 1");
    $data_log=mysqli_fetch_assoc($query_log);
    if($data_log!=null){
        if($data_log['type']=='voice'){
            $txt_search_act=$data_log['value'];
            $query_action=mysqli_query($link,"SELECT `txt`,`type`, `id`,`value`, `mp3` FROM `action` WHERE MATCH (`txt`) AGAINST ('$txt_search_act' IN BOOLEAN MODE) LIMIT 1");
            if($query_action){
                $data_action=mysqli_fetch_assoc($query_action);
                if($data_action['type']=='search'){
                    $txt_search_act=vn_to_str($txt_search_act);
                    $txt_search_act=str_replace(vn_to_str($data_action['txt']),"", strtolower($txt_search_act));
                    $txt_search=str_replace('{search}',$txt_search_act,$data_action['value']);
                    $data_log['val']=$txt_search;
                }else{
                    $data_log['val']=$data_action['value'];
                }
                $data_log['type']=$data_action['type'];
                if($data_action['mp3']!=''){
                    $data_log['mp3']=$url.'/sound/'.$data_action['mp3'];
                }else{
                    if(file_exists("sound/".$data_action['id'].'.ogg')){
                        $data_log['mp3']=$url.'/sound/'.$data_action['id'].'.ogg';
                    }else{
                        $index_music=rand(0,3);
                        $data_log['mp3']=$url.'/sound/a'.$index_music.'.ogg';
                    }
                }
            }
            $query_delete_log=mysqli_query($link,"DELETE FROM `log`");
        }
    }
    echo json_encode($data_log);
}

if($function=='get_tips'){
    $data_tips=array();
    $query_tips=mysqli_query($link,"SELECT `txt` FROM `action` LIMIT 50");
    while($row_tip=mysqli_fetch_assoc($query_tips)){
        array_push($data_tips,$row_tip['txt']);
    }
    echo json_encode($data_tips);
}

if($function=='send_action'){
    $value=$_POST['txt'];
    $type='voice';
    $query_add_log=mysqli_query($link,"INSERT INTO `log` (`ip`, `type`, `value`) VALUES ('1', '$type', '$value');");
}

if($function=='list_audio'){
    $arr_audio=array();
    $query_list_audio=mysqli_query($link,"SELECT * FROM `audio`");
    while($row_audio=mysqli_fetch_assoc($query_list_audio)){
        array_push($arr_audio,$row_audio['file']);
    }
    echo json_encode($arr_audio);
}

if($function=='get_info_to_day'){
    Class info{
        public $weather_description='';
        public $weather_temp='';
        public $weather_icon='';
        public $sunrise='';
        public $sunset='';
        public $visibility='';
        public $wind_speed='';
        public $wind_deg='';
    }
    $i=new info();

    $date = new DateTime("now", new DateTimeZone("Asia/Ho_Chi_Minh") );
    $data_cur=$date->format('Y-m-d');
    $query_weather=mysqli_query($link,"SELECT * FROM `weather` WHERE `date` = '$data_cur' LIMIT 1");
    $data_weather=mysqli_fetch_assoc($query_weather);
    if($data_weather==null){
        $str_weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=hue,duong%20son,vn&appid=1cfc8822c6c366984da4d0abbb58eaf2&lang=vi&mode=json&units=metric');
        $json_weather=json_decode($str_weather);
        $query_add_weather=mysqli_query($link,"INSERT INTO `weather` (`data`, `date`) VALUES ('$str_weather', NOW());");
    }else{
        $str_weather=$data_weather['data'];
        $json_weather=json_decode($str_weather);
    }

    $data_weather=$json_weather->weather;
    $data_weather_description=$data_weather[0]->description;
    $data_weather_icon=$data_weather[0]->icon;

    $data_main=$json_weather->main;
    $data_main_temp=$data_main->temp;

    $data_sys=$json_weather->sys;
    $data_wind=$json_weather->wind;

    $weather_temp=round($data_main_temp,2)-273.15;

    $i->weather_description=$data_weather_description;
    $i->weather_temp=$weather_temp.'°C';
    $i->sunrise=$data_sys->sunrise;
    $i->sunset=$data_sys->sunset;
    $i->visibility=$json_weather->visibility.'km';
    $i->wind_speed=$data_wind->speed.'km/h';
    $i->wind_deg=$data_wind->deg.'°';
    $i->weather_icon="http://openweathermap.org/img/wn/$data_weather_icon@2x.png";

    echo json_encode($i);
}

if($function=='open_music'){
    $query_get_music=mysqli_query($link,"SELECT `id`, `chat`, `file_url` FROM carrotsy_virtuallover.`app_my_girl_en` WHERE `effect` = '2' ORDER BY RAND() LIMIT 1");
    $data_music=mysqli_fetch_assoc($query_get_music);
    $data_music['name']=$data_music['chat'];
    echo json_encode($data_music);
}
?>