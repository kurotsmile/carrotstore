<?php
$cur_url=$url.'?view=category';
$sub_view='list';
if(isset($_GET['sub_view'])){ $sub_view=$_GET['sub_view'];}
?>
<div class="menu_sub">
    <a <?php if($sub_view=='list'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&sub_view=list">Danh sách</a>
    <a <?php if($sub_view=='add'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&sub_view=add">Thêm mới chủ đề</a>
</div>

<?php
include "page_category_".$sub_view.".php";
?>