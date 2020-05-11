<?php
    $date = date('m-d-Y H:i:s', time()).'.sql';
    $filename = "db-Bible-".$date;
?>
    <form method="get" name="act_chat_month" style="width: 500px;padding: 10px;" action="action_backup.php">
        <h3><i class="fa fa-download" aria-hidden="true"></i> Sao lưu dữ liệu</h3>
        <i>Thay đổi tên file backup</i><br /><br />
        <input type="text" name="name_file" value="<?php echo $filename;?>" />
        <input name="act" value="lang2" type="hidden" />
        <input type="hidden" value="lang_2" name="func" />
        <input type="submit" value="Thực hiện" class="buttonPro blue" />
    </form>
