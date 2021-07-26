<?php
$list_flower=$this->q("SELECT SUBSTRING(`msg`, 1, 26) as m,`id`,`lang`,`msg` FROM carrotsy_flower.`flower`");
$num_flower=mysqli_num_rows($list_flower);
if($num_flower>0){
?>
<div class="app_ins">
    <div class="title"><i class="fa fa-commenting" aria-hidden="true"></i> châm ngôn (<span id="count_flower"><?php echo $num_flower;?></span>)</div>
    <div class="body">
        <table>
        <?php 
            while($flower=mysqli_fetch_assoc($list_flower)){
                $flower_id=$flower['id'];
                $flower_msg=$flower['msg'];
                $flower_lang=$flower['lang'];
        ?>
            <tr class="flower_<?php echo $flower_id;?> flower_emp">
                <td><?php echo $flower_lang;?></td>
                <td style="width: 30px;"><a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_mobile/flower/?page=msg_add&edit=<?php echo $flower_id;?>"><?php echo $flower['m'];?></a></td>
                <td>
                    <a target="_blank" onclick="$(this).addClass('blue');" href="<?php echo $this->url_carrot_store;?>/app_my_girl_add.php?lang=<?php echo $flower_lang;?>&sex=&character_sex=1&effect=36&answer=<?php echo $flower_msg; ?>" class="buttonPro small"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <a href="#" class="buttonPro small red" onclick="flower_act('del','<?php echo $flower_id;?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php if($flower_lang!='vi'){?>
                        <a onclick="$(this).addClass('blue');" target="_blank" href="https://translate.google.com/?sl=<?php echo $flower_lang;?>&tl=vi&text=<?php echo $flower_msg;?>&op=translate" class="buttonPro small"><i class="fa fa-language" aria-hidden="true"></i></a>
                    <?php }?>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    </div>
</div>
<script>
function flower_act(func,id_s){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0){$(".flower_"+data_js.id).remove();var count_flower=$(".flower_emp").length;$("#count_flower").html(count_flower);}';
        echo $this->ajax("function:'flower_act',fn:func,id:id_s",$out_func);
    ?>
}
</script>
<?php }?>