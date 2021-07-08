<?php
$function='';if(isset($_POST['function']))$function=$_POST['function'];
if($function=='save_order_app'){
    $arr_id_app=json_decode($_POST['arr_id_app']);
    for($i=0;$i<count($arr_id_app);$i++){
        $id_app=$arr_id_app[$i];
        $this->q("UPDATE `work_app` SET `order` = '$i' WHERE `id` = '$id_app';");
    }
    echo 'Cập nhật thứ tự ứng dụng cms thành công!';
    exit;
}

if($function=='sheep_act'){
    $id=$_POST['id'];
    $fn=$_POST['fn'];
    $obj=new stdClass();
    $obj->{"id"}=$id;
    if($fn=='del'){
       $sheep_del=$this->q("DELETE FROM carrotsy_sheep.`good_night` WHERE (`id` = '$id') LIMIT 1");
       if($sheep_del){
            $obj->{"error"}=0;
            $obj->{"msg"}="Xóa thành công lời chúc ngủ ngon $id";
       }else{
            $obj->{"error"}=1;
            $obj->{"msg"}="Xóa không thành công lời chúc ngủ ngon $id";
       }
    }

    if($fn=='act'){
        $sheep_act=$this->q("UPDATE carrotsy_sheep.`good_night` SET `active` = '0' WHERE `id` = '$id' LIMIT 1");
        if($sheep_act){
             $obj->{"error"}=0;
             $obj->{"msg"}="Kích hoạt thành công lời chúc ngủ ngon $id";
        }else{
             $obj->{"error"}=1;
             $obj->{"msg"}="Kích hoạt không thành công lời chúc ngủ ngon $id";
        }
     }
    echo json_encode($obj);
    exit;
}

if($function=='midi_act'){
    $id=$_POST['id'];
    $fn=$_POST['fn'];
    $obj=new stdClass();
    $obj->{"id"}=$id;
    if($fn=='del'){
       $sheep_del=$this->q("DELETE FROM carrotsy_piano.`midi`WHERE `id_midi`='$id' LIMIT 1;");
       if($sheep_del){
            $obj->{"error"}=0;
            $obj->{"msg"}="Xóa thành công Midi $id";
       }else{
            $obj->{"error"}=1;
            $obj->{"msg"}="Xóa không thành Midi $id";
       }
    }

    if($fn=='public'){
        $sheep_act=$this->q("UPDATE carrotsy_piano.`midi` SET `sell` = '1' WHERE `id_midi`='$id' LIMIT 1;");
        if($sheep_act){
             $obj->{"error"}=0;
             $obj->{"msg"}="Xuất bản thành công Midi $id";
        }
    }

    if($fn=='sell'){
        $sheep_act=$this->q("UPDATE carrotsy_piano.`midi` SET `sell` = '2' WHERE `id_midi`='$id' LIMIT 1;");
        if($sheep_act){
             $obj->{"error"}=0;
             $obj->{"msg"}="Thương mại hóa thành công Midi $id";
        }
    }

    if($fn=='archive'){
        $sheep_act=$this->q("UPDATE carrotsy_piano.`midi` SET `sell` = '3' WHERE `id_midi`='$id' LIMIT 1;");
        if($sheep_act){
             $obj->{"error"}=0;
             $obj->{"msg"}="Lưu trũ thành công Midi $id";
        }
    }
    echo json_encode($obj);
    exit;
}
?>