<h3>Xem lỗi hệ thống</h3>
<?php
if(isset($_GET['func'])){
    if(is_file('error_log')){
        unlink('error_log');
        echo '<strong>Xóa lỗi thành công</strong>';
    }
}
?>
<form action="" method="get">
<textarea style="height: 300px;width: 90%;float: left;">
<?php
if(is_file('error_log')){
    $fh = fopen('error_log','r');
    while ($line = fgets($fh)) {
        echo($line);
    }
    fclose($fh);
}

?>
</textarea>

<div style="width: 300px;float: left;">
<input type="hidden" name="view" value="tool" />
<input type="hidden" name="sub_view" value="error" />
<input type="submit" value="Xóa lịch sử lỗi" class="buttonPro red"/>
<input type="hidden" name="func" value="error"  />
</div>
</form>