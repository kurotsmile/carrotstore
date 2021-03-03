<?php
include "app_my_girl_template.php";
$langsel='';
$id_edit='';
$query_search='';
$search_category='all';
$type_search='all';

function get_value_category($key_check,$array_category_store){
    for($i=0;$i<count($array_category_store);$i++){
        if($array_category_store[$i]->key==$key_check){
            return $array_category_store[$i]->value;
        }
    }
    return $key_check;
}

if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
    $query_search="WHERE `lang`='$langsel' ";
}

if(isset($_POST['lang'])){
    $langsel=$_POST['lang'];
    $search_category=$_POST['type'];
    $query_search="WHERE `lang`='$langsel' ";
    if($type_search!='all'){
        $query_search=$query_search." AND `category`='$search_category' ";
    }
}

if(isset($_GET['delete'])){
    $id_del=$_GET['delete'];
    $type_del=$_GET['type'];
    $lang_del=$_GET['lang'];
    $query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_storage` WHERE `id` = '$id_del' AND `lang` = '$lang_del'  AND `type` = '$type_del' LIMIT 1;");
    
    if(mysqli_error($link)==''){
        echo 'Delete success ('.$id_del.')';
    }else{
        echo 'Delete Fail :'.mysqli_error($link);
    }
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $langsel=$_GET['lang'];
}

if(isset($_POST['id_edit'])){
    $id_edit=$_POST['id_edit'];
    $lang_edit=$_POST['lang_edit'];
    $type_edit=$_POST['type_edit'];
    $query_update=mysqli_query($link,"UPDATE `app_my_girl_storage` SET `category` = '$type_edit' WHERE `id` = '$id_edit' AND `lang` = '$lang_edit' LIMIT 1;");
    if($query_update){
        echo show_alert("Cập nhật thành công!","alert");
    }else{
        echo show_alert("Cập nhật thất bại!","error");
    }
}

$list_storage=mysqli_query($link,"SELECT * FROM app_my_girl_storage $query_search");
?>
<h2>Lưu trữ những câu trò chuyện nỗi bậc và đang cập nhật</h2>
<form method="post" id="form_loc">
<div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php     
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_array($query_list_lang)){?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Loại:</label> 
    <select name="type">
    <option value="all">Tất cả</option>
    <?php
        for($i=0;$i<count($array_category_store);$i++){
    ?>
        <option value="<?php echo $array_category_store[$i]->key;?>" <?php  if($search_category==$array_category_store[$i]->key){?>selected="true"<?php }?>><?php echo $array_category_store[$i]->value;?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 120px;">
    <input type="submit" class="buttonPro blue" value="Lọc" />
</div>
</form>

<?php 
if($id_edit!=''){
?>
<form action="" method="post">
<table>
    <tr>
        <td>
            <label>Id chat</label>
            <input id="id_chat" name="id_edit" value="<?php echo $id_edit;?>" placeholder="Nhập id đối tượng chỉnh sử vào đây"/>
        </td>
        
        <td>
            <label>Chọn loại lưu trữ</label>
            <select name="type_edit">
                <?php
                for($i=0;$i<count($array_category_store);$i++){
                ?>
                <option value="<?php echo $array_category_store[$i]->key;?>" ><?php echo $array_category_store[$i]->value;?></option>
                <?php }?>
            </select>
        </td>
        
        <td>
            <input type="submit" value="Hoàn tất" class="buttonPro blue" />
            <input type="hidden" name="lang_edit" value="<?php echo $langsel;?>" />
        </td>
    </tr>
    
</table>
</form>
<?php }?>

<?php if(mysqli_num_rows($list_storage)>0){?>
<table>
<tr>
    <th>Id chat</th>
    <th>Type</th>
    <th>Contain</th>
    <th>Loại</th>
    <th>Action</th>
</tr>
<?php
while($row=mysqli_fetch_array($list_storage)){
    $row_lang=$row['lang'];
    $row_id=$row['id'];
    $row_type=$row['type'];
    
    echo '<tr>';
    echo '<td>'.$row_id.'</td>';
    echo '<td>'.$row_type.'</td>';
    echo '<td><table>';
    if($row_type=='chat'){
        $get_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$row_lang` WHERE `id` = '$row_id' LIMIT 1");
        $data_chat=mysqli_fetch_array($get_chat);
        echo show_row_chat_prefab($link,$data_chat,$row_lang,'');
    }else{
        $get_msg=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$row_lang` WHERE `id` = '$row_id' LIMIT 1");
        $data_msg=mysqli_fetch_array($get_msg);
        show_row_msg_prefab($link,$data_msg,$row_lang);
    }
    echo '</table></td>';
    echo '<td>';
    echo get_value_category($row['category'],$array_category_store);
    echo '</td>';
    echo '<td>';
    echo '<a href="'.$url.'/app_my_girl_storage.php?edit='.$row_id.'&type='.$row_type.'&lang='.$row_lang.'" class="ButtonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa</a>';
    echo '<a href="'.$url.'/app_my_girl_storage.php?delete='.$row_id.'&type='.$row_type.'&lang='.$row_lang.'" class="ButtonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>';
    echo '</td>';
    echo '</tr>';
}
?>
</table>
<?php 
}
mysqli_free_result($list_storage);
?>