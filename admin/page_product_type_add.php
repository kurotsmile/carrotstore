<div style="float: left;width: 100%;">
    <form style="padding: 30px;" id="form_add_product">
        <h2>Thêm loại cho sản phẩm</h2>

        <p>
        <label for="id_type">Định danh url</label><br />
        <input type="text" value="" name="id_type" id="id_type" />
        </p>
        
        <p>
        <label for="icon_type">Css icon</label><br />
        <input type="text" value="" name="icon_type" id="icon_type" />
        </p>
        
        <p>
            <button class="buttonPro purple" onclick="add_type(this);return false;">Thêm</button>
        </p>
    </form>
</div>

<script>
function add_type(emp){
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
        data: "function=add_type&"+txt_data, //tham số truyền vào
        success: function(data, textStatus, jqXHR)
        {
                swal('<?php echo lang('thanh_cong'); ?>','Thêm loại cho sản phẩm thành công','success');
                $('#loading').fadeOut(200);
                $('#icons').val('');
                $('#names').val('');
            
        }
    
    });
    return false;
}
</script>