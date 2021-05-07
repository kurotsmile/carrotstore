<?php
function get_user($link,$id_device,$lang){
    global $url_carrot_store;
    $txt_show='';
    $txt_show.='<a href="'.$url_carrot_store.'/app_my_girl_user_detail.php?id='.$id_device.'&lang='.$lang.'" class="show_user" target="_blank">';
    $query_get_user=mysqli_query($link,"SELECT `name` FROM carrotsy_virtuallover.`app_my_girl_user_$lang` WHERE `id_device` = '$id_device' LIMIT 1");
    $arr_data_user=mysqli_fetch_array($query_get_user);
    $txt_show.='<strong>'.$arr_data_user['name'].'</strong>';
    $txt_show.='</a>';
    return $txt_show;
}

function alert($msg,$type='alert'){
    $txt_html='<div class="alert">';
    if($type=='alert'){
        $txt_html.='<div class="msg alert"><i class="fas fa-exclamation-triangle"></i> '.$msg.'</div>';
    }
    
    if($type=='error'){
        $txt_html.='<div class="msg error"><i class="fas fa-exclamation-circle"></i> '.$msg.'</div>';
    }
    
    if($type=='info'){
        $txt_html.='<div class="msg info"><i class="fas fa-exclamation"></i> '.$msg.'</div>';
    }
    $txt_html.='</div>';
    return $txt_html;
}

function thumb($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size&trim=1";
}

function msg($txt,$type='warning'){
    return '<script>swal("Thông báo", "'.$txt.'", "'.$type.'");</script>';
}
?>