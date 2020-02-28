<?php
$id_quote=$row['id'];
$query_count_like=mysql_query("SELECT COUNT(DISTINCT `id_device`) FROM carrotsy_flower.`flower_action_$lang_sel` WHERE `id_maxim` = '$id_quote' AND `type` = 'like' ");
$count_like=mysql_fetch_array($query_count_like);
$count_like=$count_like[0];

$query_count_distlike=mysql_query("SELECT COUNT(DISTINCT `id_device`) FROM carrotsy_flower.`flower_action_$lang_sel` WHERE `id_maxim` = '$id_quote' AND `type` = 'distlike' ");
$count_distlike=mysql_fetch_array($query_count_distlike);
$count_distlike=$count_distlike[0];

$query_count_comment=mysql_query("SELECT COUNT(DISTINCT `id_device`) FROM carrotsy_flower.`flower_action_$lang_sel` WHERE `id_maxim` = '$id_quote' AND `type` = 'comment' ");
$count_comment=mysql_fetch_array($query_count_comment);
$count_comment=$count_comment[0];

if(file_exists('app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3')){
    $url_mp3=$url.'/app_mygirl/app_my_girl_'.$lang_sel.'/'.$row['id'].'.mp3';
}else{
    $url_mp3='http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen='.strlen($row['chat']).'&client=tw-ob&q='.urldecode($row['chat']).'&tl='.$lang_sel;
}

$img=$url.'/app_mygirl/obj_effect/927.png';
if($row['effect_customer']!=''){
    $img=$url.'/app_mygirl/obj_effect/'.$row['effect_customer'].'.png';
}
?>
<div id="row<?php echo $row['id']; ?>" class="app" >
    <div class="app_title">
        <a href="<?php echo $url;?>/quote/<?php echo $row['id'];?>/<?php echo $lang_sel;?>">
            <h1 style="font-size: -1vw;">
                <i class="fa fa-quote-left" aria-hidden="true"></i>  &nbsp;&nbsp;
                <?php echo limit_words($row['chat'],7); echo mysql_error();?>
            </h1>
        </a>
    </div>
    
    <div class="app_txt" style="float: left;width: 93%;height: 93px;padding: 10px;overflow-y: auto">
        <a href="<?php echo $url;?>/quote/<?php echo $row['id'];?>/<?php echo $lang_sel;?>"><img src="<?php echo $img; ?>" style="float: left; margin-right: 3px;margin-bottom: 3px;" /></a>
        <i style="color: #c1c1c1;" class="fa fa-angle-double-left" aria-hidden="true"></i>
        <?php echo $row['chat'];?> 
        <i style="color: #c1c1c1;" class="fa fa-angle-double-right" aria-hidden="true"></i>
    </div>
    
    <div class="app_type" style="color: #515151;font-size: 11px;font-weight: normal;">
        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $count_like; ?> | <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <?php echo $count_distlike; ?> | <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo $count_comment;?>
    </div>
    
    <div class="app_action">
        <a href="<?php echo $url;?>/quote/<?php echo $row['id'];?>/<?php echo $lang_sel;?>" class="buttonPro small "><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo lang('chi_tiet'); ?></a>
        <a href="#" class="buttonPro small grey" onclick="speech_quote('<?php echo $url_mp3;?>');return false;"><i class="fa fa-volume-up" aria-hidden="true"></i> <?php echo lang('doc_cham_ngon'); ?></a>
    </div>

    <script>
        arr_id_quote.push('<?php echo $row['id']; ?>');
    </script>
</div>