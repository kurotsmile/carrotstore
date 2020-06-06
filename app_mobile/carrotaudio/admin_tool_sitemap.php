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

$query_product_seo=mysqli_query($link,"SELECT `slug` FROM `data_file` WHERE `slug` != ''");
while ($p=mysqli_fetch_array($query_product_seo)) {
    $xml.=write_url_seo($url.'/song/'.$p['slug'],'0.90',$date_now);
}


$xml.='</urlset>'.PHP_EOL;
$fp = fopen('sitemap.xml', 'w');
fwrite($fp, $xml);
fclose($fp);
?>
<ul>
    <li><strong>Các tệp tin Site Map đã được tạo hỗ trợ gia giao thức http và https</strong></li>
    <li><a target="_blank" href="<?php echo $url;?>/sitemap.xml">sitemap_product.xml</a></li>
</ul>

<?php
echo '<pre>', htmlentities($xml), '</pre>';
?>