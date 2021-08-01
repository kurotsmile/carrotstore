<?php
$list_key_music=$this->q("SELECT * FROM carrotsy_music.`log_key` WHERE `is_see`=0 GROUP BY `key`");
$num_key_music=mysqli_num_rows($list_key_music);
if($num_key_music>0){
?>
<div class="app_ins">
    <div class="title" style="width: 96%;">
        <i class="fa fa-music" aria-hidden="true"></i> Âm nhạc (<span id="count_key_music"><?php echo $num_key_music;?></span>)
        <a id="btn_unactive_music" class="buttonPro small" style="float:right" onclick="unactive_music_key_check();"><i id="icon_unactive_music" class="fa fa-delicious" aria-hidden="true"></i> Xóa từ khóa đã duyệt</a>
    </div>
    <div class="body" id="table_m">
        <table>
        <?php 
            while($key_m=mysqli_fetch_assoc($list_key_music)){
                $key_m_k=$key_m['key'];
                $key_m_lang=$key_m['lang'];
        ?>
            <tr class="k_m_<?php echo md5($key_m_k);?> m_emp">
                <td><?php echo $key_m_lang;?></td>
                <td style="width: 180px;"><a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_my_girl_handling.php?func=check_music&key_word=<?php echo $key_m_k; ?>"><?php echo $key_m_k;?></a></td>
                <td>
                    <a target="_blank" onclick="$(this).addClass('blue');" href="<?php echo $this->url_carrot_store;?>/app_my_girl_handling.php?func=remove_key_music&key=<?php echo $key_m_k;?>" class="buttonPro small"><i class="fa fa-ban" aria-hidden="true"></i></a>
                    <a href="#" class="buttonPro small red" onclick="key_music_act('del','<?php echo $key_m_k;?>')"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    </div>
</div>
<script>
function key_music_act(func,id_s){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0){$(".k_m_"+data_js.id).remove();var count_key_music=$(".m_emp").length;$("#count_key_music").html(count_key_music);}';
        echo $this->ajax("function:'key_music_act',fn:func,id:id_s",$out_func);
    ?>
}

function unactive_music_key_check(){
    $("#btn_unactive_music").addClass("black");
    $("#icon_unactive_music").removeClass("fa-delicious");
    $("#icon_unactive_music").addClass("fa-spinner");
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);$("#btn_unactive_music").removeClass("black");$("#icon_unactive_music").removeClass("fa-spinner");$("#icon_unactive_music").addClass("fa-delicious");';
        $out_func.='$("#table_m").html(data_js.table);';
        $out_func.='$("#count_key_music").html(data_js.count_k);';
        echo $this->ajax("function:'unactive_music_key_check'",$out_func);
    ?>
}
</script>
<?php }?>