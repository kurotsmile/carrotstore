<?php
$user_chat=get_account($user_chat);
?>

    <div class="chat_member">
        <div class="chat_header">
            <a id_user="<?php echo $user_chat['usernames'];?>" href="<?php echo $url;?>/user/<?php echo $user_chat['usernames'];?>" class="show_user"><img class="avatar" src="<?php echo thumb($user_chat['avatar'],'20x20');?>"></a>
            <div class="title" onclick="$('.chat_member').toggleClass('hide');"><?php echo show_name_User($user_chat['usernames']);?></div>
            <i class="fa fa-minus-circle close" onclick="close_chat('<?php echo $user_chat['usernames'];?>',this);"></i>
        </div>

        <div class="chat_body box_chat_<?php echo $user_chat['id'];?>">
            <?php
            if(isset($_SESSION['username_login'])){
                $user_form=$_SESSION['username_login'];
            }else{
                $user_form= $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
            }
            $user_to=$user_chat['usernames'];
            $messager=mysql_query("SELECT * FROM `account_chat` WHERE (`user_from` = '$user_form' AND `user_to` = '$user_to') OR (`user_from` = '$user_to' AND `user_to` = '$user_form')");
            while($chat=mysql_fetch_array($messager)){
                include "field_chat_item.php";
            }
            ?>
        </div>

        <div class="chat_footer">
            <div class="chat_inp inp" contenteditable="true"></div>
            <button data-user="<?php echo $user_chat['usernames'];?>" class="buttonPro small" onclick="send_chat(this);return false;"><i class="fa fa-paper-plane-o fa-2x"></i></button>
        </div>
        <script>
            setInterval(function(){
                var emp_body_chat=$(".box_chat_<?php echo $user_chat['id'];?>");
                get_chat('<?php echo $user_to;?>',emp_body_chat);
            },2000);
        </script>
    </div>

