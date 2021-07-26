<script>
var myJsonString='';
var arr_id_music=[];
let arr_meta_music=[];
var sel_media_index=0;

const audioElement = document.createElement('audio');

function show_player_music(show){
    if(show){
         $("#player_music").show();
         $("#body_ads").hide();
    }else{
        $("#player_music").hide();
        $("#body_ads").show();
    }
    $("#ads_video").hide().html('');
}
    
audioElement.addEventListener("canplay",function(){
    $("#length").text("Duration:" + audioElement.duration + " seconds");
    $("#source").text("Source:" + audioElement.src);
    $("#status").text("Status: Ready to play").css("color","green");
});
    
audioElement.addEventListener("timeupdate",function(){
    $("#currentTime").text("Current second:" + audioElement.currentTime);
    progressBar(Math.round((audioElement.currentTime/audioElement.duration)*100), $('#bar_music_val'));
});

function progressBar(timerbar,emp) {
    $(emp).css("width",timerbar);
}

function play_music(s_nam,url_m,url_icon,emp){
    $(".menu_app").removeClass('music_color');
    $("#player_music_name").html(s_nam);
    $("#player_music_img").attr('src',url_icon);
    show_menu_app(emp,0);
    $(".menu_app").addClass('music_color');
    show_player_music(true);
    //audioElement.setAttribute('src', url_m);
   // audioElement.play().then(_ => updateMetadata());
    $("#box_ads_app").show('100');
}

function play_music_box_mini(index_music){
    sel_media_index=index_music;
    var item_music_sel=arr_meta_music[index_music];
    audioElement.setAttribute('src', item_music_sel.src);
    audioElement.play().then(_ => updateMetadata());

    $("#player_music_name").html(item_music_sel.title);
    $("#player_music_img").attr('src',item_music_sel.artwork[0].src);

    show_player_music(true);
    $("#box_ads_app").show('100');

    $('.app').removeClass('menu_app').removeClass("music_color");
    $("#row"+item_music_sel.id).addClass('menu_app').addClass("music_color");
}

navigator.mediaSession.setActionHandler('play', function() {
    play_music_box_mini(sel_media_index);
});
navigator.mediaSession.setActionHandler('pause', function() {pause_music();});
navigator.mediaSession.setActionHandler('previoustrack', function() {
    sel_media_index--;
    if(sel_media_index<0){sel_media_index=arr_meta_music.length-1;}
    play_music_box_mini(sel_media_index);
});
navigator.mediaSession.setActionHandler('nexttrack', function() {
    sel_media_index++;
    play_music_box_mini(sel_media_index);
});

function updateMetadata() {
    let track =arr_meta_music[sel_media_index];
    navigator.mediaSession.metadata = new MediaMetadata({
        title: track.title,
        artist: track.artist,
        album: track.album,
        artwork: track.artwork
    });
    updatePositionState();
}

function updatePositionState() {
  if ('setPositionState' in navigator.mediaSession) {
    navigator.mediaSession.setPositionState({
      duration: audioElement.duration,
      playbackRate: audioElement.playbackRate,
      position: audioElement.currentTime
    });
  }
}


function pause_music(){
    show_player_music(false);
    $(".app").removeClass('music_color');
    $(".app").removeClass('menu_app');
    audioElement.pause();
}

function restart_music(){
    audioElement.currentTime = 0;
}

$(document).ready(function(){
   show_player_music(false);
});

function stop_music_where_play_video(){
    $(".menu_app").removeClass('music_color');
    $(".app").removeClass('menu_app');
    $("#player_music").hide();
    audioElement.pause();
    show_player_music(false);
}
</script>

<div id="containt" style="width: 100%;float: left;">

<?php
if(!isset($query_list_music)){
    if($sub_view=='all'){
        $query_list_music=mysqli_query($link,"SELECT `id`, `chat`, `file_url`, `slug`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' ORDER BY RAND() LIMIT 30");
    }else if($sub_view=='month'){
        $query_list_music=mysqli_query($link,"SELECT `chat`.id,`chat`.chat,`chat`.file_url,`chat`.slug,`chat`.author,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC LIMIT 40");
    }else if($sub_view=='artist') {
    }else if($sub_view=='year') {
    }else if($sub_view=='genre') {
    }else{
        $txt_query_view=" AND `top_music`.`value`='$sub_view' ";
        $query_list_music=mysqli_query($link,"SELECT DISTINCT `chat`.id,`chat`.chat,`chat`.file_url,`chat`.slug,`chat`.author FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view LIMIT 40");
    }
}


if($sub_view=='artist'){
    $query_artis=mysqli_query($link,"SELECT DISTINCT `artist` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `artist`!='' ORDER BY RAND() LIMIT 60");
    while ($row = mysqli_fetch_assoc($query_artis)) {
        include "page_music_artist_git.php";
    }
}else if($sub_view=='year'){
    $query_year=mysqli_query($link,"SELECT DISTINCT `year` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `year`!='' order by `year` desc");
    while ($row = mysqli_fetch_assoc($query_year)) {
        include "page_music_year_git.php";
    }
}else if($sub_view=='genre'){
    $query_genre=mysqli_query($link,"SELECT DISTINCT `genre` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `genre`!=''");
    while ($row = mysqli_fetch_assoc($query_genre)) {
        include "page_music_genre_git.php";
    }
}else {
    $list_style = 'list';

    if($query_list_music){
        $label_choi_nhac=lang($link,'choi_nhac');
        $label_chi_tiet=lang($link,'chi_tiet');
        $label_loi_bai_hat=lang($link,'loi_bai_hat');
        $label_chua_co_loi_bai_hat=lang($link,'chua_co_loi_bai_hat');
        $label_music_no_rank=lang($link,'music_no_rank');
        $_SESSION['count_item_music']=0;

        $count_item_music=0;
        while ($row = mysqli_fetch_array($query_list_music)) {
            include "page_music_git.php";
            $count_item_music++;
        }

        if($count_item_music==0){
            include "404_search.php";
        }
    }
}

?>
</div>

<?php
    echo show_ads_box_main($link,'music_page');

    if($sub_view=='artist'){
        $query_count_music=mysqli_query($link,"SELECT COUNT(DISTINCT `artist`) as c FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `artist`!=''");
        $data_count_music=mysqli_fetch_assoc($query_count_music);
        echo scroll_load_data('artist',$data_count_music['c']);
    }else{
        $query_count_music=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_vi` WHERE `effect` = '2'");
        $data_count_music=mysqli_fetch_assoc($query_count_music);
        if($sub_view=='all'||$sub_view=='artist'||$sub_view=='0'||$sub_view=='1'||$sub_view=='2'||$sub_view=='3'){
            echo scroll_load_data('music',$data_count_music['c']);
        }
    }
?>
