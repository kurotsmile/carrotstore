<?php
ini_set('memory_limit', '-1');
$sel_lang = '';
if (isset($_GET['width'])) {
    $sel_lang = $_GET['lang_sel'];
}

function smart_resize_image($file, $string = null, $width = 0, $height = 0, $proportional = false, $output = 'file', $delete_original = true, $use_linux_commands = false, $quality = 100
) {

    if ($height <= 0 && $width <= 0)
        return false;
    if ($file === null && $string === null)
        return false;

    # Setting defaults and meta
    $info = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image = '';
    $final_width = 0;
    $final_height = 0;
    list($width_old, $height_old) = $info;
    $cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
        if ($width == 0)
            $factor = $height / $height_old;
        elseif ($height == 0)
            $factor = $width / $width_old;
        else
            $factor = min($width / $width_old, $height / $height_old);

        $final_width = round($width_old * $factor);
        $final_height = round($height_old * $factor);
    }
    else {
        $final_width = ( $width <= 0 ) ? $width_old : $width;
        $final_height = ( $height <= 0 ) ? $height_old : $height;
        $widthX = $width_old / $width;
        $heightX = $height_old / $height;

        $x = min($widthX, $heightX);
        $cropWidth = ($width_old - $width * $x) / 2;
        $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ($info[2]) {
        case IMAGETYPE_JPEG: $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);
            break;
        case IMAGETYPE_GIF: $file !== null ? $image = imagecreatefromgif($file) : $image = imagecreatefromstring($string);
            break;
        case IMAGETYPE_PNG: $file !== null ? $image = imagecreatefrompng($file) : $image = imagecreatefromstring($string);
            break;
        default: return false;
    }


    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor($final_width, $final_height);
    if (($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG)) {
        $transparency = imagecolortransparent($image);
        $palletsize = imagecolorstotal($image);

        if ($transparency >= 0 && $transparency < $palletsize) {
            $transparent_color = imagecolorsforindex($image, $transparency);
            $transparency = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
            imagefill($image_resized, 0, 0, $transparency);
            imagecolortransparent($image_resized, $transparency);
        } elseif ($info[2] == IMAGETYPE_PNG) {
            imagealphablending($image_resized, false);
            $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
            imagefill($image_resized, 0, 0, $color);
            imagesavealpha($image_resized, true);
        }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


    # Taking care of original, if needed
    if ($delete_original) {
        if ($use_linux_commands)
            exec('rm ' . $file);
        else
            @unlink($file);
    }

    # Preparing a method of providing result
    switch (strtolower($output)) {
        case 'browser':
            $mime = image_type_to_mime_type($info[2]);
            header("Content-type: $mime");
            $output = NULL;
            break;
        case 'file':
            $output = $file;
            break;
        case 'return':
            return $image_resized;
            break;
        default:
            break;
    }

    # Writing image according to type to the output destination and image quality
    switch ($info[2]) {
        case IMAGETYPE_GIF: imagegif($image_resized, $output);
            break;
        case IMAGETYPE_JPEG: imagejpeg($image_resized, $output, $quality);
            break;
        case IMAGETYPE_PNG:
            $quality = 9 - (int) ((0.9 * $quality) / 10.0);
            imagepng($image_resized, $output, $quality);
            break;
        default: return false;
    }

    return true;
}

?>
<div style="float: left;padding: 10px;">
    <form style="float: left;" name="frm_month_act" id="form_loc"
          action="<?php echo $url; ?>/app_my_girl_handling.php" method="get">
        <p>
            <label>Chiều dài:</label>
            <input type="text" value="300" name="width"/>
        </p>

        <p>
            Ngôn ngữ:<br/>
            <select name="lang_sel">
                <?php
                $list_country = mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
                while ($l = mysql_fetch_array($list_country)) {
                    $langsel = $l['key'];
                    ?>
                    <option value="<?php echo $langsel; ?>" <?php if ($sel_lang == $langsel) {
                        echo 'selected="true"';
                    } ?>><?php echo $l['name']; ?></option>';
                    <?php
                }
                ?>
            </select>
        </p>

        <p>
            <label>Chức năng:</label>
            <select name="type">
                <option value="0">Tối ưu kích thước ảnh</option>
                <option value="1">Tối ươu kích thước và Xóa ảnh đại diện không có dữ liệu</option>
            </select>
        </p>

        <p><br/>
            <input type="submit" value="Bắt đầu tối ưu" class="buttonPro blue"/>
            <input type="hidden" value="avatar_user_resize" name="func"/>
        </p>
    </form>

    <?php
    if (isset($_GET['width'])) {
        $sel_lang = $_GET['lang_sel'];
        $width=$_GET['width'];
        $type=$_GET['type'];
        $files = glob('app_mygirl/app_my_girl_' . $sel_lang . '_user/*'); // get all file names

        if($type=='0'){
            echo '<h2>Tối ưu kích thước ảnh</h2>';
        }else{
            echo '<h2>Tối ươu kích thước và Xóa ảnh đại diện không có dữ liệu</h2>';
        }
        foreach ($files as $file) { // iterate files
            if (is_file($file)) {
                $is_resize=true;
                $id_user_file=str_replace(".png","",basename($file));

                if($type=='1'){
                    $query_check_info=mysql_query("SELECT `id_device` FROM `app_my_girl_user_".$sel_lang."` WHERE `id_device` = '$id_user_file' LIMIT 1");
                    if(mysql_num_rows($query_check_info)>0){
                        $is_resize=true;
                        echo 'Tìm thấy dữ liệu  <a  target="_blank" href="'.$url.'/'.$file.'">'.$file.'</a> <a class="buttonPro small" href="http://carrotstore.com/user/'.$id_user_file.'/'.$sel_lang.'" target="_blank">Xem info</a><br/>';
                    }else{
                        $is_resize=false;
                        echo 'Không tìm thấy dữ liệu - <b style="color: red;">Đã xóa file</b> : <a target="_blank" href="'.$url.'/'.$file.'">'.$file.'</a><br/>';
                        unlink($file);
                    }
                }

                if($is_resize==true){
                    $datasize= getimagesize($file);
                    if($datasize[0]>$width||$datasize[1]>$width){
                        smart_resize_image($file,"",300,300,false,'file',true,false,90);
                        echo 'Đã tối ưu kích thước ảnh : <a href="http://carrotstore.com/user/'.$id_user_file.'/'.$sel_lang.'" target="_blank"><img src="'.$url.'/'.$file.'" style="float:left"></a><br/>';
                    }
                }

            }
        }
    }
    ?>
</div>
