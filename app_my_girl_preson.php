<?php
include "app_my_girl_template.php";
$func="add";
$sex="0";
$type_view='0';

class Preson{
    public $icon='';
    public $status1=array();
    public $status2=array();
    public $status3=array();
    public $status4=array();
    public $copyright='';
}
$id_edit="";
$edit_file_icon="";
$edit_file_copyright="";
$os="";
$id_category="";

$edit_file_preson_status1_0="";
$edit_file_preson_status1_1="";
$edit_file_preson_status1_2="";
$edit_file_preson_status1_3="";

$edit_file_preson_status2_0="";
$edit_file_preson_status2_1="";
$edit_file_preson_status2_2="";
$edit_file_preson_status2_3="";

$edit_file_preson_status3_0="";
$edit_file_preson_status3_1="";
$edit_file_preson_status3_2="";
$edit_file_preson_status3_3="";

$edit_file_preson_status4_0="";
$edit_file_preson_status4_1="";
$edit_file_preson_status4_2="";
$edit_file_preson_status4_3="";



if(isset($_POST['func'])){
    $sex=$_POST['sex'];
    $func=$_POST['func'];
    $os=$_POST['os'];
    $id_category=$_POST['category'];
    
    if($func=="add"){
        $preson=new Preson();
        $query_add_preson=mysql_query("INSERT INTO `app_my_girl_preson` (`sex`,`os`) VALUES ('$sex','$os');");
        
        $id_new=mysql_insert_id();
        $target_dir_icon = "app_mygirl/obj_preson/icon_".$id_new.".png";
        
        
        $preson->icon=$url.'/'.$target_dir_icon;
        move_uploaded_file($_FILES["file_preson_icon"]["tmp_name"], $target_dir_icon);
        

        $target_dir_copyright = "app_mygirl/obj_preson/copyright_".$id_new.".png";
        $preson->copyright=$url.'/'.$target_dir_copyright;
        move_uploaded_file($_FILES["file_preson_copyright"]["tmp_name"], $target_dir_copyright);
        
        $file_preson_status1=$_FILES['file_preson_status1']["tmp_name"];
        echo '<strong>Upload status 1</strong>';
        for($i=0;$i<count($file_preson_status1);$i++){
            $file_status=$file_preson_status1[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_new."_1_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status1,$url.'/'.$target_dir_statu);
            }
        }
        echo '<hr/>';
        
        $file_preson_status2=$_FILES['file_preson_status2']["tmp_name"];
        echo '<strong>Upload status 2</strong>';
        for($i=0;$i<count($file_preson_status2);$i++){
            $file_status=$file_preson_status2[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_new."_2_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status2,$url.'/'.$target_dir_statu);
            }
        }
        echo '<hr/>';
        
        $file_preson_status3=$_FILES['file_preson_status3']["tmp_name"];
        echo '<strong>Upload status 3</strong>';
        for($i=0;$i<count($file_preson_status3);$i++){
            $file_status=$file_preson_status3[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_new."_3_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status3,$url.'/'.$target_dir_statu);
            }
        }
        echo '<hr/>';
        
        $file_preson_status4=$_FILES['file_preson_status4']["tmp_name"];
        echo '<strong>Upload status 4</strong>';
        for($i=0;$i<count($file_preson_status4);$i++){
            $file_status=$file_preson_status4[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_new."_4_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status4,$url.'/'.$target_dir_statu);
            }
        }
        echo '<hr/>';
        
        $data=json_encode($preson);
        $query_update_preson=mysql_query("UPDATE `app_my_girl_preson` SET `data` = '$data' , `category`='$id_category' WHERE `id` = '$id_new';");
            
        if(mysql_error()==""){
            echo "Add success!!!";
        }else{
            echo mysql_error();
        }
    }else{
        $id_edit=$_POST["id_edit"];
        $sex=$_POST['sex'];
        

        $preson=new Preson();
        
        $target_dir_icon = "app_mygirl/obj_preson/icon_".$id_edit.".png";
        if($_FILES["file_preson_icon"]["tmp_name"]!=''){
            $preson->icon=$url.'/'.$target_dir_icon;
            move_uploaded_file($_FILES["file_preson_icon"]["tmp_name"], $target_dir_icon);
        }else{
            $preson->icon=$url.'/'.$target_dir_icon;
        }
        
        $target_dir_copyright = "app_mygirl/obj_preson/copyright_".$id_edit.".png";
        if($_FILES["file_preson_copyright"]["tmp_name"]!=''){
            $preson->copyright=$url.'/'.$target_dir_copyright;
            move_uploaded_file($_FILES["file_preson_copyright"]["tmp_name"], $target_dir_copyright);
        }else{
            $preson->copyright=$url.'/'.$target_dir_copyright;
        }
        
        $file_preson_status1=$_FILES['file_preson_status1']["tmp_name"];
        $inp_preson_status1=$_POST['inp_preson_status1'];
        echo '<strong>Upload status 1</strong>';
        for($i=0;$i<count($file_preson_status1);$i++){
            $file_status=$file_preson_status1[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_edit."_1_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status1,$url.'/'.$target_dir_statu);
            }else{
               array_push($preson->status1,$inp_preson_status1[$i]); 
            }
        }
        echo '<hr/>';
        
        $file_preson_status2=$_FILES['file_preson_status2']["tmp_name"];
        $inp_preson_status2=$_POST['inp_preson_status2'];
        echo '<strong>Upload status 2</strong>';
        for($i=0;$i<count($file_preson_status2);$i++){
            $file_status=$file_preson_status2[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_edit."_2_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status2,$url.'/'.$target_dir_statu);
            }else{
               array_push($preson->status2,$inp_preson_status2[$i]); 
            }
        }
        echo '<hr/>';
        
        $file_preson_status3=$_FILES['file_preson_status3']["tmp_name"];
        $inp_preson_status3=$_POST['inp_preson_status3'];
        echo '<strong>Upload status 3</strong>';
        for($i=0;$i<count($file_preson_status3);$i++){
            $file_status=$file_preson_status3[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_edit."_3_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status3,$url.'/'.$target_dir_statu);
            }else{
               array_push($preson->status3,$inp_preson_status3[$i]); 
            }
        }
        echo '<hr/>';
        
        $file_preson_status4=$_FILES['file_preson_status4']["tmp_name"];
        $inp_preson_status4=$_POST['inp_preson_status4'];
        echo '<strong>Upload status 4</strong>';
        for($i=0;$i<count($file_preson_status4);$i++){
            $file_status=$file_preson_status4[$i];
            if($file_status!=''){
                $target_dir_statu = "app_mygirl/obj_preson/status_".$id_edit."_4_".$i.".png";
                move_uploaded_file($file_status, $target_dir_statu);
                echo 'upload file :'.$target_dir_statu;
                array_push($preson->status4,$url.'/'.$target_dir_statu);
            }else{
               array_push($preson->status4,$inp_preson_status4[$i]); 
            }
        }
        echo '<hr/>';
        $data=json_encode($preson);
        $query_update_preson=mysql_query("UPDATE `app_my_girl_preson` SET `data` = '$data',`sex` = '$sex',`os`='$os',`category`='$id_category' WHERE `id` = '$id_edit';");
        echo "<br/>update success!";
    }
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $query_show_edit=mysql_query("SELECT * FROM `app_my_girl_preson` WHERE `id` = '$id_edit' LIMIT 1");
    $arr_data=mysql_fetch_array($query_show_edit);
    $sex=$arr_data['sex'];
    $data_preson=json_decode($arr_data['data']);
    
    $edit_file_icon=$data_preson->icon;
    $edit_file_copyright=$data_preson->copyright;
    
    $edit_file_preson_status1_0=$data_preson->status1[0];
    $edit_file_preson_status1_1=$data_preson->status1[1];
    $edit_file_preson_status1_2=$data_preson->status1[2];
    $edit_file_preson_status1_3=$data_preson->status1[3];
    
    $edit_file_preson_status2_0=$data_preson->status2[0];
    $edit_file_preson_status2_1=$data_preson->status2[1];
    $edit_file_preson_status2_2=$data_preson->status2[2];
    $edit_file_preson_status2_3=$data_preson->status2[3];
    
    $edit_file_preson_status3_0=$data_preson->status3[0];
    $edit_file_preson_status3_1=$data_preson->status3[1];
    $edit_file_preson_status3_2=$data_preson->status3[2];
    $edit_file_preson_status3_3=$data_preson->status3[3];
    
    $edit_file_preson_status4_0=$data_preson->status4[0];
    $edit_file_preson_status4_1=$data_preson->status4[1];
    $edit_file_preson_status4_2=$data_preson->status4[2];
    $edit_file_preson_status4_3=$data_preson->status4[3];
    
    $os=$arr_data['os'];
    $func="edit";
}

if(isset($_GET['type_view'])){
    $type_view=$_GET['type_view'];
}
?>

<form id="form_loc"  method="post" enctype="multipart/form-data" style="width: 1500px;">
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
    <label>Biểu tượng:</label> 
    <input type="file" id="file_radio_icon" name="file_preson_icon" />
    <?php
    if($edit_file_icon!=""){
    ?>
        <img src="<?php echo $edit_file_icon;?>" style="width: 200px;" />
        <input type="hidden" value="<?php echo $edit_file_icon; ?>" name="inp_preson_icon" />
    <?php
    }
    ?>
    </div>

    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Đối tượng:</label> 
    <select name="sex">
        <option value="0" <?php if($sex=='0'){?> selected="true"<?php }?>>Nam</option>
        <option value="1" <?php if($sex=='1'){?> selected="true"<?php }?>>Nữ</option>
    </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 90px;">
    <label>Hệ điều hành:</label> 
    <select name="os">
        <option value="" <?php if($os==''){?> selected="true"<?php }?>>All</option>
        <option value="android" <?php if($os=='android'){?> selected="true"<?php }?>>Android</option>
        <option value="ios" <?php if($os=='ios'){?> selected="true"<?php }?>>Ios</option>
    </select>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <div style="width: 217px;float: left;">
        <label>Trạng thái 1</label>
        <input type="file" id="file_preson_status1" name="file_preson_status1[]" />
        <?php
            if($edit_file_preson_status1_0!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status1_0.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status1_0.'" name="inp_preson_status1[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status1" name="file_preson_status1[]" />
        <?php
            if($edit_file_preson_status1_1!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status1_1.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status1_1.'" name="inp_preson_status1[]"/>';
            }
        ?>       
        <input type="file" id="file_preson_status1" name="file_preson_status1[]" />
        <?php
            if($edit_file_preson_status1_2!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status1_2.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status1_2.'" name="inp_preson_status1[]"/>';
            }
        ?>  
        <input type="file" id="file_preson_status1" name="file_preson_status1[]" />
        <?php
            if($edit_file_preson_status1_3!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status1_3.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status1_3.'" name="inp_preson_status1[]"/>';
            }
        ?>  
        </div>
        
        <div style="width: 217px;float: left;">
        <label>Trạng thái 2</label>
        <input type="file" id="file_preson_status2" name="file_preson_status2[]" />
        <?php
            if($edit_file_preson_status2_0!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status2_0.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status2_0.'" name="inp_preson_status2[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status2" name="file_preson_status2[]" />
        <?php
            if($edit_file_preson_status2_1!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status2_1.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status2_1.'" name="inp_preson_status2[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status2" name="file_preson_status2[]" />
        <?php
            if($edit_file_preson_status2_2!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status2_2.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status2_2.'" name="inp_preson_status2[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status2" name="file_preson_status2[]" />
        <?php
            if($edit_file_preson_status2_3!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status2_3.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status2_3.'" name="inp_preson_status2[]"/>';
            }
        ?>
        </div>
        
        <div style="width: 217px;float: left;">
        <label>Trạng thái 3</label>
        <input type="file" id="file_preson_status3" name="file_preson_status3[]" />
        <?php
            if($edit_file_preson_status3_0!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status3_0.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status3_0.'" name="inp_preson_status3[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status3" name="file_preson_status3[]" />
        <?php
            if($edit_file_preson_status3_1!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status3_1.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status3_1.'" name="inp_preson_status3[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status3" name="file_preson_status3[]" />
        <?php
            if($edit_file_preson_status3_2!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status3_2.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status3_2.'" name="inp_preson_status3[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status3" name="file_preson_status3[]" />
        <?php
            if($edit_file_preson_status3_3!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status3_3.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status3_3.'" name="inp_preson_status3[]"/>';
            }
        ?>
        </div>
        
        <div style="width: 217px;float: left;">
        <label>Trạng thái 4</label>
        <input type="file" id="file_preson_status4" name="file_preson_status4[]" />
        <?php
            if($edit_file_preson_status4_0!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status4_0.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status4_0.'" name="inp_preson_status4[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status4" name="file_preson_status4[]" />
        <?php
            if($edit_file_preson_status4_1!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status4_1.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status4_1.'" name="inp_preson_status4[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status4" name="file_preson_status4[]" />
        <?php
            if($edit_file_preson_status4_2!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status4_2.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status4_2.'" name="inp_preson_status4[]"/>';
            }
        ?>
        <input type="file" id="file_preson_status4" name="file_preson_status4[]" />
        <?php
            if($edit_file_preson_status4_3!=''){
                echo '<img style="width:50px;float:left;" src="'.$edit_file_preson_status4_3.'"/>';
                echo '<input type="hidden" value="'.$edit_file_preson_status4_3.'" name="inp_preson_status4[]"/>';
            }
        ?>
        </div>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;width: 220px;">
        <label>Copyright:</label> 
        <input type="file" id="file_copyright_icon" name="file_preson_copyright" />
        <?php
        if($edit_file_copyright!=""){
        ?>
            <img src="<?php echo $edit_file_copyright;?>" style="width: 200px;" />
            <input type="hidden" value="<?php echo $edit_file_copyright; ?>" name="inp_preson_copyright" />
        <?php
        }
        ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <label>Category</label>
        <?php
        $list_category_pr=mysql_query("SELECT * FROM `app_my_girl_preson_category` ORDER BY `id`");
        ?>
        <select name="category">
            <option value="">none</option>
            <?php while($row_cat=mysql_fetch_array($list_category_pr)){ ?>
            <option value="<?php echo $row_cat['id']; ?>" <?php if($row_cat['id']==$id_category){?>selected="true"<?php }?>><?php echo get_key_lang($row_cat['name'],'vi');?></option>
            <?php }?>
        </select>
        <?php
        mysql_free_result($list_category_pr);
        ?>
    </div>
    
    <div style="display: inline-block;float: left;margin: 2px;">
        <?php if($func=="add"){?>
            <button class="buttonPro blue">Thêm mới</button>
        <?php }else{?>
            <button class="buttonPro blue">Cập nhật</button>
        <?php }?>
        <input type="hidden" name="func" value="<?php echo $func;?>" />
        <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
    </div>
    

</form>
<?php
    $result_all_count=mysql_query("SELECT * FROM `app_my_girl_preson` ORDER BY `id` DESC");  

    if($type_view=='0'){
        $total_records=mysql_num_rows($result_all_count);
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 5;
        $total_page = ceil($total_records / $limit);
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
    
        $result_all_preson=mysql_query("SELECT * FROM `app_my_girl_preson` ORDER BY `id` DESC LIMIT $start, $limit "); 
    }
    
    if($type_view=='0'){
?>
    <div id="form_loc">
    <strong>Trang hiển thị:</strong>
        <?php
            for($i=1;$i<=$total_page;$i++){
                if($i==$current_page){
                    echo '<a href="'.$url.'/app_my_girl_preson.php?page='.$i.'" class="buttonPro small">'.$i.'</a>';
                }else{
                    echo '<a href="'.$url.'/app_my_girl_preson.php?page='.$i.'" class="buttonPro small blue">'.$i.'</a>';
                }
            }
        ?>
          <?php echo $limit.'/'.$total_records;?> Nhân vật
    </div>
<?php }?>
    
    <div id="form_loc">
        <div style="display: inline-block;float: left;margin: 2px;">
            <a href="<?php echo $url;?>/app_my_girl_preson_category.php" class="buttonPro small blue">Category</a>
        </div>
    </div>
    
    <div id="form_loc">
        <div style="display: inline-block;float: left;margin: 2px;">
        <strong>Kiểu hiển thị:</strong>
            <?php if($type_view=='0'){?>
            <a href="<?php echo $url;?>/app_my_girl_preson.php?type_view=1" class="buttonPro small blue">Dạng bản</a>
            <?php }else{?>
            <a href="<?php echo $url;?>/app_my_girl_preson.php?type_view=0" class="buttonPro small blue">Dạng lưới</a>
            <?php }?>
        </div>
    </div>
<?php
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $delete_effect=mysql_query("DELETE FROM `app_my_girl_preson` WHERE ((`id` = '$id_del'));");
    echo "Delete success ! (".$id_del.")";
    $filename = 'app_mygirl/obj_preson/icon_'.$id_del.'.png';
    if (file_exists($filename)) {
        unlink($filename);
    }
    
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_1_0.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_1_1.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_1_2.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_1_3.png';
    if (file_exists($filename)) {unlink($filename);}
    

    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_2_0.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_2_1.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_2_2.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_2_3.png';
    if (file_exists($filename)) {unlink($filename);}
    
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_3_0.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_3_1.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_3_2.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_3_3.png';
    if (file_exists($filename)) {unlink($filename);}
    
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_4_0.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_4_1.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_4_2.png';
    if (file_exists($filename)) {unlink($filename);}
    $filename = 'app_mygirl/obj_preson/status_'.$id_del.'_4_3.png';
    if (file_exists($filename)) {unlink($filename);}
    
    $filename = "app_mygirl/obj_preson/copyright_".$id_del.".png";
    if (file_exists($filename)) {
        unlink($filename);
    }
    
    echo "<strong>xóa thành công !</strong>";
}

if($type_view=='0'){
?>
    <table>
    <tr>
        <th style="width: 18px;">Id</th>
        <th>Biểu tượng</th>
        <th>Dữ liệu</th>
        <th>Giới tính</th>
        <th>Bản quyền</th>
        <th>Hệ điều hành</th>
        <th>Chuyên mục</th>
        <th style="width: 100px;">Thao tác</th>
    </tr>
    <?php
    while($row=mysql_fetch_array($result_all_preson)){
    $data_preson=json_decode($row['data']);
    ?>
        <tr>
            <td><?php echo $row[0];?></td>
            <td><img src="<?php echo $data_preson->icon;?>"/></td>
            <td>
            <?php 
                
                echo "status 1:";
                for($i=0;$i<count($data_preson->status1);$i++){
                    $str=$data_preson->status1[$i];
                    echo '<img src="'.$str.'" style="width:50px;" />';
                }
                echo "<hr/>";
                echo "status 2:";
                for($i=0;$i<count($data_preson->status2);$i++){
                    $str=$data_preson->status2[$i];
                    echo '<img src="'.$str.'" style="width:50px;" />';
                }
                echo "<hr/>";
                
                echo "status 3:";
                for($i=0;$i<count($data_preson->status3);$i++){
                    $str=$data_preson->status3[$i];
                    echo '<img src="'.$str.'" style="width:50px;" />';
                }
                echo "<hr/>";
                
                echo "status 4:";
                for($i=0;$i<count($data_preson->status4);$i++){
                    $str=$data_preson->status4[$i];
                    echo '<img src="'.$str.'" style="width:50px;" />';
                }
                echo "<hr/>";
            ?>
            </td>
            <td>
            <?php 
                if($row['sex']=='0'){
                    echo 'nam';
                }else{
                    echo 'nữ';
                }
            ?>
            </td>
            <td>
                <?php if($data_preson->copyright!=''){?>
                    <img  src="<?php echo $data_preson->copyright;?>" />
                <?php }?>
            </td>
            <td>
                <?php
                    if($row['os']==''){
                        echo 'Tất cả';
                    }else{
                        echo $row['os'];
                    }
                ?>
            </td>
            <td>
                <?php
                    $id_row=$row['category'];
                    $get_cat=mysql_query("SELECT `name` FROM `app_my_girl_preson_category` WHERE `id` = '$id_row' LIMIT 1");
                    if(mysql_num_rows($get_cat)>0){
                        $data_cat=mysql_fetch_array($get_cat);
                        echo get_key_lang($data_cat['name'],'vi');
                        mysql_free_result($get_cat);
                    }else{
                        if($id_row==""){
                            echo "none";
                        }else{
                            echo $id_row;
                        }
                    }
                ?>
            </td>
            <td>
                <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_preson.php';?>?edit=<?php echo $row['id'];?>">Sửa</a>
                <a class="buttonPro small red" href="<?php echo $url.'/app_my_girl_preson.php';?>?del=<?php echo $row['id'];?>">Xóa</a>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
<?php 
}else{
    echo '<div style="width:100%;float:left">';
    while($row=mysql_fetch_array($result_all_count)){
    $data_preson=json_decode($row['data']);    
    ?>
    <div class="box_icon">
    <img src="<?php echo $data_preson->icon;?>"/>
    <a class="buttonPro small orange" href="<?php echo $url.'/app_my_girl_preson.php';?>?edit=<?php echo $row['id'];?>&type_view=1">Sửa</a>
    </div>
    <?php 
    }
    echo '</div>';
}?>