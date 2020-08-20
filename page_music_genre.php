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

        <div id="account_menu">
            <ul style="margin: 0px;">
                <li <?php  echo 'class="active"'?> ><a href=""><i class="fa fa-music"></i> <?php echo lang($link,'music_same'); ?></a></li>
            </ul>
        </div>
    </div>

    <div style="margin-top: 20px;float: left;width: 100%;">
    <?php
    $list_style='same';
    $arr_tag_name=explode(',',$name_genre);
    $string_search='';
	foreach ($arr_tag_name as $val) {
		$string_search.= "l.genre like '%".trim($val)."%' OR ";
	}

    $string_search=substr($string_search,0,strlen($string_search)-3);
    $list_music = mysqli_query($link,"SELECT m.`id`, m.`chat`, m.`file_url`, m.`slug`,m.`author` From `app_my_girl_".$lang_genre."` as `m` LEFT JOIN `app_my_girl_".$lang_genre."_lyrics` as `l` ON m.id= l.id_music  WHERE $string_search ORDER BY RAND() LIMIT 30");
    if($list_music){
    if(mysqli_num_rows($list_music)>0){
        ?>
        <div style="float: left;padding: 10px;">
            <?php
            $label_choi_nhac=lang($link,'choi_nhac');
            $label_chi_tiet=lang($link,'chi_tiet');
            $label_loi_bai_hat=lang($link,'loi_bai_hat');
            $label_chua_co_loi_bai_hat=lang($link,'chua_co_loi_bai_hat');
            $label_music_no_rank=lang($link,'music_no_rank');
            while ($row = mysqli_fetch_array($list_music)) {
                include "page_music_git.php";
            }
            ?>
        </div>
    <?php }}?>
    </div>
</div>
