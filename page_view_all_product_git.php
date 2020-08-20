<div id="containt" style="width: 100%;">
<?php
$label_click_de_xem=lang($link,'click_de_xem');
$label_download_on=lang($link,'download_on');
$label_loai=lang($link,'loai');
$label_chi_tiet=lang($link,'chi_tiet');
	if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            include "page_view_all_product_git_template.php";
        }
	}
?>
</div>
