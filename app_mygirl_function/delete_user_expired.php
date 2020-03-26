<?php
if (isset($_GET['lang_sel'])) {
    $sel_lang = $_GET['lang_sel'];
}
?>
<div style="float: left;padding: 10px;">
    <form style="float: left;" name="frm_month_act" id="form_loc" action="<?php echo $url; ?>/app_my_girl_handling.php" method="get">
        <p>
            Tìm và xóa các tài khoản không còn hoặt động sau 6 tháng khi không khai báo số điện thoại và địa chỉ!
        </p>
        <p>
            Ngôn ngữ:<br/>
            <select name="lang_sel">
                <?php
                $list_country = mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
                while ($l = mysql_fetch_array($list_country)) {
                    ?>
                    <option value="<?php echo $l['key']; ?>" <?php if ($sel_lang == $l['key']) {
                        echo 'selected="true"';
                    } ?>><?php echo $l['name']; ?></option>';
                    <?php
                }
                ?>
            </select>
        </p>

        <p><br/>
            <input type="submit" value="Bắt xóa" class="buttonPro blue"/>
            <input type="hidden" value="delete_user_expired" name="func"/>
        </p>
    </form>

    <?php
    if (isset($_GET['lang_sel'])) {
        $sel_lang = $_GET['lang_sel'];
        $query_count_user=mysql_query("SELECT COUNT(`id_device`) as c FROM `app_my_girl_user_$sel_lang`");
        $data_count=mysql_fetch_array($query_count_user);
        echo '<strong>Có '.$data_count['c'].' Người dùng đã điền đầy đủ thông tin ở quốc gia ('.$sel_lang.') này</strong>';
        $query_delete=mysql_query("DELETE FROM `app_my_girl_user_$sel_lang` WHERE (`date_cur` < DATE_SUB(NOW(),INTERVAL 6 MONTH)) AND `address`='' AND `sdt`=''");
        echo show_alert("Đã xóa các người dùng sai dữ liệu sau 6 tháng!","alert");
    }
    ?>
</div>