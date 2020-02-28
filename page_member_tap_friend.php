<h3><?php echo lang('ds_ban_be');?></h3>
<?php
$get_friend_query=mysql_query("SELECT a.* FROM account_friend friend,accounts a WHERE a.usernames=friend.friend AND friend.user= '$id_user'");
while($row=mysql_fetch_array($get_friend_query)){
    include "page_member_view_git.php";
}