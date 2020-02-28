<?php
$data=get_account($_SESSION['username_login']);
$ac=$data;
if($data['data']==''){
    $data=new Accoun_Data();
    $data->info=new Account_info();
}else{
    $data=(object)json_decode($data['data']);
    if(!isset($data->info)){
        $data->info=new Account_info();
    }
}
?>
<h3><?php echo lang('cap_nhat_tai_khoan');?></h3>
<form id="form_info_account">
    <p>
<label><?php echo lang('gioi_tinh') ?>:</label>
<select class="inp" name="sex">
    <option value="nam_gioi" <?php if($data->info->sex=='nam_gioi'){?>selected="selected"<?php }?> ><?php echo lang('nam_gioi');?></option>
    <option value="nu_gioi" <?php if($data->info->sex=='nu_gioi'){?>selected="selected"<?php }?> ><?php echo lang('nu_gioi');?></option>
    <option value="dong_tinh"  <?php if($data->info->sex=='dong_tinh'){?>selected="selected"<?php } ?> ><?php echo lang('dong_tinh');?></option>
</select>
    </p>

    <p>
<label><?php echo lang('gioi_thieu_ngan') ?>:</label><br/>
<textarea class="inp" name="introduction"><?php echo $data->info->introduire;?></textarea>
    </p>

    <p>
        <label for="ac_fullname"><?php echo lang('ten_day_du'); ?></label>
        <?php
        if(count(json_decode($ac['fullname']))>0){
            $fullname=json_decode($ac['fullname']);
            foreach($fullname as $fname){
        ?>
            <input type="text" name="ac_fullname[]" id="ac_fullname" value="<?php echo $fname; ?>" class="inp" />
        <?php }}else{?>
            <input type="text" name="ac_fullname[]" id="ac_fullname" value="" class="inp" />
        <?php }?>
    </p>

    <p>
        <label for="ac_phone"><?php echo lang("so_dien_thoai"); ?></label>
        <?php
        if(count(json_decode($ac['phone']))>0){
            $phone=json_decode($ac['phone']);
            foreach($phone as $Ph){
        ?>
            <input type="text" name="ac_phone[]" id="ac_phone" value="<?php echo $Ph; ?>" class="inp" />
        <?php }}else{?>
            <input type="text" name="ac_phone[]" id="ac_phone" value="" class="inp" />
        <?php }?>
    </p>

    <p>
    <label for="ac_contry"><?php echo lang('quoc_gia');?></label><br />
    <select  class="inp" name="ac_contry" id="ac_contry">
        <?php
        $result = mysql_query("SELECT * FROM `contry` LIMIT 50",$link);
        while ($row = mysql_fetch_array($result)) {
            ?>
            <option value="<?php echo $row[1]; ?>" <?php if($row[1]==$ac['contry']){ echo 'selected="true"';} ?> ><?php echo $row[0]; ?></option>
            <?php
        }
        ?>
    </select>
    </p>

    <p>
        <label for="ac_address"><?php echo lang("dia_chi"); ?></label>
        <?php
        $address=new Address;
        if($ac['address']!=''){
            $address=json_decode($ac['address']);
        }
        ?>
        <input name="ac_address" type="text"  value="<?php echo $address->address;?>" class="inp ac_address" />
        <input class="inp lat" type="hidden" name="lat"  value="<?php echo $address->lat;?>" />
        <input class="inp lng" type="hidden" name="lng" value="<?php echo $address->lng;?>" />
    </p>

    <br/>
<button class="buttonPro blue" onclick="account_upadate_info();return false;"><?php echo lang("cap_nhat");?></button>
</form>
<script>
    function account_upadate_info(){
        var parameter=$('#form_info_account').serialize();
        $('#loading').fadeIn(100);
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=account_upadate_info&"+parameter,
            success: function(data, textStatus, jqXHR)
            {
                swal('<?php echo lang('thanh_cong');?>','<?php echo lang('cap_nhat_thanh_cong');?>','success');
                $('#loading').fadeOut(100);
            }
        });
    }
</script>