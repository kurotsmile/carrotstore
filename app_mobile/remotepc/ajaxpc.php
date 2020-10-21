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
            $txt_search_act=mysqli_real_escape_string($link,$data_log['value']);
            $query_action=mysqli_query($link,"SELECT `txt`,`type`, `id`,`value`, `mp3` FROM `action` WHERE MATCH (`txt`) AGAINST ('$txt_search_act' IN BOOLEAN MODE) LIMIT 1");
            $is_action=0;
            if($query_action){
                if(mysqli_num_rows($query_action)>0){
                    $is_action=1;
                }else{
                    $is_action=0;
                }
            }else{
                $is_action=0;
            }

            if($is_action==1){
                //Thự hiện các câu lệnh
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
                    $query_audio=mysqli_query($link,"SELECT `file` FROM `audio` WHERE `type` = 'done' ORDER BY RAND() LIMIT 1");
                    $data_audio=mysqli_fetch_assoc($query_audio);
                    $name_audio=$data_audio['file'];
                    $data_log['mp3']=$url.'/sound/'.$name_audio;
                }
            }else{
                //Trả lời các câu trò chuyện
                $lang_chat='';
                $query_chat=mysqli_query($link,"SELECT `chat`,`id` FROM carrotsy_virtuallover.`app_my_girl_en` WHERE MATCH (`text`) AGAINST ('$txt_search_act' IN BOOLEAN MODE) AND `sex`='0' AND `character_sex`='1' ORDER BY RAND() LIMIT 1");
                $is_chat_en=false;
                if($query_chat){
                    $data_chat=mysqli_fetch_assoc($query_chat);
                    if($data_chat!=null){
                        $id_chat=$data_chat['id'];
                        $data_log['nv_chat']= $data_chat['chat'];
                        $lang_chat='en';
                        $data_log['link_edit']=$url_carrot_store.'/app_my_girl_update.php?id='.$id_chat.'&lang='.$lang_chat;
                        $is_chat_en=true;
                    }else{
                        $is_chat_en=false;
                    }
                }else{
                    $is_chat_en=false;
                }

                if($is_chat_en==false){
                    $query_chat_vi=mysqli_query($link,"SELECT `chat` FROM carrotsy_virtuallover.`app_my_girl_vi` WHERE MATCH (`text`) AGAINST ('$txt_search_act' IN BOOLEAN MODE) AND `sex`='0' AND `character_sex`='1' ORDER BY RAND() LIMIT 1");
                    $data_chat_vi=mysqli_fetch_assoc($query_chat_vi);
                    $lang_chat='vi';
                    $data_log['nv_chat']= $data_chat_vi['chat'];
                    $id_chat=$data_chat['id'];
                    $data_log['link_edit']=$url_carrot_store.'/app_my_girl_update.php?id='.$id_chat.'&lang='.$lang_chat;
                    
                }

                /*
                $txt_chat=$data_chat['chat'];
                $link_audio='http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen='.strlen($txt_chat).'&client=tw-ob&q='.urlencode($txt_chat).'&tl=en';
                $ch = curl_init($link_audio);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_NOBODY, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                $output = curl_exec($ch);
                $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);
                if ($status == 200) {
                    //if(file_exists("input.mp3")) unlink("input.mp3");
                    file_put_contents(dirname(__FILE__) . '/input.mp3', $output);
                    $absolute_path_in = realpath("input.mp3");
                    $absolute_path_in=str_replace("\\","/",$absolute_path_in);
                    $absolute_path_out=str_replace("input.mp3","sound.ogg",$absolute_path_in);
                    //if(file_exists("sound.mp3")) unlink("sound.ogg");
                    exec("ffmpeg -i $absolute_path_in -c:a libvorbis -q:a 4 $absolute_path_out");
                }
                $data_log['mp3']=$url.'/sound.ogg';
                /*
                $query_audio=mysqli_query($link,"SELECT `file` FROM `audio` WHERE `type` = 'none' ORDER BY RAND() LIMIT 1");
                $data_audio=mysqli_fetch_assoc($query_audio);
                $name_audio=$data_audio['file'];
                $data_log['mp3']=$url.'/sound/'.$name_audio;
                */
            }
            $query_delete_log=mysqli_query($link,"DELETE FROM `log`");
        }else{

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
        public $weather_tomorrow_description='';
        public $weather_temp='';
        public $weather_icon='';
        public $weather_tip='';
        public $weather_tomorrow_icon='';
        public $sunrise='';
        public $sunset='';
        public $visibility='';
        public $wind_speed='';
        public $wind_deg='';
        public $rain='';
        public $humidity='';
        public $clouds='';
    }
    $i=new info();

    $date = new DateTime("now", new DateTimeZone("Asia/Ho_Chi_Minh") );
    $data_cur=$date->format('Y-m-d');
    $query_weather=mysqli_query($link,"SELECT * FROM `weather` WHERE `date` = '$data_cur' LIMIT 1");
    $data_weather=mysqli_fetch_assoc($query_weather);
    if($data_weather==null){
        $str_weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=hue,duong%20son,vn&appid=1cfc8822c6c366984da4d0abbb58eaf2&lang=vi&mode=json&units=metric&cnt=3');
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
    $data_main_feels_like=$data_main->feels_like;
    $data_main_temp_min=$data_main->temp_min;
    $data_main_temp_max=$data_main->temp_max;
    $data_weather_humidity=$data_main->humidity;

    $data_sys=$json_weather->sys;
    $data_wind=$json_weather->wind;
    if(isset($json_weather->rain)) $data_rain=$json_weather->rain;
    $data_clouds=$json_weather->clouds;

    $weather_temp=round($data_main_temp,2)-273.15;
    $weather_feels_like=round($data_main_feels_like,2)-273.15;
    $weather_temp_min=round($data_main_temp_min,2)-273.15;
    $weather_temp_max=round($data_main_temp_max,2)-273.15;

    $i->weather_description=$data_weather_description;
    if(isset($data_weather[1]->description)) $i->weather_tomorrow_description=$data_weather[1]->description;
    $i->weather_temp=$weather_temp.'°C';
    $i->sunrise=$data_sys->sunrise;
    $i->sunset=$data_sys->sunset;
    $i->visibility=$json_weather->visibility.'m';
    $i->wind_speed=$data_wind->speed.'m/s';
    $i->wind_deg=$data_wind->deg.'°';
    if(isset($data_rain))$i->rain=$data_rain->{"1h"}.' mm/h';
    $i->humidity=$data_weather_humidity.'%';
    $i->clouds=$data_clouds->all.'%';
    if($weather_temp_min==$weather_temp_max){
        $i->weather_tip="Nhiệt độ trung bình ".$weather_feels_like."°C, thấp nhất từ ".$weather_temp_min."°C";
    }else{
        $i->weather_tip="Nhiệt độ trung bình ".$weather_feels_like."°C, thấp nhất từ ".$weather_temp_min."°C đến ".$weather_temp_max."°C";
    }

    $data_weather_icon=$data_weather[0]->icon;
    if(file_exists('images/'.$data_weather_icon.'@2x.png')){
        $i->weather_icon=$url."/images/$data_weather_icon@2x.png";
    }else{
        $i->weather_icon="http://openweathermap.org/img/wn/$data_weather_icon@2x.png";
    }

    if(isset($data_weather[1]->icon)){
        $data_weather_tomorrow_icon=$data_weather[1]->icon;
        if(file_exists('images/'.$data_weather_tomorrow_icon.'@2x.png')){
            $i->weather_tomorrow_icon=$url."/images/$data_weather_tomorrow_icon@2x.png";
        }else{
            $i->weather_tomorrow_icon="http://openweathermap.org/img/wn/$data_weather_tomorrow_icon@2x.png";
        }
    }
    echo json_encode($i);
}

if($function=='open_music'){
    $query_get_music=mysqli_query($link,"SELECT `id`, `chat`, `file_url` FROM carrotsy_virtuallover.`app_my_girl_en` WHERE `effect` = '2' ORDER BY RAND() LIMIT 1");
    $data_music=mysqli_fetch_assoc($query_get_music);
    $data_music['name']=$data_music['chat'];
    echo json_encode($data_music);
}
?>