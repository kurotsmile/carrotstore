<?php
//$type_rate
?>
<label><?php echo lang($link,'danh_gia');?></label>
<?php
if(isset($user_login)){
    $users=$user_login->id;
}else{
    $users= $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
}
$rate=0;
$check_rate=mysqli_query($link,"SELECT `rate` FROM `".$type_rate."_rate` WHERE `".$type_rate."` = '".$data['id']."' AND `user` = '$users' ");
$count_rate=mysqli_query($link,"SELECT * FROM `".$type_rate."_rate` WHERE `".$type_rate."` = '".$data['id']."' AND `lang`='$lang'");
$user_rate=$count_rate;
$count_rate=mysqli_num_rows($count_rate);
if($check_rate){
    $check_rate=mysqli_fetch_assoc($check_rate);
    if($check_rate){
        $rate=$check_rate['rate'];
    }else{
        $rate=0;
    }
}
?>
<p style="font-size: 40px;margin-bottom: 10px;margin-top: 8px;" id="bar-star">
    <?php
    for($i=1;$i<=5;$i++){
        if($i<=$rate){
            ?>
            <i title="<?php echo lang($link,'tip_star'.$i); ?>" class="fa fa-star star star_<?php echo $i; ?>" data-index="<?php echo $i; ?>" style="color: #fdb021;cursor: pointer;" onclick="rate_object('<?php echo $type_rate ?>',<?php echo $i; ?>,<?php echo $data['id'];?>);return false;"></i>
        <?php }else{ ?>
            <i title="<?php echo lang($link,'tip_star'.$i); ?>" class="fa fa-star-o star star_<?php echo $i; ?>" data-index="<?php echo $i; ?>"  style="cursor: pointer;"  onclick="rate_object('<?php echo $type_rate ?>',<?php echo $i; ?>,<?php echo $data['id'];?>);return false;"></i>
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
while($user_r=mysqli_fetch_assoc($user_rate)){
    $user_rs=get_account($link,$user_r['user'],$lang);
    $rate_user_name='';
    $rate_user_avata='';

    $user_info=json_decode(get_info_user_comment($link,$user_r['user'],$lang));
    if(isset($user_info->name))$rate_user_name=$user_info->name;
    if(isset($user_info->avatar))$rate_user_avatar=$user_info->avatar;

    echo '<div style="width: 90%;">';

    if (isset($user_info)) {
        $url_link_user=$url.'/user/'.$user_r['user'].'/'.$lang;
        echo '<a href="'.$url_link_user.'" ><img style="width:20px;height:20px;" src="'.$rate_user_avatar.'"/> ';
        echo ''.$rate_user_name.'</a>';
    } else {
        echo '<span><img src="'.thumb('','20x20').'"></span> ';
        echo ' <i>'.$user_r['user'].'</i>';
    }
    echo ' <span>';
    for($i=0;$i<intval($user_r['rate']);$i++){
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