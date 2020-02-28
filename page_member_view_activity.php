<div style="width: 70%;float: left;padding: 10px;">
        <div class="qa-message-list" id="wallmessages">
            <?php
            if(isset($_SESSION['username_login'])){
                $id_user=$_SESSION['username_login'];
                include "page_member_field_add_activity.php";
            }
            ?>

            <?php
            $get_wall=mysql_query("SELECT * FROM `account_activity` ORDER BY `date` DESC");
            while($wall=mysql_fetch_array($get_wall)){
                include "page_member_field_activity.php";
            }
            ?>
        </div>
</div>

<div style="width: 25%;float: left;padding: 10px;" id="show_question">
    <?php include "template/box_answer.php";?>
</div>



