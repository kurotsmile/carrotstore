<?php
$midi_level=intval($row['level']);
$img=$url.'/app_mygirl/obj_effect/1078.png';
?>
<div id="row<?php echo $row['id_midi']; ?>" class="app" >
    <div class="app_title">
        <a href="<?php echo $url;?>/piano/<?php echo $row['id_midi'];?>">
            <h1 style="font-size: -1vw;">
                <i class="fa fa-paw" aria-hidden="true"></i>  &nbsp;&nbsp;
                <?php echo limit_words($row['name'],7);?>
            </h1>
        </a>
    </div>
    
    <div class="app_txt" style="float: left;width: 93%;height: 93px;padding: 10px;overflow-y: auto">
        <a href="<?php echo $url;?>/piano/<?php echo $row['id_midi'];?>"><img  alt="<?php echo $row['name'];?>" class="lazyload" data-src="<?php echo $img; ?>" style="float: left; margin-right: 3px;margin-bottom: 3px;" /></a>
        <?php echo $label_ten_bai_hat;?>: <?php echo $row['name'];?><br/>
        <?php echo $label_cap_do;?>: <?php echo $arr_midi_level[$midi_level];?><br/>
        <?php echo $label_toc_do_nhip;?>: <?php echo $row['speed'];?> giây<br/>
        <?php echo $label_so_not_nhac;?>: <?php echo $row['length'];?>/ <?php echo $row['length_line'];?><br/>
        <?php if($row['author']!=''){?><?php echo $label_tac_gia;?>: <?php echo $row['author'];}?>
    </div>
    
    <div class="app_type" >
        <?php if($row['category']!=''){echo $label_loai.' : <a  href="'.$url.'/index.php?page_view=page_piano.php&category='.$row['category'].'"> '.$row['category'].'</a>';}?>
    </div>
    
    <div class="app_action">
        <a href="<?php echo $url;?>/piano/<?php echo $row['id_midi'];?>" class="buttonPro small "><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $label_detail; ?></a>
    </div>

    <script>
        arr_id_piano.push("'<?php echo $row['id_midi']; ?>'");
    </script>
</div>