<?php
ini_set('upload_max_filesize', '90M');
ini_set('post_max_size', '90M');
ini_set('max_input_time', 900);
ini_set('max_execution_time', 900);

ob_start();
session_start();

include "config.php";

include 'bbit-compress.php';

if (isset($_POST['key_contry'])||isset($_GET['key_contry'])) {
    if(isset($_POST['key_contry'])){ $_SESSION['lang'] = $_POST['key_contry'];}
    if(isset($_GET['key_contry'])){ $_SESSION['lang'] = $_GET['key_contry'];}
    if(isset($_POST['urls'])){ $url_cur = $_POST['urls'];}
    if(isset($_GET['urls'])){ $url_cur = $_GET['urls'];}
    unset($_SESSION['user_login']);
    unset($user_login);
    header("Location: $url_cur");
}

include "database.php";

$lang='en';
$style_css_dark_mode='0'; if(isset($_SESSION['style_css_dark_mode'])) $style_css_dark_mode=$_SESSION['style_css_dark_mode'];
$search_type='1';if(isset($_SESSION['search_type'])) $search_type=$_SESSION['search_type'];
$search_data='0';if(isset($_SESSION['search_data'])) $search_data=$_SESSION['search_data'];

function ip_visitor_country()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){$ip=$_SERVER['HTTP_CLIENT_IP'];}
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];}
    else{$ip=$_SERVER['REMOTE_ADDR'];}

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=$ip");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch);
    curl_close($ch);

    $ip_data = json_decode($ip_data_in, true);
    $ip_data = str_replace('&quot;', '"', $ip_data);

    if ($ip_data && $ip_data['geoplugin_countryCode'] != null) {
        $ip_data["lang"]=strtolower($ip_data['geoplugin_countryCode']);
    } else {
        $ip_data["lang"]='us';
    }
    return $ip_data;
}
$data_ip = ip_visitor_country();

if (isset($_SESSION['lang'])) {
    $lang=$_SESSION['lang'];
} else {
    $k=$data_ip['lang'];
    $query_key_country = mysqli_query($link,"SELECT `key` FROM `app_my_girl_country` WHERE `country_code` = '$k' LIMIT 1");
    if (mysqli_num_rows($query_key_country)) {
        $data_key_country = mysqli_fetch_array($query_key_country);
        $_SESSION['lang'] = $data_key_country['key'];
    } else {
        $_SESSION['lang'] = 'en';
    }
    $lang=$_SESSION['lang'];
}

include "function.php";

if(isset($_SESSION['user_login'])) {
    $user_login=json_decode($_SESSION['user_login']);
}

include "json/json.php";
include "json/json2.php";

$page_file = "page_view.php";
if(isset($_GET['page_view'])) {
    $page_file = $_GET['page_view'];
}

$error = '';
if (isset($_POST['logout'])) {
    unset($_SESSION['username_login']);
    unset($_SESSION['login_google']);
    unset($_SESSION['admin_login']);
    $url_cur = $_POST['urls'];
    header("Location: $url_cur");
}

include "header.php";
?>

<div id="header">
    <a href="<?php echo $url; ?>"><img alt="Store Carrot" src="<?php echo $url; ?>/images/logo.png" id="logo" width="120" height="56" class="url_carrot"/></a>
    <?php
    $type_obj='products';
    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_music.php") {$type_obj='music';}
    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_quote.php") {$type_obj='quote';}
    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_member.php") {$type_obj='accounts';}
    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_piano.php") {$type_obj='piano';}
    ?>
    <div id="tool_search">
        <i class="fa fa-search tool_search_icon" onclick="show_setting_search();" aria-hidden="true" id="tool_search_icon"></i>
        <div id="interim_recognition"><?php echo lang($link,"recognition_inp");?></div>
        <input type="text" placeholder="<?php echo lang($link,'tip_search'); ?> " onchange="search_product(this.value)" name="search" class="inp" id="inp_search"/>
        <i class="fa fa-microphone tool_search_mic_icon" aria-hidden="true" id="tool_search_mic_icon" onclick="start_recognition();"></i>
        <span id="proccess" style="display: none;float: left;"> <?php echo lang($link,'dang_xu_ly'); ?></span>
    </div>

    <script>
        function search_product(key_search) {
            $('#proccess').show();
            $("#inp_search").prop('disabled', true);
            $("#inp_search").hide();
            $("#tool_search_mic_icon").hide();
            $("#tool_search_icon").removeClass("fa-search").addClass("fa-spinner");
            $.ajax({
                url: "<?php echo $url; ?>/index.php",
                type: "post",
                data: "function=search_product&key=" + key_search + "&type=<?php echo $type_obj;?>",
                success: function (data, textStatus, jqXHR) {
                    $("#inp_search").prop('disabled', false);
                    $('#containt').html(data);
                    $('#proccess').hide();
                    $('#proccess').css('display', 'none');
                    $("#inp_search").show();
                    $("#tool_search_mic_icon").show();
                    $("#tool_search_icon").removeClass("fa-spinner").addClass("fa-search");
                }
            });
        }

        $('#inp_search').keypress(function (event) {
            var txt_inp = $("#inp_search").val();
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                search_product(txt_inp);
            }
            event.stopPropagation();
        });
    </script>

    <div id="add_company" onclick="show_box_select_lang();">
        <?php
        $query_name_country=mysqli_query($link,"SELECT `name` FROM `app_my_girl_country` WHERE `key`='$lang' LIMIT 1");
        $data_name_country=mysqli_fetch_assoc($query_name_country);
        ?>
        <img style="width: 39px;float: left;" alt="<?php echo $_SESSION['lang']; ?>"  width="39" height="39" src="<?php echo $url.'/thumb.php?src='.$url.'/app_mygirl/img/'.$lang.'.png&size=39x39&trim=1'; ?>"/>
        <strong style="font-size: 15px;width: 100px;"><?php echo $data_name_country['name']; ?></strong><br/>
        <span style="font-size: 70%;"><?php echo lang($link,'ngon_ngu_hien_thi'); ?></span>
    </div>

    <a id="add_company" href="https://www.paypal.me/kurotsmile" target="_blank" title="<?php echo lang($link,'chu_thich_ung_ho'); ?>">
        <i class="fa fa-heart fa-3x" style="float: left;margin-right: 10px;" aria-hidden="true"></i>
        <strong style="font-size: 15px;width: 100px;"><?php echo lang($link,'ung_ho'); ?></strong><br/>
        <span style="font-size: 70%;"><?php echo lang($link,'ung_ho_tip'); ?></span>
    </a>
    

    <div id="bar_menu">
        <a href="<?php echo $url; ?>/products" <?php if ($page_file == "page_view.php") { echo 'class="active"';} ?>><?php echo lang($link,'mua_sp'); ?></a>
        <a href="<?php echo $url; ?>/member" <?php if ($page_file == "page_member.php") { echo 'class="active"';} ?>><?php echo lang($link,'luu_tru_lien_he'); ?></a>
        <a href="<?php echo $url; ?>/music" <?php if ($page_file == "page_music.php") { echo 'class="active"';} ?>><?php echo lang($link,'am_nhac_cho_cuoc_song'); ?></a>
        <a href="<?php echo $url; ?>/quote" <?php if ($page_file == "page_quote.php") { echo 'class="active"';} ?>><?php echo lang($link,'trich_dan'); ?></a>
        <a href="<?php echo $url; ?>/piano" <?php if ($page_file == "page_piano.php") { echo 'class="active"';} ?>><?php echo lang($link,'hoc_dan_piano'); ?></a>
        <a href="<?php echo $url; ?>/privacy_policy" <?php if ($page_file == "page_privacy_policy.php") { echo 'class="active"';} ?>><?php echo lang($link,'gioi_thieu'); ?></a>
        
        <?php
        if(isset($user_login)){
            echo '<a style="float: right;margin-right: 5px;"  onclick="logout_account();return false"><i class="fa fa-sign-out" aria-hidden="true"></i></a> ';
            echo '<a  href="'.$user_login->link.'" style="float:right;padding:0px"><img  style="float: right;margin-right: 5px;margin-top:5px" class="login_avatar" alt="User Avatar" src="'.$user_login->avatar.'"/></a>';
            echo '<a style="float: right;margin-right: 5px;" href="'.$user_login->link.'">'.$user_login->name.'</a>';
            $query_playlist_music=mysqli_query($link,"SELECT COUNT(`id`) FROM carrotsy_music.`playlist_".$user_login->lang."` WHERE `user_id`='".$user_login->id."' LIMIT 1");
            $count_playlist=mysqli_fetch_array($query_playlist_music);
            $count_playlist=$count_playlist[0];
            if($count_playlist>0) {
                echo '<a style="float: right;margin-right: 5px;"  onclick="show_all_playlist();return false"><i class="fa fa-music" aria-hidden="true"></i></a> ';
            }
            
            if($user_login->email!=''){
                $user_login_email=$user_login->email;
                $query_check_order=mysqli_query($link,"SELECT COUNT(`id_order`) as c FROM `order` WHERE `pay_mail` = '$user_login_email' LIMIT 1");
                $count_order=mysqli_fetch_assoc($query_check_order);
                $count_order=$count_order['c'];
                if($count_order>0){
                    echo '<a style="float: right;margin-right: 5px;" href="'.$url.'/order" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> ';
                }
            }
        }else{
            echo '<a id="btn_login_acc" style="float: right;margin-right: 5px;" onclick="login_account();"  oncontextmenu="login_admin();return false;"><i class="fa fa-sign-in" aria-hidden="true"></i> '.lang($link,'dang_nhap').'</a> ';
        }
        ?>
        <a id="btn_dark_mode" href="#" class="ajax_tip" ajax_data='{"function":"show_tip_dark_mode"}' onclick="style_dark_mode();return false;"><?php if($style_css_dark_mode=='0'){ echo '<i class="fa fa-moon-o" aria-hidden="true"></i>'; }else{ echo '<i class="fa fa-sun-o" aria-hidden="true"></i>'; } ?></a>
        <a onclick="show_menu_mobile();" id="btn_menu_mobile"><i class="fa fa-bars" aria-hidden="true"></i></a>
    </div>
</div>

<div style="float: left;width: 100%;">
    <?php include $page_file; ?>
</div>

<div id="go_top" onclick="go_top()">
    <i class="fa fa-angle-double-up fa-3x"></i>
</div>

<div id="loading">
    <i class="fa fa-refresh fa-spin fa-3x" style="float: left;margin-right: 10px;"></i>
    <strong style="font-size: 15px;width: 100px;"><?php echo lang($link,'dang_xu_ly'); ?></strong><br/>
    <span><?php echo lang($link,'dang_lay_du_lieu'); ?></span>
    <span id="loading-page"></span>
</div>

<?php if(get_setting($link,'fb_message')=='1') { ?>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {FB.init({xfbml: true,version: 'v6.0'});};
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="fb-customerchat" attribution=setup_tool page_id="232297850844551" theme_color="#67b868" logged_in_greeting="<?php echo lang($link,'message_tip'); ?>" logged_out_greeting="<?php echo lang($link,'message_tip'); ?>"></div>
<?php }?>
<script>
    var URL = '<?php echo $url;?>';
</script>

<?php
include "script_all_page.php";
?>
</body>
</html>
<?php
mysqli_close($link);
?>
