<?php
$view='list';
if(isset($_GET['view'])){$view=$_GET['view'];}
$lang_sel='vi';
if(isset($_SESSION['lang'])){$lang_sel=$_SESSION['lang'];}
$sub_view='all';
if(isset($_GET['sub_view'])){$sub_view=$_GET['sub_view'];}
?>
<div id="filter"> 
    <a href="<?php echo $url; ?>/music" <?php if($sub_view=='all'){ ?>class="active"<?php }?>> <i class="fa fa-play" aria-hidden="true"></i> <?php echo lang($link,'tat_ca'); ?></a>
    <a href="<?php echo $url; ?>/music/month" <?php if($sub_view=='month'){ ?>class="active"<?php }?>> <i class="fa fa-star-half-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_month'); ?></a>
    <a href="<?php echo $url; ?>/music/0" <?php if($sub_view=='0'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_0'); ?></a>
    <a href="<?php echo $url; ?>/music/1" <?php if($sub_view=='1'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-frown-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_1'); ?></a>
    <a href="<?php echo $url; ?>/music/2" <?php if($sub_view=='2'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-meh-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_2'); ?></a>
    <a href="<?php echo $url; ?>/music/3" <?php if($sub_view=='3'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-smile-o" aria-hidden="true"></i> <?php echo lang($link,'music_top_3'); ?></a>
    <a href="<?php echo $url; ?>/music/artist" <?php if($sub_view=='artist'||$view=='artist'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-user" aria-hidden="true"></i> <?php echo lang($link,'song_artist'); ?></a>
    <a href="<?php echo $url; ?>/music/year" <?php if($sub_view=='year'||$view=='year'){ ?>class="active"<?php }?>> <i style="font-size: 15px;" class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo lang($link,'song_year'); ?></a>
    <a href="<?php echo $url; ?>/music/genre" <?php if($sub_view=='genre'||$view=='genre'){ ?>class="active"<?php }?>> <i class="fa fa-stumbleupon" aria-hidden="true"></i> <?php echo lang($link,'song_genre'); ?></a>
</div>


<?php
if($view=='list'){
    include "page_music_list.php";
}else if($view=='artist'){
    include "page_music_artist.php";
}else if($view=='album'){
    include "page_music_album.php";
}else if($view=='year'){
    include "page_music_year.php";
}else if($view=='genre'){
    include "page_music_genre.php";
}else if($view=='playlist'){
    include "page_music_playlist.php";
}else{
    include "page_music_detail.php";
}

if(isset($user_login)){
?>
<script>
    function save_playlist_music(id_music,lang_music,lang_playlist,id_user){
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/json/json_account.php",
            type: "post",
            data: "function=save_playlist_music&id_music="+id_music+"&lang="+lang_playlist+"&id_user="+id_user+"&lang_music="+lang_music,
            success: function (data, textStatus, jqXHR) {
                var obj = JSON.parse(data);
                if(obj["type"]=='0'){
                    swal("<?php echo lang($link,'song_add_playlist') ?>", "<?php echo lang($link,'thanh_cong') ?>", "success");
                }else{
                    swal({html: true, title: '<?php echo lang("song_add_playlist"); ?>', text: obj["msg"], showConfirmButton: false});
                }
            }
        });
    }



    function add_song_to_playlist(id_playlist,id_music,lang,lang_music) {
        swal_loading();
        $.ajax({
            url: "<?php echo $url;?>/json/json_account.php",
            type: "post",
            data: "function=add_song_to_playlist&id_playlist="+id_playlist+"&lang="+lang+"&id_music="+id_music+"&lang_music="+lang_music,
            success: function (data, textStatus, jqXHR) {
                swal("<?php echo lang($link,'song_add_playlist') ?>", "<?php echo lang($link,'thanh_cong') ?>", "success");
            }
        });
    }

    function create_playlist(id_music,lang,user_id){
        swal({
                title: "<?php echo lang($link,'create_playlist'); ?>",
                text: "<?php echo lang($link,'create_playlist_tip'); ?>",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                cancelButtonText: "<?php echo lang($link,'back')?>",
            },
            function(inputValue){
                if (inputValue === false) {return  false;}
                if (inputValue === "") {
                    swal.showInputError("<?php echo lang($link,'error_name_playlist_null');?>");
                    return false
                }

                $.ajax({
                    url: "<?php echo $url;?>/json/json_account.php",
                    type: "post",
                    data: "function=create_playlist&name_playlist="+inputValue+"&lang="+lang+"&id_music="+id_music+"&user_id="+user_id,
                    success: function (data, textStatus, jqXHR) {
                        swal("<?php echo lang($link,'create_playlist'); ?>", "<?php echo lang($link,'thanh_cong') ?>", "success");
                    }
                });
        });
    }
</script>
<?php } ?>