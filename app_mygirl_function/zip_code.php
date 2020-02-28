<div class="contain" style="padding: 20px;">
<strong> <i style="font-size: 20px;" class="fa fa-file-archive-o" aria-hidden="true"></i> Sao lưu mã code gồm các tệp</strong><br />
<form name="frm_month_act" id="form_loc" action="<?php echo $url;?>/app_my_girl_handling.php"  method="get">
<?php
//$more_file='php|js|jpg|css|xml|ini|htaccess|swf|gif|apk|ico';
$more_file='php|js|css|xml|htaccess|swf|ico';
    if(isset($_GET['more_file'])){
        $more_file=$_GET['more_file'];
    }
?>
    <p>
        Nhập thêm các tệp mở rộng muốn sao lưu:<br />
        <input  type="text" name="more_file" value="<?php echo $more_file;?>"/>
    </p>
    
    
    <p style="margin-top: 20px;">
        <input type="submit" value="Thực hiện" style="width: 150px !important;" class="buttonPro blue"/>
        <input type="hidden" value="zip_code" name="func" />
    </p>
</form>
    <?php
    if(isset($_GET['more_file'])){
        $more_file=$_GET['more_file'];
        try
        {
            $a = new PharData('code.tar');
            $a->buildFromDirectory(getcwd(),'/\.('.$more_file.')$/');

            show_alert('Sao lưu code thành công dưới dạng zip','info');
            show_alert('Bấm vào nút này để tảy dữ liệu : <a class="buttonPro small black" href="'.$url.'/download.php?file=code.tar&type=1"><i class="fa fa-download" aria-hidden="true"></i> Tải</a>','alert');
        } 
        catch (Exception $e) 
        {
            show_alert('Lỗi:'.$e,'error');
        }
    }
    
    if(isset($_GET['delete'])){
        unlink("code.tar");
        show_alert('Xóa thành công tập tin sao lưu cũ!','alert');
    }
    ?>
<?php
if(is_file("code.tar")){
    echo '<div style="float:left;width:100%"><a href="'.$url.'/app_my_girl_handling.php?func=zip_code&delete=1" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa tệp sao lưu cũ</a></div>';
}

?>
</div>


