<?php
$cur_url=$this->cur_url;

if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $lang=$_GET['lang'];
    $q_del=$this->q("DELETE FROM `playlist_$lang` WHERE `id` = '$id_del' LIMIT 1;");
    if($q_del) echo $this->msg("Xóa thành công!");
}
?>
<table>
    <tr>
        <th>Id</th>
        <th>Người dùng</th>
        <th>Tên danh sách</th>
        <th>Số lượng bài hát</th>
        <th>Thao tác</th>
    </tr>
    <?php
        $lang=$_GET['lang'];
        $query_playlist=$this->q("SELECT * FROM `playlist_$lang`");
        while($row_playlist=mysqli_fetch_assoc($query_playlist)){
    ?>
    <tr>
        <td><i class="fa fa-address-card" aria-hidden="true"></i> <?php echo $row_playlist['id']; ?></td>
        <td><i class="fa fa-user" aria-hidden="true"></i> <?php echo $row_playlist['user_id']; ?></td>
        <td><i class="fa fa-list-alt" aria-hidden="true"></i> <?php echo $row_playlist['name']; ?></td>
        <td><i class="fa fa-music" aria-hidden="true"></i>  <?php echo $row_playlist['length']; ?></td>
        <td>
            <a class="buttonPro small blue" href="<?php echo $this->url_carrot_store;?>/playlist/<?php echo $row_playlist['id']; ?>/<?php echo $lang;?>" target="_blank"><i class="fa fa-play" aria-hidden="true"></i> Xem chi tiết trên Carrot store</a>
            <a class="buttonPro small red" href="<?php echo $cur_url;?>&del=<?php echo $row_playlist['id']; ?>&lang=<?php echo $lang;?>"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
    <?php
        }
    ?>
</table>