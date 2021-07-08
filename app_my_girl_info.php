<?php
include "app_my_girl_template.php";
$arr_country_work = array();
if (isset($data_user_carrot['country_work'])) {
    $arr_country_work = json_decode($data_user_carrot['country_work']);
}
?>
    <div style="width: 100%;float:left;background-color: none !important;" id="menu_child_home">
        <?php

        $query_app_work = mysqli_query($link,"SELECT `id`,`name`,`url` FROM carrotsy_work.`work_app` WHERE `url`!=''");
        while ($row_app_work = mysqli_fetch_assoc($query_app_work)) {
            echo '<a target="_blank"  href="'.$url_carrot_store.'/'.$row_app_work['url'] . '">';
            echo '<img src="'.$url_work.'/thumb.php?src='.$url_work.'/avatar_app/' . $row_app_work['id'] . '.png&size=18&trim=1"/> ';
            echo $row_app_work['name'];
            echo '</a>';
        }
        mysqli_free_result($query_app_work);

        if (isset($_SESSION['is_login_user']) && $_SESSION['is_login_user'] != "") {
            ?>
            <a style="float: right;" href="<?php echo $url; ?>/vl/?logout=1">
                <strong><img style="width: 20px;float: left;margin-right: 5px;" src="<?php echo $url_work;?>/img.php?url=avatar_user/<?php echo $data_user_carrot['user_id']; ?>.png&size=20"/>
                    User:</strong> <?php echo $data_user_carrot['user_name']; ?>
            </a>
        <?php } ?>
    </div>

    <div id="frm_seach">
        <div class="col">
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_all_brain" class="buttonPro small red"><i class="fa fa-trash"></i> dạy</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_all_report" class="buttonPro small red"><i class="fa fa-trash"></i> báo lỗi</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_all_key_music" class="buttonPro small red"><i class="fa fa-trash"></i> Tìm nhạc</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=fix_error" class="buttonPro small blue"><i class="fa fa-wrench" aria-hidden="true"></i> Sửa Lỗi</a>
            <a href="<?php echo $url; ?>/app_my_girl_mission.php" class="buttonPro small black"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Nhiệm vụ</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=manager_country_work" class="buttonPro small black"><i class="fa fa-connectdevelop" aria-hidden="true"></i> Ẩn / hiện quốc gia</a>
            <a href="<?php echo $url; ?>/app_my_girl_mission.php" class="buttonPro small black"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Nhiệm vụ</a>
            <a href="#" class="buttonPro small purple" onclick="check_data_syn();return false;" ><i class="fa fa-refresh" aria-hidden="true"></i> Kiểm tra và đồng bộ dữ liệu</a>
            <a href="<?php echo $url;?>/adminer.php?username=<?php echo $mysql_user;?>&db=<?php echo $mysql_database;?>" target="_blank" class="buttonPro small blue"><i class="fa fa-database" aria-hidden="true"></i></a>
        </div>
    </div>
<?php


for ($i = 0; $i < count($arr_country_work); $i++) {
    $langsel = $arr_country_work[$i];
    $disable_girl = 0;
    $query_name_country = mysqli_query($link,"SELECT `name` FROM `app_my_girl_country` WHERE `key` = '$langsel' LIMIT 1");
    $name_country = mysqli_fetch_array($query_name_country);
    $name_country = $name_country['name'];

    $query_count_msg=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_msg_$langsel` LIMIT 1");
    if($query_count_msg){
        $data_count_msg=mysqli_fetch_assoc($query_count_msg);
        if(!isset($data_count_msg['c'])){
            $data_count_msg['c']='0';
        }else{
            $query_count_msg_sex_0=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_msg_$langsel` WHERE `sex`='0' and `character_sex` = '1' LIMIT 1");
            $query_count_msg_sex_1=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_msg_$langsel` WHERE `sex`='1' and `character_sex` = '0' LIMIT 1");
            $query_count_msg_sex_0_0=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_msg_$langsel` WHERE `sex`='0' and `character_sex` = '0' LIMIT 1");
            $query_count_msg_sex_1_1=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_msg_$langsel` WHERE `sex`='1' and `character_sex` = '1' LIMIT 1");
            $data_count_msg_sex_0=mysqli_fetch_assoc($query_count_msg_sex_0);
            $data_count_msg_sex_1=mysqli_fetch_assoc($query_count_msg_sex_1);
            $data_count_msg_sex_0_0=mysqli_fetch_assoc($query_count_msg_sex_0_0);
            $data_count_msg_sex_1_1=mysqli_fetch_assoc($query_count_msg_sex_1_1);
        }
    }else{
        $data_count_msg['c']='0';
        $data_count_msg_sex_0['c']='0';
        $data_count_msg_sex_1['c']='0';
    }

    $query_count_chat=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_$langsel` LIMIT 1");
    if($query_count_chat){
        $data_count_chat=mysqli_fetch_assoc($query_count_chat);
        if(!isset($data_count_chat['c'])){
            $data_count_chat['c']='0';
        }else{
            $query_count_chat_sex_0=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_$langsel` WHERE `sex`='0' and `character_sex` = '1' LIMIT 1");
            $query_count_chat_sex_1=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_$langsel` WHERE `sex`='1' and `character_sex` = '0' LIMIT 1");
            $query_count_chat_sex_0_0=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_$langsel` WHERE `sex`='0' and `character_sex` = '0' LIMIT 1");
            $query_count_chat_sex_1_1=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_$langsel` WHERE `sex`='1' and `character_sex` = '1' LIMIT 1");
            $data_count_chat_sex_0=mysqli_fetch_assoc($query_count_chat_sex_0);
            $data_count_chat_sex_1=mysqli_fetch_assoc($query_count_chat_sex_1);
            $data_count_chat_sex_0_0=mysqli_fetch_assoc($query_count_chat_sex_0_0);
            $data_count_chat_sex_1_1=mysqli_fetch_assoc($query_count_chat_sex_1_1);
        }
    }else{
        $data_count_chat['c']='0 (none)';
        $data_count_chat_sex_0['c']='0 (none)';
        $data_count_chat_sex_1['c']='0 (none)';
        $data_count_chat_sex_0_0['c']='0 (none)';
        $data_count_chat_sex_1_1['c']='0 (none)';
    }

    $query_count_brain=mysqli_query($link,"SELECT COUNT(`question`) as c FROM `app_my_girl_brain` WHERE `langs`='$langsel' and `tick`='0'");
    if($query_count_brain){
        $data_count_brain=mysqli_fetch_assoc($query_count_brain);
        if(!isset($data_count_brain['c'])){
            $data_count_brain['c']='0';
        }else{
            $query_count_brain_sex_0=mysqli_query($link,"SELECT COUNT(`question`) as c FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `sex`='0' and  `character_sex` = '1' and `tick`='0'");
            $query_count_brain_sex_1=mysqli_query($link,"SELECT COUNT(`question`) as c FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `sex`='1' and  `character_sex` = '0' and `tick`='0'");
            $data_count_brain_sex_0=mysqli_fetch_assoc($query_count_brain_sex_0);
            $data_count_brain_sex_1=mysqli_fetch_assoc($query_count_brain_sex_1);
        }
    }else{
        $data_count_brain['c']='0 (none)';
        $data_count_brain_sex_0['c']='0 (none)';
        $data_count_brain_sex_1['c']='0 (none)';
    }

    $result_count_report = mysqli_query($link,"SELECT COUNT(*) as c FROM `app_my_girl_report` WHERE `lang`='$langsel'");
    $data_count_report=mysqli_fetch_assoc($result_count_report);
    $result_count_music_key = mysqli_query($link,"SELECT COUNT(DISTINCT `key`) as c FROM `app_my_girl_log_key_music` WHERE `lang` = '$langsel'");
    $data_count_music_key=mysqli_fetch_assoc($result_count_music_key);
    $date = new DateTime("now", new DateTimeZone(get_key_lang($link,'timezone',$langsel)) );
    ?>
    <div class="box_lang">
        <div class="title">
            <a target="_blank" href="<?php echo $url; ?>/app_my_girl_info_country.php?lang=<?php echo $langsel; ?>"><img class="icon" src="<?php echo thumb('app_mygirl/img/' . $langsel . '.png', '60'); ?>"/></a>
            <strong><?php echo $name_country; ?></strong><br/>
            Từ khóa ngôn ngữ:<?php echo $langsel; ?><br/>
            <a href="<?php echo $url; ?>/app_my_girl_info_country.php?lang=<?php echo $langsel; ?>&date_sel=<?php  echo $date->format('Y-m-d'); ?>&house_sel=<?php  echo $date->format('H'); ?>"><i class="fa fa-clock-o" aria-hidden="true"></i> Múi giờ:<?php  echo $date->format('H:i:s d/m/Y'); ?></a><br/>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>" title="Thêm trò chuyện" class="buttonPro small green" target="_blank"><i class="fa fa-plus-square"></i> Chat</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1" title="Thêm câu thoại" class="buttonPro small green" target="_blank"><i class="fa fa-plus-circle"></i> Msg</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&effect=2&actions=9" title="Thêm bài hát" class="buttonPro small green" target="_blank"><i class="fa fa-plus"></i> Music</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&effect=36" title="Thêm châm ngôn" class="buttonPro small green" target="_blank"><i class="fa fa-plus-square"></i> Quote</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&effect=49" title="Thêm chuyện ngắn" class="buttonPro small green" target="_blank"><i class="fa fa-plus-square-o"></i> Story</a>
            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>" title="Danh sách trò chuyện" class="buttonPro small blue" target="_blank"><i class="fa fa-comments"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>" title="Danh sách câu thoại" class="buttonPro small blue" target="_blank"><i class="fa fa-commenting-o"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music.php?lang=<?php echo $langsel; ?>" title="Danh sách nhạc" class="buttonPro small blue" target="_blank"><i class="fa fa-music"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?lang=<?php echo $langsel; ?>" title="Duyệt nhạc từ người dùng" class="buttonPro small blue" target="_blank"><i class="fa fa-headphones" aria-hidden="true" ></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_user.php?lang=<?php echo $langsel; ?>" title="Danh sách người dùng" class="buttonPro small blue" target="_blank"><i class="fa fa-user-o syn app_my_girl_user_<?php echo $langsel; ?>"  syn="app_my_girl_user_<?php echo $langsel; ?>"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_radio.php?lang=<?php echo $langsel; ?>" title="Danh sách Radio" class="buttonPro small blue" target="_blank"><i class="fa fa-wifi"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_maxim.php?lang=<?php echo $langsel; ?>" title="Danh sách châm ngôn" class="buttonPro small blue" target="_blank"><i class="fa fa-quote-left" aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_story.php?lang=<?php echo $langsel; ?>" title="Danh sách truyện ngắn" class="buttonPro small blue" target="_blank"><i class="fa fa-book" aria-hidden="true"></i></a>
            <a href="https://play.google.com/store/apps/details?id=com.kurotsmile.mygirl&hl=<?php echo $langsel; ?>&msg=1" title="Chplay" class="buttonPro small blue" target="_blank"><i class="fa fa-android" aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=fix_error&lang=<?php echo $langsel; ?>" class="buttonPro small blue" title="Sửa lỗi nước"><i class="fa fa-wrench" aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_display_value.php?lang=<?php echo $langsel; ?>&ver=0" class="buttonPro small blue" title="Ngôn ngữ giao diện 2D" target="_blank"><i class="fa fa-file-word-o" aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_display_value.php?lang=<?php echo $langsel; ?>&ver=2" class="buttonPro small blue" title="Ngôn ngữ giao diện 3D" target="_blank"><i class="fa fa-wpforms" aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music_lyrics.php?lang=<?php echo $langsel; ?>" class="buttonPro small blue" title="Danh sách lời bài hát" target="_blank" ><i class="fa fa-audio-description syn app_my_girl_<?php echo $langsel; ?>_lyrics" aria-hidden="true"   syn="app_my_girl_<?php echo $langsel; ?>_lyrics"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music_link_youtube.php?lang=<?php echo $langsel; ?>" class="buttonPro small blue" title="Liên kết youtube" target="_blank"><i class="fa fa-youtube-play syn app_my_girl_video_<?php echo $langsel; ?>" aria-hidden="true" target="_blank"  syn="app_my_girl_video_<?php echo $langsel; ?>"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_storage.php?lang=<?php echo $langsel; ?>" class="buttonPro small blue" title="Các câu thoại lưu trữ để cập nhật" target="_blank"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
            <?php
            echo mysqli_error($link);
            ?>
        </div>

        <div class="body">
            <ul>
                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>" target="_blank">Lịch sử trò chuyện</a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0" target="_blank"><i class="fa fa-mars" aria-hidden="true"></i></a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0" target="_blank" title="Xem lịch sử theo người dùng"><i class="fa fa-venus" aria-hidden="true"></i></i></a>
                    <ul>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0" target="_blank">Nam - nữ</a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0&view_group=1" target="_blank"><i class="fa fa-caret-right" aria-hidden="true"></i></a>&nbsp;
                            <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=0" target="_blank">Nam - Nam</a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0&view_group=1" target="_blank"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0" target="_blank">Nữ - nam</a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&view_group=1" target="_blank" title="Xem lịch sử theo người dùng"><i class="fa fa-caret-right" aria-hidden="true"></i></a>&nbsp;
                            <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1" target="_blank">Nữ - nữ </a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&view_group=1" target="_blank" title="Xem lịch sử theo người dùng"><i class="fa fa-caret-right" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="syn app_my_girl_msg_<?php echo $langsel; ?>" syn="app_my_girl_msg_<?php echo $langsel; ?>" href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&character_sex=1" target="_blank">Câu thoại trò chuyện:<?php echo $data_count_msg['c']; ?></a>
                    <ul>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1" target="_blank">Nam - nữ :<?php echo $data_count_msg_sex_0['c']; ?></a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0" target="_blank">Nữ - nam:<?php echo $data_count_msg_sex_1['c']; ?></a>&nbsp;<a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=0" target="_blank">Nam - nam:<?php echo $data_count_msg_sex_0_0['c']; ?></a> &nbsp;<a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=0&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></i></a>&nbsp;&nbsp;
                            <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1" target="_blank">Nữ - Nữ:<?php echo $data_count_msg_sex_1_1['c']; ?></a>&nbsp;<a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></i></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="syn app_my_girl_<?php echo $langsel; ?>" syn="app_my_girl_<?php echo $langsel; ?>" href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0" target="_blank">Câu chat trò chuyện:<?php echo $data_count_chat['c']; ?></a>
                    <ul>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1" target="_blank">Nam - Nữ:<?php echo $data_count_chat_sex_0['c']; ?></a>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></i></a>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&tip=1" target="_blank"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
                            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1" title="Thêm trò chuyện nam" target="_blank"><i class="fa fa-plus"></i></a>
                        </li>

                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0" target="_blank">Nữ - Nam:<?php echo $data_count_chat_sex_1['c']; ?></a>&nbsp;<a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></a></i>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&tip=1" target="_blank"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
                            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0" title="Thêm trò chuyện nữ" target="_blank"><i class="fa fa-plus"></i></a>
                        </li>

                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=0" target="_blank">Nam - Nam:<?php echo $data_count_chat_sex_0_0['c']; ?></a>&nbsp;<a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></a></i>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=0&tip=1" target="_blank"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
                            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=0" title="Thêm trò chuyện nữ" target="_blank"><i class="fa fa-plus"></i></a>
                        </li>

                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1" target="_blank">Nữ - Nữ:<?php echo $data_count_chat_sex_1_1['c']; ?></a>&nbsp;<a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&disable_chat=1" target="_blank"><i class="fa fa-eye-slash"></a></i>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&tip=1" target="_blank"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></a>
                            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1" title="Thêm trò chuyện nữ" target="_blank"><i class="fa fa-plus"></i></a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>" target="_blank">Gợi ý trò chuyện của người dùng:<?php echo $data_count_brain['c']; ?></a>
                    <ul>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1" target="_blank">Nam:<?php echo $data_count_brain_sex_0['c']; ?></a> 
                            <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&criterion=1" target="_blank"><i class="fa fa-check-circle-o" aria-hidden="true"></i> (đúng chuẩn)</a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0" target="_blank">Nữ:<?php echo $data_count_brain_sex_1['c']; ?></a>
                            <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&criterion=1" target="_blank"><i class="fa fa-check-circle-o" aria-hidden="true"></i> (đúng chuẩn)</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_report.php?lang=<?php echo $langsel; ?>" target="_blank">Báo lỗi:<?php echo $data_count_report['c'];?></a>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?lang=<?php echo $langsel; ?>" target="_blank">Gợi ý âm nhạc:<?php echo $data_count_music_key['c']; ?></a>
                </li>
            </ul>
        </div>

    </div>
<?php
}
?>