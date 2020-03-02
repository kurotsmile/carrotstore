<div class="c_member" data-user-id="<?php echo $user['usernames'];?>">
    <img style="float: left;margin: 2px;" src="<?php echo thumb($user['avatar'],'90x90'); ?>"/>
    <strong><?php echo show_name_User($user['usernames']); ?></strong><br/>
    <i><?php echo lang('chuc_vu');?>:</i><br/>
    <input type="hidden" value="<?php echo $user['usernames'];?>" name="user[]">
    <select class="inp" name="position[]" style="width: auto;">
        <?php
        $get_all_position=mysql_query("SELECT * FROM `company_position`");
        while($position_sel=mysql_fetch_array($get_all_position)){
            if($position==$position_sel['position']){
                echo '<option value="'.$position_sel['position'].'" selected="selected">'.lang($position_sel['position']).'</option>';
            }else{
                echo '<option value="'.$position_sel['position'].'">'.lang($position_sel['position']).'</option>';
            }
        }
        ?>
    </select><br/>
    <button class="buttonPro small red" onclick="$(this).parent().remove();return false;"><i class="fa fa-trash"></i> <?php echo lang('xoa');?></button>
</div>