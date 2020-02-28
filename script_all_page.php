<script>
    function go_top(){
        var body = $("html, body");
        body.stop().animate({scrollTop:0}, '500', 'swing', function() {
            $('#go_top').fadeOut(500);
        });
    }

    $(window).scroll( function(){
        if($(window).scrollTop()>35){
            $('#go_top').fadeIn(500);
        }else{
            $('#go_top').fadeOut(500);
        }
    });


    function show_menu_app(Emp){
        $('.app').removeClass('menu_app');
        $(Emp).parent().parent().addClass('menu_app')
    };


    function delete_data(emp,row,mysql_table){
        swal({
                title: "<?php echo lang('hoi_xoa'); ?>",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true, },
            function(){
                $.ajax({
                    url: "<?php echo $url;?>/index.php",
                    type: "post",
                    data: "function=delete_data&id="+row+"&table="+mysql_table,
                    success: function(data, textStatus, jqXHR)
                    {
                        swal('<?php echo lang('xoa_thanh_cong'); ?>');
                        $(emp).parent().parent().remove();
                    }
                });
            });
    }


    function show_header_carrot(emp){
        var var_show=$(emp).data("show");
        if(var_show==1){
            $(emp).css("background-color","green");
            $('#header').show(200);
            $(emp).data("show","0");
        }else{
            $(emp).css("background-color","greenyellow");
            $('#header').hide(200);
            $(emp).data("show","1");
        }

    }

    function rate_object(objects,star,id){
        $('#loading').fadeIn(100);
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=rate_object&star="+star+"&objects="+objects+"&id="+id,
            success: function(data, textStatus, jqXHR)
            {
                swal('<?php echo lang('thanh_cong') ?>','<?php echo lang('cam_on_da_danh_gia') ?>','success');
                $('#loading').fadeOut(100);
            }
        });
    }

    function youtube_check(e) {
        var thumbnail = ["maxresdefault", "mqdefault", "sddefault", "hqdefault", "default"];
        var url = e.attr("src");
        if (e[0].naturalWidth === 120 && e[0].naturalHeight === 90) {
            for (var i = 0, len = thumbnail.length - 1; i < len; i++) {
                if (url.indexOf(thumbnail[i]) > 0) {
                    e.attr("src", url.replace(thumbnail[i], thumbnail[i + 1]));
                    break;
                }
            }
        }
    }
</script>