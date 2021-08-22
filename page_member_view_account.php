<?php
$id_user = $_GET['user'];
$sex_content=0;
if(isset($_GET['sex_content'])){ $sex_content=$_GET['sex_content'];}
if (!isset($data_user)){
    ?>
    <div id="containt" style="width: 100%;float: left;text-align: center;">
        <p style="float: left;width: 100%;margin-top: 40px;">
            <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br/>
            <span style="margin-top: 10px;">
        <?php echo lang($link,'not_account'); ?>
        </span>
            <br/>
            <br/>
            <a class="buttonPro" href="<?php echo $url; ?>/member"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,'back_list_account'); ?>
            </a>
        </p>
    </div>
    <?php
}elseif($data_user['status']=='2'&&$sex_content=='0'){ 
        ?>
        <div id="containt" style="width: 100%;float: left;text-align: center;">
            <p style="float: left;width: 100%;margin-top: 40px;">
                <i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br/>
                <b style="margin-top: 10px;"><?php echo lang($link,'warning');?></b>
                <p><?php echo lang($link,'account_view_18');?></p>
                <br/>
                <a class="buttonPro green" href="#" onclick="window.location.replace('<?php echo $url; ?>/user/<?php echo $id_user;?>/<?php echo $lang;?>&sex_content=1');"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo lang($link,'account_view_yes');?></a><br/>
                <a class="buttonPro red" href="<?php echo $url; ?>/member"><i class="fa fa-times-circle" aria-hidden="true"></i> <?php echo lang($link,'account_view_no');?></a>
                </a>
            </p>
        </div>
        <?php
}else{

include "phpqrcode/qrlib.php";

$sdt = $data_user['sdt'];
$name_account = $data_user['name'];
$address_account = $data_user['address'];
$url_cur_page = $url.'/user/'.$id_user.'/'.$lang;

include_once "page_member_header_account.php";

$array_contact_same_name=array();
$list_contact_same_name = mysqli_query($link,"SELECT id_device,name,sex,sdt,address,avatar_url FROM `app_my_girl_user_$lang` WHERE MATCH (`name`) AGAINST ('$name_account') AND `sdt` !='' AND `id_device`!='$id_user' AND `status`='0' ORDER BY RAND()  LIMIT 10");
if($list_contact_same_name){
    while ($row_contact_same=mysqli_fetch_assoc($list_contact_same_name)){
        array_push($array_contact_same_name,$row_contact_same);
    }
}
?>
    <div id="post_product">

        <div id="box-account-content" style="width:100%;float: left;">

            <ul id="list_info_contact">
                <li><strong><i class="fa fa-user"></i> <?php echo lang($link,'ten_day_du'); ?> :</strong> <?php echo $data_user['name']; ?></li>
                <?php if ($sdt != '') { ?><li><strong><i class="fa fa-phone-square"></i> <?php echo lang($link,'so_dien_thoai'); ?> :</strong> <a href="tel://<?php echo $sdt; ?>"><?php echo $sdt; ?></a></li><?php } ?>
                <li>
                    <strong><i class="fa fa-globe" aria-hidden="true"></i> <?php echo lang($link,'quoc_gia'); ?>:</strong>
                    <img style="height: 14px;"  src="<?php echo $url.'/app_mygirl/img/'.$lang.'.png'; ?>"/> <?php echo $lang; ?>
                </li>
                <li><strong><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo lang($link,'date_start'); ?> :</strong></strong> <?php echo $data_user['date_start']; ?></li>
                <li><strong><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo lang($link,'date_cur'); ?> :</strong> <?php echo $data_user['date_cur']; ?></li>
                <li><strong><i class="fa fa-venus-mars" aria-hidden="true"></i> <?php echo lang($link,'gioi_tinh'); ?> :</strong> <?php echo lang($link,"sex_".$data_user['sex']); ?></li>
                <?php if($data_user['email']!=''){?><li><strong><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo 'Email'; ?> :</strong> <?php echo  $data_user['email']; ?></li><?php }?>
                <li>
                    <strong><i class="fa fa-id-badge" aria-hidden="true"></i> ID carrot:</strong> <?php echo $data_user['id_device'] ?><br/>
                    <?php
                    QRcode::png($url_cur_page, 'phpqrcode/img_account/'.$id_user.'_'.$lang.'.png', 'M', 4, 2);
                    ?>
                    <img src="<?php echo $url; ?>/phpqrcode/img_account/<?php echo $id_user; ?>_<?php echo $lang; ?>.png" class="box_get_info_contact" title="<?php echo lang($link,"qr_tip");?>"/>
                    <a href="<?php echo $url; ?>/download_vcf.php?id_user=<?php echo $id_user;?>&lang=<?php echo $lang;?>" class="box_get_info_contact"> <i class="fa fa-download fa-3x" aria-hidden="true" ></i><div class="txt"><span><?php echo lang($link,'download_vcf');?></span></div></a>
                    <a href="contactstore://show/<?php echo $id_user;?>/<?php echo $lang;?>" class="box_get_info_contact" title="<?php echo lang($link,"link_open_app_tip");?>"> <i class="fa fa-external-link-square fa-3x" aria-hidden="true" ></i><div class="txt"><span><?php echo lang($link,'contact_open_app');?></span></div></a>
                    <div onclick="show_user_report();return false;" class="box_get_info_contact"> <i class="fa fa-exclamation-triangle fa-3x" aria-hidden="true"></i><div class="txt"><span><?php echo lang($link,"account_report"); ?></span></div></div>
                </li>
                <?php
                if($is_me){
                    echo '<li><a class="buttonPro small yellow" href="'.$url.'/user_edit/'.$id_user.'/'.$lang.'"><i class="fa fa-wrench" aria-hidden="true"></i> '.lang($link,'chinh_sua_thong_tin').'</a></li>';
                }
                ?>
                <?php
                $contact_query=mysqli_query($link,"SELECT `data` FROM carrotsy_contacts.`info_$lang` WHERE `user_id` = '$id_user' LIMIT 1");
                if($contact_query){
                    $data_contact = mysqli_fetch_assoc($contact_query);
                    if($data_contact!=null){
                        $data_contact = json_decode($data_contact['data']);
                        for($i=0;$i<count($data_contact);$i++){
                            $item_info=$data_contact[$i];
                            $key_info=$item_info->{"key"};
                            $val_info=$item_info->{"val"};
                            $query_info_field=mysqli_query($link,"SELECT `icon_web` FROM carrotsy_contacts.`field` WHERE `name_id` = '$key_info' LIMIT 1");
                            $data_info_field=mysqli_fetch_assoc($query_info_field);
                            if($data_info_field==null)
                                $field_icon_web='fa-asterisk';
                            else
                                $field_icon_web=$data_info_field['icon_web'];

                            $query_field_key_lang=mysqli_query($link,"SELECT `name`, `tip` FROM carrotsy_contacts.`field_lang` WHERE `name_id` = '$key_info' AND `lang` = '$lang_sel' LIMIT 1");
                            $data_field_key_lang=mysqli_fetch_assoc($query_field_key_lang);
                            if($data_field_key_lang!=null)$key_info=$data_field_key_lang['name'];

                            echo '<li><strong><i class="fa '.$field_icon_web.'" aria-hidden="true"></i> '.$key_info.' :</strong> '.$val_info.'</li>';
                        }
                    }
                }
                ?>
                <?php if ($address_account != '') { ?> <li><strong><i class="fa fa-map-marker"></i> <?php echo lang($link,'dia_chi'); ?> :</strong> <?php echo $address_account; ?></li><?php } ?>
            </ul>
            <?php if ($address_account != '') { ?>
                <iframe width="100%" height="310" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $address_account; ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <?php } ?>
        </div>
        <?php echo show_share($link,$url_cur_page); ?>

        <?php
        $check_music_data = mysqli_query($link,"SELECT `id_chat`,`value` FROM `app_my_girl_music_data_$lang_sel` WHERE `device_id` = '$id_user' LIMIT 10");
        if (mysqli_num_rows($check_music_data)) {
            ?>
            <div style="width: 100%;float: left;">
                <h3><i class="fa fa-music" aria-hidden="true"></i> <?php echo lang($link,'gu_am_nhac') ?></h3>
                <?php
                $arr_icon_face = array('<i  class="fa fa-smile-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-frown-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-meh-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-smile-o" aria-hidden="true"></i>',
                    '<i  class="fa fa-smile-o" aria-hidden="true"></i>');
                while ($row_histore_music = mysqli_fetch_array($check_music_data)) {
                    $id_music = $row_histore_music['id_chat'];
                    $query_music = mysqli_query($link,"SELECT `chat` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' AND `id`='$id_music' LIMIT 1");
                    $data_music = mysqli_fetch_array($query_music);
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

        <?php
        if(get_setting($link,'show_ads')=='1') {
        ?>
        <div style="width:100%;float:left">
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                style="display:block"
                data-ad-format="fluid"
                data-ad-layout-key="-ck+8m-1w-30+cw"
                data-ad-client="ca-pub-5388516931803092"
                data-ad-slot="9207776534"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
        <?php }?>

        <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts" scrolling="no" frameborder="0" style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;"></iframe>

    </div>

    <div id="sidebar_product">
        <h3><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo lang($link,'lien_he_cung_ten'); ?></h3>
        <?php
        for ($i_contact=0;$i_contact<sizeof($array_contact_same_name);$i_contact++){
            $row_contact = $array_contact_same_name[$i_contact];
            ?>
            <a style="width: 100%;display: block;"
               href="<?php echo $url; ?>/user/<?php echo $row_contact['id_device']; ?>/<?php echo $lang; ?>"
               class="track-details contacts">
                <i class="fa fa-user" aria-hidden="true"></i> <?php echo $row_contact['name']; ?>
                <em><?php echo $row_contact['sdt']; ?></em>
            </a>
            <?php
        }
        ?>
        <br/>

        <?php if ($sdt != '') { ?>
            <h3><i class="fa fa-plug" aria-hidden="true"></i> <?php echo lang($link,'lien_he_lien_quan'); ?></h3>
            <?php
            $list_contact_same_phone = mysqli_query($link,"SELECT `id_device`,`name`,`sdt` FROM `app_my_girl_user_$lang` WHERE `sdt`= '$sdt'  LIMIT 5");
            while ($row_contact = mysqli_fetch_array($list_contact_same_phone)) {
                ?>
                <a style="width: 100%;display: block;"
                   href="<?php echo $url; ?>/user/<?php echo $row_contact['id_device']; ?>/<?php echo $lang; ?>"
                   class="track-details contacts">
                    <i class="fa fa-user" aria-hidden="true"></i> <?php echo $row_contact['name']; ?>
                    <em><?php echo $row_contact['sdt']; ?></em>
                </a>
                <?php
            }
            ?>
            <br/>
        <?php } ?>

        <?php
        echo show_box_ads_page($link,'contact_page');
        ?>
    </div>

<?php
include "page_member_footer_account.php";

if (sizeof($array_contact_same_name)> 0) {
    ?>
    <script>
    var arr_id_user=[];
    </script>
    <div style="float: left;width: 100%;">
        <h2 style="padding-left: 30px;"><?php echo lang($link,'lien_he_cung_ten'); ?></h2>
        <?php
        
        $label_chi_tiet=lang($link,'chi_tiet');
        $label_goi_dien=lang($link,'goi_dien');
        $label_download_vcf=lang($link,'download_vcf');
        $label_so_dien_thoai=lang($link,"so_dien_thoai");
        $label_dia_chi=lang($link,"dia_chi");
        $label_quoc_gia=lang($link,"quoc_gia");

        for($i_contact=0;$i_contact<sizeof($array_contact_same_name);$i_contact++){
            $row =$array_contact_same_name[$i_contact];
            include "page_member_view_git.php";
        }
        ?>
    </div>
<?php } ?>

<script>
function show_user_report(){
    var txt_html_report='<ul style="padding: 0px;margin: 0px;text-align: left;margin-left: 10%;">';
    <?php if($sex_content==0){?>
    txt_html_report=txt_html_report+'<li style="width:80%" onclick="sel_user_report(0)" class="buttonPro green"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo lang($link,'account_report_1');?></li>';
    <?php }?>
    txt_html_report=txt_html_report+'<li style="width:80%" onclick="sel_user_report(1)" class="buttonPro green"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo lang($link,'account_report_2');?></li>';
    txt_html_report=txt_html_report+'<li style="width:80%" onclick="sel_user_report(2)" class="buttonPro green"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo lang($link,'account_report_3');?></li>';
    txt_html_report=txt_html_report+'</ul>';
    swal({html: true, title: '<?php echo lang($link,"account_report"); ?>', text: txt_html_report, showConfirmButton: false, cancelButtonText: "<?php echo lang($link,'box_no');?>", closeOnConfirm: false,closeOnCancel: false,showCancelButton: true});
}

function sel_user_report(sel_val){
    if(sel_val=='0'||sel_val=='1'){
        submit_acc_report(sel_val,'');
    }

    if(sel_val=='2'){
        var txt_other_report='<p><?php echo lang($link,'account_report_3'); ?></p><br/><textarea id="acc_report_error" rows="9" cols="10" style="width:100%" placeholder="<?php echo lang($link,'account_report_3_tip');?>"></textarea>';
        swal({html: true, title: '<?php echo lang($link,"account_report"); ?>',text:txt_other_report,
                showConfirmButton: true,
                showCancelButton: true,
                cancelButtonClass: "btn-info",
                confirmButtonText: "<?php echo lang($link,'box_yes');?>",
                cancelButtonText: "<?php echo lang($link,'box_no');?>",
                closeOnConfirm: true,
                closeOnCancel: true},function(isConfirm){ 
                if(isConfirm){
                    var acc_report_error=$("#acc_report_error").val();
                    submit_acc_report(sel_val,acc_report_error);
                }
        });
    }
}

function submit_acc_report(sel_val,error_val){
    swal_loading();
    $.ajax({
        url: "<?php echo $url;?>/json/json_account.php",
        type: "post",
        data: "function=report_account&lang=<?php echo $lang;?>&type="+sel_val+"&id_device=<?php echo $id_user;?>&error_txt="+error_val,
        success: function (data, textStatus, jqXHR) {
            swal("<?php echo lang($link,"account_report"); ?>", "<?php echo lang($link,'account_report_success');?>", "success");
        }
    });
}

</script>
<?php }?>