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

function box_user_info($id,$size_avatar='19'){
    $url_avart_user=URL.'/image/avatar_default.png';
    if(file_exists("avatar_user/".$id.".png")){
        $url_avart_user=URL."/avatar_user/".$id.".png";;
    }

    $txt_html='<a title="Bấm vào để xem chi tiết thông tin của người này!" class="buttonPro small grey" href="'.URL.'/?page_show=info_user&user_id='.$id.'">';
    $query_name_user=mysql_query("SELECT `user_name`,`full_name` FROM `work_user` WHERE `user_id` = '$id' LIMIT 1");
    $data_name_user=mysql_fetch_array($query_name_user);
    $txt_html.='<img style="margin-right: 4px;" src="'.thumb_img($url_avart_user,$size_avatar).'">';
    if($data_name_user['full_name']==''){
        $txt_html.='<span>'.$data_name_user['user_name'].'</span>';
    }else{
        $txt_html.='<span>'.$data_name_user['full_name'].'</span>';
    }
    $txt_html.='</a>';
    return $txt_html;
}

function box_user_info_by_username($user_name,$size_avatar='19'){
$query_name_user=mysql_query("SELECT `user_name`,`full_name`,`user_id` FROM `work_user` WHERE `user_name` = '$user_name' LIMIT 1");
    $data_name_user=mysql_fetch_array($query_name_user);
    $url_avart_user=URL.'/image/avatar_default.png';
    if(file_exists("avatar_user/".$data_name_user['user_id'].".png")){
        $url_avart_user=URL."/avatar_user/".$data_name_user['user_id'].".png";;
    }

    $txt_html='<a title="Bấm vào để xem chi tiết thông tin của người này!" class="buttonPro small grey" href="'.URL.'/?page_show=info_user&user_id='.$data_name_user['user_id'].'">';

    $txt_html.='<img style="margin-right: 4px;" src="'.thumb_img($url_avart_user,$size_avatar).'">';
    if($data_name_user['full_name']==''){
        $txt_html.='<span>'.$data_name_user['user_name'].'</span>';
    }else{
        $txt_html.='<span>'.$data_name_user['full_name'].'</span>';
    }
    $txt_html.='</a>';
    return $txt_html;
}

function btn_go_to_obj($id_obj,$type,$lang){
    $txt_html='';
    if($type=='msg'){
        $txt_html.='<a href="http://carrotstore.com/app_my_girl_update.php?id='.$id_obj.'&lang='.$lang.'&msg=1" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right" ></i> Xem (msg)</a>';
    }elseif($type=='art'){
        $txt_html.='<a href="http://autriart.carrotstore.com/wp-admin/post.php?post='.$id_obj.'&action=edit" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem (Art post)</a>';
    }elseif($type=='lyrics'){
        $txt_html.='<a href="http://autriart.carrotstore.com/wp-admin/post.php?post='.$id_obj.'&action=edit&post_type=autri_lyrics" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem (Art post)</a>';
    }elseif($type=='bk'){
        $txt_html.='<a href="http://carrotstore.com/app_my_girl_background.php?edit='.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem (Ảnh nền)</a>';
    }elseif($type=='radio'){
        $txt_html.='<a href="http://carrotstore.com/app_my_girl_radio.php?edit='.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem (Radio)</a>';
    }elseif($type=='bible_book'||$type=='bible_p'){
        $txt_html.='<a href="http://bible.carrotstore.com/?page=view_book&id='.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem sách kinh thánh</a>';
    }elseif($type=='carrot'){
        $txt_html.='<a href="http://carrotstore.com/product/'.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem trên Carrot Store</a>';
    }elseif($type=='chplay'){
        $txt_html.='<a href="https://play.google.com/store/apps/details?id='.$id_obj.'&hl='.$lang.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Chplay</a>';
    }elseif($type=='flower'){
        $txt_html.='<a href="http://flower.carrotstore.com/?view=manager_lang_value&lang='.$lang.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem Flower (lang)</a>';
    }elseif($type=='window'){
        $txt_html.='<a href="https://www.microsoft.com/store/productId/'.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem Window Store</a>';
    }elseif($type=='samsung'){
        $txt_html.='<a href="https://galaxystore.samsung.com/detail/'.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem Samsung Store</a>';
    }elseif($type=='huawei'){
        $txt_html.='<a href="https://appstore.huawei.com/app/C'.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem Huawei Store</a>';
    }elseif($type=='file'){
        $txt_html.='<a href="http://carrot.sytes.net/file/'.$id_obj.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem file</a>';
    }elseif($type=='Other'){
        $txt_html.='';
    }else{
        $txt_html.='<a href="http://carrotstore.com/app_my_girl_update.php?id='.$id_obj.'&lang='.$lang.'" target="_blank" class="buttonPro small blue" onclick="$(this).addClass(\'black\');"><i class="fas fa-caret-square-right"></i> Xem (chat)</a>';
    }
    return $txt_html;
}
?>