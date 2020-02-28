<?php
$disk_free = disk_free_space('/');
$disk_total = disk_total_space('/');
$disk_used = $disk_total - $disk_free;
function format_filesize($B, $D=2){
    $S = 'kMGTPEZY';
    $F = floor((strlen($B) - 1) / 3);
    return sprintf("%.{$D}f", $B/pow(1024, $F)).' '.@$S[$F-1].'B';
}
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div style="float: left;width: 100%;text-align: center">
    <div style="float: left;padding: 10px;width: 100%">
        <canvas id="myChart_task" style="position: static;float: left;" width="300" height="40"></canvas>
        <script>
            var ctx2 = document.getElementById("myChart_task");
            var myChart2 = new Chart(ctx2, {
                type: 'doughnut',
                data: {
                    labels: ['Đã dùng <?php echo format_filesize($disk_used); ?>','Còn Trống <?php echo format_filesize($disk_free); ?>'],
                    datasets: [{
                        data: [<?php echo $disk_used;?>, <?php echo $disk_free;?>],
                        backgroundColor: ['orange','gray']
                    }]
                }
            });
        </script>

    </div>
    <p>
        Máy chủ có tổng dung lượng <b><?php echo format_filesize($disk_total); ?></b>
    </p>
</div>

<style>
    .box_trash{
        float: left;
        margin: 3px;
        padding: 5px;
        background-color: #C4E9FD;
        border: solid #74CBFA;
        color: black;
    }
</style>
<?php
$dir_qr_account='phpqrcode/img_account';
$dir_qr_product='phpqrcode/img_product';
$dir_qr_login='phpqrcode/img_login';
$dir_qr_music='phpqrcode/img';
$dir_qr_link='phpqrcode/img_link';

if(isset($_GET['delete_trash'])){
    $type_delete_trash=$_GET['delete_trash'];
    if($type_delete_trash=='1'){
        echo show_alert("Đã xóa các tệp ảnh rác Qr",'alert');
        $files = glob($dir_qr_account.'/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file)){
                echo $file.'<br/>';
                unlink($file); // delete file
            }
        }
        echo '<hr/>';
        $files = glob($dir_qr_product.'/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file)){
                echo $file.'<br/>';
                unlink($file); // delete file
            }
        }
        echo '<hr/>';
        $files = glob($dir_qr_login.'/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file)){
                echo $file.'<br/>';
                unlink($file); // delete file
            }
        }
        echo '<hr/>';
        $files = glob($dir_qr_music.'/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file)){
                echo $file.'<br/>';
                unlink($file); // delete file
            }
        }
        echo '<hr/>';
        $files = glob($dir_qr_link.'/*'); // get all file names
        foreach($files as $file){ // iterate files
            if(is_file($file)){
                echo $file.'<br/>';
                unlink($file); // delete file
            }
        }
    }
}
?>

<a href="<?php echo $url;?>/app_my_girl_handling.php?func=disk_capacity&delete_trash=1" class="box_trash">
    <i class="fa fa-qrcode" aria-hidden="true"></i>
    <strong>Giải phóng các tệp ảnh QR để gia tăng dung lượng trống cho ổ đĩa</strong><br />
    <?php
    $fi_qr_account = new FilesystemIterator($dir_qr_account, FilesystemIterator::SKIP_DOTS);
    $fi_qr_product = new FilesystemIterator($dir_qr_product, FilesystemIterator::SKIP_DOTS);
    $fi_qr_login = new FilesystemIterator($dir_qr_login, FilesystemIterator::SKIP_DOTS);
    $dir_qr_music = new FilesystemIterator($dir_qr_music, FilesystemIterator::SKIP_DOTS);
    $dir_qr_link = new FilesystemIterator($dir_qr_link, FilesystemIterator::SKIP_DOTS);
    printf("Có %d ảnh QR của tài khoản", iterator_count($fi_qr_account)); echo '<br/>';
    printf("Có %d ảnh QR của sản phẩm", iterator_count($fi_qr_product)); echo '<br/>';
    printf("Có %d ảnh QR của đăng nhập", iterator_count($fi_qr_login)); echo '<br/>';
    printf("Có %d ảnh QR của Âm nhạc", iterator_count($dir_qr_music)); echo '<br/>';
    printf("Có %d ảnh QR của Liên kết", iterator_count($dir_qr_link)); echo '<br/>';
    ?>
</a>

<div class="box_trash">
    <ul>
        <li><strong>Danh sách cả máy chủ lưu trữ dữ liệu khác:</strong></li>
    <?php
    for($i=0;$i<count($data_app->arr_sever_upload);$i++){
        echo '<li><a   target="_blank" href="'.$data_app->arr_sever_upload[$i]->url_home.'">'.$data_app->arr_sever_upload[$i]->name.'</a></li>';
    }
    ?>
    </ul>
</div>