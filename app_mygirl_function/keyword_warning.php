<?php
$sel_lang='en';
$txt_query_lang=" AND `lang` = '$sel_lang'";
$sub_view='add';

if(isset($_GET['view'])){
    $sub_view=$_GET['view'];
}

if(isset($_GET['lang'])){
    $sel_lang=$_GET['lang'];
    $txt_query_lang=" AND `lang` = '$sel_lang'";
}


if(isset($_GET['key'])){
    $key=$_GET['key'];
    $sel_lang=$_GET['lang_sel'];
    $query_add_key=mysqli_query($link,"INSERT INTO `app_my_girl_keyword_warning` (`key`, `lang`) VALUES ('$key', '$sel_lang');");
    if($query_add_key){
        echo show_alert("Thêm thành công từ khóa","alert");
    }
}

if(isset($_GET['delete'])){
    $key=$_GET['delete'];
    $sel_lang=$_GET['lang'];
    $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_keyword_warning` WHERE `key` = '$key'  AND `lang` = '$sel_lang' LIMIT 1;");
    
}

if(isset($_GET['active_os'])){
    $key=$_GET['active_os'];
    $langsel=$_GET['lang'];
    $os=$_GET['os'];
    $os_value=$_GET['val'];
    $query_updat_msg=mysqli_query($link,"UPDATE `app_my_girl_msg_$langsel` SET `$os` = '$os_value' WHERE `chat` LIKE '%$key%' AND `effect`!='2' ;");
    $query_updat=mysqli_query($link,"UPDATE `app_my_girl_$langsel` SET `$os` = '$os_value' WHERE `chat` LIKE '%$key%' AND `effect`!='2' ;");
    if($query_updat){
        echo show_alert("Thiết lập thành công từ khóa '$key' trên $os !","alert");
    }
}

if(isset($_GET['active_os_all'])){
    $os=$_GET['os'];
    $os_value=$_GET['active_os_all'];
    $list_key=mysqli_query($link,"Select * from `app_my_girl_keyword_warning`");
    $txt_msg='';
    while($row_key=mysqli_fetch_array($list_key)){
        $key=$row_key['key'];
        $lang=$row_key['lang'];
        $query_updat_msg=mysqli_query($link,"UPDATE `app_my_girl_msg_$lang` SET `$os` = '$os_value' WHERE `chat` LIKE '%$key%';");
        echo mysql_error();
        $query_updat2=mysqli_query($link,"UPDATE `app_my_girl_$lang` SET `$os` = '$os_value' WHERE `chat` LIKE '%$key%' AND  `effect`!='2';");
        echo mysql_error();
        $query_updat=mysqli_query($link,"UPDATE `app_my_girl_$lang` SET `$os` = '$os_value' WHERE `text` LIKE '%$key%' AND `effect`!='2';");
        if($query_updat){
            $txt_msg.="Thiết lập thành công từ khóa '$key' trên $os ! cho quốc gia ($lang)<br/>";
        }
    }
    echo show_alert($txt_msg,"alert");
}


if($sub_view=='add'){
?>
<div class="body">
<h3>Cảnh báo từ khóa nhạy cảm</h3>

<form style="width: 40%;float: left;" name="frm_month_act" id="form_loc" action="<?php echo $url;?>/app_my_girl_handling.php"  method="get">
    <p>
        <label>Từ khóa:</label>
        <input type="text" value="" name="key" />
    </p>
    
    <p>
        Ngôn ngữ:<br />
        <select name="lang_sel" >
        <?php
        $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while($l=mysqli_fetch_array($list_country)){
            $langsel=$l['key'];
            ?>
            <option value="<?php echo $langsel;?>" <?php if($sel_lang==$langsel){ echo 'selected="true"'; } ?>><?php echo $l['name'];?></option>';
            <?php
        }
        ?>
        </select>
    </p>
    
    <p><br />
        <input type="submit" value="Thêm từ khóa" style="width: 150px !important;" class="buttonPro blue"/>
        <input type="hidden" value="keyword_warning" name="func" />
    </p>
</form>

<p style="float: left;width: 40%;" id="form_loc">
    <strong>Thao tác</strong>
    <br />
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os_all=0&os=os_ios" class="buttonPro small yellow"><i class="fa fa-apple" aria-hidden="true"></i> Hiện tất cả trên Ios</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os_all=1&os=os_ios" class="buttonPro small blue"><i class="fa fa-apple" aria-hidden="true"></i> Ẩn tất cả trên Ios</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os_all=0&os=os_window" class="buttonPro small yellow"><i class="fa fa-windows" aria-hidden="true"></i> Hiện tất cả Window</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os_all=1&os=os_window" class="buttonPro small blue"><i class="fa fa-windows" aria-hidden="true"></i> Ẩn tất cả Window</a>
    <br /><br />
    <strong>Hiển thị theo quốc gia</strong><br />
        <?php
        $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while($l=mysqli_fetch_array($list_country)){
            $langsel=$l['key'];
            ?>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&lang=<?php echo $langsel;?>" class="buttonPro small <?php if($sel_lang==$langsel){ echo 'blue';} ?>" <?php if($sel_lang==$langsel){ echo 'selected="true"'; } ?>> <img src="<?php echo thumb('app_mygirl/img/'.$l['key'].'.png','10x10');?>"/> (<?php echo $l['key'];?>) <?php echo $l['name'];?></a>
            <?php
        }
        ?>
</p>

</div>

<table>
<tr>
    <th>Từ khóa</th>
    <th>Ngôn ngữ</th>
    <th>Kiểm tra hiển thị</th>
    <th>Kiểm tra không hiển thị</th>
    <th>Thao tác</th>
</tr>
<?php
$list_key=mysqli_query($link,"Select * from `app_my_girl_keyword_warning` WHERE 1=1 $txt_query_lang");
while($row_key=mysqli_fetch_array($list_key)){
    ?>
    <tr>
        <td><?php echo $row_key['key'];?></td>
        <td><?php echo $row_key['lang'];?></td>
        <td>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&view=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_ios&val=0" class="buttonPro small yellow"><i class="fa fa-apple" aria-hidden="true"></i> hiện Ios</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&view=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_window&val=0" class="buttonPro small yellow"><i class="fa fa-windows" aria-hidden="true"></i> hiện Window</a>
        </td>
        <td>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&view=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_ios&val=1" class="buttonPro small blue"><i class="fa fa-apple" aria-hidden="true"></i> Không hiện Ios</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&view=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_window&val=1" class="buttonPro small blue"><i class="fa fa-windows" aria-hidden="true"></i> Không hiện Window</a>
        </td>
        <td>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_ios&val=0" class="buttonPro small yellow"><i class="fa fa-apple" aria-hidden="true"></i> Hiện Ios</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_ios&val=1" class="buttonPro small blue"><i class="fa fa-apple" aria-hidden="true"></i> Ẩn Ios</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_window&val=0" class="buttonPro small yellow"><i class="fa fa-windows" aria-hidden="true"></i> Hiện Window</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&active_os=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>&os=os_window&val=1" class="buttonPro small blue"><i class="fa fa-windows" aria-hidden="true"></i> Ẩn Window</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&delete=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php
}

if($sub_view!='add'){
$key=$_GET['view'];
$langsel=$_GET['lang'];
$os=$_GET['os'];
$os_value=$_GET['val'];
$list_key=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `chat` LIKE '%$key%' AND `$os`='$os_value' AND `text` LIKE '%$key%' AND `effect`!='2'");
$txt_show_on='được hiển thị';
if($os_value=='1'){
    $txt_show_on='không được hiển thị';
}
echo show_alert("Xem các câu trò chuyện $txt_show_on trên $os với từ khóa '$key' ở quốc gia ($langsel)","info");
?>
<a class="buttonPro" href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
<br />
<strong>Trò chuyện</strong>
<table style="width: auto;">
<?php
while($row_key=mysqli_fetch_array($list_key)){
?>
<tr>
    <?php echo show_row_chat_prefab($link,$row_key,$langsel,''); ?>
</tr>
<?php
}
?>
</table>


<strong>Câu thoại</strong>
<table style="width: auto;">
<?php
$list_key_msg=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `chat` LIKE '%$key%' AND `$os`='$os_value' AND `text` LIKE '%$key%' ");
while($row_key=mysqli_fetch_array($list_key_msg)){
?>
<tr>
    <?php echo show_row_msg_prefab($link,$row_key,$langsel,''); ?>
</tr>
<?php
}
?>
</table>
<?php
}