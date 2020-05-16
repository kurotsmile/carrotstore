<?php
class App{
    public $list_country=array();
    public $list_music=array();
    public $data_lang;
}

Class Country_Item{
    public $id;
    public $name;
    public $icon;
    public $key;
    public $number_show_ads='6';
    public $store_android='https://play.google.com/store/apps/details?id=com.CarrotApp.musicforlife';
    public $store_ios='https://itunes.apple.com/us/app/music-for-life/id1435986961';
}

Class Song{
    public $id;
    public $url;
    public $name;
    public $color;
    public $lang;
    public $type;
    public $lyrics;
    public $id_video;
    public $img_video;
}

$app=new App();


$query_list_lang=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
while($row_lang=mysqli_fetch_array($query_list_lang)){
    $country_item=new Country_Item();
    $country_item->id=$row_lang['id'];
    $country_item->name=$row_lang['name'];
    $country_item->key=$row_lang['key'];
    $country_item->icon='http://carrotstore.com//app_mygirl/img/'.$row_lang['key'].'.png';
    array_push($app->list_country,$country_item);
}

?>