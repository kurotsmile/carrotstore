<?php
$lang='vi';

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $query_delete=mysqli_query($link,"DELETE FROM `flower` WHERE ((`id` = '$id_delete'));");
    mysql_free_result($query_delete);
    echo "Xóa thành công châm ngôn (id:$id_delete)";
}

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_POST['search'])){
    $lang=$_POST['lang'];
}

$msql_get_list_msg=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `effect` = '36' AND `disable` = '0' AND `id_redirect`=''");
?>
<form id="frm_seach" action="" method="POST">
    <div class="col">
        <label>Ngôn ngữ</label>
        <select name="lang">
        <?php
        $query_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_flower.`country` as b ON b.key = a.key");
        while($item_country=mysqli_fetch_array($query_country)){
        ?>
            <option value="<?php echo $item_country['key'];?>" <?php if($lang==$item_country['key']){?>selected="true"<?php }?>><?php echo $item_country['name']; ?></option>
        <?php
        }
        ?>
        </select>
    </div>
    
    <div class="col">
        <input type="submit" value="Lọc" name="search" class="buttonPro large blue"/>
    </div>
    
    <div class="col">
        <a target="_blank" href="<?php echo $url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $lang;?>&sex=&character_sex=1&effect=36" class="buttonPro small green"> Thêm châm ngôn (Người yêu ảo)</a>
    </div>
</form>

<h3 style="padding: 8px;">Bản duyện châm ngôn</h3>

<table>
    <tr>
        <th>ID</th>
        <th>Châm ngôn</th>
        <th style="width: 150px;">Dữ liệu</th>
        <th>Thao tác</th>
    </tr>
    <?php
    while($row_msg=mysqli_fetch_array($msql_get_list_msg)){
        $id_row=$row_msg['id'];

        
        $count_like=mysqli_query($link,"SELECT COUNT(`id_device`) FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '$id_row'");
        $data_like=mysqli_fetch_array($count_like);
        
        $count_distlike=mysqli_query($link,"SELECT COUNT(`id_device`) FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '$id_row'");
        $data_distlike=mysqli_fetch_array($count_distlike);
        
        $count_comment=mysqli_query($link,"SELECT COUNT(`id_device`) FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '$id_row'");
        $data_comment=mysqli_fetch_array($count_comment);
        ?>
        <tr>
            <td><?php echo $row_msg['id'] ?></td>
            <td><?php echo $row_msg['chat'] ?></td>
            <td>
                <i class="fa fa-thumbs-up" aria-hidden="true"></i> <?php echo $data_like[0];?>  
                <i class="fa fa-thumbs-down" aria-hidden="true"></i> <?php echo $data_distlike[0];?> 
                <i class="fa fa-comment" aria-hidden="true"></i> <?php echo $data_comment[0];?>
            </td>
            <td style="width: 120px;">
                <a target="_blank" href="<?php echo $url_carrot_store;?>/app_my_girl_update.php?id=<?php echo $row_msg['id'];?>&lang=<?php echo $lang;?>" class="buttonPro small yellow"><i class="fa fa-edit"></i> Cập nhật</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
