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
    $get_msg=mysql_query("SELECT * FROM `flower` WHERE `id` = '$id_edit' LIMIT 1");
    $arr_data=mysql_fetch_array($get_msg);
    $author=$arr_data['author'];
    $msg=$arr_data['msg'];
    $func='edit';
    mysql_free_result($get_msg);
}

if(isset($_POST['submit_add'])){
    $func=$_POST['func'];
    $msg=addslashes($_POST['msg']);
    $author=addslashes($_POST['author']);
    $lang=$_POST['lang'];
    
    if($func=='add'){
        echo "Thêm châm ngôn thành công !!!";
        $msql_add_msg=mysql_query("INSERT INTO `flower` (`msg`, `author`,`lang`) VALUES ('$msg', '$author','$lang');");
        $msg='';
        $author='';
        mysql_free_result($msql_add_msg);
    }
    
    if($func=='edit'){
        echo "Cập nhật châm ngôn thành công !!!";
        $id_edit=$_POST['id_edit'];
        $msql_update_msg=mysql_query("UPDATE `flower` SET `msg` = '$msg', `author` = '$author', `active` = '0', `lang` = '$lang' WHERE `id` = '$id_edit';");
        mysql_free_result($msql_update_msg);
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
        for($i=0;$i<count($app_flower->list_lang);$i++)
        {
        ?>
            <option value="<?php echo $app_flower->list_lang[$i]->key; ?>" <?php if($app_flower->list_lang[$i]->key==$lang){?> selected="true" <?php } ?>><?php echo $app_flower->list_lang[$i]->name; ?></option>
        <?php
        }
        ?>
        </select>
    </p>
    
    <p>
        <input type="hidden" name="func" value="<?php echo $func; ?>" />
        <?php  if($func=='add'){?>
            <input type="submit" value="Thêm mới" name="submit_add" />
        <?php }else{?>
            <input type="submit" value="Cập nhật" name="submit_add" />
            <input type="hidden" value="<?php echo $id_edit;?>" name="id_edit" />
        <?php }?>
    </p>
</form>

<?php

?>