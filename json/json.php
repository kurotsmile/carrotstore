<?php
$function='';
if(isset($_POST['function'])) $function=$_POST['function'];
if(isset($_GET['function'])) $function=$_GET['function'];

if($_GET||$_POST){

    if(isset($_GET['function'])&&$_GET['function']=='search_product'){
        $key=$_GET['key'];
        $type=$_GET['type'];
        if($type=='products'){
            $lang_sel='en';
            if(isset($_SESSION['lang'])){
                $lang_sel=$_SESSION['lang'];
            }
            $result = mysqli_query($link,"SELECT * FROM `products` as p INNER JOIN `product_name_en` as n ON p.`id` = n.`id_product` WHERE n.`data` LIKE '%$key%' AND p.`status`=1 Group by p.`id` LIMIT 50");
            if(isset($_SESSION['view_type'])){
                $view_type=$_SESSION['view_type'];
                include "$view_type.php";
            }else{
                $label_click_de_xem=lang($link,'click_de_xem');
                $label_download_on=lang($link,'download_on');
                $label_loai=lang($link,'loai');
                $label_chi_tiet=lang($link,'chi_tiet');
                include "page_view_all_product_git.php";
            }

            $query_add_log_search_product=mysqli_query($link,"INSERT INTO `product_log_key` (`key`, `lang`) VALUES ('$key', '$lang_sel');");
        }


        if($type=='accounts'){
            $lang_sel='vi';
            if(isset($_SESSION['lang'])){
                $lang_sel=$_SESSION['lang'];
            }
            $result = mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang_sel` WHERE (`name` LIKE '%$key%' OR `sdt` LIKE '%$key%' OR `address` LIKE '%$key%') AND (`status`='0' AND `sdt`!='' ) ORDER BY RAND() LIMIT 50");
            include "page_member_template.php";
        }
        
        if($type=='music'){
            $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
            $query_add_log=mysqli_query($link,"INSERT INTO `app_my_girl_log_key_music` (`key`, `lang`, `type`) VALUES ('$key', '$lang', '2');");
            $txt_query='';
            $txt_query_2='';
            $count_l=mysqli_num_rows($list_country);
            $count_index=0;
            while($l=mysqli_fetch_array($list_country)){
                    $key_lang=$l['key'];
                    $txt_query.="(SELECT * FROM `app_my_girl_$key_lang` WHERE  `chat` LIKE '%$key%' AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $txt_query_2.=" (SELECT * FROM `app_my_girl_$key_lang` WHERE MATCH (`chat`) AGAINST ('$key' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $count_index++;
                    if($count_index!=$count_l){
                        $txt_query.=" UNION ALL ";
                        $txt_query_2.=" UNION ALL ";
                    }
            }
            
            $query_list_music=mysqli_query($link,$txt_query);
            if($query_list_music){
                if(mysqli_num_rows($query_list_music)==0){
                    $query_list_music=mysqli_query($link,$txt_query_2);
                }
            }
            $sub_view='all';
            include "page_music_list.php";
        }
        
        if($type=='quote'){
            $lang_sel='vi';
            if(isset($_SESSION['lang'])){
                $lang_sel=$_SESSION['lang'];
            }
            $list_quote=mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `chat` LIKE '%$key%' ORDER BY RAND() LIMIT 30");
            include "page_quote.php";
        }

        if($type=='piano'){
            $query_list_piano=mysqli_query($link,"SELECT `id_midi`,`name`,`speed`,`category`,`sell`,`level`,`length`,`author` FROM  carrotsy_piano.`midi` WHERE `name` LIKE '%$key%' ORDER BY RAND() LIMIT 50");
            include "page_piano.php";
        }
        exit; 
    }

    if(isset($_GET['function'])&&$_GET['function']=='search_member'){
        $key=$_GET['key'];
        $lang_sel='vi';
        if(isset($_SESSION['lang'])){
            $lang_sel=$_SESSION['lang'];
        }
        $result = mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang_sel` WHERE (`name` LIKE '%$key%' OR `sdt` LIKE '%$key%' OR `address` LIKE '%$key%') AND `status`='0' LIMIT 50",$link);
        include 'page_member_template.php';
        exit; 
    }
    
    
    if(isset($_GET['function'])&&$_GET['function']=='load_product'){
        $arr_id=(array)json_decode($_GET['json']);
        if(count($arr_id)<intval($_GET['lengProduct'])){
            $type=$_GET['type'];
            $category=$_GET['category'];
            $tags=$_GET['tags'];
            if($type!=''){
               $result = mysqli_query($link,"SELECT * FROM `products` WHERE `type` = '".$type."' AND `id` NOT IN (".implode(",",$arr_id).") LIMIT 15");
            }else if($tags!=''){
               $result = mysqli_query($link,"SELECT p.* FROM product_tag tag,products p WHERE tag.product_id=p.id AND tag.tag LIKE '%$tags%' AND p.id NOT IN (".implode(",",$arr_id).") LIMIT 15");
            }else{
               $result = mysqli_query($link,"SELECT * FROM `products` WHERE `id` NOT IN (".implode(",",$arr_id).") AND `company` !='Carrot' ORDER BY RAND()  LIMIT 15");
            }
            $label_click_de_xem=lang($link,'click_de_xem');
            $label_download_on=lang($link,'download_on');
            $label_loai=lang($link,'loai');
            $label_chi_tiet=lang($link,'chi_tiet');

            while ($row = mysqli_fetch_assoc($result)) {
               include "page_view_all_product_git_template.php";
            }
            exit; 
        }
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='load_user'){
        $arr_id=(array)json_decode($_GET['json']);
        $arr_ext=array();
        foreach($arr_id as $id_n){
            array_push($arr_ext,'"'.$id_n.'"');
        }
        $lang_sel='vi';
        if(isset($_SESSION['lang'])){
            $lang_sel=$_SESSION['lang'];
        }
        if(count($arr_id)<intval($_GET['lenguser'])){
            $label_chi_tiet=lang($link,'chi_tiet');
            $label_goi_dien=lang($link,'goi_dien');
            $label_download_vcf=lang($link,'download_vcf');
            $label_so_dien_thoai=lang($link,"so_dien_thoai");
            $label_dia_chi=lang($link,"dia_chi");
            $label_quoc_gia=lang($link,"quoc_gia");

            $result = mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang_sel` WHERE `id_device` NOT IN (".implode(",",$arr_ext).") AND `sdt`!='' AND `address`!='' AND `status`='0' ORDER BY RAND() LIMIT 20");
            while ($row = mysqli_fetch_array($result)) {
               include "page_member_view_git.php";
            }
        }
        exit; 
    }
    
    if($function=='load_music'){

        $arr_id=json_decode($_POST['json']);
        $lang_sel='vi';
        $type=$_POST['type'];
        if(isset($_SESSION['lang'])){
            $lang_sel=$_SESSION['lang'];
        }
        if(count($arr_id)<intval($_POST['lenguser'])){
            if($type=='all'){
                $count_item_music=count($arr_id);
                $list_style='list';
                $label_choi_nhac=lang($link,'choi_nhac');
                $label_chi_tiet=lang($link,'chi_tiet');
                $label_loi_bai_hat=lang($link,'loi_bai_hat');
                $label_chua_co_loi_bai_hat=lang($link,'chua_co_loi_bai_hat');
                $label_music_no_rank=lang($link,'music_no_rank');
                
                $result = mysqli_query($link,"SELECT `id`, `chat`, `file_url`, `slug`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `id` NOT IN (".implode(",",$arr_id).") ORDER BY RAND() LIMIT 20");
                if($result){
                    while ($row = mysqli_fetch_assoc($result)) {
                        include "page_music_git.php";
                        $count_item_music++;
                    }
                }
            }

            if($type=='artist'){
                $query_artis=mysqli_query($link,"SELECT DISTINCT `artist` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `artist`!=''  ORDER BY RAND() LIMIT 60");
                while ($row = mysqli_fetch_assoc($query_artis)) {
                    include "page_music_artist_git.php";
                }
            }
        }
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='load_quote'){
        $arr_id=json_decode($_GET['json']);
        $lang_sel='vi';
        if(isset($_SESSION['lang'])){
            $lang_sel=$_SESSION['lang'];
        }
        $label_detail=lang($link,'chi_tiet');
        $label_speed_quote=lang($link,'doc_cham_ngon');
        if(count($arr_id)<intval($_GET['lenguser'])){
            $result = mysqli_query($link,"SELECT * FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `id` NOT IN (".implode(",",$arr_id).") AND `id_redirect` = '' ORDER BY RAND() LIMIT 20");
            while ($row = mysqli_fetch_assoc($result)) {
               include "page_quote_git.php";
            }
        }
        exit; 
    }

    if(isset($_POST['function'])&&$_POST['function']=='load_piano'){
        $arr_id=json_decode($_POST['json']);
        if(count($arr_id)<intval($_POST['lengmidi'])){
            $arr_midi_level=array(lang($link,'level_de'),lang($link,'level_trung_binh'),lang($link,'level_kho'),lang($link,'level_sieu_kho'));
            $label_detail=lang($link,'chi_tiet');
            $label_loai=lang($link,'loai');
            $label_ten_bai_hat=lang($link,'ten_bai_hat');
            $label_cap_do=lang($link,'cap_do');
            $label_toc_do_nhip=lang($link,'toc_do_nhip');
            $label_so_not_nhac=lang($link,'so_not_nhac');
            $label_tac_gia=lang($link,'tac_gia');
            $result = mysqli_query($link,"SELECT `id_midi`,`name`,`speed`,`category`,`sell`,`level`,`length`,`length_line`,`author` FROM  carrotsy_piano.`midi` WHERE `id_midi` NOT IN (".implode(",",$arr_id).") AND `sell`!='0' ORDER BY RAND() LIMIT 20");
            while ($row = mysqli_fetch_assoc($result)) {
               include "page_piano_git.php";
            }
        }
        exit; 
    }


    if(isset($_GET['function'])&&$_GET['function']=='show_qr'){
        $id=$_GET['id'];
        $type=$_GET['type'];
        $product=get_row('products',$id);
        echo '<img style="width:100%" src="'.$url.'/phpqrcode/'.$type.''.$product[0].'.png"/>';
        exit;
    }


    
    if(isset($_POST['function'])&&$_POST['function']=='comment'){
        $id=$_POST["id"];
        $created=$_POST["created"];
        $content=addslashes($_POST["content"]);
        $productid=$_POST['productid'];
        $usernames=$_POST['username'];
        $upvote_count=$_POST['upvote_count'];
        $parent=$_POST['parent'];
        $type_comment=$_POST['type_comment'];
        $lang_comment=$_POST['lang_comment'];

        mysqli_query($link,"INSERT INTO `comment` (`id_c`, `username`, `comment`, `productid`, `created`,`upvote_count`,`parent`,`type_comment`,`lang`) VALUES ('$id', '$usernames', '$content', '$productid', '$created','$upvote_count','$parent','$type_comment','$lang_comment');");
        exit; 
    }

    if(isset($_POST['function'])&&$_POST['function']=='comment_quocte'){
        $quocte_id=$_POST["quocte_id"];
        $content=addslashes($_POST["content"]);
        $usernames=$_POST['username'];
        $lang_comment=$_POST['lang_comment'];
        mysqli_query($link,"INSERT INTO carrotsy_flower.`flower_action_$lang_comment` (`id_device`, `id_maxim`, `type`, `data`, `date`) VALUES ('$usernames', '$quocte_id', 'comment', '$content',NOW());");
        exit; 
    }


    if($function=='rate_object'){
        $id=$_POST['id'];
        $objects=$_POST['objects'];
        $star=$_POST['star'];
        if(isset($user_login)){
            $user=$user_login->id;
        }else{
            $user= $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
        }
        $check_rate=mysqli_query($link,"SELECT * FROM `".$objects."_rate` WHERE `".$objects."` = '$id' AND `user` = '$user'");
        if(mysqli_num_rows($check_rate)>0){
            mysqli_query($link,"UPDATE `".$objects."_rate` SET `rate` = '$star' WHERE `".$objects."` = '$id' AND `user` = '$user' AND `lang`='$lang' ");
        }else{
            mysqli_query($link,"INSERT INTO `".$objects."_rate` (`".$objects."`, `user`, `rate`,`lang`) VALUES ('$id', '$user', '$star','$lang');");
            if(isset($_SESSION['username_login'])){
                $tip='act_da_danh_gia_'.$objects;
                $content=json_encode(array($objects,$star,$id));
                mysqli_query($link,"INSERT INTO `account_activity` (`type`, `content`, `user`,`wall`,`date`,`tip`) VALUES ('account', '$content', '$user','$user',NOW(),'$tip');");
            }
        }
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='login_admin'){
        $username=$_POST['login_admin_username'];
        $password=$_POST['login_admin_password'];
        $query_login_admin=mysqli_query($link,"SELECT * FROM  carrotsy_work.`work_user` WHERE `user_name` = '$username' AND `user_pass` = '$password' LIMIT 1");
        if(mysqli_num_rows($query_login_admin)>0){
            $data_login_user=mysqli_fetch_array($query_login_admin);
            $user_login=new User_login();
            $user_login->id=$data_login_user['user_id'];
            $user_login->name=$username;
            $user_login->type='admin';
            $user_login->link=$url.'/admin';
            $user_login->avatar=$url_work.'/avatar_user/'.$data_login_user['user_id'].'.png';
            $user_login->email=$data_login_user['email'];
            $user_login->lang=$lang;
            echo '1';
            $_SESSION['user_login']=json_encode($user_login);
        }else{
            echo '0';
        }
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='logout_account'){
        unset($_SESSION['user_login']);
        unset($user_login);
        exit;
    }
    
    if(isset($_POST['function'])&&$_POST['function']=='login_google'){
        $user_id=$_POST['user_id'];
        $user_name=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_avatar=$_POST['user_avatar'];

        $lang=$_SESSION['lang'];
        $check_login=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$user_id'");
        if(mysqli_num_rows($check_login)>0){
            $query_update_user=mysqli_query($link,"UPDATE `app_my_girl_user_$lang` SET `date_cur` =NOW() , `avatar_url` = '$user_avatar' WHERE `id_device` = '$user_id' LIMIT 1;");
        }else{
            $query_add_user=mysqli_query($link,"INSERT INTO `app_my_girl_user_$lang` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `status`, `email`, `avatar_url`) VALUES ('$user_id','$user_name','0',NOW(),NOW(),0,'$user_email','$user_avatar');");
        }
        $user_login=new User_login();
        $user_login->id=$user_id;
        $user_login->name=$user_name;
        $user_login->type='google';
        $user_login->link=$url.'/user/'.$user_id.'/'.$lang;
        $user_login->avatar=$user_avatar;
        $user_login->email=$user_email;
        $user_login->lang=$lang;
        $_SESSION['user_login']=json_encode($user_login);
        echo $user_id;
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='login_facebook'){
        $user_name=$_POST['user_name'];
        $user_id=$_POST['user_id'];
        $user_email=$_POST['user_email'];
        $lang=$_SESSION['lang'];
        $user_avatar='http://graph.facebook.com/'.$user_id.'/picture?type=normal';
        if($user_email=='undefined'){
            $user_email='';
        }

        $check_login=mysqli_query($link,"SELECT `id_device` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$user_id'");
        if(mysqli_num_rows($check_login)>0){
            $query_update_user=mysqli_query($link,"UPDATE `app_my_girl_user_$lang` SET `date_cur` =NOW() , `avatar_url` = '$user_avatar' WHERE `id_device` = '$user_id' LIMIT 1;");
        }else{
            $query_add_user=mysqli_query($link,"INSERT INTO `app_my_girl_user_$lang` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `status`, `email`, `avatar_url`) VALUES ('$user_id','$user_name','0',NOW(),NOW(),0,'$user_email','$user_avatar');");
        }
        $user_login=new User_login();
        $user_login->id=$user_id;
        $user_login->name=$user_name;
        $user_login->type='facebook';
        $user_login->link=$url.'/user/'.$user_id.'/'.$lang;
        $user_login->avatar='http://graph.facebook.com/'.$user_id.'/picture?type=normal';
        $user_login->email=$user_email;
        $user_login->lang=$lang;
        $_SESSION['user_login']=json_encode($user_login);
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='add_lyrics_music'){
        $contain=$_POST['contain'];
        $id_music=$_POST['id_music'];
        $lang=$_SESSION['lang'];
        $query_add_lyrics=mysqli_query($link,"INSERT INTO `music_contribute_lyrics` (`id_music`, `lyrics`, `lang`) VALUES ('$id_music', '$contain', '$lang');");
        if($query_add_lyrics){
            echo "1";
        }else{
            echo "0";
        }
        exit;
    }
    
    if(isset($_POST['function'])&&$_POST['function']=='show_box_select_lang'){
        $urls = $_POST['urls'];
        $query_country=mysqli_query($link,"SELECT `key`,`name` FROM `app_my_girl_country` WHERE `active` = '1' AND `ver0`='1'");
        echo '<form id="menu_country" method="post">';
        while ($row_country=mysqli_fetch_assoc($query_country)){
            $css_active='';
            if($row_country['key']==$lang){
                $css_active='active';
            }
            echo '<span class="item_contry '.$css_active.'" onclick="change_lang_store(\''.$row_country['key'].'\')"><img src="'.$url.'/thumb.php?src='.$url.'/app_mygirl/img/'.$row_country['key'].'.png&size=20x20&trim=1"/> '.$row_country['name'].'</span>';
        }
        echo '<input type="hidden" id="sel_key_contry" name="key_contry">';
        echo '<input type="hidden" name="urls" value="'.$urls.'">';
        echo '</form>';
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='login_account_carrot'){
        $user_phone_login=$_POST['user_phone_login'];
        $user_password_login=$_POST['user_password_login'];

        $txt_error='';
        if($user_phone_login==''){
            $txt_error.='<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'account_update_phone_error');
        }

        if($user_password_login==''&&$txt_error==''){
            $txt_error.='<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'loi_dang_nhap');
        }

        if($txt_error=='') {
            $check_login = mysqli_query($link,"SELECT `id_device`,`name`,`email`,`sdt` FROM `app_my_girl_user_$lang` WHERE (`sdt` = '$user_phone_login' AND `password`='$user_password_login') OR (`email` = '$user_phone_login' AND `password`='$user_password_login') ");
            if (mysqli_num_rows($check_login) > 0) {
                $data_login_user = mysqli_fetch_assoc($check_login);
                $user_login = new User_login();
                $user_login->id = $data_login_user['id_device'];
                $user_login->name = $data_login_user['name'];
                $user_login->type = 'carrot';
                $user_login->link = $url . '/user/' . $data_login_user['id_device'] . '/' . $lang;
                $user_login->avatar = get_url_avatar_user($link,$data_login_user['id_device'],$lang);
                $user_login->email = $data_login_user['email'];
                $user_login->lang = $lang;
                $_SESSION['user_login'] = json_encode($user_login);
                echo 'ready_account';
            } else {
                echo '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'loi_dang_nhap');
            }
        }else{
            echo $txt_error;
        }
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='register_account_carrot'){
        $user_phone_register=$_POST['user_phone_register'];
        $user_name_register=$_POST['user_name_register'];
        $user_address_register=$_POST['user_address_register'];
        $user_password_register=$_POST['user_password_register'];
        $id_device=uniqid().uniqid();

        $txt_error='';

        if($user_name_register==''){
            $txt_error.='<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'loi_ten');
        }

        if(!is_numeric($user_phone_register)&&$txt_error==''){
            $txt_error.='<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'account_update_phone_error');
        }


        if($user_password_register==''&&$txt_error==''){
            $txt_error.='<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'loi_mat_khau');
        }

        if($txt_error==''){
            $check_login = mysqli_query($link,"SELECT `id_device` FROM `app_my_girl_user_$lang` WHERE `sdt` = '$user_phone_register' AND `password`='$user_password_register' LIMIT 1");
            if(mysqli_num_rows($check_login)>0){
                echo '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.lang($link,'loi_tai_khoan_da_ton_tai');
            }else {
                $query_add_user = mysqli_query($link,"INSERT INTO `app_my_girl_user_$lang` (`id_device`, `name`,`sdt`, `sex`, `date_start`, `date_cur`, `status`,`password`) VALUES ('$id_device','$user_name_register','$user_phone_register','0',NOW(),NOW(),0,'$user_password_register');");
                echo 'add_account_success';
            }
        }else{
            echo $txt_error;
        }
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='forgot_passworrd'){
        $email=trim($_POST['email']);
        $msg="";
        $type="";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $msg = lang($link,'error_email');
            $type="error";
        }else{
            $query_password=mysqli_query($link,"SELECT `password` FROM `app_my_girl_user_$lang` WHERE `email` = '$email' AND `password` != '' LIMIT 1");
            if($query_password){
                if(mysqli_num_rows($query_password)){
                    $data_password=mysqli_fetch_assoc($query_password);
                    $data_password=$data_password['password'];

                    $subject = 'Carrot Store';

                    $headers = "From: " . strip_tags('carrotstore@gmail.com') . "\r\n";
                    $headers .= "MIME-Version: 1.0\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

                    $message = '<p><strong>'.$data_password.'</strong></p>';

                    mail($email, $subject, $message, $headers);

                    $msg=lang($link,'quen_mat_khau_success');
                    $type="success";
                }else{
                    $msg=lang($link,'quen_mat_khau_fail');
                    $type="error";
                }
            }else{
                $msg=lang($link,'quen_mat_khau_fail');
            }
        }

        echo '{ "title":"'.lang($link,'quen_mat_khau').'", "msg":"'.$msg.'", "type":"'.$type.'" }';
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='jailbreak_tip'){
        $id_product=$_POST['id_product'];
        $url_file_ipa=$url."/product_data/".$id_product."/ios/Unity-iPhone.ipa";
        $url_search="https://www.google.com/search?&q=how+to+jailbreak+ios&oq=how+to+jailbreak+ios";
        echo "<ul class='jailbreak_tip'>";
        echo "<li><i class='fa fa-apple' aria-hidden='true'></i> ".lang($link,'jailbreak_1')."</li>";
        echo "<li><a href='".$url_file_ipa."' target='_blank'><i class='fa fa-apple' aria-hidden='true'></i> ".lang($link,'jailbreak_2')."</a></li>";
        echo "<li><a href='".$url_search."' target='_blank'><i class='fa fa-apple' aria-hidden='true'></i> ".lang($link,'jailbreak_3')."</a> </li>";
        echo "</ul>";
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='show_work_user_tip'){
        $html_show="<div class='work_user_tip'>";
        $user_id=$_POST['id'];
        $query_user_work=mysqli_query($link,"SELECT `full_name`, `note`, `user_id` FROM carrotsy_work.`work_user` WHERE `user_id` = '$user_id' LIMIT 1");
        $data_user_work=mysqli_fetch_assoc($query_user_work);
        $url_avatar_work_user=$url.'/thumb.php?src='.$url_work.'/avatar_user/'.$user_id.'.png?v='.$ver.'&size=500x500&trim=1';
        $html_show.="<img src='$url_avatar_work_user'>";
        $html_show.="<div class='user_info'>";
        $html_show.="<div class='note'>";
        $html_show.="<strong>".lang($link,'ten_day_du').":</strong> ".$data_user_work['full_name']."<br/>";
        $html_show.="<strong>".lang($link,'gioi_thieu').":</strong> ".$data_user_work['note'];
        $html_show.="</div>";
        $html_show.="</div>";
        $html_show.="<div>";
        echo data_json_tip($html_show,0);
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='style_dark_mode'){
        $_SESSION['style_css_dark_mode']=$_POST['mode'];
        exit;
    }

    
    if(isset($_POST['function'])&&$_POST['function']=='show_tip_dark_mode'){
        $url_img_dark_mode=$url.'/images/dark_mode.gif';
        $html_show="<div class='work_user_tip'>";
        $html_show.="<img src='$url_img_dark_mode'>";
        $html_show.="<div class='user_info'>";
        $html_show.="<div class='note'>";
        $html_show.="<strong>".lang($link,'dark_mode')."</strong><br/><br/>";
        if($style_css_dark_mode=='0'){
            $html_show.="<i class='fa fa-moon-o' aria-hidden='true'></i> ".lang($link,'dark_mode_0');
        }else{
            $html_show.="<i class='fa fa-sun-o' aria-hidden='true'></i> ".lang($link,'dark_mode_1');
        }
        $html_show.="</div>";
        $html_show.="</div>";
        $html_show.="<div>";
        echo data_json_tip($html_show,1);
        exit;
    }

    if($function=='order_music'){
        $id_music=$_POST['id_music'];
        $lang_music=$_POST['lang_music'];
        $pay_name=$_POST['pay_name'];
        $pay_mail=$_POST['pay_mail'];
        $id_order=uniqid().''.uniqid();
        $query_add=mysqli_query($link,"INSERT INTO `order` (`id_order`,`id`, `lang`, `pay_mail`, `pay_name`, `type`) VALUES ('$id_order','$id_music', '$lang_music', '$pay_mail', '$pay_name', 'music');");
        echo '<strong style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i> '.lang($link,'pay_success').'</strong>';
        echo '<a style="width: 100%;" href="'.$url.'/download.php?id='.$id_music.'&lang='.$lang_music.'" id="download_song" >';
        echo '<i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br />';
        echo '<span>'.lang($link,'download_song').'</span>';
        echo '</a>';
        exit;
    }

    if($function=='order_product'){
        $id_music=$_POST['id_music'];
        $lang_music=$_POST['lang_music'];
        $pay_name=$_POST['pay_name'];
        $pay_mail=$_POST['pay_mail'];
        $id_order=uniqid().''.uniqid();
        $query_add=mysqli_query($link,"INSERT INTO `order` (`id_order`,`id`, `lang`, `pay_mail`, `pay_name`, `type`) VALUES ('$id_order','$id_music', '$lang_music', '$pay_mail', '$pay_name', 'product');");
        echo '<strong style="color:green"><i class="fa fa-check-circle" aria-hidden="true"></i> '.lang($link,'pay_success').'</strong>';
        echo '<a style="width: 100%;" href="#" onclick="show_box_download_link();return false;" id="download_song" >';
        echo '<i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br />';
        echo '<span>'.lang($link,'download_game').'</span>';
        echo '</a>';
        exit;
    }
}
?>