<?php
$list_sheep=$this->q("SELECT `id`,`msg`,`lang` FROM  carrotsy_sheep.`good_night` WHERE `active` = '1'");
$num_sheep=mysqli_num_rows($list_sheep);
if($num_sheep>0){
?>
<div class="app_ins">
    <div class="title"><i class="fa fa-bed" aria-hidden="true"></i> Ứng dụng đếm cừu (<?php echo $num_sheep;?>)</div>
    <div class="body">
        <table>
        <?php 
            while($sheep=mysqli_fetch_assoc($list_sheep)){
                $sheep_id=$sheep['id'];
                $sheep_msg=$sheep['msg'];
                $sheep_lang=$sheep['lang'];
        ?>
            <tr id="sheep_<?php echo $sheep_id;?>">
                <td><?php echo $sheep_lang;?></td>
                <td><a target="_blank" href="<?php echo $this->url_carrot_store;?>/app_mobile/sheep/?page=good_night&active=0&page=good_night_add&edit=<?php echo $sheep_id;?>"><?php echo $sheep_msg;?></a></td>
                <td>
                    <a href="#" class="buttonPro small green" onclick="sheep_act('act','<?php echo $sheep_id;?>')"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                    <a href="#" class="buttonPro small red" onclick="sheep_act('del','<?php echo $sheep_id;?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php if($sheep_lang!='vi'){?>
                        <a onclick="$(this).addClass('blue');" target="_blank" href="https://translate.google.com/?sl=<?php echo $sheep_lang;?>&tl=vi&text=<?php echo $sheep_msg;?>&op=translate" class="buttonPro small"><i class="fa fa-language" aria-hidden="true"></i></a>
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
function sheep_act(func,id_s){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0)$("#sheep_"+data_js.id).hide(100);';
        echo $this->ajax("function:'sheep_act',fn:func,id:id_s",$out_func);
    ?>
}
</script>
<?php }?>