<div style="padding: 10px;float: left">
    <strong><i class="fa fa-trash" aria-hidden="true"></i> Xóa những tệp tin sai định dạng</strong><br>
    <span>kiểm tra và xóa những file sai định dạng, những file thừa trong hệ thống</span>
    <ul>
    <?php
    $dir_file_mp3='data_file/mp3';
    $files = glob($dir_file_mp3.'/*'); // get all file names
    foreach($files as $file){ // iterate files
        if(is_file($file)){
            $file_name=basename($file);
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if($ext!='mp3'){
                echo '<li> Đã xóa tệp tin '.$file.' </li>';
                unlink($file);
            }
        }
    }
    ?>
    </ul>
</div>
