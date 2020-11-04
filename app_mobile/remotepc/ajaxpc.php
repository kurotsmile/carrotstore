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
                        $data_log['type']="chat";
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
                    $data_log['type']="chat";
                }


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
                    file_put_contents(dirname(__FILE__) . '/chat.mp3', $output);
                }
                $data_log['mp3']=$url.'/chat.mp3';

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

if($function=='get_siri'){
    $query_log=mysqli_query($link,"SELECT * FROM `log` LIMIT 1");
    $data_log=mysqli_fetch_assoc($query_log);
    $txt_search_act='';
    if($data_log!=null){
        $txt_search_act=mysqli_real_escape_string($link,$data_log['value']);
        $data_log['value']=strtolower($txt_search_act);
        $query_delete_log=mysqli_query($link,"DELETE FROM `log`");
        echo json_encode($data_log);
    }
}

if($function=='call_act'){
    $txt_search_act=$_POST['txt'];
    $lang_chat='';
    $data_chat='';
    $query_chat=mysqli_query($link,"SELECT `chat`,`id` FROM carrotsy_virtuallover.`app_my_girl_en` WHERE MATCH (`text`) AGAINST ('$txt_search_act' IN BOOLEAN MODE) AND `sex`='0' AND `character_sex`='1' ORDER BY RAND() LIMIT 1");
    $is_chat_en=false;
    if($query_chat){
        $data_chat=mysqli_fetch_assoc($query_chat);
        if($data_chat!=null){
            $is_chat_en=true;
        }else{
            $is_chat_en=false;
        }
    }else{
        $is_chat_en=false;
    }

    if($is_chat_en==false){
        $query_chat=mysqli_query($link,"SELECT `chat` FROM carrotsy_virtuallover.`app_my_girl_vi` WHERE MATCH (`text`) AGAINST ('$txt_search_act' IN BOOLEAN MODE) AND `sex`='0' AND `character_sex`='1' ORDER BY RAND() LIMIT 1");
        $data_chat=mysqli_fetch_assoc($query_chat);
    }
    echo json_encode($data_chat);
}

?>