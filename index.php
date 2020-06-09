<?php
ini_set('upload_max_filesize', '90M');
ini_set('post_max_size', '90M');
ini_set('max_input_time', 900);
ini_set('max_execution_time', 900);

header('Content-type: text/html; charset=utf-8');

ob_start("ob_gzhandler");
session_start();

function ip_visitor_country()
{
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];
    $country = "us";

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $ip_data_in = curl_exec($ch); // string
    curl_close($ch);

    $ip_data = json_decode($ip_data_in, true);
    $ip_data = str_replace('&quot;', '"', $ip_data); // for PHP 5.2 see stackoverflow.com/questions/3110487/

    if ($ip_data && $ip_data['geoplugin_countryCode'] != null) {
        $country = strtoupper($ip_data['geoplugin_countryCode']);
    } else {
        $country = 'us';
    }

    return $country;
}


include "config.php";

if (isset($_GET['view_product']) || isset($_GET['sub_view'])) {
} else {
    include 'bbit-compress.php';
}

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
$style_css_dark_mode='0';

if (isset($_SESSION['lang'])) {
    $lang=$_SESSION['lang'];
} else {
    $k = ip_visitor_country();
    $query_key_country = mysqli_query($link,"SELECT `key` FROM `app_my_girl_country` WHERE `country_code` = '$k' LIMIT 1");
    if (mysqli_num_rows($query_key_country)) {
        $data_key_country = mysqli_fetch_array($query_key_country);
        $_SESSION['lang'] = $data_key_country['key'];
    } else {
        $_SESSION['lang'] = 'en';
    }
    $lang=$_SESSION['lang'];
}

if(isset($_SESSION['style_css_dark_mode'])){
    $style_css_dark_mode=$_SESSION['style_css_dark_mode'];
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
    <a href="<?php echo $url; ?>"><img alt="Store Carrot" src="<?php echo $url; ?>/images/logo.png" id="logo" class="url_carrot"/></a>
    <?php
    $type = 'products';
    $icon_search = '<i class="fa fa-product-hunt" aria-hidden="true"></i>';

    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_music.php") {
        $type = 'music';
        $icon_search = '<i class="fa fa-music" aria-hidden="true"></i>';
    }

    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_quote.php") {
        $type = 'quote';
        $icon_search = '<i class="fa fa-quote-left" aria-hidden="true"></i>';
    }

    if (isset($_GET['page_view']) && $_GET['page_view'] == "page_member.php") {
        $type = 'accounts';
        $icon_search = '<i class="fa fa-users" aria-hidden="true"></i>';
    }
    ?>
    <div class="" id="tool_search">
        <input type="text" placeholder="<?php echo lang($link,'tip_search'); ?>" onchange="search_product(this.value)"
               name="search" class="inp" id="inp_search"/>
        <span id="proccess" style="display: none;float: left;"> <?php echo lang($link,'dang_xu_ly'); ?></span>
    </div>

    <script>
        function search_product(key_search) {
            $('#proccess').show();
            $("#inp_search").prop('disabled', true);
            $.ajax({
                url: "<?php echo $url; ?>/index.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=search_product&key=" + key_search + "&type=<?php echo $type ?>", //tham số truyền vào
                success: function (data, textStatus, jqXHR) {
                    $("#inp_search").prop('disabled', false);
                    $('#containt').html(data);
                    $('#proccess').hide();
                    $('#proccess').css('display', 'none');
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
        <img style="width: 39px;float: left;" alt="<?php echo $_SESSION['lang']; ?>"  src="<?php echo $url.'/thumb.php?src='.$url.'/app_mygirl/img/'.$lang.'.png&size=39x39&trim=1'; ?>"/>
        <strong style="font-size: 15px;width: 100px;"><?php echo $data_name_country['name']; ?></strong><br/>
        <span  style="font-size: 70%;"><?php echo lang($link,'ngon_ngu_hien_thi'); ?></span>
    </div>

    <a id="add_company" href="https://www.paypal.me/kurotsmile" target="_blank" title="<?php echo lang($link,'chu_thich_ung_ho'); ?>">
        <i class="fa fa-heart-o fa-3x" style="float: left;margin-right: 10px;" aria-hidden="true"></i>
        <strong style="font-size: 15px;width: 100px;"><?php echo lang($link,'ung_ho'); ?></strong><br/>
        <span><?php echo lang($link,'ung_ho_tip'); ?></span>
    </a>
    

    <div id="bar_menu">
        <a href="<?php echo $url; ?>/products" <?php if ($page_file == "page_view.php") { echo 'class="active"';} ?>><?php echo lang($link,'mua_sp'); ?></a>
        <a href="<?php echo $url; ?>/member" <?php if ($page_file == "page_member.php") { echo 'class="active"';} ?>><?php echo lang($link,'luu_tru_lien_he'); ?></a>
        <a href="<?php echo $url; ?>/music" <?php if ($page_file == "page_music.php") { echo 'class="active"';} ?>><?php echo lang($link,'am_nhac_cho_cuoc_song'); ?></a>
        <a href="<?php echo $url; ?>/quote" <?php if ($page_file == "page_quote.php") { echo 'class="active"';} ?>><?php echo lang($link,'trich_dan'); ?></a>
        <a href="<?php echo $url; ?>/link" <?php if ($page_file == "page_shortened_link.php" || $page_file == "page_shortened_link_manager.php" || $page_file == "page_shortened_link_detail.php") { echo 'class="active"';} ?>><?php echo lang($link,'rut_gon_link'); ?></a>
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
        }else{
            echo '<a id="btn_login_acc" style="float: right;margin-right: 5px;" onclick="login_account();"  oncontextmenu="login_admin();return false;"><i class="fa fa-sign-in" aria-hidden="true"></i> '.lang($link,'dang_nhap').'</a> ';
        }
        ?>
        <a id="btn_dark_mode" href="#" class="ajax_tip" ajax_data='{"function":"show_tip_dark_mode"}' onclick="style_dark_mode();return false;"><?php if($style_css_dark_mode=='0'){ echo '<i class="fa fa-moon-o" aria-hidden="true"></i>'; }else{ echo '<i class="fa fa-sun-o" aria-hidden="true"></i>'; } ?></a>
        <a onclick="show_menu_mobile();" id="btn_menu_mobile"><i class="fa fa-bars" aria-hidden="true"></i></a>
    </div>
</div>

<div style="float: left;width: 100%;">
    <script>
        var arr_id_product = [];
    </script>
    <?php
    include $page_file;
    ?>
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
