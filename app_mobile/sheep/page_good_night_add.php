<?php
$user_name='';
$msg='';
$lang='';
$active='0';
$func='add';
$id_edit='';
$user_type='0';

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['edit'])){
    $func='edit';
    $id_edit=$_GET['edit'];
    $get_good_night=mysql_query("SELECT * FROM `good_night` WHERE `id` = '$id_edit' LIMIT 1");
    $arr_data=mysql_fetch_array($get_good_night);
    $msg=$arr_data['msg'];
    $lang=$arr_data['lang'];
    if($arr_data['active']=='0'){
        $active='0';
    }else{
        $active='1';
    }
    $user_name=$arr_data['user_name'];
    mysql_freeresult($get_good_night);
}

if(isset($_POST['good_night'])){
    $func=$_POST['func'];
    $user_name=$_POST['user_name'];
    $lang=$_POST['lang'];
    $msg=addslashes($_POST['msg']);
    $user_type=$_POST['user_type'];
    
    if(isset($_POST['active'])){
        $active='0';
    }else{
        $active='1';
    }
    
    if($func=='add'){
        echo 'Add good night success!!!';
        $add_good_night=mysql_query("INSERT INTO `good_night` (`msg`, `lang`, `user_type`, `user_name`, `date`,`active`) VALUES ('$msg', '$lang', '$user_type', '$user_name',NOW(),'$active');");
        mysql_freeresult($add_good_night);
    }
    
    if($func=='edit'){
        $id_update=$_POST['id_update'];
        echo 'Update good night success !!!';
        $update_good_night=mysql_query("UPDATE `good_night` SET `msg` = '$msg', `lang` = '$lang', `user_type` = '$user_type', `user_name` = '$user_name', `active` = '0' WHERE `id` = '$id_update';");
        mysql_free_result($update_good_night);
    }
}

?>
<form id="frm_add" method="post">
    <p>
        <label>Tên người đăng</label><br />
        <input value="<?php echo $user_name;?>" name="user_name" />
    </p>
    
    <p>
        <label>Loại tài khoản</label><br />
        <select name="user_type">
            <option value="0" <?php if($user_type=='0'){?>selected="true"<?php } ?> >Ẩn danh</option>
            <option value="1" <?php if($user_type=='1'){?>selected="true"<?php } ?> >Người dùng carrot</option>
        </select>
    </p>
    
    <p>
        <label>Thông điệp</label><br />
        <textarea name="msg" style="width: 500px; height: 500px;"><?php echo $msg;?></textarea>
    </p>
    
    <p>
        <label>Ngôn ngữ</label><br />
        <select name="lang">
        <?php 
        for($i=0;$i<count($app_sheep->list_lang);$i++){
        ?>
            <option value="<?php echo $app_sheep->list_lang[$i]->key; ?>" <?php if($lang==$app_sheep->list_lang[$i]->key){?>selected="true"<?php }?> ><?php echo $app_sheep->list_lang[$i]->name; ?></option>
        <?php }?>
        </select>
    </p>

    <p>
        <label>Tình trạng (bấm vào để không hoặt động)</label><br />
        <input type="checkbox" <?php if($active=='0'){?>checked="true"<?php } ?> name="active" />
    </p>
    
    <p>
        <?php if($func=='add'){?>
        <input type="submit" value="Thêm mới" name="good_night" class="buttonPro" />
        <?php }else{?>
        <input type="hidden" name="id_update" value="<?php echo $id_edit;?>" />
        <input type="submit" value="Cập nhật" name="good_night" class="buttonPro"/>
        <?php }?>
        <input type="hidden" name="func" value="<?php echo $func?>" />
    </p>
</form>