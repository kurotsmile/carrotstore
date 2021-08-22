<?php
$list_acc=$this->q("SELECT * FROM carrotsy_virtuallover.`acc_report`");
$num_acc=mysqli_num_rows($list_acc);
if($num_acc>0){
?>
<div class="app_ins">
    <div class="title"><i class="fa fa-universal-access" aria-hidden="true"></i> Báo cáo sai phạm (<span id="count_acc"><?php echo $num_acc;?></span>)</div>
    <div class="body">
        <table>
        <?php 
            while($acc=mysqli_fetch_assoc($list_acc)){
                $id_device=$acc['id_device'];
                $lang_acc=$acc['lang'];
                $txt_report=$acc['txt'];
                $type_acc=$acc['type'];
        ?>
            <tr class="acc_<?php echo $id_device;?> acc_emp" style="display:block;width:100%">
                <td>
                    <?php if($type_acc=='0'){?><i class="fa fa-venus-mars" aria-hidden="true"></i><?php }?>
                    <?php if($type_acc=='1'){?><i class="fa fa-user-secret" aria-hidden="true"></i><?php }?>
                    <?php if($type_acc=='2'){?><i class="fa fa-flag-checkered" aria-hidden="true"></i><?php }?>
                    <?php if($type_acc=='3'){?><i class="fa fa-music" aria-hidden="true"></i><?php }?>
                    <?php if($type_acc=='4'){?><i class="fa fa-copyright" aria-hidden="true"></i><?php }?>
                    <?php if($type_acc=='5'){?><i class="fa fa-music" aria-hidden="true"></i><?php }?>
                </td>
                <td>
                    <?php if($type_acc=='0'||$type_acc=='1'||$type_acc=='2'){ echo $this->user($id_device,$lang_acc);}else{?>
                        <a target="_blank" href="<?php echo $this->url_carrot_store;?>/music/<?php echo $id_device.'/'.$lang_acc;?>" class="buttonPro small"><i class="fa fa-music" aria-hidden="true"></i> <?php echo $id_device;?></a>
                    <?php }?>
                    <div><?php echo $txt_report;?></div>
                </td>
                <td>
                    <a href="#" class="buttonPro small red" onclick="acc_act('del','<?php echo $id_device;?>','<?php echo $lang_acc;?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php if($txt_report!=''&&$lang_acc!='vi'){?><a onclick="$(this).addClass('blue');" target="_blank" href="https://translate.google.com/?sl=<?php echo $lang_acc;?>&tl=vi&text=<?php echo $txt_report;?>&op=translate" class="buttonPro small"><i class="fa fa-language" aria-hidden="true"></i></a><?php }?>
                </td>
            </tr>
        <?php
            }
        ?>
        </table>
    </div>
</div>
<script>
function acc_act(func,id_s,lang_s){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0){$(".acc_"+data_js.id).remove();var count_acc=$(".acc_emp").length;$("#count_acc").html(count_acc);}';
        echo $this->ajax("function:'acc_act',fn:func,id:id_s,lang:lang_s",$out_func);
    ?>
}
</script>
<?php }?>
