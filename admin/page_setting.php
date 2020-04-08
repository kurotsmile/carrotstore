<?php
Class Setting{
    public $key='';
    public $val='';
    public $label='';
    public $type='';
}

if(isset($_POST['show_ads'])){
    foreach ($_POST as $key=>$val){
        $query_update_setting=mysql_query("UPDATE `setting` SET  `value` = '$val' WHERE `key` = '$key' LIMIT 1;");
        if($query_update_setting) {
            echo alert("Cập nhật cài đặt thành công! $key => $val");
        }
    }
}


$array_setting=array();

$item_setting=new Setting();
$item_setting->key='show_ads';
$item_setting->val=get_setting($item_setting->key);
$item_setting->type='select';
$item_setting->label='Quảng cáo (google)';
array_push($array_setting,$item_setting);


$item_setting=new Setting();
$item_setting->key='show_adsupply';
$item_setting->val=get_setting($item_setting->key);
$item_setting->type='select';
$item_setting->label='Quảng cáo ADsupply';
array_push($array_setting,$item_setting);
?>
<form action="" method="post">
    <table>
        <?php
        for ($i=0;$i<count($array_setting);$i++) {
            $item_setting=$array_setting[$i];
            ?>
            <tr>
                <td><?php echo $item_setting->label;?></td>
                <td>
                    <select name="<?php echo $item_setting->key;?>">
                        <option value="0" <?php if ($item_setting->val=='0'){ ?>selected="true"<?php } ?>>Tắt</option>
                        <option value="1" <?php if ($item_setting->val=='1'){ ?>selected="true"<?php } ?>>Bật</option>
                    </select>
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