<?php
header('Content-type: text/html; charset=utf-8');
include "../config.php";
include "../database.php";
include "../function.php";

class Alert{
    public  $type='';
    public  $msg='';
}

class Item_playlis{
    public $id;
    public $lang;
}

$function=$_POST['function'];
if($function=='view_contatc_backup'){
    $lang=$_POST['lang'];
    $id=$_POST['id'];
    $query_data_backup=mysql_query("SELECT `data` FROM carrotsy_contacts.`backup_contact_$lang` WHERE `id` = '$id' LIMIT 1");
    $data_backup=mysql_fetch_array($query_data_backup);
    $data_backup_json=$data_backup['data'];
    $data_backup_json=str_replace(",}","}",$data_backup_json);
    $data_backup_json=str_replace(",]","]",$data_backup_json);
    $data_bk=json_decode($data_backup_json,true);

    echo '<div style="width: 100%;overflow-y: auto;max-height: 300px;"><table class="table_msg_box">';
    for($i=0;$i<count($data_bk);$i++){
        $data_c=$data_bk[$i];
        echo '<tr>';
        echo '<td><i class="fa fa-id-badge" aria-hidden="true"></i> '.$data_c["name"].'</td>';
        echo '<td>';
        $c_phone=$data_c['phone'];
        for($p=0;$p<count($c_phone);$p++){
            echo '<i class="fa fa-phone" aria-hidden="true"></i> '.$c_phone[$p].' ';
        }
        echo '</td>';
        echo '<td>';
        $c_phone=$data_c['email'];
        for($p=0;$p<count($c_phone);$p++){
            echo '<i class="fa fa-envelope-o" aria-hidden="true"></i> '.$c_phone[$p].' ';
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table></div>';
}

if($function=='delete_backup_contact'){
    $lang=$_POST['lang'];
    $id=$_POST['id'];
    $query_backup_contact=mysql_query("DELETE FROM carrotsy_contacts.`backup_contact_$lang` WHERE `id` = '$id'");
    exit;
}

if($function=='save_playlist_music'){
    $alert=New Alert();
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    $lang_music=$_POST['lang_music'];
    $id_user=$_POST['id_user'];
    $query_playlist=mysql_query("SELECT `id`,`name`,`length`  FROM carrotsy_music.`playlist_$lang` WHERE `user_id` = '$id_user' ");
    if(mysql_num_rows($query_playlist)==0){
        $new_id_playlist=uniqid().''.uniqid();
        $query_music=mysql_query("SELECT `id`,`chat`,`color`,`file_url`,`author` FROM `app_my_girl_$lang_music` WHERE `id`='$id_music'  LIMIT 1");
        $item_playlist=mysql_fetch_assoc($query_music);
        $array_playlist=array($item_playlist);
        $data_playlist=json_encode($array_playlist,JSON_UNESCAPED_UNICODE);
        $name_playlist=lang('my_playlist',$lang);
        $query_add_playlist=mysql_query("INSERT INTO carrotsy_music.`playlist_$lang` (`id`, `user_id`, `data`, `name`,`length`)VALUES ('$new_id_playlist', '$id_user', '$data_playlist', '$name_playlist','1');");
        $alert->type='0';
    }else{
        $alert->type='1';
        $txt_show='<table class="table_msg_box">';
        while($item_playlist=mysql_fetch_array($query_playlist)){
            $txt_show.='<tr>';
            $txt_show.='<td style="width: 50%;"><span class="tag_number">'.$item_playlist['length'].' x <i class="fa fa-music" aria-hidden="true"></i></span> <a href="'.$url.'/playlist/'.$item_playlist['id'].'/'.$lang.'"><i class="fa fa-list-alt" aria-hidden="true"></i> '.$item_playlist['name'].'</a></td>';
            $txt_show.='<td>';
            $txt_show.='<span class="buttonPro small blue" onclick="add_song_to_playlist(\''.$item_playlist['id'].'\',\''.$id_music.'\',\''.$lang.'\',\''.$lang_music.'\')"><i class="fa fa-plus-circle" aria-hidden="true"></i> '.lang('add_song_to_playlist',$lang).'</span>';
            $txt_show.='<span class="buttonPro small red" onclick="delete_playlist_music(\''.$item_playlist['id'].'\',\''.$lang.'\')"><i class="fa fa-trash" aria-hidden="true"></i> '.lang('delete',$lang).'</span>';
            $txt_show.='</td>';
            $txt_show.='</tr>';
        }
        $txt_show.='</table>';
        $txt_show.='<span class="buttonPro" onclick="create_playlist(\''.$id_music.'\',\''.$lang.'\',\''.$id_user.'\')"><i class="fa fa-plus-square" aria-hidden="true"></i> '.lang('create_playlist',$lang).'</span>';
        $txt_show.='<span class="buttonPro" onclick="swal.close();"><i class="fa fa-times-circle" aria-hidden="true"></i> '.lang('back',$lang).'</span>';
        $alert->msg=$txt_show;
    }
    echo json_encode($alert);
    exit;
}

if($function=='delete_playlist_music'){
    $lang=$_POST['lang'];
    $id=$_POST['id'];
    $query_delete=mysql_query("DELETE FROM carrotsy_music.`playlist_$lang` WHERE `id` = '$id'");
    exit;
}

if($function=='add_song_to_playlist'){
    $id_playlist=$_POST['id_playlist'];
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    $lang_music=$_POST['lang_music'];

    $query_playlist=mysql_query("SELECT `data` FROM carrotsy_music.`playlist_$lang` WHERE `id` = '$id_playlist' LIMIT 1");
    $data_playlist=mysql_fetch_array($query_playlist);
    $s_data=preg_replace( "/\r|\n/", "", $data_playlist['data']);
    $data_playlist=json_decode($s_data,JSON_UNESCAPED_UNICODE);

    $query_music=mysql_query("SELECT `id`,`chat`,`color`,`file_url`,`author` FROM `app_my_girl_$lang_music` WHERE `id`='$id_music'  LIMIT 1");
    $item_playlist=mysql_fetch_assoc($query_music);
    array_push($data_playlist,$item_playlist);

    $length_playlist=count($data_playlist);
    $data_playlist = json_encode($data_playlist,JSON_UNESCAPED_UNICODE);


    $query_update_playlist=mysql_query("UPDATE carrotsy_music.`playlist_$lang` SET `data`='$data_playlist', `length` ='$length_playlist' WHERE `id`='$id_playlist'");
    exit;
}


if($function=='create_playlist'){
    $id_music=$_POST['id_music'];
    $lang=$_POST['lang'];
    $id_u=$_POST['user_id'];
    $name_playlist=$_POST['name_playlist'];

    $new_id_playlist=uniqid().''.uniqid();
    $query_music=mysql_query("SELECT `id`,`chat`,`color`,`file_url`,`author` FROM `app_my_girl_$lang` WHERE `id`='$id_music'  LIMIT 1");
    $item_playlist=mysql_fetch_assoc($query_music);
    $array_playlist=array($item_playlist);
    $data_playlist=json_encode($array_playlist,JSON_UNESCAPED_UNICODE);

    $query_add_playlist=mysql_query("INSERT INTO carrotsy_music.`playlist_$lang` (`id`, `user_id`, `data`, `name`,`length`)VALUES ('$new_id_playlist', '$id_u', '$data_playlist', '$name_playlist','1');");
    echo mysql_error();
    echo var_dump($_POST);
    echo "thanh";
    exit;
}

if($function=='update_playlist'){
    $id_playlist=$_POST['id_playlist'];
    $id_song_delete=$_POST['id_song_delete'];
    $data_txt=stripslashes($_POST['data_txt']);
    $lang_playlist=$_POST['lang_playlist'];
    $lang_song_delete=$_POST['lang_song_delete'];

    $data_playlist=json_decode($data_txt);
    $arr_new_list=array();
    for($i=0;$i<count($data_playlist);$i++){
        $obj_music=$data_playlist[$i];
        if($obj_music->id==$id_song_delete&&$obj_music->author==$lang_song_delete){

        }else{
            array_push($arr_new_list,$obj_music);
        }
    }

    $data_playlist_new=json_encode($arr_new_list,JSON_UNESCAPED_UNICODE);
    $length_playlist_new=count($arr_new_list);
    $query_update_playlist=mysql_query("UPDATE carrotsy_music.`playlist_$lang_playlist` SET `data`='$data_playlist_new', `length` ='$length_playlist_new' WHERE `id`='$id_playlist'");
    echo $data_playlist_new;
    exit;
}

if($function=='edit_name_playlist'){
    $name_playlist=$_POST['name_playlist'];
    $lang=$_POST['lang'];
    $id_playlist=$_POST['id_playlist'];
    $query_update=mysql_query("UPDATE carrotsy_music.`playlist_$lang` SET `name` = '$name_playlist' WHERE `id` = '$id_playlist'");
}


if($function=='show_all_playlist'){
    $lang=$_POST['lang'];
    $id_user=$_POST['id_user'];
    $query_playlist=mysql_query("SELECT `id`,`name`,`length`  FROM carrotsy_music.`playlist_$lang` WHERE `user_id` = '$id_user' ");
    $txt_show='<div>';
    while($item_playlist=mysql_fetch_array($query_playlist)){
            $txt_show.='<div><a href="'.$url.'/playlist/'.$item_playlist['id'].'/'.$lang.'"><i class="fa fa-list-alt" aria-hidden="true"></i> '.$item_playlist['name'].'</a> <span class="tag_number"><i class="fa fa-music" aria-hidden="true"></i> x '.$item_playlist['length'].'</span></div>';
    }
    $txt_show.='</div>';
    echo $txt_show;
    exit;
}
?>