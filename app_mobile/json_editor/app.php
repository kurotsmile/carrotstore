<?php
include_once("carrot_framework.php");

if($function=="add_project"||$function=="upload_project"){
    $project_id=uniqid().uniqid();
    $project_name=$_POST['project_name'];
    $project_data=$_POST['project_data'];
    $project_lang=$_POST['project_lang'];
    $project_user=$_POST['project_user'];
    $q_add_project=mysqli_query($link,"INSERT INTO `json` (`id`, `name`, `data`, `date`, `user_lang`, `user_id`) VALUES ('$project_id', '$project_name', '$project_data', NOW(), '$project_lang', '$project_user');");
    echo $project_id;
    exit;
}

if($function=="list_project"){
    $project_user=$_POST['project_user'];
    $list_project=array();
    $q_list_project=mysqli_query($link,"SELECT `id`,`name`,`data`,`date` FROM `json` WHERE `user_id` = '$project_user' ORDER BY `date` DESC");
    while($p=mysqli_fetch_assoc($q_list_project)){
        $item_project=new stdClass();
        $item_project->{"id"}=$p['id'];
        $item_project->{"name"}=$p['name'];
        $item_project->{"data"}=$p['data'];
        $item_project->{"date"}=$p['date'];
        array_push($list_project,$item_project);
    }
    echo json_encode($list_project);
    exit;
}

if($function=='get_project'){
    $project_id=$_POST['project_id'];
    $q_project=mysqli_query($link,"SELECT `name`,`data` FROM `json` WHERE `id` = '$project_id' LIMIT 1");
    $data_project=mysqli_fetch_assoc($q_project);
    echo json_encode($data_project);
    exit;
}

if($function=='delete_project'){
    $project_id=$_POST['project_id'];
    $q_del=mysqli_query($link,"DELETE FROM `json`  WHERE `id` = '$project_id' LIMIT 1;");
    exit;
}

if($function=='update_project_name'){
    $project_id=$_POST['project_id'];
    $project_new_name=$_POST['new_name'];
    $q_update=mysqli_query($link,"UPDATE `json` SET `name` = '$project_new_name' WHERE `id` = '$project_id' LIMIT 1;");
    echo $q_update;
    exit;
}

if($function=='update_project_data'){
    $project_id=$_POST['project_id'];
    $project_data=addslashes($_POST['project_data']);
    $q_update=mysqli_query($link,"UPDATE `json` SET `data` = '$project_data',`date`=NOW() WHERE `id` = '$project_id' LIMIT 1;");
    echo var_dump($_POST);
    echo mysqli_error($link);
    exit;
}
?>