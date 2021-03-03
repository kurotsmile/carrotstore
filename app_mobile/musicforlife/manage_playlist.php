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
        $query_playlist=mysqli_query($link,"SELECT * FROM `playlist_$lang`");
        while($row_playlist=mysqli_fetch_assoc($query_playlist)){
    ?>
    <tr>
        <td><i class="fa fa-address-card" aria-hidden="true"></i> <?php echo $row_playlist['id']; ?></td>
        <td><i class="fa fa-user" aria-hidden="true"></i> <?php echo $row_playlist['user_id']; ?></td>
        <td><i class="fa fa-list-alt" aria-hidden="true"></i> <?php echo $row_playlist['name']; ?></td>
        <td><span onclick="show_song_in_playlist('<?php echo $row_playlist['id']; ?>','<?php echo $lang;?>')" class="buttonPro small black"><i class="fa fa-music" aria-hidden="true"></i>  <?php echo $row_playlist['length']; ?></span></td>
        <td><a class="buttonPro small blue" href="<?php echo $url_carrot_store;?>/playlist/<?php echo $row_playlist['id']; ?>/<?php echo $lang;?>" target="_blank"><i class="fa fa-play" aria-hidden="true"></i> Xem chi tiết trên Carrot store</a></td>
    </tr>
    <?php
        }
    ?>
</table>

<script>
function show_song_in_playlist(id_playlist,lang_playlist){
    $.ajax({
        url: "<?php echo $url;?>/manage_ajax.php",
        type: "post",
        data: "function=show_song_in_playlist&id_playlist="+id_playlist+"&lang_playlist="+lang_playlist,
        success: function (data, textStatus, jqXHR) {
            swal({html: true, title: 'Danh sách nhạc',text: data});
        }
    });
    
}
</script>