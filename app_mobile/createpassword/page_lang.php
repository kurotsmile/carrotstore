<?php
$cur_url=$this->cur_url;
$func='extension_data';if(isset($_GET['func'])) $func=$_GET['func'];
?>
<a class="buttonPro small <?php if($func=='extension_data'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=extension_data"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Dữ liệu ngôn ngữ thẻ cắm chrome</a>
<a class="buttonPro small <?php if($func=='app_data'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=app_data"><i class="fa fa-mobile" aria-hidden="true"></i> Dữ liệu ngôn ngữ ứng dụng</a>
<a class="buttonPro small <?php if($func=='extension_key'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=extension_key"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Từ khóa ngôn ngữ thẻ cắm chrome</a>
<a class="buttonPro small <?php if($func=='app_key'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=app_key"><i class="fa fa-mobile" aria-hidden="true"></i> Từ khóa ngôn ngữ nứng dụng</a>
<?php
include_once("page_lang_".$func.".php");
?>