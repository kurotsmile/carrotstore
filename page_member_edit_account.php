<?php
$id_user=$_GET['user'];
$lang=$_GET['lang'];
$query_account_edit=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
$data_user=mysqli_fetch_array($query_account_edit);
include_once "page_member_header_account.php";
if(!$is_me){
    exit;
}

?>
<script src="<?php echo $url;?>/js/jquery.ajaxfileupload.js"></script>
    <form name="frm" id="frm_update_info" class="frm" action="" method="post" enctype="multipart/form-data">
        <p class="row" style="text-align: center">
            <label><i class="fa fa-picture-o" aria-hidden="true"></i> <?php echo lang($link,'avatar');?></label><br/>
            <img class="avatar" onclick="$('#user_avatar').click();" id="img_user_avatar" src="<?php echo get_url_avatar_user($link,$id_user,$lang,'200x200');?>"/>
            <br/>
            <input name="user_avatar" id="user_avatar" type="file" >
        </p>

        <p class="row">
            <label><i class="fa fa-user"></i> <?php echo lang($link,'ten_day_du'); ?></label>
            <input name="user_name" id="user_name" value="<?php echo $data_user['name'];?>" class="inp">
        </p>

        <p class="row">
            <label><i class="fa fa-venus-mars" aria-hidden="true"></i> <?php echo lang($link,'gioi_tinh'); ?></label>
            <select class="inp" name="user_sex" id="user_sex">
                <option <?php if($data_user['sex']=='0'){?>selected="true"<?php }?> value="0"><?php echo lang($link,'sex_0'); ?></option>
                <option <?php if($data_user['sex']=='1'){?>selected="true"<?php }?> value="1"><?php echo lang($link,'sex_1'); ?></option>
            </select>
        </p>

        <p class="row">
            <label><i class="fa fa-phone-square"></i> <?php echo lang($link,'so_dien_thoai'); ?></label>
            <input name="user_sdt" id="user_sdt" value="<?php echo $data_user['sdt'];?>"  class="inp">
        </p>



        <p class="row">
            <label><i class="fa fa-map-marker"></i> <?php echo lang($link,'dia_chi'); ?></label>
            <input name="user_address" id="user_address" value="<?php echo $data_user['address'];?>"  class="inp">
        </p>

        <p class="row">
            <label><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo 'Email'; ?></label>
            <input name="user_email" id="user_email" value="<?php echo $data_user['email'];?>"  class="inp">
        </p>



        <p class="row">
            <label><i class="fa fa-certificate" aria-hidden="true"></i> <?php echo lang($link,'user_status'); ?></label>
            <select class="inp" name="user_status" id="user_status">
                <option <?php if($data_user['status']=='0'){?>selected="true"<?php }?> value="0"><?php echo lang($link,'user_status_0'); ?></option>
                <option <?php if($data_user['status']=='1'){?>selected="true"<?php }?> value="1"><?php echo lang($link,'user_status_1'); ?></option>
            </select>
        </p>

        <p class="row">
            <label><i class="fa fa-key" aria-hidden="true"></i> <?php echo lang($link,'mat_khau'); ?></label>
            <input name="user_password" id="user_password" value="<?php echo $data_user['password'];?>" type="password"  class="inp"><br/>
            <i><img src="<?php echo $url.'/images/icon.png'?>"> <?php echo lang($link,'password_tip'); ?></i>
        </p>


        <p class="row" style="width: 60%;border: none;text-align: center">
            <span onclick="update_info_user();return false;" class="buttonPro green large" ><i class="fa fa-pencil-square" aria-hidden="true"></i> <?php echo lang($link,'hoan_tat'); ?></span>
            <input type="hidden" name="user_id" value="<?php echo $id_user;?>">
            <input type="hidden" name="user_lang" value="<?php echo $lang;?>">
            <input type="hidden" name="user_avatar" value="<?php echo $data_user['avatar_url'];?>">
            <input type="hidden" name="function" value="update_info_user">
        </p>
    </form>
</div>

<script>

    $(document).ready(function(){
        $("#user_address").geocomplete();
        $('#user_avatar').ajaxfileupload({
            action: '<?php echo URL . '/app_my_girl_upload_temp.php';?>',
            params: {
                id_user: '<?php echo  $id_user;?>',
                lang:'<?php echo $lang; ?>'
            },
            onStart: function () {
                swal_loading();
            }
            ,
            onComplete: function (response) {
                swal.close();
                $("#img_user_avatar").attr("src","<?php echo $url;?>/app_mygirl/app_my_girl_<?php echo $lang;?>_user/<?php echo $id_user;?>.png");
            }
        });
    });
    
    function update_info_user(){
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: $("#frm_update_info").serialize(),
            success: function(data, textStatus, jqXHR)
            {
                swal('<?php echo lang($link,'chinh_sua_thong_tin'); ?>','<?php echo lang($link,'hoan_tat'); ?>','success');
            }
        });
    }
</script>

<?php
include "page_member_footer_account.php";
?>