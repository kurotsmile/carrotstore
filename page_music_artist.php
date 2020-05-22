<?php
$name_artist=$_GET['name_artist'];
$lang_artis=$_GET['lang'];
$url_img_thumb=$url.'/images/bk_link.jpg';
?>
<div id="containt" style="width: 100%;float: left;">

    <div id="account_cover" class="show_bk_account" style="background-image: url('<?php echo $url_img_thumb; ?>');background-size:auto 100% ">
        <div class="neon-text">
            <i class="fa fa-user" aria-hidden="true"></i> <?php echo $name_artist;?>
        </div>
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
	$string_search='';
	$arr_tag_name=explode(',',$name_artist);
	foreach ($arr_tag_name as $val) {
		$string_search.= "l.artist like '%".trim($val)."%' OR ";
	}

	$string_search=substr($string_search,0,strlen($string_search)-3);
	$list_music = mysqli_query($link,"SELECT m.`id`, m.`chat`, m.`file_url`, m.`slug`,m.`author` From `app_my_girl_".$lang_artis."` as `m` LEFT JOIN `app_my_girl_".$lang_artis."_lyrics` as `l` ON m.id= l.id_music  WHERE $string_search LIMIT 20");
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
		<?php 
		}
	}
	?>
    </div>
</div>
