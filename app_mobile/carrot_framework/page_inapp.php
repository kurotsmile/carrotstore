
<?php
$func="order";
$url_cur=$this->cur_url;
if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
?>
<div class="cms_tool_page">
<a href="<?php echo $url_cur;?>&func=order" class="btn small <?php if($func=='order') echo 'gray';?>" ><i class="fa fa-shopping-bag" aria-hidden="true"></i> Đơn đặc hàng In-app</a>
<a href="<?php echo $url_cur;?>&func=order_music" class="btn small <?php if($func=='order_music') echo 'gray';?>" ><i class="fa fa-shopping-bag" aria-hidden="true"></i> Đơn đặc hàng Music</a>
<a href="<?php echo $url_cur;?>&func=list" class="btn small <?php if($func=='list') echo 'gray';?>" ><i class="fa fa-list" aria-hidden="true"></i> Danh sách các In-App</a>
<a href="<?php echo $url_cur;?>&func=lang" class="btn small <?php if($func=='lang') echo 'gray';?>" ><i class="fa fa-language" aria-hidden="true"></i> Ngôn ngữ In-App</a>
</div>
<?php
include_once("page_inapp_".$func.".php");
?>