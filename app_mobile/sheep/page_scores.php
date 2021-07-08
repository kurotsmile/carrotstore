<?php
$lang='vi';
if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];
    $lang=$_GET['lang'];
    $q_scores_delete=$this->q("DELETE FROM `scores` WHERE `id_user` = '$id_delete' AND  `lang` = '$lang'");
    if($q_scores_delete)
        echo $this->msg('Delete success scores id:'.$id_delete.' lang:'.$lang);
    else
        echo $this->msg("Xóa điểm số không thành công!");
}

$ur_cur=$this->cur_url.'&page=scores&lang='.$lang;
$this->setup_page('scores');
echo $this->show_page_nav($ur_cur);
$mysql_get_list_scores=$this->q("SELECT * FROM `scores` WHERE `lang`='$lang' ORDER BY `scores` DESC LIMIT ".$this->p_start.",".$this->p_limit." ");
?>
<table>
<tr>
    <th>ID thiết bị</th>
    <th>Điểm số</th>
    <th>Ngôn ngữ</th>
    <th>Thao tác</th>
</tr>
<?php
while($row_player=mysqli_fetch_array($mysql_get_list_scores)){
    ?>
    <tr>
        <td><?php echo $this->user($row_player['id_user'],$row_player['lang']);?></td>
        <td><?php echo $row_player['scores'];?></td>
        <td><?php echo $row_player['lang'];?></td>
        <td>
            <a class="buttonPro small red" href="<?php echo $this->cur_url;?>&delete=<?php echo $row_player['id_user'];?>&lang=<?php echo $lang;?>">Xóa</a>
            <a class="buttonPro small yellow" href="<?php echo $this->cur_url;?>?page=scores_add&edit=<?php echo $row_player['id_user'];?>&lang=<?php echo $row_player['lang'];?>">Sửa</a>
        </td>
    </tr>
    <?php
}
?>
</table>
<?php
echo $this->show_page_nav($ur_cur);
?>