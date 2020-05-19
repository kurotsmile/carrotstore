<?php
$lang='vi';

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `flower` WHERE ((`id` = '$id_delete'));");
    echo "Xóa thành công châm ngôn (id:$id_delete)";
}

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_POST['search'])){
    $lang=$_POST['lang'];
}

$msql_get_list_msg=mysqli_query($link,"SELECT * FROM `flower` WHERE `lang`='$lang' ORDER BY `id` DESC");
?>
<form id="frm_seach" action="" method="POST">
    <div class="col">
        <label>Ngôn ngữ</label>
        <select name="lang">
        <?php
        for($i=0;$i<count($app_flower->list_lang);$i++){
        ?>
            <option value="<?php echo $app_flower->list_lang[$i]->key;?>" <?php if($lang==$app_flower->list_lang[$i]->key){?>selected="true"<?php }?>><?php echo $app_flower->list_lang[$i]->name; ?></option>
        <?php
        }
        ?>
        </select>
    </div>
    
    <div class="col">
        <input type="submit" value="Lọc" name="search" class="buttonPro large blue"/>
    </div>
    
    <div class="col">
        <a target="_blank" href="http://carrotstore.com/app_my_girl_add.php?lang=<?php echo $lang;?>&sex=&character_sex=1&effect=36" class="buttonPro small green"> Thêm châm ngôn (Người yêu ảo)</a>
    </div>
</form>

<h3 style="padding: 8px;">Bản duyện châm ngôn</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Châm ngôn</th>
        <th>Tác giả</th>
        <th>Thao tác</th>
    </tr>
    <?php
    while($row_msg=mysqli_fetch_array($msql_get_list_msg)){
    $style='';
    if($row_msg['active']=='1'){
        $style='style="background-color: #ffb2b2;"';
    }
    ?>
    <tr <?php echo $style;?>>
        <td><?php echo $row_msg['id'] ?></td>
        <td><?php echo $row_msg['msg'] ?></td>
        <td><?php echo $row_msg['author'] ?></td>
        <td>
            <a href="<?php echo $url;?>?view=msg&delete=<?php echo $row_msg['id'];?>&lang=<?php echo $lang;?>" class="buttonPro small red">Xóa</a>
            <a href="<?php echo $url;?>?view=msg_add&edit=<?php echo $row_msg['id'];?>" class="buttonPro small yellow">Cập nhật</a>
            <a target="_blank" href="<?php echo $url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $lang;?>&sex=&character_sex=1&effect=36&answer=<?php echo $row_msg['msg']; ?>" class="buttonPro small green"> Chuyển qua Virtual Lover</a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<?
mysql_free_result($msql_get_list_msg);
?>