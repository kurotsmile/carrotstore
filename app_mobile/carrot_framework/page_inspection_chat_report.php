<?php
$list_report=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_report` WHERE `sel_report` = '4' AND `value_report`!=''");
$num_report=mysqli_num_rows($list_report);
if($num_report>0){
    $cont_all_report=$this->q_data("SELECT COUNT(*) as c FROM carrotsy_virtuallover.`app_my_girl_report` LIMIT 1");
    $count_total_report=$cont_all_report['c'];
?>
<div class="app_ins">
    <div class="title" style="width: 96%;">
        <i class="fa fa-flag" aria-hidden="true"></i> Lỗi trò chuyện (<span id="num_report"><?php echo $num_report;?></span>/<span id="count_total_report"><?php echo $count_total_report;?></span>)
    </div>
    <div class="body" id="table_m">
    <table>
        <?php
        while($rp=mysqli_fetch_assoc($list_report)){
            $rp_id_question=$rp['id_question'];
            $rp_type_question=$rp['type_question'];
            $rp_lang=$rp['lang'];
            $rp_val=$rp['value_report'];
            if($rp_lang=='zh')$rp_lang="zh-CN";
            $url_rp_translate='https://translate.google.com/?sl='.$rp_lang.'&tl=vi&text='.$rp_val.'&op=translate';
            $url_rp_view='';
            if($rp_type_question=='chat')
                $url_rp_view=$this->url_carrot_store.'/app_my_girl_update.php?id='.$rp_id_question.'&lang='.$rp_lang;
            else
                $url_rp_view=$this->url_carrot_store.'/app_my_girl_update.php?id='.$rp_id_question.'&lang='.$rp_lang.'&msg=1';
        ?>
        <tr class="report_<?php echo $rp_id_question;?>_<?php echo $rp_type_question;?> rp_emp">
            <td style="width:255px;word-break: break-all;">
                <a onclick="$(this).css('color', 'red');" target="_blank" href="<?php echo $url_rp_translate;?>"><?php echo $rp_val;?></a><br/>
            </td>
            <td style="width:80px">
                <a onclick="$(this).addClass('blue');" target="_blank" href="<?php echo $url_rp_view;?>" class="buttonPro small"><i class="fa fa-commenting-o" aria-hidden="true"></i></a>
                <a href="#" class="buttonPro small red" onclick="report_act('del','<?php echo $rp_id_question;?>','<?php echo $rp_type_question;?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
    </div>
</div>

<script>
function report_act(func,id_chat,typechat){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0){$(".report_"+data_js.id).remove();var count_total_chat=$(".rp_emp").length;$("#num_report").html(count_total_chat);}';
        $out_func.='$("#count_total_chat").html(data_js.count_c);';
        echo $this->ajax("function:'report_act',fn:func,id:id_chat,type:typechat",$out_func);
    ?>
}
</script>
<?php
}
?>