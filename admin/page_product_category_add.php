<div style="float: left;padding: 20px;">
    <form id="frm_category_add">
        <?php
        $edit=0;
        ?>
        <?php if(isset($_GET['edit'])){
            ?>
            <h3>Chỉnh sửa chuyên mục</h3>
            <?php
            $edit=$_GET['edit'];
            $data=get_row('product_category',$edit);
        }else{?>
        <h3>Thêm chuyên mục sản phẩm</h3>
        <?php }?>
        <p>
        <label>Loại sản phẩm</label><br/>
        <select name="type_cat">
            <?php
            $result = mysql_query("SELECT * FROM `type` ORDER BY `id`");
            while ($row = mysql_fetch_array($result)) {
            ?>
            <option value="<?php echo $row[0]; ?>" <?php if($edit>0&&$data['type_cat']==$row[0]){ echo 'selected="selected"';}?>><?php echo lang($row[0]); ?></option>
            <?php }?>
        </select>
         </p>

        <p>
            <label>Tên chuyên mục</label><br/>
            <input name="name_cat" value="<?php if($edit>0){ echo $data['name_cat'];}?>"><br/>
        </p>

        <p>
            <label>Biểu tượng</label><br/>
            <input name="icon" value="<?php if($edit>0){ echo $data['icon'];}?>"><br/>
        </p>

        <p>
            <input name="table" type="hidden" value="product_category"/>
            <?php  if($edit>0){?>
                <input type="hidden" name="id" value="<?php echo $edit;?>">
                <input type="hidden" name="success" value="<?php echo lang('cap_nhat_thanh_cong');?>">
                <input type="button" class="buttonPro" value="Cập nhật" onclick="insert_data('frm_category_add');return false;"/>
            <?php }else{?>
                <input type="hidden" name="success" value="<?php echo lang('them_moi_thanh_cong');?>">
                <input type="button" class="buttonPro" value="Thêm" onclick="insert_data('frm_category_add');return false;"/>
            <?php }?>
            <input type="hidden" name="error" value="<?php echo lang('loi');?>">
        </p>
    </form>
</div>
