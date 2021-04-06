<?php
$label_chi_tiet=lang($link,'chi_tiet');
$label_goi_dien=lang($link,'goi_dien');
$label_download_vcf=lang($link,'download_vcf');
$label_so_dien_thoai=lang($link,"so_dien_thoai");
$label_dia_chi=lang($link,"dia_chi");
$label_quoc_gia=lang($link,"quoc_gia");
$count_member_item=0;
while ($row = mysqli_fetch_array($result)) {
    $count_member_item++;
    include "page_member_view_git.php";
}

if($count_member_item==0){
    include "404_search.php";
}
echo show_ads_box_main($link,'contact_page');

$leng_obj=mysqli_num_rows(mysqli_query($link,"SELECT `id_device` FROM `app_my_girl_user_$lang_sel` WHERE `sdt`!='' AND `address`!='' AND `status`='0'"));
echo scroll_load_data('accounts',$leng_obj);

?>

