<script>
var arr_id_piano=[];
</script>
<div id="containt" style="width: 100%;float: left;">

<?php
$label_detail=lang($link,'chi_tiet');
$label_loai=lang($link,'loai');
$label_ten_bai_hat=lang($link,'ten_bai_hat');
$label_cap_do=lang($link,'cap_do');
$label_toc_do_nhip=lang($link,'toc_do_nhip');
$label_so_not_nhac=lang($link,'so_not_nhac');
$label_tac_gia=lang($link,'tac_gia');

$arr_midi_level=array(lang($link,'level_de'),lang($link,'level_trung_binh'),lang($link,'level_kho'),lang($link,'level_sieu_kho'));

$view='list';
$url_cur=$url.'/index.php?page_view=page_piano.php';
if(isset($_GET['view']))$view=$_GET['view'];
include "page_piano_".$view.".php";
?>
</div>
