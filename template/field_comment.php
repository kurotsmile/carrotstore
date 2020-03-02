<script type="text/javascript" src="<?php echo $url; ?>/js/jquery-comments.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/jquery-comments.css"/>
<p style="float: left;width: 100%;">
    <div id="comments" style="float: left;width: 90%;padding: 20px;"></div>
</p>

<link rel="stylesheet" href="<?php  echo $url;?>/assets/css/font-awesome.min.css"/>
<script>
$(document).ready(function(){
   $('#comments').comments({
   <?php
   if(isset($_SESSION['username_login'])){
       $usernames=$_SESSION['username_login'];
       if(isset($_SESSION['login_google'])){ 
            $data_account=get_account($_SESSION['username_login'],$_SESSION['lang']);
            echo  "profilePictureURL: '".$data_account['avatar_url']."',";
       }else{
            if(isset($_SESSION['admin_login'])){
                echo  "profilePictureURL: '".get_url_avatar_user($_SESSION['username_login'],$_SESSION['lang'],'40x40',true)."',";
            }else{
                echo  "profilePictureURL: '".get_url_avatar_user($_SESSION['username_login'],$_SESSION['lang'],'40x40')."',";
            }
       }
   }else{
        $usernames='andanh@gmail.com';
        echo "profilePictureURL: '".thumb('images/avatar_default.png','40x40')."',";
   }
   ?>
   textareaPlaceholderText: '<?php echo lang('nhap_binh_luan'); ?>',
   sendText: '<?php echo lang('dang_binh_luan'); ?>',
   replyText: '<?php echo lang('tra_loi');?>',
   newestText: '<?php echo lang('moi_nhat');?>',
   oldestText: '<?php echo lang('cu_nhat');?>',
   popularText: '<?php echo lang('pho_bien_nhat'); ?>',
   noCommentsText: '<?php echo lang('khong_co_binh_luan'); ?>',
    getComments: function(success, error) {
        var commentsArray = [

        <?php
            $result=mysql_query("SELECT * FROM `comment` WHERE `productid` = '$id' AND `type_comment`='$type_comment' AND `lang`='".$_SESSION['lang']."'");
            while ($row = mysql_fetch_array($result)) {
        ?>
        {
            id: '<?php echo $row['id']; ?>',
            created: '<?php echo $row['created']; ?>',
            content: '<?php echo trim($row['comment']); ?>',
            fullname: '<?php echo get_username_by_id($row['username']);?>',
            <?php
            $url_avatar=get_url_account_google($row['username'],$lang);
            if($url_avatar!=''){
            ?>
            profile_picture_url: '<?php  echo $url_avatar; ?>',
            <?php
            }else{
            ?>
            profile_picture_url: '<?php  echo get_url_avatar_user($row['username'],$row['lang']); ?>',
            <?php
            }
            ?>
            upvote_count: <?php echo $row['upvote_count']; ?>,
            user_has_upvoted: false,
            parent: <?php if(intval($row['parent'])==0){ echo 'null';}else{echo $row['parent'];} ?>
        },
        <?php }?>
        ];
        success(commentsArray);
    },
    
    postComment: function(commentJSON, success, error) {
        commentJSON["productid"] = '<?php echo $data['id'];?>';
        commentJSON["username"] = '<?php echo $usernames;?>';
        commentJSON["type_comment"] = '<?php echo $type_comment; ?>';
        commentJSON["lang_comment"] = '<?php echo $_SESSION['lang']; ?>';
        commentJSON["function"] = 'comment';
        $('#loading').fadeIn(200);
        $.ajax({
            type: 'post',
            url: '<?php echo $url; ?>/index.php',
            data: commentJSON,
            success: function(comment) {
                $('#loading').fadeOut(200);
            },
        });
        success(commentJSON);
    },
    
    upvoteComment: function(commentJSON, success, error) {
        $('#loading').fadeIn(200);
        $.ajax({
            type: 'post',
            url: '<?php echo $url; ?>/json/upvoteComment.php',
            data: commentJSON,
            success: function(comment) {
                $('#loading').fadeOut(200);
            },
        });   
    },
    
    }); 
});
</script>