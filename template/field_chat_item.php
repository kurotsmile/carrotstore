<?php
$user_from=get_account($chat['user_from']);
if(isset($_SESSION['username_login'])){
    $user_login=$_SESSION['username_login'];
}else{
    $user_login= $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
}
if($user_from['usernames']!=$user_login){
?>
    <div class="chat_item left">
        <img class="chat_item_avatar" src="<?php echo thumb($user_from['avatar'],'20x20'); ?>">
        <div class="chat_item_body"><?php echo show_icon($chat['chat'],$url);?></div>
    </div>
<?php
}else{
    ?>
    <div class="chat_item right">
        <img class="chat_item_avatar" src="<?php echo thumb($user_from['avatar'],'20x20'); ?>">
        <div class="chat_item_body"><?php echo show_icon($chat['chat'],$url);?></div>
    </div>
    <?php
}
?>
