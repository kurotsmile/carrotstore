<div id="containt" style="width: 100%;float: left;">
<?php
Class Song{
    public $id='';
    public $name='';
    public $mp3='';
}

$id=$_GET['id'];
$lang=$_GET['lang'];
$query_list_playlist=mysqli_query($link,"SELECT `data`,`name`,`user_id` FROM carrotsy_music.`playlist_$lang` WHERE `id` = '$id' LIMIT 1");
$data_playlist_sel=mysqli_fetch_array($query_list_playlist);

if($data_playlist_sel['data']!='[]'){
	$s_data=preg_replace( "/\r|\n/", "", $data_playlist_sel['data']);
	$data_playlist=json_decode($s_data);
	$obj_music=$data_playlist[0];
}

$url_mp3='';
if($data_playlist_sel['data']!='[]'){
	if(file_exists("app_mygirl/app_my_girl_".$obj_music->author."/".$obj_music->id.".mp3")){
		$url_mp3 =$url."/app_mygirl/app_my_girl_".$obj_music->author."/".$obj_music->id.".mp3";
	}else {
		$url_mp3 =$obj_music->file_url;
	}
}

$url_img_thumb=$url.'/thumb.php?src='.$url.'/images/music_default.png&size=170x170&trim=1';

$list_song=array();

$is_me=false;
if(isset($user_login)){
    if($data_playlist_sel['user_id']==$user_login->id){
        $is_me=true;
        $label_delete=lang($link,'delete');
    }
}
?>

    <div id="account_cover" class="show_bk_account" style="background-image: url('<?php echo $url_img_thumb; ?>');background-size:auto 100% ">
        <div class="neon-text">
            <?php echo $data_playlist_sel['name'];?>
        </div>
        <div id="account_menu">
            <ul style="margin: 0px;">
                <li class="active"><i class="fa fa-music" aria-hidden="true"></i></li>
            </ul>
        </div>
    </div>

    <div id="post_product">
    <?php
	if($data_playlist_sel['data']!='[]'){
    $is_playlist=true;
    include_once "template/kr_player_music.php";
    ?>
    <form action="" method="post" id="frm_update_play_list">
        <input type="hidden" name="function" value="update_playlist">
        <input type="hidden" name="id_song_delete" id="id_song_delete" value="">
        <input type="hidden" name="lang_song_delete" id="lang_song_delete" value="">
        <input type="hidden" name="id_playlist" value="<?php echo $id;?>">
        <input type="hidden" name="lang_playlist" value="<?php echo $lang;?>">
        <input type="hidden" name="data_txt" id="data_txt" value='<?php echo $s_data;?>'>
    </form>

    <table id="list_my_music">
        <?php
        for ($i=0;$i<count($data_playlist);$i++){
                $obj_music=$data_playlist[$i];
                $url_mp3='';
                $name_mp3='';
                if(file_exists("app_mygirl/app_my_girl_".$obj_music->author."/".$obj_music->id.".mp3")){
                    $url_mp3 =$url."/app_mygirl/app_my_girl_".$obj_music->author."/".$obj_music->id.".mp3";
                }else {
                    $url_mp3 =$obj_music->file_url;
                }
                
                $song=new Song();
                $song->id=$obj_music->id;
                $song->name=addslashes($obj_music->chat);
                $song->mp3=$url_mp3;
                array_push($list_song,$song);




        ?>
        <tr class="item_playlis item_play_<?php echo $i;?>"  index="<?php echo $i;?>">
            <td><i class="fa fa-music item_playlist_icon" aria-hidden="true"></i> <span class="item_playlist_name"><?php echo $obj_music->chat; ?></span></td>
            <td style="text-align: right">
                <a target="_blank" href="<?php echo $url;?>/music/<?php echo $obj_music->id;?>/<?php echo $obj_music->author;?>" class="buttonPro small light_blue"><i class="fa fa-info" aria-hidden="true"></i></a>
                <?php if($is_me){?><span class="buttonPro small red" onclick="update_playlist(this,'<?php echo $obj_music->id;?>','<?php echo $obj_music->author;?>');return false;"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo $label_delete;?></span><?php }?>
            </td>
        </tr>
        <?php }?>
    </table>
	<?php }?>
    </div>

    <div id="sidebar_product">
        <?php
        echo show_box_ads_page($link,'music_page');
        ?>
        <?php
        if(get_setting($link,'show_ads')=='1') {
            ?>
            <ins class="adsbygoogle"
                 style="display:inline-block;width:300px;height:300px"
                 data-ad-client="ca-pub-5388516931803092"
                 data-ad-slot="5771636042"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        <?php }?>

    </div>
</div>

<script>
    var list_song=<?php echo json_encode($list_song);?>;
    var index_song=0;

    function update_playlist(emp,id_delete,lang_delete){
        $("#id_song_delete").val(id_delete);
        $("#lang_song_delete").val(lang_delete);
        swal({
                title: "<?php echo lang($link,'delete');?>",
                text: "<?php echo lang($link,'delete_tip');?>",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: '<?php echo lang($link,'box_yes');?>',
                cancelButtonText: "<?php echo lang($link,'box_no');?>",
                closeOnConfirm: false,
            },
            function(isConfirm){
                if (isConfirm){
                    swal_loading();
                    $.ajax({
                        url: "<?php echo $url;?>/json/json_account.php",
                        type: "POST",
                        data: $("#frm_update_play_list").serialize(),
                        success: function (data, textStatus, jqXHR) {
                            $("#data_txt").val(data);
                            $(emp).parent().parent().remove();
                            swal("<?php echo lang($link,"my_playlist"); ?>","<?php echo lang($link,'delete_song_success');?>","success");
                            return false;
                        }
                    });
                }
            });

        return false;
    }

    function play_song_index(index){
        kr_audio.src=list_song[index].mp3;
        $("#kr_player_name_song").html(list_song[index].name);
        $(".item_playlis").removeClass("active");
        $(".item_play_"+index).addClass("active");
        index_song=index;
    }
    
    function  kr_next_song() {
        index_song++;
        if(index_song>=list_song.length){
            index_song=0;
        }
        play_song_index(index_song);
    }
    
    function kr_back_song() {
        index_song--;
        if(index_song<0){
            index_song=list_song.length-1;
        }
        play_song_index(index_song);
    }

    play_song_index(0);
</script>

