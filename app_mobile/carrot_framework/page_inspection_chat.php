<?php
$list_chat=$this->q("SELECT `question`, `answer`,`langs`,`md5`,`sex`,`character_sex`,`id_question`,`type_question` FROM carrotsy_virtuallover.`app_my_girl_brain` ORDER BY `date_pub` DESC LIMIT 50");
$num_chat=mysqli_num_rows($list_chat);
if($num_chat>0){
    $cont_all_chat=$this->q_data("SELECT COUNT(`md5`) as c FROM carrotsy_virtuallover.`app_my_girl_brain` LIMIT 1");
    $count_total_chat=$cont_all_chat['c'];
?>
<div class="app_ins">
    <div class="title" style="width: 96%;">
        <i class="fa fa-comment" aria-hidden="true"></i> Dạy trò chuyện (<span id="num_chat"><?php echo $num_chat;?></span>/<span id="count_total_chat"><?php echo $count_total_chat;?></span>)
        <a id="btn_reload_chat" class="buttonPro small" style="float:right" onclick="chat_act('reload','');"><i id="icon_reload_chat" class="fa fa-refresh" aria-hidden="true"></i></a>
    </div>
    <div class="body" id="table_m">
    <?php
    include_once("page_inspection_chat_table.php");
    echo $s_table;
    ?>
    </div>
</div>

<script>
function chat_act(func,id_s){
    $("#icon_reload_chat").addClass("fa-spinner");
    $("#btn_reload_chat").addClass("black");
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0){$(".cc_"+data_js.id).remove();var count_total_chat=$(".chat_emp").length;$("#num_chat").html(count_total_chat);}';
        $out_func.='$("#count_total_chat").html(data_js.count_c);';
        $out_func.='if(data_js.table!=null)$("#table_m").html(data_js.table);';
        $out_func.='if(data_js.count_item!=null)$("#num_chat").html(data_js.count_item);';
        $out_func.='$("#icon_reload_chat").removeClass("fa-spinner");';
        $out_func.='$("#btn_reload_chat").removeClass("black");';
        echo $this->ajax("function:'chat_act',fn:func,id:id_s",$out_func);
    ?>
}
</script>
<?php
}
?>