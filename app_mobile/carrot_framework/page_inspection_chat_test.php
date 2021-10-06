<div class="app_ins">
    <div class="title" style="width: 96%;">
        <i class="fa fa-github-alt" aria-hidden="true"></i> Thử nghiệm trò chuyện
        <a id="btn_reload_chat_test" class="buttonPro small" style="float:right" onclick="act_del_all_chat_test();return false;"><i id="icon_reload_chat" class="fa fa-refresh" aria-hidden="true"></i></a>
    </div>
    <div>
        <input type="text" id="inp_chat_test"/>
        <button class="buttonPro small" onclick="act_chat_test();return false;"><i id="icon_send_chat" class="fa fa-paper-plane-o" aria-hidden="true"></i> Trò chuyện</button>
    </div>
    <div class="body" id="table_m_chat_test">
    </div>
</div>

<script>
var pater_type='chat';
var pater_id='0';
var lang_chat='vi';
var character_sex='1';
var user_sex='0';
function act_chat_test(){
    $("#icon_send_chat").addClass("fa-spinner").removeClass("fa-paper-plane-o");
    var inp_chat_test=$("#inp_chat_test").val();
    $.ajax({
        url: "<?php echo $this->url_carrot_store;?>/app_mobile/appai/app.php",
        type: "post",
        data: {function:'chat',os:'android',character_sex:character_sex,sex:user_sex,text:inp_chat_test,pater_type:pater_type,pater:pater_id,lang:lang_chat},
        success: function (response) {
            var txt_character_sex_icon='';
            var txt_sex_icon='';
            var data_js=JSON.parse(response);

            var url_add_chat="<?php echo $this->url_carrot_store;?>/app_my_girl_add.php?key="+inp_chat_test+"&lang="+lang_chat+"&sex=0&effect=0&action=2&character_sex="+character_sex+"&color=FFFFFF";
            var url_add_chat_full="<?php echo $this->url_carrot_store;?>/app_my_girl_add.php?key="+inp_chat_test+"&lang="+lang_chat+"&sex=0&effect=0&action=2&character_sex="+character_sex+"&color=FFFFFF&type_question="+data_js.pater_type+"&id_question="+data_js.pater;
            if(data_js.pater_type=="chat")
                var url_view_chat="<?php echo $this->url_carrot_store;?>/app_my_girl_update.php?id="+data_js.pater+"&lang="+lang_chat;
            else
                var url_view_chat="<?php echo $this->url_carrot_store;?>/app_my_girl_update.php?id="+data_js.pater+"&lang="+lang_chat+"&msg=1";

            if(character_sex=='1') txt_character_sex_icon='<i class="fa fa-female" aria-hidden="true"></i>';
            else txt_character_sex_icon='<i class="fa fa-male" aria-hidden="true"></i>';

            if(user_sex=='1') txt_sex_icon='<i class="fa fa-female" aria-hidden="true"></i>';
            else txt_sex_icon='<i class="fa fa-male" aria-hidden="true"></i>';

            var html_item='<div class="chat_test_item">';
            html_item=html_item+'<a class="buttonPro small" href="'+url_add_chat+'" target="_blank" ><i class="fa fa-plus" aria-hidden="true"></i></a>';
            html_item=html_item+'<a class="buttonPro small"  href="'+url_add_chat_full+'" target="_blank" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a>';
            html_item=html_item+'<b>'+txt_sex_icon+' Bạn:</b>'+inp_chat_test+'<br/>';
            html_item=html_item+'<a href="'+url_view_chat+'" target="_blank"><b>'+txt_character_sex_icon+' Nhân vật:</b>'+data_js.chat+'</a>';
            html_item=html_item+'</div>';
            $("#table_m_chat_test").prepend(html_item);
            pater_type=data_js.pater_type;
            pater_id=data_js.pater;
            $("#inp_chat_test").val('');
            $("#icon_send_chat").addClass("fa-paper-plane-o").removeClass("fa-spinner");
        }
    });
}

function act_del_all_chat_test(){
    $(".chat_test_item").remove();
}

function act_send_chat_test(var_txt,lang,character_sex_s,user_sex_s){
    lang_chat=lang;
    pater_type="chat";
    pater_id="0";
    character_sex=character_sex_s;
    user_sex=user_sex_s;
    $("#inp_chat_test").val(var_txt);
    act_chat_test();
}
</script>