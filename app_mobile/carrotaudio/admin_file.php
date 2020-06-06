<?php
require("getid3/getid3.php");
$id_file = $_GET['id'];
$data_file = '';
$query_file = mysqli_query($link, "select * from `data_file` where `name_file`='$id_file'");

if (mysqli_num_rows($query_file) > 0) {
    $data_file = mysqli_fetch_array($query_file);
    $url_file_full = $url . '/' . $data_file['path'];
}
?>
<div style="float: left;width: 100%">
    <div style="float: left;padding: 20px;font-size: 13px;">
        <?php
        if ($data_file != '') {
            ?>
            <h2><?php echo $data_file['name_file']; ?></h2>
            <br/>
            Tên hiển thị ở máy chủ:<b><?php echo $data_file['name']; ?></b><br/>
            Đường dẫn:<b><?php echo $data_file['path']; ?></b><br/>
            Loại:<b><?php echo $data_file['type']; ?></b><br/>
            Ngày tải lên:<b><?php echo $data_file['date']; ?></b><br/>
            Dung lượng tệp tin:<b><?php echo format_filesize(filesize($data_file['path'])); ?></b> <br/>
            <br/>
            <audio controls autoplay>
                <source src="<?php echo $url_file_full; ?>" type="audio/ogg">
                <source src="<?php echo $url_file_full; ?>" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <br>
            <?php
            $getID3 = new getID3;
            $ThisFileInfo = $getID3->analyze($data_file['path']);

            if (isset($ThisFileInfo["id3v2"]["comments"])) {
                $data_music_tag = $ThisFileInfo["id3v2"]["comments"];
                if(isset($ThisFileInfo["id3v2"]['APIC'])) {
                    $data_music_pic = $ThisFileInfo["id3v2"]['APIC'];
                    $data_music_pic = $data_music_pic[0];
                }
                ?>
                <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Thông số bài hát</strong>
                <table>
                    <?php
                    foreach ($data_music_tag as $key => $val) {
                        ?>
                        <tr>
                            <td style="color: #0C5597;font-weight: bold"><?php echo $key;?></td>
                            <td>
                                <?php
                                if(is_array($val)){
                                    foreach ($val as $v ){
                                        echo $v;
                                    }
                                }
                            ?>
                            </td>
                        </tr>
                        <?php
                    }

                    if(isset($data_music_pic)){
                    ?>
                    <tr>
                        <td style="color: #0C5597;font-weight: bold">
                            Ảnh đại diện
                        </td>
                        <td>
                          <img src="data:image/gif;base64,<?php echo base64_encode($data_music_pic['data']);?>">;
                        </td>
                    </tr>
                    <?php }?>
                </table>
                <?php
            }
            ?>
            <br/>
            <br/>
            <a class="buttonPro red" href="<?php echo $url; ?>/delete/<?php echo $id_file; ?>"
               onclick="if(!confirm('Bạn có chắc là muốn xóa?')){return false;}"><i class="fa fa-trash-o"
                                                                                    aria-hidden="true"></i> Xóa tệp tin
                này</a>
            <a onclick="check_file('<?php echo $url_file_full; ?>')" class="buttonPro orange"><i class="fa fa-search" aria-hidden="true"></i> Kiểm tra đối tượng sử dụng</a>
            <a class="buttonPro yellow" href="<?php echo $url;?>/edit/<?php echo $id_file; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh sửa thông tin</a>
            <?php
        } else {
            ?>
            <i class="fa fa-file-o" aria-hidden="true"></i> Tệp tin
            <b><?php echo $id_file; ?></b> không còn tồn tại trong hệ thống
            <a href="<?php echo $url;?>/delete/<?php echo $id_file ?>" class="buttonPro red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa dữ liệu tệp tin này</a>
            <a onclick="check_file('<?php echo 'data_file/mp3/'.$id_file; ?>')" class="buttonPro orange"><i class="fa fa-search" aria-hidden="true"></i> Kiểm tra đối tượng sử dụng</a>
            <?php
        }
        ?>
    </div>
</div>
