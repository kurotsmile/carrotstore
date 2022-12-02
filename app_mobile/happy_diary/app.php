<?php
include_once("config.php");
include_once("carrot_framework.php");

if($function=='syn_data'){
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $syn_data=addslashes($_POST['syn_data']);
    $q_add=mysqli_query($link,"INSERT INTO `data_syn` (`user_id`, `data`, `lang`, `date`) VALUES ('$user_id', '$syn_data', '$user_lang', NOW());");
    echo mysqli_error($link);
    exit;
}

if($function=='syn_list'){
    $user_id=$_POST['user_id'];
    $user_lang=$_POST['user_lang'];
    $array_sync=array();
    $q_list=mysqli_query($link,"SELECT `id`,`date` FROM `data_syn` WHERE `user_id` = '$user_id' AND `lang` = '$user_lang' ORDER BY `date` DESC LIMIT 50");
    while($data_syn=mysqli_fetch_assoc($q_list)){
        array_push($array_sync,$data_syn);
    }
    echo json_encode($array_sync);
    exit;
}

if($function=='delete_syn_data'){
    $id_syn=$_POST['id_syn'];
    $q_del=mysqli_query($link,"DELETE FROM `data_syn` WHERE (`id` = '$id_syn');");
    exit;
}

if($function=='load_sync_data'){
    $id_syn=$_POST['id_syn'];
    $q_sync=mysqli_query($link,"SELECT `data` FROM `data_syn` WHERE `id` = '$id_syn' LIMIT 1");
    $q_data=mysqli_fetch_assoc($q_sync);
    echo $q_data['data'];
    exit;
}
?>