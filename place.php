<?php
include "config.php";
include "database.php";
include "function.php";


class Place{
    public  $id=0;
    public  $name='';
    public  $icon='';
    public  $address='';
}


class App{
    public $all_place=array();
}
$app=new App;


$result = mysql_query("SELECT * FROM `place` ORDER BY RAND()",$link);

while ($row = mysql_fetch_array($result)) {
    $address=json_decode($row[4]);
    $p=new Place;
    $p->id=$row[0];
    $p->name=$row[1];
    $p->address=$address->address;
    $p->icon=thumb($row[3],'130x130');
    array_push($app->all_place,$p);
}

echo json_encode($app);
exit;