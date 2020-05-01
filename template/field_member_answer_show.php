 <?php
    $get_all_question=mysql_query("select * from question WHERE id = ".$an['question']."");
    $que=mysql_fetch_array($get_all_question);
    $get_cat_ques=get_row('question_category',$que['category']);
        ?>
        <div>
            <i style="color: orange" class="<?php echo $get_cat_ques['icon'];?>"></i> <?php echo lang($get_cat_ques['name']);?>
           <?php
                if(isset($_SESSION['username_login'])&&$_SESSION['username_login']==$id_user){
           ?>
                <i class="fa fa-times close" title="<?php echo lang($link,'xoa');?>" aria-hidden="true" onclick="delete_data(this,'<?php echo $an['id'];?>','account_answer');"></i> <i title="<?php echo lang($link,'cap_nhat');?>" onclick="member_edit_answer('<?php echo $an['id'];?>');" class="fa fa-pencil-square edit" aria-hidden="true"></i>
            <?php }?>
        </div>
    <strong><?php echo $que['question'];?></strong><br/>
    <?php
    $get_answer=mysql_query("select * from answer WHERE question='".$que[0]."' and id='".$an['answer']."'");
    $get_answer=mysql_fetch_array($get_answer);
    ?>
    <div class="item_answer" style="display: inline-block;padding-left: 4px;padding-right: 4px;"> <?php echo $get_answer[2];?> </div>
    <?php if(trim($an['note'])!=''){?>
        <div class="note">
            <i class="fa fa-quote-left" aria-hidden="true"></i>
            <?php echo show_icon($an['note'],$url);?>
        </div>
<?php }?>
