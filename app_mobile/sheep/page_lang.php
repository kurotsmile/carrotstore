<?php
$cur_url=$url.'?view=lang';
$sub_view='key';
$table_lang_key="key_lang";
$table_lang_Val="value_lang";
if(isset($_GET['sub_view'])){ $sub_view=$_GET['sub_view'];}
?>
<div class="menu_sub">
    <a <?php if($sub_view=='key'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&sub_view=key">Từ khóa</a>
    <a <?php if($sub_view=='val'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&sub_view=val">Dữ liệu</a>
</div>

<?php
include "page_lang_".$sub_view.".php";
?>