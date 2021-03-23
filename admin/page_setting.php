<?php
Class Setting{
    public $key='';
    public $val='';
    public $label='';
    public $type='';
}

if(isset($_POST['show_ads'])){
    foreach ($_POST as $key=>$val){
        $query_check_field=mysqli_query($link,"SELECT `key` FROM `setting` WHERE `key`='$key' LIMIT 1");
        if(mysqli_num_rows($query_check_field)>0){
            $query_update_setting=mysqli_query($link,"UPDATE `setting` SET  `value` = '$val' WHERE `key` = '$key' LIMIT 1;");
            if($query_update_setting) {
                echo alert("Cập nhật cài đặt thành công! $key => $val");
            }else{
                echo alert("Cập nhật cài đặt thất bại $key => $val");
            }
        }else{
            $query_add_setting=mysqli_query($link,"INSERT INTO `setting` (`value`,`key`) VALUES ('$val','$key')");
            if($query_add_setting) {
                echo alert("Thêm mới thành công $key => $val !");
            }else{
                echo alert("Thêm mới Thất bại $key => $val !");
            }
        }
    }
}

$array_setting=array();

$item_setting=new Setting();
$item_setting->key='show_ads';
$item_setting->val=get_setting($link,$item_setting->key);
$item_setting->type='select';
$item_setting->label='Quảng cáo (google)';
array_push($array_setting,$item_setting);

$item_setting=new Setting();
$item_setting->key='show_adsupply';
$item_setting->val=get_setting($link,$item_setting->key);
$item_setting->type='select';
$item_setting->label='Quảng cáo ADsupply';
array_push($array_setting,$item_setting);

$item_setting=new Setting();
$item_setting->key='login_facebook';
$item_setting->val=get_setting($link,$item_setting->key);
$item_setting->type='select';
$item_setting->label='Đăng nhập bằng tài khoản Facebook';
array_push($array_setting,$item_setting);

$item_setting=new Setting();
$item_setting->key='ver';
$item_setting->val=get_setting($link,$item_setting->key);
$item_setting->type='text';
$item_setting->label='Phiên bản các tài nguyên';
array_push($array_setting,$item_setting);

$item_setting=new Setting();
$item_setting->key='serviceWorker';
$item_setting->val=get_setting($link,$item_setting->key);
$item_setting->type='select';
$item_setting->label='Service Worker (Ứng dụng App Web)';
array_push($array_setting,$item_setting);
?>
<form action="" method="post">
    <table>
        <?php
        for ($i=0;$i<count($array_setting);$i++) {
            $item_setting=$array_setting[$i];
            ?>
            <tr>
                <td>
                    <?php echo $item_setting->label;?><br/>
                    <i style="color:blue"><?php echo $item_setting->key;?></i>
                </td>

                <td>
                    <?php if($item_setting->type=='select'){?>
                            <select name="<?php echo $item_setting->key;?>">
                                <option value="0" <?php if ($item_setting->val=='0'){ ?>selected="true"<?php } ?>>Tắt</option>
                                <option value="1" <?php if ($item_setting->val=='1'){ ?>selected="true"<?php } ?>>Bật</option>
                            </select>
                    <?php }?>

                    <?php if($item_setting->type=='text'){?>
                        <input type="text" value="<?php echo $item_setting->val;?>" name="<?php echo $item_setting->key;?>" />
                    <?php } ?>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Lưu cài đặt" class="buttonPro blue"></td>
        </tr>
    </table>
</form>