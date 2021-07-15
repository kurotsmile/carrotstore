<?php
$func_sub='add';
$key_name='';
$key_name_edit='';
$url_icon_inapp=$this->url_carrot_store.'/images/128.png';

if(isset($_POST['func_sub']))$func_sub=$_POST['func_sub'];

    if(isset($_POST['key_name'])){
        $key_name=$_POST['key_name'];
        $inapp_name=$_POST['inapp_name'];
        $inapp_tip=$_POST['inapp_tip'];
        $inapp_lang=$_POST['inapp_lang'];
        $key_name_edit=$key_name;
        if(isset($_POST['key_name_edit'])) $key_name_edit=$_POST['key_name_edit'];
        
            $clear_lang_inapp=$this->q("DELETE FROM carrotsy_virtuallover.`inapp_lang` WHERE `key` = '$key_name_edit'");
            for($i=0;$i<count($inapp_lang);$i++){
                $key_lang=$inapp_lang[$i];
                $s_name=addslashes($inapp_name[$i]);
                $s_tip=addslashes($inapp_tip[$i]);
                if(trim($s_name)!="") $add_inapp_lang=$this->q("INSERT INTO carrotsy_virtuallover.`inapp_lang` (`key`, `title`, `tip`, `lang`) VALUES ('$key_name', '$s_name', '$s_tip', '$key_lang');");
            }
            echo $this->msg("Thêm ngôn ngữ in-app ($key_name)  thành công!");

            if(isset($_FILES['icon'])){
                $path_upload="inapp_data/".$key_name_edit.".png";
                move_uploaded_file($_FILES['icon']['tmp_name'], $path_upload);
            }
    }else{
        if(isset($_GET['key'])){
            $key_name=$_GET['key'];
            $key_name_edit=$key_name;
            $func_sub='edit';
        }
    }

    if(file_exists('inapp_data/'.$key_name.'.png')) $url_icon_inapp=$this->url_carrot_store.'/app_mobile/carrot_framework/inapp_data/'.$key_name.'.png';
    
    $list_app=$this->q("SELECT `id` FROM carrotsy_virtuallover.`products` WHERE `company` = 'Carrot'");
    ?>
    <form style="width:auto;float:left" action="" method="post" name="frm_inapp" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Key sản phẩm</td>
            <td><input style="width:100%;" name="key_name" type="text" value="<?php echo $key_name;?>"></td>
        </tr>
        <tr>
            <td>Biểu tượng</td>
            <td>
                <?php
                if($url_icon_inapp!='') echo '<img style="width:120px;" src="'.$url_icon_inapp.'"/>';
                ?>
                <input style="width:100%;" class="buttonPro small" name="icon" type="file">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                <tr>
                    <th><i class="fa fa-globe" aria-hidden="true"></i></th>
                    <th>Quốc gia</th>
                    <th>Tên sản phẩm</th>
                    <th><i class="fa fa-file-text-o" aria-hidden="true"></i></th>
                    <th>Mô tả</th>
                    <th><i class="fa fa-file-text-o" aria-hidden="true"></i></th>
                </tr>
                <?php
                    $list_lang=$this->get_list_lang();
                    for($i=0;$i<count($list_lang);$i++){
                        $item_lang=$list_lang[$i];
                        $key_lang=$item_lang['key'];

                        $ia_name='';
                        $ia_tip='';
                        if($func_sub=='edit'){
                            $ia_data=$this->q_data("SELECT `title`, `tip` FROM carrotsy_virtuallover.`inapp_lang` WHERE `lang` = '$key_lang' AND `key`='$key_name' LIMIT 1");
                            if($ia_data!=null){
                                $ia_name=$ia_data['title'];
                                $ia_tip=$ia_data['tip'];
                            }
                        }
                ?>
                    <tr>
                        <td><img style="width:16px;" src="<?php echo $item_lang['icon'];?>"/></td>
                        <td><?php echo $item_lang['name'];?></td>
                        <td><input type="text" id="inapp_name_<?php echo $key_lang;?>" name="inapp_name[]" value="<?php echo $ia_name;?>"/></td>
                        <td><?php echo $this->cp("inapp_name_".$key_lang);?></td>
                        <td>
                            <input type="text" id="inapp_tip_<?php echo $key_lang;?>" name="inapp_tip[]" value="<?php echo $ia_tip;?>"/>
                            <input type="hidden" name="inapp_lang[]" value="<?php echo $key_lang;?>"/>
                        </td>
                        <td><?php echo $this->cp("inapp_tip_".$key_lang);?></td>
                    </tr>
                <?php }?>
                </table>
            </td>
        </tr>
    </table>
    <a href="<?php echo $url_cur;?>&func=lang" class="buttonPro black" ><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> trở về</a>
    <?php if($func_sub=='add'){?>
        <button class="buttonPro green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</button>
    <?php }else{?>
        <button class="buttonPro orange"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button>
        <input type="hidden" name="key_name_edit" value="<?php echo $key_name_edit;?>"/>
    <?php }?>
    <input type="hidden" name="func_sub" value="<?php echo $func_sub;?>"/>
</form>