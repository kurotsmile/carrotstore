<script>
var url_voice_chat='';
function check_sex(){
    var valsex1=$('#sex1').val();
    var valsex2=$('#character_sex').val();
    
    var api_voice_female="<?php echo get_key_lang($link,'voice_character_sex_1',$lang_sel);?>";
    var api_voice_male="<?php echo get_key_lang($link,'voice_character_sex_0',$lang_sel);?>";
    $('#btn_add_audio').hide();
    $('#file_audio').show();
    $('#btn_tool_cms_audio').hide();
    $("#show_audio_test").html("");
    $("#msg_audio").html("");
    
    
    if($("#effect").val()!="2"){
        if(api_voice_female!=""){
            if(valsex1=='0'&&valsex2=='1'){
                $('#btn_add_audio').show(); 
                $('#btn_tool_cms_audio').show();
                check_url_voice(api_voice_female);
            }
            
            if(valsex1=='1'&&valsex2=='1'){
                $('#btn_add_audio').show();
                $('#btn_tool_cms_audio').show();
                check_url_voice(api_voice_female); 
            }
        }
         
        if(api_voice_male!=""){
            if(valsex1=='1'&&valsex2=='0'){
                $('#btn_add_audio').show(); 
                $('#btn_tool_cms_audio').show();
                check_url_voice(api_voice_male);
            }
        }
    }
    check_chat_txt_length();
}

function check_url_voice(url_voice){
    url_voice_chat=url_voice;
      if(url_voice=="google"){
        $("#show_audio_test").html("<i style='font-size:40px;' onclick=\"get_audio_file('<?php echo $lang_sel;?>');return false;\" class='fa fa-volume-up' aria-hidden='true'></i>");
        $("#msg_audio").html("<span style='padding:3px;color:green;'><i class='fa fa-exclamation' aria-hidden='true'></i> Không cần tạo file âm thanh đọc</span>");
        $("#file_audio").hide();
    }else{
        $("#msg_audio").html("<span style='padding:3px;color:red;'><i class='fa fa-exclamation' aria-hidden='true'></i> Bắt buột phải tạo file âm thanh đọc</span>");
        $("#show_audio_test").html("");
        $("#file_audio").show();
    }  
    
}

function add_field_chat(func_ins){
        var id_field_chat="";
        var id_func_field_chat="";
        var name_func_field_chat="";
        var value_field_chat="";
        var color_field_chat="";

        if(func_ins!="facebook"){
            id_field_chat=prompt("id","","Nhập id trường xử lý chức năng");
            color_field_chat="000000";
            if(id_field_chat==""){
                add_field_chat(func_ins);
                return 0;
            }
        }
        
        if(func_ins==""){
            id_func_field_chat=prompt("Tham số phương thức","","Truyền tham số vào phương thức");
            name_func_field_chat=prompt("Phương thức xử lý","","Nhập tên phương thức xử lý app");
            value_field_chat=prompt("Giá trị hiển thị","","Nội dung trường hiển thị");
        }else{
            if(func_ins=="link"){
                id_field_chat=prompt("Nhập liên kết trỏ đến:");
            }
            name_func_field_chat=func_ins;

            if(func_ins=="facebook"){
                id_field_chat='12';
                name_func_field_chat="link";
                value_field_chat='Virtual lover Facebook';
                id_func_field_chat="https://www.facebook.com/virtuallover/";
                color_field_chat="983DFF";
            }
            
        }
        var btn_act_field="";
        var btn_get_id="";
        
        if(func_ins=="show_chat"||func_ins=="inp_chat"){
            var func_click='show_id_chat("<?php echo $lang_sel;?>","id_field_chat_'+id_field_chat+'","0");return false;';
            btn_get_id=btn_get_id+"<span class='buttonPro light_blue' onclick='"+func_click+"'>Lấy id chat</span>";
            id_func_field_chat="<?php echo $lang_sel;?>";
        }
        
        btn_act_field=btn_act_field+"<div  class='col' style='width:240px;padding-top: 6px;'>"+btn_get_id+"<span class='buttonPro red' onclick='delete_field_chat(\""+id_field_chat+"\")'>Xóa</span></div>";
        
        var data_field="";
        data_field=data_field+"<div  class='col'><label>ID :</label><input name='id_field_chat[]' id='id_field_chat_"+id_field_chat+"' value='"+id_field_chat+"' type='text'/></div> ";
        data_field=data_field+"<div  class='col'><label>ID Func:</label><input name='id_func_field_chat[]' value='"+id_func_field_chat+"' type='text'/></div> ";
        data_field=data_field+"<div  class='col'><label>Name Func:</label><input name='name_func_field_chat[]' value='"+name_func_field_chat+"' type='text'/></div> ";
        data_field=data_field+"<div  class='col'><label>Lable:</label><input name='value_field_chat[]' value='"+value_field_chat+"' type='text'/></div> ";
        data_field=data_field+"<div  class='col'><label>Color:</label><input name='color_field_chat[]' class='jscolor'  value='"+color_field_chat+"' type='text'/></div> ";
        $('#box_select_content').append("<div class='box_fiel_chat_item field_chat_"+id_field_chat+"'>"+data_field+""+btn_act_field+"<i class='fa fa-sort' aria-hidden='true' style='float: right;margin: 3px;cursor: pointer;'></i></div>");
        
        
        $(document).ready(function() {
          jscolor.installByClassName("jscolor");
        });

}
    
function delete_field_chat(id_field){
    $(".field_chat_"+id_field).remove();
}


function get_audio_file(lang){
    var sex=$('#sex1').val();
    var char_sex=$('#character_sex').val();
    var txt=$('#chat').val();
    txt=txt.replace("{ten_user}", "");
    var link_voice_api="";
    var link_audios='http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen='+txt.length+'&client=tw-ob&q='+txt+'&tl='+lang;
    var link_audio_sex_0="<?php echo get_key_lang($link,'voice_character_sex_1',$lang_sel);?>";
    var link_audio_sex_1="<?php echo get_key_lang($link,'voice_character_sex_0',$lang_sel);?>";
    
    if((sex=='0'&&char_sex=='1')||(sex=='1'&&char_sex=='1')){
        if(link_audio_sex_0!="google"){
            link_voice_api=link_audio_sex_0.replace("{txt}",txt);
            link_audios=link_voice_api;
        }
    }
    
    if((char_sex=='0'&&sex=='1')){
        if(link_audio_sex_1!="google"){
            link_voice_api=link_audio_sex_1.replace("{txt}",txt);
            link_audios=link_voice_api;
        }
    }

    var win = window.open(link_audios, '_blank');

    if (win) {
        win.focus();
    } else {
        alert('Please allow popups for this website');
    }
}

function search_music_lyrics(){
    var txt_name_song=$('#chat').val().replace(/\&/g,'');
    var win = window.open("https://search.azlyrics.com/search.php?q="+txt_name_song, '_blank');
    win.focus();
}

function search_gg(){
    var txt_name_song=$('#chat').val().replace(/\&/g,' and ');
    var win = window.open("https://www.google.com/search?q="+txt_name_song+" <?php echo get_key_lang($link,'lyrics_search',$lang_sel);?>", '_blank');
    win.focus();
}

function search_ytb(){
    var key_value=$("#chat").val().replace(/\&/g,' and ');
    var win = window.open("https://www.youtube.com/results?search_query="+key_value);
    win.focus();
}

function download_ytb(is_edit){
    var link_ytb='';
    if(is_edit){
        link_ytb=$("#link_ytb_inp").html().replace('www.youtube.com','www.youtubepp.com');
    }else{
        link_ytb=$("#link_ytb").val().replace('www.youtube.com','www.youtubepp.com');
    }
    var win = window.open(link_ytb);
    win.focus();
}

function search_song(){
    var txt_name_song=$('#chat').val().replace(/\&/g,' and ');
    var win = window.open("https://www.google.com/search?q="+txt_name_song+"", '_blank');
    win.focus();
}

function check_chat_txt_length(){
    if(url_voice_chat=='google'){
        var txt_leng=$('#chat').val().length;
        if(txt_leng>195){
            $('#btn_tool_cms_audio').show();
            $('#file_audio').show();
        }else{
            $('#btn_tool_cms_audio').hide();
            $('#file_audio').hide();
        }
    }else{
        $('#btn_tool_cms_audio').hide();
        $('#file_audio').show();
    }
}

function goto_create_audio(){
    var txt=$('#chat').val();
    txt=txt.replace("{ten_user}", "");
    var win = window.open("<?php echo $url;?>/app_my_girl_handling.php?func=create_audio&txt="+txt+"&lang=<?php echo $lang_sel;?>", '_blank');
    win.focus();
}

function show_effect_chat(str_tag,str_page) {
    $.ajax({
        url: "app_my_girl_jquery.php",
        type: "get",
        data: "function=show_effect_chat&tag=" + str_tag+"&page="+str_page,
        success: function (data, textStatus, jqXHR) {
            swal({
                title: "Effect Chat",
                html: true,
                text: data
            });
        }

    });
}

function sel_effect_random(tag) {
    $.ajax({
        url: "app_my_girl_jquery.php",
        type: "get",
        data: "function=select_random_effect&tag=" + tag,
        success: function (data, textStatus, jqXHR) {
            var data = $.parseJSON(data);

            $("#id_img_effect").attr('src', '<?php echo $url;?>/app_mygirl/obj_effect/' + data["id"] + '.png');
            $("#effect_chat").val(data["id"]);
            if (data["color"] != "") {
                document.getElementById('chat_color').jscolor.fromString(data["color"]);
            } else {
                document.getElementById('chat_color').jscolor.fromString('FFFFFF');
            }
            $('#edit_effect').attr('href', '<?php echo $url;?>/app_my_girl_effect.php?edit=' + data["id"] + '').show();
        }

    });
}

function record(emp_add,lang_act){
    var recognition = new webkitSpeechRecognition();
    recognition.lang = lang_act;
        recognition.onresult = function(event) {
            document.getElementById(emp_add).value = event.results[0][0].transcript;
        }
    recognition.start();
}

function check_obj_syn(id_obj,lang_obj){
    show_loading();
    $.ajax({
        url: "<?php echo $url_syn;?>/app_my_girl_jquery.php",
        type: "post",
        data: "function=check_obj_syn&id="+id_obj+"&lang="+lang_obj,
        success: function (data, textStatus, jqXHR) {
            swal({
                html: true, title: 'Đồng bộ',
                text: data
             });
             get_obj_syn(id_obj,lang_obj);
        }

    });
}

function get_obj_syn(id_obj,lang_obj){
    $.ajax({
        url: "<?php echo $url;?>/app_my_girl_jquery.php",
        type: "post",
        data: "function=get_obj_syn&id="+id_obj+"&lang="+lang_obj,
        success: function (data, textStatus, jqXHR) {
            $("#check_obj_syn").html(data);
        }
    });
}

function send_file_obj_syn(id_obj,lang_obj,server_to,url){
    swal("Sao chép tệp","Sao chép tệp :"+url+" tới "+server_to);
    $.ajax({
        url: server_to+"/app_my_girl_jquery.php",
        type: "post",
        data: "function=send_file_obj_syn&id="+id_obj+"&lang="+lang_obj+"&url="+url,
        success: function (data, textStatus, jqXHR) {
            swal('Thành công!','Sao chép tệp '+data+' thành công!','success');
        }
    });
}

function search_info_music(){
    var txt_chat=$("#chat").val();
    window.open("https://www.google.com/search?q="+txt_chat,"_blank");
}
</script>