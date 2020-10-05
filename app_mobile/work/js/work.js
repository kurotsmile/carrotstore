function show_report_work() {
    $("#frm_add_report_loading").hide();
    $("#frm_add_report").show(200);
    $("#btn_add_report").hide(100);
}

function close_report_work() {
    $("#frm_add_report").hide(200);
    $("#btn_add_report").show(100);
}

function show_add_report_work(id_object,lang,type_chat,type_action){
    $("#frm_add_report_loading").hide();
    $("#report_type_chat").val(type_chat);
    $("#report_lang_chat").val(lang);
    $("#report_type_action").val(type_action);
    $("#report_id_chat").val(id_object);
    $("#report_func").val("add");
    $("#btn_add_and_edit_report").removeClass("orange");
    $("#btn_add_and_edit_report").addClass("green");
    show_report_work();
}

function submit_report_work(){
    var from_data=$("#frm_add_report").serializeArray();
    var url_act=$("#url_act").val();
    $("#frm_add_report_loading").show();
    $.ajax({
        type: 'post',
        url: url_act+'/ajax.php',
        data: from_data,
        success: function(report) {
            $("#area_table_work").html(report);
            get_salary();
            close_report_work();
        },
    });
}

function edit_report_work(id_report){
    var data_report=$("#item_work_"+id_report).attr("data_report");
    var obj_report=JSON.parse(data_report);
    $("#frm_add_report_loading").hide();
    $("#report_type_chat").val(obj_report.type_chat);
    $("#report_lang_chat").val(obj_report.lang_chat);
    $("#report_type_action").val(obj_report.type_action);
    $("#report_id_chat").val(obj_report.id_chat);
    $("#report_func").val("edit");
    $("#report_id").val(obj_report.id);
    $("#btn_add_and_edit_report").removeClass("green");
    $("#btn_add_and_edit_report").addClass("orange");
    show_report_work();
}

function get_salary() {
    var from_data=$("#frm_get_salary").serializeArray();
    var url_act=$("#url_act").val();
    $.ajax({
        type: 'post',
        url: url_act+'/ajax.php',
        data: from_data,
        success: function(report) {
            var obj_report = JSON.parse(report);
            $("#account_balance").html(obj_report.salary).effect('pulsate','slow').effect('highlight','slow');
            $("#count_task_month").html(obj_report.total_task).effect('pulsate','slow').effect('highlight','slow');
        },
    });
}