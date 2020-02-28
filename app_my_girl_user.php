<?php
include "app_my_girl_template.php";

$lang_sel='vi';
$name_user="";
$date_act_user="";
$id_user="";
$id_edit="";
$func="add";
$sexsel="0";
$address="";

if(isset($_GET['lang'])){
    $lang_sel=$_GET['lang'];
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $edit_effect=mysql_query("SELECT * FROM `app_my_girl_user_$lang_sel` WHERE ((`id_device` = '$id_edit')) LIMIT 1;");
    $arr_data_effect=mysql_fetch_array($edit_effect);
    $name_user=$arr_data_effect[1];
    $id_user=$id_edit;
    $func="edit";
}

if(isset($_POST['func'])){
    $name_user=$_POST['name_user'];
    $id_user=$_POST['id_user'];
    if($_POST['func']=="add"){
        $add_effect=mysql_query("INSERT INTO `app_my_girl_user_$lang_sel` (`id_device`,`name`) VALUES ('$id_user','$name_user');");
        $id_new=mysql_insert_id();
    }else{
        $id_edit=$_POST['id_edit'];
        $update_effect=mysql_query("UPDATE `app_my_girl_user_$lang_sel` SET `name` = '$name_user' WHERE `id_device` = '$id_user';");
    }
}


if(isset($_POST['find'])){
    $id_user=$_POST['id_user'];
    $name_user=$_POST['name_user'];
    $date_act_user=$_POST['date_act_user'];
    $lang_sel=$_POST['lang'];
    
    $sexsel=$_POST['sex'];
    $address=$_POST['address_user'];
    
    $txt_sql_id="";
    $txt_sql_name="";
    $txt_sql_date="";
    $txt_sql_address="";
    
    if($id_user!=""){
        $txt_sql_id=" and `id_device` = '$id_user' ";
    }
    
    if($name_user!=""){
        $txt_sql_name=" and  `name`='$name_user' ";
    }

    if($txt_sql_date!=""){
        $txt_sql_date=" and (DATEDIFF(date_cur,date_start) > $date_act_user)  ";
    }
   
    if($address!=""){    
        $txt_sql_address=" and `address` LIKE '%$address%'";
    }
    
    $list_effect=mysql_query("SELECT * FROM `app_my_girl_user_$lang_sel` where 1=1 $txt_sql_id  $txt_sql_name $txt_sql_date $txt_sql_address  AND `sex`=$sexsel   ORDER BY RAND() LIMIT 900");
}else{
    $list_effect=mysql_query("SELECT * FROM `app_my_girl_user_$lang_sel`  WHERE `sex`=$sexsel ORDER BY RAND() LIMIT 900");  
}

echo mysql_error();

?>

<form id="form_loc"  method="post" enctype="multipart/form-data">
<div style="display: inline-block;float: left;margin: 2px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php     $query_list_lang=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    
    
    while($row_lang=mysql_fetch_array($query_list_lang)){?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Id device:</label> 
    <input type="text" id="id_user_find" name="id_user" value="<?php echo $id_user;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Name:</label> 
    <input type="text" id="name_user" name="name_user" value="<?php echo $name_user;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Đối tượng:</label> 
    <select name="sex">
        <option value="0" <?php if($sexsel=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($sexsel=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>địa chỉ:</label> 
    <input type="text" id="address_user" name="address_user" value="<?php echo $address;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 180px;">
    <label>Số ngày hoặt động:</label> 
    <input type="text" id="date_act_user" name="date_act_user" value="<?php echo $date_act_user;?>" />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <input type="submit" class="buttonPro blue" name="find" value="find" />
    </div>
</form>

<?php
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $lang_sel=$_GET['lang'];
    $filename_avatar= 'app_mygirl/app_my_girl_'.$lang_sel.'_user/'.$id_del.'.png';
    if (file_exists($filename_avatar)) {
        unlink($filename_avatar);
    } 
    $delete_effect=mysql_query("DELETE FROM `app_my_girl_user_$lang_sel` WHERE ((`id_device` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
}

?>

<table>
<tr>
    <th>Avatar</th>
    <th>Id</th>
    <th>Name</th>
    <th>Sex</th>
    <th>Địa chỉ</th>
    <th>sdt</th>
    <th>status</th>
    <th>Date start</th>
    <th>Date Curent</th>
    <th>Action</th>
</tr>
<?php

while($row=mysql_fetch_array($list_effect)){
            $filename_avatar= 'app_mygirl/app_my_girl_'.$lang_sel.'_user/'.$row[0].'.png';
            $txt_img_url=thumb('images/avatar_default.png','25x25');
            if (file_exists($filename_avatar)) {
                $txt_img_url=thumb($filename_avatar,'25x25');
            } 
            
            $txt_style='';
            if($row[7]=='0'){
                $txt_disable='<i class="fa fa-toggle-on" aria-hidden="true" style="color:green"></i>';
            }else{
                $txt_style='background:#ffcece';
                $txt_disable='<i class="fa fa-toggle-off" aria-hidden="true" style="color:red"></i>';
            }

?>
    <tr style="<?php echo $txt_style; ?>">
        <td><a href="/app_my_girl_user_detail.php?id=<?php echo $row[0];?>&lang=<?php echo $lang_sel;?>"  target="_blank"><img src="<?php echo $txt_img_url;?>"/></a></td>
        <td><?php echo $row[0];?></td>
        <td><?php echo $row[1];?></td>
        <td><img src="<?php echo $url.'/app_mygirl/img/'.$row[2].'.png';?>"/></td>
        <td><?php echo $row[5];?></td>
        <td><?php echo $row[6];?></td>
        <td><?php echo $txt_disable;?></td>
        <td><?php echo $row[3];?></td>
        <td><?php echo $row[4];?></td>
        <td>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_user.php';?>?del=<?php echo $row['id_device'];?>&lang=<?php echo $lang_sel;?>">Xóa</a>
        </td>
    </tr>
<?php
}
?>
</table>