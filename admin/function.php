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
	global $url_work;
    $txt_html='';
    $txt_html.='<a  target="_blank" class="buttonPro blue" href="'.$url_work.'/?id_object='.$id_object.'&lang='.$lang.'&type_chat='.$type.'&type_action='.$action.'"><i class="fa fa-desktop" aria-hidden="true"></i> Thêm vào bàn làm việc</a>';
    return $txt_html;
}


function get_account_admin($id_user){
    $query_account=mysql_query("SELECT * FROM `app_my_girl_user_vi` WHERE `id_device` = '$id_user' LIMIT 1");
    $data_user=mysql_fetch_array($query_account);
    return $data_user;
}

function deleteDirectory($dir) {
    if (!file_exists($dir)) {return true;}
    if (!is_dir($dir)) {return unlink($dir);}
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {continue;}
        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {return false;}
    }
    return rmdir($dir);
}

function remote_file_exists($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); # handles 301/2 redirects
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if( $httpCode == 200 ){return true;}
}

function downloadUrlToFile($url, $outFileName)
{   
    if(is_file($url)) {
        copy($url, $outFileName); 
    } else {
        $options = array(
          CURLOPT_FILE    => fopen($outFileName, 'w'),
          CURLOPT_TIMEOUT =>  28800,
          CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}

?>