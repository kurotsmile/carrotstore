<h3>Xem lỗi hệ thống</h3>
<?php
if(isset($_GET['act'])){
    if(is_file('error_log')){
        if(file_exists('error_log'))unlink('error_log');
		if(file_exists('app_mygirl/error_log'))unlink('app_mygirl/error_log');
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
<label style="width:90%;float:left;">Lỗi thư mục app_my_girl</label>
<textarea style="height: 300px;width: 90%;float: left;">
<?php
if(is_file('app_mygirl/error_log')){
    $fh = fopen('app_mygirl/error_log','r');
    while ($line = fgets($fh)) {
        echo($line);
    }
    fclose($fh);
}

?>
</textarea>

<div style="width: 300px;float: left;">
<input type="hidden" name="act" value="delete" />
<input type="submit" value="Xóa lịch sử lỗi" class="buttonPro red"/>
<input type="hidden" name="func" value="error"  />
<a href="<?php echo $url;?>/app_my_girl_handling.php?func=error" class="buttonPro yellow"><i class="fa fa-refresh" aria-hidden="true"></i> Làm mới</a>
</div>
</form>