<?php
include "../config.php";
include "../database.php";

class Return_app{
   public $error=0;
   public $msg="";
}

$return_app=new Return_app();

$drop_action=0;
$drop_face=0;
$drop_status='0';
$drop_effect='0';
$version='0';
$os='unclear';
$sex_brain='0';
$color_chat='#FFFFFF';
$limit_chat='0';
$id_question='';
$type_question='';
$inp_question=$_POST['question'];
$id_device='';
$is_criterion=0;
$inp_answer=mysql_real_escape_string($_POST['answer']);


if(isset($_POST['version'])){ $version=$_POST['version'];}
if(isset($_POST['action'])){$drop_action=$_POST['action'];}
if(isset($_POST['face'])){$drop_face=$_POST['face'];}
if(isset($_POST['status'])){$drop_status=$_POST['status'];}
if(isset($_POST['effect'])){$drop_effect=$_POST['effect'];}
if(isset($_POST['os'])){ $os=$_POST['os'];}
if(isset($_POST['color_chat'])){
    $color_chat=$_POST['color_chat'];
}
if(isset($_POST['limit_chat'])){ $limit_chat=$_POST['limit_chat'];}

if(isset($_POST['id_question'])){ $id_question=$_POST['id_question'];}
if(isset($_POST['type_question'])){ $type_question=$_POST['type_question'];}
        
if(isset($_POST['sex'])){
$sex_brain=$_POST['sex'];
}
if(isset($_POST['id_device'])){ $id_device=$_POST['id_device'];}
$lang_brain=$_POST['lang'];
$character_sex=$_POST['character_sex'];


if($inp_question==''||strlen($inp_question)<5){
        $return_app->msg='brain_question_error';
        $return_app->error=1;
        echo json_encode($return_app);
        exit;    
}
    
if($inp_answer==''||strlen($inp_answer)<5){
        $return_app->msg='brain_answer_error';
        $return_app->error=1;
        echo json_encode($return_app);
        exit;
}

if($lang_brain=='en'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    
    if(strlen($inp_answer)>20 && strlen($inp_question)<18){
        //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
        $is_criterion=1;
    }
}

if($lang_brain=='es'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    
    if(strlen($inp_answer)>18 && strlen($inp_question)<18){
        //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
        $is_criterion=1;
    }
}

if($lang_brain=='vi'){
    if (strlen($inp_answer) != strlen(utf8_decode($inp_answer))){
        $txt_table='app_my_girl_'.$lang_brain;
        if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
        /*
        if($id_question==''){
            if(strlen($inp_answer)>18 && strlen($inp_question)<20){        
                $result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
            }
        }else{
            $result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
        }*/
        if(strlen($inp_answer)>10 && strlen($inp_question)<25){
        $is_criterion=1;
        }
    }

}

if($lang_brain=='pt'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    if(strlen($inp_answer)>10 && strlen($inp_question)<25){
        //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
        $is_criterion=1;
    }
}

if($lang_brain=='fr'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    if(strlen($inp_answer)>10 && strlen($inp_question)<25){
        //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
        $is_criterion=1;
    }
}

if($lang_brain=='hi'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    if(strlen($inp_answer)>7 && strlen($inp_question)<25){
        //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
        $is_criterion=1;
    }
}

if($lang_brain=='zh'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='ru'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='de'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='th'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='ko'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='ja'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='ar'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='tr'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}


if($lang_brain=='fi'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='it'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if($lang_brain=='id'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}


if($lang_brain=='de'){
    $txt_table='app_my_girl_'.$lang_brain;
    if($drop_effect=='4'||$drop_effect=='2'){$drop_effect='0';}
    //$result_add=mysql_query("INSERT INTO `$txt_table` (`text`, `chat`, `status`, `sex`, `color`,`effect`,`face`,`action`,`character_sex`,`limit_chat`,`pater`,`pater_type`,`disable`) VALUES ('$inp_question', '$inp_answer', '$drop_status', '$sex_brain', '$color_chat', '$drop_effect', '$drop_face', '$drop_action','$character_sex','1','$id_question','$type_question',1);");
    $is_criterion=1;
}

if(isset($_POST['effect'])){$drop_effect=$_POST['effect'];}
$table="app_my_girl_".$lang_brain."_brain";
$md5=md5(uniqid(rand(), true));
$act_sql=mysql_query("INSERT INTO `app_my_girl_brain` (`question`, `answer`, `action`, `face`, `sex`, `langs`,`character_sex`,`effect`,`status`,`version`,`os`,`color_chat`,`id_question`,`type_question`,`md5`,`id_device`,`criterion`) VALUES ('$inp_question', '$inp_answer', '$drop_action', '$drop_face', '$sex_brain', '$lang_brain','$character_sex','$drop_effect','$drop_status','$version','$os','$color_chat','$id_question','$type_question','$md5','$id_device',$is_criterion);");

if(isset($_FILES['audio'])){
    $target_file = $table.'/'.$md5.'.mp3';
    move_uploaded_file($_FILES['audio']['tmp_name'],$target_file);
}

$return_app->error=0;
$return_app->msg='brain_add_success';
echo json_encode($return_app);