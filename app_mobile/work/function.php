<?php

function thumb($urls,$size){
    $urls=URL.'/data/'.$urls;
    return URL."/thumb.php?src=$urls&size=$size&trim=1";
}

function thumb_img($urls,$size){
    return URL."/thumb.php?src=$urls&size=$size&trim=1";
}

function show_img($name_img){
    return '<img class="img" url_img="'.URL.'/data/'.$name_img.'" src="'.thumb($name_img,'300x150').'" />';
}

function cms(){
    return '<a href="'.URL.'/?page_show=help#a2"><b>CMS</b></a>';
}

function report(){
    return '<a href="'.URL.'/?page_show=help#baocao"><b>Báo cáo tác vụ</b></a>';
}


function alert($msg,$type){
    $txt_show='<p>';
    if($type=='alert'){
        $txt_show.='<b class="alert"> <i class="fas fa-exclamation-triangle"></i> '.$msg.'</b>';
    }
    
    if($type=='error'){
        $txt_show.='<b class="alert error"> <i class="fas fa-exclamation-circle"></i> '.$msg.'</b>';
    }
    
    if($type=='info'){
        $txt_show.='<b class="alert info"> <i class="fas fa-exclamation-circle"></i> '.$msg.'</b>';
    }
    $txt_show.='</p>';
    return $txt_show;
}

function url_image_app($id_app,$size){
    $url_avart_app=URL.'/avatar_app/app_default.png';
    if(file_exists("avatar_app/".$id_app.".png")){
        $url_avart_app=URL."/avatar_app/".$id_app.".png";;
    }
    return thumb_img($url_avart_app,$size);
}

function box_user_info($link,$id,$size_avatar='19'){
    $url_avart_user=URL.'/image/avatar_default.png';
    if(file_exists("avatar_user/".$id.".png")){
        $url_avart_user=URL."/avatar_user/".$id.".png";;
    }

    $txt_html='<a title="Bấm vào để xem chi tiết thông tin của người này!" class="buttonPro small grey" href="'.URL.'/?page_show=info_user&user_id='.$id.'">';
    $query_name_user=mysqli_query($link,"SELECT `user_name`,`full_name` FROM `work_user` WHERE `user_id` = '$id' LIMIT 1");
    $data_name_user=mysqli_fetch_array($query_name_user);
    $txt_html.='<img style="margin-right: 4px;" src="'.thumb_img($url_avart_user,$size_avatar).'">';
    if($data_name_user['full_name']==''){
        $txt_html.='<span>'.$data_name_user['user_name'].'</span>';
    }else{
        $txt_html.='<span>'.$data_name_user['full_name'].'</span>';
    }
    $txt_html.='</a>';
    return $txt_html;
}

function get_url_avatar_user($id_user,$size='40x40'){
    $url_avart_user=URL.'/image/avatar_default.png';
    if(file_exists("avatar_user/".$id_user.".png")){
        $url_avart_user=URL."/avatar_user/".$id_user.".png";;
    }
    return thumb_img($url_avart_user,$size);
}

function get_full_name_user_by_id($id_user){
    $query_name_user=mysqli_query($link,"SELECT `user_name`,`full_name` FROM `work_user` WHERE `user_id` = '$id_user' LIMIT 1");
    $data_name_user=mysqli_fetch_array($query_name_user);
    if($data_name_user['full_name']==''){
        return $data_name_user['user_name'];
    }else{
        return $data_name_user['full_name'];
    }
}

function box_user_info_by_username($link,$user_name,$size_avatar='19'){
$query_name_user=mysqli_query($link,"SELECT `user_name`,`full_name`,`user_id` FROM `work_user` WHERE `user_name` = '$user_name' LIMIT 1");
    $data_name_user=mysqli_fetch_array($query_name_user);
    $txt_html='<a title="Bấm vào để xem chi tiết thông tin của người này!" class="buttonPro small grey" href="'.URL.'/?page_show=info_user&user_id='.$data_name_user['user_id'].'">';
    $txt_html.='<img style="margin-right: 4px;" src="'.get_url_avatar_user($data_name_user['user_id'],$size_avatar).'">';
    if($data_name_user['full_name']==''){
        $txt_html.='<span>'.$data_name_user['user_name'].'</span>';
    }else{
        $txt_html.='<span>'.$data_name_user['full_name'].'</span>';
    }
    $txt_html.='</a>';
    return $txt_html;
}

function btn_go_to_obj($link,$id_obj,$type,$lang,$arr_para){
    $url_act=$arr_para->{$type};
    $url_act=str_replace("{id}",$id_obj,$url_act);
    $url_act=str_replace("{lang}",$lang,$url_act);
    $txt_html='<a href="'.$url_act.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem </a>';
    return $txt_html;
}
?>