<?php
$id_user=$_GET['user'];
$lang=$_GET['lang'];
$query_account_edit=mysql_query("SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
$data_user=mysql_fetch_array($query_account_edit);
include_once "page_member_header_account.php";
if(!$is_me){
    exit;
}
?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=<?php echo $key_api_google; ?>&sensor=true"></script>
<script src="<?php echo $url;?>/js/jquery.geocomplete.min.js"></script>
<div id="post_product">
    <form name="frm" id="frm_update_info" class="frm" action="" method="post">
        <p class="row">
            <label><i class="fa fa-user"></i> <?php echo lang('ten_day_du'); ?></label>
            <input name="user_name" id="user_name" value="<?php echo $data_user['name'];?>" class="inp">
        </p>

        <p class="row">
            <label><i class="fa fa-venus-mars" aria-hidden="true"></i> <?php echo lang('gioi_tinh'); ?></label>
            <select class="inp" name="user_sex" id="user_sex">
                <option <?php if($data_user['sex']=='0'){?>selected="true"<?php }?> value="0"><?php echo lang('sex_0'); ?></option>
                <option <?php if($data_user['sex']=='1'){?>selected="true"<?php }?> value="1"><?php echo lang('sex_1'); ?></option>
            </select>
        </p>

        <p class="row">
            <label><i class="fa fa-phone-square"></i> <?php echo lang('so_dien_thoai'); ?></label>
            <input name="user_sdt" id="user_sdt" value="<?php echo $data_user['sdt'];?>"  class="inp">
        </p>

        <p class="row">
            <label><i class="fa fa-map-marker"></i> <?php echo lang('dia_chi'); ?></label>
            <input name="user_address" id="user_address" value="<?php echo $data_user['address'];?>"  class="inp">
        </p>

        <p class="row">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo 'Email'; ?></label>
            <input name="user_email" id="user_email" value="<?php echo $data_user['email'];?>"  class="inp">
        </p>

        <p class="row">
            <label><i class="fa fa-certificate" aria-hidden="true"></i> <?php echo lang('user_status'); ?></label>
            <select class="inp" name="user_status" id="user_status">
                <option <?php if($data_user['status']=='0'){?>selected="true"<?php }?> value="0"><?php echo lang('user_status_0'); ?></option>
                <option <?php if($data_user['status']=='1'){?>selected="true"<?php }?> value="1"><?php echo lang('user_status_1'); ?></option>
            </select>
        </p>

        <p class="row">
            <span onclick="update_info_user();return false;" class="buttonPro green" ><i class="fa fa-pencil-square" aria-hidden="true"></i> <?php echo lang('hoan_tat'); ?></span>
            <input type="hidden" name="user_id" value="<?php echo $id_user;?>">
            <input type="hidden" name="user_lang" value="<?php echo $lang;?>">
            <input type="hidden" name="user_avatar" value="<?php echo $data_user['avatar_url'];?>">
        </p>
    </form>
</div>

<script>

    $(document).ready(function(){
        swal('<?php echo lang('chinh_sua_thong_tin'); ?>','<?php echo lang('hoan_tat'); ?>','success');
        $("#user_address").geocomplete();
    });
    
    function update_info_user(){
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=update_info_user&"+$("#frm_update_info").serialize(),
            success: function(data, textStatus, jqXHR)
            {
                swal('<?php echo lang('chinh_sua_thong_tin'); ?>','<?php echo lang('hoan_tat'); ?>','success');
            }
        });
    }
</script>