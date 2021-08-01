<?php
$list_chat=$this->q("SELECT `question`, `answer`,`langs`,`md5`,`sex`,`character_sex`,`id_question`,`type_question` FROM carrotsy_virtuallover.`app_my_girl_brain` ORDER BY RAND() LIMIT 50");
$num_chat=mysqli_num_rows($list_chat);
if($num_chat>0){
    $cont_all_chat=$this->q_data("SELECT COUNT(`md5`) as c FROM carrotsy_virtuallover.`app_my_girl_brain` LIMIT 1");
    $count_total_chat=$cont_all_chat['c'];
?>
<div class="app_ins">
    <div class="title" style="width: 96%;">
        <i class="fa fa-comment" aria-hidden="true"></i> Dạy trò chuyện (<span id="num_chat"><?php echo $num_chat;?></span>/<span id="count_total_chat"><?php echo $count_total_chat;?></span>)
    </div>
    <div class="body" id="table_m">
    <table>
        <?php
        while($chat=mysqli_fetch_assoc($list_chat)){
            $c_id=$chat['md5'];
            $c_question=$chat['question'];
            $c_answer=$chat['answer'];
            $c_langs=$chat['langs'];
            $c_sex=$chat['sex'];
            $c_id_question=$chat['id_question'];
            $c_type_question=$chat['type_question'];
            $c_character_sex=$chat['character_sex'];

            $url_chat_add=$this->url_carrot_store.'/app_my_girl_add.php?key='.$c_question.'&lang='.$c_langs.'&answer='.$c_answer.'&sex='.$c_sex.'&effect=0&action=2&character_sex='.$c_character_sex.'&color=FFFFFF';
            $url_chat_translate='https://translate.google.com/?sl='.$c_langs.'&tl=vi&text='.$c_question."%0A%0A".$c_answer.'&op=translate';
        ?>
        <tr class="cc_<?php echo $c_id;?> chat_emp">
            <td>
                <?php if($c_id_question!=''){
                    $url_chat_add.="&type_question=$c_type_question&id_question=$c_id_question";
                    ?><i class="fa fa-question-circle" aria-hidden="true"></i>
                <?php }else{?>
                    <i class="fa fa-question" aria-hidden="true"></i>
                <?php }?>
                <a onclick="$(this).css('color', 'red');" target="_blank" href="<?php echo $url_chat_translate;?>"><?php echo $chat['question'];?></a><br/>
                <a onclick="$(this).css('color', 'red');" target="_blank" href="<?php echo $url_chat_translate;?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $chat['answer'];?></a>
            </td>
            <td style="width:75px">
                <a onclick="$(this).addClass('blue');" target="_blank" href="<?php echo $url_chat_add;?>" class="buttonPro small"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <a href="#" class="buttonPro small red" onclick="chat_act('del','<?php echo $c_id;?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    </div>
</div>

<script>
function chat_act(func,id_s){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0){$(".cc_"+data_js.id).remove();var count_total_chat=$(".chat_emp").length;$("#num_chat").html(count_total_chat);}';
        $out_func.='$("#count_total_chat").html(data_js.count_c);';
        echo $this->ajax("function:'chat_act',fn:func,id:id_s",$out_func);
    ?>
}
</script>
<?php
}
?>