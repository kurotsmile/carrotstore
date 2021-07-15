<?php
$list_midi=$this->q("SELECT SUBSTRING(`name`, 1, 10) as n,id_midi,`name` FROM carrotsy_piano.`midi` WHERE `sell` = '0'");
$num_midi=mysqli_num_rows($list_midi);
if($num_midi>0){
?>
<div class="app_ins">
    <div class="title"><i class="fa fa-bell" aria-hidden="true"></i> Ứng dụng Midi Piano (<?php echo $num_midi;?>)</div>
    <div class="body">
        <table>
        <?php 
            while($midi=mysqli_fetch_assoc($list_midi)){
                $midi_id=$midi['id_midi'];
                $midi_name=$midi['name'];
        ?>
            <tr id="midi_<?php echo $midi_id;?>">
                <td><i class="fa fa-file-audio-o" aria-hidden="true"></i> <a target="_blank" href="<?php echo $this->url_carrot_store;?>/piano/<?php echo $midi_id;?>"><?php echo $midi['n'];?></a></td>
                <td>
                    <a href="#" class="buttonPro small green" onclick="midi_act('public','<?php echo $midi_id;?>')"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                    <a href="#" class="buttonPro small yellow" onclick="midi_act('sell','<?php echo $midi_id;?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <a href="#" class="buttonPro small black" onclick="midi_act('archive','<?php echo $midi_id;?>')"><i class="fa fa-archive" aria-hidden="true"></i></a>
                    <a href="#" class="buttonPro small red" onclick="midi_act('del','<?php echo $midi_id;?>')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a href="<?php echo $this->url_carrot_store;?>/app_mobile/piano/?view=home&key=<?php echo $midi_name;?>&type=1" class="buttonPro small" onclick="$(this).addClass('blue');"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a href="<?php echo $this->url_carrot_store;?>/app_mobile/piano/?page=edit&id=<?php echo $midi_id;?>" onclick="$(this).addClass('blue');" target="_blank" class="buttonPro small"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                </td>
            </tr>
        <?php
            }
        ?>
        </table>
    </div>
</div>
<script>
function midi_act(func,id_s){
    <?php 
        $out_func='var data_js=JSON.parse(data);';
        $out_func.='swal(data_js.msg);';
        $out_func.='if(data_js.error==0)$("#midi_"+data_js.id).hide(100);';
        echo $this->ajax("function:'midi_act',fn:func,id:id_s",$out_func);
    ?>
}
</script>
<?php }?>
