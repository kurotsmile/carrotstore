<div id="containt" style="width: 100%;">
<?php
$label_click_de_xem=lang($link,'click_de_xem');
$label_download_on=lang($link,'download_on');
$label_loai=lang($link,'loai');
$label_chi_tiet=lang($link,'chi_tiet');
	if($result){
        $count_product_item=0;
        while ($row = mysqli_fetch_assoc($result)) {
            $count_product_item++;
            include "page_view_all_product_git_template.php";
        }

        if($count_product_item==0){
            include "404_search.php";
        }
	}
?>
</div>
