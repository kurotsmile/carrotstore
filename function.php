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
    $return=mysqli_query($link,"SELECT `value` FROM `lang_$lang` WHERE `key` = '$key' LIMIT 1");
    if($return){
        $data=mysqli_fetch_assoc($return);
        if($data){
            return addslashes($data['value']);
        }else{
            return $key;
        }
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
    $query_share=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`share` ORDER BY `order` ");
    while($s=mysqli_fetch_assoc($query_share)){
        $share_url=str_replace('{url}',$url,$s['url']);
        $share_name=$s['name'];
        $txt_share.='<li><a onclick="box_share(this);return false;" href="'.$share_url.'" target="_blank"><i class="fa '.$s['icon_css'].'" aria-hidden="true"></i> '.$share_name.'</a></li>';
    }
    $txt_share.='</ul>';
    return $txt_share;
}


function get_name_product_lang($link,$id_product,$key_l,$is_adim_site=false){
    $query_data=mysqli_query($link,"SELECT `data` FROM `product_name_$key_l` WHERE `id_product` = '$id_product'  LIMIT 1");
    $data_name=mysqli_fetch_array($query_data);
    if(isset($data_name['data'])){
        return $data_name['data'];
    }else{
        if($is_adim_site==false){
            $query_data_en=mysqli_query($link,"SELECT `data` FROM `product_name_en` WHERE `id_product` = '$id_product'  LIMIT 1");
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
    $query_data=mysqli_query($link,"SELECT `data` FROM `product_desc_$key_l` WHERE `id_product` = '$id_product'  LIMIT 1");
    if($query_data){
        $data_desc=mysqli_fetch_assoc($query_data);
        if(isset($data_desc['data'])){
            return $data_desc['data'];
        }else{
            if($is_adim_site==false){
                $query_data=mysqli_query($link,"SELECT `data` FROM `product_desc_en` WHERE `id_product` = '$id_product'  LIMIT 1");
                $data_desc=mysqli_fetch_assoc($query_data);
                return $data_desc['data'];
            }else{
                return "";
            }
        }
    }else{
        $query_data=mysqli_query($link,"SELECT `data` FROM `product_desc_en` WHERE `id_product` = '$id_product'  LIMIT 1");
        $data_desc=mysqli_fetch_assoc($query_data);
        return $data_desc['data'];
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
    $html_txt='';
    $html_txt.='<div id="box_ads_app_page">';
    $html_txt.='<div class="title">';
    $html_txt.='<span style="margin-left: 20px;">'.get_name_product_lang($link,$id_product,$lang).'</span>';
    $html_txt.='<i style="float: right;cursor: pointer;margin-right: 5px;" onclick="$(\'#box_ads_app\').fadeOut(100);" class="fa fa-mobile"></i>';
    $html_txt.='</div>';
    $html_txt.='<div id="body_ads">';
    $html_txt.='<a href="'.URL.'/product/'.$id_product.'"><img alt="'.get_name_product_lang($link,$id_product,$lang).'"  style="width: 30%;float: left;margin-right: 3px;margin-top: 6px;margin-left: 6px;" class="lazyload" data-src="'.get_url_icon_product($id_product,'100').'" /></a>';
    $html_txt.='<div style="float: left;width: 60%;text-align: center;color:white;text-shadow: 1px 1px 1px black;">';
    $html_txt.=limit_words(get_desc_product_lang($link,$id_product,$lang),30);
    $html_txt.='</div>';
    $html_txt.='<div style="float: left;width: 60%;text-align: center;">';

    $query_link_store=mysqli_query($link,"SELECT * FROM `product_link` WHERE `id_product` = '".$id_product."' LIMIT 4");
    while($link_store=mysqli_fetch_assoc($query_link_store)){
        $html_txt.='<a href="'.$link_store['link'].'" target="_blank"><img alt="'.$link_store['name'].'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images_link_store/'.$link_store['icon'].'.jpg&size=85x28&trim=1" /></a>';
    }
    
    if(file_exists('product_data/'.$id_product.'/ios/app.plist')){
        $html_txt.='<a href="itms-services://?action=download-manifest&amp;url=https://carrotstore.com/product_data/'.$id_product.'/ios/app.plist" target="_blank" ><img alt="Download '.get_name_product_lang($link,$id_product_ads,$_SESSION["lang"]).'" style="width: 85px;float: left;margin-right: 3px;margin-top: 3px;"  class="lazyload" data-src="'.URL.'/thumb.php?src='.URL.'/images/ipa_download.png&size=85x28&trim=1" /></a>';
    }
 
    $html_txt.='</div>';
    $html_txt.='</div>';
    $html_txt.='</div>';
    return $html_txt;
}

function show_ads_box_main($link,$id_place_ads){
    $query_product_main=mysqli_query($link,"SELECT * FROM `ads` WHERE `id_ads` = '$id_place_ads' LIMIT 1");
    $data_place_ads=mysqli_fetch_array($query_product_main);
    $id_product_ads=$data_place_ads['id_product_main'];

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
        $txt_html.='<a href="'.URL.'/product/'.$id_product_ads.'"><img alt="Download '.$name_product.'" id="ads_box_main_icon"  class="lazyload" width="104" height="104" data-src="'.get_url_icon_product($id_product_ads,'104x104').'" /></a>';
        
        $query_link_store=mysqli_query($link,"SELECT * FROM `product_link` WHERE `id_product` = '".$id_product_ads."' LIMIT 4");
        while($link_store=mysqli_fetch_assoc($query_link_store)){
            $txt_html.='<a href="'.$link_store['link'].'" target="_blank"><img alt="'.$link_store['name'].'" width="85" height="28" class="lazyload ads_box_img_link" data-src="'.URL.'/thumb.php?src='.URL.'/images_link_store/'.$link_store['icon'].'.jpg&size=85x28&trim=1" /></a>';
        }
        
        if(file_exists('product_data/'.$id_product_ads.'/ios/app.plist')){
            $txt_html.='<a href="itms-services://?action=download-manifest&amp;url=https://carrotstore.com/product_data/'.$id_product_ads.'/ios/app.plist" target="_blank" ><img alt="Download '.get_name_product_lang($link,$id_product_ads,$_SESSION["lang"]).'" width="85" height="28" class="lazyload ads_box_img_link" data-src="'.URL.'/thumb.php?src='.URL.'/images/ipa_download.png&size=85x28&trim=1" /></a>';
        }
        
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

function is_mobile(){
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
        return true;
    else
        return false;
}

function scroll_load_data($type_obj,$length_obj){
    global $url;
    $txt_script='<script>';
        $txt_script.='var scroll_load_data=true;';
        $txt_script.='var count_p='.$length_obj.';';
        $txt_script.='$(window).scroll(function() {';
            $txt_script.='if(scroll_load_data){';
                $txt_script.='if($(window).scrollTop() + $(window).height() >= ($(document).height()-10)){';
                    $txt_script.='$("#loading").fadeIn(200);';
                    $txt_script.='$("#loading-page").html(arr_id_obj.length+"/"+count_p);';
                    $txt_script.='var s_data_json=JSON.stringify(arr_id_obj);';
                    $txt_script.='$.ajax({';
                        $txt_script.='url:"'.$url.'/index.php",';
                        $txt_script.='type:"post",';
                        $txt_script.='data:"function=scroll_load_data&type_obj='.$type_obj.'&data_json="+s_data_json+"&length_obj="+count_p,';
                        $txt_script.='success:function(data,textStatus,jqXHR){';
                            $txt_script.='s_data_json=JSON.stringify(arr_id_obj);';
                            $txt_script.='$("#containt").append(data);';
                            $txt_script.='$("#loading").fadeOut(200);';
                            $txt_script.='reset_tip();';
                        $txt_script.='}';
                    $txt_script.='});';
                $txt_script.='}';
            $txt_script.='}';
        $txt_script.='});';
    $txt_script.='</script>';
    return $txt_script;
}