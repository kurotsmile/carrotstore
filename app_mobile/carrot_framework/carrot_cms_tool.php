<?php
$list_tool=array();

$item_tool=new stdClass();
$item_tool->{"id"}="backup_database";
$item_tool->{"icon"}="fa-database";
$item_tool->{"name"}="Sao lưu dữ liệu";
array_push($list_tool,$item_tool);

$item_tool=new stdClass();
$item_tool->{"id"}="bug";
$item_tool->{"icon"}="fa-bug";
$item_tool->{"name"}="Xem lỗi máy chủ ứng dụng";
array_push($list_tool,$item_tool);

$item_tool=new stdClass();
$item_tool->{"id"}="database";
$item_tool->{"icon"}="fa-table";
$item_tool->{"name"}="Cơ sở dũ liệu";
array_push($list_tool,$item_tool);

$item_tool=new stdClass();
$item_tool->{"id"}="sql_cmd";
$item_tool->{"icon"}="fa-terminal";
$item_tool->{"name"}="Thực hiện lệnh SQL";
array_push($list_tool,$item_tool);

for($i=0;$i<count($list_tool);$i++){
    $tool=$list_tool[$i];
?>
<a href="<?php echo $this->cur_url;?>&tool=<?php echo $tool->id;?>" class="cms_tool">
    <i class="fa <?php echo $tool->icon;?> icon" aria-hidden="true"></i>
    <strong><?php echo $tool->name;?></strong><br/>
    <span><?php echo $tool->name;?></span>
</a>
<?php }?>
<?php
$tool='';
if(isset($_GET['tool'])){
    $tool=$_GET['tool'];
    echo '<div style="width: 100%;float:left">';
    include_once("carrot_cms_tool_".$tool.".php");
    echo '</div>';
}
?>