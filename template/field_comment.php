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
   if(isset($user_login)){
       $usernames=$user_login->id;
       echo  "profilePictureURL: '".$user_login->avatar."',";
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
            $result=mysql_query("SELECT * FROM `comment` WHERE `productid` = '$id_product' AND `type_comment`='$type_comment' AND `lang`='".$_SESSION['lang']."'");
            while ($row = mysql_fetch_array($result)) {
                $comment_user_name='';
                $comment_user_avatar='';

                if($row['username']=='andanh@gmail.com'){
                    $comment_user_name=lang("an_danh");
                    $comment_user_avatar=thumb('images/avatar_default.png','40x40');
                }else{
                    $user_comment=json_decode(get_info_user_comment($row['username'],$row['lang']));
                    $comment_user_name=$user_comment->name;
                    $comment_user_avatar=$user_comment->avatar;
                }
            ?>
            {
                id: '<?php echo $row['id']; ?>',
                created: '<?php echo $row['created']; ?>',
                content: '<?php echo trim($row['comment']); ?>',
                fullname: '<?php echo $comment_user_name;?>',
                profile_picture_url: '<?php  echo $comment_user_avatar; ?>',
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