<div method="post" class="bar_page" id="filter">
<?php
$lang='vi';
$lang_to='';
$url_cur=$url.'?view=lang&sub_view=val';
if(isset($_GET['lang']))$lang=$_GET['lang'];
if(isset($_GET['lang_to']))$lang_to=$_GET['lang_to'];
$query_all_country=mysqli_query($link,"SELECT `key`, `name` FROM carrotsy_virtuallover.`app_my_girl_country`");
while ($country=mysqli_fetch_assoc($query_all_country)) {
?>
    <a href="<?php echo $url_cur;?>&lang=<?php echo $country['key'];?>" <?php if($lang==$country['key']){ ?>style="color:yellow"<?php }?>><img style="float: left" src="<?php echo $url_carrot_store;?>/thumb.php?src=<?php echo $url_carrot_store;?>/app_mygirl/img/<?php echo $country['key'];?>.png&size=16x16&trim=1"><?php echo $country['name'];?></a>
<?php } ?>
</div>

<?php
if(isset($_POST['cr_val'])){
    $lang=$_POST['lang'];
    $cr_key=$_POST['cr_key'];
    $cr_val=$_POST['cr_val'];
    $arr_data_val=array();
    for($i=0;$i<count($cr_key);$i++){
        $key_data=$cr_key[$i];
        $arr_data_val[$key_data]=$cr_val[$i];
    }
    $val_data=json_encode($arr_data_val,JSON_UNESCAPED_UNICODE);
    $val_data=addslashes($val_data);
    $query_cr_val=mysqli_query($link,"SELECT `data` FROM `$table_lang_Val` WHERE `lang` = '$lang' LIMIT 1");
    $data_cr=mysqli_fetch_assoc($query_cr_val);
    if($data_cr==null){
        $query_add_val=mysqli_query($link,"INSERT INTO `$table_lang_Val` (`lang`, `data`) VALUES ('$lang', '$val_data');");
        echo msg("Thêm mới dữ liệu thành công!");
    }else{
        $query_add_val=mysqli_query($link,"UPDATE `$table_lang_Val` SET `data` = '$val_data' WHERE `lang` = '$lang' LIMIT 1;");
        echo msg("Cập nhật dữ liệu thành công!");
    }
}

$query_cr_key=mysqli_query($link,"SELECT `key` FROM `$table_lang_key`");
$query_cr_val=mysqli_query($link,"SELECT `data` FROM `$table_lang_Val` WHERE `lang` = '$lang'");
$data_cr_val=mysqli_fetch_assoc($query_cr_val);
$data_cr=(array)json_decode($data_cr_val['data']);
?>

<form method="post" style="width: 100%;float:left">
<table style="width: 100%;float:left">
<?php
while ($key=mysqli_fetch_assoc($query_cr_key)) {
    $key_cr=$key['key'];
    $val_cr='';
    if(isset($data_cr[$key_cr])) $val_cr=$data_cr[$key_cr];
?>
    <tr>
        <td style="width:20%;"><a href=""><i class="fa fa-flag" aria-hidden="true"></i> <?php echo $key['key'];?></a></td>
        <td>
            <input type="text" style="width: 90%;float:left" value="<?php echo $val_cr;?>" name="cr_val[]" />
            <input type="hidden" value="<?php echo $key['key'];?>" name="cr_key[]" />
        </td>
        <td>
        <?php 
        if($lang_to!=''){
            $link_lang="https://translate.google.com/?sl=$lang&tl=".$lang_to."&text=".urldecode($val_cr);
        ?>
        <a href="<?php echo $link_lang;?>" onclick="$(this).removeClass('blue');" target="_blank" class="buttonPro small blue"><i class="fa fa-language" aria-hidden="true"></i> Dịch (<?php echo $lang_to;?>)</a>
        <?php }?>
        </td>
    </tr>
<?php
}
?>
<tr>
    <td><input type="hidden" name="lang" value="<?php echo $lang;?>"></td>
    <td><button class="buttonPro yellow">Cập nhật</button></td>
</tr>

<tr>
    <td>Chọn ngôn ngữ dịch sang</td>
    <td>
    <form id="frm_lang_to" action="">
    <select name="lang_to" id="lang_to" onchange="go_to_lang(this)">
    <?php
        $query_all_country=mysqli_query($link,"SELECT `key`, `name` FROM carrotsy_virtuallover.`app_my_girl_country`");
        while ($country=mysqli_fetch_assoc($query_all_country)) {
    ?>
        <option value="<?php echo $country['key'];?>" <?php if($lang_to==$country['key']){ ?>selected=true<?php }?>><?php echo $country['name'];?></option>
    <?php } ?>
    </select>
    <form>
    </td>
    <script>
    function go_to_lang(emp){
        window.location.href = "<?php echo $url_cur;?>&lang=<?php echo $lang;?>&lang_to="+emp.value;
    }
    </script>
</tr>
</table>
</form>