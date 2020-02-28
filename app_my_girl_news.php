<script src="<?php echo $url; ?>/dist/sweetalert.min.js"></script> 
<script src="<?php echo $url; ?>/js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.css"/>

<?php
include "app_my_girl_template.php";

$lang_sel='vi';
$name_user="";
$date_act_user="";
$id_user="";
$id_edit="";
$func="add";
function isset_file($file) {
    return (isset($file) && $file['error'] != UPLOAD_ERR_NO_FILE);
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
    $txt_sql="";
    
    if($id_user!=""){
        $txt_sql="WHERE `id_device` = '$id_user' ";
    }
    
    if($name_user!=""){
        if($id_user!=""){
            $txt_sql=$txt_sql." and  `name`='$name_user' ";
        }else{
            $txt_sql="WHERE  `name`='$name_user' ";
        }
    }

    if($date_act_user!=""){
        if($name_user==""&&$id_user==""){
            $txt_sql="WHERE (DATEDIFF(date_cur,date_start) > $date_act_user)";
        }else{
            $txt_sql=$txt_sql." and (DATEDIFF(date_cur,date_start) > $date_act_user)";
        }
    }
    $list_effect=mysql_query("SELECT * FROM `app_my_girl_news_$lang_sel`  $txt_sql ORDER BY RAND() LIMIT 500");
}else{
    $list_audio=mysql_query("SELECT * FROM `app_my_girl_news_$lang_sel` ORDER BY RAND() LIMIT 500");  
}


?>

<form id="form_loc"  method="post" enctype="multipart/form-data">
    <div style="display: inline-block;float: left;margin: 2px;">
    <label>Ngôn ngữ:</label> 
    
    <select name="lang" >
        <?php for($i=0;$i<count($lang_app->menu_lang);$i++){?>
        <option value="<?php echo $lang_app->menu_lang[$i]->key;?>" <?php if($lang_sel==$lang_app->menu_lang[$i]->key){?> selected="true"<?php }?>><?php echo $lang_app->menu_lang[$i]->name;?></option>
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
    $types=$_GET['types'];
    if($types=='0'){
        $filename_avatar= 'app_mygirl/app_my_girl_news_'.$lang_sel.'/'.$id_del.'.png';
    }else{
        $filename_avatar= 'app_mygirl/app_my_girl_news_'.$lang_sel.'/'.$id_del.'.wav';
    }
    if (file_exists($filename_avatar)) {
        unlink($filename_avatar);
    } 
    $delete_effect=mysql_query("DELETE FROM `app_my_girl_news_$lang_sel` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
}

?>

<table>
<tr>
    <th>Type</th>
    <th>ID</th>
    <th>Content</th>
    <th>File</th>
    <th>Date</th>
    <th>Love</th>
    <th>Status</th>
    <th>Share</th>
    <th>Author</th>
    <th>Action</th>
</tr>
<?php
while($row=mysql_fetch_array($list_audio)){
   
?>
    <tr>
        <td>
            <?php
                if($row[3]=='0'){
                    echo '<i class="fa fa-picture-o" aria-hidden="true"></i>';
                }else if($row[3]=='1'){
                    echo '<i class="fa fa-volume-up" aria-hidden="true"></i>';
                }else{
                    echo ' <i class="fa fa-video-camera" aria-hidden="true"></i>';
                }
            ?>
        </td>
        <td><?php echo $row[0];?></td>
        <td style="background:<?php echo $row[5];?>;border-radius:8px"><?php echo $row[1];?></td>
        <td>
            <?php 

                if($row[3]=='0'){
                    $file="app_my_girl_news_$lang_sel";
                    echo '<img src="'.thumb('/app_mygirl/'.$file.'/'.$row[0].'.png','50x50').'"/>';
                }else if($row[3]=='1'){
                    echo '<audio controls><source src="'.$url.'/app_mygirl/'.$file.'/'.$row[0].'.wav" type="audio/ogg"></audio>';
                }else{
                    echo '<a href="'.$url.'/app_mygirl/'.$file.'/'.$row[0].'.mp4"> <i class="fa fa-video-camera" aria-hidden="true"></i></a>';
                }
        
            ?>
        </td>
        <td>
            <?php 
              echo  $row[4];
            ?>
        </td>
        <td>
        <?php
            $count_news_love=mysql_query("SELECT * FROM `app_my_girl_news_love_vi` WHERE `id_news` = '".$row[0]."'");
            echo mysql_num_rows($count_news_love);
        ?>
        </td>
        <td>
        <?php    
                $statu_id=intval($row[6]);
                echo $arr_status_icon[$statu_id];
        ?>
        </td>
        <td>
            <?php 
              echo  $row[7];
            ?>
        </td>
        <td><?php echo show_info_user($lang_sel,$row[2]);?></td>
        <td>
            <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_news.php';?>?del=<?php echo $row[0];?>&lang=<?php echo $lang_sel;?>&types=<?php echo $row[3];?>">Xóa</a>
            <a class="buttonPro small yellow" target="_blank" href="http://lover.carrotstore.com/?id=<?php echo $row[0];?>">Xem</a>
        </td>
    </tr>
<?php
}
?>
</table>