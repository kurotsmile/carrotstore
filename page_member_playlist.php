<?php
$id_user=$_GET['user'];
$lang=$_GET['lang'];
$query_account_edit=mysql_query("SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
$data_user=mysql_fetch_array($query_account_edit);
include_once "page_member_header_account.php";
if(!$is_me){
    exit;
}

$query_playlist=mysql_query("SELECT `id`,`name`,`length`  FROM carrotsy_music.`playlist_$lang` WHERE `user_id` = '$id_user' ");
$label_delete=lang('delete');
$label_edit=lang('edit');
$label_view=lang('chi_tiet');
?>
<div class="container" style="float: left;width: 100%;">
    <div id="container-title">
        <div id="title"><?php echo lang("my_playlist");?></div>
    </div>

    <div id="slide_playlist" class="util-theme-default util-carousel features-carousel">
        <?php
        while ($row_playlist=mysql_fetch_array($query_playlist)){
            ?>
            <div class="item item-playlist">
                <i class="fa fa-th-list"></i>
                <h3><?php echo $row_playlist['name']; ?></h3>
                <p>
                    <?php echo $row_playlist['length']; ?><br>
                    <a href="<?php echo $url;?>/playlist/<?php echo $row_playlist['id'];?>/<?php echo $lang;?>" class="buttonPro small light_blue"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> <?php echo $label_view;?></a><br/>
                    <span class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo $label_delete;?></span><br/>
                    <span class="buttonPro small yellow" onclick="edit_name_playlist('<?php echo  $row_playlist['id']; ?>','<?php echo $lang;?>');"><i class="fa fa-edit" aria-hidden="true"></i> <?php echo $label_edit;?></span>
                </p>
            </div>
            <?php
        }
        ?>
    </div>

</div>
<?php
include "page_member_footer_account.php";
?>

<script>
    $(function() {
        $('#slide_playlist').utilCarousel({
            showItems:5,
            responsive:true,
            responsiveMode : 'itemWidthRange',
            itemWidthRange : [200, 200],
            pagination:true
        });
    });

    function edit_name_playlist(id_playlist,lang){
        swal({
                title: "<?php echo lang('my_playlist'); ?>",
                text: "<?php echo lang('my_playlist_rename_tip'); ?>",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                cancelButtonText: "<?php echo lang('back');?>",
            },
            function(inputValue) {
                if (inputValue === false) {
                    return false;
                }
                if (inputValue === "") {
                    swal.showInputError("<?php echo lang('error_name_playlist_null');?>");
                    return false
                }
                swal_loading();
                $.ajax({
                    url: "<?php echo $url;?>/json/json_account.php",
                    type: "post",
                    data: "function=edit_name_playlist&name_playlist=" + inputValue + "&lang=" + lang + "&id_playlist=" + id_playlist,
                    success: function (data, textStatus, jqXHR) {
                        swal("<?php echo lang('update_playlist'); ?>", "<?php echo lang('thanh_cong') ?>", "success");
                    }
                });
        });
    }
</script>
