<?php
$cur_url=$this->cur_url.'&view=category';
$sub_view='list';
if(isset($_GET['sub_view'])){ $sub_view=$_GET['sub_view'];}
?>
<div class="menu_sub">
    <a <?php if($sub_view=='list'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&sub_view=list"><i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách</a>
    <a <?php if($sub_view=='add'){?>class="active"<?php }?> href="<?php echo $cur_url;?>&sub_view=add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới chủ đề</a>
</div>

<?php
include "page_category_".$sub_view.".php";
?>