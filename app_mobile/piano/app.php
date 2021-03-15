<?php
include "config.php";
include "database.php";

$function='';
$id_device='';
if(isset($_POST['function']))$function=$_POST['function'];
if(isset($_POST['id_device']))$id_device=$_POST['id_device'];

if($function=='upload_midi'){
    $name_midi=$_POST['name_midi'];
    $line0=$_POST['line0'];
    $line1=$_POST['line1'];
    $line2=$_POST['line2'];

    $type0=$_POST['type0'];
    $type1=$_POST['type1'];
    $type2=$_POST['type2'];

    $speed=$_POST['speed'];
    $id_midi=uniqid().uniqid();
    $query_add=mysqli_query($link,"INSERT INTO `midi` (`id_midi`,`id_device`, `name`, `data0`, `data1`, `data2`, `type0`, `type1`, `type2`, `speed`, `sell`) VALUES ('$id_midi','$id_device', '$name_midi', '$line0', '$line1', '$line2', '$type0', '$type1', '$type2', '$speed', '0');");

    echo "Thank you for contributing the draft midi piano, We will review and release to the world in the fastest time possible.";
}


if($function=='list_midi_online'){
    $arr_data=array();
    $query_list=mysqli_query($link,"SELECT * FROM `midi` WHERE `sell` > '0' ORDER BY RAND() LIMIT 15");
    while($row_data=mysqli_fetch_assoc($query_list)){
        array_push($arr_data,$row_data);
    }
    echo json_encode($arr_data);
}

if($function=='list_app_carrot'){
    $arr_app=array();
    $os=$_POST['os'];
    $query_list_ads=mysqli_query($link,"SELECT `id`,`name`,`$os` FROM carrotsy_virtuallover.`app_my_girl_ads` WHERE `$os` != '' ORDER BY RAND() LIMIT 10");
    while($row_ads=mysqli_fetch_array($query_list_ads)){
        $row_ads["icon"]=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/obj_ads/icon_'.$row_ads['id'].'.png&size=80';
        $row_ads["url"]=$row_ads[$os];
        array_push($arr_app,$row_ads);
    }
    echo json_encode($arr_app);
}
?>