<?php
include "page_template.php";
?>

<div class="box_form_add_chat" style="width: 500;margin: 3px;" >
    <div class="row line">
        <strong><i class="fas fa-cog"></i> Lỗi hệ thống làm việc</strong>
        <br />
    </div>

    <?php
    if(isset($_POST['act'])){
        if(is_file('error_log')){
            unlink('error_log');
            echo '<strong>Xóa lỗi thành công</strong>';
        }
    }
    ?>
    <form action="<?php echo  $url;?>/?page_show=tool_error" method="post">
    <textarea style="height: 200px;width: 100%;float: left;">
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
            <input type="hidden" name="act" value="delete" />
            <input type="submit" value="Xóa lịch sử lỗi" class="buttonPro red"/>
            <a href="<?php echo $url;?>/?page_show=tool_error" class="buttonPro yellow"><i class="fas fa-sync" aria-hidden="true"></i> Làm mới</a>
        </div>
    </form>
</div>
