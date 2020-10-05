<?php
include "page_template.php";
?>

<div style="float: left;width: 100%;">
    <a href="<?php echo $url; ?>?page_show=tool_report_parameters" class="item_tool">
        <i class="fas fa-newspaper" aria-hidden="true"></i>
        <strong>Tham số báo cáo của tác vụ làm việc</strong>
        <span>Thêm tham số khai báo công việc cho các tác vụ</span>
    </a>

    <a href="<?php echo $url; ?>?page_show=tool_error" class="item_tool">
        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        <strong>Xem lỗi hệ thống</strong>
        <span>Xem lỗi hệ thống làm việc để sửa</span>
    </a>

    <a href="<?php echo $url; ?>?page_show=tool_backup_code" class="item_tool">
        <i class="fa fa-code" aria-hidden="true"></i>
        <strong>Sao lưu code</strong>
        <span>Sao lưu mã nguồn của hệ thống làm việc dưới dạng zip</span>
    </a>

    <a href="<?php echo $url; ?>?page_show=tool_backup_database" class="item_tool">
        <i class="fa fa-database" aria-hidden="true"></i>
        <strong>Sao lưu cơ sở dữ liệu</strong>
        <span>Sao lưu cơ sở dữ liệu mysql</span>
    </a>

    <a href="<?php echo $url; ?>?page_show=tool_payroll" class="item_tool">
        <i class="fas fa-donate" aria-hidden="true"></i>
        <strong>Thanh toán lương</strong>
        <span>Thanh toán lương cho các nhân viên</span>
    </a>
</div>
