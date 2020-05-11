<?php
include "data_lang_vr1_3d.php";
$func='';
if(isset($_POST['func'])){ $func=$_POST['func'];}
if($func=="load_menu"){
    for($i=0;$i<count($lang_app->menu_lang);$i++){
        foreach($lang_app->menu_lang[$i] as $key=>$value){
            if($key!='id'&&$key!='name'&&$key!='key'&&$key!='url_icon'&&$key!='setting_url_sound_test_sex0'&&$key!='setting_url_sound_test_sex1'&&$key!='enable_girl'){
                unset($lang_app->menu_lang[$i]->{$key});
            }
        }
    }
    echo json_encode($lang_app);
    exit;
}


if($func=="download_lang"){
    $id=$_POST['id'];
    echo json_encode($lang_app->menu_lang[$id]);
    exit;
}
