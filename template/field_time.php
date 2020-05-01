<?php
$check_time=0;
if(isset($data["id"])){
    $id=$data["id"];
    $mysq_check_time=mysql_query("SELECT * FROM `place_time` WHERE `place_id` = '$id' LIMIT 1");
    
    $check_time=mysql_num_rows($mysq_check_time);
    if($check_time>0){
        $place_time=mysql_fetch_array($mysq_check_time);
    }
}
?>
        <div style="margin-top: 15px;">        
            <div class="group">
            <div class="title"><input type="checkbox" name="place_time" class="btnGroup" <?php if($check_time>0){ echo 'checked="true"';} ?>  /> <?php echo lang($link,'thoi_gian');?> </div>
            <div class="content"  <?php if($check_time>0){ echo 'style="display: block;"';}?> >
            <div id="content_tag" class="tags">
                <p>
                <strong>Start</strong> :
                <select name="time_start">
                    <?php
                        for($i=7;$i<24;$i++){
                            $txt_time='';
                            if($i<=12){
                                $txt_time=$i.':00 AM';
                            }else{
                                $txt_time=$i.':00 PM';
                            }
                    ?>
                        <option value="<?php echo $txt_time;?>" <?php if($check_time>0){if($txt_time==$place_time['time_start']){ echo 'selected="true"';}} ?> ><?php echo $txt_time;?></option>
                    <?php }?>
                </select>
                
                <strong>End</strong>:
                <select name="time_end">
                    <?php
                        for($i=7;$i<24;$i++){
                            $txt_time='';
                            if($i<=12){
                                $txt_time=$i.':00 AM';
                            }else{
                                $txt_time=$i.':00 PM';
                            }
                    ?>
                        <option value="<?php echo $txt_time;?>" <?php if($check_time>0){if($txt_time==$place_time['time_end']){ echo 'selected="true"';}} ?> ><?php echo $txt_time;?></option>
                    <?php }?>
                </select>
                </p>
                
                <p>
                    <strong>Date</strong>:<br /> 
                    <span>Thu 2 <input type="checkbox"  <?php if($check_time>0){if($place_time['t2']=='true'){echo 'checked="true"';}}?> name="t2" /></span>
                    <span>Thu 3 <input type="checkbox"  <?php if($check_time>0){if($place_time['t3']=='true'){echo 'checked="true"';}} ?> name="t3"/></span>
                    <span>Thu 4 <input type="checkbox"  <?php if($check_time>0){if($place_time['t4']=='true'){echo 'checked="true"';}} ?> name="t4"/></span>
                    <span>Thu 5 <input type="checkbox"  <?php if($check_time>0){if($place_time['t5']=='true'){echo 'checked="true"';}} ?> name="t5"/></span>
                    <span>Thu 6 <input type="checkbox"  <?php if($check_time>0){if($place_time['t6']=='true'){echo 'checked="true"';}} ?> name="t6"/></span>
                    <span>Thu 7 <input type="checkbox"  <?php if($check_time>0){if($place_time['t7']=='true'){echo 'checked="true"';}} ?> name="t7"/></span>
                    <span>CN <input type="checkbox" <?php if($check_time>0){if($place_time['cn']=='true'){echo 'checked="true"';}} ?> name="cn"/></span>
                </p>
            </div>
            </div>
            </div>
        </div>