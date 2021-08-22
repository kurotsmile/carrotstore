<?php
include "carrot_framework.php";

if($function=='list_midi_online'){
    $os='android';if(isset($_POST['os']))$os=$_POST['os'];
    $user_id='';
    $search='';
    $category='';
    if(isset($_POST['user_id'])){ $user_id=$_POST['user_id'];}
    if(isset($_POST['search'])){ $search=$_POST['search'];}
    if(isset($_POST['category'])){ $category=$_POST['category'];}

    $arr_data=array();
    if($search!=""){
        $query_list=mysqli_query($link,"SELECT `id_midi`,`id_device`,`name`,`sell`,`speed`,`level` FROM `midi` WHERE `name` LIKE '%$search%' AND (`sell`='1' OR `sell`='2')  LIMIT 15");
    }else{
        if($user_id!=""){
            if($user_id=='')$user_id=$id_device;
            $query_list=mysqli_query($link,"SELECT `id_midi`,`id_device`,`name`,`sell`,`speed`,`level` FROM `midi` WHERE `id_device`='$user_id'  ORDER BY RAND() LIMIT 20");
        }else{
            if($category=='')
                $query_list=mysqli_query($link,"SELECT `id_midi`,`id_device`,`name`,`sell`,`speed`,`level` FROM `midi` WHERE (`sell`='1' OR `sell`='2') ORDER BY RAND() LIMIT 15");
            else
                $query_list=mysqli_query($link,"SELECT `id_midi`,`id_device`,`name`,`sell`,`speed`,`level` FROM `midi` WHERE (`sell`='1' OR `sell`='2') AND `category`='$category' ORDER BY RAND() LIMIT 15");
        }
    }
    while($row_data=mysqli_fetch_assoc($query_list)){
        $s_speed=$row_data['speed'];
        if($os=='window')
            $s_speed=str_replace(',','.',$s_speed);
        else
            $s_speed=str_replace('.',',',$s_speed);

        $row_data["speed"]=$s_speed;
        $row_data["link"]=$url_carrot_store.'/piano/'.$row_data['id_midi'];
        array_push($arr_data,$row_data);
    }
    echo json_encode($arr_data);
    exit;
}

if($function=='get_midi'){
    $os='android';if(isset($_POST['os']))$os=$_POST['os'];
    $id_midi=$_POST['id_midi'];
    $query_midi=mysqli_query($link,"SELECT * FROM `midi` WHERE `id_midi` = '$id_midi' LIMIT 1");
    $data_midi=mysqli_fetch_assoc($query_midi);

    $arr_index=array();
    if($data_midi["data0"]){ array_push($arr_index,json_decode($data_midi["data0"])); }
    if($data_midi["data1"]){ array_push($arr_index,json_decode($data_midi["data1"])); }
    if($data_midi["data2"]){ array_push($arr_index,json_decode($data_midi["data2"])); }
    if($data_midi["data3"]){ array_push($arr_index,json_decode($data_midi["data3"])); }
    if($data_midi["data4"]){ array_push($arr_index,json_decode($data_midi["data4"])); }
    if($data_midi["data5"]){ array_push($arr_index,json_decode($data_midi["data5"])); }
    if($data_midi["data6"]){ array_push($arr_index,json_decode($data_midi["data6"])); }
    if($data_midi["data7"]){ array_push($arr_index,json_decode($data_midi["data7"])); }
    if($data_midi["data8"]){ array_push($arr_index,json_decode($data_midi["data8"])); }
    if($data_midi["data9"]){ array_push($arr_index,json_decode($data_midi["data9"])); }

    $arr_type=array();
    if($data_midi["type0"]){ array_push($arr_type,json_decode($data_midi["type0"])); }
    if($data_midi["type1"]){ array_push($arr_type,json_decode($data_midi["type1"])); }
    if($data_midi["type2"]){ array_push($arr_type,json_decode($data_midi["type2"])); }
    if($data_midi["type3"]){ array_push($arr_type,json_decode($data_midi["type3"])); }
    if($data_midi["type4"]){ array_push($arr_type,json_decode($data_midi["type4"])); }
    if($data_midi["type5"]){ array_push($arr_type,json_decode($data_midi["type5"])); }
    if($data_midi["type6"]){ array_push($arr_type,json_decode($data_midi["type6"])); }
    if($data_midi["type7"]){ array_push($arr_type,json_decode($data_midi["type7"])); }
    if($data_midi["type8"]){ array_push($arr_type,json_decode($data_midi["type8"])); }
    if($data_midi["type9"]){ array_push($arr_type,json_decode($data_midi["type9"])); }

    $data_midi["data_index"]=json_encode($arr_index);
    $data_midi["data_type"]=json_encode($arr_type);

    $s_speed=$data_midi['speed'];
    if($os=='window')
        $s_speed=str_replace(',','.',$s_speed);
    else
        $s_speed=str_replace('.',',',$s_speed);

    $data_midi["speed"]=$s_speed;
    echo json_encode($data_midi);
    exit;
}

if($function=='upload_midi'){
    $user_id='';if(isset($_POST['user_id']))$user_id=$_POST['user_id'];
    $user_lang='en';if(isset($_POST['user_lang'])){$user_lang=$_POST['user_lang'];}
    if($user_id==''){$user_id=$id_device;}
    if($user_lang==''){$user_lang=$lang;}
    $name_midi=$_POST['name_midi'];
    $arr_index_piano=json_decode($_POST['data_index']);
    $arr_type_piano=json_decode($_POST['data_type']);

    $data_0='';$data_1='';$data_2='';$data_3='';$data_4='';$data_5='';$data_6='';$data_7='';$data_8='';$data_9='';
    $type_0='';$type_1='';$type_2='';$type_3='';$type_4='';$type_5='';$type_6='';$type_7='';$type_8='';$type_9='';

    if(isset($arr_index_piano[0]))$data_0=json_encode($arr_index_piano[0]);
    if(isset($arr_index_piano[1]))$data_1=json_encode($arr_index_piano[1]);
    if(isset($arr_index_piano[2]))$data_2=json_encode($arr_index_piano[2]);
    if(isset($arr_index_piano[3]))$data_3=json_encode($arr_index_piano[3]);
    if(isset($arr_index_piano[4]))$data_4=json_encode($arr_index_piano[4]);
    if(isset($arr_index_piano[5]))$data_5=json_encode($arr_index_piano[5]);
    if(isset($arr_index_piano[6]))$data_6=json_encode($arr_index_piano[6]);
    if(isset($arr_index_piano[7]))$data_7=json_encode($arr_index_piano[7]);
    if(isset($arr_index_piano[8]))$data_8=json_encode($arr_index_piano[8]);
    if(isset($arr_index_piano[9]))$data_9=json_encode($arr_index_piano[9]);


    if(isset($arr_type_piano[0]))$type_0=json_encode($arr_type_piano[0]);
    if(isset($arr_type_piano[1]))$type_1=json_encode($arr_type_piano[1]);
    if(isset($arr_type_piano[2]))$type_2=json_encode($arr_type_piano[2]);
    if(isset($arr_type_piano[3]))$type_3=json_encode($arr_type_piano[3]);
    if(isset($arr_type_piano[4]))$type_4=json_encode($arr_type_piano[4]);
    if(isset($arr_type_piano[5]))$type_5=json_encode($arr_type_piano[5]);
    if(isset($arr_type_piano[6]))$type_6=json_encode($arr_type_piano[6]);
    if(isset($arr_type_piano[7]))$type_7=json_encode($arr_type_piano[7]);
    if(isset($arr_type_piano[8]))$type_8=json_encode($arr_type_piano[8]);
    if(isset($arr_type_piano[9]))$type_9=json_encode($arr_type_piano[9]);

    $midi_length=count($arr_index_piano[0]);
    $midi_length_line=count($arr_index_piano);
    $speed=$_POST['speed'];
    $id_midi=uniqid().uniqid();
    $query_add=mysqli_query($link,"INSERT INTO `midi` (`id_midi`,`id_device`,`name`,`data0`,`data1`,`data2`,`data3`,`data4`,`data5`,`data6`,`data7`,`data8`,`data9`,`type0`,`type1`,`type2`,`type3`,`type4`,`type5`,`type6`,`type7`,`type8`,`type9`,`speed`,`sell`,`length`,`length_line`,`lang`) VALUES ('$id_midi','$user_id','$name_midi','$data_0','$data_1','$data_2','$data_3','$data_4','$data_5','$data_6','$data_7','$data_8','$data_9','$type_0','$type_1','$type_2','$type_3','$type_4','$type_5','$type_6','$type_7','$type_8','$type_9','$speed','0','$midi_length','$midi_length_line','$user_lang');");
    echo mysqli_error($link);
    echo "Thank you for contributing the draft midi piano, We will review and release to the world in the fastest time possible.";
    exit;
}

if($function=='export_file_midi'){
    include "../../libary/midicomposer.class.php";
    $midi_name_file_export="../../data_temp/piano_midi_".uniqid().uniqid().".mid";
    
    $data_midi_index=json_decode($_POST['data_midi_index']);
    $data_midi_type=json_decode($_POST['data_midi_type']);
    
    $arr_midi_index_white=array("24","26","28","29","2B","2D","2F","30","32","34","35","37","39","3B","3C","3E","40","41","43","45","47","48","4A","4C","4D","4F","51","53","54","56","58","59","5B","5D","5F","60");
    $arr_midi_index_black=array("25","27","2A","2C","2E","31","33","36","38","3A","3D","3F","42","44","46","49","4B","4E","50","52","55","57","5A","5C","5E","61","63","66");
    
    $obj = new MIDIcomposer();
    
    for($i_line=0;$i_line<count($data_midi_index);$i_line++){
        $data_line_index=$data_midi_index[$i_line];
        $data_line_type=$data_midi_type[$i_line];
        for($i_col=0;$i_col<count($data_line_index);$i_col++){
            $index_piano=$data_line_index[$i_col];			
            if($index_piano!=-1){
                $type_piano=$data_line_type[$i_col];
                if($type_piano==0){
                    $obj->addnote($arr_midi_index_white[$index_piano], 1,127);
                }else{
                    $obj->addnote($arr_midi_index_black[$index_piano], 1,127);
                }
                
            }
        }
    }
    
    $obj->save($midi_name_file_export);
    $midi_name_file_export=str_replace("../..",$url_carrot_store,$midi_name_file_export);
    echo $midi_name_file_export;
    exit;
}

if($function=='delete_midi'){
    $id_midi=$_POST['id_midi'];
    $query_del=mysqli_query($link,"DELETE FROM `midi` WHERE `id_midi` = '$id_midi' LIMIT 1;");
    echo $query_del;
    exit;
}

if($function=='category_midi'){
    $arr_category=array();
    $list_category=mysqli_query($link,"SELECT `name` FROM `category` LIMIT 50");
    while($cat=mysqli_fetch_assoc($list_category)){
        array_push($arr_category,$cat);
    }
    echo json_encode($arr_category);
    exit;
}
?>