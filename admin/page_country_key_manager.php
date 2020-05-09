<?php
$key="";
$func="add";
$id_edit="";
$lang_edit="";


if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $lang_edit=$_GET['lang'];
    $key=$id_edit;
    $func="edit";
}


    if(isset($_POST['func'])){
        $key=$_POST['key'];
            
        if($_POST['func']=="add"){
            $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
            while($l=mysqli_fetch_array($list_country)){
                $key_lang=$l['key'];
                $name_value='value_'.$key_lang;
                $value=mysql_real_escape_string ($_POST[$name_value]);
                $add_key_lang=mysqli_query($link,"INSERT INTO `lang_value` (`key`,`value`,`lang`) VALUES ('$key','$value','$key_lang');");
                echo mysql_error();
                echo 'Thêm từ khóa "'.$key.'" vào ngôn ngữ ('.$key_lang.') thành công!<br/>';
            }
            mysqli_free_result($list_country);
        }else{
            $id_edit=$_POST['id_edit'];
            $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
            while($l=mysqli_fetch_array($list_country)){
                $key_lang=$l['key'];
                $name_value='value_'.$key_lang;
                $value=mysqli_real_escape_string($link,$_POST[$name_value]);
                $name_check_null='type_act_'.$key_lang;
                if(isset($_POST[$name_check_null])){
                    $add_key_lang=mysqli_query($link,"INSERT INTO `lang_value` (`key`,`value`,`lang`) VALUES ('$key','$value','$key_lang');");
                    echo 'Thêm từ khóa "'.$key.'" vào ngôn ngữ ('.$key_lang.') thành công!<br/>';
                }else{
                    $update_key_lang=mysqli_query($link,"UPDATE `lang_value` SET `value` = '$value' WHERE `key` = '$key'  AND `lang` = '$key_lang' ");
                    echo 'Cập nhật từ khóa "'.$key.'" vào ngôn ngữ ('.$key_lang.') thành công!<br/>';
                }
                
            }
            mysqli_free_result($list_country);
        }
    }


if(isset($_POST['id_edit_key_lang'])){
    $key_new=$_POST['key_new'];
    $id_edit_key_lang=$_POST['id_edit_key_lang'];
    $query_edit_key=mysqli_query($link,"UPDATE `lang_value` SET `key` = '$key_new' WHERE `key` = '$id_edit_key_lang'");
    echo "Chỉnh sửa từ khóa '".$id_edit_key_lang."' thành '".$key_new."' thành công !<br/>";
}

if(isset($_POST['id_delete_key_lang'])){
    $id_delete_key_lang=$_POST['id_delete_key_lang'];
    $query_delete=mysqli_query($link,"DELETE FROM `lang_value` WHERE `key` = '$id_delete_key_lang'");
    echo "Xóa từ khóa ".$id_delete_key_lang." thành công!!!<br/>";
}
?>
<h4>Ngôn ngữ hóa</h4>
<form id="form_loc"  method="post" enctype="multipart/form-data" name="add_and_edit_key_lang" action="<?php echo $url_admin;?>/?page_view=page_country_key_manager">
    
    <div style="display: inline-block;float: left;margin: 2px;">
    <table>
        <tr>
            <th>Key</th>
            <th>Value</th>
        </tr>
        <tr>
        <td>
            <strong>Thêm mới giá trị & từ khóa hoặc chỉnh sửa giá trị</strong>
            <input type="text" name="key" value="<?php echo $key;?>" />
        </td>
        <td>
            <table>
            <?php 
                $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
                while($l=mysqli_fetch_array($list_country)){
                    $key_lang=$l['key'];
                    $key_name=$l['name'];
                    $style_edit_lang="";
                    if($lang_edit==$key_lang){
                        $style_edit_lang="style='background-color: #f8d986;'";
                    }
            ?>
               <tr <?php echo $style_edit_lang;?>>
                <td>
                    <img src="<?php echo $url ?>/app_mygirl/img/<?php echo $key_lang;?>.png" style="width: 13px;" />
                </td>
                <td>
                    <strong><?php echo $key_name;?></strong>
                </td>
                <td>
                    <?php
                    if($func=="add"){
                        ?>
                            <input type="text" name="value_<?php echo $key_lang;?>" />
                        <?php
                    }else{
                            $value_is_null="0";
                            $query_get_value=mysqli_query($link,"SELECT `value` FROM `lang_value` WHERE `key` = '$key' AND `lang` = '$key_lang' LIMIT 1");
                            if(mysqli_num_rows($query_get_value)>0){
                                $value_is_null="1"; 
                                $data_value=mysqli_fetch_array($query_get_value);  
                            }
                            
                        ?>
                            <?php if($value_is_null=="0"){?>
                                <input type="text" class="inp_val" name="value_<?php echo $key_lang?>" value="" />
                                <input type="hidden" name="type_act_<?php echo $key_lang?>" value="1" />
                            <?php }else{?>
                                <input type="text" class="inp_val" name="value_<?php echo $key_lang?>" value="<?php echo $data_value[0]; ?>" />
                            <?php }?>
                        <?php
                            mysqli_free_result($query_get_value);
                    }
                    ?>

                </td>
               </tr>
            <?php
                }
                mysqli_free_result($list_country);
            ?>
             </table>
            <span class="buttonPro small" onclick="$('.inp_val').val('')"><i class="fa fa-refresh" aria-hidden="true"></i> Làm mới các trường</span>
        </td>
       </tr>
    </table>
    </div>
    
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <?php if($func=="add"){?>
            <button class="buttonPro blue">Thêm mới</button>
        <?php }else{?>
            <button class="buttonPro blue">Cập nhật</button>
        <?php }?>
        <input type="hidden" name="func" value="<?php echo $func;?>" />
        <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
    </div>
    
</form>

<form id="form_loc"  method="post" enctype="multipart/form-data" name="edit_key_lang" action="<?php echo $url_admin;?>/index.php?page_view=page_country_key_manager">
    <div style="display: inline-block;float: left;margin: 2px;">
        <strong>Sửa từ khóa</strong>
    </div>
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Từ khóa mới</label>
        <input type="text" value=""  name="key_new"/>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Chọn từ khóa sửa</label>
        <select name="id_edit_key_lang">
        <?php
            $query_all_key=mysqli_query($link,'SELECT DISTINCT `key` FROM lang_value');
            while($row_key=mysqli_fetch_array($query_all_key)){
        ?>
            <option value="<?php echo $row_key[0]?>"><?php echo $row_key[0]?></option>
        <?php
            }
            mysqli_free_result($query_all_key);
        ?>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <button class="buttonPro yellow">Chỉnh sửa</button>
    </div>
</form>

<form id="form_loc"  method="post" enctype="multipart/form-data" name="delete_key_lang" action="<?php echo $url_admin;?>/?page_view=page_country_key_manager">
    <div style="display: inline-block;float: left;margin: 2px;">
        <strong>Xóa từ khóa</strong>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Chọn từ khóa Xóa</label>
        <select name="id_delete_key_lang">
        <?php
            $query_all_key=mysqli_query($link,'SELECT DISTINCT `key` FROM lang_value');
            while($row_key=mysqli_fetch_array($query_all_key)){
        ?>
            <option value="<?php echo $row_key[0]?>"><?php echo $row_key[0]?></option>
        <?php
            }
            mysqli_free_result($query_all_key);
        ?>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <button class="buttonPro red">Xóa</button>
    </div>
</form>


<form id="form_loc"  method="get" enctype="multipart/form-data" name="edit" >
    <div style="display: inline-block;float: left;margin: 2px;">
        <strong>Xem từ khóa</strong>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Chọn từ khóa để xem</label>
        <select name="edit">
        <?php
            $query_all_key=mysqli_query($link,'SELECT DISTINCT `key` FROM lang_value ORDER By `key`');
            while($row_key=mysqli_fetch_array($query_all_key)){
        ?>
            <option value="<?php echo $row_key[0]?>"><?php echo $row_key[0]?></option>
        <?php
            }
            mysqli_free_result($query_all_key);
        ?>
        </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <input type="hidden" name="page_view" value="page_country_key_manager" />
        <button class="buttonPro yellow">Xem</button>
    </div>
</form>



<?php
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $delete_effect=mysqli_query($link,"DELETE FROM `lang_value` WHERE ((`id` = '$id_del'));");

}


    $list_lang_key=mysqli_query($link,"SELECT * FROM `lang_value` ORDER BY RAND() LIMIT 50"); 
?>
<table>
<tr>
    <th style="width: 18px;">key</th>
    <th style="width: 100px;">giá trị</th>
    <th style="width: 100px;">lang</th>
    <th style="width: 100px;">Thao tác</th>
</tr>
<?php
while($row=mysqli_fetch_array($list_lang_key)){
?>
    <tr>
        <td><?php echo $row['key'];?></td>
        <td><?php echo $row['value'];?></td>
        <td><?php echo $row['lang'];?></td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url_admin;?>/?page_view=page_country_key_manager&edit=<?php echo $row['key'];?>&lang=<?php echo $row['lang'];?>">Sửa giá trị</a>
        </td>
    </tr>
<?php
}
mysqli_free_result($list_lang_key);
?>
</table>