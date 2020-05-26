<?php
$id_user='';
if(isset($_GET['id_user'])){
    $id_user=$_GET['id_user'];
}
if($id_user!=''){
    $query_list_link=mysqli_query($link,"SELECT * FROM carrotsy_shortenlinks.`link_$lang` WHERE `id_user` = '$id_user'");
}else{
    $query_list_link=mysqli_query($link,"SELECT * FROM carrotsy_shortenlinks.`link_$lang` WHERE `status`='0' ORDER BY `date` DESC LIMIT 50");
}
?>
<style>
#share_link{
    width:100%;
}
</style>
<?php
if($id_user!=''){
    $data_user=get_account($link,$id_user,$_SESSION['lang']);
?>
<div id="bk_link">
    <div style="width: 10%;float: left;">&nbsp;</div>
    <div style="width: 10%;float: left;text-align: center;">
        <img src="<?php echo $data_user['avatar_url'];?>" style="width: 80px;" /> 
    </div>
    <div style="width: 70%;float: left;text-align: left;" id="link_create">
        <h2><?php echo lang($link,'shorten_link_my_list'); ?></h2>
        <strong><b><?php echo mysqli_num_rows($query_list_link);?></b> <?php echo lang($link,'shorten_link_create') ?></strong><br />
        <a class="buttonPro small blue" href="<?php echo $url;?>/links"><i class="fa fa-list" aria-hidden="true"></i> <?php echo lang($link,'shorten_link_list'); ?></a>
        <a class="buttonPro small blue" href="<?php echo $url;?>/link"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo lang($link,'shorten_link_btn'); ?></a>
    </div>
    <div style="width: 10%;float: left;">&nbsp;</div>
</div>
<?php
}else{
?>
<div id="bk_link">
    <div style="width: 10%;float: left;">&nbsp;</div>
    <div style="width: 10%;float: left;text-align: center;"><i style="font-size: 50px;margin-top: 26px;" class="fa fa fa-list" aria-hidden="true"></i></div>
    <div style="width: 70%;float: left;text-align: left;" id="link_create">
        <h2><?php echo lang($link,'shorten_link_list'); ?></h2>
        <strong><b><?php echo mysqli_num_rows($query_list_link);?></b> <?php echo lang($link,'shorten_link_create') ?></strong><br />
        <a class="buttonPro small blue" href="<?php echo $url;?>/link"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo lang($link,'shorten_link_btn'); ?></a>
        <?php
        if(isset($user_login)){
        ?>
        <a href="<?php echo $url;?>/links/<?php echo $user_login->id; ?>" class="buttonPro small blue"><img src="<?php echo $user_login->avatar;?>" style="width: 13px;" /> <?php echo $user_login->name;?> : <?php echo lang($link,'shorten_link_my_list'); ?></a>
        <?php
        }
        ?>
    </div>
    <div style="width: 10%;float: left;">&nbsp;</div>
</div>
<?php
}
?>

<div id="containt" style="width: 100%;float: left;">
<?php

while($row=mysqli_fetch_assoc($query_list_link)){
    ?>
    <div id="row<?php echo $row['id']; ?>" class="app">
        
        <div class="app_title">
            <a href="<?php echo $url;?>/l/<?php echo $row['id'];?>">
                <h1 style="font-size: -1vw;">
                    <i class="fa fa-globe" aria-hidden="true"></i>  &nbsp;&nbsp;
                    <?php echo get_home_url($row['link']); ?>
                </h1>
            </a>
        </div>
        
        <div class="app_txt" style="float: left;width: 93%;height: 69px;padding: 10px;overflow-y: auto">
            <i class="fa fa-link" aria-hidden="true" style="float: left;margin-right: 5px;font-size: 40px;"></i> 
            <div style="word-break: break-word;">
            <?php echo lang($link,'link_full');?>: <a href="<?php echo $row['link'];?>" target="_blank"><?php echo $row['link'];?></a>
            </div>
        </div>
        
        <div class="app_type" style="color: #515151;font-size: 11px;font-weight: normal;">
            <i class="fa fa-external-link-square" aria-hidden="true"></i> <?php echo lang($link,'shorten_link_create');?>: <a href="<?php echo $url;?>/link/<?php echo $row['id'];?>" target="_blank"><?php echo $url;?>/link/<?php echo $row['id'];?></a>
        </div>
        
        <div class="app_type" style="color: #515151;font-size: 11px;font-weight: normal;">
            <i class="fa fa-tag" aria-hidden="true"></i> ID:<?php echo $row['id'];?></b> | <i class="fa fa-eye" aria-hidden="true"></i> <?php echo lang($link,'luot_xem'); ?>:<?php echo $row['view'];?> | <i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo lang($link,'ngay_dang');?>:
            <?php 
            $date=date_create($row['date']);
            echo date_format($date,"Y/m/d");
            ?>
        </div>
        
        <div class="app_action">
            <a href="<?php echo $url;?>/l/<?php echo $row['id'];?>" class="buttonPro small "><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo lang($link,'chi_tiet'); ?></a>
        </div>
    </div>
    <?php
}
?>
</div>
<?php
echo show_ads_box_main($link,'link_page');
?>