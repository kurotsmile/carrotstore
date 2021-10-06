<?php
$list_key_music=$this->q("SELECT * FROM carrotsy_music.`log_key` WHERE `is_see`=0 GROUP BY `key`");
$num_key_music=mysqli_num_rows($list_key_music);
if($num_key_music>0){
?>
<div class="app_ins" id="box_music_1">
    <div class="title" style="width: 96%;">
        <i class="fa fa-music" aria-hidden="true"></i> Âm nhạc (<span id="count_m1"><?php echo $num_key_music;?></span>)
        <a title="Xóa các từ khóa đã duyệt" class="buttonPro small btn_unactive_music" style="float:right" onclick="unactive_music_key_check();"><i class="fa fa-trash-o icon_unactive_music" aria-hidden="true"></i></a>
        <a title="Xóa toàn bộ"  class="buttonPro small btn_delall_music" style="float:right" onclick="delete_all_music_key();"><i class="fa fa-trash icon_unactive_music" aria-hidden="true"></i></a>
    </div>
    <div class="body" id="table_m1">
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
                    <a class="buttonPro small red" onclick="key_music_act('del','<?php echo $key_m_k;?>')"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    </div>
</div>
<?php }?>
<script>
function key_music_act(func,id_s){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0){$(".k_m_"+data_js.id).remove();}';
        $out_func.='$("#count_m1").html(data_js.count_m1);';
        $out_func.='$("#count_m2").html(data_js.count_m2);';
        $out_func.='if(data_js.count_m1==0) $("#box_music_1").remove();';
        $out_func.='if(data_js.count_m2==0) $("#box_music_2").remove();';
        echo $this->ajax("function:'key_music_act',fn:func,id:id_s",$out_func);
    ?>
}

function unactive_music_key_check(){
    $(".btn_unactive_music").addClass("black");
    $(".icon_unactive_music").removeClass("fa-delicious");
    $(".icon_unactive_music").addClass("fa-spinner");
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);$(".btn_unactive_music").removeClass("black");$(".icon_unactive_music").removeClass("fa-spinner");$(".icon_unactive_music").addClass("fa-delicious");';
        $out_func.='$("#table_m1").html(data_js.table1);';
        $out_func.='$("#table_m2").html(data_js.table2);';
        $out_func.='$("#count_m1").html(data_js.count_m1);';
        $out_func.='$("#count_m2").html(data_js.count_m2);';
        $out_func.='if(data_js.count_m1==0) $("#box_music_1").remove();';
        $out_func.='if(data_js.count_m2==0) $("#box_music_2").remove();';
        echo $this->ajax("function:'unactive_music_key_check'",$out_func);
    ?>
}

function delete_all_music_key(){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='$("#box_music_2").remove();';
        echo $this->ajax("function:'delete_all_music_key'",$out_func);
    ?>
}
</script>