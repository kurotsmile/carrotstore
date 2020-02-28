<?php
$get_user_create=get_account($wall['user']);
$get_user_wall=get_account($wall['wall']);
?>
<div class="message-inner act_inp" style="background-color: #F5FFED !important;">
    <div class="message-head clearfix">
        <div class="avatar pull-left"><a href="<?php echo $url;?>/user/<?php echo $get_user_create['usernames'];?>"><img src="<?php echo thumb($get_user_create['avatar'],'40x40'); ?>"></a></div>
        <div class="user-detail">
            <h5 class="handle"><?php echo show_name_User($get_user_create['usernames']);?></h5>
            <div class="post-meta">
                <div class="asker-meta">
                    <span class="qa-message-what"></span>
											<span class="qa-message-when">
											</span>
											<span class="qa-message-who">
												<?php echo lang('tip_act');?>
											</span>
                </div>
            </div>
        </div>
    </div>
    <div class="qa-message-content" style="height:100px;">
        <form  class="account_activity" style="width: 100%;float: none;">
            <input type="text" name="content" id="inp_act" class="act_inp"  value="<?php echo $wall['content']; ?>" placeholder="<?php echo lang('tip_activity_1');?>">
            <button class="buttonPro blue" onclick="update_activity();return false;"><?php echo lang('cap_nhat');?></button>
            <input name="wall" value="<?php echo $wall['wall']; ?>" type="hidden">
            <input name="id" value="<?php echo $wall['id']; ?>" type="hidden">
        </form>

        <div id="activity_action">
            <div class="button_action" onclick="show_icon('#inp_act',0);return false;"><i class="fa fa-smile-o"></i> <?php echo lang('bieu_tuong');?></div>
        </div>
    </div>
</div>

<script>
    function update_activity(){
        if($('.inp_act').val()!=''){
            var parameter=$('.account_activity').serialize();
            $.ajax({
                url: "<?php echo $url;?>/index.php",
                type: "post",
                data: "function=update_activity&"+parameter,
                success: function(data, textStatus, jqXHR)
                {
                    swal("<?php echo lang('thanh_cong'); ?>","<?php echo lang('cap_nhat_thanh_cong'); ?>","success");
                    account_select_menu('page_member_tap_activity.php',$('#btn_activity'));
                }
            });
        }else{
            $('.inp_act').fadeOut(200).fadeIn(100).fadeOut(100).fadeIn(100);
        }
    }
</script>