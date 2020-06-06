<?php
error_reporting(E_ERROR | E_PARSE);
function downloadUrlToFile($url, $outFileName)
{
    if(is_file($url)) {
        copy($url, $outFileName);
    } else {
        $options = array(
            CURLOPT_FILE    => fopen($outFileName, 'w'),
            CURLOPT_TIMEOUT =>  28800, // set this to 8 hours so we dont timeout on big files
            CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}

$download='';
if(isset($_GET['download'])){
    $download=$_GET['download'];
    $file_new='voice_'.uniqid().'.mp3';
    downloadUrlToFile($download,'data_temp/'.$file_new);
    downloadUrlToFile($download,'data_temp/'.$file_new);
    downloadUrlToFile($download,'data_temp/'.$file_new);
    downloadUrlToFile($download,'data_temp/'.$file_new);
    header('Content-Description: File Transfer');
    header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
    header('Pragma: public');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Content-Type: application/force-download'); // force download dialog
    header('Content-Type: application/octet-stream', false);
    header('Content-Type: application/download', false);
    header('Content-Disposition: attachment; filename="'.$file_new.'";'); // use the Content-Disposition header to supply a recommended filename
    header('Content-Transfer-Encoding: binary');
    readfile('data_temp/'.$file_new);
    exit;
}

$text='';
if(isset($_GET['txt'])){
    $text=$_GET['txt'];
}

if(isset($_GET['lang'])){
    $langs=$_GET['lang'];
    $text=urlencode($_GET['text']);
    $link_audio="https://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen=".strlen($_GET['text'])."&client=tw-ob&q=$text&tl=$langs";
    $ch = curl_init($link_audio);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    $output = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $file_new='voice_'.uniqid().'.mp3';
    if ($status == 200) {
        file_put_contents('data_temp/'.$file_new, $output);
    }
    header('Location:http://carrotstore.com/data_temp/'.$file_new);
    exit;
    header('Content-Description: File Transfer');
    header('Cache-Control: public, must-revalidate, max-age=0'); // HTTP/1.1
    header('Pragma: public');
    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
    header('Content-Type: application/force-download'); // force download dialog
    header('Content-Type: application/octet-stream', false);
    header('Content-Type: application/download', false);
    header('Content-Disposition: attachment; filename="'.$file_new.'";'); // use the Content-Disposition header to supply a recommended filename
    header('Content-Transfer-Encoding: binary');
    readfile('data_temp/'.$file_new);
    exit;
}
?>

<html>
<head>
    <title>Ăn trộm giọng</title>
    <script src="http://carrotstore.com/js/jquery.js"></script>
</head>
<body>
<form method="post" action="https://speech.openfpt.vn/speech" id="frm">
    <input name="text" value="<?php echo $text;?>" type="text">
    <input name="gender" value="leminh" type="hidden">
    <input name="voice-type" value="new" type="hidden">
    <input name="speed" value="0" type="hidden" >
    <input type="submit">
</form>
<button onclick="get_voice();return false;">Lấy giọng</button>
<script>
    function get_voice(){
        $.ajax({
            url: "https://speech.openfpt.vn/speech",
            type: "post",
            data: $("#frm").serialize(),
            success: function(data, textStatus, jqXHR)
            {
                var obj=JSON.parse(JSON.stringify(data));
                window.location="http://carrotstore.com/voice.php?download="+obj.Url;
            }
        });
    }

    $(document).ready(function () {
        get_voice();
    });
</script>
</body>
</html>