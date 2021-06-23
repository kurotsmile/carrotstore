<?php
$key_search='';
$langsel='';
$sheep_enable='';

$sql_query_lang='';
$sql_query_enable='';

if(isset($_GET['key_word']))$key_search=$_GET['key_word'];
if(isset($_GET['lang']))$langsel=$_GET['lang'];
if(isset($_GET['sheep_enable'])) $sheep_enable=$_GET['sheep_enable'];
if(isset($_GET['sheep_enable']))if($_GET['sheep_enable']!='')$sheep_enable="on";
if($sheep_enable!="") $sql_query_enable=" AND `active`=0 "; else $sql_query_enable=" AND `active`=1 ";
if($langsel!='') $sql_query_lang=" AND `lang`='$langsel' ";

if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $query_del=mysqli_query($link,"DELETE FROM carrotsy_sheep.`good_night` WHERE (`id` = '$id_del');");
    echo msg("Xóa thành công '".$id_del."'!");
}

if(isset($_GET['act'])){
    $val=$_GET['val'];
    $id_act=$_GET['act'];
    $query_act=mysqli_query($link,"UPDATE carrotsy_sheep.`good_night` SET `active` = '$val' WHERE `id` = '$id_act';");
    if($val=="0") echo msg("Kích hoạt '".$id_act."'!"); else echo msg("Vô hiệu hóa '".$id_act."'!");
}

if($key_search=='')
    $query_list_goodnight=mysqli_query($link,"SELECT * FROM carrotsy_sheep.`good_night` WHERE 1=1   $sql_query_lang $sql_query_enable ORDER BY RAND() LIMIT 50");
else
    $query_list_goodnight=mysqli_query($link,"SELECT * FROM carrotsy_sheep.`good_night` WHERE `msg` LIKE '%$key_search%'  $sql_query_lang $sql_query_enable ORDER BY RAND() LIMIT 50");

?>
<form name="check_music" method="get" id="form_loc">
    <div style="display: inline-block;float: left;margin: 2px;width: 190px;">
        <label>Từ khóa <?php if($key_search!=''){ echo '<strong>'.$key_search.'</strong>';} ?></label> 
        <input type="text" value="<?php echo $key_search;?>" name="key_word" id="key_word" onchange="$('#btn_check_key').show();return false;"  />
    </div>

    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
        <label>Ngôn ngữ:</label> 
        <select name="lang" style="padding: 5px;">
        <option value="" <?php if($langsel==""){?> selected="true"<?php }?>>Tất cả</option>
        <?php     
        $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while($row_lang=mysqli_fetch_array($query_list_lang)){?>
        <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
        <?php }?>
        </select>
    </div>

    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
        <label>Kích hoạt:</label> 
        <input  type="checkbox" name="sheep_enable" <?php if($sheep_enable!=""){?>checked="checked"<?php } ?> />
    </div>

    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
        <input type="hidden" name='func' value="sheep">
        <button type="submit" class="buttonPro blue"><i class="fa fa-check-circle" aria-hidden="true"></i> Lọc</button>
    </div>
</form>
<table>
<?php
while($row_good_night=mysqli_fetch_assoc($query_list_goodnight)){
    ?>
    <tr>
        <td>
            <?php if($row_good_night['active']=='1'){?>
                <i class="fa fa-toggle-on" aria-hidden="true" style="color:red"></i>
            <?php }else{?>
                <i class="fa fa-toggle-on" aria-hidden="true" style="color:green"></i>
            <?php }?>
            <?php echo $row_good_night['msg']; ?>
        </td>
        <td><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row_good_night['date'];?></td>
        <td>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=sheep&del=<?php echo $row_good_night['id'];?>&lang=<?php echo $langsel;?>&sheep_enable=<?php echo $sheep_enable;?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
            <?php if($row_good_night['active']=='0'){?>
                <a href="<?php echo $url;?>/app_my_girl_handling.php?func=sheep&act=<?php echo $row_good_night['id'];?>&lang=<?php echo $langsel;?>&sheep_enable=<?php echo $sheep_enable;?>&val=1" class="buttonPro small red"><i class="fa fa-toggle-on" aria-hidden="true" ></i></a>
            <?php }else{?>
                <a href="<?php echo $url;?>/app_my_girl_handling.php?func=sheep&act=<?php echo $row_good_night['id'];?>&lang=<?php echo $langsel;?>&sheep_enable=<?php echo $sheep_enable;?>&val=0" class="buttonPro small green"><i class="fa fa-toggle-on" aria-hidden="true" ></i></a>
            <?php }?>
        </td>
    </tr>
    <?php
}
?>
</table>