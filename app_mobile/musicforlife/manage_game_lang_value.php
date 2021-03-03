<?php
$edit_lang='';
$edit_key_sel='';
$lang_key_to='';

$url_cur=$url.'/index.php?view=game_lang_value';

if(isset($_GET['lang'])){
    $edit_lang=$_GET['lang'];
    if(isset($_GET['key'])) $edit_key_sel=$_GET['key'];
}

if(isset($_GET['lang_to'])){
    $lang_key_to=$_GET['lang_to'];
}
$query_list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country`");

?>
<h3> Cập nhật dữ liệu hiển thị của quốc gia (<?php echo $edit_lang; ?>)</h3><br />

<?php

if(isset($_POST['key'])){
    $key=$_POST['key'];
    $data=addslashes(json_encode($_POST,JSON_UNESCAPED_UNICODE));
    if(mysqli_num_rows(mysqli_query($link,"SELECT `lang` FROM carrotsy_music.`game_key_value` WHERE `lang`='$key' "))){
        $query_update_data=mysqli_query($link,"UPDATE carrotsy_music.`game_key_value` SET `data` = '$data' WHERE `lang` = '$key'  LIMIT 1;");
        if($query_update_data===true){
            echo 'Cập nhật dữ liệu giao diện thành công!';
            echo btn_add_work('com.carrot.runwithme',$key,'Other','edit');
        }else{
            echo 'Cập nhật dữ liệu giao diện thất bại!';
        }
    }else{
        $query_add_data=mysqli_query($link,"INSERT INTO carrotsy_music.`game_key_value` (`lang`, `data`) VALUES ('$key', '$data');");
        if($query_add_data===true){
            echo 'Thêm dữ liệu giao diện thành công!';
            echo btn_add_work('com.carrot.runwithme',$key,'Other','add');
        }else{
            echo 'Thêm dữ liệu giao diện thất bại!';
        }
    }
    

}
?>
<form method="post" name="update_data_display">
<table>
    <?php
    $data_display='';
    $query_data_display=mysqli_query($link,"SELECT `data` FROM carrotsy_music.`game_key_value` WHERE `lang` = '$edit_lang' LIMIT 1");
    $data_display=mysqli_fetch_array($query_data_display);
    $data_display=$data_display['data'];
    $data_display=json_decode($data_display,JSON_UNESCAPED_UNICODE);
                    
    $query_list_display_lang_data=mysqli_query($link,"SELECT * FROM carrotsy_music.`game_key_lang`");
    while($row=mysqli_fetch_assoc($query_list_display_lang_data)){
    ?>
        <tr <?php if($edit_key_sel==$row['key']){ ?>style="background-color: yellowgreen;"<?php }?> >
            <td><?php echo $row['key'];?></td>
            <td><input style="width: 100%;" id="inp_<?php echo $row['key'];?>" name="<?php echo $row['key'];?>" value="<?php if(isset($data_display[$row['key']])){ echo $data_display[$row['key']];}?>" /></td>
            <td>
                <a href="<?php echo $url;?>/index.php?view=lang_key&edit_id=<?php echo $row['id']; ?>&name_key=<?php echo $row['key']; ?>" class="buttonPro small"><i class="fa fa-edit"></i> sửa tag</a>
                <?php 
                if($lang_key_to!=''){
                    $txt_lang_to=$lang_key_to;
                    if($lang_key_to=='zh'){
                        $txt_lang_to='zh-CN';
                    }
                ?>
                <a href="https://translate.google.com/#view=home&op=translate&sl=<?php echo $edit_lang;?>&tl=<?php echo $txt_lang_to;?>&text=<?php echo $data_display[$row['key']];?>" target="_blank" class="buttonPro small yellow" onclick="$(this).css('color','red');"><i class="fa fa-language"></i> <?php echo $lang_key_to; ?></a>
                <?php }?>
            </td>
        </tr>
    <?php 
    }
    ?>
</table>
<input type="hidden" value="<?php echo $edit_lang;?>" name="key"/>
<input type="submit" value="Hoàn tất" class="buttonPro large green" />
</form>

<div class="box_form">
<label>Chọn ngôn ngữ dịch sang</label>
<select name="lang_to" onchange="change_lang_to(this);return false;">
    <?php
    while($row_lang=mysqli_fetch_assoc($query_list_country)){
    ?>
    <option value="<?php echo $row_lang['key']; ?>" <?php if($row_lang['key']==$lang_key_to){?>selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php 
    }
    ?>
</select>
<script>
function change_lang_to(emp){
    var val_lang=$(emp).val();
    window.location="<?php echo $url;?>/index.php?view=game_lang_value&lang=<?php echo $edit_lang;?>&lang_to="+val_lang;
}

</script>
</div>