<?php
$url_cur=$this->cur_url;
$func='view';

$app_name='';
$app_url='';
$app_folder='';
$app_id='';

if(isset($_GET['func'])) $func=$_GET['func'];
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $query_del_app=$this->q("DELETE FROM carrotsy_work.`work_app` WHERE (`id` = '$id_del');");
    if($query_del_app)
        echo $this->msg("Xóa thành công ứng dụng $id_del !");
    else
        echo $this->msg("Xóa thất bại ứng dụng $id_del !");
}

if(isset($_POST['func'])){
    $func=$_POST['func'];
    $app_name=addslashes($_POST['app_name']);
    $app_url=$_POST['app_url'];
    $app_id=$_POST['app_id'];
    $app_folder=$_POST['app_folder'];
    if($func=='add'){
        $this->q("INSERT INTO carrotsy_work.`work_app` (`name`, `folder`,`url`) VALUES ('$app_name', '$app_folder','$app_url');");
        echo $this->msg("Thêm mới ứng dụng cms thành công!");
    }else{
        $this->q("UPDATE carrotsy_work.`work_app` SET `name` = '$app_name',`folder` = '$app_folder',`url`='$app_url' WHERE `id` = '$app_id';");
        echo $this->msg("Cập nhật ứng dụng cms thành công!");
    }
}

if($func=='edit'){
    $app_id=$_GET['id'];
    $data_app=$this->q_data("SELECT * FROM carrotsy_work.`work_app` WHERE `id` = '$app_id' LIMIT 1");
    $app_name=$data_app['name'];
    $app_url=$data_app['url'];
    $app_folder=$data_app['folder'];
}

if($func=='add'||$func=='edit'){
?>
<form style="width:auto;float:left;padding:10px" method="post" action="">
    <h3><?php if($func=='add'){?>Thêm mới ứng dụng CMS<?php }else{?>Cập nhật ứng dụng CMS<?php } ?></h3>
    <table>
        <tr>
            <td>Tên ứng dụng</td>
            <td><input type="text" name="app_name" id="app_name" value="<?php echo $app_name;?>"/></td>
            <td><?php echo $this->cp("app_name");?></td>
        </tr>
        <tr>
            <td>Biểu tượng</td>
            <td><input type="text"/></td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td>Url</td>
            <td><input type="text" name="app_url" id="app_url" value="<?php echo $app_url;?>"/></td>
            <td><?php echo $this->cp("app_url");?></td>
        </tr>
        <tr>
            <td>Thư mục cms</td>
            <td><input type="text" name="app_folder" id="app_folder" value="<?php echo $app_folder;?>"/></td>
            <td><?php echo $this->cp("app_folder");?></td>
        </tr>
    </table>
    <a class="buttonPro black" href="<?php echo $url_cur;?>"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
    <input name="func" type="hidden" value="<?php echo $func;?>"/>
    <input name="app_id" type="hidden" value="<?php echo $app_id;?>"/>
    <?php if($func=='add'){?>
        <button class="buttonPro green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</button>
    <?php }else{?>
        <button class="buttonPro orange"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button>
    <?php }?>
<form>
<?php
}

if($func=='view'){
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
        var id_book=$(this).attr("id_app");
        if(id_book!=null)arr_id.push(id_book);
    });
    
    <?php echo $this->ajax("function:'save_order_app',arr_id_app:JSON.stringify(arr_id)");?>
    $("#btn_save").hide();
}
</script>
<div class="cms_tool_page">
    <a class="buttonPro small green" href="<?php echo $url_cur;?>&func=add"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm ứng dụng cms</a>
    <button id="btn_save" onclick="save_all_item()" class="buttonPro small yellow"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại thứ tự</button>
</div>
<table id="list_app" style="width:auto;border-radius:3px">
    <tbody>
    <tr>
        <th>Tên</th>
        <th>Thư mục</th>
        <th>Url</th>
        <th>Thao tác</th>
    </tr>
    <?php
    $query_app=$this->q("SELECT * FROM carrotsy_work.`work_app` ORDER BY `order`");
    while($app=mysqli_fetch_assoc($query_app)){
    ?>
    <tr id_app="<?php echo $app['id'];?>" >
        <td class="short"><i class="fa fa-rocket" aria-hidden="true"></i> <?php echo $app['name'] ?></td>
        <td><?php echo $app['folder'] ?></td>
        <td><?php echo $app['url'] ?></td>
        <td>
            <a href="<?php echo $url_cur;?>&func=edit&id=<?php echo $app['id'];?>" class="buttonPro small yellow"><i class="fa fa-edit" aria-hidden="true"></i> Sửa</a>
            <a href="<?php echo $url_cur;?>&del=<?php echo $app['id'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
<?php }?>