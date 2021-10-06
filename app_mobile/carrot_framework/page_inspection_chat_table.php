<?php
$s_table='<table>';
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
    if($c_langs=='zh')$c_langs="zh-CN";
    $url_chat_translate='https://translate.google.com/?sl='.$c_langs.'&tl=vi&text='.$c_question."%0A%0A".$c_answer.'&op=translate';

    $s_table.='<tr class="cc_'.$c_id.' chat_emp">';
    $s_table.='<td style="width:275px;word-break: break-all;">';
    if($c_id_question!=''){
        $url_chat_add.="&type_question=$c_type_question&id_question=$c_id_question";
        $s_table.='<span class="buttonPro small" onclick="act_send_chat_test(\''.$chat['question'].'\',\''.$c_langs.'\',\''.$c_character_sex.'\',\''.$c_sex.'\')"><i class="fa fa-question-circle" aria-hidden="true"></i></span>';
    }else{
        $s_table.='<span class="buttonPro small" onclick="act_send_chat_test(\''.$chat['question'].'\',\''.$c_langs.'\',\''.$c_character_sex.'\',\''.$c_sex.'\')"><i class="fa fa-question" aria-hidden="true"></i></span>';
    }
    $s_table.=' <a onclick="$(this).css(\'color\', \'red\');" target="_blank" href="'.$url_chat_translate.'">'.$chat['question'].'</a><br/>';
    $s_table.='<a class="buttonPro small black" onclick="$(this).removeClass(\'black\').addClass(\'yellow\');" target="_blank" href="'.$url_chat_translate.'" ><i class="fa fa-arrow-right" aria-hidden="true"></i></a> <a onclick="$(this).css(\'color\', \'red\');" target="_blank" href="'.$url_chat_translate.'">'.$chat['answer'].'</a>';
    $s_table.='</td>';
    $s_table.='<td>';
    $s_table.='<a onclick="$(this).addClass(\'blue\');" target="_blank" href="'.$url_chat_add.'" class="buttonPro small"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>';
    $s_table.='<a href="#" class="buttonPro small red" onclick="chat_act(\'del\',\''.$c_id.'\')"><i class="fa fa-trash" aria-hidden="true"></i></a>';
    $s_table.='</td>';
    $s_table.='</tr>';
}
$s_table.='</table>';
?>