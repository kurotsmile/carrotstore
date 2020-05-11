<?php
include "config.php";
include "database.php";
$id_user=$_GET['id_user'];
$lang=$_GET['lang'];

$query_account=mysqli_query($link,"SELECT `name`,`address`,`sdt`,`email`,`sex` FROM `app_my_girl_user_$lang` WHERE `id_device` = '$id_user' LIMIT 1");
if(mysqli_num_rows($query_account)>0) {
    $data_user = mysqli_fetch_array($query_account);
}else{
    exit;
}

header('Content-Description: File contact');
header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Content-Type: application/force-download'); // force download dialog
header('Content-Type: application/octet-stream', false);
header('Content-Type: application/download', false);
header('Content-Disposition: attachment; filename="'.$data_user['name'].'.vcf";'); // use the Content-Disposition header to supply a recommended filename
header('Content-Transfer-Encoding: binary');

$path = 'app_mygirl/app_my_girl_'.$lang.'_user/'.$id_user.'.png';
if(file_exists($path)){

}else{
    if($data_user['sex']=='0'){
        $path = "images/avatar_boy.jpg";
    }else{
        $path = "images/avatar_girl.jpg";
    }
}
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);

$txt_contact='BEGIN:VCARD'.PHP_EOL;
$txt_contact.='VERSION:4.0'.PHP_EOL;
$txt_contact.='PRODID:-//'.URL.' llc//'.URL.'//EN'.PHP_EOL;
$txt_contact.='FN;CHARSET=UTF-8:'.$data_user['name'].PHP_EOL;
$txt_contact.='N;CHARSET=UTF-8:'.$data_user['name'].''.PHP_EOL;
if($data_user['email']!='') $txt_contact.='EMAIL;CHARSET=UTF-8;type=HOME,INTERNET:'.$data_user['email'].PHP_EOL;
$txt_contact.='ORG:'.$data_user['name'].PHP_EOL;
if($data_user['sdt']!='') $txt_contact.='TEL;TYPE=HOME,VOICE:'.$data_user['sdt'].PHP_EOL;
$txt_contact.='URL;type=pref:'.URL.'/'.PHP_EOL;
if($data_user['address']!='')$txt_contact.='ADR;CHARSET=UTF-8;TYPE=HOME:;;'.trim($data_user['address']).PHP_EOL;
if($data_user['address']!='')$txt_contact.='ADR;CHARSET=UTF-8;TYPE=WORK:;;'.trim($data_user['address']).PHP_EOL;
$txt_contact.='TITLE;CHARSET=UTF-8:Carrotstore'.PHP_EOL;
$txt_contact.='ROLE;CHARSET=UTF-8:User'.PHP_EOL;
$txt_contact.='URL;type=WORK;CHARSET=UTF-8:'.$url.'/user/'.$id_user.'/'.$lang.''.PHP_EOL;
$txt_contact.='PHOTO;ENCODING=b;TYPE=JPEG:'.base64_encode($data).''.PHP_EOL;
$txt_contact.='END:VCARD'.PHP_EOL;
echo $txt_contact;
?>


