<?php
include "app_my_girl_template.php";
$ver='0';
$edit_lang='';
$edit_key_sel='';

if(isset($_GET['ver'])) $ver=$_GET['ver'];

if(isset($_GET['lang'])){
    $edit_lang=$_GET['lang'];
    if(isset($_GET['key'])) $edit_key_sel=$_GET['key'];
}

$url_cur=$url.'/app_my_girl_display_value.php';
if(isset($_GET['lang_to'])){
	$lang_key_to=$_GET['lang_to'];
	$lang_2=$_GET['lang_to'];
}else{
    $lang_key_to=$lang_2;
    $lang_2='';
}

$query_list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country`");
if($edit_lang==''){
    echo '<p><h3>Ngôn ngữ ở ứng dụng</h3><i>Đây là trang quản lý dữ liệu ngôn ngữ hiển thị ở giao diện ứng dụng</i></p>';
?>
<div style="float: left;width: 100%;">
<form id="form_loc"  method="get" >
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Hiển thị theo phiên bản ứng dụng</label>
        <select name="ver">
            <option value="0" <?php if($ver=='0'){?>selected="true"<?php }?>>Phiên bản 2d</option>
            <option value="1" <?php if($ver=='1'){?>selected="true"<?php }?>>Phiên bản 3d - Onichan</option>
            <option value="2" <?php if($ver=='2'){?>selected="true"<?php }?>>Phiên bản 3d - Pro</option>
            <option value="3" <?php if($ver=='3'){?>selected="true"<?php }?>>Phiên bản 3d - Ai (new)</option>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
            <button class="buttonPro blue">Lọc</button>
    </div>
</form>
</div>
<?php
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver$ver`='1'");
    while($row=mysqli_fetch_array($list_country)){
        $langsel=$row['key'];
        $query_data_display=mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '$langsel' AND `version`='".$ver."' LIMIT 1");
        
            ?>
            <div class="box_lang">
                <div class="title">
                    <a  href="<?php echo $url;?>/app_my_girl_display_value.php?lang=<?php echo $langsel;?>&ver=<?php echo $ver; ?>"><img src="<?php echo thumb('app_mygirl/img/'.$row['key'].'.png','20');?>"/></a>
                        <strong><?php echo  $row['name'];?></strong> (<?php echo  $row['key'];?>)<br />
                </div>
                
                <div class="body">
                    
                    <?php 
                    $data_display=mysqli_fetch_array($query_data_display);
                    $data_display=$data_display[0];
                    if($data_display==''){
                    ?>
                    <p style="font-size: 20px;"><i  class="fa fa-exclamation-triangle" aria-hidden="true"></i> Chưa thiết lập dữ liệu cho quốc gia này!</p>
                    <ul>
                    <?php 
                    }else{
                        foreach(json_decode($data_display,JSON_UNESCAPED_UNICODE) as $key=>$val){
                            $link_update_data='<a href="'.$url.'/app_my_girl_display_value.php?lang='.$langsel.'&key='.$key.'&ver='.$ver.'" style="color:red;">Thiếu dữ liệu</a>';
                            echo '<li><b>'.$key.'</b>: ';
                            if($val==''){ echo $link_update_data; }else{ echo $val; }
                            echo '</li>';
                        }
                    }
                    ?>
                    </ul>
                    <a class="buttonPro black small" href="<?php echo $url;?>/app_my_girl_display_value.php?lang=<?php echo $langsel;?>&ver=<?php echo $ver;?>"><i class="fa fa-pencil" aria-hidden="true"></i> cập nhật dữ liệu</a>
                </div>
            </div>
            <?php 
        mysqli_free_result($query_data_display);
    }
}else{
?>
<h3><img style="width: 20px;" src="<?php echo $url;?>/app_mygirl/img/<?php echo $edit_lang; ?>.png"/> Cập nhật dữ liệu hiển thị của quốc gia (<?php echo $edit_lang; ?>) phiên bản (version:<?php echo $ver;?>)</h3><br />

<?php

function update_data_lang($link,$s_data_json,$key_lang,$ver){
    $data=addslashes($s_data_json);
    if(mysqli_num_rows(mysqli_query($link,"SELECT `lang` FROM `app_my_girl_display_lang` WHERE `lang`='$key_lang' AND `version` = '$ver'"))){
        $query_update_data=mysqli_query($link,"UPDATE `app_my_girl_display_lang` SET `data` = '$data' WHERE `lang` = '$key_lang'  AND `version` = '$ver' LIMIT 1;");
        if($query_update_data===true){
            echo 'Cập nhật dữ liệu giao diện ('.$key_lang.') thành công!<br/>';
        }else{
            echo 'Cập nhật dữ liệu giao diện ('.$key_lang.') thất bại!<br/>';
        }
    }else{
        $query_add_data=mysqli_query($link,"INSERT INTO `app_my_girl_display_lang` (`lang`, `data`, `version`) VALUES ('$key_lang', '$data', '$ver');");
        if($query_add_data===true){
            echo 'Thêm dữ liệu giao diện ('.$key_lang.') thành công!<br/>';
        }else{
            echo 'Thêm dữ liệu giao diện ('.$key_lang.') thất bại!<br/>';
        }
    }
}

if(isset($_POST['key'])){
    $key=$_POST['key'];
    $ver=$_POST['ver'];
    $lang_2=$_POST['lang_2'];

    $lang_key1=$_POST['lang_key1'];
    $lang_val1=$_POST['lang_val1'];

    $data_obj_lang_1=new stdClass();
    for($i=0;$i<count($lang_key1);$i++){
        $data_obj_lang_1->{$lang_key1[$i]}=$lang_val1[$i];
    }
    $data_lang_1=json_encode($data_obj_lang_1,JSON_UNESCAPED_UNICODE);
    update_data_lang($link,$data_lang_1,$key,$ver);

    if($lang_2!=""){
        $lang_val2=$_POST['lang_val2'];
        $data_obj_lang_2=new stdClass();
        for($i=0;$i<count($lang_key1);$i++){
            $data_obj_lang_2->{$lang_key1[$i]}=$lang_val2[$i];
        }
        $data_lang_2=json_encode($data_obj_lang_2,JSON_UNESCAPED_UNICODE);
        update_data_lang($link,$data_lang_2,$lang_2,$ver);
    }

}
?>

<div  style="float:left;width:100%;">
<div class="box_form" style="float:left;width:auto;">
<label>Chọn ngôn ngữ dịch sang</label><br/>
<select name="lang_to" onchange="change_lang_to(this);return false;">
    <option value="">Chọn ngôn ngữ bất kỳ</option>
    <?php
    while($row_lang=mysqli_fetch_assoc($query_list_country)){
    ?>
    <option value="<?php echo $row_lang['key']; ?>" <?php if($row_lang['key']==$lang_key_to){?>selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php 
    }
    ?>
</select><br/><br/>
<span class="buttonPro small blue" onclick="hide_row_true();"><i class="fa fa-eye-slash" aria-hidden="true"></i> Hiện các trường còn thiếu</span><br/><br/>
</div>
</div>

<script>
function change_lang_to(emp){
    var val_lang=$(emp).val();
    window.location="<?php echo $url_cur;?>?lang=<?php echo $edit_lang;?>&ver=<?php echo $ver;?>&lang_to="+val_lang;
}

function hide_row_true(){
    $(".row_true").hide(100);
}
</script>

<form method="post" name="update_data_display" style="width:auto;float:left">
<table style="width:auto;float:left">
    <?php
    $data_display='';
    $query_data_display=mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '$edit_lang' AND `version`='$ver' LIMIT 1");
    $data_display=mysqli_fetch_array($query_data_display);
    $data_display=$data_display[0];
    $data_display=json_decode($data_display,JSON_UNESCAPED_UNICODE);

    if($lang_2!=''){
        $lang_2_data_display='';
        $lang_2_query_data_display=mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '$lang_2' AND `version`='$ver' LIMIT 1");
        $lang_2_data_display=mysqli_fetch_array($lang_2_query_data_display);
        $lang_2_data_display=$lang_2_data_display[0];
        $lang_2_data_display=json_decode($lang_2_data_display,JSON_UNESCAPED_UNICODE);
    }
                    
    $query_list_display_lang_data=mysqli_query($link,"SELECT * FROM `app_my_girl_display_lang_data` WHERE `version`='$ver' ORDER BY `key`");
    $count_index=0;
    while($row=mysqli_fetch_array($query_list_display_lang_data)){
        $count_index++;
        $val_lang='';
        if(isset($data_display[$row['key']])){ $val_lang=$data_display[$row['key']];}
    ?>
        <tr class="<?php if($val_lang!=''){ echo 'row_true';}else{ echo 'row_false';}?>" <?php if($edit_key_sel==$row['key']){ ?>style="background-color: burlywood;"<?php }?> >
            <td><?php echo $count_index;?></td>
            <td><a href="<?php echo $url;?>/app_my_girl_display_lang.php?edit=<?php echo $row['key'];?>&ver=<?php echo $row['version'];?>"><?php echo $row['key'];?></a></td>
            <td>
                <input type="hidden" value="<?php echo $row['key'];?>" name="lang_key1[]"/>
                <input id="inp_<?php echo $row['key'];?>" name="lang_val1[]" value="<?php echo $val_lang;?>" />
            </td>
            <td>
                <span class="buttonPro small" onclick="paste_tag('inp_<?php echo $row['key'];?>');return false;"><i class="fa fa-clipboard" aria-hidden="true"></i> Dán</span>
            </td>
            <?php 
            if($lang_2!=''){
                $s_style_row='';
                $val_lang2='';
                if(isset($lang_2_data_display[$row['key']])){ $val_lang2=$lang_2_data_display[$row['key']];}else{ $s_style_row='style="background-color: #ffc1c1"';}
            ?>
            <td>
                <span class="buttonPro small" onclick="$(this).css('color','red');translation_tag('inp_<?php echo $row['key'];?>','<?php echo $edit_lang;?>','<?php echo $lang_2;?>');return false;"><i class="fa fa-language" aria-hidden="true"></i> Dịch thuật (<?php echo $lang_2;?>)</span>
            </td>
            <td>
                <input id="inp_<?php echo $row['key'];?>_2" <?php echo $s_style_row;?> name="lang_val2[]" value="<?php echo $val_lang2;?>" />
            </td>
            <td><span class="buttonPro small" onclick="paste_tag('inp_<?php echo $row['key'];?>_2');$('#inp_<?php echo $row['key'];?>_2').css('background-color','white');return false;"><i class="fa fa-clipboard" aria-hidden="true"></i> Dán</span></td>
            <?php }?>
            <td>
            <a class="buttonPro small" href="<?php echo $url;?>/app_my_girl_display_value_field.php?field=<?php echo $row['key'];?>&lang=<?php echo $edit_lang;?>&ver=<?php echo $ver;?>"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Sửa dữ liệu theo trường</a>
            </td>
        </tr>
    <?php 
    }
    ?>
</table>
<input type="hidden" value="<?php echo $edit_lang;?>" name="key"/>
<input type="hidden" value="<?php echo $ver;?>" name="ver"/>
<input type="hidden" value="<?php echo $lang_2;?>" name="lang_2"/>
<input type="submit" value="Hoàn tất" class="buttonPro large green" />
</form>
<?php
}
?>