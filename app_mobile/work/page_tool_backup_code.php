<?php
include "page_template.php";
?>

<div class="box_form_add_chat" style="width: 500;margin: 3px;">
    <div class="row line">
        <strong><i class="fas fa-cog"></i> Sao lưu Mã nguồn</strong>
        <br/>
    </div>

    <div class="row line">
        <form name="frm_month_act" id="form_loc" action="" method="post">
            <?php
            $more_file = 'php|js|jpg|css|xml|ini|htaccess|swf|gif|apk|ico|pdf';
            if (isset($_POST['more_file'])) {
                $more_file = $_POST['more_file'];
            }
            ?>
            <p>
                Nhập thêm các tệp mở rộng muốn sao lưu:<br/>
                <input type="text" name="more_file" value="<?php echo $more_file; ?>"/>
            </p>


            <p style="margin-top: 20px;">
                <input type="submit" value="Thực hiện" style="width: 150px !important;" class="buttonPro blue"/>
            </p>
        </form>
        <?php
        if (isset($_POST['more_file'])) {
            $more_file = $_POST['more_file'];
            try {
                $a = new PharData('code.tar');
                $a->buildFromDirectory(getcwd(), '/\.(' . $more_file . ')$/');

                echo alert('Sao lưu code thành công dưới dạng zip', 'info');
                echo alert('Bấm vào nút này để tảy dữ liệu : <a class="buttonPro small black" href="' . $url . '/download.php?file=code.tar"><i class="fa fa-download" aria-hidden="true"></i> Tải</a>', 'alert');
            } catch (Exception $e) {
                echo alert('Lỗi:' . $e, 'error');
            }
        }

        if (isset($_GET['delete'])) {
            unlink("code.tar");
            echo alert('Xóa thành công tập tin sao lưu cũ!', 'alert');
        }
        ?>
        <?php
        if (is_file("code.tar")) {
            echo '<div style="float:left;width:100%"><a href="' . $url . '/?page_show=tool_backup_code&delete=1" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa tệp sao lưu cũ</a></div>';
        }

        ?>
    </div>
</div>
