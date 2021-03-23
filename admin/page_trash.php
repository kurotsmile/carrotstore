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
$dir_qr_account='../phpqrcode/img_account';
$dir_qr_product='../phpqrcode/img_product';
$dir_qr_login='../phpqrcode/img_login';
$dir_qr_music='../phpqrcode/img';
$dir_qr_link='../phpqrcode/img_link';
$dir_qr_piano='../phpqrcode/img_piano';

if(isset($_GET['delete_trash'])){
    $type_delete_trash=$_GET['delete_trash'];
    if($type_delete_trash=='1'){
        echo alert("Đã xóa các tệp ảnh rác Qr",'alert');
        $files = glob($dir_qr_account.'/*'); 
        foreach($files as $file){
          if(is_file($file)){
            echo $file.'<br/>';
            unlink($file);
          }
        }
        echo '<hr/>';
        $files = glob($dir_qr_product.'/*'); 
        foreach($files as $file){
          if(is_file($file)){
            echo $file.'<br/>';
            unlink($file);
          }
        }
        echo '<hr/>';
        $files = glob($dir_qr_login.'/*'); 
        foreach($files as $file){
          if(is_file($file)){
            echo $file.'<br/>';
            unlink($file);
          }
        }
        echo '<hr/>';
        $files = glob($dir_qr_music.'/*'); 
        foreach($files as $file){
          if(is_file($file)){
            echo $file.'<br/>';
            unlink($file);
          }
        }
        echo '<hr/>';
        $files = glob($dir_qr_link.'/*'); 
        foreach($files as $file){
          if(is_file($file)){
            echo $file.'<br/>';
            unlink($file);
          }
        }
        echo '<hr/>';
        $files = glob($dir_qr_piano.'/*'); 
        foreach($files as $file){
          if(is_file($file)){
            echo $file.'<br/>';
            unlink($file);
          }
        }
    }
}
?>

<a href="<?php echo $url_admin;?>/?page_view=page_trash&delete_trash=1" class="box_trash">
 <i class="fa fa-qrcode" aria-hidden="true"></i>
 <strong>Xóa tệp ảnh QR</strong><br /> 
<?php
$fi_qr_account = new FilesystemIterator($dir_qr_account, FilesystemIterator::SKIP_DOTS);
$fi_qr_product = new FilesystemIterator($dir_qr_product, FilesystemIterator::SKIP_DOTS);
$fi_qr_login = new FilesystemIterator($dir_qr_login, FilesystemIterator::SKIP_DOTS);
$dir_qr_music = new FilesystemIterator($dir_qr_music, FilesystemIterator::SKIP_DOTS);
$dir_qr_link = new FilesystemIterator($dir_qr_link, FilesystemIterator::SKIP_DOTS);
$dir_qr_piano = new FilesystemIterator($dir_qr_piano, FilesystemIterator::SKIP_DOTS);
printf("Có %d ảnh QR của tài khoản", iterator_count($fi_qr_account)); echo '<br/>';
printf("Có %d ảnh QR của sản phẩm", iterator_count($fi_qr_product)); echo '<br/>';
printf("Có %d ảnh QR của đăng nhập", iterator_count($fi_qr_login)); echo '<br/>';
printf("Có %d ảnh QR của Âm nhạc", iterator_count($dir_qr_music)); echo '<br/>';
printf("Có %d ảnh QR của Liên kết", iterator_count($dir_qr_link)); echo '<br/>';
printf("Có %d ảnh QR của Piano", iterator_count($dir_qr_piano)); echo '<br/>';
?>
</a>

<a href="<?php echo $url_admin;?>/?page_view=page_trash&delete_trash=2" class="box_trash">
 <i class="fa fa-th-large" aria-hidden="true"></i>
 <strong>Xóa lịch sử tìm kiếm sản phẩm</strong><br /> 
</a>