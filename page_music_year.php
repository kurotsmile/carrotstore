<?php
$year=$_GET['year'];
$lang_year=$_GET['lang'];
$url_img_thumb=$url.'/images/bk_link.jpg';
?>
<div id="containt" style="width: 100%;float: left;">

    <div id="account_cover" class="show_bk_account" style="background-image: url('<?php echo $url_img_thumb; ?>');background-size:auto 100% ">
        <div class="neon-text">
            <i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo $year;?>
        </div>
    </div>

    <?php
    $list_style='same';
    $list_music = mysql_query("SELECT m.`id`, m.`chat`, m.`file_url`, m.`slug`,m.`author` From `app_my_girl_".$lang_year."` as `m` LEFT JOIN `app_my_girl_".$lang_year."_lyrics` as `l` ON m.id= l.id_music  WHERE l.year ='".$year."' ORDER BY RAND() LIMIT 30",$link);
    echo mysql_error($link);
    if(mysql_num_rows($list_music)>0){
        ?>
        <div style="float: left;width: 100%;">
            <h2 style="padding-left: 30px;"><?php echo lang('music_same'); ?></h2>
            <?php
            while ($row = mysql_fetch_array($list_music)) {
                include "page_music_git.php";
            }
            ?>
        </div>
    <?php }?>
</div>