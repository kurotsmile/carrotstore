<?php 
$func='list';
$share_name='';
$share_icon='';
$share_url='';
$share_id='';

$cur_url=$this->cur_url;
if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];

?>
<div class="cms_menu_lang" style="background-color:#a8b6d2">
    <a href="<?php echo $cur_url;?>&func=list" class="buttonPro small <?php if($func=='list'){ echo 'black'; }?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách</a>
    <a href="<?php echo $cur_url;?>&func=add" class="buttonPro small <?php if($func=='add'){ echo 'black'; }?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
    <a id="btn_save" href="#" onclick="save_all_item();return false;"  class="buttonPro small yellow"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại thứ tự</a>
</div>
<?php

if($func=='del'){
    $id_delete=$_GET['id'];
    $query_del=$this->q("DELETE FROM carrotsy_virtuallover.`share` WHERE (`id` = '$id_delete');");
    if($query_del) echo $this->msg("Xóa thành công công cụ chia sẻ $id_delete !");
    $func='list';
}

if($func=='add'||$func=='edit'){

if(isset($_POST['share_name'])){
    $share_name=addslashes($_POST['share_name']);
    $share_icon=addslashes($_POST['share_icon']);
    $share_url=addslashes($_POST['share_url']);
    if($func=='add'){
        $query_add_share=$this->q("INSERT INTO carrotsy_virtuallover.`share` (`icon_css`, `name`, `url`) VALUES ('$share_icon', '$share_name', '$share_url');");
        if($query_add_share) echo $this->msg("Thêm công cụ chia sẻ thành công!");
    }

    if($func=='edit'){
        $share_id=$_POST['share_id'];
        $query_update_share=$this->q("UPDATE carrotsy_virtuallover.`share` SET  `icon_css` = '$share_icon', `name` = '$share_name', `url` = '$share_url' WHERE `id` = '$share_id';");
        if($query_update_share) echo $this->msg("Cập nhật công cụ chia sẻ thành công!");
    }
}

if($func=='edit'){
    $share_id=$_GET['id'];
    $data_share=$this->q_data("SELECT * FROM carrotsy_virtuallover.`share` WHERE `id` = '$share_id' LIMIT 1");
    $share_name=$data_share['name'];
    $share_icon=$data_share['icon_css'];
    $share_url=$data_share['url'];
}
?>
<div style="float:left;margin: 10px;">
    <h2>Thêm mới công cụ chia sẻ</h2>
    <form style="float:left;width:auto" method="post" action="">
    <table>
        <tr>
            <td>Tên mạng xã hội chia sẻ</td>
            <td><input type="text" name="share_name" id="share_name" value="<?php echo $share_name;?>"/></td>
            <td><?php echo $this->cp('share_name'); ?></td>
        </tr>
        <tr>
            <td>Biểu tượng (css)</td>
            <td><input type="text" name="share_icon" id="share_icon" value="<?php echo $share_icon;?>"/></td>
            <td><?php echo $this->cp('share_icon'); ?></td>
        </tr>
        <tr>
            <td>Liên kết chia sẻ <br/>(với tham số <b>{url}</b> là đường dẫn muốn chia sẻ)</td>
            <td><input type="text" name="share_url" id="share_url" value="<?php echo $share_url;?>"/></td>
            <td><?php echo $this->cp('share_url'); ?></td>
        </tr>
    </table>
    <?php if($func=='add'){?>
        <button class="buttonPro green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</button>
    <?php }else{?>
        <button class="buttonPro yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i> Cập nhật</button>
    <?php }?>
    <input type="hidden" value="<?php echo $share_id;?>" name="share_id" >
    </form>
<div>
<?php }?>

<?php 
if($func=='list'){
    $list_share=$this->q("SELECT * FROM carrotsy_virtuallover.`share` ORDER BY `order`");
?>
<script src="<?php echo $this->url_carrot_store;?>/js/jquery-ui.js"></script>
<script>
$(document).ready(function(){
    $("#btn_save").hide();
    $("tbody").sortable({change: function( event, ui ) {
        $("#btn_save").show();
    }});
});

function save_all_item(){
    var arr_id=[];
    $("tbody tr").each(function( index, value ){
        var id_share=$(this).attr("id_share");
        if(id_share!=null)arr_id.push(id_share);
    });
    
    <?php echo $this->ajax("function:'save_order_share',arr_id_share:JSON.stringify(arr_id)");?>
    $("#btn_save").hide();
}
</script>
<table>
    <tbody>
    <tr>
        <th>Biểu tượng</th>
        <th>Tên</th>
        <th>Câu trúc đường dẫn chia sẻ</th>
        <th>Thao tác</th>
    </tr>
    <?php 
        while($s=mysqli_fetch_assoc($list_share)){
    ?>
    <tr id_share="<?php echo $s['id'];?>">
        <td><i class="fa <?php echo $s['icon_css'];?>" aria-hidden="true"></i></td>
        <td><?php echo $s['name'];?></td>
        <td><a href="<?php echo $s['url'];?>" target="_blank"><?php echo $s['url'];?></a></td>
        <td>
            <a href="<?php echo $cur_url;?>&func=edit&id=<?php echo $s['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
            <a href="<?php echo $cur_url;?>&func=del&id=<?php echo $s['id'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>
<?php }?>