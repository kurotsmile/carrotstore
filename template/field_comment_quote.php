<script type="text/javascript" src="<?php echo $url; ?>/js/jquery-comments.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/jquery-comments.css"/>
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
   textareaPlaceholderText: '<?php echo lang($link,'nhap_binh_luan'); ?>',
   sendText: '<?php echo lang($link,'dang_binh_luan'); ?>',
   replyText: '<?php echo lang($link,'tra_loi');?>',
   newestText: '<?php echo lang($link,'moi_nhat');?>',
   oldestText: '<?php echo lang($link,'cu_nhat');?>',
   popularText: '<?php echo lang($link,'pho_bien_nhat'); ?>',
   noCommentsText: '<?php echo lang($link,'khong_co_binh_luan'); ?>',
    getComments: function(success, error) {
        var commentsArray = [

        <?php
            while ($row_comment = mysqli_fetch_array($query_comment)) {
            $data_user_comment=get_account($link,$row_comment[0],$lang);
        ?>
        {
            id: '<?php echo $row_comment[0]; ?>',
            created: '<?php echo $row_comment['date']; ?>',
            content: '<?php echo trim($row_comment['data']); ?>',
            fullname: '<?php echo get_username_by_id($link,$row_comment[0]);?>',
            <?php
            $url_avatar_comment=get_url_account_google($link,$row_comment[0],$lang);
            if($url_avatar_comment!=''){
            ?>
            profile_picture_url: '<?php  echo var_dump($url_avatar_comment); ?>',
            <?php
            }else{
            ?>
            profile_picture_url: '<?php  echo get_url_avatar_user($link,$row_comment[0],$lang) ?>',
            <?php
            }
            ?>
            user_has_upvoted: false,
        },
        <?php }?>
        ];
        success(commentsArray);
    },
    
    postComment: function(commentJSON, success, error) {
        commentJSON["quocte_id"] = '<?php echo $id_quote;?>';
        commentJSON["username"] = '<?php echo $usernames;?>';
        commentJSON["lang_comment"] = '<?php echo $_SESSION['lang']; ?>';
        commentJSON["function"] = 'comment_quocte';
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
    
    }); 
});
</script>