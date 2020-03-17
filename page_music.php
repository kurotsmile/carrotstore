<?php
$view='list';
if(isset($_GET['view'])){$view=$_GET['view'];}
$lang_sel='vi';
if(isset($_SESSION['lang'])){$lang_sel=$_SESSION['lang'];}
$sub_view='all';
if(isset($_GET['sub_view'])){$sub_view=$_GET['sub_view'];}
?>
<div id="filter"> 
    <a href="<?php echo $url; ?>/music" <?php if($sub_view=='all'){ ?>class="active"<?php }?>> <i class="fa fa-play" aria-hidden="true"></i> <?php echo lang('tat_ca'); ?></a> 
    <a href="<?php echo $url; ?>/music/month" <?php if($sub_view=='month'){ ?>class="active"<?php }?>> <i class="fa fa-star-half-o" aria-hidden="true"></i> <?php echo lang('music_top_month'); ?></a>
    <a href="<?php echo $url; ?>/music/0" <?php if($sub_view=='0'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo lang('music_top_0'); ?></a> 
    <a href="<?php echo $url; ?>/music/1" <?php if($sub_view=='1'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-frown-o" aria-hidden="true"></i> <?php echo lang('music_top_1'); ?></a> 
    <a href="<?php echo $url; ?>/music/2" <?php if($sub_view=='2'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-meh-o" aria-hidden="true"></i> <?php echo lang('music_top_2'); ?></a> 
    <a href="<?php echo $url; ?>/music/3" <?php if($sub_view=='3'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo lang('music_top_3'); ?></a>
    <a href="<?php echo $url; ?>/music/artist" <?php if($sub_view=='artist'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-user" aria-hidden="true"></i> <?php echo lang('song_artist'); ?></a>
    <a href="<?php echo $url; ?>/music/year" <?php if($sub_view=='year'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo lang('song_year'); ?></a>
</div>


<?php
if($view=='list'){
    include "page_music_list.php";
}else{
    include "page_music_detail.php";
}
?>