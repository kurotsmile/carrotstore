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
while ($row = mysqli_fetch_array($result)) {
    include "page_member_view_git.php";
}
echo show_ads_box_main($link,'contact_page');
?>

