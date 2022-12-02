<?php
include_once("carrot_form.php"); 

$func='view';if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
$url_cur=$this->cur_url;

?>
<div style="float:left;padding:10px;">
<?php 

if($func=='add'||$func=='edit'){
    $code_id='';if(isset($_GET['id'])) $code_id=$_GET['id'];

    $cr_frm=new carrot_form("help",$this);
    $cr_frm->set_title("Thêm mới hàm hoặc phương thức và biến");
    unset($_POST["func"]);
    $cr_frm->handle_post();
    if($code_id!=""){
        $data_code=$this->q_data("SELECT * FROM carrotsy_work.`work_code` WHERE `id` = '$code_id' LIMIT 1");
        $cr_frm->paser_table_mysql("work_code",$data_code,'carrotsy_work');
        $cr_frm->set_type("edit");
    }else{
        $cr_frm->paser_table_mysql("work_code",$_POST,'carrotsy_work');
        $cr_frm->set_type("add");
    }

    $id_field=$cr_frm->get_field_by_id("id");
    $id_field->set_is_field_update();

    $func_field=new carrot_field('func');
    $func_field->set_val($func);
    $func_field->hide();
    $cr_frm->add_field($func_field);

    $name_field=$cr_frm->get_field_by_id("name");
    $name_field->set_title("Tên phương thức, biến");
    $name_field->set_required();

    echo $cr_frm->show();
}?>

<?php 
if($func=='view'||$func=='view_edit'){
    if($func=='view_edit'){
        if(isset($_GET['del'])){
            $id_del=$_GET['del'];
            $q_del_code=$this->q("DELETE FROM carrotsy_work.`work_code` WHERE `id` = '$id_del';");
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
    $list_code=$this->q("SELECT * FROM carrotsy_work.`work_code`");
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