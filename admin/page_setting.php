<?php

if(isset($_POST['show_ads'])){
    $show_ads_google=$_POST['show_ads'];
    $query_update_setting=mysql_query("UPDATE `setting` SET  `value` = '$show_ads_google' WHERE `key` = 'show_ads' LIMIT 1;");
    if($query_update_setting) {
        echo alert("Cập nhật cài đặt thành công!");
    }
}

$show_ads_google=get_setting('show_ads');
?>
<form action="" method="post">
    <table>
        <tr>
            <td>Quảng cáo (google)</td>
            <td>
                <select name="show_ads">
                    <option value="0" <?php if($show_ads_google=='0'){ ?>selected="true"<?php }?>>Tắt</option>
                    <option value="1" <?php if($show_ads_google=='1'){ ?>selected="true"<?php }?>>Bật</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" value="Lưu cài đặt" class="buttonPro blue"></td>
        </tr>
    </table>
</form>