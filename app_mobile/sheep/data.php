<?php
Class App_sheep{
    public $list_lang=array();
    public $list_music=array();
}

class App_sheep_lang_item{
    public $id='';
    public $key='';
    public $name='';
    public $icon='';
    
    public $goto_sleep='';
    public $play_game='';
    public $home_tip='';
    public $btn_cancel='';
    public $btn_okay='';
    public $select_sheep='';
    public $select_music='';
    public $setting='';
    public $remove_ads='';
    public $remove_ads_tip='';
    public $select_lang='';
    public $restore='';
    public $restore_tip='';
    public $buy_music='';
    public $hight_socre='';
    public $play_again='';
    public $btn_sel_1='';
    public $btn_sel_2='';
    public $btn_sel_3='';
    public $btn_sel_4='';
    public $error_name='';
    public $error_msg='';
    public $good_night_write='';
    public $good_night_name='';
    public $good_night_msg='';
    public $good_night_success='';
    public $music_type_1='';
    public $music_type_2='';
    public $sound_tip='';
    public $sound_on='';
    public $sound_off='';
    public $count_end_1='';
    public $count_end_2='';
    public $count_end_tip='';
    public $buy_ads_success='';
    public $buy_heart_success='';
    public $buy_music_success='';
    public $shop='';
    public $buy_fail='';
    public $restore_success='';
    public $restore_fail='';
    public $sex='';
    public $sex_boy='';
    public $sex_girl='';
    public $account='';
    public $account_status='';
    public $account_status_1='';
    public $account_status_2='';
    public $address='';
    public $rules='';
    public $account_rules='';
    public $create_and_edit_account='';
    public $edit='';
    public $error_phone='';
    public $account_update_success='';
    public $account_add_success='';
    public $phone_number='';
    public $top_player='';
    public $scores='';
    public $continue_playing='';
    public $app_more='';
    public $app_more_setting='';
    public $app_more_tip='';
    
    public $ads_admob_baner_android='ca-app-pub-1054492803072526/5064308394';
    public $ads_admob_baner_ios='ca-app-pub-1054492803072526/6493349257';
    public $ads_admob_Interstitial_android='ca-app-pub-1054492803072526/2055001679';
    public $ads_admob_Interstitial_ios='ca-app-pub-1054492803072526/4797124204';
}

$app_sheep=new App_sheep();

include "lang/lang_vi.php";
include "lang/lang_en.php";
include "lang/lang_es.php";
include "lang/lang_pt.php";
include "lang/lang_fr.php";
include "lang/lang_hi.php";
include "lang/lang_zh.php";
include "lang/lang_ru.php";
include "lang/lang_de.php";
include "lang/lang_th.php";
include "lang/lang_ko.php";
include "lang/lang_ja.php";
?>