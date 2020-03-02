<?php
//$type_rate
?>
<div style="height: 28px;margin: 2px;display: inline-block;">
    <?php
    $count_rate=mysql_query("SELECT `rate` FROM `".$type_rate."_rate` WHERE `".$type_rate."` = '".$data['id']."'");
    if($count_rate){
        $count_rate=mysql_num_rows($count_rate);
        $sum_rate=mysql_query("SELECT SUM(`rate`) FROM `".$type_rate."_rate` WHERE `".$type_rate."` = '".$data['id']."'");
        $sum_rate=mysql_fetch_array($sum_rate);
        if(intval($sum_rate[0])>0){
            $sum_rate=$sum_rate[0];
            $sum_rate=($sum_rate/$count_rate);
            $width_rate=(($sum_rate/5)*125);
        }else{
            $width_rate=0;
        }

    }else{
        $width_rate=0;
    }
    ?>
    <div style="width: 125px;position: absolute;background-size: 125px 25px;height: 25px;background-image: url('<?php echo $url;?>/images/star1.png');max-width: 125px;"/></div>
    <div style="width: <?php echo $width_rate;?>px;background-size: 125px 25px;position: absolute;height: 25px;background-image: url('<?php echo $url;?>/images/star.png');max-width: 125px;"/></div>
</div>