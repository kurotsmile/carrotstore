<?php
include "app_my_girl_template.php";

$langsel='vi';
$sexsel="0";
$func='';
$character_sex="1";
$disable="0";
$txt_sql_disable='';

if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
}

if(isset($_GET['disable_chat'])){
    $disable=$_GET['disable_chat'];
    $txt_sql_disable=" AND `disable`='$disable'";
}

if(isset($_GET['sex'])){
    $sexsel=$_GET['sex'];
}

if(isset($_GET['character_sex'])){
    $character_sex=$_GET['character_sex'];
}

if(isset($_POST['loc'])){
    $langsel=$_POST['lang'];
    $sexsel=$_POST['sex'];
    $func=$_POST['func'];
    $character_sex=$_POST['character_sex'];
    if($func!=''){
        $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `sex` = '$sexsel' AND `func` = '$func' AND `character_sex`='$character_sex' $txt_sql_disable ORDER BY `id` DESC");
    }else{
        $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `sex` = '$sexsel' AND `character_sex`='$character_sex' $txt_sql_disable ORDER BY `id` DESC");
    }
}else{
    $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `sex` = '$sexsel' AND `character_sex`='$character_sex' $txt_sql_disable ORDER BY `id` DESC");
}
?>
<form method="post" id="form_loc">
<div style="display: inline-block;float: left;margin: 2px;">
    <label>Đối tượng:</label> 
    <select name="sex">
        <option value="0" <?php if($sexsel=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($sexsel=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Giới tính nhân vật:</label> 
    <select name="character_sex">
        <option value="0" <?php if($character_sex=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($character_sex=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php     
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_array($query_list_lang)){?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Chức năng:</label> 
    <select name="func">
        <option value="" <?php if($func==''){?> selected="true"<?php }?>>All</option>
        <?php for($i=0;$i<count($data_app->msg_func);$i++){?>
        <option value="<?php echo $data_app->msg_func[$i]->key;?>" <?php if($func==$data_app->msg_func[$i]->key){?> selected="true"<?php }?>><?php echo $data_app->msg_func[$i]->value;?></option>
        <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <a href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel;?>&msg=1&func=<?php echo $func;?>&sex=<?php echo $sexsel; ?>&character_sex=<?php echo $character_sex;?>" class="link_button">Thêm Thoại (<?php echo $langsel;?>)</a>
</div>
</form>


<?php
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>func</th><th>chat</th><th>Character sex</th><th>Ver 1</th><th>Ver 2</th><th>Giới hạng</th><th>Audio</th><th>Disable</th><th>Action</th></tr>';
        while ($row = mysqli_fetch_array($result_tip)) {
            show_row_msg_prefab($row,$langsel);
        }
echo '</table>';
?>


