<?php
include "data_lang.php";
$func=$_POST['func'];
if($func=="load_menu"){
    unset($lang_app->menu_lang[2]);
    echo json_encode($lang_app);
    exit;
}


if($func=="download_lang"){
    $id=$_POST['id'];
    echo json_encode($lang_app->menu_lang[$id]);
    exit;
}
