<?php
include "app_my_girl_template.php";
$lang_sel=$_GET['lang'];
$id_device=$_GET['id'];

if(isset($_GET['delete_history'])){
    $query_delete_history=mysqli_query($link,"DELETE FROM `app_my_girl_key` WHERE  `lang` = '$lang_sel'  AND `id_device` = '$id_device' ");
    if($query_delete_history){
        echo show_alert("Xóa dữ liệu trò chuyện thành công!","alert");
    }else{
        echo show_alert("Xóa dữ liệu trò chuyện không thành công!","error");
    }
    
}

$query_user=mysqli_query($link,"SELECT * FROM `app_my_girl_user_$lang_sel` WHERE `id_device`='$id_device' LIMIT 1");
if($query_user!=false){
            if(mysqli_num_rows($query_user)>0){
                $arr_data=mysqli_fetch_array($query_user);
                
                $filename_avatar= 'app_mygirl/app_my_girl_'.$lang_sel.'_user/'.$id_device.'.png';
                $txt_img_url=URL.'/images/avatar_default.png';
                if (file_exists($filename_avatar)) {
                    $txt_img_url=$filename_avatar;
                } 
                

                
                echo '<h3>'.$arr_data[1].'</h3><br/>';
                echo "<img src='".$txt_img_url."'/>";
                    
                if($arr_data[5]!=''){
                    echo '<p><b>Địa chỉ:</b>'.$arr_data[5].'</p>';
                }
                
                if($arr_data[6]!=''){
                    echo '<p><b>Số điện thoại:</b>'.$arr_data[6].'</p>';
                }
                
                if($arr_data[2]!=''){
                    $txt_sex='Nữ';
                    if($arr_data[2]=='0'){
                      $txt_sex='Nam';  
                    }
                    echo '<p><b>Giới tính:</b>'.$txt_sex.'</p>';
                }
                
                echo '<p><b>Ngày gia nhập</b>:'.$arr_data[3].'</p>';
                echo '<p><b>Lần đăng nhập cuối</b>:'.$arr_data[4].'</p>';
                
                $count_key=mysqli_query($link,"SELECT * FROM `app_my_girl_key` WHERE `id_device` = '$id_device'");
                if(mysqli_num_rows($count_key)>0){
                    echo '<p><b>Lịch sử trò chuyện gần đây:</b><a class="buttonPro small purple" onclick="view_device(\''.$id_device.'\',\''.date('Y-m-d').'\',\''.$lang_sel.'\');return false;">'.mysqli_num_rows($count_key).'</a></p>';
                    
                }
                ?>
                <a href="<?php echo $url;?>/app_my_girl_user_detail.php?id=<?php echo $id_device;?>&lang=<?php echo $lang_sel;?>&delete_history=1" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa lịch sử trò chuyện</a>
                <?php
                $list_chat_history=mysqli_query($link,"SELECT * FROM `app_my_girl_key` WHERE `id_device` = '$id_device'");
                echo '<table>';
                while ($row_chat = mysqli_fetch_array($list_chat_history)) {
                    echo show_row_history_prefab($link,$row_chat);
                }
                echo '</table>';
            }else{
                echo '<h1>Không có</h1>';
            }
}
mysqli_free_result($query_user);