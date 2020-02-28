<?php
$lang_sel='vi';
if(isset($_SESSION['lang'])){ $lang_sel=$_SESSION['lang'];}
?>

<script>

    var audioElement = document.createElement('audio');
    audioElement.loop=true;
    
    audioElement.addEventListener('ended', function() {
        this.currentTime = 0;
        this.play();
    }, false);
    
function speech_quote(url_m){
    audioElement.setAttribute('src', url_m);
    this.currentTime = 0;
    audioElement.play();
}

var myJsonString='';
var arr_id_quote=[];

    <?php
    $query_count_quote=mysql_query("SELECT COUNT(`id`) as c FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `id_redirect` = '' AND `chat`!=''");
    $data_count_quote=mysql_fetch_array($query_count_quote);
    $count_p=$data_count_quote['c'];
    ?>
var count_p=<?php echo $count_p;?>;
$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() >= ($(document).height()-10)) {
                $('#loading').fadeIn(200);
                $('#loading-page').html(arr_id_quote.length+"/"+count_p);
                //$("#box_ads_app").hide();
                myJsonString = JSON.stringify(arr_id_quote);

                $.ajax({
                    url: "<?php echo $url; ?>/index.php",
                    type: "get",
                    data: "function=load_quote&json="+myJsonString+"&lenguser="+count_p,
                    success: function(data, textStatus, jqXHR)
                    {
                        myJsonString = JSON.stringify(arr_id_quote);
                        $('#containt').append(data);
                        $('#loading').fadeOut(200);
                        reset_tip();
                    }
                });
   }
});
</script>

<div id="containt" style="width: 100%;float: left;">
<?php
if(!isset($list_quocte)){
    $list_quote=mysql_query("SELECT `chat`, `id`,`effect_customer`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `id_redirect` = '' AND `chat`!='' ORDER BY RAND() LIMIT 50");
}
while($row=mysql_fetch_array($list_quote)){
    include "page_quote_git.php";
}
?>
</div>

<?php
echo show_ads_box_main('quote_page');
?>