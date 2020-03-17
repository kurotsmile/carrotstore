<?php
if(isset($_POST['func'])) {
    $lang = $_POST['lang_sel'];
    $query_update_lyrics = mysql_query('update `app_my_girl_'.$lang.'_lyrics` set `lyrics`=REPLACE(`lyrics`,"[","")');
    $query_update_lyrics = mysql_query('update `app_my_girl_'.$lang.'_lyrics` set `lyrics`=REPLACE(`lyrics`,"]","")');
    $query_update_lyrics = mysql_query('update `app_my_girl_'.$lang.'_lyrics` set `lyrics`=REPLACE(`lyrics`,"\'","")');
    mysql_error($link);
    show_alert('Đã sửa các lời bài hát của nước '.$lang,'info');
}
?>

<div style="float: left;padding: 10px;">
    <form style="float: left;" name="frm_month_act" id="form_loc" action="" method="post">
        <p>
            <label><i class="fa fa-braille" aria-hidden="true"></i> Chỉnh sữa lời bài hát</label>
        </p>

        <p>
            Ngôn ngữ:<br/>
            <select name="lang_sel">
                <?php
                $list_country = mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
                while ($l = mysql_fetch_array($list_country)) {
                    $langsel = $l['key'];
                    ?>
                    <option value="<?php echo $langsel; ?>" <?php if ($sel_lang == $langsel) {
                        echo 'selected="true"';
                    } ?>><?php echo $l['name']; ?></option>';
                    <?php
                }
                ?>
            </select>
        </p>

        <p><br/>
            <input type="submit" value="Bắt đầu tối ưu" class="buttonPro blue"/>
            <input type="hidden" value="fix_lyrics" name="func"/>
        </p>
    </form>

</div>
