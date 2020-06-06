<div style="float: left;width: 100%;">
    <div style="float: left;padding: 20px;">
        <i style="font-size: 20px" class="fa fa-trash-o" aria-hidden="true"></i> <strong>Xóa tệp tin</strong><br>
        <?php
        $id_delete = '';
        if (isset($_GET['id'])) {
            $id_delete = $_GET['id'];
            $query_file = mysqli_query($link, "select * from data_file where name_file='$id_delete'");
            $data_file = mysqli_fetch_array($query_file);
            if(file_exists($data_file["path"])) unlink($data_file["path"]);
            $query_delete_file = mysqli_query($link, "DELETE from data_file where name_file='$id_delete'");
            echo msg("Xóa thành công tệp " . $id_delete . " !", "alert");
        } else {
            echo msg("Không tìm thấy tệp tin " . $id_delete . " để xóa !", "error");
        }
        ?>
    </div>
</div>