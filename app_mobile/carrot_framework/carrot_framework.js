function copy_tag(name_tag) {
    var $temp = $("<input>");$("body").append($temp);
    var s_copy=$("#" + name_tag).val();
    s_copy=s_copy.replace("{ten_user}", "");
    $temp.val(s_copy).select();
    document.execCommand("copy");$temp.remove();
}

function paste_tag(name_tag) {
    navigator.clipboard.readText().then(text => {$("#"+name_tag).val(text.trim());});
}

function translate_tag(name_tag,emp_click){
    var val=$('#'+name_tag).val();
    var lang_cur=$('#'+name_tag).attr('lang_cur');
    if(val==""){
        $('#'+name_tag).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        return;
    }

    var url_tr="https://translate.google.com/?sl=auto&tl=vi&text="+val+"&op=translate";
    window.open(url_tr);
    $(emp_click).addClass('yellow');
}