<?php
$id_user=$_GET['user'];
$lang=$_GET['lang'];
$query_account_edit=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
$data_user=mysqli_fetch_array($query_account_edit);
include_once "page_member_header_account.php";
if(!$is_me){
    exit;
}

$query_backup=mysqli_query($link,"SELECT * FROM carrotsy_contacts.`backup_$lang` WHERE `user_id` = '$id_user'");
?>


<div class="container" style="float: left;width: 100%;">
    
    <div style="float: left;width: 100%">
        <h3 style="padding: 20px;padding-bottom: 5px;margin-bottom: 5px;"><?php echo lang($link,'backup_contact_title'); ?></h3>
        <?php
        $title_backup_tip=lang($link,'backup_contact_title_tip');
        $title_backup_tip=str_replace("{num_bk}",mysqli_num_rows($query_backup),$title_backup_tip);
        ?>
        <i style="margin-left: 20px;"><?php echo $title_backup_tip;?></i>
    </div>
    
    <?php
    if(mysqli_num_rows($query_backup)<=0){
        $query_app_contact=mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '104' LIMIT 1");
        $row=mysqli_fetch_array($query_app_contact);
        ?>
        <div style="float: left;width: 100%;margin-top: 50px;margin-bottom: 50px;">
            <div style="float: left;width: 50%;text-align: center">
                <div style="padding: 20px;margin-top: 45px;">
                <b><?php echo lang($link,'backup_contact_none');?> <i class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"></i></b><br/>
                <img style="width: 100px;" src="<?php echo $url;?>/images/cat_none.gif">
                </div>
            </div>
            <div style="float: left;width: 50%">
                <?php 
                    $label_click_de_xem=lang($link,'click_de_xem');
                    $label_download_on=lang($link,'download_on');
                    $label_loai=lang($link,'loai');
                    $label_chi_tiet=lang($link,'chi_tiet');
                    include "page_view_all_product_git_template.php"; 
                ?>
            </div>
        </div>
    <?php
    }
    ?>

    <div id="slide_backup" class="util-theme-default util-carousel features-carousel">
        <?php
        $count_backup=0;
        while ($row_backup=mysqli_fetch_array($query_backup)){
            $count_backup++;
        ?>
        <div class="item">
            <i class="fa fa-address-book-o"></i>
            <h3><?php echo lang($link,'sao_luu_danh_ba');?> (<?php echo $count_backup;?>)</h3>
            <p>
                <?php echo $row_backup['comment']; ?><br>
                <span class="buttonPro small light_blue" onclick="view_backup('<?php echo $row_backup['id'];?>')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php echo lang($link,'chi_tiet');?></span>
                <span class="buttonPro small red" onclick="delete_backup_contact('<?php echo $row_backup['id'];?>','<?php echo $lang;?>');"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo lang($link,'delete');?></span>
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
            itemWidthRange : [200, 100],
            pagination:true,
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
                    title: '<?php echo lang($link,"sao_luu_danh_ba");?>',
                    text: data
                });
            }
        });
    }

    function delete_backup_contact(id_backup,lang){
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/json/json_account.php",
            type: "post",
            data: {function:"delete_backup_contact",id:id_backup,lang:lang},
            success: function (data, textStatus, jqXHR) {
                swal('<?php echo lang($link,"sao_luu_danh_ba");?>','Đã xóa bảng sao lưu danh bạ','success');
            }
        });
    }
</script>
<br/>
<?php
include "page_member_footer_account.php";
?>