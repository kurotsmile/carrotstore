<?php
$name_genre=$_GET['genre'];
$lang_genre=$_GET['lang'];
$url_img_thumb=$url.'/images/bk_link.jpg';
?>
<div id="containt" style="width: 100%;float: left;">

    <div id="account_cover" class="show_bk_account" style="background-image: url('<?php echo $url_img_thumb; ?>');background-size:auto 100% ">
        <div class="neon-text">
            <i class="fa fa-stumbleupon" aria-hidden="true"></i> <?php echo $name_genre;?>
        </div>
    </div>

    <?php
    $list_style='same';
    $list_music = mysql_query("SELECT m.`id`, m.`chat`, m.`file_url`, m.`slug`,m.`author` From `app_my_girl_".$lang_genre."` as `m` LEFT JOIN `app_my_girl_".$lang_genre."_lyrics` as `l` ON m.id= l.id_music  WHERE l.genre  LIKE '%".$name_genre."%' ORDER BY RAND() LIMIT 30",$link);
    if(mysql_num_rows($list_music)>0){
        ?>
        <div style="float: left;width: 100%;">
            <h2 style="padding-left: 30px;"><?php echo lang('music_same'); ?></h2>
            <?php
            $label_choi_nhac=lang('choi_nhac');
            $label_chi_tiet=lang('chi_tiet');
            $label_loi_bai_hat=lang('loi_bai_hat');
            $label_chua_co_loi_bai_hat=lang('chua_co_loi_bai_hat');
            $label_music_no_rank=lang('music_no_rank');
            while ($row = mysql_fetch_array($list_music)) {
                include "page_music_git.php";
            }
            ?>
        </div>
    <?php }?>
</div>
