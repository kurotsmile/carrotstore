<form style="padding: 10px;float: left" action="" method="post">
    <strong><i class="fa fa-check-square-o" aria-hidden="true"></i> Kiểm tra đối tượng qua đường dẫn</strong>
    <span>Kiểm tra một đối tượng tệp tin qua đường dẫn</span>
    <br>
    <i>Nhập đường dẫn tệp mà bạn muốn kiểm tra vào đây:</i><br/>
    <br/>
    <input type="text" name="link">
    <br/><br/>
    <button class="buttonPro orange"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Bắt đầu kiểm tra</button>
</form>

<?php
if(isset($_POST['link'])) {
    $link=$_POST['link'];
    header("location: ".$url."/file/".basename($link));
}
?>