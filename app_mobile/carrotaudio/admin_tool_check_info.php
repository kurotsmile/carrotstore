<div style="padding: 10px;float: left">
    <strong><i class="fa fa-list-alt" aria-hidden="true"></i> Hiển thị các tệp tin thiếu tham số âm nhạc</strong><br>
    <ul>
        <?php
        require_once("getid3/getid3.php");
        $list_data_file = mysqli_query($link, "SELECT * FROM `data_file` order by date desc LIMIT 500");

    while($row=mysqli_fetch_array($list_data_file)){
        $file=$row['path'];
        if(is_file($file)){
            $file_name=basename($file);
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if($ext=='mp3'){
                $getID3 = new getID3;
                $ThisFileInfo = $getID3->analyze($file);
                if (isset($ThisFileInfo["id3v2"]["comments"])) {
                    $data_music_tag = $ThisFileInfo["id3v2"]["comments"];
                    if(!isset($data_music_tag["title"][0])) {
                        echo '<a target="_blank" onclick="$(this).css(\'background-color\',\'yellow\')" href="'.$url.'/file/'.$file_name.'" class="item_file">'.$file.'<a/>';
                    }
                }
            }
        }
    }

        ?>
    </ul>
</div>