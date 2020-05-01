<script>
    var audioQuote = document.createElement('audio');

    function speech_quote(id_quote){
        $(".btn_speed").removeClass("yellow").addClass("grey");
        $(".btn_speed_quote_"+id_quote).removeClass("grey").addClass("yellow");
        $('#loading').fadeIn(100);
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=speed_quote&id="+id_quote,
            success: function(data, textStatus, jqXHR)
            {
                audioQuote.setAttribute('src', data);
                audioQuote.play();
                $('#loading').fadeOut(100);
            }
        });
    }

</script>
<?php
$view='list';
if(isset($_GET['view'])){ $view=$_GET['view'];}

$label_detail=lang($link,'chi_tiet');
$label_speed_quote=lang($link,'doc_cham_ngon');
if($view=='list'){
    include "page_quote_list.php";
}else{
    include "page_quote_detail.php";
}
?>