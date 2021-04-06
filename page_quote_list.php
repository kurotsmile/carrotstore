<?php
$lang_sel='vi';
if(isset($_SESSION['lang'])){ $lang_sel=$_SESSION['lang'];}
?>
<div id="containt" style="width: 100%;float: left;">
<?php
if(!isset($list_quocte)){
    $list_quote=mysqli_query($link,"SELECT `chat`, `id`,`effect_customer`,`author` FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `id_redirect` = '' AND `chat`!='' ORDER BY RAND() LIMIT 50");
}
while($row=mysqli_fetch_assoc($list_quote)){
    include "page_quote_git.php";
}
?>
</div>

<?php
echo show_ads_box_main($link,'quote_page');
$query_count_quote=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `app_my_girl_$lang_sel` WHERE `effect` = '36' AND `id_redirect` = '' AND `chat`!=''");
$data_count_quote=mysqli_fetch_array($query_count_quote);
echo scroll_load_data('quote',$data_count_quote['c']);
?>