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

if($function=='save_order_share'){
     $arr_id_share=json_decode($_POST['arr_id_share']);
     for($i=0;$i<count($arr_id_share);$i++){
         $id_share=$arr_id_share[$i];
         $this->q("UPDATE `carrotsy_virtuallover`.`share` SET `order` = '$i' WHERE `id` = '$id_share';");
     }
     echo 'Cập nhật thứ tự công cụ chia sẻ thành công!';
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

if($function=='acc_act'){
     $id=$_POST['id'];
     $lang=$_POST['lang'];
     $fn=$_POST['fn'];
     $obj=new stdClass();
     $obj->{"id"}=$id;
     if($fn=='del'){
        $sheep_del=$this->q("DELETE FROM `carrotsy_virtuallover`.acc_report WHERE `id_device` = '$id' AND `lang`='$lang' ");
        if($sheep_del){
             $obj->{"error"}=0;
             $obj->{"msg"}="Xóa thành công báo cáo $id";
        }else{
             $obj->{"error"}=1;
             $obj->{"msg"}="Xóa không thành báo cáo $id";
        }
     }
     echo json_encode($obj);
     exit;
}

if($function=='flower_act'){
     $id=$_POST['id'];
     $fn=$_POST['fn'];
     $obj=new stdClass();
     $obj->{"id"}=$id;
     if($fn=='del'){
        $sheep_del=$this->q("DELETE FROM `carrotsy_flower`.flower WHERE `id` = '$id'");
        if($sheep_del){
             $obj->{"error"}=0;
             $obj->{"msg"}="Xóa thành công châm ngôn $id";
        }else{
             $obj->{"error"}=1;
             $obj->{"msg"}="Xóa không thành châm ngôn $id";
        }
     }
     echo json_encode($obj);
     exit;
}

if($function=='key_music_act'){
     $id=$_POST['id'];
     $fn=$_POST['fn'];
     $obj=new stdClass();
     $obj->{"id"}=$id;
     if($fn=='del'){
        $sheep_del=$this->q("UPDATE carrotsy_music.`log_key` SET `is_see` = '1' WHERE `key` = '$id'");
        if($sheep_del){
             $obj->{"error"}=0;
             $obj->{"id"}=md5($id);
             $obj->{"msg"}="Xóa thành từ khóa âm nhạc $id";
        }else{
             $obj->{"error"}=1;
             $obj->{"msg"}="Xóa thành từ khóa âm nhạc $id";
        }
     }
     echo json_encode($obj);
     exit;
}

if($function=='unactive_music_key_check'){
     $obj=new stdClass();
     $list_key_waring=$this->q("SELECT `key` FROM `carrotsy_virtuallover`.`app_my_girl_remove_key_music`");
     $count_k=0;
     while($k=mysqli_fetch_assoc($list_key_waring)){
          $k_key=$k['key'];
          $q_del=$this->q("UPDATE `carrotsy_music`.`log_key` SET `is_see` = '1' WHERE `key` = '$k_key' AND `is_see` = '0'");
          if($q_del) $count_k=$count_k+mysqli_affected_rows($this->link_mysql);
     }

     $table='<table>';
     $list_key_music=$this->q("SELECT * FROM carrotsy_music.`log_key` WHERE `is_see`=0 GROUP BY `key`");
     $num_key_music=mysqli_num_rows($list_key_music);
     if($num_key_music>0){
          while($m=mysqli_fetch_assoc($list_key_music)){
               $m_k=$m['key'];
               $m_l=$m['lang'];
               $table.='<tr class="k_m_'.md5($m_k).' m_emp">';
               $table.='<td style="width: 220px;"><a target="_blank" href="'.$this->url_carrot_store.'/app_my_girl_handling.php?func=check_music&key_word='.$m_k.'">'.$m_k.'</a></td>';
               $table.='<td>';
               $table.='<a target="_blank" onclick="$(this).addClass(\'blue\');" href="'.$this->url_carrot_store.'/app_my_girl_handling.php?func=remove_key_music&key='.$m_k.'" class="buttonPro small"><i class="fa fa-ban" aria-hidden="true"></i></a>';
               $table.='<a href="#" class="buttonPro small red" onclick="key_music_act(\'del\',\''.$m_k.'\')"><i class="fa fa-eraser" aria-hidden="true"></i></a>';
               $table.='</td>';
               $table.='</tr>';
          }
     }
     $table.='<table>';

     $obj->{"msg"}="Đã loại bỏ $count_k từ khóa đã kiểm dyệt!";
     $obj->{"table"}=$table;
     $obj->{"count_k"}=$num_key_music;
     echo json_encode($obj);
     exit;
}

if($function=='chat_act'){
     $id_chat=$_POST['id'];
     $obj=new stdClass();
     $obj->{"id"}=$id_chat;
     $q_del=$this->q("DELETE FROM `carrotsy_virtuallover`.`app_my_girl_brain` WHERE `md5` = '$id_chat' LIMIT 1;");
     $obj->{"error"}=0;
     $obj->{"msg"}="Đã xóa câu dạy trò chuyện $id_chat !";
     $cont_all_chat=$this->q_data("SELECT COUNT(`md5`) as c FROM carrotsy_virtuallover.`app_my_girl_brain` LIMIT 1");
     $count_total_chat=$cont_all_chat['c'];
     $obj->{"count_c"}=$count_total_chat;
     echo json_encode($obj);
     exit;
}

if($function=='report_act'){
     $id_chat=$_POST['id'];
     $type_chat=$_POST['type'];
     $obj=new stdClass();
     $q_del=$this->q("DELETE FROM `carrotsy_virtuallover`.`app_my_girl_report` WHERE `type_question` = '$type_chat' AND `id_question` = '$id_chat'  LIMIT 1");
     $obj->{"error"}=0;
     $obj->{"msg"}="Thiện thanh Pro $id_chat $type_chat";
     $obj->{"id"}="".$id_chat."_".$type_chat;
     echo json_encode($obj);
     exit;
}
?>