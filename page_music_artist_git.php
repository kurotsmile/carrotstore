<?php
$tage_artist=addslashes($row['artist']);
$tage_artist=str_replace("&","",$tage_artist);
$tage_artist=str_replace("'","",$tage_artist);
$tage_artist=str_replace("'","",$tage_artist);
$tage_artist=str_replace(",","",$tage_artist);
?>
<a href="<?php echo $url;?>/artist/<?php echo $lang;?>/<?php echo $row['artist'];?>" class="app artist">
    <img src="<?php echo $url;?>/images/artist.jpg" alt="<?php echo $row['artist'];?>"><br/>
    <strong><?php echo $row['artist'];?></strong>
    <script>
        arr_id_obj.push('<?php echo $tage_artist;?>');
    </script>
</a>