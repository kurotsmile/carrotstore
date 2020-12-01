<?php
include "app_my_girl_template.php";
$edit='';
$fix='';
$delete='';
$show_full='0';

if(isset($_GET['edit'])){
    $edit=$_GET['edit'];
}

if(isset($_GET['fix'])){
    $fix=$_GET['fix'];
}

if(isset($_GET['delete'])){
    $delete=$_GET['delete'];
}

?>
<h3 style="margin-left: 10px;">Quản lý các quốc gia</h3>

<?php
if(isset($_POST['edit'])){
    $edit_key=$_POST['edit'];
    $edit_name=$_POST['name'];
    $country_code=$_POST['country_code'];
    
    $ver0='0';
    $ver1='0';
    $ver2='0';
    $ver3='0';
    $active=0;
    
    if(isset($_POST['ver0'])) $ver0='1';
    if(isset($_POST['ver1'])) $ver1='1';
    if(isset($_POST['ver2'])) $ver2='1';
    if(isset($_POST['ver3'])) $ver3='1';
    if(isset($_POST['active'])) $active=1;
    
    $update_country=mysqli_query($link,"UPDATE `app_my_girl_country` SET `name` = '$edit_name', `country_code`='$country_code' , `ver0`='$ver0' , `ver1`='$ver1' , `ver2`='$ver2' , `ver3`='$ver3' ,`active`=$active WHERE `key` = '$edit_key' LIMIT 1;");
    
    if(isset_file($_FILES['icon'])){
            $target_file = 'app_mygirl/img/'.$edit_key.'.png';
            if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
                echo "Cập nhật biểu tượng ". $target_file. " thành công!";
            } else {
                echo "Cập nhật biểu tượng không thành công!";
            }
    }
    echo "<p>Cập nhật quốc gia <b>".$edit_key."</b> thành công!<br/></p>";
}

if($edit!=''){
    $get_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `key`='$edit'");
    $data_country=mysqli_fetch_array($get_country);
?>
<form id="form_loc"  method="post" enctype="multipart/form-data" action="<?php echo $url;?>/app_my_girl_manager_country.php" >
    <div style="display: inline-block;float: left;margin: 2px;">
        <strong>Cập nhật quốc gia (<?php echo $data_country['key']; ?>)</strong><br />
        <img src="<?php echo thumb('app_mygirl/img/'.$data_country['key'].'.png','20');?>"/>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Trạng thái hoặt động</label><br />
        <input type="checkbox" name="active" <?php if($data_country['active']=='1'){?> checked="on" <?php } ?>  />
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <span style="float: left;width: 100%;">
        <label>Tên gọi quốc tế</label>
        <input type="text" name="name" value="<?php echo $data_country['name']; ?>" />
        </span>
        
        <span style="float: left;width: 100%;">
        <label>Mã code quốc gia</label>
        <input type="text" name="country_code" value="<?php echo $data_country['country_code']; ?>" />
        </span>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Biểu tượng</label>
        <input type="file" name="icon" />
    </div>
    
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Phiên bản ứng dụng triễn khai</label><br />
        <input type="checkbox" style="width: auto;float: none;" name="ver0" <?php if($data_country['ver0']=='1'){?> checked="on" <?php } ?> /> 2D<br />
        <input type="checkbox" style="width: auto;float: none;" name="ver1" <?php if($data_country['ver1']=='1'){?> checked="on" <?php } ?> /> 3D - Onichan<br />
        <input type="checkbox" style="width: auto;float: none;" name="ver2" <?php if($data_country['ver2']=='1'){?> checked="on" <?php } ?> /> 3D - Pro<br/>
        <input type="checkbox" style="width: auto;float: none;" name="ver3" <?php if($data_country['ver3']=='1'){?> checked="on" <?php } ?> /> 3D - App ai
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
            <button class="buttonPro yellow">Cập nhật</button>
            <input type="hidden" name="edit" value="<?php echo $data_country['key']; ?>" />
            <a href="<?php echo $url;?>/app_my_girl_manager_country.php" class="buttonPro blue">Hủy bỏ</a>
    </div>
</form>
<?php }


if($fix!=''){
    function btn_fix($type,$val){
        global  $url;
        $txt='<a class="buttonPro small yellow" href="'.$url.'/app_mygirl_function/fix_country.php?type='.$type.'&val='.$val.'"><i class="fa fa-wrench" aria-hidden="true"></i></a>';
        return $txt;
    }
?>
<div id="form_loc" style="background-color: #eff4f9;" >
<strong><i class="fa fa-wrench" aria-hidden="true"></i> Kiểm tra lỗi khởi tạo quốc gia (<strong><?php echo $fix; ?></strong>)</strong>
<?php

$count_error=0;
$out_error='';
if(!file_exists('app_mygirl/img/'.$fix.'.png')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu biểu tượng ở đường dẫn "app_mygirl/img/'.$fix.'.png" </li>';
}

if(!file_exists('app_mygirl/app_my_girl_'.$fix.'/-3.mp3')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu âm thanh thử giọng nam ở đường dẫn "app_mygirl/app_my_girl_'.$fix.'/-3.mp3" </li>';
}

if(!file_exists('app_mygirl/app_my_girl_'.$fix.'/-2.mp3')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu âm thanh thử giọng nữ ở đường dẫn "app_mygirl/app_my_girl_'.$fix.'/-2.mp3" </li>';
}

if(!is_dir('app_mygirl/app_my_girl_msg_'.$fix.'')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu thư mục msg "app_mygirl/app_my_girl_msg_'.$fix.'" '.btn_fix('folder','app_my_girl_msg_'.$fix).'</li>';
}

if(!is_dir('app_mygirl/app_my_girl_'.$fix.'')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu thư mục chat "app_mygirl/app_my_girl_'.$fix.'" '.btn_fix('folder','app_my_girl_'.$fix).'</li>';
}

if(!is_dir('app_mygirl/app_my_girl_'.$fix.'_user')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu thư mục user "app_mygirl/app_my_girl_'.$fix.'_user" '.btn_fix('folder','app_my_girl_'.$fix.'_user').'</li>';
}

if(!is_dir('app_mygirl/app_my_girl_'.$fix.'_brain')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu thư mục brain "app_mygirl/app_my_girl_'.$fix.'_brain" '.btn_fix('folder','app_my_girl_'.$fix.'_brain').'</li>';
}

if(!is_dir('app_mygirl/app_my_girl_temp_'.$fix.'')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu thư mục temp "app_mygirl/app_my_girl_temp_'.$fix.'" '.btn_fix('folder','app_my_girl_temp_'.$fix).'</li>';
}

if(!is_dir('app_mygirl/app_my_girl_'.$fix.'_img')){
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu thư mục Img "app_mygirl/app_my_girl_'.$fix.'_img" '.btn_fix('folder','app_my_girl_'.$fix.'_img').'</li>';
}

$check_1= mysqli_query($link,'select 1 from `app_my_girl_'.$fix.'` LIMIT 1');
if($check_1=== FALSE)
{
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu bản dữ liệu "app_my_girl_'.$fix.'"</li>';
}

$check_2= mysqli_query($link,'select 1 from `app_my_girl_msg_'.$fix.'` LIMIT 1');
if($check_2=== FALSE)
{
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu bản dữ liệu "app_my_girl_msg_'.$fix.'"</li>';
}

$check_3= mysqli_query($link,'select 1 from `app_my_girl_user_'.$fix.'` LIMIT 1');
if($check_3=== FALSE)
{
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu bản dữ liệu "app_my_girl_user_'.$fix.'"</li>';
}

$check_4= mysqli_query($link,'select 1 from `app_my_girl_'.$fix.'_lyrics` LIMIT 1');
if($check_4=== FALSE)
{
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu bản dữ liệu "app_my_girl_'.$fix.'_lyrics"</li>';
}

$check_5= mysqli_query($link,'select 1 from `app_my_girl_music_data_'.$fix.'` LIMIT 1');
if($check_5=== FALSE)
{
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu bản dữ liệu "app_my_girl_music_data_'.$fix.'"</li>';
}

$check_6= mysqli_query($link,'select 1 from `app_my_girl_video_'.$fix.'` LIMIT 1');
if($check_6=== FALSE)
{
    $count_error++;
    $out_error.='<li><b style="color:red;">Lỗi:</b> thiếu bản dữ liệu "app_my_girl_video_'.$fix.'"</li>';
}

if($count_error==0){
    echo '<br/><i>Không phát hiện lỗi</i>';
}else{
    echo '<ul>'.$out_error.'</ul><br/><i>Phát hiện ('.$count_error.') lỗi</i>';
}
?>
</div>
<?php
}


if($delete!=''){
?>
<div id="form_loc" style="background-color: #eff4f9;" >
<strong><i class="fa fa-trash" aria-hidden="true"></i> Xóa quốc gia (<strong><?php echo $delete; ?></strong>)</strong>
<?php
if(mysqli_query($link,"DROP TABLE `app_my_girl_".$delete."`")){
    echo '<br/><b style="color:red;">Xóa thành công:</b> bản dữ liệu "app_my_girl_'.$delete.'"';
}else{
    echo '<br/><b style="color:blue;">Không tìm thấy:</b> bản dữ liệu "app_my_girl_'.$delete.'" để xóa';
}
if(mysqli_query($link,"DROP TABLE `app_my_girl_msg_".$delete."`")){
    echo '<br/><b style="color:red;">Xóa thành công:</b> bản dữ liệu "app_my_girl_msg_'.$delete.'"';
}else{
    echo '<br/><b style="color:blue;">Không tìm thấy:</b> bản dữ liệu "app_my_girl_msg_'.$delete.'" để xóa';
}
if(mysqli_query($link,"DROP TABLE `app_my_girl_user_".$delete."`")){
    echo '<br/><b style="color:red;">Xóa thành công:</b> bản dữ liệu "app_my_girl_user_'.$delete.'"';
}else{
    echo '<br/><b style="color:blue;">Không tìm thấy:</b> bản dữ liệu "app_my_girl_user_'.$delete.'" để xóa';
}
if(mysqli_query($link,"DROP TABLE `app_my_girl_".$delete."_lyrics`")){
    echo '<br/><b style="color:red;">Xóa thành công:</b> bản dữ liệu "app_my_girl_'.$delete.'_lyrics"';
}else{
    echo '<br/><b style="color:blue;">Không tìm thấy:</b> bản dữ liệu "app_my_girl_'.$delete.'_lyrics" để xóa';
}
if(mysqli_query($link,"DROP TABLE `app_my_girl_field_".$delete."`")){
    echo '<br/><b style="color:red;">Xóa thành công:</b> bản dữ liệu "app_my_girl_field_'.$delete.'"';
}else{
    echo '<br/><b style="color:blue;">Không tìm thấy:</b> bản dữ liệu "app_my_girl_field_'.$delete.'" để xóa';
}
if(mysqli_query($link,"DROP TABLE `app_my_girl_music_data_".$delete."`")){
    echo '<br/><b style="color:red;">Xóa thành công:</b> bản dữ liệu "app_my_girl_music_data_'.$delete.'"';
}else{
    echo '<br/><b style="color:blue;">Không tìm thấy:</b> bản dữ liệu "app_my_girl_music_data_'.$delete.'" để xóa';
}
if(mysqli_query($link,"DROP TABLE `app_my_girl_video_".$delete."`")){
    echo '<br/><b style="color:red;">Xóa thành công:</b> bản dữ liệu "app_my_girl_video_'.$delete.'"';
}else{
    echo '<br/><b style="color:blue;">Không tìm thấy:</b> bản dữ liệu "app_my_girl_video_'.$delete.'" để xóa';
}

$dirname='app_mygirl/app_my_girl_msg_'.$delete;
array_map('unlink', glob("$dirname/*.*"));
if(is_dir($dirname)) rmdir($dirname);

$dirname='app_mygirl/app_my_girl_'.$delete;
array_map('unlink', glob("$dirname/*.*"));
if(is_dir($dirname)) rmdir($dirname);

$dirname='app_mygirl/app_my_girl_'.$delete.'_user';
array_map('unlink', glob("$dirname/*.*"));
if(is_dir($dirname)) rmdir($dirname);

$dirname='app_mygirl/app_my_girl_'.$delete.'_brain';
array_map('unlink', glob("$dirname/*.*"));
if(is_dir($dirname)) rmdir($dirname);

$query_delete=mysqli_query($link,"DELETE FROM `app_my_girl_country` WHERE `key` = '$delete'  LIMIT 1;");
if(file_exists('app_mygirl/img/'.$delete.'.png')){
unlink('app_mygirl/img/'.$delete.'.png');
}
echo '<br/>Xóa thành công quốc gia (<b>'.$delete.'</b>)';
?>
</div>
<?php
}

function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}


function check_show_btn($link,$key_lang,$version,$ver_check){
    global $url;
    $color_btn='';
    $txt_show='';
    $count_data='';
    
    $setting_url_sound_test_sex0='';
    $setting_url_sound_test_sex1='';
    
    $btn_voice_sex_0='';
    $btn_voice_sex_1='';
    $css='';

    
    $query_data_display=mysqli_query($link,"SELECT `data` FROM `app_my_girl_display_lang` WHERE `lang`='".$key_lang."' AND `version`='$ver_check'");
    if(mysqli_num_rows($query_data_display)){
        $data_display=mysqli_fetch_array($query_data_display);
        $data_display=json_decode($data_display['data'],JSON_UNESCAPED_UNICODE);
        $count_data='('.count($data_display).')';
        
        $arr_data=(Array)$data_display;
        if(isset($arr_data['setting_url_sound_test_sex0'])) $setting_url_sound_test_sex0=$arr_data['setting_url_sound_test_sex0'];
        if(isset($arr_data['setting_url_sound_test_sex1'])) $setting_url_sound_test_sex1=$arr_data['setting_url_sound_test_sex1'];
        
        if(is_url_exist($setting_url_sound_test_sex0)){ 
            $btn_voice_sex_0=' <a href="'.$setting_url_sound_test_sex0.'" class="buttonPro small" target="_blank"><i class="fa fa-volume-up" aria-hidden="true"></i> nữ</a>';
        }else{
            $btn_voice_sex_0=' <a href="'.$url.'/app_my_girl_display_value.php?lang='.$key_lang.'&key=setting_url_sound_test_sex0&ver='.$ver_check.'" class="buttonPro red small" target="_blank"><i class="fa fa-volume-off" aria-hidden="true"></i> nữ</a>';
        }
        
        if(is_url_exist($setting_url_sound_test_sex1)){ 
            $btn_voice_sex_1=' <a href="'.$setting_url_sound_test_sex1.'" class="buttonPro small" target="_blank"><i class="fa fa-volume-up" aria-hidden="true"></i> nam</a>';
        }else{
            $btn_voice_sex_1=' <a href="'.$url.'/app_my_girl_display_value.php?lang='.$key_lang.'&key=setting_url_sound_test_sex1&ver='.$ver_check.'" class="buttonPro red small" target="_blank"><i class="fa fa-volume-off" aria-hidden="true"></i> nam</a>';
        }
        
    }else{
        $color_btn='light_blue';
    }
        
    if($version!='0'){
        $txt_show.='<i class="fa fa-check-circle" aria-hidden="true"></i> ';
        $css='style="background-color: #e9ffc8;border-radius: 15px;box-shadow: 2px 2px 2px #e8e6e6"';
    }else{
        $txt_show.='<i class="fa fa-circle-thin" aria-hidden="true"></i> '; 
    }
    
    $txt_show.='<a href="'.$url.'/app_my_girl_display_value.php?lang='.$key_lang.'&ver='.$ver_check.'" class="buttonPro '.$color_btn.' small" title="Bấm vào đây để cập nhật và chỉnh sữa ngôn ngữ hiện thị ở ứng dụng tại quốc gia này!"><i class="fa fa-pencil" aria-hidden="true"></i> '.$count_data.'</a>';
    $txt_show.='<a href="'.$url.'/app_my_girl_display_lang.php?ver='.$ver_check.'" class="buttonPro small"><i class="fa fa-tag" aria-hidden="true"></i></a>';
    return '<td '.$css.'>'.$txt_show.' '.$btn_voice_sex_0.' '.$btn_voice_sex_1.'</td>';
}


?>

<table>
    <tr>
        <th>ID</th>
        <th>Trạng thái</th>
        <th>Biểu tượng</th>
        <th>Từ khóa ngôn ngữ</th>
        <th>Tên gọi quốc tế</th>
        <?php
        if($show_full=='1'){
        ?>
        <th>ver 0 (2d)</th>
        <th>ver 1 (Onichan)</th>
        <th>ver 2 (3d)</th>
        <?php }?>
        <th>Thao tác</th>
    </tr>
    <?php
    $list_country=mysqli_query($link,"SELECT `id`,`key`,`country_code`,`active`,`name`,`ver0`, `ver1`, `ver2`, `ver3` FROM `app_my_girl_country` ORDER BY `id`");
    while($row=mysqli_fetch_assoc($list_country)){
        $c_key=$row['key'];
    ?>
    <tr <?php if($row['active']=='0'){?>style="background-color: #FFD9D9;"<?php }?>>
        <td>
            <?php echo $row['id'];?>
        </td>
            
        <td>
            <?php if($row['active']=='0'){?>
                <i class="fa fa-toggle-off" aria-hidden="true"></i>
            <?php }else{?>
                 <i class="fa fa-toggle-on" aria-hidden="true"></i>
            <?php }?>
        </td>
        <td><img src="<?php echo thumb('app_mygirl/img/'.$row['key'].'.png','20');?>"/></td>
        <td>
            <?php echo $row['key']; ?> | code: <?php echo $row['country_code']; ?>
            <?php
                for($i=0;$i<4;$i++){
                    $query_count_data_lang=mysqli_query($link,"SELECT COUNT(`data`) as c FROM `app_my_girl_display_lang` WHERE `lang` = '".$row['key']."' AND `version` = '$i' LIMIT 1");
                    $data_count=mysqli_fetch_assoc($query_count_data_lang);
                    $count_ver=$data_count['c'];
                    $color_ver='red';
                    $key_ver='ver'.$i;
                    if($row[$key_ver]=='1') $color_ver='green';
                    
                    if($count_ver!="0")
                        echo '<a style="color:'.$color_ver.'" target="_blank" href="'.$url.'/app_my_girl_display_value.php?lang='.$c_key.'&ver='.$i.'"><i class="fa fa-empire" aria-hidden="true"></i></a>';
                    else
                        echo '<a style="color:'.$color_ver.'" target="_blank" href="'.$url.'/app_my_girl_display_value.php?lang='.$c_key.'&ver='.$i.'"><i class="fa fa fa-slideshare" aria-hidden="true"></i></a>';
                }
            ?>
        </td>
        <td><?php echo $row['name']; ?></td>
        <?php
            if($show_full=='1'){
                echo check_show_btn($link,$c_key,$row['ver0'],'0');
                echo check_show_btn($link,$c_key,$row['ver1'],'1');
                echo check_show_btn($link,$c_key,$row['ver2'],'2');
            }
        ?>
        <td>
            <a href="<?php echo $url;?>/app_my_girl_manager_country.php?edit=<?php echo $c_key; ?>" class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cập nhật</a>
            <a href="<?php echo $url;?>/app_my_girl_manager_country.php?fix=<?php echo $c_key; ?>" class="buttonPro small orange" ><i class="fa fa-wrench" aria-hidden="true"></i> Kiểm tra lỗi</a>
            <?php if($data_user_carrot["user_role"]=='admin'){?><a href="<?php echo $url;?>/app_my_girl_manager_country.php?delete=<?php echo $c_key; ?>" class="buttonPro small red"  onclick="return confirm('Có chắc chắn là muốn xóa?');" ><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a><?php }?>
        </td>
    </tr>
    <?php
    }
    ?>
</table>