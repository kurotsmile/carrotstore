<?php
include_once("carrot_framework.php");
if($function=="load_book"){
    $book=new stdClass();
    $book->{"list_book1"}=array();
    $book->{"list_book2"}=array();
    $book->{"bk_home_item1"}="";
    
    $quer_p_of_day=mysqli_query($link,"SELECT `id`,`contain`  FROM `paragraph_$lang` ORDER BY RAND() LIMIT 1");
    if(mysqli_num_rows($quer_p_of_day)>0){
        $data_p=mysqli_fetch_array($quer_p_of_day);
        $book->{"p_of_day"}=$data_p['contain'];
        $book->{"p_of_day_id"}=$data_p['id'];
        $book->{"p_of_day_lang"}=$lang;
    }else{
        $book->{"p_of_day"}="";
        $book->{"p_of_day_id"}="";
        $book->{"p_of_day_lang"}="";
    }
    
    $query_bk=mysqli_query($link,"SELECT `id` FROM  carrotsy_virtuallover.`app_my_girl_background` WHERE `category` = '1' ORDER BY RAND() LIMIT 1");
    $data_bk=mysqli_fetch_array($query_bk);
    $book->{"bk_home_item1"}=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/app_mygirl/obj_background/icon_".$data_bk['id'].".png&size=200";
    
    $query_list_book_0=mysqli_query($link,"SELECT * FROM `book` WHERE `lang` = '$lang' AND `type`=0 ORDER BY `orders`");
    while($row_book_0=mysqli_fetch_array($query_list_book_0)){
        $item=new stdClass();
        $item->{"name"}=$row_book_0['name'];
        $item->{"id"}=$row_book_0['id'];
        $item->{"chapter"}=$row_book_0['chapter'];
        array_push($book->{"list_book1"},$item);
    }

    $query_list_book_1=mysqli_query($link,"SELECT * FROM `book` WHERE `lang` = '$lang' AND `type`=1 ORDER BY `orders` ");
    while($row_book_1=mysqli_fetch_array($query_list_book_1)){
        $item=new stdClass();
        $item->{"name"}=$row_book_1['name'];
        $item->{"id"}=$row_book_1['id'];
        $item->{"chapter"}=$row_book_1['chapter'];
        array_push($book->{"list_book2"},$item);
    }
    echo json_encode($book);
    exit;
}

if($function=='read_book'){
    $book=new stdClass();
    $book->{"list_data"}=array();
    $id_book=$_POST['id_book'];
    $id_chapter=$_POST['id_chapter'];
    
    $query_list_p=mysqli_query($link,"SELECT * FROM `paragraph_$lang` WHERE `book_id` = '$id_book' AND `chapter` = '$id_chapter'  ORDER BY `orders`");
    while($row_p=mysqli_fetch_array($query_list_p)){
        $item=new stdClass();
        $item->{"id"}=$row_p['id'];
        $item->{"name"}=$row_p['contain'];
        $item->{"order"}=$row_p['orders'];
        array_push($book->list_data,$item);
    }
    
    $url_audio_chapter="";
    $url_audio_check="data/chapter_".$lang."/".$id_book."_".$id_chapter.".mp3";
    if(file_exists($url_audio_check)){
        $url_audio_chapter=$urls.'/'.$url_audio_check;
    }
    
    $url_image='';
    $query_order_book=mysqli_query($link,"SELECT `orders`,`type` FROM `book` WHERE `lang` = '$lang' AND `id`='$id_book'  LIMIT 1");
    $data_book=mysqli_fetch_array($query_order_book);
    $order_book=$data_book['orders'];
    $type_book=$data_book['type'];
    $query_media=mysqli_query($link,"SELECT `id` FROM `media` WHERE `order_chap` = '$id_chapter' AND `order_book` = '".$order_book."' AND `type`='$type_book' LIMIT 1");
    if(mysqli_num_rows($query_media)>0){
        $id_media=mysqli_fetch_array($query_media);
        $id_media=$id_media['id'];
        $url_image=$urls.'/data/media/'.$id_media.'.png';
    }
    $book->{"audio"}=$url_audio_chapter;
    $book->{"image"}=$url_image;
    $book->{"datass"}=$order_book;
    echo json_encode($book);
    exit;
}

if($function=='search_book'){
    $book=new stdClass();
    $book->{"list_data"}=array();
    $key_search=$_POST['search'];
    $query_list_book=mysqli_query($link,"SELECT * FROM `book` WHERE `name` LIKE '%$key_search%' AND `lang` = '$lang'");
    while($row_book=mysqli_fetch_array($query_list_book)){
        $item=new stdClass();
        $item->{"name"}=$row_book['name'];
        $item->{"id"}=$row_book['id'];
        $item->{"type"}=$row_book['type'];
        $item->{"chapter"}=$row_book['chapter'];
        array_push($book->{"list_data"},$item);
    }
    mysqli_free_result($query_list_book);
    
    $book->{"list_p"}=array();
    $query_list_p=mysqli_query($link,"SELECT * FROM `paragraph_$lang` WHERE `contain` LIKE '%$key_search%' LIMIT 25");
    while($row_p=mysqli_fetch_array($query_list_p)){
        $item=new stdClass();
        $item->{"name"}=$row_p['contain'];

        $query_book=mysqli_query($link,"SELECT * FROM `book` WHERE `id`='".$row_p['book_id']."'");
        $data_book=mysqli_fetch_array($query_book);
        $item->{"id_p"}=$row_p['orders'];
        $item->{"chapter"}=$row_p['chapter'];
        $item->{"num_chapter"}=$data_book["chapter"];
        $item->{"name_book"}=$data_book['name'];
        $item->{"id_book"}=$data_book['id'];
        $item->{"type"}=$data_book['type'];
        array_push($book->{"list_p"},$item);
    }
    echo json_encode($book)."AAAA:".$key_search;
    exit;
}

if($function=='get_image_bk'){
    $query_bk=mysqli_query($link,"SELECT `id` FROM  carrotsy_virtuallover.`app_my_girl_background` WHERE `category` = '1' ORDER BY RAND() LIMIT 1");
    $data_bk=mysqli_fetch_array($query_bk);
    echo $url_carrot_store."/app_mygirl/obj_background/icon_".$data_bk['id'].".png";
}
?>