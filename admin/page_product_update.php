<?php
$id_product='';
$path_folder_product='../product_data';
$url_img_icon='';
$type_product='';
$status_product='';
$galaxy_store='';
$window_store='';
$app_store='';
$chplay_store='';
$huawei_store='';
$chrome_store='';
$carrot_store='';
$slug='';
$apk_file='';
$func='add';
$type_view_img='0';

$sel_tap_desc='en';
$msg_alert='';

if(isset($_GET['id'])){
    $id_product=$_GET['id'];
    $func='edit';
}

if(isset($_POST['type_product'])){
    $id_product=$_POST['id_product'];
    $type_product=$_POST['type_product'];
    $galaxy_store=$_POST['galaxy_store'];
    $app_store=$_POST['app_store'];
    $chplay_store=$_POST['chplay_store'];
    $window_store=$_POST['window_store'];
    $huawei_store=$_POST['huawei_store'];
	$chrome_store=$_POST['chrome_store'];
    $carrot_store=$_POST['carrot_store'];
    $status_product=$_POST['status_product'];
    $type_view_img=$_POST['type_view_img'];
    $apk_file=$_POST['apk'];
    $func=$_POST['func'];
    $slug=$_POST['slug_product'];
    
    if($func=='add'){
        $query_add=mysqli_query($link,"INSERT INTO `products` (`type`,`date`, `date_edit`,`galaxy_store`, `app_store`, `chplay_store`,`window_store`,`huawei_store`, `status`,`apk`,`type_view_img`,`carrot_store`,`chrome_store`,`slug`) VALUES ('$type_product',NOW(),NOW(),'$galaxy_store','$app_store','$chplay_store','$window_store','$huawei_store','$status_product','$apk_file','$type_view_img','$carrot_store','$chrome_store','$slug');");
        $id_product=mysqli_insert_id();
        $func='edit';
    }else{
        $query_update=mysqli_query($link,"UPDATE `products` SET `type`='$type_product',`chplay_store`='$chplay_store',`app_store`='$app_store',`galaxy_store`='$galaxy_store',`status`='$status_product',`apk`='$apk_file',`window_store`='$window_store',`huawei_store`='$huawei_store' ,`type_view_img`='$type_view_img', `carrot_store`='$carrot_store' , `slug`='$slug' ,`chrome_store`='$chrome_store' WHERE `id` = '$id_product'");
    }
    
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
    $query_clear_data=mysqli_query($link,"DELETE FROM `product_desc` WHERE `id_product` = '$id_product'");
    while($l=mysqli_fetch_array($list_country)){
        $name_desc='desc_'.$l['key'];
        if($_POST[$name_desc]!=''){
            $desc_data=addslashes($_POST[$name_desc]);
            $query_add=mysqli_query($link,"INSERT INTO `product_desc` (`id_product`, `key_country`, `data`) VALUES ('$id_product', '".$l['key']."', '$desc_data');");
        }
    }
    
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
    $query_clear_data=mysqli_query($link,"DELETE FROM `product_name` WHERE `id_product` = '$id_product'");
    while($l=mysqli_fetch_array($list_country)){
        $name_inp='name_product_'.$l['key'];
        if($_POST[$name_inp]!=''){
            $name_data=addslashes($_POST[$name_inp]);
            $query_add=mysqli_query($link,"INSERT INTO `product_name` (`id_product`, `key_country`, `data`) VALUES ('$id_product', '".$l['key']."', '$name_data');");
        }
    }
    
    if (!file_exists($path_folder_product.'/'.$id_product)) {
        mkdir($path_folder_product.'/'.$id_product, 0777, true);
    }
    
    if(isset($_FILES['icon_product'])){
        $target_file=$path_folder_product.'/'.$id_product.'/icon.jpg';
        if (move_uploaded_file($_FILES["icon_product"]["tmp_name"], $target_file)) {
            $msg_alert.=alert("Tệp tin ". basename( $_FILES["icon_product"]["name"]). " đã được tải lên!",'info');
        } else {
            $msg_alert.=alert("Tải tập tin lên không thành công","error");
        }
    }
    
    if(isset($_FILES['img_desc'])){
		$file_delete='';
		if(isset($_POST['file_delete'])){
			$file_delete=$_POST['file_delete'];
		}
		
		if($file_delete!=''){
			$files = glob($path_folder_product.'/'.$id_product.'/slide/*'); // get all file names
			foreach($files as $file){ // iterate files
			  if(is_file($file)){
				if(in_array($file,$file_delete))
				unlink($file);
			  }
			}
		}
        
        if (!file_exists($path_folder_product.'/'.$id_product.'/slide')) {
            mkdir($path_folder_product.'/'.$id_product.'/slide', 0777, true);
        }
        
        for($i=0;$i<count($_FILES['img_desc']['name']);$i++){
                $target_file=$path_folder_product.'/'.$id_product.'/slide/'.md5(date("Y-m-d H:i:s")).'_'.$i.'.png';
                if (move_uploaded_file($_FILES["img_desc"]["tmp_name"][$i], $target_file)) {
                    $msg_alert.=alert("Tệp tin ". basename( $_FILES["img_desc"]["name"][$i]). " đã được tải lên!","info");
                } else {
                    $msg_alert.=alert("Tải tập tin lên không thành công","error");
                }
        }
    }
    $msg_alert.=alert("Cập nhật thành công!","alert");
    echo mysqli_error($link);
}

if($id_product!=''){
    $query_product=mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id_product' LIMIT 1");
    $data_product=mysqli_fetch_array($query_product);
    $type_product=$data_product['type'];
    $galaxy_store=$data_product['galaxy_store'];
    $app_store=$data_product['app_store'];
    $window_store=$data_product['window_store'];
    $chplay_store=$data_product['chplay_store'];
    $status_product=$data_product['status'];
    $type_view_img=$data_product['type_view_img'];
    $carrot_store=$data_product['carrot_store'];
	$chrome_store=$data_product['chrome_store'];
    $apk_file=$data_product['apk'];
    $slug=$data_product['slug'];
    if(file_exists($path_folder_product.'/'.$id_product.'/icon.jpg')){
        $url_img_icon=$url.'/product_data/'.$id_product.'/icon.jpg';
    }
}



?>
<div style="padding: 10;float: left;">
<h3>Cập nhật và thêm mới sản phẩm</h3>
<?php
if($msg_alert!=''){
    echo $msg_alert;
    echo btn_add_work($id_product,'vi','carrot',$func);
}
?>
<form action="" method="post" enctype="multipart/form-data">
<table style="max-width: 95%;">
    <tr>
        <td>Biểu tượng</td>
        <td>
            <?php
            if($url_img_icon!=''){
            ?>
                <img src="<?php echo $url_img_icon ?>" style="width: 100px;" /><br />
            <?php    
            }
            ?>
            <input type="file" name="icon_product" />
        </td>
    </tr>
    <tr>
        <td>Tên sản phẩm</td>
        <td>
            <?php
            $arr_is_data_name=array();
            $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
            while($l=mysqli_fetch_array($list_country)){
                $key_l=$l['key'];
                if($id_product!=''){
                    $query_data=mysqli_query($link,"SELECT `data` FROM `product_name` WHERE `id_product` = '$id_product' AND `key_country` = '$key_l' LIMIT 1");
                    $data_name=mysqli_fetch_array($query_data);
                    $data_name=$data_name['data'];
                    if($data_name!=''){
                        array_push($arr_is_data_name,$key_l);
                    }
                }else{
                    $data_name='';
                }
            ?>
                <input type="text" class="name_product" id="name_product_<?php echo $key_l;?>" name="name_product_<?php echo $key_l;?>" value="<?php echo $data_name;?>" style="width:100%;display: none;" />
            <?php }?>
            
            <?php
            $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
            while($l=mysqli_fetch_array($list_country)){
                $key_l=$l['key'];
            ?>
                <span id="btn_name_<?php echo $key_l;?>" class="buttonPro small btn_name" onclick="show_tap_lang('<?php echo $key_l;?>');return false;"><?php echo $key_l; ?> - <?php echo $l['name']; ?></span>
            <?php }?>
            
            <?php
            if($id_product!=''){
                if(sizeof($arr_is_data_name)>0){
                    echo '<b>Các ngôn ngữ có dữ liệu:</b>';
                    for($i=0;$i<sizeof($arr_is_data_name);$i++){
                        echo $arr_is_data_name[$i].' ';
                    }
                }
            }
            ?>
        </td>
    </tr>
    <tr>
        <td>Mô tả</td>
        <td>
            <?php
            $arr_is_data=array();
            $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
            while($l=mysqli_fetch_array($list_country)){
                $key_l=$l['key'];
                $query_data=mysqli_query($link,"SELECT `data` FROM `product_desc` WHERE `id_product` = '$id_product' AND `key_country` = '$key_l' LIMIT 1");
                $data_desc=mysqli_fetch_array($query_data);
                $data_desc=$data_desc['data'];
                if($data_desc!=''){
                    array_push($arr_is_data,$key_l);
                }
            ?>
                <textarea class="tap_desc" id="desc_<?php echo $key_l;?>" style="width: 100%;height: 400px;;display: none;" name="desc_<?php echo $key_l;?>"><?php echo $data_desc;?></textarea>
            <?php }?>
            
            <?php
            $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
            while($l=mysqli_fetch_array($list_country)){
                $key_l=$l['key'];
            ?>
                <span id="btn_desc_<?php echo $key_l;?>" class="buttonPro small btn_desc" onclick="show_tap_lang('<?php echo $key_l;?>');return false;"><?php echo $key_l; ?> - <?php echo $l['name']; ?></span>
            <?php }?>
            
            <?php
            if($id_product!=''){
                if(sizeof($arr_is_data)>0){
                    echo '<b>Các ngôn ngữ có dữ liệu:</b>';
                    for($i=0;$i<sizeof($arr_is_data);$i++){
                        echo $arr_is_data[$i].' ';
                    }
                }
            }
            ?>
        </td>
    </tr>
    
    <tr>
        <td>Ảnh mô tả</td>
        <td>
        <?php
            $dirname = "../product_data/".$id_product."/slide";
            $dir = opendir($dirname);
        
            while(false != ($file = readdir($dir)))
                {
                  if(($file != ".") and ($file != "..") and ($file != "index.php"))
                     {
                      echo("<img src='$url/product_data/$id_product/slide/$file' style='width:70px;'/><input type='checkbox' name='file_delete[]' value='../product_data/$id_product/slide/$file' />");
                }
            }
        ?>
        
            <div id="file_slide_contain">
                <span><input  type="file" name="img_desc[]"/> <span class="buttonPro small red" onclick="$(this).parent().remove();"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</span></span>
            </div>
            <span class="buttonPro small blue" onclick="add_file_thumb()"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm trường ảnh</span>
        </td>
    </tr>
    
    <tr>
        <td>Kiểu trưng bày</td>
        <td>
            <select name="type_view_img">
                <option value="0" <?php if($type_view_img=='0'){?>selected="true"<?php }?>>Ảnh mô tả dọc</option>
                <option value="1" <?php if($type_view_img=='1'){?>selected="true"<?php }?>>Ảnh mô tả ngan</option>
            </select>
        </td>
    </tr>
    
    <tr>
        <td>Loại sản phẩm</td>
        <td>
            <select name="type_product">
            <?php
            $query_type_p=mysqli_query($link,"SELECT * FROM `type`");
            while($row_type=mysqli_fetch_array($query_type_p)){
            ?>
                <option value="<?php echo $row_type['id']; ?>" <?php if($type_product==$row_type['id']){ ?>selected="true"<?php }?>><?php echo lang($link,$row_type['id']); ?></option>
            <?php
            }
            ?>
            </select>
        </td>
    </tr>
    
    <tr>
        <td>Liên kết Chplay</td>
        <td>
            <input type="text" name="chplay_store" value="<?php echo $chplay_store;?>"  style="width:100%" />
        </td>
    </tr>
    
    <tr>
        <td>Liên kết Ios</td>
        <td>
            <input type="text" name="app_store" value="<?php echo $app_store;?>" style="width:100%" />
        </td>
    </tr>
    
    <tr>
        <td>Liên kết Samsung store (Galaxy store)</td>
        <td>
            <input type="text" name="galaxy_store" value="<?php echo $galaxy_store;?>"  style="width:100%" />
        </td>
    </tr>
    
    <tr>
        <td>Liên kết Microsoft store (Window)</td>
        <td>
            <input type="text" name="window_store" value="<?php echo $window_store;?>"  style="width:100%" />
        </td>
    </tr>
    
    <tr>
        <td>Liên kết Huawei AppGallery </td>
        <td>
            <input type="text" name="huawei_store" value="<?php echo $huawei_store;?>"  style="width:100%" />
        </td>
    </tr>
	
	<tr>
        <td>Liên kết Chrome store </td>
        <td>
            <input type="text" name="chrome_store" value="<?php echo $chrome_store;?>"  style="width:100%" />
        </td>
    </tr>
    
    <tr>
        <td>Liên kết Carrot store </td>
        <td>
            <input type="text" name="carrot_store" value="<?php echo $carrot_store;?>"  style="width:100%" />
        </td>
    </tr>
    
    <tr>
        <td>Liên kết APK</td>
        <td>
            <input type="text" name="apk" value="<?php echo $apk_file;?>"  style="width:100%" />
        </td>
    </tr>
    
    
    <tr>
        <td>Trạng thái</td>
        <td>
            <select name="status_product">
                <option value="0" <?php if($status_product=='0'){?>selected="true"<?php }?>>Bản nháp</option>
                <option value="1" <?php if($status_product=='1'){?>selected="true"<?php }?>>Xuất bản</option>
            </select>
        </td>
    </tr>
    
    <?php if($id_product!=''){?>
    <tr>
        <td>Lượt xem</td>
        <td><?php echo $data_product['view']; ?></td>
    </tr>
    <tr>
        <td>Ngày đăng</td>
        <td><?php echo $data_product['date']; ?></td>
    </tr>
    
    <tr>
        <td>Ngày sửa</td>
        <td><?php echo $data_product['date_edit']; ?></td>
    </tr>
    <?php }?>
    
    <tr>
        <td>Liên kết seo (slug)</td>
        <td><input value="<?php echo $slug; ?>" name="slug_product" style="width:100%"/></td>
    </tr>
    
    <tr>
        <td>&nbsp;</td>
        <td>
            <input type="hidden" name="id_product" value="<?php echo $id_product;?>" />
            <input type="hidden" name="func" value="<?php echo $func;?>" />
            <?php
            if($func=='edit'){
            ?>
                <input class="buttonPro large blue" type="submit" value="Cập nhật" />
            <?php
            }else{
            ?>
                <input class="buttonPro large green" type="submit" value="Thêm mới" />
            <?php }?>
        </td>
    </tr>
</table>
</form>
</div>
<script src="<?php echo $url;?>/js/ckeditor.js"></script>

<script>

function show_tap_lang(key_lang){
    show_name(key_lang);
    show_desc(key_lang);
}

function show_name(key_lang){
    $(".name_product").hide();
    $("#name_product_"+key_lang).show();
    $(".btn_name").removeClass("yellow");
    $("#btn_name_"+key_lang).addClass("yellow");
}

function show_desc(key_lang){
    for(name in CKEDITOR.instances)
    {
        CKEDITOR.instances[name].destroy(true);
    }
    $(".tap_desc").hide();
    $("#desc_"+key_lang).show();
    $(".btn_desc").removeClass("yellow");
    $("#btn_desc_"+key_lang).addClass("yellow");
    CKEDITOR.replace( 'desc_'+key_lang,{
    language: 'vi',
    customConfig: 'build-config.js',
    });
}

function add_file_thumb(){
    $("#file_slide_contain").append("<span><input  type='file' name='img_desc[]'/> <span class='buttonPro small red' onclick='$(this).parent().remove();'>Xóa</span></span>");
}

$(document).ready(function(){
    show_tap_lang('<?php echo $sel_tap_desc;?>');
});
</script>