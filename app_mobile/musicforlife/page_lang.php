<?php
$cur_url=$this->cur_url;
$func='app';if(isset($_GET['func'])) $func=$_GET['func'];
?>
<a class="buttonPro small <?php if($func=='app'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=app"><i class="fa fa-motorcycle" aria-hidden="true"></i> Dữ liệu ngôn ngữ ứng dụng</a>
<a class="buttonPro small <?php if($func=='game'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=game"><i class="fa fa-gamepad" aria-hidden="true"></i> Dữ liệu ngôn ngữ trò chơi</a>
<a class="buttonPro small <?php if($func=='app_key'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=app_key"><i class="fa fa-motorcycle" aria-hidden="true"></i> Từ khóa ngôn ngữ ứng dụng</a>
<a class="buttonPro small <?php if($func=='game_key'){?>blue<?php }?>" href="<?php echo $cur_url;?>&func=game_key"><i class="fa fa-gamepad" aria-hidden="true"></i> Từ khóa ngôn ngữ trò chơi</a>
<?php
include_once("page_lang_".$func.".php");
?>