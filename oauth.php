<?php
include "config.php";
include "database.php";
    $data_display=mysqli_fetch_array(mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang` = 'vi' AND `version` = '0' LIMIT 1"));
    $arr_data=(Array)json_decode($data_display['data']);
	echo $arr_data['setting_url_sound_test_sex0'];
	
