<style>
#box-bible{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    background-color: white;
    padding: 20px;
    border-radius: 10px;
}
#box-bible #icon_app{
    float: left;margin-right:5px;
}
#box-bible hr{
    border: solid 1px #126517;
}
</style>
<?php
$id=$_GET['id'];
$id_app=128;
$lang_bible=$_GET['lang'];
$query_bible=mysqli_query($link,"SELECT `contain` FROM carrotsy_bible.`paragraph_$lang_bible` WHERE `id` = '$id' LIMIT 1");
$data_bible=mysqli_fetch_assoc($query_bible);
$p_name_product=get_name_product_lang($link,$id_app,$_SESSION["lang"]);
echo '<div id="box-bible">';
echo '<i class="fa fa-quote-left" aria-hidden="true"></i>  '.$data_bible['contain'].'<hr/>';
echo '<a href="'.$url.'/product/128"><img id="icon_app" src="'.$url.'/thumb.php?src='.$url.'/product_data/128/icon.jpg&size=50&trim=1"/></a>';
echo '<strong id="name_app">'.$p_name_product.'</strong><br/>';
$query_link_store=mysqli_query($link,"SELECT * FROM `product_link` WHERE `id_product` = '".$id_app."'");
while($link_store=mysqli_fetch_assoc($query_link_store)){
    $query_store_link=mysqli_query($link,"SELECT `id` FROM `product_link_struct` WHERE `icon` = '".$link_store['icon']."' LIMIT 1");
    $data_store_link=mysqli_fetch_assoc($query_store_link);
    if($data_store_link['id']!="1")
        echo '<a class="store_link" href="'.$link_store['link'].'" target="_blank" rel="noopener"><img title="'.$link_store['name'].'" src="'.$url.'/images_link_store/'.$data_store_link['id'].'.svg" /></a>';
    else
        echo '<a class="store_link jailbreak"  id_product="'.$data['id'].'" href="'.$link_store['link'].'" target="_blank" rel="noopener"><img title="'.$link_store['name'].'" src="'.$url.'/images_link_store/'.$data_store_link['id'].'.svg" /></a>';
}
echo '</div>';
?>