<?php
Class User_login{
    public $id='';
    public $name='';
    public $avatar='';
    public $type='';
    public $link='';
    public $email='';
    public $lang='';
}

Class User_info{
    public  $name='';
    public  $avatar='';
}

if(!class_exists('Address')){
 class Address{
    public $address='tp. Huế , Thừa Thiên Huế , VN';
    public $lat='16.525';
    public $lng='107.520';
    public $country='vn';
 }
}

function lang($link,$key,$lang_sel=null){
    if($lang_sel==null) {
        $lang = 'vi';
        if (isset($_SESSION['lang'])) {
            $lang = $_SESSION['lang'];
        }
    }else{
        $lang=$lang_sel;
    }
    $return=mysqli_query($link,"SELECT `value` FROM `lang_value` WHERE `key` = '$key' AND `lang`='$lang' LIMIT 1");
    $data=mysqli_fetch_array($return);
    if($data){
        return addslashes($data['value']);
    }else{
        return $key;
    }
}

function get_account($link,$user_id,$lang){
    $return=mysqli_query($link,"SELECT * FROM `app_my_girl_user_".$lang."` WHERE `id_device` ='".$user_id."' LIMIT 1");
    return mysqli_fetch_array($return);
}

function get_url_account_google($link,$user_id,$lang){
    $return=mysqli_query($link,"SELECT `avatar_url` FROM `app_my_girl_user_".$lang."` WHERE `id_device` ='".$user_id."' LIMIT 1");
    $data_url=mysqli_fetch_array($return);
    return $data_url['avatar_url'];
}

function limit_text($text, $limit) {
    return substr($text, 0, strpos(wordwrap($text, $limit), "\n"));
}

function limit_words($string, $word_limit)
{
	$string = strip_tags($string);
	$words = explode(' ', strip_tags($string));
	$return = trim(implode(' ', array_slice($words, 0, $word_limit)));
	if(strlen($return) < strlen($string)){
	$return .= '...';
	}
	return $return;
}

function thumb($urls,$size,$type=null){
    if(trim($urls)!=''){
        $url_img=URL.'/'.$urls;
    }else{
        if($type==null){
            $url_img=URL.'/images/avatar_default.png';
        }else{
            $url_img=URL.'/images/avatar_default.png';
        }
    }
    return URL."/thumb.php?src=$url_img&size=$size&trim=1";
}


function show_name_by_id($link,$id_device,$lang){
    $return=mysqli_query($link,"SELECT `name` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_device' LIMIT 1");
    $return=mysqli_fetch_array($return);
    mysqli_free_result($return);
    return $return['name'];
}

function strclean($string) {
   $string = str_replace('"', '', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function check_Order($id_product,$id_user){
    $a=mysqli_query($link,"SELECT * FROM `order` WHERE `product` = '$id_product' AND `users` = '$id_user' LIMIT 50");
    if(mysqli_num_rows($a)>0){
        $a=mysqli_fetch_array($a);
        return $a[4];
    }else{
        return null;
    }
}

function get_star_width($link,$id,$object){
    $count_rate=mysqli_query($link,"SELECT `rate` FROM `".$object."_rate` WHERE `$object` = '".$id."'");
    $width_rate=0;
    if($count_rate){
        $count_rate=mysqli_num_rows($count_rate);
        $sum_rate=mysqli_query($link,"SELECT SUM(`rate`) FROM `".$object."_rate` WHERE `$object` = '".$id."'");
        $sum_rate=mysqli_fetch_array($sum_rate);
        if(intval($sum_rate[0])>0){
            $sum_rate=$sum_rate[0];
            $sum_rate=($sum_rate/$count_rate);
            $width_rate=(($sum_rate/5)*70);
        }else{
            $width_rate=0;
        }

    }else{
        $width_rate=0;
    }
    return $width_rate;
}


function show_share($link,$url){
    $txt_share='<ul id="share_link" title="'.lang($link,"share_tip").'">';
    $txt_share.='<li><strong>'.lang($link,'chia_se').'</strong></li>';
    $txt_share.='<li><a onclick="box_share(this);return false;" href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>';
    $txt_share.='<li><a onclick="box_share(this);return false;"  href="https://twitter.com/intent/tweet?url='.$url.'&text=Carrot store &via=carrotstore1&original_referer='.$url.'" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</a></li>';
    $txt_share.='<li><a onclick="box_share(this);return false;"  href="http://www.linkedin.com/shareArticle?mini=true&url='.$url.'&title=Share" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn</a></li>';
    $txt_share.='<li><a onclick="box_share(this);return false;"  href="http://pinterest.com/pin/create/button/?url='.$url.'&description=Share" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i> Pinterest</a></li>';
    $txt_share.='<li><a onclick="box_share(this);return false;"  href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site '.$url.'" target="_blank"><i class="fa fa-envelope-square" aria-hidden="true"></i> Email</a></li>';
    $txt_share.='<li><a onclick="box_share(this);return false;"  href="https://mail.google.com/mail/u/2/?hl=vi&view=cm&fs=1&tf=1&su=I wanted you to see this site&amp;body=Check out this site '.$url.'" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i> Gmail</a></li>';
    $txt_share.='</ul>';
    return $txt_share;
}


function get_name_product_lang($link,$id_product,$key_l,$is_adim_site=false){
    $query_data=mysqli_query($link,"SELECT `data` FROM `product_name` WHERE `id_product` = '$id_product' AND `key_country` = '$key_l' LIMIT 1");
    $data_name=mysqli_fetch_array($query_data);
    if($data_name['data']!=""){
        return $data_name['data'];
    }else{
        if($is_adim_site==false){
            $query_data_en=mysqli_query($link,"SELECT `data` FROM `product_name` WHERE `id_product` = '$id_product' AND `key_country` = 'en' LIMIT 1");
            $data_name_en=mysqli_fetch_array($query_data_en);
            return $data_name_en['data'];
        }else{
            return "";
        }
    }
    mysqli_free_result($query_data);
}

function get_username_by_id($link,$id_user,$is_admin=false){
    $lang=$_SESSION['lang'];
    $txt_name='';
    if($is_admin){
        $query_name=mysqli_query($link,"SELECT `user_name` FROM carrotsy_work.`work_user` WHERE `user_id` = '$id_user' LIMIT 1");
        $data_name=mysqli_fetch_array($query_name);
        $txt_name=$data_name['user_name'];
    }else{
        $query_name=mysqli_query($link,"SELECT `name` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
        $data_name=mysqli_fetch_array($query_name);
        $txt_name=$data_name['name'];
    }
    
    if($txt_name==''){
        $txt_name=lang($link,'an_danh');
    }
    return $txt_name;
}

function get_desc_product_lang($link,$id_product,$key_l,$is_adim_site=false){
    $query_data=mysqli_query($link,"SELECT `data` FROM `product_desc` WHERE `id_product` = '$id_product' AND `key_country` = '$key_l' LIMIT 1");
    $data_desc=mysqli_fetch_assoc($query_data);
    if($data_desc['data']!=""){
        return $data_desc['data'];
    }else{
        if($is_adim_site==false){
            $query_data=mysqli_query($link,"SELECT `data` FROM `product_desc` WHERE `id_product` = '$id_product' AND `key_country` = 'en' LIMIT 1");
            $data_desc=mysqli_fetch_assoc($query_data);
            return $data_desc['data'];
        }else{
            return "";
        }
    }
    mysqli_free_result($query_data);
}

function get_url_icon_product($id_product,$size_img,$is_addmin_site=false){
    $url_img='';
    if($is_addmin_site==true){
        if(file_exists('../product_data/'.$id_product.'/icon.jpg')){
            $url_img=URL.'/product_data/'.$id_product.'/icon.jpg';
        }else{
            $url_img=URL.'/product_data/app_default.png';
        }
    }else{
        if(file_exists('product_data/'.$id_product.'/icon.jpg')){
            $url_img=URL.'/product_data/'.$id_product.'/icon.jpg';
        }else{
            $url_img=URL.'/product_data/app_default.png';
        }
    }
    return URL."/thumb.php?src=$url_img&size=$size_img&trim=1";
}

function get_url_icon_product_no_thumb($id_product){
    $url_img='';

        if(file_exists('product_data/'.$id_product.'/icon.png')){
            $url_img=URL.'/product_data/'.$id_product.'/icon.png';
        }else{
            $url_img=URL.'/product_data/app_default.png';
        }
    return $url_img;
}

function get_url_avatar_user($link,$id_user,$lang,$size=100,$is_admin=false,$sex_avatar=''){
    global $url_work,$url;
    $url_img='app_mygirl/app_my_girl_'.$lang.'_user/'.$id_user.'.png';
    $url_avatar=URL.'/thumb.php?src='.URL.'/images/avatar_default.png&size='.$size.'&trim=1';
    if($is_admin){
        $url_avatar=$url_work.'/img.php?url=avatar_user/'.$id_user.'.png&size='.$size;
    }else{
        if(file_exists($url_img)){
            $url_avatar=URL.'/thumb.php?src='.URL.'/'.$url_img.'&size='.$size.'&trim=1';
        }else{
            $url_avatar_gg= get_url_account_google($link,$id_user,$lang);
            if($url_avatar_gg!=null){
                $url_avatar=$url_avatar_gg;
            }else{
                if($sex_avatar!=''){
                    if($sex_avatar=='0'){
                        $url_avatar=URL.'/thumb.php?src='.URL.'/images/avatar_boy.jpg&size='.$size.'&trim=1';
                    }else{
                        $url_avatar=URL.'/thumb.php?src='.URL.'/images/avatar_girl.jpg&size='.$size.'&trim=1';
                    }
                }
            }
        }
    }
    return $url_avatar;
}

function delete_dir($src) { 
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                delete_dir($src . '/' . $file); 
            } 
            else { 
                unlink($src . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
    rmdir($src);

}

function box_ads($link,$id_product,$lang){
    $query_product_ads=mysqli_query($link,"SELECT `id`,`chplay_store`,`app_store`,`galaxy_store`,`window_store`,`apk` FROM `products` WHERE `id` = '$id_product' LIMIT 1");
    $product_ads=mysqli_fetch_array($query_product_ads);
    $html_txt='';
    $html_txt.='<div id="box_ads_app_page">';
    $html_txt.='<div class="title">';
    $html_txt.='<span style="margin-left: 20px;">'.get_name_product_lang($link,$id_product,$lang).'</span>';
    $html_txt.='<i style="float: right;cursor: pointer;margin-right: 5px;" onclick="$(\'#box_ads_app\').fadeOut(100);" class="fa fa-mobile"></i>';
    $html_txt.='</div>';
    $html_txt.='<div id="body_ads">';
    $html_txt.='<a href="'.URL.'/product/'.$id_product.'"><img alt="'.get_name_product_lang($link,$id_product,$lang).'"  style="width: 30%;float: left;margin-right: 3px;margin-top: 6px;margin-left: 6px;" class="lazyload" data-src="'.get_url_icon_product($id_product,'100').'" /></a>';
    $html_txt.='<div style="float: left;width: 60%;text-align: center;color:white;text-shadow: 1px 1px 1px black;">';
    $html_txt.=limit_words(get_desc_product_lang($link,$product_ads['id'],$lang),30);
    $html_txt.='</div>';
    $html_txt.='<div style="float: left;width: 60%;text-align: center;">';

    
        $arr_download=array();
        if($product_ads['chplay_store']!=''){ 
            $txt_download='<a href="'.$product_ads['chplay_store'].'"  target="_blank"><img alt="Download '.get_name_product_lang($link,$id_product,$lang).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" class="lazyload" data-src="'.URL.'/images/chplay_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['app_store']!=''){ 
            $txt_download='<a href="'.$product_ads['app_store'].'"  target="_blank"><img alt="Download '.get_name_product_lang($link,$id_product,$lang).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" class="lazyload" data-src="'.URL.'/images/app_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['galaxy_store']!=''){ 
            $txt_download='<a href="'.$product_ads['galaxy_store'].'"  target="_blank"><img alt="Download '.get_name_product_lang($link,$id_product,$lang).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" class="lazyload" data-src="'.URL.'/images/galaxy_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['window_store']!=''){ 
            $txt_download='<a href="'.$product_ads['window_store'].'"  target="_blank"><img alt="Download '.get_name_product_lang($link,$id_product,$lang).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" class="lazyload" data-src="'.URL.'/images/window_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['apk']!=''){ 
            $txt_download='<a href="'.$product_ads['apk'].'"  target="_blank"><img alt="Download '.get_name_product_lang($link,$id_product,$lang).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" class="lazyload" data-src="'.URL.'/images/apk_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if(file_exists('product_data/'.$id_product.'/ios/app.plist')){
            $txt_download='<a href="itms-services://?action=download-manifest&amp;url=https://carrotstore.com/product_data/'.$id_product.'/ios/app.plist" target="_blank" ><img alt="Download '.get_name_product_lang($link,$id_product,$lang).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" class="lazyload" data-src="'.URL.'/images/ipa_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        $html_txt.=$arr_download[0];
        if(isset($arr_download[1])) $html_txt.=$arr_download[1];
        if(isset($arr_download[2])) $html_txt.=$arr_download[2];
        if(isset($arr_download[3])) $html_txt.=$arr_download[3];
		if(isset($arr_download[4])) $html_txt.=$arr_download[4];
        
    $html_txt.='</div>';
    $html_txt.='</div>';
    $html_txt.='</div>';
    return $html_txt;
}

function show_ads_box_main($link,$id_place_ads){
    $query_product_main=mysqli_query($link,"SELECT * FROM `ads` WHERE `id_ads` = '$id_place_ads' LIMIT 1");
    $data_place_ads=mysqli_fetch_array($query_product_main);
    $id_product_ads=$data_place_ads['id_product_main'];
    $query_product_ads=mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id_product_ads' LIMIT 1");
    $data_product_ads=mysqli_fetch_array($query_product_ads);
    $txt_html='<div title="'.lang($link,'click_de_xem').' ('.get_name_product_lang($link,$id_product_ads,$_SESSION["lang"]).')" id="box_ads_app">';
    $txt_html.='<div class="title">';
    $txt_html.=get_name_product_lang($link,$id_product_ads,$_SESSION["lang"]);
    $txt_html.='<i style="float: right;cursor: pointer" onclick="$(\'#box_ads_app\').fadeOut(100).remove();" class="fa fa-times-circle"></i>';
    $txt_html.='</div>';
    
    $txt_html.='<div id="player_music">';
    $txt_html.='<div id="progressBar" style="width: 100%;height: 10px;float: left;background-color: black;border-radius: 0px;" class="round-pink"><div id="bar_music_val" style="float: left;width: 0px;height: 10px;background-color: orange"></div></div>';
    $txt_html.='<img id="player_music_img" style="width: 100px;border-radius: 5px;margin: 2px;float: left;"  class="lazyload" data-src="'.get_url_icon_product($id_product_ads,'50x50').'"/>';
    $txt_html.='<div id="player_music_name" style="width: 173px;float: left;color: yellow;margin: 10px;"></div>';
    $txt_html.='<i style="cursor: pointer;font-size: 20px;float: left;margin: 3px;color: white;" class="fa fa-stop-circle" aria-hidden="true" onclick="pause_music();return false;"></i>';      
    $txt_html.='</div>';
    
	$name_product=get_name_product_lang($link,$id_product_ads,$_SESSION["lang"]);
    $txt_html.='<div id="body_ads">';
        $txt_html.='<a href="'.URL.'/product/'.$id_product_ads.'"><img alt="Download '.$name_product.'" style="width: 104px;float: left;margin-right: 3px;margin-top: 6px;margin-left: 6px;"  class="lazyload" data-src="'.get_url_icon_product($id_product_ads,'104x104').'" /></a>';
        
        $arr_download=array();
        if($data_product_ads['chplay_store']!=''){ 
            $txt_download='<a  href="'.$data_product_ads['chplay_store'].'"  target="_blank"><img alt="Download '.$name_product.'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/chplay_download.png&size=85x28&trim=1" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['app_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['app_store'].'"  target="_blank"><img alt="Download '.$name_product.'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/app_store_download.png&size=85x28&trim=1" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['galaxy_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['galaxy_store'].'"  target="_blank"><img alt="Download '.$name_product.'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/galaxy_store_download.png&size=85x28&trim=1" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['window_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['window_store'].'"  target="_blank"><img alt="Download '.$name_product.'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/window_store_download.png&size=85x28&trim=1" /></a>';
            array_push($arr_download,$txt_download);
        }
		
		if($data_product_ads['chrome_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['chrome_store'].'"  target="_blank"><img alt="Download '.$name_product.'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/chrome_store_download.png&size=85x28&trim=1" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['apk']!=''){ 
            $txt_download='<a href="'.$data_product_ads['apk'].'" target="_blank"><img alt="Download '.$name_product.'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/apk_download.png&size=85x28&trim=1" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if(file_exists('product_data/'.$data_product_ads[0].'/ios/app.plist')){
            $txt_download='<a href="itms-services://?action=download-manifest&amp;url=https://carrotstore.com/product_data/'.$data_product_ads[0].'/ios/app.plist" target="_blank" ><img alt="Download '.get_name_product_lang($link,$id_product_ads,$_SESSION["lang"]).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/ipa_download.png&size=85x28&trim=1" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        $txt_html.=$arr_download[0];
        if(isset($arr_download[1])) $txt_html.=$arr_download[1];
        if(isset($arr_download[2])) $txt_html.=$arr_download[2];
        if(isset($arr_download[3])) $txt_html.=$arr_download[3];
		if(isset($arr_download[4])) $txt_html.=$arr_download[4];
    $txt_html.='</div>';
    
    $txt_html.='<div id="ads_video"></div>';
    $txt_html.='</div>';
    return $txt_html;
}


function show_box_ads_page($link,$id_ads_place){
    $query_product_main=mysqli_query($link,"SELECT `id_product_main`,`id_product`,`tip_download` FROM `ads` WHERE `id_ads` = '$id_ads_place' LIMIT 1");
    $data_place_ads=mysqli_fetch_array($query_product_main);
    $txt_html='<div style="float:left;margin-bottom: 10px;"><i class="fa fa-futbol-o" aria-hidden="true"></i> '.lang($link,$data_place_ads['tip_download']).'</div>';
    $txt_html.=box_ads($link,$data_place_ads['id_product_main'],$_SESSION['lang']);
    $arr_p=json_decode($data_place_ads['id_product']);
    $id_rand_p=rand(0,count($arr_p)-1);
    $id_product=$arr_p[$id_rand_p];
    $txt_html.=box_ads($link,$id_product,$_SESSION['lang']);
    return $txt_html;
    
}

function get_home_url($url) {
  $result = parse_url($url);
  return $result['host'];
}

function get_info_user_comment($link,$user_id,$lang){
    $query_user_comment=mysqli_query($link,"SELECT `avatar_url`,`name` FROM `app_my_girl_user_".$lang."` WHERE `id_device` ='".$user_id."' LIMIT 1");
    if(mysqli_num_rows($query_user_comment)>0) {
        $data_user=mysqli_fetch_array($query_user_comment);
        $user_info=new User_info();
        $user_info->name=$data_user['name'];
        if($data_user['avatar_url']!=''){
            $user_info->avatar=$data_user['avatar_url'];
        }else{
            $user_info->avatar=get_url_avatar_user($link,$user_id,$lang,'40x40');
        }
        return json_encode($user_info);
    }else{
       return null;
    }
}

function get_setting($link,$key_setting){
    $query_setiing=mysqli_query($link,"SELECT `value` FROM `setting` WHERE `key` = '$key_setting' LIMIT 1");
    $data_setting=mysqli_fetch_array($query_setiing);
    return $data_setting['value'];
}


function data_json_tip($contain,$position=0){
    $p_my='';
    $p_at='';
    if($position==0){
        $p_my='bottom center';
        $p_at='top center';
    }

    if($position==1){
        $p_my='top right';
        $p_at='bottom right';
    }

    return '{"msg":"'.$contain.'","my":"'.$p_my.'","at":"'.$p_at.'"}';
}