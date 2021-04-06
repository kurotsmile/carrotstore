<?php
function search_product($link,$key,$lang,$search_data){
    global $url;
    $search_group=new stdClass();
    $search_group->{"icon"}='fa-product-hunt';
    $search_group->{"name"}=lang($link,"sp");
    $search_group->{"type"}='products';
    $data_return_search=array();
    $query_search=mysqli_query($link,"SELECT n.`data`,p.`id`,p.`slug` FROM `products` as p INNER JOIN `product_name_$lang` as n ON p.`id` = n.`id_product` WHERE n.`data` LIKE '%$key%' AND p.`status`=1 Group by p.`id` LIMIT 50");
    while ($row_data=mysqli_fetch_assoc($query_search)) {
        $item_search=new stdClass();
        $item_search->{"name"}=$row_data['data'];
        if($row_data['slug']!=''){
            $item_search->{"link"}=$url.'/p/'.$row_data['slug'];
        }else{
            $item_search->{"link"}=$url.'/product/'.$row_data['id'];
        }
        $item_search->{"icon"}=$url."/thumb.php?src=".$url."/product_data/".$row_data['id']."/icon.jpg&size=50x50&trim=1";
        array_push($data_return_search,$item_search);
    }
    if(count($data_return_search)>0){
        $search_group->{"all_item"}=$data_return_search;
        return $search_group;
    }else{
        return null;
    }
    
}

function search_music($link,$key,$lang,$search_data){
    global $url;
    $search_group=new stdClass();
    $search_group->{"icon"}='fa-music';
    $search_group->{"name"}=lang($link,"am_nhac_cho_cuoc_song");
    $search_group->{"type"}='music';
    $data_return_search=array();

    if($search_data=='1'){
        $query_search=mysqli_query($link,"SELECT `chat`,`slug`,`id`,`author` FROM `app_my_girl_$lang` WHERE `effect` = '2' AND `chat` LIKE '%$key%' AND `disable` = '0' LIMIT 50");
    }else{
        $list_country=mysqli_query($link,"SELECT `key` FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1'");
        $sql_query='';
        $count_country=mysqli_num_rows($list_country);
        $count_index=0;
        while($country_data=mysqli_fetch_assoc($list_country)){
            $key_country=$country_data['key'];
            $sql_query.=" (SELECT `chat`,`slug`,`id`,`author` FROM `app_my_girl_$key_country` WHERE `chat` LIKE '%$key%' AND  `effect`='2' AND `disable` = '0' limit 20) ";
            $count_index++;
            if($count_index!=$count_country) $sql_query.=" UNION ALL ";
        }
        $query_search=mysqli_query($link,$sql_query);
    }

    while ($row_data=mysqli_fetch_assoc($query_search)) {
        $item_search=new stdClass();
        $item_search->{"name"}=$row_data['chat'];
        if($row_data['slug']!=''){
            $item_search->{"link"}=$url.'/song/'.$row_data['author'].'/'.$row_data['slug'];
        }else{
            $item_search->{"link"}=$url.'/music/'.$row_data['author'].'/'.$row_data['id'];
        }

        $url_img_thumb=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=50x50&trim=1';
        $filename_img_avatar='app_mygirl/app_my_girl_'.$row_data['author'].'_img/'.$row_data['id'].'.png';
        if(file_exists($filename_img_avatar)){
            $url_img_thumb=$url.'/thumb.php?src='.$url.'/'.$filename_img_avatar.'&size=50x50&trim=1';
        }
        $item_search->{"icon"}=$url_img_thumb;
        array_push($data_return_search,$item_search);
    }
    if(count($data_return_search)>0){
        $search_group->{"all_item"}=$data_return_search;
        return $search_group;
    }else{
        return null;
    }
    
}

function search_user($link,$key,$lang,$search_data){
    global $url;
    $search_group=new stdClass();
    $search_group->{"icon"}='fa-address-book';
    $search_group->{"name"}=lang($link,"luu_tru_lien_he");
    $search_group->{"type"}='accounts';
    $data_return_search=array();
    $query_search=mysqli_query($link,"SELECT `id_device`,`name`,`sex` FROM `app_my_girl_user_$lang` WHERE ((`name` LIKE '%$key%') or (`sdt`='$key')) AND `status`='0' LIMIT 50");
    while ($row_data=mysqli_fetch_assoc($query_search)) {
        $item_search=new stdClass();
        $item_search->{"name"}=$row_data['name'];
        $item_search->{"link"}=$url.'/user/'.$row_data['id_device'].'/'.$lang;
        $url_img='app_mygirl/app_my_girl_'.$lang.'_user/'.$row_data['id_device'].'.png';
        if(file_exists($url_img)){
            $item_search->{"icon"}=$url.'/thumb.php?src='.$url.'/'.$url_img.'&size=50x50&trim=1';
        }else{
            if($row_data['sex']=='0'){
                $item_search->{"icon"}=$url.'/thumb.php?src='.$url.'/images/avatar_boy.jpg&size=50x50&trim=1';
            }else{
                $item_search->{"icon"}=$url.'/thumb.php?src='.$url.'/images/avatar_girl.jpg&size=50x50&trim=1';
            }
        }
        array_push($data_return_search,$item_search);
    }
    if(count($data_return_search)>0){
        $search_group->{"all_item"}=$data_return_search;
        return $search_group;
    }else{
        return null;
    }
    
}

function search_quocte($link,$key,$lang,$search_data){
    global $url;
    $search_group=new stdClass();
    $search_group->{"icon"}='fa-quote-left';
    $search_group->{"name"}=lang($link,"trich_dan");
    $search_group->{"type"}='quote';
    $data_return_search=array();
    $query_search=mysqli_query($link,"SELECT `chat`,`id`,`effect_customer` FROM `app_my_girl_$lang` WHERE `chat` LIKE '%$key%' AND `effect` = '36' LIMIT 50");
    while ($row_data=mysqli_fetch_assoc($query_search)) {
        $item_search=new stdClass();
        $item_search->{"name"}=$row_data['chat'];
        $item_search->{"link"}=$url.'/quote/'.$row_data['id'].'/'.$lang;
        if($row_data['effect_customer']!=''){
            $item_search->{"icon"}=$url.'/thumb.php?src='.$url.'/app_mygirl/obj_effect/'.$row_data['effect_customer'].'.png&size=50x50&trim=1';
        }else{
            $item_search->{"icon"}=$url.'/thumb.php?src='.$url.'/app_mygirl/obj_effect/927.png&size=50x50&trim=1';
        }
        array_push($data_return_search,$item_search);
    }
    if(count($data_return_search)>0){
        $search_group->{"all_item"}=$data_return_search;
        return $search_group;
    }else{
        return null;
    }
    
}

function search_piano($link,$key,$lang,$search_data){
    global $url;
    $search_group=new stdClass();
    $search_group->{"icon"}='fa-paw';
    $search_group->{"name"}=lang($link,"hoc_dan_piano");
    $search_group->{"type"}='piano';
    $data_return_search=array();
    $query_search=mysqli_query($link,"SELECT `name`,`id_midi` FROM carrotsy_piano.`midi` WHERE `name` LIKE '%$key%' LIMIT 50");
    while ($row_data=mysqli_fetch_assoc($query_search)) {
        $item_search=new stdClass();
        $item_search->{"name"}=$row_data['name'];
        $item_search->{"link"}=$url.'/piano/'.$row_data['id_midi'];
        $item_search->{"icon"}=$url.'/thumb.php?src='.$url.'/app_mygirl/obj_effect/1078.png&size=50x50&trim=1';
        array_push($data_return_search,$item_search);
    }
    if(count($data_return_search)>0){
        $search_group->{"all_item"}=$data_return_search;
        return $search_group;
    }else{
        return null;
    }
    
}

function search_artist($link,$key,$lang,$search_data){
    global $url;
    $search_group=new stdClass();
    $search_group->{"icon"}='fa-user';
    $search_group->{"name"}=lang($link,"song_artist");
    $search_group->{"type"}='artist';
    $data_return_search=array();
    $query_search=mysqli_query($link,"SELECT `artist` FROM `app_my_girl_".$lang."_lyrics` WHERE `artist` LIKE '%$key%' LIMIT 50");
    while ($row_data=mysqli_fetch_assoc($query_search)) {
        $item_search=new stdClass();
        $item_search->{"name"}=$row_data['artist'];
        $item_search->{"link"}=$url.'/artist/'.$lang.'/'.$row_data['artist'];
        $item_search->{"icon"}=$url.'/thumb.php?src='.$url.'/images/artist.jpg&size=50x50&trim=1';
        array_push($data_return_search,$item_search);
    }
    if(count($data_return_search)>0){
        $search_group->{"all_item"}=$data_return_search;
        return $search_group;
    }else{
        return null;
    }
    
}
?>