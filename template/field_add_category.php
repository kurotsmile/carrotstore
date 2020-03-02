<link rel="stylesheet" href="<?php echo $url;?>/assets/css/searchableOptionList.css"/>
<script type="text/javascript" src="<?php echo $url;?>/js/sol.js"></script>
<p>
<div class="group">
    <div class="title"><input type="checkbox" class="btnGroup" /> <?php echo lang('chuyen_muc');?> </div>
    <div class="content">
        <?php
            $type_id=$_GET['sub_view'];
            $resualt_cat=mysql_query("SELECT * FROM `product_category` WHERE `type_cat`='$type_id'");
        ?>
        <select id="select_category" name="select_category" multiple="multiple">
            <?php
            while($cat=mysql_fetch_array($resualt_cat)){
                echo  '<option value="'.$cat[0].'">'.$cat[1].'</option>';
            }
            ?>
        </select>
    </div>
</div>
</p>
<script>
    $(function() {
        $('#select_category').searchableOptionList();
    });
</script>