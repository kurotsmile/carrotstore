<?php

function remote_file_exists($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); # handles 301/2 redirects
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if( $httpCode == 200 ){return true;}
}

function downloadUrlToFile($url, $outFileName)
{   
    if(is_file($url)) {
        copy($url, $outFileName); 
    } else {
        $options = array(
          CURLOPT_FILE    => fopen($outFileName, 'w'),
          CURLOPT_TIMEOUT =>  28800,
          CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}

$cur_link=$url.'/admin/?page_view=page_overview&sub_view=file';
$filename="info_syn_file.txt";

$id_view=0;
$lang_view='vi';
$is_auto_next=0;

if(isset($_GET['id'])){
    $id_view=$_GET['id'];

    $syn_file = fopen($filename, "w");
    $arr_info=array($lang_view,$id_view);
    $txt_file=json_encode($arr_info);
    fwrite($syn_file, $txt_file);
    fclose($syn_file);
    $is_auto_next=1;
}else{
    
    if (file_exists($filename)) {
        $syn_file=fopen($filename, "r");
        $content_file=fread($syn_file ,filesize($filename));
        $data_syn=json_decode($content_file);
        $id_view=$data_syn[1];
        $lang_view=$data_syn[0];
        echo '<p>';
        echo '<strong>Tệp đã đồng bộ hóa gần đây</strong><br/>';
        echo 'Quốc gia:'.$lang_view.'<br/>';
        echo 'Id đã lấy:'.$id_view.'<br/>';
        echo '</p>';
        fclose($syn_file);
    } else {
        $id_view=0;
        $lang_view='vi';
    }
    $is_auto_next=0;
}


$query_chat=mysqli_query($link,"SELECT `id`, `chat`, `effect`, `file_url` FROM carrotsy_virtuallover.`app_my_girl_$lang_view` where `id`='$id_view' LIMIT 1");
if($query_chat){
    $data_audio_chat=mysqli_fetch_assoc($query_chat);
    $path_create_file='../app_mygirl/app_my_girl_'.$lang_view.'/'.$id_view.'.mp3';
    $url_create_file=$url.'/app_mygirl/app_my_girl_'.$lang_view.'/'.$id_view.'.mp3';
    if($data_audio_chat!=""){
        $id_next=intval($data_audio_chat['id'])+1;
        $id_prev=intval($data_audio_chat['id'])-1;
        $url_mp3=$url_syn.'/app_mygirl/app_my_girl_'.$lang_view.'/'.$id_view.'.mp3';
        $txt_type_icon='';
        if($data_audio_chat['effect']=='2'){
            $txt_type_icon='<i class="fa fa-music" aria-hidden="true"></i>';
        }else{
            $txt_type_icon='<i class="fa fa-commenting" aria-hidden="true"></i>';
        }
        echo '<ul>';
        echo '<strong>'.$txt_type_icon.' Đối tượng đang kiểm tra có tệp cần đồng bộ</strong><br/>';
        echo '<li>ID:<a target="_blank" href="'.$url.'/app_my_girl_update.php?id='.$id_view.'&lang='.$lang_view.'">'.$id_view.'</a></li>';

        echo '<li>Lang:'.$lang_view.'</li>';
        if($data_audio_chat['chat']!='') echo '<li>Nội dung:'.$data_audio_chat['chat'].'</li>';
        if(remote_file_exists($url_mp3)){
            echo '<li>Tệp tin đích: <a href="'.$url_mp3.'" target="_blank">'.$url_mp3.'</a></li>';
            downloadUrlToFile($url_mp3,$path_create_file);
        }else{
            if($data_audio_chat['file_url']!='');{
                if(remote_file_exists($data_audio_chat['file_url'])){
                    echo '<li>Tệp tin đích ở máy chủ khác: <a href="'.$data_audio_chat['file_url'].'" target="_blank">'.$data_audio_chat['file_url'].'</a></li>';
                    downloadUrlToFile($data_audio_chat['file_url'],$path_create_file);
                }
            }
        }

        if(file_exists($path_create_file)){
            echo '<li><i class="fa fa-check-circle" aria-hidden="true"></i> Tệp tin đã đồng bộ: <a href="'.$url_create_file.'" target="_blank">'.$url_create_file.'</a></li>';
        }
        echo '</ul>';

    }else{
        echo 'Không có đối tượng với id :'.$id_view;
        $id_next=intval($id_view)+1;
        $id_prev=intval($id_view)-1;
        if(file_exists($path_create_file)){
            unlink($path_create_file);
            echo '<li><i class="fa fa-check-circle" aria-hidden="true"></i> Đã xóa tệp tin: '.$url_create_file.'</li>';
        }
    }
}


?>

<a class="buttonPro small blue" href="<?php echo  $cur_link;?>"><i class="fa fa-pause" aria-hidden="true"></i> Dừng</a>
<a class="buttonPro small blue" href="<?php echo  $cur_link.'&id='.$id_prev;?>"><i class="fa fa-step-forward" aria-hidden="true"></i> Về trước</a>
<a class="buttonPro small blue" href="<?php echo  $cur_link.'&id='.$id_next;?>"><i class="fa fa-step-forward" aria-hidden="true"></i> Tiếp tục</a>

<?php
if($is_auto_next==1){
?>
<script>
$(document).ready(function(){
    setTimeout(function(){ window.location.href = "<?php echo  $cur_link.'&id='.$id_next;?>"; }, 2500);
});
</script>
<?php
}
?>