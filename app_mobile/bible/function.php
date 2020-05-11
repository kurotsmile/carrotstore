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


function btn_add_work($id_object,$lang,$type,$action){
    $txt_html='';
    $txt_html.='<a  target="_blank" class="buttonPro blue" href="http://work.carrotstore.com/?id_object='.$id_object.'&lang='.$lang.'&type_chat='.$type.'&type_action='.$action.'"><i class="fas fa-plus-square"></i> Thêm vào bàn làm việc</a>';
    return $txt_html;
}
?>