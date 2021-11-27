<?php
include_once("carrot_framework.php");

if($function=='show_list_ebook'){
    $list_book=array();
    $q_list_book=mysqli_query($link,"SELECT p.`id`,n.`data` as `name`,SUBSTRING(d.`data`, 1, 100) as `tip` FROM carrotsy_virtuallover.`products` as p , carrotsy_virtuallover.`product_name_$lang` as n , carrotsy_virtuallover.`product_desc_$lang` as d  WHERE n.id_product=p.id AND d.id_product=p.id  AND p.type='book' AND n.data!='' ORDER BY RAND() LIMIT 20");
    while($book=mysqli_fetch_assoc($q_list_book)){
        $book['tip']=strip_tags(trim(html_entity_decode(($book['tip']),ENT_QUOTES, 'UTF-8'), "\xc2\xa0"));
        $book['icon']=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/product_data/".$book['id']."/icon.jpg&size=80x80&trim=1";
        $book['lang']=$lang;
        array_push($list_book,$book);
    }
    echo json_encode($list_book);
    exit;
}

if($function=='search_book'){
    $key_search=$_POST['search'];

    $list_book=array();
    $q_list_book=mysqli_query($link,"SELECT p.`id`,n.`data` as `name`,SUBSTRING(d.`data`, 1, 100) as `tip` FROM carrotsy_virtuallover.`products` as p , carrotsy_virtuallover.`product_name_$lang` as n , carrotsy_virtuallover.`product_desc_$lang` as d  WHERE n.id_product=p.id AND d.id_product=p.id  AND p.type='book' AND n.data LIKE '%$key_search%'  ORDER BY RAND() LIMIT 20");
    while($book=mysqli_fetch_assoc($q_list_book)){
        $book['tip']=strip_tags($book['tip']);
        $book['icon']=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/product_data/".$book['id']."/icon.jpg&size=80x80&trim=1";
        $book['lang']=$lang;
        array_push($list_book,$book);
    }
    echo json_encode($list_book);
    exit;
}

if($function=='get_info_ebook'){
    $id_ebook=$_POST['id_ebook'];
    $q_ebook=mysqli_query($link,"SELECT p.`id`,p.`company`,p.`view`,p.`date`,p.`date_edit`,n.`data` as `name`,d.`data` as `tip` FROM carrotsy_virtuallover.`products` as p , carrotsy_virtuallover.`product_name_$lang` as n , carrotsy_virtuallover.`product_desc_$lang` as d  WHERE n.id_product=p.id AND d.id_product=p.id  AND p.id=$id_ebook LIMIT 1");
    $data_ebook=mysqli_fetch_assoc($q_ebook);
    $data_ebook['tip']=strip_tags(trim(html_entity_decode($data_ebook['tip'],ENT_QUOTES, 'UTF-8'), "\xc2\xa0"));
    $data_ebook['icon']=$url_carrot_store."/thumb.php?src=".$url_carrot_store."/product_data/".$data_ebook['id']."/icon.jpg&size=80x80&trim=1";
    $data_ebook['lang']=$lang;

    $url_ebook_path="../../product_data/$id_ebook/ebook/OEBPS";
	$xml=simplexml_load_file($url_ebook_path."/content.opf");
	$ebook_toc=simplexml_load_file($url_ebook_path."/toc.ncx");
	$navMap=$ebook_toc->navMap->navPoint;
	$total_page=count($navMap);
    
    $data_ebook['total_page']=$total_page;
    echo json_encode($data_ebook);
    exit;
}
?>