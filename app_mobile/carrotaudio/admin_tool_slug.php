<?php
    $query_music=mysqli_query($link,"SELECT `name`,`name_file` FROM `data_file`");
    while($data_music=mysqli_fetch_array($query_music)){
        $name_file=$data_music['name'];
        $id_file=$data_music['name_file'];
        $url_slug=slug_url(vn_to_str($name_file)).uniqid();
        $query_update_slug=mysqli_query($link,"UPDATE `data_file` SET `slug` = '$url_slug' WHERE `name_file` = '$id_file';");
        echo "tạo thành công slug url:".$url_slug." Bài hát id:".$id_file." <br/> ";
    }
    echo '<hr/>';