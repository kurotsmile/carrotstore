<?php
$function='';if(isset($_POST['function']))$function=$_POST['function'];
if($function=='save_order_app'){
    $arr_id_app=json_decode($_POST['arr_id_app']);
    for($i=0;$i<count($arr_id_app);$i++){
        $id_app=$arr_id_app[$i];
        $this->q("UPDATE carrotsy_work.`work_app` SET `order` = '$i' WHERE `id` = '$id_app';");
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
     $id=urldecode($_POST['id']);
     $fn=$_POST['fn'];
     $obj=new stdClass();
     $obj->{"id"}=$id;
     if($fn=='del'){
        $sheep_del=$this->q("UPDATE carrotsy_music.`log_key` SET `is_see` = '1' WHERE `key` = '$id'");
        $this->q("DELETE FROM `carrotsy_virtuallover`.`app_my_girl_log_key_music` WHERE `key` = '$id'");
        if($sheep_del){
             $obj->{"error"}=0;
             $obj->{"id"}=md5($id);
             $obj->{"msg"}="Xóa thành công từ khóa âm nhạc $id";
        }else{
             $obj->{"error"}=1;
             $obj->{"msg"}="Xóa không thành công từ khóa âm nhạc $id";
        }
     }
     $q_count_m1=$this->q("SELECT * FROM carrotsy_music.`log_key` WHERE `is_see`=0 GROUP BY `key`");
     $q_count_m2=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_log_key_music` GROUP BY `key`");
     $obj->{"count_m1"}=mysqli_num_rows($q_count_m1);
     $obj->{"count_m2"}=mysqli_num_rows($q_count_m2);
     echo json_encode($obj);
     exit;
}

if($function=='unactive_music_key_check'){
     $this->q("UPDATE carrotsy_virtuallover.`app_my_girl_log_key_music` set `key`=REPLACE(`key`,char(39),'')");
     $obj=new stdClass();
     $list_key_waring=$this->q("SELECT `key` FROM `carrotsy_virtuallover`.`app_my_girl_remove_key_music`");
     $count_k=0;
     $count_m=0;
     while($k=mysqli_fetch_assoc($list_key_waring)){
          $k_key=$k['key'];
          $q_del=$this->q("UPDATE `carrotsy_music`.`log_key` SET `is_see` = '1' WHERE `key` = '$k_key' AND `is_see` = '0'");
          if($q_del) $count_k=$count_k+mysqli_affected_rows($this->link_mysql);

          $q_del_m=$this->q("DELETE FROM `carrotsy_virtuallover`.`app_my_girl_log_key_music` WHERE `key` = '$k_key'");
          if($q_del_m) $count_m=$count_m+mysqli_affected_rows($this->link_mysql);
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

     $tb_m='<table>';
     $list_m_key=$this->q("SELECT * FROM `carrotsy_virtuallover`.`app_my_girl_log_key_music`");
     $m_num_key=mysqli_num_rows($list_m_key);
     if($m_num_key>0){
          while($m=mysqli_fetch_assoc($list_m_key)){
               $m_k=$m['key'];
               $m_l=$m['lang'];
               $tb_m.='<tr class="k_m_'.md5($m_k).' m_emp">';
               $tb_m.='<td style="width: 220px;"><a target="_blank" href="'.$this->url_carrot_store.'/app_my_girl_handling.php?func=check_music&key_word='.$m_k.'">'.$m_k.'</a></td>';
               $tb_m.='<td>';
               $tb_m.='<a target="_blank" onclick="$(this).addClass(\'blue\');" href="'.$this->url_carrot_store.'/app_my_girl_handling.php?func=remove_key_music&key='.$m_k.'" class="buttonPro small"><i class="fa fa-ban" aria-hidden="true"></i></a>';
               $tb_m.='<a href="#" class="buttonPro small red" onclick="key_music_act(\'del\',\''.$m_k.'\')"><i class="fa fa-eraser" aria-hidden="true"></i></a>';
               $tb_m.='</td>';
               $tb_m.='</tr>';
          }
     }
     $tb_m.='<table>';

     $obj->{"msg"}="Đã loại bỏ $count_k từ khóa đã kiểm dyệt! \n  Đã xóa $count_m từ khóa âm nhạc đã duyệt từ ứng dụng Virtual Lover!";
     $obj->{"table1"}=$table;
     $obj->{"table2"}=$tb_m;

     $q_count_m1=$this->q("SELECT * FROM carrotsy_music.`log_key` WHERE `is_see`=0 GROUP BY `key`");
     $q_count_m2=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_log_key_music` GROUP BY `key`");
     $obj->{"count_m1"}=mysqli_num_rows($q_count_m1);
     $obj->{"count_m2"}=mysqli_num_rows($q_count_m2);
     echo json_encode($obj);
     exit;
}

if($function=='delete_all_music_key'){
     $obj=new stdClass();
     $q_del_all=$this->q("DELETE FROM `carrotsy_virtuallover`.`app_my_girl_log_key_music`");
     $obj->msg="Xóa thành công tất cả từ khóa âm nhạc!!!";
     echo json_encode($obj);
     exit;
}

if($function=='chat_act'){
     $id_chat=$_POST['id'];
     $fn=$_POST['fn'];
     $obj=new stdClass();
     $obj->{"id"}=$id_chat;
     if($fn=='del'){
          $q_del=$this->q("DELETE FROM `carrotsy_virtuallover`.`app_my_girl_brain` WHERE `md5` = '$id_chat' LIMIT 1;");
          $obj->{"error"}=0;
          $obj->{"msg"}="Đã xóa câu dạy trò chuyện $id_chat !";
     }

     if($fn=='reload'){
          $list_chat=$this->q("SELECT `question`, `answer`,`langs`,`md5`,`sex`,`character_sex`,`id_question`,`type_question`,`id_device` FROM carrotsy_virtuallover.`app_my_girl_brain` ORDER BY `date_pub` DESC LIMIT 50");
          include_once("page_inspection_chat_table.php");
          $obj->{"table"}=$s_table;
          $obj->{"count_item"}=mysqli_num_rows($list_chat);
     }
     
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
     $obj->{"msg"}="Đã xóa báo cáo $id_chat $type_chat";
     $obj->{"id"}="".$id_chat."_".$type_chat;
     echo json_encode($obj);
     exit;
}

if($function=='answer_act'){
     $obj=new stdClass();
     $key_lang=$_POST['lang'];

     $ans=$this->q_data("SELECT `key`,`id_question`,`type_question`,`character_sex`,`sex` FROM carrotsy_virtuallover.`app_my_girl_key` WHERE `id_question` != '' AND `type_question` != '' AND `lang`='$key_lang'  ORDER BY RAND() LIMIT 1");
     $key_ans=$ans['key'];
     $id_question=$ans['id_question'];
     $type_question=$ans['type_question'];
     $character_sex=$ans['character_sex'];
     $sex=$ans['sex'];

     $data_father='';
     $url_add_chat="";
     $url_view_chat="";

     if($type_question=='chat'){
          $url_add_chat=$this->url_carrot_store."/app_my_girl_add.php?key=".urlencode($key_ans)."&lang=".$key_lang."&sex=$sex&effect=0&action=2&character_sex=$character_sex&color=FFFFFF&type_question=chat&id_question=$id_question";
          $url_view_chat=$this->url_carrot_store."/app_my_girl_update.php?id=$id_question&lang=$key_lang";
          $data_father=$this->q_data("SELECT `chat` FROM carrotsy_virtuallover.`app_my_girl_$key_lang` WHERE `id` = '$id_question' LIMIT 1");
      }
      else{
          $url_add_chat=$this->url_carrot_store."/app_my_girl_add.php?key=".urlencode($key_ans)."&lang=".$key_lang."&sex=$sex&effect=0&action=2&character_sex=$character_sex&color=FFFFFF&type_question=msg&id_question=$id_question";
          $url_view_chat=$this->url_carrot_store."/app_my_girl_update.php?id=$id_question&lang=$key_lang&msg=1";
          $data_father=$this->q_data("SELECT `chat` FROM carrotsy_virtuallover.`app_my_girl_msg_$key_lang` WHERE `id` = '$id_question' LIMIT 1");
      }

     $url_chat_translate='https://translate.google.com/?sl='.$key_lang.'&tl=vi&text='.$data_father['chat']."%0A%0A".$key_ans.'&op=translate';

     $html_show='<td> <a target="_blank" href="'.$url_view_chat.'">'.$data_father['chat'].'</a><br/><span class="buttonPro small" onclick="act_send_chat_test(\''.$key_ans.'\',\''.$key_lang.'\',\''.$character_sex.'\',\''.$sex.'\')"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> <a target="_blank" onclick="$(this).css(\'color\',\'red\');" href="'.$url_chat_translate.'"> '.$key_ans.'</a></td><td><a class="buttonPro small" target="_blank" href="'.$url_add_chat.'"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>';
     $obj->{"html"}=$html_show;
     echo json_encode($obj);
     exit;
}
?>