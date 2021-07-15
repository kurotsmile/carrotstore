<?php
$func_sub='add';
$inapp_app_id='';
$inapp_id='';
$inapp_id_edit='';
$inapp_price='';
$inapp_app_lang='';
$inapp_protocol='';

if(isset($_POST['func_sub']))$func_sub=$_POST['func_sub'];

    if(isset($_POST['inapp_product_id'])){
        $inapp_id=$_POST['inapp_product_id'];
        $inapp_app_id=$_POST['inapp_app_id'];
        $inapp_price=$_POST['inapp_price'];
        $inapp_app_lang=$_POST['inapp_app_lang'];
        $inapp_protocol=$_POST['inapp_protocol'];
        if($func_sub=='add'){
            $add_inapp=$this->q("INSERT INTO carrotsy_virtuallover.`inapp` (`id`, `id_app`, `price`,`data_lang`,`protocol`) VALUES ('$inapp_id', '$inapp_app_id','$inapp_price','$inapp_app_lang','$inapp_protocol');");
            if($add_inapp)
                echo $this->msg("Thêm mới inapp thành công!");
            else
                echo $this->msg("Thêm mới inapp thất bại!");
        }

        if($func_sub=='edit'){
            $inapp_id_edit=$_POST['inapp_id_edit'];
            $update_inapp=$this->q("UPDATE carrotsy_virtuallover.`inapp` SET `id`='$inapp_id',`id_app` = '$inapp_app_id',`price` = '$inapp_price',`data_lang`='$inapp_app_lang',`protocol`='$inapp_protocol' WHERE `id` = '$inapp_id_edit' LIMIT 1;");
            if($update_inapp)
                echo $this->msg("Cập nhật inapp thành công!");
            else
                echo $this->msg("Cập nhật inapp thất bại!");
        }
    }else{
        if(isset($_GET['id'])){
            $inapp_id=$_GET['id'];
            $inapp_id_edit=$inapp_id;
            $data_inapp=$this->q_data("SELECT * FROM carrotsy_virtuallover.`inapp` WHERE `id`='$inapp_id'");
            $inapp_app_id=$data_inapp['id_app'];
            $inapp_price=$data_inapp['price'];
            $inapp_app_lang=$data_inapp['data_lang'];
            $func_sub='edit';
        }
    }

    $list_app=$this->q("SELECT `id` FROM carrotsy_virtuallover.`products` WHERE `company` = 'Carrot'");
    ?>
    <form style="width:auto;float:left" action="" method="post" name="frm_inapp">
    <table>
        <tr>
            <td>ID product</td>
            <td>
                <input name="inapp_product_id" id="inapp_product_id" type="text" value="<?php echo $inapp_id;?>">
                <?php echo $this->cp("inapp_product_id");?>
            </td>
        </tr>
        <tr>
            <td>ID app</td>
            <td>
                <select name="inapp_app_id">
                <?php 
                while($app=mysqli_fetch_assoc($list_app)){
                    $id_app=$app['id'];
                    $name_app=$this->q_data("SELECT `data` FROM carrotsy_virtuallover.`product_name_en` WHERE `id_product` = '$id_app' LIMIT 1");
                    $name_app=$name_app['data'];
                ?>
                    <option <?php if($inapp_app_id==$id_app){ echo 'selected=true';}?> value="<?php echo $id_app;?>"><?php echo $name_app;?></option>
                <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Thiết lập dữ liệu ngôn ngữ</td>
            <td>
                <select name="inapp_app_lang">
                <?php 
                $list_inapp_lang=$this->q("SELECT `key`,`title` FROM carrotsy_virtuallover.`inapp_lang` Group by `key` ");
                while($ia_lang=mysqli_fetch_assoc($list_inapp_lang)){
                    $ia_lang_key=$ia_lang['key'];
                    $ia_lang_title=$ia_lang['title'];
                ?>
                    <option <?php if($inapp_app_lang==$ia_lang_key){ echo 'selected=true';}?> value="<?php echo $ia_lang_key;?>"><?php echo $ia_lang_title;?></option>
                <?php }?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input name="inapp_price" type="text" value="<?php echo $inapp_price;?>"></td>
        </tr>
        <tr>
            <td>Trở về ứng dụng (protocol)</td>
            <td>
                <input name="inapp_protocol" id="inapp_protocol" type="text" value="<?php echo $inapp_protocol;?>">
                <?php echo $this->cp("inapp_protocol");?>
                <div style="display: grid;">
                <?php
                $list_protocol=$this->q("SELECT `protocol` FROM carrotsy_virtuallover.`inapp` WHERE `protocol` != '' group by `protocol`");
                while($protocol=mysqli_fetch_assoc($list_protocol)){
                    $p_text=$protocol['protocol'];
                    echo '<span class="btn" onclick="sel_protocol(\''.$p_text.'\')">'.$p_text.'</span>';
                }
                ?>
                </div>
            </td>
        </tr>
    </table>
    <a href="<?php echo $url_cur;?>&func=list" class="buttonPro black" ><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> trở về</a>
    <?php if($func_sub=='add'){?>
        <button class="buttonPro green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</button>
    <?php }else{?>
        <button class="buttonPro orange"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button>
        <input type="hidden" name="inapp_id_edit" value="<?php echo $inapp_id_edit;?>"/>
    <?php }?>
    <input type="hidden" name="func_sub" value="<?php echo $func_sub;?>"/>
</form>

<script>
function sel_protocol(p_text){
    $("#inapp_protocol").val(p_text);
}
</script>