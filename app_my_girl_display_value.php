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
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
            <button class="buttonPro blue">Lọc</button>
    </div>
</form>
</div>
<?php
    $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver$ver`='1'");
    while($row=mysql_fetch_array($list_country)){
        $langsel=$row['key'];
        $query_data_display=mysql_query("SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '$langsel' AND `version`='".$ver."' LIMIT 1");
        
            ?>
            <div class="box_lang">
                <div class="title">
                    <a  href="<?php echo $url;?>/app_my_girl_display_value.php?lang=<?php echo $langsel;?>&ver=<?php echo $ver; ?>"><img src="<?php echo thumb('app_mygirl/img/'.$row['key'].'.png','20');?>"/></a>
                        <strong><?php echo  $row['name'];?></strong> (<?php echo  $row['key'];?>)<br />
                </div>
                
                <div class="body">
                    
                    <?php 
                    $data_display=mysql_fetch_array($query_data_display);
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
        mysql_free_result($query_data_display);
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
    if(mysql_num_rows(mysql_query("SELECT `lang` FROM `app_my_girl_display_lang` WHERE `lang`='$key' AND `version` = '$ver'"))){
        $query_update_data=mysql_query("UPDATE `app_my_girl_display_lang` SET `data` = '$data' WHERE `lang` = '$key'  AND `version` = '$ver' LIMIT 1;");
        if($query_update_data===true){
            echo 'Cập nhật dữ liệu giao diện thành công!';
        }else{
            echo 'Cập nhật dữ liệu giao diện thất bại!';
        }
    }else{
        $query_add_data=mysql_query("INSERT INTO `app_my_girl_display_lang` (`lang`, `data`, `version`) VALUES ('$key', '$data', '$ver');");
        if($query_add_data===true){
            echo 'Thêm dữ liệu giao diện thành công!';
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
    $query_data_display=mysql_query("SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = '$edit_lang' AND `version`='$ver' LIMIT 1");
    $data_display=mysql_fetch_array($query_data_display);
    $data_display=$data_display[0];
    $data_display=json_decode($data_display,JSON_UNESCAPED_UNICODE);
                    
    $query_list_display_lang_data=mysql_query("SELECT * FROM `app_my_girl_display_lang_data` WHERE `version`='$ver'");
    while($row=mysql_fetch_array($query_list_display_lang_data)){
    ?>
        <tr <?php if($edit_key_sel==$row['key']){ ?>style="background-color: yellowgreen;"<?php }?> >
            <td><?php echo $row['key'];?></td>
            <td><input id="inp_<?php echo $row['key'];?>" name="<?php echo $row['key'];?>" value="<?php if(isset($data_display[$row['key']])){ echo $data_display[$row['key']];}?>" /></td>
            <td>
                <span class="buttonPro small" onclick="paste_tag('inp_<?php echo $row['key'];?>');return false;"><i class="fa fa-clipboard" aria-hidden="true"></i> Dán</span>
                <span class="buttonPro small" onclick="translation_tag('inp_<?php echo $row['key'];?>','<?php echo $edit_lang;?>','<?php echo $lang_2;?>');return false;"><i class="fa fa-language" aria-hidden="true"></i> Dịch thuật</span>
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