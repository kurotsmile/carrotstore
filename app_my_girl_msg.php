<?php
include "app_my_girl_template.php";
$langsel='vi';
$sexsel="";
$func='';
$limit_date='';
$limit_month=date('m');
$character_sex="";
$disable="0";
$txt_sql_query='';

if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
}

if(isset($_GET['disable_chat'])){
    $disable=$_GET['disable_chat'];
    $txt_sql_query=" AND `disable`='$disable'";
}

if(isset($_GET['sex']))$sexsel=$_GET['sex'];
if(isset($_GET['character_sex']))$character_sex=$_GET['character_sex'];
if(isset($_GET['limit_month']))$limit_month=$_GET['limit_month'];
if(isset($_GET['limit_date']))$limit_date=$_GET['limit_date'];

if(isset($_POST['loc'])){
    $langsel=$_POST['lang'];
    $sexsel=$_POST['sex'];
    $func=$_POST['func'];
    $character_sex=$_POST['character_sex'];
    $limit_date=$_POST['limit_date'];
    $limit_month=$_POST['limit_month'];
}

if($func!='') $txt_sql_query.=" AND `func`='$func' ";
if($character_sex!='') $txt_sql_query.=" AND `character_sex`='$character_sex' ";
if($sexsel!='') $txt_sql_query.=" AND `sex`='$sexsel' ";
if($limit_date!='') $txt_sql_query.=" AND `limit_date`='$limit_date' ";
if($limit_month!='') $txt_sql_query.=" AND `limit_month`='$limit_month' ";

$query_msg=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE 0=0 $txt_sql_query ORDER BY `id` DESC");
?>
<form method="post" id="form_loc">
<div style="display: inline-block;float: left;margin: 2px;">
    <label>Đối tượng:</label> 
    <select name="sex">
        <option value="" <?php if($sexsel==''){?> selected="true"<?php }?>>Tất cả</option>
        <option value="0" <?php if($sexsel=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($sexsel=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Giới tính nhân vật:</label> 
    <select name="character_sex">
        <option value="" <?php if($character_sex==''){?> selected="true"<?php }?>>Tất cả</option>
        <option value="0" <?php if($character_sex=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($character_sex=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php     
    $query_list_lang=mysqli_query($link,"SELECT `key`,`name` FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_assoc($query_list_lang)){?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Chức năng:</label> 
    <?php
    $query_func_msg=mysqli_query($link,"SELECT `func` FROM `app_my_girl_msg_$langsel` GROUP BY `func`");
    ?>
    <select name="func">
        <option value="" <?php if($func==''){?> selected="true"<?php }?>>Tất cả</option>
        <?php while($row_func=mysqli_fetch_assoc($query_func_msg)){?>
        <option value="<?php echo $row_func['func'];?>" <?php if($func==$row_func['func']){?> selected="true"<?php }?>><?php echo $row_func['func'];?></option>
        <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Ngày:</label> 
    <select name="limit_date">
        <option value="" <?php if($func==''){?> selected="true"<?php }?>>Tất cả</option>
        <?php for($i=1;$i<31;$i++){?>
        <option value="<?php echo $i;?>" <?php if($limit_date==$i){?> selected="true"<?php }?>><?php echo $i;?></option>
        <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Tháng:</label> 
    <select name="limit_month">
        <option value="" <?php if($func==''){?> selected="true"<?php }?>>Tất cả</option>
        <?php for($i=1;$i<13;$i++){?>
        <option value="<?php echo $i;?>" <?php if($limit_month==$i){?> selected="true"<?php }?>><?php echo $i;?></option>
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
        while ($row = mysqli_fetch_assoc($query_msg)) {
            show_row_msg_prefab($link,$row,$langsel);
        }
echo '</table>';

?>
