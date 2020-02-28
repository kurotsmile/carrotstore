<?php
include "config.php";
include "database.php";

$func=$_POST['func'];

class App{
    public $all_chat=array();
    public $all_tip=array();
};

class Chat{
    public $chat='';
    public $status='';
    public $color='';
    public $q1='';
    public $q2='';
    public $r1='';
    public $r2='';
    public $link='';
    public $vibrate='';
    public $mp3='';
    public $effect='';
    public $action='';
    public $face='';
    public $id_chat=''; //giúp biết được người dùng đang trả lời cho câu hỏi nào
    public $type_chat=''; //giúp biết được loại câu trả lời là thoại,bắt chuyện,hay lời chào
}
$app=new App;



if($func=='chao'){
    $text=$_POST['text'];
    $lang_sel=$_POST['lang'];
    $sex=0;
    
    if(isset($_POST['sex'])){
        $sex=$_POST['sex'];
    }
    
    $chat=new Chat();
    $chat_bay=chat_func('chao_'.$text);
    $chat->chat=$chat_bay['chat'];
    $chat->status=$chat_bay['status']; 
    $chat->color=$chat_bay['color'];
    $chat->q1=$chat_bay['q1'];
    $chat->q2=$chat_bay['q2'];
    $chat->r1=$chat_bay['r1'];
    $chat->r2=$chat_bay['r2'];
    $chat->vibrate=$chat_bay['vibrate'];
    $chat->mp3=$url.'/app_mygirl/app_my_girl_msg_'.$lang_sel.'/'.$chat_bay['id'].'.mp3';
    $chat->effect=$chat_bay['effect'];
    $chat->face=$chat_bay['face'];
    $chat->action=$chat_bay['action'];
    $chat->id_chat=$chat_bay['id'];
    $chat->type_chat="msg";
    array_push($app->all_chat,$chat);
    
    $character_sex=1;
    if(isset($_POST['character_sex'])){
        $character_sex=$_POST['character_sex'];
    }
    
    $txt_limit_ver='';
    $txt_limit_os='';
        
    if(isset($_POST['version'])){
        $version=$_POST['version'];
        $txt_limit_ver=" AND `ver`!= '$version' ";
    }
        
    if(isset($_POST['os'])){
        $os=$_POST['os'];
        $txt_limit_os=" AND `os`!='$os' ";
    }
        
    $result_tip=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `tip` = '1' AND `sex` = '$sex' AND `character_sex`='$character_sex' $txt_limit_os $txt_limit_ver ORDER BY RAND() LIMIT 25");
    if(mysql_num_rows($result_tip)>0){
        while ($row = mysql_fetch_array($result_tip)) {
            array_push($app->all_tip,$row['text']);
        }
    }
}

if($func=='hit'){
    $text=$_POST['text'];
    $lang_sel=$_POST['lang'];
    
    if(isset($_POST['sex'])){
        if($lang_sel=='en'){
            $sex=0;
        }else{
            $sex=$_POST['sex'];
        }
    }else{
        $sex=0;
    }
    $chat=new Chat();
    $chat_bay=chat_func('dam');
    $chat->chat=$chat_bay['chat'];
    $chat->status=$chat_bay['status']; 
    $chat->color=$chat_bay['color'];
    $chat->q1=$chat_bay['q1'];
    $chat->q2=$chat_bay['q2'];
    $chat->r1=$chat_bay['r1'];
    $chat->r2=$chat_bay['r2'];
    $chat->vibrate=$chat_bay['vibrate'];
    $chat->mp3=$url.'/app_mygirl/app_my_girl_msg_'.$lang_sel.'/'.$chat_bay['id'].'.mp3';
    $chat->effect=$chat_bay['effect'];
    $chat->face=$chat_bay['face'];
    $chat->action=$chat_bay['action'];
    $chat->id_chat=$chat_bay['id'];
    $chat->type_chat="msg";
    array_push($app->all_chat,$chat);
}

if($func=='bat_chuyen'){
    $chat=new Chat();
    $lang_sel=$_POST['lang'];
    $chat_bay=chat_func('bat_chuyen');
    $chat->chat=$chat_bay['chat'];
    $chat->status=$chat_bay['status']; 
    $chat->color=$chat_bay['color'];
    $chat->q1=$chat_bay['q1'];
    $chat->q2=$chat_bay['q2'];
    $chat->r1=$chat_bay['r1'];
    $chat->r2=$chat_bay['r2'];
    $chat->vibrate=$chat_bay['vibrate'];
    $chat->mp3=$url.'/app_mygirl/app_my_girl_msg_'.$lang_sel.'/'.$chat_bay['id'].'.mp3';
    $chat->effect=$chat_bay['effect'];
    $chat->face=$chat_bay['face'];
    $chat->action=$chat_bay['action'];
    $chat->id_chat=$chat_bay['id'];
    $chat->type_chat="msg";
    array_push($app->all_chat,$chat);
}

if($func=='tra_loi'){
    $lang_sel=$_POST['lang'];
    $id=$_POST['text'];
    $sex=0;
    
    if(isset($_POST['sex'])){
        $sex=$_POST['sex'];
    }
    
    $character_sex=1;
    if(isset($_POST['character_sex'])){
        $character_sex=$_POST['character_sex'];
    }
    
    $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id' AND `sex` = '$sex' AND `character_sex`='$character_sex' LIMIT 1");
    if(mysql_num_rows($result_chat)>0){
        while ($row = mysql_fetch_array($result_chat)) {
            
                        //Chuyển hướng câu trò chuyện
                        if($row['id_redirect']!=''){ 
                            $id_redirect=$row['id_redirect'];
                            $result_chat2=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
                            $result_chat2=mysql_fetch_array($result_chat2);
                            $row=$result_chat2;
                            mysql_free_result($result_chat2);
                        } 
                        
            $chat=new Chat();
            $chat->chat=$row['chat'];
            $chat->status=$row['status']; 
            $chat->color=$row['color'];
            $chat->q1=$row['q1'];
            $chat->q2=$row['q2'];
            $chat->r1=$row['r1'];
            $chat->r2=$row['r2'];
            $chat->vibrate=$row['vibrate'];
            $chat->mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3';
            $chat->effect=$row['effect'];
            $chat->face=$row['face'];
            $chat->action=$row['action'];
            $chat->id_chat=$row['id'];
            $chat->type_chat="chat";
            array_push($app->all_chat,$chat); 
        }
    }
}

if($func=='chat'){
    $lang_sel=$_POST['lang'];
    $text=strtolower($_POST['text']);
    $sex=0;
    if(isset($_POST['sex'])){
        $sex=$_POST['sex'];
    }
    
    $result = 0;
    // sanitize imput
    $equation = preg_replace("/[^a-z0-9+\-.*\/()%]/","",$text);
    // convert alphabet to $variabel 
    $equation = preg_replace("/([a-z])+/i", "\$$0", $equation); 
    // convert percentages to decimal
    $equation = preg_replace("/([+-])([0-9]{1})(%)/","*(1\$1.0\$2)",$equation);
    $equation = preg_replace("/([+-])([0-9]+)(%)/","*(1\$1.\$2)",$equation);
    $equation = preg_replace("/([0-9]{1})(%)/",".0\$1",$equation);
    $equation = preg_replace("/([0-9]+)(%)/",".\$1",$equation);
    if ( $equation != "" ){ 
        $chat=new Chat();
        $chat->chat='='.@eval("return " . $equation . ";");
        $chat->status=1; 
        $chat->color='#ffffff';
        $chat->q1='';
        $chat->q2='';
        $chat->r1='';
        $chat->r2='';
        $chat->vibrate='';
        $chat->face='';
        $chat->action='';
        $chat->id_chat='';
        $chat->type_chat='';
        if($sex=='1'){
            $chat->mp3=$url.'/app_mygirl/app_my_girl_msg_'.$lang_sel.'/-1.mp3';
        }else{
            $chat->mp3=$url.'/app_mygirl/app_my_girl_msg_'.$lang_sel.'/-2.mp3';   
        }
        $chat->effect='';
        $result=@eval("return " . $equation . ";");
    }
    
    if ($result == null) {
        $os='unclear';
        $version='0';
        $character='0';
        $character_sex='1';
        $id_question='unclear';
        $type_question='unclear';
        $id_device='';
        $location_lon='';
        $location_lat='';
        
        if(isset($_POST['os'])){ $os=$_POST['os'];}
        if(isset($_POST['character'])){ $character=$_POST['character'];}
        if(isset($_POST['version'])){ $version=$_POST['version'];}
        if(isset($_POST['character_sex'])){ $character_sex=$_POST['character_sex'];}
        if(isset($_POST['id_question'])){ $id_question=$_POST['id_question'];}
        if(isset($_POST['type_question'])){ $type_question=$_POST['type_question'];}
        if(isset($_POST['id_device'])){ $id_device=$_POST['id_device'];}
        if(isset($_POST['location_lon'])){ $location_lon=$_POST['location_lon'];}
        if(isset($_POST['location_lat'])){ $location_lat=$_POST['location_lat'];}
        
        $date_cur=date("Y-m-d");
        mysql_query("INSERT INTO `app_my_girl_key` (`key`, `lang`,`sex`,`dates`,`os`,`character`,`character_sex`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`) VALUES ('$text', '$lang_sel','$sex','$date_cur','$os',$character,$character_sex,$version,'$id_question','$type_question','$id_device','$location_lon','$location_lat');");

        if($id_question!='unclear'){
                $txt_table_chat_return='app_my_girl_'.$lang_sel;
                $get_child_chat=mysql_query("SELECT * FROM  `$txt_table_chat_return`  WHERE `text`='$text' AND `pater` = '$id_question' AND `pater_type` = '$type_question' LIMIT 1");
                if(mysql_num_rows($get_child_chat)>0){
                    while ($row_child = mysql_fetch_array($get_child_chat)) {
                        //Chuyển hướng câu trò chuyện
                        if($row_child['id_redirect']!=''){ 
                            $id_redirect=$row_child['id_redirect'];
                            $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
                            $result_chat=mysql_fetch_array($result_chat);
                            $row_child=$result_chat;
                            mysql_free_result($result_chat);
                        } 
                    
                        $chat=new Chat();
                        $chat->chat=$row_child['chat'];
                        $chat->status=$row_child['status']; 
                        $chat->color=$row_child['color'];
                        $chat->q1=$row_child['q1'];
                        $chat->q2=$row_child['q2'];
                        $chat->r1=$row_child['r1'];
                        $chat->r2=$row_child['r2'];
                        $chat->link=$row_child['link'];
                        $chat->vibrate=$row_child['vibrate'];
                        $chat->face=$row_child['face'];
                        $chat->action=$row_child['action'];
                        $chat->id_chat=$row_child['id'];
                        $chat->type_chat="chat";
                        if (file_exists('app_mygirl/app_my_girl_'.$lang_sel.'/'.$row_child['id'].'.mp3')) {
                            $chat->mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row_child['id'].'.mp3';
                        }else{
                            $chat->mp3='';
                        }
                        $chat->effect=$row_child['effect'];
                    }
                     array_push($app->all_chat,$chat);
                     echo json_encode($app);
                     mysql_free_result($get_child_chat);
                     exit;
                }else{
                    $get_child_chat2=mysql_query("SELECT * FROM  `$txt_table_chat_return` WHERE MATCH (text)  AGAINST ('$text' IN BOOLEAN MODE) AND `pater` = '$id_question' AND `pater_type` = '$type_question' LIMIT 1");
                    if(mysql_num_rows($get_child_chat2)>0){
                        while ($row_child = mysql_fetch_array($get_child_chat2)) {
                            //Chuyển hướng câu trò chuyện
                            if($row_child['id_redirect']!=''){ 
                                $id_redirect=$row_child['id_redirect'];
                                $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
                                $result_chat=mysql_fetch_array($result_chat);
                                $row_child=$result_chat;
                                mysql_free_result($result_chat);
                            } 
                        
                            $chat=new Chat();
                            $chat->chat=$row_child['chat'];
                            $chat->status=$row_child['status']; 
                            $chat->color=$row_child['color'];
                            $chat->q1=$row_child['q1'];
                            $chat->q2=$row_child['q2'];
                            $chat->r1=$row_child['r1'];
                            $chat->r2=$row_child['r2'];
                            $chat->link=$row_child['link'];
                            $chat->vibrate=$row_child['vibrate'];
                            $chat->face=$row_child['face'];
                            $chat->action=$row_child['action'];
                            $chat->id_chat=$row_child['id'];
                            $chat->type_chat="chat";
                            if (file_exists('app_mygirl/app_my_girl_'.$lang_sel.'/'.$row_child['id'].'.mp3')) {
                                $chat->mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row_child['id'].'.mp3';
                            }else{
                                $chat->mp3='';
                            }
                            $chat->effect=$row_child['effect'];
                        }
                         array_push($app->all_chat,$chat);
                         echo json_encode($app);
                         mysql_free_result($get_child_chat2);
                         exit;
                    }
                    mysql_free_result($get_child_chat2);
                }
                mysql_free_result($get_child_chat);

        }
        
        $txt_limit_ver='';
        $txt_limit_os='';
        
        if(isset($_POST['version'])){
            $version=$_POST['version'];
            $txt_limit_ver=" AND `ver`!= '$version' ";
        }
        
        if(isset($_POST['os'])){
            $os=$_POST['os'];
            $txt_limit_os=" AND `os`!='$os' ";
        }
        
        $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `text`='$text' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' $txt_limit_ver  $txt_limit_os  ORDER BY RAND() LIMIT 1");
        if(mysql_num_rows($result_chat)>0){
            while ($row = mysql_fetch_array($result_chat)) {
                
                //Chuyển hướng câu trò chuyện
                if($row['id_redirect']!=''){ 
                    $id_redirect=$row['id_redirect'];
                    $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
                    $result_chat=mysql_fetch_array($result_chat);
                    $row=$result_chat;
                    mysql_free_result($result_chat);
                } 
            
                $chat=new Chat();
                $chat->chat=$row['chat'];
                $chat->status=$row['status']; 
                $chat->color=$row['color'];
                $chat->q1=$row['q1'];
                $chat->q2=$row['q2'];
                $chat->r1=$row['r1'];
                $chat->r2=$row['r2'];
                $chat->link=$row['link'];
                $chat->vibrate=$row['vibrate'];
                $chat->face=$row['face'];
                $chat->action=$row['action'];
                $chat->id_chat=$row['id'];
                $chat->type_chat="chat";
                if (file_exists('app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3')) {
                    $chat->mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3';
                }else{
                    $chat->mp3='';
                }
                $chat->effect=$row['effect'];
            }
            array_push($app->all_chat,$chat);
            echo json_encode($app);
            exit;
        }

        $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `text` LIKE '%$text%' AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' $txt_limit_os $txt_limit_ver ORDER BY RAND() LIMIT 1");
        
        if(mysql_num_rows($result_chat)>0){
            while ($row = mysql_fetch_array($result_chat)) {
                
                //Chuyển hướng câu trò chuyện
                if($row['id_redirect']!=''){ 
                    $id_redirect=$row['id_redirect'];
                    $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
                    $result_chat=mysql_fetch_array($result_chat);
                    $row=$result_chat;
                    mysql_free_result($result_chat);
                } 
            
                $chat=new Chat();
                $chat->chat=$row['chat'];
                $chat->status=$row['status']; 
                $chat->color=$row['color'];
                $chat->q1=$row['q1'];
                $chat->q2=$row['q2'];
                $chat->r1=$row['r1'];
                $chat->r2=$row['r2'];
                $chat->link=$row['link'];
                $chat->vibrate=$row['vibrate'];
                $chat->face=$row['face'];
                $chat->action=$row['action'];
                $chat->id_chat=$row['id'];
                $chat->type_chat="chat";
                if (file_exists('app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3')) {
                    $chat->mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3';
                }else{
                    $chat->mp3='';
                }
                $chat->effect=$row['effect'];
            }
        }else{
            
                $result_chat2=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE MATCH (text)  AGAINST ('$text' IN BOOLEAN MODE)  AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `pater`='' $txt_limit_os $txt_limit_ver  LIMIT 1");
                if(mysql_num_rows($result_chat2)>0){
                    while ($row = mysql_fetch_array($result_chat2)) {
                        
                        //Chuyển hướng câu trò chuyện
                        if($row['id_redirect']!=''){ 
                            $id_redirect=$row['id_redirect'];
                            $result_chat=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `id` = '$id_redirect'");
                            $result_chat=mysql_fetch_array($result_chat);
                            $row=$result_chat;
                            mysql_free_result($result_chat);
                        } 
                    
                        $chat=new Chat();
                        $chat->chat=$row['chat'];
                        $chat->status=$row['status']; 
                        $chat->color=$row['color'];
                        $chat->q1=$row['q1'];
                        $chat->q2=$row['q2'];
                        $chat->r1=$row['r1'];
                        $chat->r2=$row['r2'];
                        $chat->link=$row['link'];
                        $chat->vibrate=$row['vibrate'];
                        $chat->face=$row['face'];
                        $chat->action=$row['action'];
                        $chat->id_chat=$row['id'];
                        $chat->type_chat="chat";
                        if (file_exists('app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3')) {
                            $chat->mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3';
                        }else{
                            $chat->mp3='';
                        }
                        $chat->effect=$row['effect'];
                    }
                }else{
                    //mysql_query("INSERT INTO `app_my_girl_key` (`key`, `lang`,`sex`,`dates`,`os`,`character`,`character_sex`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`) VALUES ('$text', '$lang_sel','$sex',now(),'$os',$character,$character_sex,$version,'$id_question','$type_question','$id_device','$location_lon','$location_lat');");
                    $chat=new Chat();
                    $chat_bay=chat_func('bam_bay');
                    $chat->chat=$chat_bay['chat'];
                    
                    $chat->status=$chat_bay['status']; 
                    $chat->color=$chat_bay['color'];
                    $chat->q1=$chat_bay['q1'];
                    $chat->q2=$chat_bay['q2'];
                    $chat->r1=$chat_bay['r1'];
                    $chat->r2=$chat_bay['r2'];
                    $chat->vibrate=$chat_bay['vibrate'];
                    $chat->face=$chat_bay['face'];
                    $chat->action=$chat_bay['action'];
                    $chat->id_chat=$chat_bay['id'];
                    $chat->type_chat="msg";
                    if (file_exists('app_mygirl/app_my_girl_'.$lang_sel.'/'.$chat_bay['id'].'.mp3')) {
                        $chat->mp3=$url.'/app_mygirl/app_my_girl_msg_'.$lang_sel.'/'.$chat_bay['id'].'.mp3';
                    }else{
                        $chat->mp3='';
                    }
                    $chat->effect=$chat_bay['effect'];
                }
                mysql_free_result($result_chat2);
        }
        mysql_free_result($result_chat);
    }
    array_push($app->all_chat,$chat);
}

echo json_encode($app);


function chat_func($func){
    $lang_sel=$_POST['lang'];
    $version='';
    $os='';
    $sex=0;
    $txt_limit='';
    
    if(isset($_POST['sex'])){
        $sex=$_POST['sex'];
    }
    
    if(isset($_POST['version'])){
        $version=$_POST['version'];
    }
    
    if(isset($_POST['os'])){
        $os=$_POST['os'];
    }
    
    if($version!=''&$os!=''){
        $txt_limit=" AND `ver`!= '$version' AND `os`!='$os'";
    }
    
    if(isset($_POST['character_sex'])){
        $character_sex=$_POST['character_sex'];
        $result_chat=mysql_query("SELECT * FROM `app_my_girl_msg_".$lang_sel."` WHERE `func` = '$func'  AND `sex` = '$sex' AND `character_sex`='$character_sex' AND `disable` = '0' $txt_limit ORDER BY RAND() LIMIT 1");
    }
    else{
        if($sex==0)
        {
            $character_sex=1;
        }else{
            $character_sex=0;
        }
        $result_chat=mysql_query("SELECT * FROM `app_my_girl_msg_".$lang_sel."` WHERE `func` = '$func'  AND `sex` = '$sex' AND `character_sex`='$character_sex' AND  `disable` = '0'   ORDER BY RAND() LIMIT 1");
    }
    return mysql_fetch_array($result_chat);
}

mysql_close($link);