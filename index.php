<?php
ini_set('upload_max_filesize', '90M');
ini_set('post_max_size', '90M');
ini_set('max_input_time', 900);
ini_set('max_execution_time', 900);

header('Content-type: text/html; charset=utf-8');

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

$protocol = $_SERVER['PROTOCOL'] = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http';
if ($protocol == 'https') {
    include "config_https.php";
} else {
    include "config.php";
}

require_once('phpmailer/class.phpmailer.php');
if (isset($_GET['view_product']) || isset($_GET['sub_view'])) {
} else {
    include 'bbit-compress.php';
}


if (isset($_POST['key_contry'])) {
    $_SESSION['lang'] = $_POST['key_contry'];
    $url_cur = $_POST['urls'];
    unset($_SESSION['username_login']);
    unset($_SESSION['login_google']);
    unset($_SESSION['admin_login']);
    header("Location: $url_cur");
}
include "database.php";

$lang='en';
if (isset($_SESSION['lang'])) {
    $lang=$_SESSION['lang'];
} else {
    $k = ip_visitor_country();
    $query_key_country = mysql_query("SELECT `key` FROM `app_my_girl_country` WHERE `country_code` = '$k' LIMIT 1");
    if (mysql_num_rows($query_key_country)) {
        $data_key_country = mysql_fetch_array($query_key_country);
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
    <a href="<?php echo $url; ?>"><img alt="Store Carrot" src="<?php echo $url; ?>/images/logo.png" id="logo"/></a>
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
        <input type="text" placeholder="<?php echo lang('tip_search'); ?>" onchange="search_product(this.value)"
               name="search" class="inp" id="inp_search"/>
        <!--<button class="btn"><?php echo $icon_search; ?></button>--!>
        <span id="proccess" style="display: none;float: left;"> <?php echo lang('dang_xu_ly'); ?></span>
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

    <form action="<?php echo $url; ?>/index.php" method="post" id="form_lang">
        <img style="width: 20px;float: left;" alt="<?php echo $_SESSION['lang']; ?>"
             src="<?php echo $url . '/thumb.php?src=' . $url . '/app_mygirl/img/' . $_SESSION['lang'] . '.png&size=20x20&trim=1'; ?>"/>
        <label for="key_contry" onclick="show_box_select_lang();"> <?php echo lang('ngon_ngu_hien_thi'); ?>:</label>
        <select id="key_contry" name="key_contry" class="inp" onchange="change_lang()">
            <?php
            $result = mysql_query("SELECT `key`,`name` FROM `app_my_girl_country` WHERE `active` = '1' AND `ver0`='1'", $link);
            while ($row = mysql_fetch_array($result)) {
                ?>
                <option value="<?php echo $row['key']; ?>" <?php if ($_SESSION['lang'] == $row['key']) {
                    echo 'selected="true"';
                } ?> ><?php echo $row['name']; ?></option>
                <?php
            }
            ?>
        </select>
        <input type="hidden" value="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" name="urls"/>
    </form>
    <script>
        function change_lang() {
            $('#form_lang').submit();
        }
    </script>


    <a id="add_company" href="https://www.paypal.me/kurotsmile" target="_blank"
       title="<?php echo lang('chu_thich_ung_ho'); ?>">
        <i class="fa fa-heart-o fa-3x" style="float: left;margin-right: 10px;" aria-hidden="true"></i>
        <strong style="font-size: 15px;width: 100px;"><?php echo lang('ung_ho'); ?></strong><br/>
        <span><?php echo lang('ung_ho_tip'); ?></span>
    </a>


    <!-- Carrotstore - header -->
    <div id="sell_product" style="width: auto;padding: 0px;margin: 0px;;margin-top: 7px;background: none;">
        <ins class="adsbygoogle"
             style="display:inline-block;width:300px;height:50px"
             data-ad-client="ca-pub-5388516931803092"
             data-ad-slot="5904401947"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>

    <div id="bar_menu">
        <a href="<?php echo $url; ?>/products" <?php if ($page_file == "page_view.php") {
            echo 'class="active"';
        } ?>><?php echo lang('mua_sp'); ?></a>
        <a href="<?php echo $url; ?>/member" <?php if ($page_file == "page_member.php") {
            echo 'class="active"';
        } ?>><?php echo lang('luu_tru_lien_he'); ?></a>
        <a href="<?php echo $url; ?>/music" <?php if ($page_file == "page_music.php") {
            echo 'class="active"';
        } ?>><?php echo lang('am_nhac_cho_cuoc_song'); ?></a>
        <a href="<?php echo $url; ?>/quote" <?php if ($page_file == "page_quote.php") {
            echo 'class="active"';
        } ?>><?php echo lang('trich_dan'); ?></a>
        <a href="<?php echo $url; ?>/link" <?php if ($page_file == "page_shortened_link.php" || $page_file == "page_shortened_link_manager.php" || $page_file == "page_shortened_link_detail.php") {
            echo 'class="active"';
        } ?>><?php echo lang('rut_gon_link'); ?></a>
        <a href="<?php echo $url; ?>/privacy_policy" <?php if ($page_file == "page_privacy_policy.php") {
            echo 'class="active"';
        } ?>><?php echo lang('gioi_thieu'); ?></a>

        <?php
        if(isset($user_login)){
            //echo var_dump($user_login);
            echo '<a style="float: right;margin-right: 5px;"  onclick="logout_account();return false"><i class="fa fa-sign-out" aria-hidden="true"></i></a> ';
            echo '<a  href="'.$user_login->link.'" style="float:right;padding:0px"><img  style="float: right;margin-right: 5px;margin-top:5px" class="login_avatar" alt="User Avatar" src="'.$user_login->avatar.'"/></a>';
            echo '<a style="float: right;margin-right: 5px;" href="'.$user_login->link.'">'.$user_login->name.'</a>';
        }else{
            echo '<a  style="float: right;margin-right: 5px;" onclick="login_account();"  oncontextmenu="login_admin();return false;"><i class="fa fa-sign-in" aria-hidden="true"></i> '.lang('dang_nhap').'</a> ';
        }
        ?>
        <a id="show_history" style="float: right;margin-right: 5px;"
           href="<?php echo $url; ?>/index.php?page_view=page_history.php" <?php if ($page_file == "page_history.php") {
            echo 'class="active"';
        } ?>><i class="fa fa-history"></i></a>
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
    <strong style="font-size: 15px;width: 100px;"><?php echo lang('dang_xu_ly'); ?></strong><br/>
    <span><?php echo lang('dang_lay_du_lieu'); ?></span>
    <span id="loading-page"></span>
</div>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v6.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="232297850844551"
     theme_color="#67b868"
     logged_in_greeting="<?php echo lang('message_tip'); ?>"
     logged_out_greeting="<?php echo lang('message_tip'); ?>"
>
</div>

<script>
    var URL = '<?php echo $url;?>';
</script>
<?php
include "script_all_page.php";
?>
</body>
</html>
<?php
mysql_close($link);
?>
