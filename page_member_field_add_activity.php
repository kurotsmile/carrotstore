<?php
if(isset($_SESSION['username_login'])){
    $get_user_create=get_account($_SESSION['username_login']);
?>
<div class="message-item act_member_add" >
    <div class="message-inner act_inp" style="background-color: #F5FFED !important;">
    <div class="message-head clearfix">
        <div class="avatar pull-left"><a href="<?php echo $url;?>/user/<?php echo $_SESSION['username_login'];?>"><img src="<?php echo thumb($get_user_create['avatar'],'40x40'); ?>"></a></div>
        <div class="user-detail">
            <h5 class="handle"><?php echo show_name_User($get_user_create['usernames']);?></h5>
            <div class="post-meta">
                <div class="asker-meta">
                    <span class="qa-message-what"></span>
						<span class="qa-message-when"></span>
											<span class="qa-message-who">
												<?php echo lang('tip_act');?>
											</span>
                </div>
            </div>
        </div>
    </div>
    <div class="qa-message-content" style="height:100px;">
            <form  class="account_activity" style="width: 100%;float: none;">
                <input type="text" name="content" id="inp_act" class="act_inp"  value="" placeholder="<?php echo lang('tip_activity_1');?>">
                <button class="buttonPro green" onclick="add_activity();return false;"><?php echo lang('hoan_tat');?></button>
                <input name="wall" value="<?php echo $id_user; ?>" type="hidden">
                <?php if($id_user!=null&$id_user!=$_SESSION['username_login']){?>
                    <input name="tip" value="type_activity_friend" type="hidden">
                <?php }else{?>
                    <input name="tip" value="type_activity_me" type="hidden">
                <?php }?>
            </form>

            <div id="activity_action">
                <div class="button_action" onclick="show_icon('#inp_act',0);return false;"><i class="fa fa-smile-o"></i> <?php echo lang('bieu_tuong');?></div>
            </div>
    </div>
    </div>
</div>

<script>
    function add_activity(){
        if($('.inp_act').val()!=''){
            var parameter=$('.account_activity').serialize();
            $.ajax({
                url: "<?php echo $url;?>/index.php",
                type: "post",
                data: "function=add_activity&"+parameter,
                success: function(data, textStatus, jqXHR)
                {
                    $('.inp').val('');
                    account_select_menu('page_member_tap_activity.php',$('#btn_activity'));
                }
            });
        }else{
            $('.inp_act').fadeOut(200).fadeIn(100).fadeOut(100).fadeIn(100);
        }
    }
</script>
<?php
}
?>