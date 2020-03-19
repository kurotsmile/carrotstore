<?php
if($_GET||$_POST){

    if(isset($_GET['function'])&&$_GET['function']=='add_key'){
        $key_name=$_GET['key_name'];
        $key_contry=$_GET['key_contry'];
        $key_txt=addslashes($_GET['key_txt']);
        mysql_query("INSERT INTO `lang_key` (`key_contry`, `key_name`, `key_txt`) VALUES ('$key_contry', '$key_name', '$key_txt');");
        exit;
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='add_type'){
        $id_type=$_GET['id_type'];
        $icon_type=$_GET['icon_type'];
        mysql_query("INSERT INTO `type` (`id`, `css_icon`)VALUES ('$id_type', '$icon_type');");
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='delete_type'){
        $key_id=$_GET['id'];
        mysql_query("DELETE FROM `type` WHERE ((`id` = '$key_id'));");
        exit; 
    }

    if(isset($_GET['function'])&&$_GET['function']=='update_key'){
        $id=$_GET['id'];
        $key_name=$_GET['key_name'];
        $key_contry=$_GET['key_contry'];
        $key_txt=$_GET['key_txt'];
        mysql_query("UPDATE `lang_key` SET `key_contry` = '$key_contry',`key_name` = '$key_name',`key_txt` = '$key_txt' WHERE `id` = '$id';");
        exit; 
    }

    if(isset($_GET['function'])&&$_GET['function']=='update_type'){
        $id=$_GET['id_type'];
        $icon_type=$_GET['icon_type'];
        $a=mysql_query("UPDATE `type` SET `css_icon` = '$icon_type' WHERE `id` = '$id' ");
        echo var_dump($a);
        exit; 
    }


    
    if(isset($_GET['function'])&&$_GET['function']=='search_key'){
        $key=$_GET['key'];
        $result = mysql_query("SELECT * FROM `lang_key` WHERE `key_txt` LIKE '%$key%' OR `key_name` LIKE '%$key%' LIMIT 50",$link);
        include "admin/page_country_key_template.php";
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='search_product'){
        $key=$_GET['key'];
        $type=$_GET['type'];
        if($type=='products'){
            $lang_sel='en';
            if(isset($_SESSION['lang'])){
                $lang_sel=$_SESSION['lang'];
            }
            $result = mysql_query("SELECT * FROM `products` as p INNER JOIN `product_name` as n ON p.`id` = n.`id_product` WHERE n.`key_country` = '$lang_sel' AND n.`data` LIKE '%$key%' AND p.`status`=1 LIMIT 50",$link);
            if(isset($_SESSION['view_type'])){
                $view_type=$_SESSION['view_type'];
                include "$view_type.php";
            }else{
                include "page_view_all_product_git.php";
            }
        }
        
        
        if($type=='place'){
            $result = mysql_query("SELECT * FROM `$type` WHERE `address` LIKE '%$key%' OR `describe` LIKE '%$key%' OR `name` LIKE '%$key%' LIMIT 50",$link);
            if(isset($_SESSION['view_type'])){
                $view_type=$_SESSION['view_type'];
                while ($row = mysql_fetch_array($result)) {
                    include "page_place_view_git_teamplate.php";
                }
            }else{
                include "page_place_view_git.php";
            }
        }

        if($type=='accounts'){
            $lang_sel='vi';
            if(isset($_SESSION['lang'])){
                $lang_sel=$_SESSION['lang'];
            }
            $result = mysql_query("SELECT * FROM `app_my_girl_user_$lang_sel` WHERE (`name` LIKE '%$key%' OR `sdt` LIKE '%$key%' OR `address` LIKE '%$key%') AND (`status`='0' AND `sdt`!='' ) ORDER BY RAND() LIMIT 50",$link);
            include "page_member_template.php";
        }
        
        if($type=='music'){
            $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
            $txt_query='';
            $txt_query_2='';
            $count_l=mysql_num_rows($list_country);
            $count_index=0;
            while($l=mysql_fetch_array($list_country)){
                    $key_lang=$l['key'];
                    $txt_query.="(SELECT * FROM `app_my_girl_$key_lang` WHERE  `chat` LIKE '%$key%' AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $txt_query_2.=" (SELECT * FROM `app_my_girl_$key_lang` WHERE MATCH (`chat`) AGAINST ('$key' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
                    $count_index++;
                    if($count_index!=$count_l){
                        $txt_query.=" UNION ALL ";
                        $txt_query_2.=" UNION ALL ";
                    }
            }
            
            $query_list_music=mysql_query($txt_query);
            if(mysql_num_rows($query_list_music)==0){
                $query_list_music=mysql_query($txt_query_2);
            }
            include "page_music_list.php";
        }
        
        if($type=='quote'){
            $lang_sel='vi';
            if(isset($_SESSION['lang'])){
                $lang_sel=$_SESSION['lang'];
            }
            $list_quote=mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `chat` LIKE '%$key%' ORDER BY RAND() LIMIT 30");
            include "page_quote.php";
        }
        exit; 
    }
    

    
    if(isset($_GET['function'])&&$_GET['function']=='search_member'){
        $key=$_GET['key'];
        $lang_sel='vi';
        if(isset($_SESSION['lang'])){
            $lang_sel=$_SESSION['lang'];
        }
        $result = mysql_query("SELECT * FROM `app_my_girl_user_$lang_sel` WHERE (`name` LIKE '%$key%' OR `sdt` LIKE '%$key%' OR `address` LIKE '%$key%') AND `status`='0' LIMIT 50",$link);
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
               $result = mysql_query("SELECT * FROM `products` WHERE `type` = '".$type."' AND `id` NOT IN (".implode(",",$arr_id).") LIMIT 15",$link);
            }else if($tags!=''){
               $result = mysql_query("SELECT p.* FROM product_tag tag,products p WHERE tag.product_id=p.id AND tag.tag LIKE '%$tags%' AND p.id NOT IN (".implode(",",$arr_id).") LIMIT 15",$link);
            }else{
               $result = mysql_query("SELECT * FROM `products` WHERE `id` NOT IN (".implode(",",$arr_id).") LIMIT 15",$link);
            }

            while ($row = mysql_fetch_array($result)) {
               include "page_view_all_product_git_template.php";
            }
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
            $result = mysql_query("SELECT * FROM `app_my_girl_user_$lang_sel` WHERE `id_device` NOT IN (".implode(",",$arr_ext).") AND `sdt`!='' AND `address`!='' AND `status`='0' ORDER BY RAND() LIMIT 30",$link);
            while ($row = mysql_fetch_array($result)) {
               include "page_member_view_git.php";
            }
        }
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='load_music'){
        $arr_id=json_decode($_GET['json']);
        $lang_sel='vi';
        if(isset($_SESSION['lang'])){
            $lang_sel=$_SESSION['lang'];
        }
        if(count($arr_id)<intval($_GET['lenguser'])){
            $list_style='list';
            $label_choi_nhac=lang('choi_nhac');
            $label_chi_tiet=lang('chi_tiet');
            $label_loi_bai_hat=lang('loi_bai_hat');
            $label_chua_co_loi_bai_hat=lang('chua_co_loi_bai_hat');
            $label_music_no_rank=lang('music_no_rank');
            
            $result = mysql_query("SELECT `id`, `chat`, `file_url`, `slug`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `id` NOT IN (".implode(",",$arr_id).") ORDER BY RAND() LIMIT 30",$link);
            while ($row = mysql_fetch_array($result)) {
               include "page_music_git.php";
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
        if(count($arr_id)<intval($_GET['lenguser'])){
            $result = mysql_query("SELECT * FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `id` NOT IN (".implode(",",$arr_id).") AND `id_redirect` = '' ORDER BY RAND() LIMIT 30",$link);
            while ($row = mysql_fetch_array($result)) {
               include "page_quote_git.php";
            }
        }
        exit; 
    }

    if(isset($_GET['function'])&&$_GET['function']=='order_product'){
        $id=$_GET['id'];
        $quantity=$_GET['quantity'];
        $product=get_row('products',$id);
        $price=convert_price($product[11],'en',$product[10]);
        $users='';
        if(isset($_SESSION['username_login'])){
            $users=$_SESSION['username_login'];
        }else{
            $users= $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
        }
        $productid=$product[0];
        mysql_query("INSERT INTO `order` (`product`, `quantity`, `price`, `status`, `users`)VALUES ('$productid', '$quantity', '$price', '1', '$users');");
        echo $product[10];
        exit;
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='show_address'){
        $lat=$_GET['lat'];
        $lng=$_GET['lng'];
        ?>
        <div id="map_sub" style="width: 100%;height:300px;">&nbsp;</div>
        </div>
        <script type="text/javascript">
        
        var map;
        function initMap() {
              var pos = {
                lat: <?php echo $lat; ?>,
                lng: <?php echo $lng; ?>,
              };
              
          var image = '<?php echo $url;?>/images/carot.png';
        
            map = new google.maps.Map(document.getElementById('map_sub'), {
            center: pos,
            zoom: 12
            });
              var meMarker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: '<?php echo thumb('images/position_me.png','60x60'); ?>',
                animation: google.maps.Animation.BOUNCE
              });
        
        }
        initMap();
        </script>
        <?php
        exit;
    }

    if(isset($_GET['function'])&&$_GET['function']=='show_qr'){
        $id=$_GET['id'];
        $type=$_GET['type'];
        $product=get_row('products',$id);
        echo '<img style="width:100%" src="'.$url.'/phpqrcode/'.$type.''.$product[0].'.png"/>';
        exit;
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='show_app'){
        $row=get_row('products',$_GET['id']);
        include 'page_view_all_product_git_template.php';
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='show_place'){
        $row=get_row('place',$_GET['id']);
        include 'page_place_view_git_teamplate.php';
        exit; 
    }
    
    if(isset($_GET['function'])&&$_GET['function']=='show_company'){
        $row=get_row('company',$_GET['id']);
        include 'page_company_view_git_template.php';
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

        mysql_query("INSERT INTO `comment` (`id_c`, `username`, `comment`, `productid`, `created`,`upvote_count`,`parent`,`type_comment`,`lang`) VALUES ('$id', '$usernames', '$content', '$productid', '$created','$upvote_count','$parent','$type_comment','$lang_comment');");
        exit; 
    }

    if(isset($_POST['function'])&&$_POST['function']=='comment_quocte'){
        $quocte_id=$_POST["quocte_id"];
        $content=addslashes($_POST["content"]);
        $usernames=$_POST['username'];
        $lang_comment=$_POST['lang_comment'];
        mysql_query("INSERT INTO carrotsy_flower.`flower_action_$lang_comment` (`id_device`, `id_maxim`, `type`, `data`, `date`) VALUES ('$usernames', '$quocte_id', 'comment', '$content',NOW());");
        exit; 
    }


    if(isset($_POST['function'])&&$_POST['function']=='appfunction'){
        echo var_dump($_POST);
        include_once($_POST['urls']);
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='insert_data'){
        $edit=0;
        unset($_POST['function']);
        $table=$_POST['table'];
        unset($_POST['table']);
        $success=$_POST['success'];
        unset($_POST['success']);
        $error=$_POST['error'];
        unset($_POST['error']);

        if(isset($_POST['id'])){
            $edit=$_POST['id'];
            unset($_POST['id']);
        }
        $data = $_POST;
            foreach($data as $field => $value)
            {
                if (is_numeric($value))
                    $values[] = $value;
                else
                    $values[] = "'".mysql_real_escape_string($value)."'";
            }
            $fields_sql = implode(',', array_keys($data));
            $values_sql = implode(',', $values);

        if($edit==0){
            $result_ist=mysql_query("INSERT INTO `$table` ($fields_sql) VALUES ($values_sql)");
        }else{
            foreach($data as $field => $value)
            {
              $a= mysql_query("UPDATE `$table` SET `$field` = '$value' WHERE `id` = '$edit'");
            }
        }
        echo $success;
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='delete_data'){
        $id=$_POST['id'];
        $table=$_POST['table'];
        $result3 = mysql_query("DELETE FROM `$table` WHERE `id` = '$id'");
        if($table=='products'){
            delete_dir("product_data/".$id);
        }
        
        if($table=="place"){
             mysql_query("DELETE FROM `place_menu_item` WHERE `place_id` = '$id'");
             mysql_query("DELETE FROM `place_time` WHERE `place_id` = '$id'");
             $data_old=get_row('place',$id);
             if($data_old['images']!=''){
                 $fodel_img=json_decode($data_old['images']);
                 foreach($fodel_img as $imgs){
                    unlink($imgs);
                 }
             }
        }
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='autocoment'){
        $tags=$_POST['keyword'];
        $type_tags=$_POST['type_tag'];
        $result=mysql_query("SELECT DISTINCT(tag) FROM ".$type_tags."_tag WHERE tag LIKE '%$tags%'");
        while ($tag = mysql_fetch_array($result)) {
            echo '<li onclick="select_tag(\''.$tag[0].'\')">'.$tag[0].'</li>';
        }
        exit;
    }


    if(isset($_POST['function'])&&$_POST['function']=='update_userr_number_phone'){
        $user_id=$_POST['user_id'];
        $user_phone=$_POST['user_phone'];
        $lang=$_SESSION['lang'];
        $json_return=array();
        if(is_numeric ( $user_phone )&&strlen($user_phone)>8 ){
            $query_update=mysql_query("UPDATE `app_my_girl_user_$lang` SET `sdt` = '$user_phone' WHERE `id_device` = '$user_id' LIMIT 1;");
            $json_return=array('success',lang('account_update_phone_success'));
        }else{
            $json_return=array('error',lang('account_update_phone_error'));
        }
        echo json_encode($json_return);
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='box_object_account_sel_page'){
        $lang_title=$_POST['lang_title'];
        $objects=$_POST['objects'];
        $id_user=$_POST['id_user'];
        $file_templace=$_POST['file_templace'];
        $paged=$_POST['paged'];
        $url=$_POST['url'];
        show_box_object($lang_title,$objects,$id_user,$file_templace,$url,$paged);
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='account_select_menu'){
        $id_user=$_POST['id_user'];
        $files=$_POST['files'];
        include "$files";
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='account_upadate_info'){
        $user=$_SESSION['username_login'];
        $fullname=json_encode($_POST['ac_fullname'],JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        $phone=json_encode($_POST['ac_phone'],JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        $contry=$_POST['ac_contry'];
        $address=new Address;
        $address->address=$_POST['ac_address'];
        if(isset($_POST['lat'])){$address->lat=$_POST['lat'];}
        if(isset($_POST['lng'])){$address->lng=$_POST['lng'];}
        $reg_address=json_encode($address,JSON_UNESCAPED_UNICODE);

        $get_account_data=mysql_query("SELECT `data` FROM `accounts` WHERE `usernames` = '$user'");
        $get_account_data=mysql_fetch_array($get_account_data);
        $get_account_data=$get_account_data[0];
        $info=new Account_info();
        $info->sex=$_POST['sex'];
        $info->introduire=$_POST['introduction'];
        $acc=new Accoun_Data();
        if($get_account_data==''){
            $acc->info=$info;
        }else{
            $acc=(object)json_decode($get_account_data,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
            $acc->info=$info;
        }
         $acc=json_encode($acc,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        $update_query=mysql_query("UPDATE `accounts` SET  `address`='$reg_address',`fullname`='$fullname',`phone`='$phone', `data` = '$acc',`contry`='$contry' WHERE `usernames` = '$user'");
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='get_member'){
        $user=$_SESSION['username_login'];
        $data_cur_user=get_account($user);
        $get_member_data=mysql_query("SELECT  * FROM `account_friend` WHERE `user` = '$user' limit 20");
        if(mysql_num_rows($get_member_data)>0){
            ?>
            <p style="min-height: 200px;">
            <input type="text"  class="inp boxmsg_search" placeholder="<?php echo lang('tim_kiem');?>">
            <span class="boxmsg_member" onclick="select_member('<?php echo $user; ?>',this)"><img src="<?php echo thumb($data_cur_user['avatar'],'20x20');?>"/> <?php echo show_name_User($user);?></span>
            <?php
            while($member=mysql_fetch_array($get_member_data)){
            $data_member=get_account($member['friend']);
            ?>
               <span class="boxmsg_member" onclick="select_member('<?php echo $member['friend']; ?>',this)"><img src="<?php echo thumb($data_member['avatar'],'20x20');?>"/> <?php echo show_name_User($member['friend']);?></span>
            <?php
            }
            ?>
            </p>
            <?php
        }else{
            echo '<strong>'.lang('khong_co_du_lieu').'</strong>';
        }
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='select_member'){
        $user=get_account($_POST['user']);
        $position='ceo';
        include "template/field_member.php";
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='rate_object'){
        $id=$_POST['id'];
        $objects=$_POST['objects'];
        $star=$_POST['star'];
        if(isset($_SESSION['username_login'])){
            $user=$_SESSION['username_login'];
        }else{
            $user= $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
        }
        $check_rate=mysql_query("SELECT * FROM `".$objects."_rate` WHERE `".$objects."` = '$id' AND `user` = '$user'");
        if(mysql_num_rows($check_rate)>0){
            mysql_query("UPDATE `".$objects."_rate` SET `rate` = '$star' WHERE `".$objects."` = '$id' AND `user` = '$user' ");
        }else{
            mysql_query("INSERT INTO `".$objects."_rate` (`".$objects."`, `user`, `rate`) VALUES ('$id', '$user', '$star');");
            if(isset($_SESSION['username_login'])){
                $tip='act_da_danh_gia_'.$objects;
                $content=json_encode(array($objects,$star,$id));
                mysql_query("INSERT INTO `account_activity` (`type`, `content`, `user`,`wall`,`date`,`tip`) VALUES ('account', '$content', '$user','$user',NOW(),'$tip');");
            }
        }
        exit;
    }

    
    if(isset($_POST['function'])&&$_POST['function']=='login_qr'){
        $user_id=$_POST['user_id'];
        $check_login=mysql_query("SELECT * FROM `account_login` WHERE `status` = '1' AND `user_id` = '$user_id'");
        if(mysql_num_rows($check_login)>0){
            mysql_query("DELETE FROM `account_login` WHERE `user_id` = '$user_id'");
            $_SESSION['username_login']=$user_id;
            echo '1';
        }else{
            echo '0';
        }
        exit;
    }

    if(isset($_POST['function'])&&$_POST['function']=='login_admin'){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $query_login_admin=mysql_query("SELECT * FROM  carrotsy_work.`work_user` WHERE `user_name` = '$username' AND `user_pass` = '$password' LIMIT 1");
        if(mysql_num_rows($query_login_admin)>0){
            $data_login_user=mysql_fetch_array($query_login_admin);
            $user_login=new User_login();
            $user_login->id=$data_login_user['user_id'];
            $user_login->name=$username;
            $user_login->type='admin';
            $user_login->link=$url.'/admin';
            $user_login->avatar='http://work.carrotstore.com/avatar_user/'.$data_login_user['user_id'].'.png';
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
        $check_login=mysql_query("SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$user_id'");
        if(mysql_num_rows($check_login)>0){
            $query_update_user=mysql_query("UPDATE `app_my_girl_user_$lang` SET `date_cur` =NOW() , `avatar_url` = '$user_avatar' WHERE `id_device` = '$user_id' LIMIT 1;");
        }else{
            $query_add_user=mysql_query("INSERT INTO `app_my_girl_user_$lang` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `status`, `email`, `avatar_url`) VALUES ('$user_id','$user_name','0',NOW(),NOW(),0,'$user_email','$user_avatar');");
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

        $check_login=mysql_query("SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$user_id'");
        if(mysql_num_rows($check_login)>0){
            $query_update_user=mysql_query("UPDATE `app_my_girl_user_$lang` SET `date_cur` =NOW() , `avatar_url` = '$user_avatar' WHERE `id_device` = '$user_id' LIMIT 1;");
        }else{
            $query_add_user=mysql_query("INSERT INTO `app_my_girl_user_$lang` (`id_device`, `name`, `sex`, `date_start`, `date_cur`, `status`, `email`, `avatar_url`) VALUES ('$user_id','$user_name','0',NOW(),NOW(),0,'$user_email','$user_avatar');");
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
    
    if(isset($_POST['function'])&&$_POST['function']=='logout_google'){
        unset($_SESSION['username_login']);
        unset($_SESSION['admin_login']);
        unset($_SESSION['login_google']);
        exit;
    }
    
    if(isset($_POST['function'])&&$_POST['function']=='add_lyrics_music'){
        $contain=$_POST['contain'];
        $id_music=$_POST['id_music'];
        $lang=$_SESSION['lang'];
        $query_add_lyrics=mysql_query("INSERT INTO `music_contribute_lyrics` (`id_music`, `lyrics`, `lang`) VALUES ('$id_music', '$contain', '$lang');");
        if($query_add_lyrics){
            echo "1";
        }else{
            echo "0";
        }
        exit;
    }
    
    if(isset($_POST['function'])&&$_POST['function']=='create_shorten_link'){
        include "phpqrcode/qrlib.php";
        $link=$_POST['link'];
        $lang=$_SESSION['lang'];
        $user_id='';
        if(isset($_SESSION['username_login'])){
            $user_id=$_SESSION['username_login'];
        }
        $query_add_link_shorten=mysql_query("INSERT INTO `link` (`link`, `id_user`, `password`, `status`,`date`,`lang`) VALUES ('$link', '$user_id', '', '0',NOW(),'$lang');");
        $new_id_link=mysql_insert_id();
        $new_url_link=$url.'/link/'.$new_id_link;
        QRcode::png($new_url_link, 'phpqrcode/img_link/'.$new_id_link.'.png', 'L', 4, 2);
        echo '<strong style="color: slateblue;text-shadow: 1px 0px 11px #acff00;">'.$link.'</strong><br/>';
        echo '<img src="'.$url.'/phpqrcode/img_link/'.$new_id_link.'.png"/><br/>';
        echo '<input type="text" class="inp_link_show" value="'.$new_url_link.'" /><br/>';
        echo '<a href="" class="buttonPro light_blue large" onClick="copyTextToClipboard(\''.$new_url_linkk.'\');return false;"><i class="fa fa-clipboard" aria-hidden="true" ></i> '.lang('copy').'</a>';
        echo '<a href="'.$url.'/phpqrcode/img_link/'.$new_id_link.'.png" target="_blank" class="buttonPro light_blue large"><i class="fa fa-floppy-o" aria-hidden="true"></i> '.lang('save_img').' (QR)</a>';
        echo '<a href="'.$url.'/l/'.$new_id_link.'" target="_blank" class="buttonPro light_blue large"><i class="fa fa-external-link-square" aria-hidden="true"></i> '.lang('shorten_link_detail').'</a>';
        echo show_share($new_url_link.'/'.$lang);
        exit;
    }
    
}
?>