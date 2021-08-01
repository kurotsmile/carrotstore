<?php 
$func='list';
$share_id='';
$share_name='';
$share_icon='';
$share_icon_img=$this->url_carrot_store.'/images/128.png';
$share_url_web='';
$share_url_android='';
$share_url_window='';
$share_url_ios='';


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
    $share_url_web=addslashes($_POST['share_url_web']);
    $share_url_window=addslashes($_POST['share_url_window']);
    $share_url_android=addslashes($_POST['share_url_android']);
    $share_url_ios=addslashes($_POST['share_url_ios']);

    if($func=='add'){
        $query_add_share=$this->q("INSERT INTO carrotsy_virtuallover.`share` (`icon_css`, `name`, `web`,`android`,`window`,`ios`) VALUES ('$share_icon', '$share_name', '$share_url_web','$share_url_android','$share_url_window','$share_url_ios');");
        if($query_add_share)echo $this->msg("Thêm công cụ chia sẻ thành công!");
        $share_id=mysqli_insert_id($this->link_mysql);
    }

    if($func=='edit'){
        $share_id=$_POST['share_id'];
        $query_update_share=$this->q("UPDATE carrotsy_virtuallover.`share` SET  `icon_css` = '$share_icon', `name` = '$share_name', `web` = '$share_url_web' ,`android`='$share_url_android',`window`='$share_url_window',`ios`='$share_url_ios' WHERE `id` = '$share_id';");
        if($query_update_share) echo $this->msg("Cập nhật công cụ chia sẻ thành công!");
    }

    if(isset($_FILES['share_icon_img'])){
        $path_upload="share_icon/".$share_id.".png";
        move_uploaded_file($_FILES['share_icon_img']['tmp_name'], $path_upload);
    }
}

if($func=='edit'){
    $share_id=$_GET['id'];
    $data_share=$this->q_data("SELECT * FROM carrotsy_virtuallover.`share` WHERE `id` = '$share_id' LIMIT 1");
    $share_name=$data_share['name'];
    $share_icon=$data_share['icon_css'];
    $share_url_web=$data_share['web'];
    $share_url_window=$data_share['window'];
    $share_url_android=$data_share['android'];
    $share_url_ios=$data_share['ios'];
    if(file_exists('share_icon/'.$share_id.'.png')) $share_icon_img=$this->url_carrot_store.'/app_mobile/carrot_framework/share_icon/'.$share_id.'.png';
}
?>
<div style="float:left;margin: 10px;">
    <h2>Thêm mới công cụ chia sẻ</h2>
    <form style="float:left;width:auto" method="post" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Tên mạng xã hội chia sẻ</td>
            <td><input type="text" name="share_name" id="share_name" value="<?php echo $share_name;?>"/></td>
            <td><?php echo $this->cp('share_name'); ?></td>
        </tr>
        <tr>
            <td>Biểu tượng (img)</td>
            <td>
                <?php if($share_icon_img!=''){?>
                    <img src="<?php echo $share_icon_img;?>"/><br/>
                <?php }?>
                <input type="file" name="share_icon_img" id="share_icon_img"/>
            </td>
            <td> </td>
        </tr>
        <tr>
            <td>Biểu tượng (css)</td>
            <td>
                <input type="text" name="share_icon" id="share_icon" value="<?php echo $share_icon;?>"/>
            </td>
            <td><?php echo $this->cp('share_icon'); ?></td>
        </tr>
        <tr>
            <td><i class="fa fa-chrome" aria-hidden="true"></i> Liên kết chia sẻ Web <br/>(với tham số <b>{url}</b> là đường dẫn muốn chia sẻ)</td>
            <td><input type="text" name="share_url_web" id="share_url_web" value="<?php echo $share_url_web;?>"/></td>
            <td><?php echo $this->cp('share_url_web'); ?></td>
        </tr>
        <tr>
            <td><i class="fa fa-android" aria-hidden="true"></i> Liên kết chia sẻ Android <br/>(với tham số <b>{url}</b> là đường dẫn muốn chia sẻ)</td>
            <td><input type="text" name="share_url_android" id="share_url_android" value="<?php echo $share_url_android;?>"/></td>
            <td><?php echo $this->cp('share_url_android'); ?></td>
        </tr>
        <tr>
            <td><i class="fa fa-windows" aria-hidden="true"></i> Liên kết chia sẻ Window <br/>(với tham số <b>{url}</b> là đường dẫn muốn chia sẻ)</td>
            <td><input type="text" name="share_url_window" id="share_url_window" value="<?php echo $share_url_window;?>"/></td>
            <td><?php echo $this->cp('share_url_window'); ?></td>
        </tr>
        <tr>
            <td><i class="fa fa-apple" aria-hidden="true"></i> Liên kết chia sẻ ios <br/>(với tham số <b>{url}</b> là đường dẫn muốn chia sẻ)</td>
            <td><input type="text" name="share_url_ios" id="share_url_ios" value="<?php echo $share_url_ios;?>"/></td>
            <td><?php echo $this->cp('share_url_ios'); ?></td>
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
        <th>Biểu tượng (img)</th>
        <th>Biểu tượng (css)</th>
        <th>Tên</th>
        <th>Câu trúc đường dẫn chia sẻ</th>
        <th>Thao tác</th>
    </tr>
    <?php 
        while($s=mysqli_fetch_assoc($list_share)){
            $share_id=$s['id'];
            $url_icon_share=$this->url_carrot_store.'/images/72.png'
    ?>
    <tr id_share="<?php echo $s['id'];?>">
        <td>
            <?php
            if(file_exists('share_icon/'.$share_id.'.png')) $url_icon_share=$this->url_carrot_store.'/app_mobile/carrot_framework/share_icon/'.$share_id.'.png';
            echo '<img style="width:50px;" src="'.$url_icon_share.'"/>';
            ?>
        </td>
        <td><i class="fa <?php echo $s['icon_css'];?>" aria-hidden="true"></i></td>
        <td><?php echo $s['name'];?></td>
        <td>
            <?php if($s['web']!=''){?><a href="<?php echo $s['web'];?>" target="_blank"><i class="fa fa-chrome" aria-hidden="true"></i> <?php echo $s['web'];?></a><br/><?php }?>
            <?php if($s['android']!=''){?><a href="<?php echo $s['android'];?>" target="_blank"><i class="fa fa-android" aria-hidden="true"></i> <?php echo $s['android'];?></a><br/><?php }?>
            <?php if($s['window']!=''){?><a href="<?php echo $s['window'];?>" target="_blank"><i class="fa fa-windows" aria-hidden="true"></i> <?php echo $s['window'];?></a><br/><?php }?>
            <?php if($s['ios']!=''){?><a href="<?php echo $s['ios'];?>" target="_blank"><i class="fa fa-apple" aria-hidden="true"></i> <?php echo $s['ios'];?></a><br/><?php }?>
        </td>
        <td>
            <a href="<?php echo $cur_url;?>&func=edit&id=<?php echo $s['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
            <a href="<?php echo $cur_url;?>&func=del&id=<?php echo $s['id'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>
<?php }?>