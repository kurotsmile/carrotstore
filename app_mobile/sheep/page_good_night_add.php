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
    $data_good_night=$this->q_data("SELECT * FROM `good_night` WHERE `id` = '$id_edit' LIMIT 1");
    $msg=$data_good_night['msg'];
    $lang=$data_good_night['lang'];
    if($data_good_night['active']=='0'){
        $active='0';
    }else{
        $active='1';
    }
    $user_name=$data_good_night['user_name'];
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
        $add_good_night=$this->q("INSERT INTO `good_night` (`msg`, `lang`, `user_type`, `user_name`, `date`,`active`) VALUES ('$msg', '$lang', '$user_type', '$user_name',NOW(),'$active');");
        if($add_good_night) echo $this->msg('Thêm lời chúc ngủ ngon thành công!'); echo $this->msg("Thêm lời chúc ngủ ngon thất bại!");
    }
    
    if($func=='edit'){
        $id_update=$_POST['id_update'];
        $update_good_night=$this->q("UPDATE `good_night` SET `msg` = '$msg', `lang` = '$lang', `user_type` = '$user_type', `user_name` = '$user_name', `active` = '$active' WHERE `id` = '$id_update';");
        if($update_good_night) echo $this->msg('Cập nhật lời chúc ngủ ngon thành công!!!'); else echo $this->msg("Cập nhật lời chúc ngủ ngon thất bại!");
    }
}

?>
<form id="frm_add" method="post">
    <p>
        <label>Tên người đăng</label><br />
        <input type="text" value="<?php echo $user_name;?>" name="user_name" />
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
        <textarea name="msg" style="width: 500px; height:200px;"><?php echo $msg;?></textarea>
    </p>
    
    <p>
        <label>Ngôn ngữ</label><br />
        <select name="lang">
        <?php
        $list_lang=$this->get_list_lang();
        for($i=0;$i<count($list_lang);$i++){
            $item_lang=$list_lang[$i];
            $key_lang=$item_lang['key'];
        ?>
            <option value="<?php echo $key_lang;?>" <?php if($lang==$key_lang){?>selected="true"<?php }?> ><?php echo $item_lang['name']; ?></option>
        <?php }?>
        </select>
    </p>

    <p>
        <label>Tình trạng kích hoặt</label><br />
        <input type="checkbox" <?php if($active=='0'){?>checked="true"<?php } ?> name="active" />
    </p>
    
    <p>
        <?php if($func=='add'){?>
        <input type="submit" value="Thêm mới" name="good_night" class="buttonPro green" />
        <?php }else{?>
        <input type="hidden" name="id_update" value="<?php echo $id_edit;?>" />
        <input type="submit" value="Cập nhật" name="good_night" class="buttonPro yellow"/>
        <?php }?>
        <input type="hidden" name="func" value="<?php echo $func?>" />
    </p>
</form>