<?php
$func="list";
$url_cur=$this->cur_url;
if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
?>
<div class="cms_tool_page">
<a href="<?php echo $url_cur;?>&func=list" class="btn small <?php if($func=='list') echo 'gray';?>" ><i class="fa fa-list" aria-hidden="true"></i> Danh sách</a>
<a href="<?php echo $url_cur;?>&func=add" class="btn small <?php if($func=='add') echo 'gray';?>" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
</div>
<?php
include_once("page_currency_unit_".$func.".php");
?>