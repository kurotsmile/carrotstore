<?php
function get_user($id_device,$lang){
    $txt_show='';
    $query_get_user=mysql_query("SELECT * FROM carrotsy_carrot.app_my_girl_user_$lang WHERE `id_device` = '$id_device' LIMIT 1");
    if(mysql_num_rows($query_get_user)>0){
        $txt_show.='<a href="http://carrotstore.com/app_my_girl_user_detail.php?id='.$id_device.'&lang='.$lang.'" class="show_user" target="_blank">';
        $arr_data_user=mysql_fetch_array($query_get_user);
        $txt_show.='<img src="http://carrotstore.com/img.php?url=app_mygirl/app_my_girl_'.$lang.'_user/'.$id_device.'.png&size=20"/>';
        $txt_show.='<strong>'.$arr_data_user['name'].'</strong>';
        $txt_show.='</a>';
    }else{
        $txt_show.='Chưa khai báo thông tin';
    }
    mysql_query($query_get_user);
    return $txt_show;
}

function alert($msg,$type='alert'){
    $txt_html='<div class="alert">';
    if($type=='alert'){
        $txt_html.='<div class="msg alert"><i class="fa fa-exclamation-triangle"></i> '.$msg.'</div>';
    }
    
    if($type=='error'){
        $txt_html.='<div class="msg error"><i class="fa fa-exclamation-circle"></i> '.$msg.'</div>';
    }
    
    if($type=='info'){
        $txt_html.='<div class="msg info"><i class="fa fa-exclamation"></i> '.$msg.'</div>';
    }
    $txt_html.='</div>';
    return $txt_html;
}


function btn_add_work($id_object,$lang,$type,$action){
    global $url_work;
    $txt_html='';
    $txt_html.='<a  target="_blank" class="buttonPro blue" href="'.$url_work.'/?id_object='.$id_object.'&lang='.$lang.'&type_chat='.$type.'&type_action='.$action.'"><i class="fas fa-plus-square"></i> Thêm vào bàn làm việc</a>';
    return $txt_html;
}
?>