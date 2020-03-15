<?php 
$lang_sel='vi';
if(isset($_SESSION['lang'])){
    $lang_sel=$_SESSION['lang'];
}
?>
<div id="filter">
    <?php
        if(isset($_GET['sub_view_member'])){
            $sub_view_member=$_GET['sub_view_member'];
        }else{
            $sub_view_member='page_member_view_table.php';
        }
    ?>
    <a href="<?php echo $url;?>/index.php?page_view=page_member.php&sub_view_member=page_member_view_table.php" <?php if($sub_view_member=='page_member_view_table.php'){ echo 'class="active"';}?> > <i class="fa fa-table"></i> <?php echo lang('ds_thanh_vien'); ?></a>
    <?php if(isset($_SESSION['username_login'])){?><a href="<?php echo $url;?>/user/<?php echo $_SESSION['username_login'];?>" <?php if($sub_view_member=='page_member_view_account.php'){ echo 'class="active"';}?> > <i class="fa fa-pagelines"></i> <?php echo lang('trang_ca_nhan'); ?></a><?php }?>
</div>
<div id="containt" style="width: 100%;float: left;">
    <?php
        $result = mysql_query("SELECT id_device,name,sex,sdt,address,avatar_url FROM `app_my_girl_user_$lang_sel` WHERE `sdt`!='' AND `address`!='' AND `status`='0' ORDER BY RAND() LIMIT 50",$link);
        if(mysql_num_rows($result)<10){
            $result = mysql_query("SELECT id_device,name,sex,sdt,address,avatar_url FROM `app_my_girl_user_$lang_sel` WHERE `sdt`!='' AND `status`='0' ORDER BY RAND() LIMIT 50",$link);
        }
        include $sub_view_member;
    ?>
</div>