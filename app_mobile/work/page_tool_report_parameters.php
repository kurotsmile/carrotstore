<?php
include "page_template.php";
$rp_key = '';
$rp_name = '';
$rp_url_action = '';
$rp_note = '';
$rp_view_btn = '';
$rp_type = 'add';
$rp_price='1000';

if (isset($_GET['key'])) {
    $rp_key = $_GET['key'];
    $query_data = mysqli_query($link,"SELECT * FROM `work_report_parameters` WHERE `key` = '$rp_key' LIMIT 1");
    $data_rp = mysqli_fetch_array($query_data);
    $rp_name = $data_rp['name'];
    $rp_url_action = $data_rp['url_action'];
    $rp_view_btn = $data_rp['view_btn'];
    $rp_note = $data_rp['note'];
    $rp_price=$data_rp['price'];
    $rp_type = 'update';
}
?>
<div style="float: left;padding: 10px;">
    <div class="box_form_add_chat" style="width: 100%;">
        <div class="row line">
            <strong><i class="fas fa-cog"></i> Thêm mới tham số báo cáo</strong>
            <br/>
        </div>
        <?php
        if (isset($_POST['key'])) {
            $rp_key = $_POST['key'];
            $rp_name = $_POST['name'];
            $rp_url_action = $_POST['url_action'];
            $rp_note = $_POST['note'];
            $rp_view_btn = $_POST['view_btn'];
            $rp_type = $_POST['rp_type'];
            $rp_price=$_POST['rp_price'];
            if ($rp_type == 'add') {
                $query_add_parameters = mysqli_query($link,"INSERT INTO `work_report_parameters` (`key`, `name`, `url_action`, `note`,`view_btn`,`price`) VALUES ('$rp_key', '$rp_name', '$rp_url_action', '$rp_note','$rp_view_btn','$rp_price');");
                echo alert('Thêm mới tham số báo cáo thành công!', 'alert');
                $rp_key = '';
                $rp_name = '';
                $rp_url_action = '';
                $rp_note = '';
                $rp_view_btn = '';
            } else {
                $query_updateparameters = mysqli_query($link,"UPDATE `work_report_parameters` SET `key` = '$rp_key', `name` = '$rp_name', `url_action` = '$rp_url_action', `note` = '$rp_note', `view_btn` = '$rp_view_btn' ,`price`='$rp_price' WHERE `key` = '$rp_key'  LIMIT 1;");
                echo alert('Cập nhật tham số báo cáo thành công!', 'alert');
            }
        }
        ?>

        <form method="post" name="frm_report_parameters" style="width: 500px;padding: 10px;" action="">
            <div class="row line">
                <label>id (kiểu chữ)</label>
                <input type="text" name="key" value="<?php echo $rp_key; ?>">
            </div>

            <div class="row line">
                <label>Tên chức năng</label>
                <input type="text" name="name" value="<?php echo $rp_name; ?>">
            </div>

            <div class="row line">
                <label>Tên nút xem chi tiết</label>
                <input type="text" name="view_btn" value="<?php echo $rp_view_btn; ?>">
            </div>


            <div class="row line">
                <label>Url xem chi tiết</label>
                <textarea name="url_action" style="width: 350px;height: 100px"><?php echo $rp_url_action; ?></textarea>
                <br/>
                <i>Các tham số truyền vào url <b>{id}</b> và <b>{lang}</b></i>
            </div>

            <div class="row line">
                <label>Ghi chú</label>
                <textarea name="note" style="width: 350px;height: 100px"><?php echo $rp_note; ?></textarea>
            </div>

            <div class="row line">
                <?php
                if ($rp_type == 'add') {
                    ?>
                    <input type="submit" value="Thêm mới" class="buttonPro blue"/>
                    <?php
                } else {
                    ?>
                    <input type="submit" value="Cập nhật" class="buttonPro blue"/>
                    <?php
                }
                ?>
                <input type="hidden" name="rp_type" value="<?php echo $rp_type; ?>">
            </div>

            <div class="row line">
                <label>Giá</label>
                <input type="text" name="rp_price" value="<?php echo $rp_price; ?>">
            </div>

        </form>
    </div>
</div>

<div style="float: left;padding: 10px;">
    <div class="box_form_add_chat" style="width: 100%;">
        <div class="row line">
            <strong><i class="fas fa-cog"></i> Danh sách các tham số đã thêm vào</strong>
            <br/>
        </div>

        <div class="row line">
            <table>
                <tr>
                    <th>Từ khóa</th>
                    <th>Tên</th>
                    <th>Tên nút xem chi tiết</th>
                    <th>Liên kết chi tiết</th>
                    <th>Ghi chú</th>
                    <th>Giá</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                $query_list_parameters = mysqli_query($link,"SELECT * FROM `work_report_parameters`");
                while ($row = mysqli_fetch_array($query_list_parameters)) {
                    ?>
                    <tr>
                        <td><?php echo $row['key']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['view_btn']; ?></td>
                        <td><?php echo $row['url_action']; ?></td>
                        <td><?php echo $row['note']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a href="<?php echo $url; ?>/?page_show=tool_report_parameters&key=<?php echo $row['key']; ?>"
                               class="buttonPro small yellow"><i class="fas fa-edit" aria-hidden="true"></i> Sửa</a>
                            <a class="buttonPro small red"><i class="fas fa-trash-alt" aria-hidden="true"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>