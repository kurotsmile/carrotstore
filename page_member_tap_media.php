<h3><?php echo lang('thu_vien_anh');?></h3>
<button class="buttonPro light_blue" id="btn_member_play_media" onclick="show_setsion();" ><i class="fa fa-play"></i> <?php echo lang('Trình Diễn ảnh');?></button>
<?php if(isset($_SESSION['username_login'])&&$id_user==$_SESSION['username_login']){?>
<button class="buttonPro light_blue" id="btn_member_upload_media" onclick="show_upload('member_upload_media_panel','member_media');"><i class="fa fa-upload"></i> <?php echo lang('tai_anh_len');?></button>
<form id="member_upload_media_panel" class="show_member_upload_media_panel">
    <div class="media_item add" onclick="show_upload('member_upload_media_panel','member_media');">
        <i class="fa fa-plus-square fa-3x"></i>
        <strong><?php echo lang('tai_anh_len');?></strong>
    </div>
</form>
<div id="member_upload_media_action">
    <div class="media_action">
        <button class="buttonPro blue" onclick="add_media_to_active();"><i class="fa fa-arrow-circle-o-down"></i> <?php echo lang('hoan_tat');?></button>
        <button class="buttonPro" onclick="show_panel_media(0);"><i class="fa fa-times-circle-o"></i> <?php echo lang('huy_bo');?></button>
    </div>
</div>

<script>
    function show_panel_media(is_show){
        if(is_show==1){
            $('#member_upload_media_panel').show();
            $('#member_upload_media_action').show();
            $('#btn_member_upload_media').hide();
            $('#btn_member_play_media').hide();
            $('#btn_member_upload_media').attr('onclick','show_panel_media(1)');
        }else{
            $('#member_upload_media_panel').hide();
            $('#member_upload_media_action').hide();
            $('#btn_member_upload_media').show();
            $('#btn_member_play_media').show();
        }

    }

    function add_media_to_active(){
        var parameter=$('#member_upload_media_panel').serialize();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=add_media_to_activer&"+parameter,
            success: function(data, textStatus, jqXHR)
            {
                swal('<?php echo lang('thanh_cong');?>','<?php echo lang('them_thanh_cong') ?>','success');
                $('#btn_tap_media').click();
            }
        });
    }

    function show_setsion(){
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=get_test",
            success: function(data, textStatus, jqXHR)
            {
               alert(data);
            }
        });
    }

</script>

<?php }?>
<div id="show_member_media">
<?php
    $get_media_member=mysql_query("SELECT * FROM `account_media` WHERE `user` = '$id_user' ORDER  BY  `date` DESC");
    while($medias=mysql_fetch_array($get_media_member)){
        $media=get_row('media',$medias['media']);
        ?>
        <div class="item_media_account imgMedia<?php echo $media['id'];?>">
            <?php if(isset($_SESSION['username_login'])&&$id_user==$_SESSION['username_login']){?>
                <i class="fa fa-times-circle close" onclick="del_media_file('<?php echo $media['id'];?>');" title="<?php echo lang('xoa');?>"></i>
            <?php }?>
            <a target="_blank" href="<?php echo $url.'/'.$media['url_file'];?>"><img src="<?php echo thumb($media['url_file'],'100x100');?>"></a>
            <div><?php echo $medias['title']; ?></div>
        </div>
        <?php
    }
?>
</div>
