<?php
$lang='vi';
if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_POST['lang'])){
    $lang=$_POST['lang'];
}

$msql_get_list_msg=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `effect` = '36' AND `disable` = '0' AND `id_redirect`=''");
?>
<form id="frm_seach" action="" method="POST">
    <div class="col">
        <label>Ngôn ngữ</label>
        <select name="lang">
        <?php
        $query_country=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` as a INNER JOIN carrotsy_flower.`country` as b ON b.key = a.key");
        while($item_country=mysqli_fetch_array($query_country)){
        ?>
            <option value="<?php echo $item_country['key'];?>" <?php if($lang==$item_country['key']){?>selected="true"<?php }?>><?php echo $item_country['name']; ?></option>
        <?php
        }
        ?>
        </select>
    </div>
    
    <div class="col">
        <button class="buttonPro red"><i class="fa fa-filter" aria-hidden="true"></i> lọc</button>
    </div>
    
    <div class="col">
        <a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $lang;?>&sex=&character_sex=1&effect=36" class="buttonPro red"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm châm ngôn (Người yêu ảo)</a>
    </div>
</form>
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

        
        $count_like=$this->q("SELECT COUNT(`id_device`) FROM `flower_action_$lang` WHERE `type` = 'like' AND `id_maxim` = '$id_row'");
        $data_like=mysqli_fetch_array($count_like);
        
        $count_distlike=$this->q("SELECT COUNT(`id_device`) FROM `flower_action_$lang` WHERE `type` = 'distlike' AND `id_maxim` = '$id_row'");
        $data_distlike=mysqli_fetch_array($count_distlike);
        
        $count_comment=$this->q("SELECT COUNT(`id_device`) FROM `flower_action_$lang` WHERE `type` = 'comment' AND `id_maxim` = '$id_row'");
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
                <a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_my_girl_update.php?id=<?php echo $row_msg['id'];?>&lang=<?php echo $lang;?>" class="buttonPro small yellow"><i class="fa fa-edit"></i></a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
