<?php
if(isset($_POST['function'])&&$_POST['function']=='get_test'){
    $user=$_SESSION['username_login'];
    echo $user;
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='reload_answer'){
    include "template/box_answer.php";
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='get_all_icon'){
    $emp_inst=$_POST['emp_inst'];
    if(intval($_POST['category'])==0){
        $get_cat1=mysql_query("select * from icon_category ORDER BY  RAND()  limit 1");
        $get_cat1=mysql_fetch_array($get_cat1);
        $get_cat1=$get_cat1[0];
    }else{
        $get_cat1=$_POST['category'];
    }

    $get_icon=mysql_query("select * from icon WHERE category=".$get_cat1);
    $get_cat=mysql_query("select * from icon_category");
    ?>
    <div id="bar_tap_icon">
    <?php
    while($cat=mysql_fetch_array($get_cat)){
        ?>
        <a class="buttonPro small <?php if($get_cat1==$cat[0]){ echo 'yellow';} ?>" onclick="show_icon('<?php echo $emp_inst;?>',<?php echo $cat[0];?>)" href="#"><?php echo $cat[1];?></a>
        <?php
    }
    ?>
    </div>
    <?php
    while($icon=mysql_fetch_array($get_icon)){
        ?>
        <img class="sel_icon" onclick="add_icon_to_active('<?php echo $icon['id']; ?>');return false;" src="<?php echo thumb($icon['urls'],'40x40'); ?>"/>
        <?php
    }
    exit;
}


if(isset($_POST['function'])&&$_POST['function']=='select_answer'){
    if(isset($_POST['answer'])){
        $user=$_SESSION['username_login'];
        $a=$_POST['answer'];
        $question=$_POST['question'];
        $note=$_POST['answer_note'];
        mysql_query("INSERT INTO `account_answer` (`question`, `answer`, `note`,`user`) VALUES ('$question', '$a', '$note','$user');");
    }
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='member_edit_answer'){
    $id_answer=$_POST['id_answer'];
    $an=get_row('account_answer',$id_answer);
    $id_question=$an['question'];
    $id_answer_account=$an['answer'];
    $answer_note=$an['note'];
    include "template/box_answer_edit.php";
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='member_update_answer'){
    $id_answer=$_POST['answer'];
    $id_answer_account=$_POST['id_answer'];
    $note=$_POST['answer_note'];
    mysql_query("UPDATE `account_answer` SET `answer` = '$id_answer', `note` = '$note' WHERE `id` = '$id_answer_account'");
    echo $id_answer_account;
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='reload_field_answer'){
    $an=get_row('account_answer',$_POST['acc_ans']);
    $id_user=$_SESSION['username_login'];
    include "template/field_member_answer_show.php";
    exit;
}


if(isset($_POST['function'])&&$_POST['function']=='member_edit_activity'){
    $wall=get_row('account_activity',$_POST['id_activity']);
    include "page_member_field_update_activity.php";
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='update_activity'){
    $content=$_POST['content'];
    $wall=$_POST['wall'];
    $id=$_POST['id'];
    mysql_query("UPDATE `account_activity` SET `content` = '$content', `wall` = '$wall' WHERE `id` = '$id';");
    exit;
}


if(isset($_POST['function'])&&$_POST['function']=='commnet_activity'){
    $id_activity=$_POST['id_activity'];
    $comment=addslashes($_POST['comment']);
    $user=$_SESSION['username_login'];
    mysql_query("INSERT INTO `account_activity_commnet` (`activity`, `comment`, `date`, `user`) VALUES ('$id_activity', '$comment', NOW(), '$user');");
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='reload_item_activity'){
    $id_activity=$_POST['id_activity'];
    $wall=get_row('account_activity',$id_activity);
    include "page_member_field_activity.php";
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='delete_item_comment_activity'){
    $id_comment=$_POST['id_comment'];
    $id_activity=$_POST['id_activity'];
    $wall=get_row('account_activity',$id_activity);
    mysql_query("DELETE FROM `account_activity_commnet` WHERE (`id` = '$id_comment');");
    include "page_member_field_activity.php";
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='show_more_comment_activity'){
    $id_activity=$_POST['id_activity'];
    $wall=get_row('account_activity',$id_activity);
    if($_POST['shows']=='0'){
        unset($_POST['page']);
    }else{
        $_POST['page']=$_POST['shows'];
    }

    include "template/field_comment_show.php";
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='like_activity'){
    $id_activity=$_POST['id_activity'];
    $wall=get_row('account_activity',$id_activity);
    $user=$_SESSION['username_login'];
    $check_like=mysql_query("SELECT * FROM `account_activity_like` WHERE `activity` = '$id_activity' AND `user` = '$user'");
    if(mysql_num_rows($check_like)>0){
        mysql_query("DELETE FROM `account_activity_like` WHERE `activity` = '$id_activity' AND `user` = '$user'");
    }else{
        mysql_query("INSERT INTO `account_activity_like` (`activity`, `user`, `date`) VALUES ('$id_activity', '$user',NOW());");
    }

    include "page_member_field_activity.php";
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='view_like_activity'){
    $id_activity=$_POST['id_activity'];
    $get_like_act=mysql_query("SELECT * FROM `account_activity_like` WHERE  `activity`='$id_activity'");
    while($like=mysql_fetch_array($get_like_act)){
        $user_like=get_account($like['user']);
        ?>
        <div>
            <img src="<?php echo thumb($user_like['avatar'],'20x20'); ?>"/>
            <?php echo show_name_User($like['user']); ?>
        </div>
        <?php
    }
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='view_top_player'){
    $id_product=$_POST['id_product'];
    $get_list_player=mysql_query("SELECT * FROM `app_carrot` WHERE `product_id` = '$id_product' ORDER BY `data` DESC LIMIT 50");
    ?>
    <table class="tablePro">
    <tr>
        <th>Player</th>
        <th>Score</th>
    </tr>
    <?php
    while ($row = mysql_fetch_array($get_list_player)) {
        $acc=get_account($row['username']);
        ?>
        <tr>
            <td><a href="<?php echo $url;?>/user/<?php echo $row['username'];?>"><img src="<?php echo thumb($acc['avatar'],'20x20');?>"/> <?php echo show_name_User($row['username']);?></a></td>
            <td><?php echo $row['data'];?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='view_contacts_backup'){
    $contacts=get_row('contact_backup',$_POST['id']);
    $contacts=json_decode($contacts['data']);
    ?>
    <div style="width: 100%;height: 300px;overflow-y: auto;">
    <table>
        <tr>
            <th>Name</th>
            <th>Email / Phone</th>
        </tr>
    <?php
    for($i=0;$i<count($contacts);$i++){
        ?>
        <tr>
            <td>
                <?php
                    echo $contacts[$i]->name;
                ?>
            </td>
            <td>
                <?php
                    echo $contacts[$i]->phone;
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </table>
    </div>
    <?php
    exit;
}

if(isset($_POST['function'])&&$_POST['function']=='account_verify'){
    $usernames=$_POST['usernames'];
    $acc=get_account($usernames);
    echo var_dump($acc);
    exit;
}