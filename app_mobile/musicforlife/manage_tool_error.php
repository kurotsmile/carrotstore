<h3>Xem lỗi hệ thống</h3>
<?php
if(isset($_GET['delete'])){
    if(is_file('error_log')){
        unlink('error_log');
        echo alert('Xóa lỗi thành công','alert');
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
<a href="<?php echo $url;?>manager.php?view=tool&sub=error&delete=1" class="buttonPro red">Xóa tệp tin lỗi</a>
<input type="hidden" name="func" value="error"  />
</div>
</form>