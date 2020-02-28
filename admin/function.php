<?php



function alert($msg,$type='alert'){
    $txt_html='<div class="alert">';
    if($type=='alert'){
        $txt_html.='<div class="msg alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.$msg.'</div>';
    }
    
    if($type=='error'){
        $txt_html.='<div class="msg error"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> '.$msg.'</div>';
    }
    
    if($type=='info'){
        $txt_html.='<div class="msg info"><i class="fa fa-info-circle" aria-hidden="true"></i> '.$msg.'</div>';
    }
    $txt_html.='</div>';
    return $txt_html;
}


function btn_add_work($id_object,$lang,$type,$action){
    $txt_html='';
    $txt_html.='<a  target="_blank" class="buttonPro blue" href="http://work.carrotstore.com/?id_object='.$id_object.'&lang='.$lang.'&type_chat='.$type.'&type_action='.$action.'"><i class="fa fa-desktop" aria-hidden="true"></i> Thêm vào bàn làm việc</a>';
    return $txt_html;
}


function get_account_admin($id_user){
    $query_account=mysql_query("SELECT * FROM `app_my_girl_user_vi` WHERE `id_device` = '$id_user' LIMIT 1");
    $data_user=mysql_fetch_array($query_account);
    return $data_user;
}

?>