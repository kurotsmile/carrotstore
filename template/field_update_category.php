<link rel="stylesheet" href="<?php echo $url;?>/assets/css/searchableOptionList.css"/>
<script type="text/javascript" src="<?php echo $url;?>/js/sol.js"></script>
<p>
    <?php
    $category=json_decode($data['category']);
    ?>
<div class="group">
    <div class="title"><input type="checkbox" class="btnGroup" <?php if($category!=null){ echo 'checked="true"';}?> /> <?php echo lang($link,'chuyen_muc');?> </div>
    <div class="content" <?php if($category!=null){ echo 'style="display: block;"';}?>>
        <?php
        $type_id=$_GET['sub_view'];
        $resualt_cat=mysql_query("SELECT * FROM `product_category` WHERE `type_cat`='$type_id'");
        ?>

        <select id="select_category" name="select_category" multiple="multiple">
            <?php
            while($cat=mysql_fetch_array($resualt_cat)){
                if(in_array($cat[0],$category)){
                    echo  '<option value="'.$cat[0].'" selected="true">'.$cat[1].'</option>';
                }else{
                    echo  '<option value="'.$cat[0].'">'.$cat[1].'</option>';
                }
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