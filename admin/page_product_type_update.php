
<?php
    $data=get_row('type',$_GET['edit']);
?>
<div style="float: left;width: 100%;">
    <form style="padding: 30px;" id="form_add_product">
        <h2>Cập nhật loại cho sản phẩm</h2>
        <div id="show_eror"></div>
        <p>
        <label for="id_type">Định danh url</label><br />
        <input type="text" disabled="true"  value="<?php echo $data[0]; ?>"  />
        <input type="hidden"  value="<?php echo $data[0]; ?>" name="id_type" id="id_type" />
        </p>
        
        <p>
        <label for="icon_type">Css icon</label><br />
        <input type="text" value="<?php echo $data[1]; ?>" name="icon_type" id="icon_type" />
        </p>
        
        <p>
            <button class="buttonPro purple" onclick="update_type(this);return false;"><?php echo lang('cap_nhat') ?></button>
        </p>
    </form>
</div>

<script>
function update_type(emp){

    if($('#id_type').val()==''){
        swal('<?php echo lang('loi');?>','Id không được để trống','error');
        return false;
    }
    
    
    if($('#icon_type').val()=='' ){
        swal('<?php echo lang('loi');?>','icon không được để trống','error');
        return false;
    }
    
    var txt_data=$("#form_add_product").serialize();

    $('#loading').fadeIn(200);
    $.ajax({
        url: "<?php echo $url;?>/index.php",
        type: "get", //kiểu dũ liệu truyền đi
        data: "function=update_type&"+txt_data, //tham số truyền vào
        success: function(data, textStatus, jqXHR)
        {
            $('.alert').remove();
            $('#loading').fadeOut(200);
            swal("Good job!","<?php echo lang('cap_nhat_thanh_cong'); ?>", "success");
        }
    
    });
    return false;
}
</script>