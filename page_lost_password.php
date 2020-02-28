<div style="float: left;padding: 10px;">
    <h2><?php echo lang('quen_mat_khau') ?></h2>
    <p>
    Enter your email we will recover your password
    </p>
    <p>
    <label><?php echo lang('ten_dang_nhap');?></label><br />
    <input class="inp" placeholder="<?php echo lang('dang_nhap_tip');?>" id="email_dn" />
    </p>
    
    <p>
        <button class="buttonPro green" onclick="lost_password()"><?php echo lang('hoan_tat');?></button>
    </p>
</div>

<script>
function lost_password(){
    var txt_email_dn=$('#email_dn').val();
            if(txt_email_dn==null || txt_email_dn==''){
                $('#email_dn').after('<p class="error"><?php echo lang('ten_dn_k_de_trong'); ?></p>');
                swal("<?php echo lang('loi'); ?>","<?php echo lang('ten_dn_k_de_trong'); ?>", "error");
                return false;
            }else{
                if(isEmail($('#email_dn').val())){
                    $('#loading').fadeIn(200);
                    $.ajax({
                        url: "index.php",
                        type: "get", //kiê?u du? liê?u truyê?n ?i
                        data: "function=lost_password&reg_email="+txt_email_dn, //tham sô? truyê?n va?o
                        success: function(data, textStatus, jqXHR)
                        {
                            if(data=="1"){
                                swal("<?php echo lang('quen_mat_khau'); ?>","<?php echo lang('lost_pwd_true');?> '"+txt_email_dn+"'", "success");
                            }else{
                                swal("<?php echo lang('quen_mat_khau'); ?>","<?php echo lang('loi_dang_nhap');?>", "error");
                            }
                            $('#loading').fadeOut(200);
                        }
                    });
                }else{
                    swal("<?php echo lang('loi'); ?>","<?php echo lang('email_sai'); ?>", "error");
                    return false;
                }
            }
            
    return false;
}
</script>