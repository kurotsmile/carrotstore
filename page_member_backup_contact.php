<?php
$id_user=$_GET['user'];
$lang=$_GET['lang'];
$query_account_edit=mysql_query("SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
$data_user=mysql_fetch_array($query_account_edit);
include_once "page_member_header_account.php";
if(!$is_me){
    exit;
}

$query_backup=mysql_query("SELECT * FROM carrotsy_contacts.`backup_contact_$lang` WHERE `id_user` = '$id_user'");
?>
<div style="float: left;width: 100%">
    <h3 style="padding: 20px;padding-bottom: 5px;margin-bottom: 5px;"><?php echo lang('backup_contact_title'); ?></h3>
    <?php
        $title_backup_tip=lang('backup_contact_title_tip');
        $title_backup_tip=str_replace("{num_bk}",mysql_num_rows($query_backup),$title_backup_tip);
    ?>
    <i style="margin-left: 20px;"><?php echo $title_backup_tip;?></i>
</div>

<div class="container" style="float: left;width: 100%;">
    <div id="slide_backup" class="util-theme-default util-carousel features-carousel">
        <?php
        $count_backup=0;
        while ($row_backup=mysql_fetch_array($query_backup)){
            $count_backup++;
        ?>
        <div class="item">
            <i class="fa fa-address-book-o"></i>
            <h3><?php echo lang('sao_luu_danh_ba');?> (<?php echo $count_backup;?>)</h3>
            <p>
                <?php echo $row_backup['comment']; ?><br>
                <span class="buttonPro small light_blue" onclick="view_backup('<?php echo $row_backup['id'];?>')"><?php echo lang('chi_tiet');?></span>
                <span class="buttonPro small red"><?php echo lang('delete');?></span>
            </p>
        </div>
         <?php
        }
        ?>
    </div>
</div>

<script>
    $(function() {
        $('#slide_backup').utilCarousel({
            responsiveMode : 'itemWidthRange',
            itemWidthRange : [200, 200],
            pagination:true
        });
    });

    function view_backup(id_backup) {
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/json/json_account.php",
            type: "post",
            data: {function:"view_contatc_backup",id:id_backup,lang:"<?php echo $lang;?>"},
            success: function (data, textStatus, jqXHR) {
                swal({
                    html: true,
                    title: '<?php echo lang("sao_luu_danh_ba");?>',
                    text: data
                });
            }
        });
    }
</script>
<br/>
<hr style="border: solid 5px green"/>
<?php
include "page_member_footer_account.php";
?>