<?php
$tool='';
$cur_url=$url.'?view=page_tool';
if(isset($_GET['tool'])){
    $tool=$_GET['tool'];
}
?>
<div class="body-contain">
<?php
if($tool==''){
?>
<a href="<?php echo $cur_url?>&tool=run_mysql" class="box-tool">
    <i class="fa fa-code" aria-hidden="true"></i>
    <strong>Chạy lệnh mysql</strong>
    <span>Công cụ giúp chạy lệnh mysql trên toàn quốc gia với tham sống <b>{lang}</b></span>
</a>
<?php
}else{
    include "page_tool_".$tool.".php";
}
?>
</div>