<?php
$url_cur=$this->cur_url;
$func='vl';
if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
?>
<div class="cms_tool_page">
<a href="<?php echo $url_cur;?>&func=vl" class="btn small <?php if($func=='vl') echo 'gray';?>" ><i class="fa fa-language" aria-hidden="true"></i> Virtual lover</a>
<a href="<?php echo $url_cur;?>&func=carrot_fw" class="btn small <?php if($func=='carrot_fw') echo 'gray';?>" ><i class="fa fa-language" aria-hidden="true"></i> FrameWork Carrot</a>
</div>
<?php
$this->cur_url=$this->cur_url.'&func='.$func;
include_once("page_lang_".$func.".php");
?>