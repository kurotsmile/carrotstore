<?php
header('Access-Control-Allow-Origin: *');
include "config.php";
$uploaddir = 'data_temp/';
$path = $_FILES['file_upload_sever']['tmp_name'];
$ext = $_REQUEST['extra'];
$uploadfile=$uploaddir.basename(md5(date("Y/m/d").''.rand(0,1000))).'.'.$ext;

Class Data_Response{
    public $url='';
    public $name_file='';
    public $ext='';
    public $error='';
}

$data_response=new Data_Response();
$data_response->name_file=$_FILES['file_upload_sever']['name'];
$data_response->ext=$ext;

if (move_uploaded_file($path, $uploadfile)) {
    $data_response->url=$url.'/'.$uploadfile;
} else {
    $data_response->error='Tải lên không thành công!';
}

echo json_encode($data_response);
?>