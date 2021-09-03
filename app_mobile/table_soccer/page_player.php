<?php
$func='list';
$cur_url=$this->cur_url;
$id_player='';
$name_player='';
$ball_force='';
$ball_control='';
$ball_cutting='';
$is_buy_player='';
$playing_position='';
$url_player_icon='';

if(isset($_GET['func'])) $func=$_GET['func'];

if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $q_del=$this->q("DELETE FROM `player` WHERE (`id` = '$id_del');");
    if($q_del) echo $this->msg("Xóa cầu thủ $id_del thành công!");
}

if(isset($_GET['edit'])){
    $id_player=$_GET['edit'];
    $data_player=$this->q_data("SELECT * FROM `player` WHERE `id` = '$id_player' LIMIT 1");
    $name_player=$data_player['name_player'];
    $ball_force=$data_player['ball_force'];
    $ball_control=$data_player['ball_control'];
    $ball_cutting=$data_player['ball_cutting'];
    $is_buy_player=$data_player['is_buy'];
    $playing_position=$data_player['playing_position'];
    $func='edit';
}

if(isset($_POST['name_player'])){
    $name_player=addslashes($_POST['name_player']);
    $ball_force=$_POST['ball_force'];
    $ball_control=$_POST['ball_control'];
    $ball_cutting=$_POST['ball_cutting'];
    $func=$_POST['func'];
    $is_buy_player=$_POST['is_buy'];
    $playing_position=$_POST['playing_position'];
    if($func=='add'){
        $q_add=$this->q("INSERT INTO `player` (`name_player`, `ball_force`, `ball_control`, `ball_cutting`,`is_buy`,`playing_position`) VALUES ('$name_player', '$ball_force', '$ball_control', '$ball_cutting','$is_buy_player','$playing_position');");
        $id_player=mysqli_insert_id($this->link_mysql);
        echo $this->msg("Thêm cầu thủ thành công!");
    }
    else{
        $id_player=$_POST['id_player'];
        $q_update=$this->q("UPDATE `player` SET `name_player` = '$name_player',`ball_force` = '$ball_force',`ball_control` = '$ball_control', `ball_cutting` = '$ball_cutting' , `is_buy`='$is_buy_player' ,`playing_position`='$playing_position' WHERE `id` = '$id_player'");
        echo $this->msg("Cập nhật cầu thủ thành công!");
    }

    if(isset($_FILES['icon_player'])){
        $path_upload="data_player/".$id_player.".png";
        move_uploaded_file($_FILES['icon_player']['tmp_name'], $path_upload);
    }
}

if(file_exists("data_player/".$id_player.".png")) $url_player_icon=$this->url.'/data_player/'.$id_player.'.png';
?>
<div>
    <a href="<?php echo $cur_url;?>&func=list" class="buttonPro small <?php if($func=='list'){ echo 'black';}?>" ><i class="fa fa-list" aria-hidden="true"></i> Danh sách</a>
    <a href="<?php echo $cur_url;?>&func=add" class="buttonPro small <?php if($func=='add'||$func=='edit'){ echo 'black';}?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
</div>

<?php if($func=='add'||$func=='edit'){?>
<form name="frm_player" method="post" action="" enctype="multipart/form-data">
<table style="width:auto">
    <tr>
        <td>Biểu tượng</td>
        <td>
            <?php if($url_player_icon!=''){?><img src="<?php echo $url_player_icon;?>"/><br/><?php }?>
            <input name="icon_player" type="file" />
        </td>
    </tr>
    <tr>
        <td>Tên cầu thủ</td>
        <td>
            <input name="name_player" type="text" value="<?php echo $name_player;?>" id="name_player" />
            <?php echo $this->cp('name_player'); ?>
        </td>
    </tr>
    <tr>
        <td>Lực sút</td>
        <td><input name="ball_force" type="range" min="1" max="10"  value="<?php echo $ball_force;?>" /></td>
    </tr>
    <tr>
        <td>Kiểm soát bóng</td>
        <td><input name="ball_control" type="range" min="1" max="10" value="<?php echo $ball_control;?>" /></td>
    </tr>
    <tr>
        <td>Cắt bóng</td>
        <td><input name="ball_cutting" type="range" min="1" max="10" value="<?php echo $ball_cutting;?>" /></td>
    </tr>
    <tr>
        <td>Mua hàng</td>
        <td>
            <select name="is_buy">
                <option value="0" <?php if($is_buy_player=='0'){ echo 'selected="selected"';}?>>Miễn phí</option>
                <option value="1" <?php if($is_buy_player=='1'){ echo 'selected="selected"';}?>>Tính phí</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Mua hàng</td>
        <td>
            <select name="playing_position">
                <option value="0" <?php if($playing_position=='0'){ echo 'selected="selected"';}?>>Tiền đạo</option>
                <option value="1" <?php if($playing_position=='1'){ echo 'selected="selected"';}?>>Tiền vệ</option>
                <option value="2" <?php if($playing_position=='2'){ echo 'selected="selected"';}?>>Hậu vệ</option>
                <option value="3" <?php if($playing_position=='3'){ echo 'selected="selected"';}?>>Thủ môn</option>
            </select>
        </td>
    </tr>
</table>
<input name="func" type="hidden" value="<?php echo $func;?>" />
<input name="id_player" type="hidden" value="<?php echo $id_player;?>" />
<button class="buttonPro green"><i class="fa fa-check-circle" aria-hidden="true"></i> Hoàn tất</button>
</form>
<?php }?>

<?php
if($func=='list'){
?>
<table>
<tr>
    <th>Biểu tượng</th>
    <th>Tên cầu thủ</th>
    <th>Lực sút</th>
    <th>Kiểm soát bóng</th>
    <th>Cắt bóng</th>
    <th>Vị trí thi đấu</th>
    <th>Mua hàng</th>
    <th>Thao tác</th>
</tr>
<?php
$q_list_player=$this->q("SELECT * FROM `player`");
while($player=mysqli_fetch_assoc($q_list_player)){
?>
<tr>
    <td><img style="width:30px;height:30px" src="<?php echo $this->url;?>/data_player/<?php echo $player['id'];?>.png"/></td>
    <td><?php echo $player['name_player'];?></td>
    <td><progress id="ball_force" value="<?php echo $player['ball_force'];?>" max="10"><?php echo $player['ball_force'];?></progress></td>
    <td><progress id="ball_control" value="<?php echo $player['ball_control'];?>" max="10"><?php echo $player['ball_control'];?></progress></td>
    <td><progress id="ball_cutting" value="<?php echo $player['ball_cutting'];?>" max="10"><?php echo $player['ball_cutting'];?></progress></td>
    <td>
        <?php
        if($player['playing_position']=='0') echo 'Tiền đạo';
        if($player['playing_position']=='1') echo 'Tiền vệ';
        if($player['playing_position']=='2') echo 'Hậu vệ';
        if($player['playing_position']=='3') echo 'Thủ môn';
        ?>
    </td>
    <td>
        <?php
        if($player['is_buy']=='0') echo 'Miễn phí';
        if($player['is_buy']=='1') echo 'Tính phí';
        ?>
    </td>
    <td>
        <a href="<?php echo $cur_url;?>&edit=<?php echo $player['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
        <a href="<?php echo $cur_url;?>&del=<?php echo $player['id'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
    </td>
</tr>
<?php }?>
</table>
<?php }?>