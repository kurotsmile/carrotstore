<div class="app_ins">
    <div class="title" style="width: 96%;">
        <i class="fa fa-comments-o" aria-hidden="true"></i> Trả lời trò chuyện 
    </div>
    <div class="body" id="table_m">
    <table>
        <?php
        for($i=0;$i<count($list_lang);$i++){
            $item_lang=$list_lang[$i];
            $key_lang=$item_lang['key'];

            $ans=$this->q_data("SELECT `key`,`id_question`,`type_question`,`character_sex`,`sex` FROM carrotsy_virtuallover.`app_my_girl_key` WHERE `id_question` != '' AND `type_question` != '' AND `lang`='$key_lang' ORDER BY RAND() LIMIT 1");
            if($ans==null) continue;

            $key_ans=$ans['key'];
            $id_question=$ans['id_question'];
            $type_question=$ans['type_question'];
            $character_sex=$ans['character_sex'];
            $sex=$ans['sex'];

            $data_father='';
            $url_add_chat="";
            $url_view_chat="";

            if($type_question=='chat'){
                $url_add_chat=$this->url_carrot_store."/app_my_girl_add.php?key=".urlencode($key_ans)."&lang=".$key_lang."&sex=$sex&effect=0&action=2&character_sex=$character_sex&color=FFFFFF&type_question=chat&id_question=$id_question";
                $url_view_chat=$this->url_carrot_store."/app_my_girl_update.php?id=$id_question&lang=$key_lang";
                $data_father=$this->q_data("SELECT `chat` FROM carrotsy_virtuallover.`app_my_girl_$key_lang` WHERE `id` = '$id_question' LIMIT 1");
            }
            else{
                $url_add_chat=$this->url_carrot_store."/app_my_girl_add.php?key=".urlencode($key_ans)."&lang=".$key_lang."&sex=$sex&effect=0&action=2&character_sex=$character_sex&color=FFFFFF&type_question=msg&id_question=$id_question";
                $url_view_chat=$this->url_carrot_store."/app_my_girl_update.php?id=$id_question&lang=$key_lang&msg=1";
                $data_father=$this->q_data("SELECT `chat` FROM carrotsy_virtuallover.`app_my_girl_msg_$key_lang` WHERE `id` = '$id_question' LIMIT 1");
            }

            $url_chat_translate='https://translate.google.com/?sl='.$key_lang.'&tl=vi&text='.$data_father['chat']."%0A%0A".$key_ans.'&op=translate';
        ?>
        <tr>
            <td>
                <strong><i class="fa fa-globe" aria-hidden="true"></i> <?php echo $item_lang['name'];?></strong>
            </td>
            <td>
                <a class="buttonPro small" onclick="get_new_chat('<?php echo $key_lang;?>')"><i class="fa fa-refresh" aria-hidden="true"></i></a>
            </td>
        </tr>
        <tr id="chat_lang_<?php echo $key_lang;?>">
            <td>
                <a target="_blank" href="<?php echo $url_view_chat;?>"><?php echo $data_father['chat'];?></a><br/>
                <a target="_blank" onclick="$(this).css('color','red');" href="<?php echo $url_chat_translate;?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> <?php echo $key_ans;?></a>
            </td>
            <td>
                <a class="buttonPro small" target="_blank" href="<?php echo $url_add_chat;?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    </div>
</div>
<script>
function get_new_chat(lang_key){
    $("#chat_lang_"+lang_key).html("<td><i class='fa fa-spinner' aria-hidden='true'></i></td><td></td>");
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='$("#chat_lang_"+lang_key).html(data_js.html);';
        echo $this->ajax("function:'answer_act',lang:lang_key",$out_func);
    ?>
}
</script>