<?php
$func='view';if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
$url_cur=$this->cur_url;
?>
<div style="float:left;padding:10px;">
<?php if($func=='add'||$func=='edit'){
    $code_name='';
    $code_tip='';
    $code_id='';

    if(isset($_POST['code_name'])){
        $code_name=$_POST['code_name'];
        $code_tip=$_POST['code_tip'];
        $code_id=$_POST['code_id'];
        if($func=='add'){
            $q_add_code=$this->q("INSERT INTO `work_code` (`name`, `type`, `tip`, `return`) VALUES ('$code_name', '0', '$code_tip', '0');");
            if($q_add_code)
                echo $this->msg("Thêm mới thành công!");
            else
                echo $this->msg("Thêm mới thất bại!");
        }else{
            $q_update_code=$this->q("UPDATE `work_code` SET `name` = '$code_name', `tip` = '$code_tip' WHERE `id` = '$code_id';");
            if($q_update_code)
                echo $this->msg("Cập nhật thành công!");
            else
                echo $this->msg("Cập nhật không thành công!");
        }
    }

    if($func=='edit'){
        $code_id=$_GET['id'];
        $data_code=$this->q_data("SELECT * FROM `work_code` WHERE `id` = '$code_id' LIMIT 1");
        $code_name=$data_code['name'];
        $code_tip=$data_code['tip'];
    }
?>
<h3>Thêm mới hàm hoặc phương thức và biến</h3>
<form method="post" action="">
    <table>
        <tr>
            <td>Tên hàm</td>
            <td><input type="text" style="width:100%" id="code_name" name="code_name" value="<?php echo $code_name;?>" /></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea style="width:100%;height:150px;"  type="text" id="code_tip" name="code_tip"/><?php echo $code_tip;?></textarea></td>
        </tr>
    </table>
    <input name="func" type="hidden" value="<?php echo $func;?>"/>
    <input name="code_id" type="hidden" value="<?php echo $code_id;?>"/>
    <a href="<?php echo $url_cur;?>&func=view" class="buttonPro blue"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
    <?php if($func=='add'){?>
        <button class="buttonPro green"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button>
    <?php }else{?>
        <button class="buttonPro yellow"><i class="fa fa-edit" aria-hidden="true"></i> Cập nhật</button>
    <?php }?>
</form>
<?php }?>

<?php 
if($func=='view'||$func=='view_edit'){
    if($func=='view_edit'){
        if(isset($_GET['del'])){
            $id_del=$_GET['del'];
            $q_del_code=$this->q("DELETE FROM `work_code` WHERE `id` = '$id_del';");
            if($q_del_code)
                echo $this->msg("Xóa thành công $id_del !");
            else
                echo $this->msg("Xóa thất bại $id_del !");
        }
    }
?>
<strong>Các phương thức trong CMS</strong> 
<a class="buttonPro small black" href="<?php echo $url_cur;?>&func=add"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
<?php if($func=='view'){?>
    <a class="buttonPro small black" href="<?php echo $url_cur;?>&func=view_edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
<?php }else{?>
    <a class="buttonPro small black" href="<?php echo $url_cur;?>&func=view"><i class="fa fa-list" aria-hidden="true"></i></a>
<?php }?>
<ul id="list_help">
    <?php
    $list_code=$this->q("SELECT * FROM `work_code`");
    while($code=mysqli_fetch_assoc($list_code)){
    ?>
    <li>
        <i class="icon fa fa-microchip" aria-hidden="true"></i>
        <span>
            <input type="hidden" id="func_<?php echo $code['id'];?>" style="display: inline-block;" value="<?php echo $code['name'];?>" /><?php echo $code['name'];?>
            <?php if($func=='view_edit'){?>
                <a href="<?php echo $url_cur.'&func=edit&id='.$code['id'];?>" class="buttonPro small"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                <a href="<?php echo $url_cur.'&func=view_edit&del='.$code['id'];?>" class="buttonPro small"><i class="fa fa-trash" aria-hidden="true"></i></a>
            <?php }else{ echo $this->copy("func_".$code['id']); }?>
        </span>
        <div><?php echo $code['tip'];?></div>
    </li>
    <?php }?>
</ul>
<?php }?>
</div>