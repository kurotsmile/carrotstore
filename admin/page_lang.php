<?php
$sub_view='lang_key';
if(isset($_GET['sub_view'])){
    $sub_view=$_GET['sub_view'];
}
$url_page=$url_admin.'/?page_view=page_lang';
?>
<div id="bar_menu_sub">
<a href="<?php echo $url_page;?>&sub_view=lang_key" <?php if($sub_view=='lang_key'){?>class="active"<?php }?>><i class="fa fa-list"></i> Quản lý các từ khóa</a>
    <a href="<?php echo $url_page;?>&sub_view=lang_add" <?php if($sub_view=='lang_add'){?>class="active"<?php }?>><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm từ khóa mới</a>
</div>
<?php
include "page_".$sub_view.".php";
?>
