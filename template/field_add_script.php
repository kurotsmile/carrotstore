<script src="<?php echo $url;?>/ckeditor.js"></script>
<script>
function add_product(emp){
    var category = [];
    $('#select_category :selected').each(function(i, selected){
        category[i] = $(selected).val();
    });

    var category= JSON.stringify(category);

    if($('#name_product').val()=='' ||$('#name_product').val().length<5 ){
        swal('<?php echo lang('loi');?>','<?php echo lang('loi_ten_sp'); ?>','error');
        return false;
    }
    
    if($('#descrip_product').val()=='' ||$('#descrip_product').val().length<10 ){
        swal('<?php echo lang('loi');?>','<?php echo lang('loi_mo_ta_sp'); ?>','error');
        return false;
    }
    
    if($('#id_user').val()==null || $('#id_user').val()==''){;
            swal("<?php echo lang('loi'); ?>","<?php echo lang('ten_dn_k_de_trong'); ?>", "error"); 
            return false;    
    }else{
        if(isEmail($('#id_user').val())){
                
        }else{
            swal("<?php echo lang('loi'); ?>","<?php echo lang('email_sai'); ?>", "error"); 
            return false; 
        }
    }
    
    var txt_data=$("#form_add_product").serialize();

    
    var data = CKEDITOR.instances.noi_dung_tai_lieu.getData();
    txt_data=txt_data+'&noi_dung='+ encodeURIComponent(data);
    
    $.ajax({
        url: "<?php echo $url;?>/index.php",
        type: "post",
        data: "function=add_product&"+txt_data+"&category="+category,
        success: function(data, textStatus, jqXHR)
        {
            swal('<?php echo lang('thanh_cong'); ?>','<?php echo lang('them_moi_thanh_cong'); ?>','success');
            $('#loading').fadeOut(200);
            $('#name_product').val('');
            $('#descrip_product').val('');
        }
    
    });
    return false;
}
CKEDITOR.replace( 'noi_dung_tai_lieu',{
    language: '<?php echo $_SESSION['lang']; ?>',
    customConfig: 'build-config.js',
});
</script>