<div class="app_ins">
    <div class="title"><i class="fa fa-user" aria-hidden="true"></i> Người dùng tương tác trong ngày</div>
    <div class="body">
    <?php
    for($i=0;$i<count($list_lang);$i++){
    $item_lang=$list_lang[$i];
    $user_lang=$item_lang['key'];
    $list_user=$this->q("SELECT `id_device`,`name`,`sex` FROM carrotsy_virtuallover.`app_my_girl_user_$user_lang` where `date_cur` between date_sub(now(),INTERVAL 1 DAY) and now()");
    if($list_user){
    $count_user=mysqli_num_rows($list_user);
    if($count_user>0){
        echo '<div class="title" style="width: 100%;font-size: 10px;"><i class="fa fa-globe" aria-hidden="true"></i> '.$item_lang['name'].' ('.$count_user.')</div>';
    ?>
        <table>
        <?php
        while($u=mysqli_fetch_assoc($list_user)){
            $user_id=$u['id_device'];
            $url_avatar='';
            if($u['sex']=='0')
                $url_avatar=$this->thumb('images/avatar_boy.jpg','80x80');
            else
                $url_avatar=$this->thumb('images/avatar_girl.jpg','80x80');

            $url_user=$this->url_carrot_store.'/app_mobile/carrot_framework/?function=show_user&user_id='.$user_id.'&user_lang='.$user_lang;
            if(file_exists('../../app_mygirl/app_my_girl_'.$user_lang.'_user/'.$user_id.'.png')){
                $url_img='app_mygirl/app_my_girl_'.$user_lang.'_user/'.$user_id.'.png';
                $url_avatar=$this->thumb($url_img,'80x80');
            }
        ?>
            <tr>
                <a class="box_user" target="_blank" href="<?php echo $url_user;?>"><img src="<?php echo $url_avatar;?>" title="<?php echo $u['name'];?>"/></a>
            </tr>
        <?php
        }
        ?>
        </table>
    <?php
    }}}
    ?>
    </div>
</div>