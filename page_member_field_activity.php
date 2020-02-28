<?php
$get_user_create=get_account($wall['user']);
$get_user_wall=get_account($wall['wall']);
if(isset($_SESSION['username_login'])){
    $get_user_login=get_account($_SESSION['username_login']);
}
?>
<div class="activity_item_<?php echo $wall['id'];?>">
<div class="message-item" id="m9">
    <div class="message-inner">
            <?php if(isset($_SESSION['username_login'])){?><i onclick="delete_data(this,<?php echo $wall['id'];?>,'account_activity');return false;" class="fa fa-times close"></i><?php }?>
            <?php if(isset($_SESSION['username_login'])&&$_SESSION['username_login']==$wall['user']){?><i onclick="member_edit_activity('<?php echo $wall['id'];?>');return false;" class="fa fa-pencil-square  close"></i><?php }?>
        <div class="message-head clearfix">
            <div class="avatar pull-left"><a href="<?php echo $url;?>/user/<?php echo $get_user_create['usernames'];?>" id_user="<?php echo $get_user_create['usernames'];?>" class="show_user"><img src="<?php echo thumb($get_user_create['avatar'],'40x40'); ?>"></a></div>
            <div class="user-detail">
                <h5 class="handle"><?php echo show_name_User($get_user_create['usernames']);?></h5>

                <div class="post-meta">
                    <div class="asker-meta">
                        <span class="qa-message-what"></span>
							<span class="qa-message-when">
                                   <?php echo lang($wall['tip']);?>
                                   <?php
                                        if($wall['tip']=='type_activity_friend'||$wall['tip']=='type_activity_add_friend'){
                                         ?>
                                              <a href="<?php echo $url;?>/user/<?php echo $get_user_wall['usernames'];?>" id_user="<?php echo $get_user_wall['usernames'];?>" class="show_user"><img src="<?php echo thumb($get_user_wall['avatar'],'15x15'); ?>"></a>
                                              <a href="<?php echo $url;?>/user/<?php echo $get_user_wall['usernames'];?>" id_user="<?php echo $get_user_wall['usernames'];?>" class="show_user"><?php echo show_name_User($get_user_wall['usernames']); ?></a>
                                         <?php
                                        }
                                   ?>
							</span>
							<span class="qa-message-who">
                                   <span class="qa-message-when-data"><?php echo time_ago($wall['date']); ?></span>
							</span>
                    </div>
                </div>
            </div>
        </div>
        <?php  if($wall['tip']=='type_activity_add_friend'){ ?>
        <?php }elseif($wall['tip']=='act_da_danh_gia_product'){
            $arr_Object=json_decode($wall['content']);
            $product=get_row('products', $arr_Object[2]);
            ?>
            <div class="wall_item_rate">
                <div class="wall_item_rate_left">
                    <a href="<?php echo $url;?>/product/<?php echo $arr_Object[2];?>"><img style="margin:3px;" src="<?php echo thumb($product["icon"],'60x60');?>"/></a>
                </div>
                <div class="wall_item_rate_right">
                    <?php
                    echo '<strong>'.$product['name_product'].'</strong><br/>';
                    echo '<a href="'.$url.'/type/'.$product['type'].'">'.lang('loai').':'.lang($product['type']).'</a><br/>';
                    for($i=1;$i<=5;$i++){
                        if(intval($arr_Object[1])>=$i){
                            ?>
                            <i class="fa fa-2x fa-star star" style="color:rgb(253, 176, 33);" ></i>
                            <?php
                        }else{
                            ?>
                            <i class="fa fa-2x fa-star-o star" style="color: black;" ></i>
                            <?php
                        }
                    }?>
                </div>
            </div>
        <?php }elseif($wall['tip']=='act_da_danh_gia_place'){
            $arr_Object=json_decode($wall['content']);
            $place=get_row('place', $arr_Object[2]);
            ?>
            <div class="wall_item_rate">
                <div class="wall_item_rate_left">
                    <a href="<?php echo $url;?>/place/<?php echo $arr_Object[2];?>"><img style="margin:3px;" src="<?php echo thumb($place["avatar"],'60x60');?>"/></a>
                </div>
                <div class="wall_item_rate_right">
                    <?php
                    echo '<strong>'.$place['name'].'</strong><br/>';
                    echo '<a href="'.$url.'/place_type/'.$place['type'].'">'.lang('loai').':'.lang($place['type']).'</a><br/>';
                    for($i=1;$i<=5;$i++){
                        if(intval($arr_Object[1])>=$i){
                            ?>
                            <i class="fa fa-2x fa-star star" style="color:rgb(253, 176, 33);" ></i>
                            <?php
                        }else{
                            ?>
                            <i class="fa fa-2x fa-star-o star" style="color: black;" ></i>
                            <?php
                        }

                    }?>
                </div>
            </div>
        <?php }elseif($wall['tip']=='act_da_them_anh_vao_thu_vien'){
            $arr_Object=json_decode($wall['content']);
            $arr_id=$arr_Object[0];
            foreach($arr_id as $id){
                $media=get_row('media',$id);
                echo '<a style="margin:2px" target="_blank" href="'.$url.'/'.$media['url_file'].'"><img src="'.thumb($media['url_file'],'150x150').'"></a>';
            }
            ?>
        <?php }else{?>
        <div class="qa-message-content">
                <?php echo show_icon($wall['content'],$url);?>
        </div>
        <?php }?>

        <div class="tool_activity">
            <?php
            $count_like=mysql_query("SELECT * FROM `account_activity_like` WHERE `activity` = '".$wall['id']."'");
            if(mysql_num_rows($count_like)>0){
                echo '<a href="#" onclick="view_like_activity('.$wall['id'].');return false;">('.mysql_num_rows($count_like).')</a>';
            }
            ?>
            <div class="icon_like" onclick="like_activity('<?php echo $wall['id'];  ?>')" >

                <?php
                $usercurrent_like=0;
                if(isset($_SESSION['username_login'])){
                    $check_like=mysql_query("SELECT * FROM `account_activity_like` WHERE `activity` = '".$wall['id']."' AND `user` = '".$_SESSION['username_login']."'");
                    $usercurrent_like=mysql_num_rows($check_like);
                }
                ?>
                <i class="fa fa-heart" <?php if($usercurrent_like==1){ echo 'style="color: red"';} ?>  aria-hidden="true"></i>

                <?php if($usercurrent_like==0){?>
                    <?php echo lang('thich'); ?>
                <?php }else{?>
                    <?php echo lang('bo_thich'); ?>
                <?php }?>
            </div>
        </div>

        <div class="comment_activity">
            <?php if(isset($_SESSION['username_login'])){?>
            <div class="comment_item">
                <img src="<?php echo thumb($get_user_login['avatar'],'20x20');?>">
                <input onkeypress="commnet_activity(event,this,'<?php echo $wall['id'];?>');" type="text" placeholder="<?php echo lang('binh_luan');?>">
                <a href="#" onclick="show_icon($(this).parent().find('input'),0);return false;"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
            </div>
            <?php }?>
            <div class="show_comment_<?php echo $wall['id']; ?>">
                <?php
                include "template/field_comment_show.php";
                ?>
            </div>
        </div>

    </div>
</div>
</div>
