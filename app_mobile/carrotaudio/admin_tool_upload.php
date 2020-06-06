<div class="box_form_add_chat" style="width: 500;margin: 5px;float: left">
    <?php
    if(isset($_POST['function'])) {
        $target_dir = "data_file/mp3/";
        $name_file = $_FILES["file_data"]["name"];
        $target_file = $target_dir . basename($_FILES["file_data"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $name_new_file=uniqid().uniqid().'.' . $imageFileType;
        $path_new_file = $target_dir.$name_new_file;
        $name_file=addslashes($name_file);

        $uploadOk = 1;

        if ($imageFileType != "mp3") {
            echo msg("Tệp tin không đúng định dạng!", "error");
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo msg("Không có tệp tin tải lên !", "error");
        } else {
            if (move_uploaded_file($_FILES["file_data"]["tmp_name"], $path_new_file)) {
                echo msg("Tải lên tệp tin <b>" . basename($_FILES["file_data"]["name"]) . "</b> Thành công.", "alert");
                mysqli_query($link, "INSERT INTO `data_file` (`name_file`, `type`, `path`, `date`,`name`) VALUES ('$name_new_file', '$imageFileType', '$path_new_file',NOW(),'$name_file')");
            } else {
                echo msg("Tải lên tệp tin thất bại! ".$_FILES["file_data"]["error"], "error");
            }
        }
    }
    ?>

    <form method="POST" name="act_chat_month" style="width: 500px;padding: 10px;" action="" enctype="multipart/form-data">
        <h3><i class="fa fa-upload" aria-hidden="true"></i> Tải lên tệp tin dữ liệu</h3>
        <i>Chọn tệp tin muốn tải lên </i><br/><br/>
        <input type="file" name="file_data" />
        <input type="hidden" name="function" value="upload">
        <input type="submit" value="Thực hiện" class="buttonPro blue"/>
    </form>
</div>
