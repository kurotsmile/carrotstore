<?php
class App{
    public $all_chat=array();
    public $all_tip=array();
    public $all_user=array();
};

class Chat{
    public $chat='';
    public $status='';
    public $color='';
    public $link='';
    public $vibrate='';
    public $mp3='';
    public $effect='';
    public $action='';
    public $face='';
    public $id_chat=''; 
    public $type_chat=''; 
    public $effect_customer='';
    public $data_text='';
    public $video='';
}

class User{
    public $id="";
    public $name="";
    public $phone="";
    public $address="";
    public $avatar="";
    public $status="";
    public $sex="";
    public $count_date="";
    public $type="";
}

Class Lang_app{
    public $menu_lang=array();
}

Class Item_lang{
    public $id='';
    public $key='';
    public $name='';
    public $url_icon='';
    public $setting_url_sound_test_sex0='';
    public $setting_url_sound_test_sex1='';
}

?>