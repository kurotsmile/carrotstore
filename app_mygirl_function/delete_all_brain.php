<?php
$type_delete='0';
if(isset($_GET['lang'])){
    $type_delete='1';
    $langsel=$_GET['lang'];
}
?>
<div class="contain" style="padding: 20px;">

    <div style="width: 100%;float: left;">
        <form id="form_loc" method="get" action="<?php echo $url; ?>/app_my_girl_handling.php">
        
        <div style="display: inline-block;float: left;margin: 2px;">
            <strong>Xóa tất cả dữ liệu dạy</strong><br />
            <i class="fa fa-trash" aria-hidden="true" style="font-size: 34px;"></i>
        </div>
    
        <div style="display: inline-block;float: left;margin: 2px;">
            <label>Ngôn ngữ:</label> 
            <select name="lang">
            <?php     
            $query_list_lang=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
            while($row_lang=mysql_fetch_array($query_list_lang)){?>
            <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
            <?php }?>
            </select>
        </div>
        
        <div style="display: inline-block;float: left;margin: 2px;">
            <input type="submit" name="delete" value="xóa" class="link_button" />
            <input type="hidden" name="func" value="delete_all_brain" />
        </div>
    
        </form>
    </div>

<?php

if($type_delete=='1'){
    mysql_query("DELETE FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND `tick` != '1'");
    $files = glob('app_mygirl/app_my_girl_'.$langsel.'_brain/*');
    foreach($files as $file){
        if(is_file($file))
        echo "Đã xóa file âm thanh ".$file." <br/>";
        unlink($file);
    }
    $num_delete_brain=mysql_affected_rows();
    echo "Xóa thành công (".$num_delete_brain.") dữ liệu dạy của người dùng ở nước ($langsel) !!!!";
}

if($type_delete=='0'){
    $langsel='';
    $list_country=mysql_query("SELECT * FROM `app_my_girl_country` WHERE `active`='1' AND `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($l=mysql_fetch_array($list_country)){
        $langsel=$l['key'];
        echo '<strong><img src="'.thumb('/app_mygirl/img/'.$langsel.'.png','14').'"/> Xóa dữ liệu của nước '.$l['name'].'</strong><br/>';
        mysql_query("DELETE FROM `app_my_girl_brain` WHERE `langs`='$langsel' AND (`criterion` = '0' OR `approved` = '1')");
        $files = glob('app_mygirl/app_my_girl_'.$langsel.'_brain/*');
        foreach($files as $file){
            if(is_file($file))
            echo "Đã xóa file âm thanh ".$file." <br/>";
            unlink($file);
        }
        echo '<hr/>';
    }
    echo "Xóa thành công tất cả dữ liệu dạy của người dùng, ngoại trừ các câu dạy đúng chuẩn và chờ xuất bản!!!!";
    exit;
}
?>
</div>