<?php
$sub_view='lang_key';
if(isset($_GET['sub_view'])){
    $sub_view=$_GET['sub_view'];
}
$url_page=$url_admin.'/?page_view=page_carrot_framework';
$table_lang_key="cr_framework_lang_key";
$table_lang_Val="cr_framework_lang_val";
?>
<div id="bar_menu_sub">
    <a href="<?php echo $url_page;?>&sub_view=lang_key" <?php if($sub_view=='lang_key'){?>class="active"<?php }?>><i class="fa fa-list"></i> Quản lý các từ khóa</a>
    <a href="<?php echo $url_page;?>&sub_view=lang_val" <?php if($sub_view=='lang_val'){?>class="active"<?php }?>><i class="fa fa-list" aria-hidden="true"></i> Dữ liệu ngôn ngữ</a>
    <a href="<?php echo $url_page;?>&sub_view=lang_to" <?php if($sub_view=='lang_to'){?>class="active"<?php }?>><i class="fa fa-list"></i> Chuyển sang</a>
</div>
<?php
include "page_carrot_framework_".$sub_view.".php";
?>
