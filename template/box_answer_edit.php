<form id="frm_add_awer" class="frm_update_awer" style="float: none;">
    <p>
        <?php
        $get_all_question=mysql_query("select * from question WHERE id= ".$id_question."");
        $que=mysql_fetch_array($get_all_question);


        $get_cat_ques=get_row('question_category',$que['category']);
        echo '<div style="color: orange"><i class="'.$get_cat_ques['icon'].'"></i> '.lang($get_cat_ques['name']).'</div><br/>';
        echo '<strong>'.$que['question'].'</strong>';
        $get_answer=mysql_query("select * from answer WHERE question='".$que[0]."'");
        while($answer=mysql_fetch_array($get_answer)){
        ?>
        <div class="item_answer" onclick="click_sel(this);" style="text-align: left"> <input <?php if($id_answer_account==$answer['id']){ echo 'checked="checked"';}; ?> class="inp_ans"  type="radio" name="answer" value="<?php echo $answer[0];?>"> <?php echo $answer[2];?> </div>
        <?php
    }
    ?>
    </p>
    <div id="show_anwer_note" style="margin-top: 20px;">
        <strong><?php echo lang('answer_tip'); ?></strong>
        <textarea  name="answer_note" class="inp"><?php echo $answer_note;?></textarea>
    </div>
    <input type="hidden" name="id_answer" value="<?php echo $an['id'];?>"/>
</form>
