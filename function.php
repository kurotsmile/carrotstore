<?php
class Account_Background{
    public $position=0;
    public $image=0;
    public $size=0;
}

class Account_info{
    public $sex='';
    public $introduire='';
    public $facebook='';
    public $twitter='';
    public $linkedin='';
    public $skype='';
}

class Accoun_Data{
    public $info='';
    public $cover='';
}

class Contact_backup{
    public $id='';
    public $name='';
    public $phone='';
    public $email='';
    public $avatar='';
}

class Contact_Restore{
    public $id='';
    public $date='';
    public $type='';
    public $count_contact='';
}

if(!class_exists('Address')){
 class Address{
    public $address='tp. Huế , Thừa Thiên Huế , VN';
    public $lat='16.525';
    public $lng='107.520';
    public $country='vn';
 }
}

class Cart{
    public $id=0;
    public $product_id=0;
    public $quantity=0;
}

function lang($key){
    $lang='vi';
    if(isset($_SESSION['lang'])){ $lang=$_SESSION['lang']; }
    $return=mysql_query("SELECT `value` FROM `lang_value` WHERE `key` = '$key' AND `lang`='$lang' LIMIT 1");
    $data=mysql_fetch_array($return);
    if($data){
        return $data[0];
    }else{
        return $key;
    }
}

function get_row($table,$id){
    $return=mysql_query("SELECT * FROM `$table` WHERE `id` = '$id' LIMIT 1");
    $data=mysql_fetch_array($return);
    mysql_free_result($return);
    return $data;
}

function get_account($user_id,$lang){
    $return=mysql_query("SELECT * FROM `app_my_girl_user_".$lang."` WHERE `id_device` ='".$user_id."' LIMIT 1");
    return mysql_fetch_array($return);
}

function get_url_account_google($user_id,$lang){
    $return=mysql_query("SELECT `avatar_url` FROM `app_my_girl_user_".$lang."` WHERE `id_device` ='".$user_id."' LIMIT 1");
    return mysql_fetch_array($return);
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


function show_name_by_id($id_device,$lang){
    $return=mysql_query("SELECT `name` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_device' LIMIT 1");
    $return=mysql_fetch_array($return);
    mysql_free_result($return);
    return $return['name'];
}

function strclean($string) {
   $string = str_replace('"', '', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function check_Order($id_product,$id_user){
    $a=mysql_query("SELECT * FROM `order` WHERE `product` = '$id_product' AND `users` = '$id_user' LIMIT 50");
    if(mysql_num_rows($a)>0){
        $a=mysql_fetch_array($a);
        return $a[4];
    }else{
        return null;
    }
}

function get_star_width($id,$object){
    $count_rate=mysql_query("SELECT `rate` FROM `".$object."_rate` WHERE `$object` = '".$id."'");
    $width_rate=0;
    if($count_rate){
        $count_rate=mysql_num_rows($count_rate);
        $sum_rate=mysql_query("SELECT SUM(`rate`) FROM `".$object."_rate` WHERE `$object` = '".$id."'");
        $sum_rate=mysql_fetch_array($sum_rate);
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


function show_share($url){
    $txt_share='<ul id="share_link" title="'.lang("share_tip").'">';
    $txt_share.='<li><strong>'.lang('chia_se').'</strong></li>';
    $txt_share.='<li><a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a></li>';
    $txt_share.='<li><a href="https://twitter.com/home?status='.$url.'" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</a></li>';
    $txt_share.='<li><a href="http://www.linkedin.com/shareArticle?mini=true&url='.$url.'&title=Share" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn</a></li>';
    $txt_share.='<li><a href="http://pinterest.com/pin/create/button/?url='.$url.'&description=Share" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i> Pinterest</a></li>';
    $txt_share.='<li><a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site '.$url.'" target="_blank"><i class="fa fa-envelope-square" aria-hidden="true"></i> Email</a></li>';
    $txt_share.='</ul>';
    return $txt_share;
}


function get_name_product_lang($id_product,$key_l,$is_adim_site=false){
    $query_data=mysql_query("SELECT `data` FROM `product_name` WHERE `id_product` = '$id_product' AND `key_country` = '$key_l' LIMIT 1");
    $data_name=mysql_fetch_array($query_data);
    if($data_name['data']!=""){
        return $data_name['data'];
    }else{
        if($is_adim_site==false){
            $query_data_en=mysql_query("SELECT `data` FROM `product_name` WHERE `id_product` = '$id_product' AND `key_country` = 'en' LIMIT 1");
            $data_name_en=mysql_fetch_array($query_data_en);
            return $data_name_en['data'];
        }else{
            return "";
        }
    }
    mysql_free_result($query_data);
}

function get_username_by_id($id_user,$is_admin=false){
    $lang=$_SESSION['lang'];
    $txt_name='';
    if($is_admin){
        $query_name=mysql_query("SELECT `user_name` FROM carrotsy_work.`work_user` WHERE `user_id` = '$id_user' LIMIT 1");
        $data_name=mysql_fetch_array($query_name);
        $txt_name=$data_name['user_name'];
    }else{
        $query_name=mysql_query("SELECT `name` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
        $data_name=mysql_fetch_array($query_name);
        $txt_name=$data_name['name'];
    }
    
    if($txt_name==''){
        $txt_name=lang('an_danh');
    }
    return $txt_name;
}

function get_desc_product_lang($id_product,$key_l,$is_adim_site=false){
    $query_data=mysql_query("SELECT `data` FROM `product_desc` WHERE `id_product` = '$id_product' AND `key_country` = '$key_l' LIMIT 1");
    $data_desc=mysql_fetch_array($query_data);
    if($data_desc['data']!=""){
        return $data_desc['data'];
    }else{
        if($is_adim_site==false){
            $query_data=mysql_query("SELECT `data` FROM `product_desc` WHERE `id_product` = '$id_product' AND `key_country` = 'en' LIMIT 1");
            $data_desc=mysql_fetch_array($query_data);
            return $data_desc['data'];
        }else{
            return "";
        }
    }
    mysql_free_result($query_data);
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

function get_url_avatar_user($id_user,$lang,$size=100,$is_admin=false){
    $url_img='app_mygirl/app_my_girl_'.$lang.'_user/'.$id_user.'.png';
    $url_avatar=URL.'/thumb.php?src='.URL.'/images/avatar_default.png&size='.$size.'&trim=1';
    if($is_admin){
        $url_avatar='http://work.carrotstore.com/img.php?url=avatar_user/'.$id_user.'.png&size='.$size;
    }else{
        if(file_exists($url_img)){
            $url_avatar=URL.'/thumb.php?src='.URL.'/'.$url_img.'&size='.$size.'&trim=1';
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

function box_ads($id_product,$lang){
    $query_product_ads=mysql_query("SELECT * FROM `products` WHERE `id` = '$id_product' LIMIT 1");
    $product_ads=mysql_fetch_array($query_product_ads);
    $html_txt='';
    $html_txt.='<div id="box_ads_app" style="background-color: #3FC73D;width: 100%;height: auto;float: left;margin-bottom: 20px;padding-bottom: 5px;">';
    $html_txt.='<div style="background-color: green;color: white;float: left;text-decoration: none;font-weight: bold;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.58);font-size: 14px;padding-top: 8px;padding-bottom: 8px;width: 100%;float: left;">';
    $html_txt.='<span style="margin-left: 20px;">'.get_name_product_lang($id_product,$lang).'</span>';
    $html_txt.='<i style="float: right;cursor: pointer;margin-right: 5px;" onclick="$(\'#box_ads_app\').fadeOut(100);" class="fa fa-mobile"></i>';
    $html_txt.='</div>';
    $html_txt.='<div id="body_ads">';
    $html_txt.='<a href="'.URL.'/product/'.$id_product.'"><img  style="width: 30%;float: left;margin-right: 3px;margin-top: 6px;margin-left: 6px;" src="'.get_url_icon_product($id_product,'100').'" /></a>';
    $html_txt.='<div style="float: left;width: 60%;text-align: center;color:white;text-shadow: 1px 1px 1px black;">';
    $html_txt.=limit_words(get_desc_product_lang($product_ads['id'],$lang),30);
    $html_txt.='</div>';
    $html_txt.='<div style="float: left;width: 60%;text-align: center;">';

    
        $arr_download=array();
        if($product_ads['chplay_store']!=''){ 
            $txt_download='<a href="'.$product_ads['chplay_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/chplay_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['app_store']!=''){ 
            $txt_download='<a href="'.$product_ads['app_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/app_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['galaxy_store']!=''){ 
            $txt_download='<a href="'.$product_ads['galaxy_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/galaxy_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['window_store']!=''){ 
            $txt_download='<a href="'.$product_ads['window_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/window_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($product_ads['apk']!=''){ 
            $txt_download='<a href="'.$product_ads['apk'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/apk_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if(file_exists('product_data/'.$product_ads[0].'/ios/app.plist')){
            $txt_download='<a href="itms-services://?action=download-manifest&amp;url=https://carrotstore.com/product_data/'.$product_ads[0].'/ios/app.plist" target="_blank" ><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/ipa_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        $html_txt.=$arr_download[0];
        if(isset($arr_download[1])) $html_txt.=$arr_download[1];
        if(isset($arr_download[2])) $html_txt.=$arr_download[2];
        if(isset($arr_download[3])) $html_txt.=$arr_download[3];
        
    $html_txt.='</div>';
    $html_txt.='</div>';
    $html_txt.='</div>';
    return $html_txt;
}

function show_ads_box_main($id_place_ads){
    $query_product_main=mysql_query("SELECT * FROM `ads` WHERE `id_ads` = '$id_place_ads' LIMIT 1");
    $data_place_ads=mysql_fetch_array($query_product_main);
    $id_product_ads=$data_place_ads['id_product_main'];
    $query_product_ads=mysql_query("SELECT * FROM `products` WHERE `id` = '$id_product_ads' LIMIT 1");
    $data_product_ads=mysql_fetch_array($query_product_ads);
    $txt_html='<div title="'.lang('click_de_xem').' ('.get_name_product_lang($id_product_ads,$_SESSION["lang"]).')" id="box_ads_app" style="position: fixed;bottom: 8px;left: 8px;background-color: #3FC73D;width: 300px;height: 150px;border-bottom: solid 3px green;">';
    $txt_html.='<div style="background-color: green;padding: 5px;padding: 10px;color: white;float: left;text-decoration: none;font-weight: bold;text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.58);font-size: 14px;padding-top: 8px;padding-bottom: 8px;width: 93%;">';
    $txt_html.=get_name_product_lang($id_product_ads,$_SESSION["lang"]);
    $txt_html.='<i style="float: right;cursor: pointer" onclick="$(\'#box_ads_app\').fadeOut(100).remove();" class="fa fa-times-circle"></i>';
    $txt_html.='</div>';
    
    $txt_html.='<div id="player_music">';
    $txt_html.='<div id="progressBar" style="width: 100%;height: 10px;float: left;background-color: black;border-radius: 0px;" class="round-pink"><div style="float: left;"></div></div>';
    $txt_html.='<img id="player_music_img" style="width: 100px;border-radius: 5px;margin: 2px;float: left;" src="'.get_url_icon_product($id_product_ads,'50x50').'"/>';
    $txt_html.='<div id="player_music_name" style="width: 173px;float: left;color: yellow;margin: 10px;"></div>';
    $txt_html.='<i style="cursor: pointer;font-size: 20px;float: left;margin: 3px;color: white;" class="fa fa-stop-circle" aria-hidden="true" onclick="pause_music();return false;"></i>';      
    $txt_html.='</div>';
    
    $txt_html.='<div id="body_ads">';
        $txt_html.='<a href="'.URL.'/product/'.$id_product_ads.'"><img style="width: 104px;float: left;margin-right: 3px;margin-top: 6px;margin-left: 6px;" src="'.get_url_icon_product($id_product_ads,'104x104').'" /></a>';
        
        $arr_download=array();
        if($data_product_ads['chplay_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['chplay_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/chplay_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['app_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['app_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/app_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['galaxy_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['galaxy_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/galaxy_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['window_store']!=''){ 
            $txt_download='<a href="'.$data_product_ads['window_store'].'"  target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/window_store_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if($data_product_ads['apk']!=''){ 
            $txt_download='<a href="'.$data_product_ads['apk'].'" target="_blank"><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/apk_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        if(file_exists('product_data/'.$data_product_ads[0].'/ios/app.plist')){
            $txt_download='<a href="itms-services://?action=download-manifest&amp;url=https://carrotstore.com/product_data/'.$data_product_ads[0].'/ios/app.plist" target="_blank" ><img style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;" src="'.URL.'/images/ipa_download.png" /></a>';
            array_push($arr_download,$txt_download);
        }
        
        $txt_html.=$arr_download[0];
        if(isset($arr_download[1])) $txt_html.=$arr_download[1];
        if(isset($arr_download[2])) $txt_html.=$arr_download[2];
        if(isset($arr_download[3])) $txt_html.=$arr_download[3];
    $txt_html.='</div>';
    
    $txt_html.='<div id="ads_video"></div>';
    $txt_html.='</div>';
    return $txt_html;
}


function show_box_ads_page($id_ads_place){
    $query_product_main=mysql_query("SELECT * FROM `ads` WHERE `id_ads` = '$id_ads_place' LIMIT 1");
    $data_place_ads=mysql_fetch_array($query_product_main);
    $txt_html='<div style="float:left;margin-bottom: 10px;"><i class="fa fa-futbol-o" aria-hidden="true"></i> '.lang($data_place_ads['tip_download']).'</div>';
    $txt_html.=box_ads($data_place_ads['id_product_main'],$_SESSION['lang']);
    $arr_p=json_decode($data_place_ads['id_product']);
    $id_rand_p=rand(0,count($arr_p)-1);
    $id_product=$arr_p[$id_rand_p];
    $txt_html.=box_ads($id_product,$_SESSION['lang']);
    return $txt_html;
    
}

function get_home_url($url) {
  $result = parse_url($url);
  return $result['host'];
}

