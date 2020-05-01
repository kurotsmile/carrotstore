<?php
//$type_rate
?>
<label><?php echo lang($link,'danh_gia');?></label>
<?php
if(isset($_SESSION['username_login'])){
    $users=$_SESSION['username_login'];
}else{
    $users= $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
}
$rate=0;
$check_rate=mysqli_query($link,"SELECT `rate` FROM `".$type_rate."_rate` WHERE `".$type_rate."` = '".$data['id']."' AND `user` = '$users'");
$count_rate=mysqli_query($link,"SELECT * FROM `".$type_rate."_rate` WHERE `".$type_rate."` = '".$data['id']."'");
$user_rate=$count_rate;
$count_rate=mysqli_num_rows($count_rate);
if($check_rate){
    $check_rate=mysqli_fetch_array($check_rate);
    $rate=$check_rate[0];
}
?>
<p style="font-size: 40px;margin-bottom: 10px;margin-top: 8px;" id="bar-star">
    <?php
    for($i=1;$i<=5;$i++){
        if($i<=$rate){
            ?>
            <i title="<?php echo lang($link,'tip_star'.$i); ?>" class="fa fa-star star star_<?php echo $i; ?>" data-index="<?php echo $i; ?>" style="color: #fdb021;" onclick="rate_object('<?php echo $type_rate ?>',<?php echo $i; ?>,<?php echo $data['id'];?>);return false;"></i>
        <?php }else{ ?>
            <i title="<?php echo lang($link,'tip_star'.$i); ?>" class="fa fa-star-o star star_<?php echo $i; ?>" data-index="<?php echo $i; ?>" onclick="rate_object('<?php echo $type_rate ?>',<?php echo $i; ?>,<?php echo $data['id'];?>);return false;"></i>
            <?php
        }
    }
    ?>
</p>

<?php
if($count_rate>0){
    ?>
    <span><?php echo lang($link,'so_nguoi_da_danh_gia');?>:</span><strong><?php echo $count_rate;?></strong>
<?php }?>
<div>
<?php
while($user_r=mysqli_fetch_array($user_rate)){
    $user_rs=get_account($link,$user_r[1],$lang);
    echo '<div style="width: 90%;">';
    $pos = strpos($user_r[1], '@');
    if ($pos === false) {
        echo '<img src="'.thumb($user_rs['avatar'],'20x20').'"/> ';
        echo ''.$user_r[1].'';
    } else {
        echo '<a href="'.$url.'/user/'.$user_r[1].'" class="show_user" id_user="'.$user_r[1].'"><img src="'.thumb($user_rs['avatar'],'20x20').'"></a> ';
        echo ' <a href="'.$url.'/user/'.$user_r[1].'" class="show_user" id_user="'.$user_r[1].'">'.$user_r[1].'</a>';
    }
    echo ' <span>';
    for($i=0;$i<intval($user_r[2]);$i++){
        echo '<i class="fa fa-star" style="color: rgb(253, 176, 33);"></i>';
    }
    echo '</span> ';
    echo '</div> ';
}
?>
</div>
<script>
    $(document).ready(function(){
        $('#bar-star .star').hover(function(){
            $('.star').css('color','black');
            var index_data=$(this).data('index');
            var i=1;
            for(i=1;i<=index_data;i++){
                $('.star_'+i).css('color','#fdb021');
            }
        }) ;

        $('#bar-star .star').click(function(){
            $('.star').removeClass('fa-star-o');
            $('.star').removeClass('fa-star');
            var index_data=$(this).data('index');
            var i=1;
            for(i=1;i<=5;i++){
                if(i<=index_data){
                    $('.star_'+i).addClass('fa-star');
                    $('.star_'+i).css('color','#fdb021');
                }else{
                    $('.star_'+i).addClass('fa-star-o');
                    $('.star_'+i).css('color','black');
                }
            }
        }) ;

        $('#bar-star').mouseleave(function(){
            $('.fa-star-o').css('color','black');
            $('.fa-star').css('color','#fdb021');
        }) ;

    });
</script>