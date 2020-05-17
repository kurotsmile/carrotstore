<?php
$user_name='';
$func='add';
$scores='0';
$lang='vi';

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['edit'])){
    $user_name=$_GET['edit'];
    $func='edit';
    $query_get_scores=mysql_query("SELECT * FROM `scores` WHERE `id_user` = '$user_name' and `lang`='$lang' LIMIT 1");
    $arr_data=mysql_fetch_array($query_get_scores);
    $scores=$arr_data['scores'];
    $lang=$_GET['lang'];
    mysql_free_result($query_get_scores);
}

if(isset($_POST['scores_submit'])){
    $user_name=$_POST['user_name'];
    $user_scores=$_POST['user_scores'];
    $lang=$_POST['lang'];
    
    if($func=='add'){
        echo 'Add scores success !!!';
        $query_add_scores=mysql_query("INSERT INTO `scores` (`id_user`, `scores`, `lang`) VALUES ('$user_name', '$user_scores', '$lang');");
        mysql_free_result($query_add_scores);
        exit;
    }   
    
    if($func=='edit'){
        echo 'Update scores success !!!';
        $query_update_scores=mysql_query("UPDATE `scores` SET `scores` = '$user_scores', `lang` = '$lang' WHERE `id_user` = '$user_name' AND `lang`='$lang' LIMIT 1;");
        mysql_free_result($query_update_scores);
        exit;
    }   
}
?>
<form id="frm_add" method="post">
    <p>
        <label>Tên người đăng</label><br />
        <input value="<?php echo $user_name;?>" name="user_name" />
    </p>
    
    
    <p>
        <label>Điểm số</label><br />
        <input value="<?php echo $scores;?>" name="user_scores" />
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
        <?php if($func=='add'){?>
        <input type="submit" value="Thêm mới" name="scores_submit" class="buttonPro green" />
        <?php }else{?>
        <input type="hidden" name="id_update" value="<?php echo $user_name;?>" />
        <input type="submit" value="Cập nhật" name="scores_submit" class="buttonPro green"/>
        <?php }?>
        <input type="hidden" name="func" value="<?php echo $func?>" />
    </p>
</form>