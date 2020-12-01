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

if(isset($_POST['key'])){
    $key=$_POST['key'];
    $ver=$_POST['ver'];
    unset($_POST['ver']);
    $data=addslashes(json_encode($_POST,JSON_UNESCAPED_UNICODE));
    if(mysqli_num_rows(mysqli_query($link,"SELECT `lang` FROM `app_my_girl_display_lang` WHERE `lang`='$key' AND `version` = '$ver'"))){
        $query_update_data=mysqli_query($link,"UPDATE `app_my_girl_display_lang` SET `data` = '$data' WHERE `lang` = '$key'  AND `version` = '$ver' LIMIT 1;");
        if($query_update_data===true){
            echo 'Cập nhật dữ liệu giao diện thành công!';
			echo btn_add_work($ver,$edit_lang,'lang_vl','edit');
        }else{
            echo 'Cập nhật dữ liệu giao diện thất bại!';
        }
    }else{
        $query_add_data=mysqli_query($link,"INSERT INTO `app_my_girl_display_lang` (`lang`, `data`, `version`) VALUES ('$key', '$data', '$ver');");
        if($query_add_data===true){
            echo 'Thêm dữ liệu giao diện thành công!';
			echo btn_add_work($ver,$edit_lang,'lang_vl','add');
        }else{
            echo 'Thêm dữ liệu giao diện thất bại!';
        }
    }

}
?>

<div  style="float:left;width:100%;">
<div class="box_form" style="float:left;width:auto;">
<label>Chọn ngôn ngữ dịch sang</label><br/>
<select name="lang_to" onchange="change_lang_to(this);return false;">
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
                    
    $query_list_display_lang_data=mysqli_query($link,"SELECT * FROM `app_my_girl_display_lang_data` WHERE `version`='$ver' ORDER BY `key`");
    $count_index=0;
    while($row=mysqli_fetch_array($query_list_display_lang_data)){
        $count_index++;
        $val_lang='';
        if(isset($data_display[$row['key']])){ $val_lang=$data_display[$row['key']];}
    ?>
        <tr class="<?php if($val_lang!=''){ echo 'row_true';}else{ echo 'row_false';}?>" <?php if($edit_key_sel==$row['key']){ ?>style="background-color: yellowgreen;"<?php }?> >
            <td><?php echo $count_index;?></td>
            <td><?php echo $row['key'];?></td>
            <td><input id="inp_<?php echo $row['key'];?>" name="<?php echo $row['key'];?>" value="<?php echo $val_lang;?>" /></td>
            <td>
                <span class="buttonPro small" onclick="paste_tag('inp_<?php echo $row['key'];?>');return false;"><i class="fa fa-clipboard" aria-hidden="true"></i> Dán</span>
    <?php if($lang_2!=''){?><span class="buttonPro small" onclick="$(this).css('color','red');translation_tag('inp_<?php echo $row['key'];?>','<?php echo $edit_lang;?>','<?php echo $lang_2;?>');return false;"><i class="fa fa-language" aria-hidden="true"></i> Dịch thuật (<?php echo $lang_2;?>)</span><?php }?>
            </td>
        </tr>
    <?php 
    }
    ?>
</table>
<input type="hidden" value="<?php echo $edit_lang;?>" name="key"/>
<input type="hidden" value="<?php echo $ver;?>" name="ver"/>
<input type="submit" value="Hoàn tất" class="buttonPro large green" />
</form>
<?php
}
?>