<?php
include "config.php";
include "database.php";

$function='';
if(isset($_POST['function'])){
    $function=$_POST['function'];
}

if($function=='save_midi'){


    $id=$_POST['id'];
    $act=$_POST['act'];
    $name_midi=$_POST['name_midi'];
    $id_device=$_POST['id_device'];
    $sell_midi=$_POST['sell_midi'];
    $speed_midi=$_POST['speed_midi'];

    $data0=$_POST['data_line0'];
    $data1=$_POST['data_line1'];
    $data2=$_POST['data_line2'];

    $type0=$_POST['data_type0'];
    $type1=$_POST['data_type1'];
    $type2=$_POST['data_type2'];

    if($act=='add'){
        $id_midi=uniqid().uniqid();
        $query_add_midi=mysqli_query($link,"INSERT INTO `midi` (`id_midi`, `id_device`, `name`, `data0`, `data1`, `data2`, `type0`, `type1`, `type2`, `speed`, `sell`) VALUES ('$id_midi', '$id_device', '$name_midi', '$data0', '$data1', '$data2', '$type0', '$type1', '$type2', '$speed_midi', '$sell_midi');");
        if($query_add_midi){
            echo 'Thêm mới Midi thành công!';
        }else{
            echo 'Thêm mới Midi thất bại!';
        }

    }else{
        $query_update_midi=mysqli_query($link,"UPDATE `midi` SET `data0` = '$data0', `data1` = '$data1', `data2`='$data2',`type0` = '$type0',`type1` = '$type1',`type2` = '$type2',`name`='$name_midi',`speed`='$speed_midi',`sell`='$sell_midi' WHERE `id_midi` = '$id' LIMIT 1;");
        if($query_update_midi){
            echo 'Cập nhật Midi thành công!';
        }else{
            echo 'Cập nhật Midi thất bại!';
        }
    }
    
}