<?php
include "phpmp3.php";
?>
<div class="contain" style="padding: 20px;">
<strong> <i class="fa fa-headphones" style="font-size: 20px;" aria-hidden="true"></i> Tạo âm thanh quá dài, và nối tệp âm thanh!</strong><br />
<?php
$containt_txt='';
$sel_lang='vi';

if(isset($_GET['txt'])){
    $containt_txt=$_GET['txt'];
}

if(isset($_GET['lang'])){
    $sel_lang=$_GET['lang'];
}
if(isset($_GET['containt_txt'])){
$create_audio='0';

if(isset($_GET['create_audio'])){
    $create_audio='1';
    $inp=$_GET['inp'];
}
?>
<form style="width: 90%;" name="frm_month_act" id="form_loc" action="<?php echo $url;?>/app_my_girl_handling.php"  method="get">
<?php
    $containt_txt=$_GET['containt_txt'];
    $length_txt=strlen($containt_txt);
    $sel_lang=$_GET['lang_sel'];
    $count_p=$length_txt/200;
    $arr_new_file=array();
    echo '<ul style="padding:0px;marrgin:0px;">';
    if($create_audio=='0'){
        echo '<li><strong>Sửa các lỗi ký tự và chính tả từng đoạn trước khi tạo tệp âm thanh đầy đủ</strong></li>';
        for($i=0;$i<$count_p;$i++){
            $txt_slip=substr($containt_txt,($i*200),200);
            echo '<li><b>Line '.($i+1).':</b><input type="text" name="inp[]" class="row_aduio_'.$i.'" value="'.$txt_slip.'"/> <a target="_blank" onclick="start_audio(\''.$i.'\');return false;" class="buttonPro small yellow"><i class="fa fa-volume-up" aria-hidden="true"></i> Nghe</a></li>';
        }
    }else{
        for($i=0;$i<sizeof($inp);$i++){
            $txt_slip=$inp[$i];
            echo '<li><b>Line '.($i+1).':</b><input type="text" name="inp[]" class="row_aduio_'.$i.'" value="'.$txt_slip.'"/> <a target="_blank" onclick="start_audio(\''.$i.'\');return false;" class="buttonPro small yellow"><i class="fa fa-volume-up" aria-hidden="true"></i> Nghe</a></li>';
                        $link_audio='http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen='.strlen($txt_slip).'&client=tw-ob&q='.urlencode($txt_slip).'&tl='.$sel_lang;
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
                        if ($status == 200) {
                            file_put_contents(dirname(__FILE__) . '/create_audio/'.$i.'.mp3', $output);
                            echo '<a target="_blank" href="'.$url.'/app_mygirl_function/create_audio/'.$i.'.mp3" class="buttonPro small blue"><i class="fa fa-download" aria-hidden="true"></i></a>';
                            $path = dirname(__FILE__) . '/create_audio/'.$i.'.mp3';
                            array_push($arr_new_file,$path);
                        }
        }
    }
    echo '</ul>';
    if($create_audio=='1'){
        $path = $arr_new_file[0];
        
        $mp3 = new PHPMP3($path);
        
        $newpath = dirname(__FILE__) . '/create_audio/new_file.mp3';
        $mp3->striptags();
        
        for($i=1;$i<sizeof($arr_new_file);$i++){
            $path1 =$arr_new_file[$i];
            $mp3_1 = new PHPMP3($path1);
            $mp3->mergeBehind($mp3_1);
        }
        
        $mp3->striptags();
        $mp3->save($newpath);
    }
    
    if(file_exists('app_mygirl_function/create_audio/new_file.mp3')){
        echo '<a target="_blank" href="'.$url.'/app_mygirl_function/create_audio/new_file.mp3" class="buttonPro blue"><i class="fa fa-download" aria-hidden="true"></i> Tải tệp đã ghép</a>';
    }
?>

<p>
    <?php 
    if($create_audio=='0'){
    ?>
    <input  type="submit" class="buttonPro green" value="Tạo và nối các âm thanh"/>
    <?php }?>
    <input type="hidden" value="<?php echo $containt_txt;?>" name="containt_txt" />
    <input type="hidden" value="1" name="create_audio" />
    <input type="hidden" value="<?php echo $sel_lang; ?>" name="lang_sel" />
     <input type="hidden" value="create_audio" name="func" />
</p>
</form>
<?php
}else{
        $dirname='app_mygirl_function/create_audio';
        $dir = opendir($dirname);
        while(false != ($file = readdir($dir)))
        {
            if(($file != ".") and ($file != "..") and ($file != "index.php"))
            {
                unlink($dirname.'/'.$file);
            }
        }

}
?>

<form name="frm_month_act" id="form_loc" action="<?php echo $url;?>/app_my_girl_handling.php"  method="get">
    <p>
        Nhập nội dung cần tạo tệp âm thanh vào đây:<br />
        <textarea name="containt_txt" style="width: 500px;height: 200px;"><?php echo $containt_txt; ?></textarea>
    </p>
    
    <p>
        Ngôn ngữ:<br />
        <select name="lang_sel" >
        <?php
        $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        while($l=mysql_fetch_array($list_country)){
            $langsel=$l['key'];
            ?>
            <option value="<?php echo $langsel;?>" <?php if($sel_lang==$langsel){ echo 'selected="true"'; } ?>><?php echo $l['name'];?></option>';
            <?php
        }
        ?>
        </select>
    </p>

    <p style="margin-top: 20px;">
        <input type="submit" value="Thực hiện" style="width: 150px !important;" class="buttonPro blue"/>
        <input type="hidden" value="create_audio" name="func" />
    </p>
    

</form>

</div>
<script>
function start_audio(id_audio_row){
    var val=$(".row_aduio_"+id_audio_row).val();
    
    window.open("http://translate.google.com/translate_tts?ie=UTF-8&total=1&idx=0&textlen="+val.length+"&client=tw-ob&q="+val+"&tl=<?php echo $sel_lang;?>");
}
</script>

