<?php
$list_lyrics=mysqli_query($link,"SELECT * FROM `music_contribute_lyrics`"); 

if(isset($_GET['delete'])){
    $id_music=$_GET['delete'];
    $lang=$_GET['lang'];
    $query_delete=mysqli_query($link,"DELETE FROM `music_contribute_lyrics` WHERE `id_music` = '$id_music' AND `lang` = '$lang' LIMIT 1;");
    echo alert("Xóa đóng góp lời bài hát (".$id_music.") thành công !!!",'error');
}
?>
<table>
<tr>
    <th style="width: 200px;">ID Âm nhạc</th>
    <th>Lời bài hát</th>
    <th>Ngôn ngữ</th>
    <th >Thao tác</th>
</tr>
<?php
while($row=mysqli_fetch_array($list_lyrics)){
?>
    <tr>
        <td><a class="buttonPro small" href="<?php echo $url;?>/music/<?php echo $row['id_music'];?>/<?php echo $row['lang'];?>" target="_blank"><i class="fa fa-music" aria-hidden="true"></i> <?php echo $row['id_music'];?></a></td>
        <td>
            <i class="fa fa-quote-left" aria-hidden="true"></i> <?php echo $row['lyrics'];?>
        </td>
        <td><?php echo $row['lang'];?></td>
        <td>
            <a class="buttonPro small light_blue" href="<?php echo $url;?>/music/<?php echo $row['id_music'];?>/<?php echo $row['lang'];?>" target="_blank"><i class="fa fa-music" aria-hidden="true"></i> Xem bài hát</a>
            <a class="buttonPro small blue" target="_blank" href="<?php echo $url;?>/app_my_girl_update.php?id=<?php echo $row['id_music'];?>&lang=<?php echo $row['lang'];?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm lời vào bài hát</a>
            <a class="buttonPro small red" href="<?php echo $url_admin;?>/?page_view=page_music_lyrics&delete=<?php echo $row['id_music'];?>&lang=<?php echo $row['lang'];?>"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
<?php
}
mysqli_free_result($list_lyrics);
?>
</table>