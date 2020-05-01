<?php
$id_quote=$row['id'];
$query_count_like=mysqli_query($link,"SELECT COUNT(DISTINCT `id_device`) FROM carrotsy_flower.`flower_action_$lang_sel` WHERE `id_maxim` = '$id_quote' AND `type` = 'like' ");
$count_like=mysqli_fetch_array($query_count_like);
$count_like=$count_like[0];

$query_count_distlike=mysqli_query($link,"SELECT COUNT(DISTINCT `id_device`) FROM carrotsy_flower.`flower_action_$lang_sel` WHERE `id_maxim` = '$id_quote' AND `type` = 'distlike' ");
$count_distlike=mysqli_fetch_array($query_count_distlike);
$count_distlike=$count_distlike[0];

$query_count_comment=mysqli_query($link,"SELECT COUNT(DISTINCT `id_device`) FROM carrotsy_flower.`flower_action_$lang_sel` WHERE `id_maxim` = '$id_quote' AND `type` = 'comment' ");
$count_comment=mysqli_fetch_array($query_count_comment);
$count_comment=$count_comment[0];


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
                <?php echo limit_words($row['chat'],7);?>
            </h1>
        </a>
    </div>
    
    <div class="app_txt" style="float: left;width: 93%;height: 93px;padding: 10px;overflow-y: auto">
        <a href="<?php echo $url;?>/quote/<?php echo $row['id'];?>/<?php echo $lang_sel;?>"><img  alt="<?php echo $row['chat'];?>" class="lazyload" data-src="<?php echo $img; ?>" style="float: left; margin-right: 3px;margin-bottom: 3px;" /></a>
        <i style="color: #c1c1c1;" class="fa fa-angle-double-left" aria-hidden="true"></i>
        <?php echo $row['chat'];?> 
        <i style="color: #c1c1c1;" class="fa fa-angle-double-right" aria-hidden="true"></i>
    </div>
    
    <div class="app_type" style="color: #515151;font-size: 11px;font-weight: normal;">
        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $count_like; ?> | <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <?php echo $count_distlike; ?> | <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo $count_comment;?>
    </div>
    
    <div class="app_action">
        <a href="<?php echo $url;?>/quote/<?php echo $row['id'];?>/<?php echo $lang_sel;?>" class="buttonPro small "><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $label_detail; ?></a>
        <a href="#"  class="btn_speed_quote_<?php echo $row['id'];?> buttonPro small grey btn_speed" onclick="speech_quote('<?php echo $row['id'];?>');return false;"><i class="fa fa-volume-up" aria-hidden="true"></i> <?php echo $label_speed_quote; ?></a>
    </div>

    <script>
        arr_id_quote.push('<?php echo $row['id']; ?>');
    </script>
</div>