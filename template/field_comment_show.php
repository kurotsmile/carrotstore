<?php
$get_count_commnet=mysql_query("SELECT * FROM `account_activity_commnet` WHERE `activity` = '".$wall['id']."'");
if(isset($_POST['page'])){
    $comment_per_show=8;
    $num_nav_show=ceil($get_count_commnet/$comment_per_show);
    $offset = ($_POST['page'] - 1) * $num_nav_show;
    $get_comment_activity=mysql_query("SELECT * FROM `account_activity_commnet` WHERE `activity` = '".$wall['id']."' order by `date` desc limit $offset,$comment_per_show");
}else{
    $get_comment_activity=mysql_query("SELECT * FROM `account_activity_commnet` WHERE `activity` = '".$wall['id']."' order by `date` desc limit 3");
}

while($comment=mysql_fetch_array($get_comment_activity)){
    $user_commnet=get_account($comment['user']);
    ?>
    <div class="comment_item">
        <img src="<?php echo thumb($user_commnet['avatar'],'20x20');?>">
        <strong><?php echo show_name_User($user_commnet['usernames']); ?></strong> <span><?php echo time_ago($comment['date']); ?></span>
        <i style="float: right;" class="fa fa-times close" onclick="delete_item_comment_activity(<?php echo $comment['id'];?>,<?php echo $wall['id']; ?>)"></i>
        <div><?php echo show_icon($comment['comment'],$url);?></div>
    </div>
    <?php
}
?>

<?php if(isset($_POST['page'])){?>
    <div class="comment_item end">
        <?php
        for($i=1;$i<=$num_nav_show;$i++){
        ?>
        <a href="#" onclick="show_more_comment_activity('<?php echo $wall['id'];?>','<?php echo $i;?>');return false;" class="buttonPro small <?php if($i==$_POST['page']){ echo 'yellow'; } ?>"><?php echo $i; ?></a>
        <?php
        }
        ?>
    </div>
<?php }?>
<?php
if((mysql_num_rows($get_count_commnet)>3)){
    ?>
    <div class="comment_item end" onclick="show_more_comment_activity('<?php echo $wall['id'];?>','<?php if(isset($_POST['page'])){ echo '0';}else{ echo '1';} ?>')">
        <?php if(isset($_POST['page'])){?>
            <?php echo mysql_num_rows($get_count_commnet); ?>  <i class="fa fa-angle-double-up" aria-hidden="true"></i>
        <?php }else{?>
            <?php echo mysql_num_rows($get_count_commnet); ?>  <i class="fa fa-angle-double-down" aria-hidden="true"></i>
        <?php }?>
    </div>
    <?php
}
?>
