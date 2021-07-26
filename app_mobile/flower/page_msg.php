<?php
$lang='vi';
$cur_url=$this->cur_url;
if(isset($_GET['lang']))$lang=$_GET['lang'];
if(isset($_POST['lang']))$lang=$_POST['lang'];

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $q_delete=$this->q("DELETE FROM `flower` WHERE ((`id` = '$id_delete'));");
    if($q_delete) echo $this->msg("Xóa thành công châm ngôn (id:$id_delete)");
}

$list_msg=$this->q("SELECT * FROM `flower` WHERE `lang`='$lang' ORDER BY `id` DESC");
?>
<form id="frm_seach" action="" method="post">
    <div class="col">
        <label>Ngôn ngữ</label>
        <select name="lang">
        <?php
        $list_lang=$this->get_list_lang();
        for($i=0;$i<count($list_lang);$i++){
            $item_lang=$list_lang[$i];
        ?>
            <option value="<?php echo $item_lang['key'];?>" <?php if($lang==$item_lang['key']){?>selected="true"<?php }?>><?php echo $item_lang['name']; ?></option>
        <?php
        }
        ?>
        </select>
    </div>
    
    <div class="col">
        <button class="buttonPro blue"><i class="fa fa-filter" aria-hidden="true"></i> Lọc</button>
    </div>
    
    <div class="col">
        <a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $lang;?>&sex=&character_sex=1&effect=36" class="buttonPro red"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm châm ngôn (Người yêu ảo)</a>
    </div>
</form>
<table>
    <tr>
        <th>ID</th>
        <th>Châm ngôn</th>
        <th>Tác giả</th>
        <th>Thao tác</th>
    </tr>
    <?php
    while($row_msg=mysqli_fetch_array($list_msg)){
    ?>
    <tr>
        <td><?php echo $row_msg['id'] ?></td>
        <td><?php echo $row_msg['msg'] ?></td>
        <td><?php echo $row_msg['author'] ?></td>
        <td>
            <a href="<?php echo $cur_url;?>&delete=<?php echo $row_msg['id'];?>&lang=<?php echo $lang;?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i></a>
            <a href="<?php echo $this->url;?>?page=msg_add&edit=<?php echo $row_msg['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $lang;?>&sex=&character_sex=1&effect=36&answer=<?php echo $row_msg['msg']; ?>" class="buttonPro small blue"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
