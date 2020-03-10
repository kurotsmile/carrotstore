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
        progressBar(Math.round((audioElement.currentTime/audioElement.duration)*100), $('#progressBar')); 
    });
    

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
    }else{
        $txt_query_view=" AND `top_music`.`value`='$sub_view' ";
        $query_list_music=mysql_query("SELECT DISTINCT `chat`.id,`chat`.chat,`chat`.file_url,`chat`.slug,`chat`.author FROM `app_my_girl_music_data_$lang_sel` as `top_music` left JOIN   `app_my_girl_$lang_sel` as `chat`  on `chat`.`id`=`top_music`.`id_chat` WHERE `chat`.`effect` = '2'  $txt_query_view LIMIT 40");
    }
}

$list_style='list';
while($row=mysql_fetch_array($query_list_music)){
    include "page_music_git.php";
}

if(!isset($query_list_music)){
    mysql_free_result($query_list_music);
}
?>

</div>

<?php
echo show_ads_box_main('music_page');
?>