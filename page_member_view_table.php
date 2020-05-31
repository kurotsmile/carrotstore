<script>
    var arr_id_user=[];
    var myJsonString='';

    var count_p=<?php echo mysqli_num_rows(mysqli_query($link,"SELECT `id_device` FROM `app_my_girl_user_$lang_sel` WHERE `sdt`!='' AND `address`!='' AND `status`='0'")); ?>;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= ($(document).height()-10)) {
            $('#loading').fadeIn(200);
            $('#loading-page').html(arr_id_user.length+"/"+count_p);
            //$("#box_ads_app").hide();
            myJsonString = JSON.stringify(arr_id_user);

            $.ajax({
                url: "<?php echo $url; ?>/index.php",
                type: "get",
                data: "function=load_user&json="+myJsonString+"&lenguser="+count_p,
                success: function(data, textStatus, jqXHR)
                {
                    myJsonString = JSON.stringify(arr_id_user);
                    $('#containt').append(data);
                    $('#loading').fadeOut(200);
                    reset_tip();
                }
            });
        }
    });
</script>
<?php
$label_chi_tiet=lang($link,'chi_tiet');
$label_goi_dien=lang($link,'goi_dien');
$label_download_vcf=lang($link,'download_vcf');
$label_so_dien_thoai=lang($link,"so_dien_thoai");
$label_dia_chi=lang($link,"dia_chi");
$label_quoc_gia=lang($link,"quoc_gia");
while ($row = mysqli_fetch_array($result)) {
    include "page_member_view_git.php";
}
echo show_ads_box_main($link,'contact_page');
?>

