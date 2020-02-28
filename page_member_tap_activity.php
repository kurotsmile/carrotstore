<div style="width: 70%;float: left;">
<h3><?php echo lang('hoat_dong');?></h3>
<?php include "page_member_field_add_activity.php";?>

<div style="width: 100%;float:left;margin-top: 8px;">
    <?php
    $get_wall=mysql_query("SELECT * FROM `account_activity` WHERE `wall` = '$id_user' ORDER BY `date` DESC");
    while($wall=mysql_fetch_array($get_wall)){
        include "page_member_field_activity.php";
    }
    ?>
</div>
</div>

<div style="width: 25%;float: left;padding: 20px;padding-top: 0px;" id="show_question">
   <?php include "template/box_answer.php";?>
</div>

