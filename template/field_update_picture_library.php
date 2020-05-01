<?php
$arr_img=json_decode($data["images"]);
?>
<p>
                <div class="group">
                    <div class="title"><input type="checkbox" class="btnGroup" <?php if(count($arr_img)>0){ echo 'checked="true"';} ?> /> <?php echo lang($link,'thu_vien_anh');?> </div>
                    <div class="content"  <?php if(count($arr_img)>0){ echo 'style="display: block;"';} ?> >
                        <p>
                        <?php echo lang($link,'imgs_tip');?>
                        </p>
                        
                        <div id="images">
                        <?php
                            for($i=0;$i<count($arr_img);$i++){
                         ?>
                        <span style="width: 100%;" class="imgs_product">
                            <a href="" target="_blank"><img src="<?php echo $url; ?>/<?php echo $arr_img[$i]; ?>" style="width: 40px;height: 40px;" /></a>
                            <button class="buttonPro red small" onclick="delete_images(this);return false"> <i class="fa fa-trash"></i> </button>
                            <i><a href="<?php echo $url; ?>/<?php echo $arr_img[$i]; ?>" target="_blank"><?php echo $url; ?>/<?php echo $arr_img[$i]; ?></a></i>
                            <input type="hidden" value="<?php echo $arr_img[$i]; ?>" name="images[]" class="imgs" />
                        </span>
                         <?php
                            }
                        ?>
                        </div>
                        <br />
                        <button class="buttonPro small blue" onclick="show_upload('images','images');return false;"><?php echo lang($link,'tai_anh_len'); ?></button>
                    </div>
                </div>
</p>
