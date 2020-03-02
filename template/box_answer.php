<h3>Câu hỏi hằng ngày</h3>
<span>Hãy trả lời những câu hỏi để mọi người biết thêm về bạn :)</span>
<form id="frm_add_awer">
<p>
    <?php
    if(isset($_SESSION["username_login"])){
        $user_show=$_SESSION["username_login"];
    }else{
        $user_show="andanh@gmail.com";
    }
    if(isset($_POST['id_question'])){
        $get_all_question=mysql_query("select * from question WHERE (id != ".$_POST['id_question'].") and (id NOT  in(SELECT question FROM account_answer where user='".$user_show."'))  ORDER  BY  rand() limit 1");
    }else{
        $get_all_question=mysql_query("select q.* from question  q WHERE q.id NOT  in(SELECT aa.question FROM account_answer aa where aa.user='".$user_show."') ORDER  BY  rand() limit 1");
    }
    $que=mysql_fetch_array($get_all_question);

    $get_cat_ques=get_row('question_category',$que['category']);
    echo '<div style="color: orange"><i class="'.$get_cat_ques['icon'].'"></i> '.lang($get_cat_ques['name']).'</div><br/>';
    echo '<strong>'.$que['question'].'</strong>';
    $get_answer=mysql_query("select * from answer WHERE question='".$que[0]."'");
    while($answer=mysql_fetch_array($get_answer)){
    ?>
        <div class="item_answer" onclick="click_sel(this);"> <input   type="radio" name="answer" value="<?php echo $answer[0];?>"> <?php echo $answer[2];?> </div>
    <?php
    }
?>
</p>
<div id="show_anwer_note" style="display: none;">
    <strong><?php echo lang('answer_tip'); ?></strong>
    <textarea  name="answer_note" class="inp"></textarea>
</div>
<input type="hidden" name="question" value="<?php echo $que[0];?>" />
<button class="buttonPro blue" onclick="select_answer();return false;"><?php echo lang('hoan_tat'); ?></button>
<button class="buttonPro light_blue" onclick="reload_answer('<?php echo $que[0]; ?>');return false;"><?php echo lang('Đổi câu hỏi'); ?></button>
</form>
<script>
    function reload_answer(id_question){
        $('#loading').fadeIn(200);
        $.ajax({
            url: "<?php echo $url;?>/index.php",
            type: "post",
            data: "function=reload_answer&id_question="+id_question,
            success: function(data, textStatus, jqXHR)
            {
                $('#show_question').html(data);
                $('#loading').fadeOut(200);
            }
        });
    }

    function click_sel(emp){
            $('.item_answer').each(function(){
                $(this).find('input').removeAttr('Checked');
            });
            if ($(emp).find('input').is(':checked')) {
                $(emp).find('input').removeAttr('Checked');
            } else {
                $(emp).find('input').attr('checked','checked');
            }
        $('#show_anwer_note').show();
    }

    function select_answer(){
        var user_cur='<?php if(isset($_SESSION["username_login"])){ echo '1'; }else{ echo '0'; }?>';
        if(user_cur=='1'){
            $('#loading').fadeIn(200);
            var parameter=$('#frm_add_awer').serialize();
            $.ajax({
                url: "<?php echo $url;?>/index.php",
                type: "post",
                data: "function=select_answer&"+parameter,
                success: function(data, textStatus, jqXHR)
                {
                    $('#loading').fadeOut(200);
                    reload_answer('<?php echo $que[0];?>');
                }
            });
        }else{
            swal("<?php echo lang('thong_bao');?>","<?php echo lang('dang_nhap_de_tra_loi_trac_nghiem'); ?>","info");
        }

    }
</script>