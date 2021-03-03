<?php
include "config.php";
$function='';
if(isset($_POST['function'])){ $function=$_POST['function'];}
if($function=='show_song_in_playlist'){
    $id_playlist=$_POST['id_playlist'];
    $lang_playlist=$_POST['lang_playlist'];
    $query_data=mysqli_query($link,"SELECT `data` FROM carrotsy_music.`playlist_$lang_playlist` WHERE `id` = '$id_playlist' LIMIT 1");
    $data_playlist=mysqli_fetch_assoc($query_data);
    $data_playlist=json_decode($data_playlist['data']);
    echo '<div style="height: 300px;max-height: 300px;min-height: 300px;overflow-y: scroll;">';
    echo '<table>';
    for($i=0;$i<sizeof($data_playlist);$i++){
        $song=$data_playlist[$i];
        echo '<tr><td><a target="_blank" href="'.$url_carrot_store.'/music/'.$song->id.'/'.$song->author.'">'.$song->chat.'</td></a></tr>';
    }
    echo '</table>';
    echo '</div>';
}
?>