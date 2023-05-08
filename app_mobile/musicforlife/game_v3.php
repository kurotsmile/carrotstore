<?php
header('Access-Control-Allow-Origin: *');
include_once "carrot_framework_game.php";

if($function=='list_song'){
    $arr_list_song=array();
    $key_search='';
    if(isset($_POST['search'])){ $key_search=$_POST['search'];}

    if($key_search==''){
        $query_music=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang` WHERE `effect` = '2' ORDER BY rand() LIMIT 20");
    }else{
            $list_country=mysqli_query($link,"SELECT `key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
            $txt_query='';
            $txt_query_2='';
            $count_l=mysqli_num_rows($list_country);
            $count_index=0;
            while($l=mysqli_fetch_assoc($list_country)){
                $key=$l['key'];
                $txt_query.="(SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE  `chat` LIKE '%$key_search%' AND  `effect`='2' AND `disable` = '0' limit 21)";
                $txt_query_2.=" (SELECT * FROM carrotsy_virtuallover.`app_my_girl_$key` WHERE MATCH (`chat`) AGAINST ('$key_search' IN BOOLEAN MODE) AND  `effect`='2' AND `disable` = '0' limit 21)";
                $count_index++;
                if($count_index!=$count_l){
                $txt_query.=" UNION ALL ";
                $txt_query_2.=" UNION ALL ";
                }
            }
            
            $query_music=mysqli_query($link,$txt_query);
            
            if(mysqli_num_rows($query_music)==0){
                $query_music=mysqli_query($link,$txt_query_2);
            }
    }

    while($row=mysqli_fetch_assoc($query_music)){
        $item_music=new stdClass();
        $item_music->{"id"}=$row['id'];
        $item_music->{"name"}=$row['chat'];
        if($row['file_url']!=''){
            $item_music->{"url"} = $row['file_url'];
        }else {
            $item_music->{"url"} = $url_carrot_store.'/app_mygirl/app_my_girl_' . $row['author'] . '/' . $row['id'] . '.mp3';
        }
        $item_music->{"color"}=$row['color'];
        $item_music->{"link_store"}=$url_carrot_store.'/music/'.$row['id'].'/'.$row['author'];
        $item_music->{"lang"}=$row['author'];
        
        if(file_exists("../../app_mygirl/app_my_girl_".$row['author']."_img/".$row['id'].".png")){
            $item_music->{"img"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/app_my_girl_'.$row['author'].'_img/'.$row['id'].'.png&size=60';
        } else {
            $item_music->{"img"}="";
        }
        array_push($arr_list_song,$item_music);
    }

    echo json_encode($arr_list_song);
}

if($function=='get_song'){
    $id_song=$_POST['id_song'];
    $lang_song=$_POST['lang_song'];

    $query_music=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_$lang_song` WHERE `effect` = '2' AND `id`='$id_song' LIMIT 1");

    $data_music=mysqli_fetch_assoc($query_music);
        $item_music=new stdClass();
        $item_music->{"id"}=$data_music['id'];
        $item_music->{"name"}=$data_music['chat'];
        if($data_music['file_url']!=''){
            $item_music->{"url"} = $data_music['file_url'];
        }else {
            $item_music->{"url"} = $url_carrot_store.'/app_mygirl/app_my_girl_' . $data_music['author'] . '/' . $data_music['id'] . '.mp3';
        }
        $item_music->{"color"}=$data_music['color'];
        $item_music->{"link_store"}=$url_carrot_store.'/music/'.$data_music['id'].'/'.$data_music['author'];
        $item_music->{"lang"}=$data_music['author'];
        
        if(file_exists("../../app_mygirl/app_my_girl_".$data_music['author']."_img/".$data_music['id'].".png")){
            $item_music->{"img"}=$url_carrot_store.'/thumb.php?src='.$url_carrot_store.'/app_mygirl/app_my_girl_'.$data_music['author'].'_img/'.$data_music['id'].'.png&size=60';
        } else {
            $item_music->{"img"}="";
        }

    echo json_encode($item_music);
}
?>