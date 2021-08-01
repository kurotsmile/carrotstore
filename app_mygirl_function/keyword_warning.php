<?php
$sel_lang='en';
$txt_query_lang=" AND `lang` = '$sel_lang'";
$sub_view='add';
$keyword='';

if(isset($_GET['view']))$sub_view=$_GET['view'];
if($sub_view=='edit') $keyword=$_GET['key'];

if(isset($_GET['lang'])){
    $sel_lang=$_GET['lang'];
    $txt_query_lang=" AND `lang` = '$sel_lang'";
}

if(isset($_POST['key'])){
    $keyword=addslashes($_POST['key']);
    $sel_lang=$_POST['lang_sel'];
    $sub_view=$_POST['sub_view'];
    if($sub_view=='add'){
        $query_add_key=mysqli_query($link,"INSERT INTO `app_my_girl_keyword_warning` (`key`, `lang`) VALUES ('$keyword', '$sel_lang');");
        if($query_add_key) echo show_alert("Thêm thành công từ khóa $keyword","alert");
    }else{
        $key_edit=$_POST['key_edit'];
        $query_update_key=mysqli_query($link,"UPDATE `app_my_girl_keyword_warning` SET `key` = '$keyword'  WHERE  `key` = '$key_edit' AND `lang` = '$sel_lang' LIMIT 1;");
        if($query_update_key) echo show_alert("Cập nhật thành công từ khóa $keyword","alert");
    }
}

if(isset($_GET['delete'])){
    $key=$_GET['delete'];
    $sel_lang=$_GET['lang'];
    $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_keyword_warning` WHERE `key` = '$key'  AND `lang` = '$sel_lang' LIMIT 1;");
    if($query_delete) echo show_alert("Đã xóa từ khóa $key","alert");
}



?>
<div class="body">
<h3>Cảnh báo từ khóa nhạy cảm</h3>
<form style="float: left;" name="frm_month_act" id="form_loc" action=""  method="POST">
    <p>
        <label>Từ khóa:</label>
        <input type="text" value="<?php echo $keyword;?>" name="key" />
    </p>
    
    <?php if($sub_view=='add'){?>
    <p>
        <label>Ngôn ngữ:</label><br/>
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
    <?php }?>

    <p><br />
        <?php if($sub_view=='add'){?>
            <button class="buttonPro blue"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới từ khóa</button>
        <?php }else{?>
            <button class="buttonPro orange"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật từ khóa</button>
            <a href="<?php echo $url_carrot_store;?>/app_my_girl_handling.php?func=keyword_warning&view=add&lang=<?php echo $sel_lang;?>" class="buttonPro"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
        <?php }?>
        <input type="hidden" value="keyword_warning" name="func" />
        <input type="hidden" value="<?php echo $sub_view;?>" name="sub_view" />
        <input type="hidden" value="<?php echo $keyword;?>" name="key_edit" />
        <input type="hidden" name="lang_sel" value="<?php echo $sel_lang;?>" >
    </p>
</form>
</div>

<table>
<tr>
    <th>Từ khóa</th>
    <th>Kiểm tra </th>
    <th>Thao tác</th>
</tr>
<?php
$list_key=mysqli_query($link,"Select * from `app_my_girl_keyword_warning` WHERE 1=1 $txt_query_lang");
while($row_key=mysqli_fetch_array($list_key)){
    ?>
    <tr>
        <td><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $row_key['key'];?></td>
        <td>
            <a onclick="$(this).addClass('black')" href="<?php echo $url_carrot_store;?>/app_mobile/sheep/?page=good_night&lang=<?php echo $row_key['lang']; ?>&active=0&keyword=<?php echo $row_key['key'];?>" target="_blank" class="buttonPro small purple"><i class="fa fa-pagelines" aria-hidden="true"></i> đếm cừu</a>
            <a onclick="$(this).addClass('black')" href="<?php echo $url;?>/app_my_girl_chat.php?lang=<?php echo $row_key['lang']; ?>&key_word=<?php echo $row_key['key'];?>" target="_blank" class="buttonPro small blue"><i class="fa fa-comments" aria-hidden="true"></i> Xem</a>
        </td>
        <td>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&view=edit&key=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>" class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
            <a href="<?php echo $url;?>/app_my_girl_handling.php?func=keyword_warning&delete=<?php echo $row_key['key'];?>&lang=<?php echo $row_key['lang']; ?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
}
?>
</table>