<?php
$id_user = $_GET['user'];

if (!isset($data_user)) {
    ?>
    <div id="containt" style="width: 100%;float: left;text-align: center;">
        <p style="float: left;width: 100%;margin-top: 40px;">
            <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br/>
            <span style="margin-top: 10px;">
        <?php echo lang('not_account'); ?>
        </span>
            <br/>
            <br/>
            <a class="buttonPro" href="<?php echo $url; ?>/member"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang('back_list_account'); ?>
            </a>
        </p>
    </div>
    <?php
    exit;
}
include "phpqrcode/qrlib.php";

$sdt = $data_user['sdt'];
$name_account = $data_user['name'];
$address_account = $data_user['address'];
$url_cur_page = $url . '/user/' . $id_user . '/' . $lang;

include_once "page_member_header_account.php";
?>

    <style>
        .track-details:before {
            content: '';
        }
    </style>


    <div id="post_product">
        <?php
        if (isset($user_login)) {
            if($user_login->id==$id_user&&$sdt=='') {
                ?>
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <div style="background-color: #3fc73d;padding: 13px;color: white;" id="box_update_phone">
                    <strong><i class="fa fa-phone-square" aria-hidden="true"></i> <?php echo lang('account_update_phone');?></strong>
                    <br/><br/>
                    <i><?php echo lang('account_update_phone_tip');?></i>
                    <input type="text" name="user_phone" id="user_phone" class="inp" style="width: 80%;margin: 3px;margin-bottom: 8px;"><br>
                    <span class="buttonPro black" onclick="update_number_phone();"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo lang('hoan_tat');?></span>
                </div>
                <script>
                    $(document).ready(function(){
                        $("#box_update_phone").effect("shake");
                    });

                    function update_number_phone(){
                        var user_phone=$("#user_phone").val();
                        swal("<?php echo lang('account_update_phone');?>","<?php echo lang('dang_xu_ly');?>");
                        $.ajax({
                            url: "<?php echo $url;?>/index.php",
                            type: "post",
                            data: "function=update_userr_number_phone&user_id=<?php echo $id_user;?>&user_phone="+user_phone,
                            success: function (data, textStatus, jqXHR) {
                                var obj_data = JSON.parse(data);
                                swal("<?php echo lang('account_update_phone');?>", obj_data[1], obj_data[0]);
                                if(obj_data[0]=='success'){
                                    $('#box_update_phone').hide();
                                }
                            }
                        });
                    }
                </script>
                <?php
            }
        }
        ?>
        <div id="box-account-content" style="width:100%;float: left;">

            <ul style="float: left;">
                <li><strong><i class="fa fa-user"></i> <?php echo lang('ten_day_du'); ?> :</strong> <?php echo $data_user['name']; ?></li>
                <?php if ($sdt != '') { ?><li><strong><i class="fa fa-phone-square"></i> <?php echo lang('so_dien_thoai'); ?> :</strong> <?php echo $sdt; ?></li><?php } ?>
                <li>
                    <strong><i class="fa fa-globe" aria-hidden="true"></i> <?php echo lang('quoc_gia'); ?>:</strong>
                    <img style="height: 14px;"  src="<?php echo $url . '/app_mygirl/img/' . $lang . '.png'; ?>"/> <?php echo $lang; ?>
                </li>
                <li><strong><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo lang('date_start'); ?> :</strong></strong> <?php echo $data_user['date_start']; ?></li>
                <li><strong><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo lang('date_cur'); ?> :</strong> <?php echo $data_user['date_cur']; ?></li>
                <li><strong><i class="fa fa-venus-mars" aria-hidden="true"></i> <?php echo lang('gioi_tinh'); ?> :</strong> <?php echo lang("sex_" . $data_user['sex']); ?></li>
                <li><strong><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo 'Email'; ?> :</strong> <?php echo  $data_user['email']; ?></li>
                <li><strong><i class="fa fa-id-badge" aria-hidden="true"></i> ID
                        carrot:</strong> <?php echo $data_user['id_device'] ?><br/>
                    <?php
                    QRcode::png($url_cur_page, 'phpqrcode/img_account/' . $id_user . '_' . $lang_sel . '.png', 'M', 4, 2);
                    ?>
                    <img src="<?php echo $url; ?>/phpqrcode/img_account/<?php echo $id_user; ?>_<?php echo $lang_sel; ?>.png" style="margin: 2px;"/>
                </li>
                <?php
                if($is_me){
                    echo '<li><a class="buttonPro small yellow" href="'.$url.'/user_edit/'.$id_user.'/'.$lang.'"><i class="fa fa-wrench" aria-hidden="true"></i> '.lang('chinh_sua_thong_tin').'</a></li>';
                }
                ?>
                <?php if ($address_account != '') { ?>
                    <li><strong><i class="fa fa-map-marker"></i> <?php echo lang('dia_chi'); ?>
                        :</strong> <?php echo $address_account; ?></li><?php } ?>
                <?php
                $contact_query = mysql_query("SELECT `data` FROM carrotsy_contacts.`user_field_data` WHERE `id_device` = '" . $id_user . "' LIMIT 1");
                if (mysql_num_rows($contact_query)) {
                    $data_contact = mysql_fetch_array($contact_query);
                    $data_contact = $data_contact['data'];
                    $data_contact = json_decode($data_contact);
                    foreach ($data_contact as $k => $v) {
                        echo '<li><b>' . $k . ':</b> ' . $v . '</li>';
                    }
                }
                ?>
            </ul>
            <?php if ($address_account != '') { ?>
                <iframe width="100%" height="310" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=<?php echo $address_account; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <?php } ?>
        </div>
        <?php echo show_share($url_cur_page); ?>

        <?php
        $check_music_data = mysql_query("SELECT `id_chat`,`value` FROM `app_my_girl_music_data_$lang_sel` WHERE `device_id` = '$id_user' LIMIT 10");
        if (mysql_num_rows($check_music_data)) {
            ?>
            <div style="width: 100%;float: left;">
                <h3><i class="fa fa-music" aria-hidden="true"></i> <?php echo lang('gu_am_nhac') ?></h3>
                <?php
                $arr_icon_face = array('<i  class="fa fa-smile-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-frown-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-meh-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-smile-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-smile-o" aria-hidden="true"></i>');
                while ($row_histore_music = mysql_fetch_array($check_music_data)) {
                    $id_music = $row_histore_music['id_chat'];
                    $query_music = mysql_query("SELECT `chat` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `id`='$id_music' LIMIT 1");
                    $data_music = mysql_fetch_array($query_music);
                    ?>
                    <a style="display: block;"
                       href="<?php echo $url; ?>/music/<?php echo $id_music; ?>/<?php echo $lang_sel; ?>"
                       class="track-details">
                        <i class="fa fa-headphones" aria-hidden="true"></i> <?php echo $data_music['chat']; ?>
                        <em><?php echo $arr_icon_face[intval($row_histore_music['value'])] ?></em>
                    </a>
                    <?php
                }
                ?>
            </div>
        <?php } ?>

        <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts"
                scrolling="no" frameborder="0"
                style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;">
        </iframe>

    </div>

    <div id="sidebar_product">
        <h3><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo lang('lien_he_cung_ten'); ?></h3>
        <?php
        $list_contact_same_name = mysql_query("SELECT `id_device`,`name`,`sdt` FROM `app_my_girl_user_$lang` WHERE MATCH (`name`) AGAINST ('$name_account') AND `sdt` !='' AND `id_device`!='$id_user'  LIMIT 10");
        while ($row_contact = mysql_fetch_array($list_contact_same_name)) {
            ?>
            <a style="width: 100%;display: block;"
               href="<?php echo $url; ?>/user/<?php echo $row_contact['id_device']; ?>/<?php echo $lang; ?>"
               class="track-details">
                <i class="fa fa-user" aria-hidden="true"></i> <?php echo $row_contact['name']; ?>
                <em><?php echo $row_contact['sdt']; ?></em>
            </a>
            <?php
        }
        ?>
        <br/>

        <?php if ($sdt != '') { ?>
            <h3><i class="fa fa-plug" aria-hidden="true"></i> <?php echo lang('lien_he_lien_quan'); ?></h3>
            <?php
            $list_contact_same_phone = mysql_query("SELECT * FROM `app_my_girl_user_$lang` WHERE `sdt`= '$sdt'  LIMIT 10");
            while ($row_contact = mysql_fetch_array($list_contact_same_phone)) {
                ?>
                <a style="width: 100%;display: block;"
                   href="<?php echo $url; ?>/user/<?php echo $row_contact['id_device']; ?>/<?php echo $lang; ?>"
                   class="track-details">
                    <i class="fa fa-user" aria-hidden="true"></i> <?php echo $row_contact['name']; ?>
                    <em><?php echo $row_contact['sdt']; ?></em>
                </a>
                <?php
            }
            ?>
            <br/>
        <?php } ?>

        <?php
        echo show_box_ads_page('contact_page');
        ?>

        <?php
        if(get_setting('show_ads')=='1') {
        ?>
        <ins class="adsbygoogle" style="display:inline-block;width:300px;height:300px" data-ad-client="ca-pub-5388516931803092" data-ad-slot="5771636042"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            var arr_id_user = [];
        </script>
        <?php }?>

    </div>

<?php
$list_contact_same_name = mysql_query("SELECT id_device,name,sex,sdt,address,avatar_url FROM `app_my_girl_user_$lang` WHERE MATCH (`name`) AGAINST ('$name_account') AND `sdt` !='' AND `id_device`!='$id_user' AND `status`='0' ORDER BY RAND()  LIMIT 10");
if (mysql_num_rows($list_contact_same_name) > 0) {
    ?>
    <div style="float: left;width: 100%;">
        <h2 style="padding-left: 30px;"><?php echo lang('lien_he_cung_ten'); ?></h2>
        <?php
        while ($row = mysql_fetch_array($list_contact_same_name)) {
            include "page_member_view_git.php";
        }
        ?>
    </div>
<?php } ?>