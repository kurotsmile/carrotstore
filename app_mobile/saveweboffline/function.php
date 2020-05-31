<?php
function thumb($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size&trim=1";
}
function thumbs($urls,$size){
    return URLS."/thumb.php?src=$urls&size=$size&trim=1";
}

function alert($msg,$type='alert'){
    $txt_html='<div class="alert">';
    if($type=='alert'){
        $txt_html.='<div class="msg alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.$msg.'</div>';
    }
    
    if($type=='error'){
        $txt_html.='<div class="msg error"><i class="fa fa-exclamation" aria-hidden="true"></i> '.$msg.'</div>';
    }
    
    if($type=='info'){
        $txt_html.='<div class="msg info"><i class="fa fa-info-circle" aria-hidden="true"></i> '.$msg.'</div>';
    }
    $txt_html.='</div>';
    return $txt_html;
}


function btn_add_work($id_object,$lang,$type,$action){
    global $url_work;
    $txt_html='';
    $txt_html.='<a  target="_blank" class="buttonPro blue" href="'.$url_work.'/?id_object='.$id_object.'&lang='.$lang.'&type_chat='.$type.'&type_action='.$action.'"><i class="fa fa-plus-square"></i> Thêm vào bàn làm việc</a>';
    return $txt_html;
}

function does_url_exists($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($code == 200) {
        $status = true;
    } else {
        $status = false;
    }
    curl_close($ch);
    return $status;
}
?>