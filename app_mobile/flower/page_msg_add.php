<?php
$lang='vi';
$func='add';
$msg='';
$author='';
$id_edit='';

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $arr_data=$this->q_data("SELECT * FROM `flower` WHERE `id` = '$id_edit' LIMIT 1");
    $author=$arr_data['author'];
    $msg=$arr_data['msg'];
    $func='edit';
}

if(isset($_POST['submit_add'])){
    $func=$_POST['func'];
    $msg=addslashes($_POST['msg']);
    $author=addslashes($_POST['author']);
    $lang=$_POST['lang'];
    
    if($func=='add'){
        $add_msg=$this->q("INSERT INTO `flower` (`msg`, `author`,`lang`) VALUES ('$msg', '$author','$lang');");
        if($add_msg) echo $this->msg("Thêm châm ngôn thành công !!!");
        $msg='';
        $author='';
    }
    
    if($func=='edit'){
        $id_edit=$_POST['id_edit'];
        $update_msg=$this->q("UPDATE `flower` SET `msg` = '$msg', `author` = '$author', `lang` = '$lang' WHERE `id` = '$id_edit';");
        if($update_msg) echo $this->msg("Cập nhật châm ngôn thành công !!!");
    }
}
?>
<form method="post" id="frm_add">
    <p>
        <label>Nội dung châm ngôn</label><br />
        <textarea name="msg" style="width: 500px;height: 500px;"><?php echo $msg;?></textarea>
    </p>
    
    <p>
        <label>Tác giả</label><br />
        <input type="text" name="author" value="<?php echo $author;?>" />
    </p>
    
    <p>
        <label>Ngôn ngữ</label><br />
        <select name="lang">
        <?php
        $list_lang=$this->get_list_lang();
        for($i=0;$i<count($list_lang);$i++){
            $item_lang=$list_lang[$i];
            echo '<option value="'.$item_lang['key'].'">'.$item_lang['name'].'</option>';
        }
        ?>
        </select>
    </p>
    
    <p>
        <input type="hidden" name="func" value="<?php echo $func; ?>" />
        <?php  if($func=='add'){?>
            <input type="submit" value="Thêm mới" name="submit_add" class="buttonPro red" />
        <?php }else{?>
            <input type="submit" value="Cập nhật" name="submit_add" class="buttonPro red"/>
            <input type="hidden" value="<?php echo $id_edit;?>" name="id_edit" />
        <?php }?>
    </p>
</form>

<?php

?>