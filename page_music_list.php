<script>
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
    
$(document).ready(function(){
   show_player_music(false);
});    
    
    var audioElement = document.createElement('audio');
    
    
    audioElement.addEventListener('ended', function() {
        this.play();
    }, false);
    
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
    show_menu_app(emp);
    $(".menu_app").addClass('music_color');
    show_player_music(true);
    audioElement.setAttribute('src', url_m);
    audioElement.play();
    $("#box_ads_app").show('100');
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

var myJsonString='';
var arr_id_music=[];
<?php
    $query_count_music=mysql_query("SELECT COUNT(`id`) as c FROM `app_my_girl_vi` WHERE `effect` = '2'");
    $data_count_music=mysql_fetch_array($query_count_music);
    $count_p=$data_count_music['c'];
?>
var count_p=<?php echo $count_p; ?>;
$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() >= ($(document).height()-10)) {
                $('#loading').fadeIn(200);
                $('#loading-page').html(arr_id_music.length+"/"+count_p);
                //$("#box_ads_app").hide();
                myJsonString = JSON.stringify(arr_id_music);

                $.ajax({
                    url: "<?php echo $url; ?>/index.php",
                    type: "get",
                    data: "function=load_music&json="+myJsonString+"&lenguser="+count_p,
                    success: function(data, textStatus, jqXHR)
                    {
                        myJsonString = JSON.stringify(arr_id_music);
                        $('#containt').append(data);
                        $('#loading').fadeOut(200);
                        reset_tip();
                    }
                });
   }
});

function play_video(id_video){
    $(".menu_app").removeClass('music_color');
    $("#player_music").hide();
    $("#body_ads").hide();
    $("#box_ads_app").show('100');
    $("#ads_video").show(); 
    $("#ads_video").html('<iframe width="100%" height="120px" src="https://www.youtube.com/embed/'+id_video+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    audioElement.pause();
}
</script>

<div id="containt" style="width: 100%;float: left;">

<?php
if(!isset($query_list_music)){
    if($sub_view=='all'){
        $query_list_music=mysql_query("SELECT `id`, `chat`, `file_url`, `slug`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '2' ORDER BY RAND() LIMIT 30");
    }else if($sub_view=='month'){
        $query_list_music=mysql_query("SELECT `chat`.id,`chat`.chat,`chat`.file_url,`chat`.slug,`chat`.author,COUNT(`top_music`.`id_chat`)  as c  FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2' GROUP BY `top_music`.`id_chat` HAVING COUNT(`top_music`.`id_chat`) >= 1 ORDER BY c DESC LIMIT 40");
    }else if($sub_view=='artist') {
    }else if($sub_view=='year') {
    }else if($sub_view=='genre') {
    }else{
        $txt_query_view=" AND `top_music`.`value`='$sub_view' ";
        $query_list_music=mysql_query("SELECT DISTINCT `chat`.id,`chat`.chat,`chat`.file_url,`chat`.slug,`chat`.author FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view LIMIT 40");
    }
}


if($sub_view=='artist'){
    $query_artis=mysql_query("SELECT DISTINCT `artist` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `artist`!=''");
    while ($row = mysql_fetch_array($query_artis)) {
        include "page_music_artist_git.php";
    }
}else if($sub_view=='year'){
    $query_year=mysql_query("SELECT DISTINCT `year` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `year`!='' order by `year` desc");
    while ($row = mysql_fetch_array($query_year)) {
        include "page_music_year_git.php";
    }
}else if($sub_view=='genre'){
    $query_genre=mysql_query("SELECT DISTINCT `genre` FROM `app_my_girl_".$lang_sel."_lyrics` WHERE `genre`!=''");
    while ($row = mysql_fetch_array($query_genre)) {
        include "page_music_genre_git.php";
    }
}else {
    $list_style = 'list';

    $label_choi_nhac=lang('choi_nhac');
    $label_chi_tiet=lang('chi_tiet');
    $label_loi_bai_hat=lang('loi_bai_hat');
    $label_chua_co_loi_bai_hat=lang('chua_co_loi_bai_hat');
    $label_music_no_rank=lang('music_no_rank');

    while ($row = mysql_fetch_array($query_list_music)) {
        include "page_music_git.php";
    }
}

if(!isset($query_list_music)){
    mysql_free_result($query_list_music);
}
?>

</div>

<?php
echo show_ads_box_main('music_page');
?>