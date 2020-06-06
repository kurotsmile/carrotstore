<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('post_max_size', '90M');
ini_set('upload_max_filesize', '90M');
header("Access-Control-Allow-Origin: *");
include "config.php";
include "database.php";
include "function.php";

$func = '';
if (isset($_REQUEST['func'])) {
    $func = $_REQUEST['func'];
}

Class Data
{
    public $url = '';
    public $info = '';
    public $list = '';
}

if ($func == 'info') {
    $free_disk = disk_free_space("/");
    $data = new Data();
    $data->info = '<a href="' . $url . '" target="_blank"><img src="'.$url.'/icon.ico"/> Máy chủ còn trống <b>' . format_filesize($free_disk, '2') . '</b> Dung lượng </a> <a class="buttonPro small blue" target="_blank" href="'.$url_admin.'"><i class="fa fa-cloud-upload" aria-hidden="true"></i></a>';
    $query_list_file = mysqli_query($link, "SELECT name_file,path,name from `data_file` order by date desc limit 10");
    $txt_html_list_file = 'Các tập tin đã tải lên gần đây:';
    $txt_html_list_file.='<ul>';
    while ($row = mysqli_fetch_array($query_list_file)) {
        $txt_html_list_file .= '<li><a href="'.$url.'/file/'.$row['name_file'].'" target="_blank">'.$row['name'].'</a> <span class="buttonPro small" onclick="select_file_upload(\''.$url.'/'.$row['path'].'\')"><i class="fa fa-check-circle-o" aria-hidden="true"></i> Chọn</span> <a target="_blank" class="buttonPro small red" onclick="if(!confirm(\'Xác nhận xóa tệp?\')){return false;} $(\'#box_upload\').hide();" href="'.$url.'/delete/'.$row['name_file'].'"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a></li>';
    }
    $txt_html_list_file.='</ul>';
    $txt_html_list_file.='<i><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Các thành viên phát triển cần đảm bảo tính dư thừa dữ liệu cần xóa những tệp tin đã tải lên mà không dùng tới</i>';
    $data->list = $txt_html_list_file;
    echo 'infocallback(' . json_encode($data) . ')';
}

if ($func == 'send_file') {
    $name_file=$_REQUEST['name_file'];
    $send_file = $_REQUEST['file_send'];
    $ext = $_REQUEST['ext'];
    $ext = pathinfo($send_file, PATHINFO_EXTENSION);
    if($ext=="mp3") {
        $name_new_file = basename(md5(date("Y/m/d h:i:sa") . '' .md5( rand(0, 1000)))) . '.' . $ext;
        $path_new = 'data_file/' . $ext . '/' . $name_new_file;
        downloadUrlToFile($send_file, $path_new);
        $data = new Data();
        $data->url = $url . '/' . $path_new;
        $name_file = addslashes($name_file);
        mysqli_query($link, "INSERT INTO `data_file` (`name_file`, `type`, `path`, `date`,`name`) VALUES ('$name_new_file', '$ext', '$path_new',NOW(),'$name_file')");
        echo 'uploadcallback(' . json_encode($data) . ')';
    }
    exit;
}

if ($func == 'move_file') {
    $send_file = $_REQUEST['file_send'];
    $name_file=basename($send_file);
    $ext = pathinfo($send_file, PATHINFO_EXTENSION);
    if($ext=="mp3") {
        $name_new_file = basename(md5(date("Y/m/d h:i:sa") . '' . md5(rand(0, 1000)))) . '.' . $ext;
        $path_new = 'data_file/' . $ext . '/' . $name_new_file;
        downloadUrlToFile($send_file, $path_new);
        $data = new Data();
        $data->url = $url . '/' . $path_new;
        mysqli_query($link, "INSERT INTO `data_file` (`name_file`, `type`, `path`, `date`,`name`) VALUES ('$name_new_file', '$ext', '$path_new',NOW(),'$name_file')");
        echo 'movefilecallback(' . json_encode($data) . ')';
    }
    exit;
}

if($func=='save_avatar_music'){
    $url=$_POST['url'];
    $id_user=$_POST['id_user'];
    $img = 'temp/avatar_music'.$id_user.'.png';


    $ch = curl_init($url);
    $fp = fopen($img, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    curl_close($ch);
    smart_resize_image($img,"",240,240,false,'file',true,false,90);
    echo $img;
    exit;
}