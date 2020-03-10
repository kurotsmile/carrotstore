<?php
$xml='<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
$xml.='<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL;

$xml.='<!-- carrotstore.com -->'.PHP_EOL;

$date_now = date('Y-m-d\TH:i:s+00:00', time());

function write_url_seo($url_seo,$priority,$date_seo){
    $txt='<url>'.PHP_EOL;
    $txt.='<loc>'.$url_seo.'</loc>'.PHP_EOL;
    $txt.='<lastmod>'.$date_seo.'</lastmod>'.PHP_EOL;
    $txt.='<priority>'.$priority.'</priority>'.PHP_EOL;
    $txt.='</url>'.PHP_EOL;
    return $txt;
}

$xml.=write_url_seo($url.'/','1.00',$date_now);

$query_product_seo=mysql_query("SELECT `id`, `slug` FROM `products` WHERE `status` = '1'");
while ($p=mysql_fetch_array($query_product_seo)) {
    $xml.=write_url_seo($url.'/p/'.$p['slug'],'0.80',$date_now);
}

$list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
while($l=mysql_fetch_array($list_country)){
    $key_c=$l['key'];
    $query_music_seo=mysql_query("SELECT `slug`, `author` FROM `app_my_girl_".$key_c."` WHERE `effect` = '2' AND `slug` != ''");
    while ($p=mysql_fetch_array($query_music_seo)) {
        $xml.=write_url_seo($url.'/song/'.$p['author'].'/'.$p['slug'],'0.70',$date_now);
    }
    mysql_free_result($query_music_seo);
}
mysql_free_result($list_country);


$xml.='</urlset>'.PHP_EOL;
$fp = fopen('sitemap_product.xml', 'w');
fwrite($fp, $xml);
fclose($fp);
?>

<a target="_blank" href="<?php echo $url;?>/sitemap_product.xml">sitemap_product.xml</a>

<?php
echo '<pre>', htmlentities($xml), '</pre>';
?>
