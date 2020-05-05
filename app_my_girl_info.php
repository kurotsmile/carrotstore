<?php
include "app_my_girl_template.php";

$arr_country_work = array();
if (isset($data_user_carrot['country_work'])) {
    $arr_country_work = json_decode($data_user_carrot['country_work']);
}

$char_view_type = '0';

if (isset($_GET['char_view_type'])) {
    $char_view_type = $_GET['char_view_type'];
}

if (isset($_SESSION['char_view'])) {
    $char_view = $_SESSION['char_view'];
}

Class Char
{
    public $date = array();
    public $data = array();
}

$c = new Char();

if ($char_view_type == '2') {
    $log_month = mysqli_query($link,"SELECT * FROM `app_my_girl_log_data`");
    while ($row_log = mysqli_fetch_array($log_month)) {
        array_push($c->date, $row_log['dates']);
        array_push($c->data, $row_log['key']);
    }
    mysqli_free_result($log_month);

}
?>
    <script src="<?php echo $url; ?>/js/Chart.min.js"></script>


    <div style="width: 100%;float:left;background-color: none !important;" id="menu_child_home">
        <?php

        $query_app_work = mysqli_query($link,"SELECT * FROM carrotsy_work.`work_app`");
        while ($row_app_work = mysqli_fetch_array($query_app_work)) {
            echo '<a target="_blank"  href="' . $row_app_work['url'] . '">';
            echo '<img src="http://work.carrotstore.com/thumb.php?src=http://work.carrotstore.com/avatar_app/' . $row_app_work['id'] . '.png&size=18&trim=1"/> ';
            echo $row_app_work['name'];
            echo '</a>';
        }
        mysqli_free_result($query_app_work);

        if (isset($_SESSION['is_login_user']) && $_SESSION['is_login_user'] != "") {
            ?>
            <a style="float: right;" href="<?php echo $url; ?>/vl/?logout=1">
                <strong><img style="width: 20px;float: left;margin-right: 5px;"
                             src="http://work.carrotstore.com/img.php?url=avatar_user/<?php echo $data_user_carrot['user_id']; ?>.png&size=20"/>
                    User:</strong> <?php echo $data_user_carrot['user_name']; ?>
            </a>
        <?php } ?>
    </div>

    <h2 style=" width: 95%;">
        Dữ liệu người dùng đã trò chuyện
    </h2>

    <div style="display: inline-block;width: 95%;float: left;">
        &nbsp;
        <canvas id="myChart" style="position: relative;" width="100%" height="20px"></canvas>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var chart = new Chart(ctx, {

                type: <?php if ($char_view_type == '0') {
                    echo '"bar"';
                } else {
                    echo '"line"';
                } ?>,
                data: {
                    <?php  if($char_view_type == '0'){?>labels: ["hôm nay :<?php echo date('Y/m/d', time()); ?>"],<?php } ?>
                    <?php  if($char_view_type == '2'){?>labels: <?php echo json_encode($c->date);?>,<?php } ?>
                    datasets: [
                        <?php
                        if ($char_view_type == '0') {
                            $txt_out_data_char = '';
                            for ($i_c = 0; $i_c < count($arr_country_work); $i_c++) {
                                $color = 'rgb(' . rand(0, 225) . ', ' . rand(0, 225) . ', ' . rand(0, 225) . ')';
                                $s_lang = $arr_country_work[$i_c];
                                $query_data = mysqli_query($link,"SELECT COUNT(*) FROM `app_my_girl_key` WHERE `lang`='$s_lang' ORDER BY `lang` DESC");
                                $a = mysqli_fetch_array($query_data);
                                $txt_out_data_char .= '{';
                                $txt_out_data_char .= 'label:"' . $s_lang . '",';
                                $txt_out_data_char .= 'fill: false,';
                                $txt_out_data_char .= "backgroundColor: '$color',";
                                $txt_out_data_char .= "borderColor: '$color',";
                                $txt_out_data_char .= "data:[" . $a[0] . "]";
                                $txt_out_data_char .= '},';
                                mysqli_free_result($query_data);
                            }
                            $txt_out_data_char = substr($txt_out_data_char, 0, strlen($txt_out_data_char) - 1);
                            echo $txt_out_data_char;
                        }

                        if ($char_view_type == '2') {
                            echo '{';
                            echo 'label: "Tổng dữ liệu đã trò chuyện từ đầu tháng đến giờ",';
                            echo 'backgroundColor: "#208000",';
                            echo 'borderColor: "#208000",';
                            echo 'fill:true,';
                            echo 'data:' . json_encode($c->data) . '';
                            echo '},';

                        }

                        ?>
                    ]
                },
                options: {}
            });


            function show_all_data_os() {
                chart.destroy();
                $.ajax({
                    url: "app_my_girl_jquery.php",
                    type: "get",
                    data: "function=show_char_all_data_os",
                    success: function (data, textStatus, jqXHR) {
                        var result = $.parseJSON(data);
                        var ctx = document.getElementById('myChart').getContext('2d');
                        chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: result['arr_date'],
                                datasets: [{
                                    label: "Android",
                                    backgroundColor: '#208000',
                                    borderColor: '#208000',
                                    fill: false,
                                    data: result['arr_android'],
                                }, {
                                    label: "Ios",
                                    backgroundColor: '#ff6633',
                                    borderColor: '#ff6633',
                                    fill: false,
                                    data: result['arr_ios'],
                                }]
                            },
                            options: {}
                        });
                    }

                });


            }

            function show_all_data_ver() {
                chart.destroy();
                $.ajax({
                    url: "app_my_girl_jquery.php",
                    type: "get",
                    data: "function=show_char_all_data_ver",
                    success: function (data, textStatus, jqXHR) {
                        var result = $.parseJSON(data);
                        var ctx = document.getElementById('myChart').getContext('2d');
                        chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: result['arr_date'],
                                datasets: [{
                                    label: "Ver 2D",
                                    backgroundColor: '#3366ff',
                                    borderColor: '#3366ff',
                                    fill: false,
                                    data: result['arr_ver1'],
                                }, {
                                    label: "Ver 3D",
                                    backgroundColor: '#9900cc',
                                    borderColor: '#9900cc',
                                    fill: false,
                                    data: result['arr_ver2'],
                                }]
                            },

                            options: {}
                        });
                    }

                });
            }

            function show_data_month() {
                chart.destroy();
                $.ajax({
                    url: "app_my_girl_jquery.php",
                    type: "get",
                    data: "function=show_data_month",
                    success: function (data, textStatus, jqXHR) {
                        var result = $.parseJSON(data);
                        var ctx = document.getElementById('myChart').getContext('2d');
                        chart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: result['arr_date'],
                                datasets: [{
                                    label: "Dữ liệu tháng",
                                    backgroundColor: '#3366ff',
                                    borderColor: '#3366ff',
                                    fill: true,
                                    data: result['arr_ver1'],
                                }]
                            },

                            options: {}
                        });
                    }

                });
            }
        </script>


    </div>

    <div id="frm_seach">
        <div class="col">

            <?php if ($char_view_type == '1') { ?>
                <a href="<?php echo $url; ?>/vl?char_view_type=0" class="buttonPro small yellow"><i
                            class="fa fa-line-chart"></i> Hôm nay</a>
            <?php } else { ?>
                <a href="<?php echo $url; ?>/vl?char_view_type=2" class="buttonPro small yellow"><i
                            class="fa fa-line-chart"></i> Tổng </a>
            <?php } ?>
            <button onclick="show_all_data_os()" class="buttonPro small yellow"><i class="fa fa-line-chart"></i> Nền tản
            </button>
            <button onclick="show_all_data_ver()" class="buttonPro small yellow"><i class="fa fa-line-chart"></i> Phiên
                bản
            </button>
            <button onclick="show_data_month()" class="buttonPro small yellow"><i class="fa fa-bar-chart"></i> Tháng
            </button>

            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_all_brain" class="buttonPro small red"><i class="fa fa-trash"></i> dạy</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_all_report" class="buttonPro small red"><i class="fa fa-trash"></i> báo lỗi</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=delete_all_key_music" class="buttonPro small red"><i class="fa fa-trash"></i> Tìm nhạc</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=fix_error" class="buttonPro small blue"><i class="fa fa-wrench" aria-hidden="true"></i> Sửa Lỗi</a>
            <a href="<?php echo $url; ?>/app_my_girl_mission.php" class="buttonPro small black"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Nhiệm vụ</a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=manager_country_work" class="buttonPro small black"><i class="fa fa-connectdevelop" aria-hidden="true"></i> Ẩn / hiện quốc gia</a>
            <a href="<?php echo $url; ?>/app_my_girl_mission.php" class="buttonPro small black"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Nhiệm vụ</a>
            <a href="#" class="buttonPro small purple"><i class="fa fa-refresh" aria-hidden="true"></i> Kiểm tra và đồng bộ dữ liệu</a>
        </div>
    </div>
<?php


for ($i = 0; $i < count($arr_country_work); $i++) {
    $langsel = $arr_country_work[$i];

    $disable_girl = 0;
    if ($sel_version == '1') {
        if ($lang_app->menu_lang[$i]->enable_girl == '1') {
            $disable_girl = 0;
        } else {
            $disable_girl = 1;
        }
    }

    $query_name_country = mysqli_query($link,"SELECT `name` FROM `app_my_girl_country` WHERE `key` = '$langsel' LIMIT 1");
    $name_country = mysqli_fetch_array($query_name_country);
    $name_country = $name_country['name'];

    $result_count_msg = mysqli_query($link,"SELECT `id` FROM `app_my_girl_msg_$langsel`");
    $result_count_msg_sex_0 = mysqli_query($link,"SELECT `id` FROM `app_my_girl_msg_$langsel` WHERE `sex`='0'");
    if ($disable_girl == 0) {
        if ($sel_version == '1') {
            $result_count_msg_sex_1 = mysqli_query($link,"SELECT `id` FROM `app_my_girl_msg_$langsel` WHERE `sex`='1' and `character_sex` = '1'");
        } else {
            $result_count_msg_sex_1 = mysqli_query($link,"SELECT `id` FROM `app_my_girl_msg_$langsel` WHERE `sex`='1' and `character_sex` = '0'");
        }
    }
    $result_count_chat = mysqli_query($link,"SELECT `id` FROM `app_my_girl_$langsel` WHERE `disable`=0");
    $result_count_chat_sex_0 = mysqli_query($link,"SELECT `id` FROM `app_my_girl_$langsel` WHERE `sex`='0' and `disable`=0");
    if ($disable_girl == 0) {
        if ($sel_version == '1') {
            $result_count_chat_sex_1 = mysqli_query($link,"SELECT `id` FROM `app_my_girl_$langsel` WHERE `sex`='1' and  `character_sex` = '1' and `disable`=0");
        } else {
            $result_count_chat_sex_1 = mysqli_query($link,"SELECT `id` FROM `app_my_girl_$langsel` WHERE `sex`='1' and  `character_sex` = '0' and `disable`=0");
        }
    }
    $result_count_brain = mysqli_query($link,"SELECT `question` FROM `app_my_girl_brain` WHERE `langs`='$langsel' and `tick`='0'");
    $result_count_brain_sex_0 = mysqli_query($link,"SELECT `question` FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `sex`='0' and `tick`='0'");
    if ($disable_girl == 0) {
        if ($sel_version == '1') {
            $result_count_brain_sex_1 = mysqli_query($link,"SELECT `question` FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `sex`='1' and  `character_sex` = '1' and `tick`='0'");
        } else {
            $result_count_brain_sex_1 = mysqli_query($link,"SELECT `question` FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `sex`='1' and  `character_sex` = '0' and `tick`='0'");
        }
    }
    $result_count_report = mysqli_query($link,"SELECT * FROM `app_my_girl_report` WHERE `lang`='$langsel'");
    $result_count_music_key = mysqli_query($link,"SELECT DISTINCT `key` FROM `app_my_girl_log_key_music` WHERE `lang` = '$langsel'");
    $date = new DateTime("now", new DateTimeZone(get_key_lang($link,'timezone',$langsel)) );
    ?>
    <div class="box_lang">
        <div class="title">
            <a target="_blank" href="<?php echo $url; ?>/app_my_girl_info_country.php?lang=<?php echo $langsel; ?>"><img
                        class="icon" src="<?php echo thumb('app_mygirl/img/' . $langsel . '.png', '60'); ?>"/></a>
            <strong><?php echo $name_country; ?></strong><br/>
            Từ khóa ngôn ngữ:<?php echo $langsel; ?><br/>
            <i class="fa fa-clock-o" aria-hidden="true"></i> Múi giờ:<?php  echo $date->format('H:i:s d/m/Y'); ?><br/>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>" title="Thêm trò chuyện"
               class="buttonPro small blue" target="_blank"><i class="fa fa-plus-square"></i> Chat</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1" title="Thêm câu thoại"
               class="buttonPro small blue" target="_blank"><i class="fa fa-plus-circle"></i> Msg</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&effect=2&actions=9"
               title="Thêm bài hát" class="buttonPro small blue" target="_blank"><i class="fa fa-plus"></i> Music</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&effect=36"
               title="Thêm châm ngôn" class="buttonPro small blue" target="_blank"><i class="fa fa-plus-square"></i>
                Quote</a>
            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&effect=49"
               title="Thêm chuyện ngắn" class="buttonPro small blue" target="_blank"><i class="fa fa-plus-square-o"></i>
                Story</a>
            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>" title="Danh sách trò chuyện"
               class="buttonPro small blue" target="_blank"><i class="fa fa-comments"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>" title="Danh sách câu thoại"
               class="buttonPro small blue" target="_blank"><i class="fa fa-commenting-o"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music.php?lang=<?php echo $langsel; ?>" title="Danh sách nhạc"
               class="buttonPro small blue" target="_blank"><i class="fa fa-music"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?lang=<?php echo $langsel; ?>"
               title="Duyệt nhạc từ người dùng" class="buttonPro small blue" target="_blank"><i class="fa fa-headphones"
                                                                                                aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_user.php?lang=<?php echo $langsel; ?>" title="Danh sách người dùng"
               class="buttonPro small blue" target="_blank"><i class="fa fa-user-o"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_radio.php?lang=<?php echo $langsel; ?>" title="Danh sách Radio"
               class="buttonPro small blue" target="_blank"><i class="fa fa-wifi"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_maxim.php?lang=<?php echo $langsel; ?>" title="Danh sách châm ngôn"
               class="buttonPro small blue" target="_blank"><i class="fa fa-quote-left" aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_story.php?lang=<?php echo $langsel; ?>"
               title="Danh sách truyện ngắn" class="buttonPro small blue" target="_blank"><i class="fa fa-book"
                                                                                             aria-hidden="true"></i></a>
            <a href="https://play.google.com/store/apps/details?id=com.kurotsmile.mygirl&hl=<?php echo $langsel; ?>&msg=1"
               title="Chplay" class="buttonPro small blue" target="_blank"><i class="fa fa-android"
                                                                              aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_handling.php?func=fix_error&lang=<?php echo $langsel; ?>"
               class="buttonPro small blue" title="Sửa lỗi nước"><i class="fa fa-wrench"
                                                                                                aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_display_value.php?lang=<?php echo $langsel; ?>&ver=0"
               class="buttonPro small blue" title="Ngôn ngữ giao diện 2D" target="_blank"><i class="fa fa-file-word-o"
                                                                                             aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_display_value.php?lang=<?php echo $langsel; ?>&ver=2"
               class="buttonPro small blue" title="Ngôn ngữ giao diện 3D" target="_blank"><i class="fa fa-wpforms"
                                                                                             aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music_lyrics.php?lang=<?php echo $langsel; ?>"
               class="buttonPro small blue" title="Danh sách lời bài hát" target="_blank"><i
                        class="fa fa-audio-description" aria-hidden="true"></i></a>
            <a href="<?php echo $url; ?>/app_my_girl_music_link_youtube.php?lang=<?php echo $langsel; ?>"
               class="buttonPro small blue" title="Liên kết youtube" target="_blank"><i class="fa fa-youtube-play"
                                                                                        aria-hidden="true"></i></a>
        </div>

        <div class="body">
            <ul>
                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>" target="_blank">Lịch
                        sử trò chuyện</a> &nbsp; <a
                            href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0"
                            target="_blank"><i class="fa fa-mars" aria-hidden="true"></i></a> &nbsp; <a
                            href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0"
                            target="_blank" title="Xem lịch sử theo người dùng"><i class="fa fa-venus"
                                                                                   aria-hidden="true"></i></i></a>
                    <ul>
                        <li><a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0"
                               target="_blank">Nam - nữ</a> &nbsp;&nbsp;&nbsp;&nbsp;<a
                                    href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=0&view_group=1"
                                    target="_blank"><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        <?php if ($disable_girl == 0) { ?>
                            <?php
                            if ($sel_version == '1') {
                                ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1"
                                       target="_blank">Nữ - nữ</a> &nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&view_group=1"
                                            target="_blank" title="Xem lịch sử theo người dùng"><i
                                                class="fa fa-caret-right" aria-hidden="true"></i></li>
                                <?php
                            } else {
                                ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0"
                                       target="_blank">Nữ - nam</a> &nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&view_group=1"
                                            target="_blank" title="Xem lịch sử theo người dùng"><i
                                                class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    <?php if (($sel_version == '0' & $langsel == "vi") || ($sel_version == '0' & $langsel == "en")) { ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<a
                                                href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1"
                                                target="_blank">Nữ - nữ </a> &nbsp;&nbsp;&nbsp;&nbsp;<a
                                                href="<?php echo $url; ?>/app_my_girl_history.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&view_group=1"
                                                target="_blank" title="Xem lịch sử theo người dùng"><i
                                                    class="fa fa-caret-right" aria-hidden="true"></i></a>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&character_sex=1"
                       target="_blank">Câu thoại trò chuyện:<?php echo mysqli_num_rows($result_count_msg); ?></a>
                    <ul>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1"
                               target="_blank">Nam:<?php echo mysqli_num_rows($result_count_msg_sex_0); ?></a> &nbsp;&nbsp;&nbsp;&nbsp;<a
                                    href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&disable_chat=1"
                                    target="_blank"><i class="fa fa-eye-slash"></i></a></li>
                        <?php if ($disable_girl == 0) { ?>
                            <?php if ($sel_version == '1') { ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1"
                                       target="_blank">Nữ:<?php echo mysqli_num_rows($result_count_msg_sex_1); ?></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&disable_chat=1"
                                            target="_blank"><i class="fa fa-eye-slash"></i></a></li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0"
                                       target="_blank">Nữ:<?php echo mysqli_num_rows($result_count_msg_sex_1); ?></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="<?php echo $url; ?>/app_my_girl_msg.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&disable_chat=1"
                                            target="_blank"><i class="fa fa-eye-slash"></i></a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0"
                       target="_blank">Câu chat trò chuyện:<?php echo mysqli_num_rows($result_count_chat); ?></a>
                    <ul>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1"
                               target="_blank">Nam:<?php echo mysqli_num_rows($result_count_chat_sex_0); ?></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a
                                    href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&disable_chat=1"
                                    target="_blank"><i class="fa fa-eye-slash"></i></a>
                            <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&tip=1"
                               target="_blank" title="Xem các câu thoại gợi ý nam"><i class="fa fa-lightbulb-o"
                                                                                      aria-hidden="true"></i></a>
                            <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1"
                               title="Thêm trò chuyện nam" target="_blank"><i class="fa fa-plus"></i></a>
                        </li>
                        <?php if ($disable_girl == 0) { ?>
                            <?php if ($sel_version == '1') { ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1"
                                       target="_blank">Nữ:<?php echo mysqli_num_rows($result_count_chat_sex_1); ?></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&disable_chat=1"
                                            target="_blank"><i class="fa fa-eye-slash"></a></i>
                                    <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&tip=1"
                                       target="_blank" title="Xem các câu thoại gợi ý nữ"><i class="fa fa-lightbulb-o"
                                                                                             aria-hidden="true"></i></a>
                                    <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1"
                                       title="Thêm trò chuyện nữ" target="_blank"><i class="fa fa-plus"></i></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0"
                                       target="_blank">Nữ:<?php echo mysqli_num_rows($result_count_chat_sex_1); ?></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a
                                            href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&disable_chat=1"
                                            target="_blank"><i class="fa fa-eye-slash"></a></i>
                                    <a href="<?php echo $url; ?>/app_my_girl_chat.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&tip=1"
                                       target="_blank" title="Xem các câu thoại gợi ý nữ"><i class="fa fa-lightbulb-o"
                                                                                             aria-hidden="true"></i></a>
                                    <a href="<?php echo $url; ?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0"
                                       title="Thêm trò chuyện nữ" target="_blank"><i class="fa fa-plus"></i></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>" target="_blank">Gợi
                        ý trò chuyện của người dùng:<?php echo mysqli_num_rows($result_count_brain); ?></a>
                    <ul>
                        <li>
                            <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1"
                               target="_blank">Nam:<?php echo mysqli_num_rows($result_count_brain_sex_0); ?></a> <a
                                    href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=0&character_sex=1&criterion=1"
                                    target="_blank"><i class="fa fa-check-circle-o" aria-hidden="true"></i> (đúng chuẩn)</a>
                        </li>
                        <?php if ($disable_girl == 0) { ?>
                            <?php if ($sel_version == '1') { ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1"
                                       target="_blank">Nữ:<?php echo mysqli_num_rows($result_count_brain_sex_1); ?></a>
                                    <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=1&criterion=1"
                                       target="_blank"><i class="fa fa-check-circle-o" aria-hidden="true"></i> (đúng
                                        chuẩn)</a></li>
                            <?php } else { ?>
                                <li>
                                    <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0"
                                       target="_blank">Nữ:<?php echo mysqli_num_rows($result_count_brain_sex_1); ?></a>
                                    <a href="<?php echo $url; ?>/app_my_girl_brain.php?lang=<?php echo $langsel; ?>&sex=1&character_sex=0&criterion=1"
                                       target="_blank"><i class="fa fa-check-circle-o" aria-hidden="true"></i> (đúng
                                        chuẩn)</a></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_report.php?lang=<?php echo $langsel; ?>" target="_blank">Báo
                        lỗi:<?php echo mysqli_num_rows($result_count_report); ?></a>
                </li>

                <li>
                    <a href="<?php echo $url; ?>/app_my_girl_music_log_key.php?lang=<?php echo $langsel; ?>"
                       target="_blank">Gợi ý âm nhạc:<?php echo mysqli_num_rows($result_count_music_key); ?></a>
                </li>
            </ul>


        </div>


    </div>
    <?php


}
?>