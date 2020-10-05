<?php
$id_product='';
$path_folder_product='../product_data';
$url_img_icon='';
$type_product='';
$status_product='';
$price_product='';
$slug='';
$func='add';
$type_view_img='0';
$link_youtube='';
$company='';
$link_download='';

$link_store='';
$link_store_name='';
$link_store_icon='';

$sel_tap_desc='en';
$msg_alert='';

if(isset($_GET['id'])){
    $id_product=$_GET['id'];
    $func='edit';
}

if(isset($_POST['type_product'])){
    $id_product=$_POST['id_product'];
    $type_product=$_POST['type_product'];
    $link_youtube=$_POST['link_youtube'];
    $status_product=$_POST['status_product'];
    $type_view_img=$_POST['type_view_img'];
    $func=$_POST['func'];
    $slug=$_POST['slug_product'];
    $price_product=$_POST['price_product'];
    $company=$_POST['company'];
    $link_download='';
    if(isset($_POST['link_download'])){
        $link_download=$_POST['link_download'];
        $link_download=json_encode($link_download);
    }
    
    if($func=='add'){
        $query_add=mysqli_query($link,"INSERT INTO `products` (`type`,`date`, `date_edit`,`status`,`type_view_img`,`link_youtube`,`slug`,`company`,`link_download`,`price`) VALUES ('$type_product',NOW(),NOW(),'$status_product','$type_view_img','$link_youtube','$slug','$company','$link_download','$price_product');");
        $id_product=mysqli_insert_id($link);
        $func='edit';
    }else{
        $query_update=mysqli_query($link,"UPDATE `products` SET `type`='$type_product',`status`='$status_product',`type_view_img`='$type_view_img', `slug`='$slug' ,`link_youtube`='$link_youtube',`company`='$company',`link_download`='$link_download',`price`='$price_product' WHERE `id` = '$id_product'");
    }
    
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
    
    while($l=mysqli_fetch_array($list_country)){
        $lang_data=$l['key'];
        $name_desc='desc_'.$l['key'];
        $query_clear_data=mysqli_query($link,"DELETE FROM `product_desc_$lang_data` WHERE `id_product` = '$id_product'");
        if($_POST[$name_desc]!=''){
            $desc_data=addslashes($_POST[$name_desc]);
            $query_add=mysqli_query($link,"INSERT INTO `product_desc_$lang_data` (`id_product`, `data`) VALUES ('$id_product', '$desc_data');");
        }
    }
    
    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
    while($l=mysqli_fetch_array($list_country)){
        $lang_data=$l['key'];
        $name_inp='name_product_'.$l['key'];
        $query_clear_data=mysqli_query($link,"DELETE FROM `product_name_$lang_data` WHERE `id_product` = '$id_product'");
        if($_POST[$name_inp]!=''){
            $name_data=addslashes($_POST[$name_inp]);
            $query_add=mysqli_query($link,"INSERT INTO `product_name_$lang_data` (`id_product`, `data`) VALUES ('$id_product', '$name_data');");
        }
    }
    
    if (!file_exists($path_folder_product.'/'.$id_product)) {
        mkdir($path_folder_product.'/'.$id_product, 0777, true);
    }
    
    if(isset($_FILES['icon_product'])){
        $target_file=$path_folder_product.'/'.$id_product.'/icon.jpg';
        if (move_uploaded_file($_FILES["icon_product"]["tmp_name"], $target_file)) {
            $msg_alert.=alert("Tệp tin ". basename( $_FILES["icon_product"]["name"]). " đã được tải lên!",'info');
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
                } 
        }
    }
    $msg_alert.=alert("Cập nhật thành công!","alert");
    echo mysqli_error($link);
	
	if(isset($_POST['link_store'])){
		
		$link_store=$_POST['link_store'];
		
		$query_delete=mysqli_query($link,"DELETE FROM `product_link` WHERE `id_product` = '$id_product'");
		
		$link_store_name=$_POST['link_store_name'];
		$link_store_icon=$_POST['link_store_icon'];
		for($i=0;$i<count($link_store);$i++){
			$store_link=$link_store[$i];
			$store_name=$link_store_name[$i];
			$store_icon=$link_store_icon[$i];
			$query_store=mysqli_query($link,"INSERT INTO `product_link` (`id_product`, `icon`, `link`, `name`) VALUES ('$id_product', '$store_icon', '$store_link', '$store_name');");
		}
	}
}

if($id_product!=''){
    $query_product=mysqli_query($link,"SELECT * FROM `products` WHERE `id` = '$id_product' LIMIT 1");
    $data_product=mysqli_fetch_array($query_product);
    $type_product=$data_product['type'];
    $status_product=$data_product['status'];
    $type_view_img=$data_product['type_view_img'];
    $link_youtube=$data_product['link_youtube'];
    $slug=$data_product['slug'];
    $price_product=$data_product['price'];
    $company=$data_product['company'];
    if($data_product['link_download']!=''){
        $link_download=json_decode($data_product['link_download']);
    }
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
                    $query_data=mysqli_query($link,"SELECT `data` FROM `product_name_$key_l` WHERE `id_product` = '$id_product' LIMIT 1");
                    $data_name=mysqli_fetch_array($query_data);
                    if(isset($data_name['data']))$data_name=$data_name['data'];
                    if($data_name!=''){
                        array_push($arr_is_data_name,$key_l);
                    }else{
						$data_name='';
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
				if($id_product!=''){
					$query_data=mysqli_query($link,"SELECT `data` FROM `product_desc_$key_l` WHERE `id_product` = '$id_product' LIMIT 1");
					$data_desc=mysqli_fetch_array($query_data);
					if(isset($data_desc['data']))$data_desc=$data_desc['data'];
					if($data_desc!=''){
						array_push($arr_is_data,$key_l);
					}else{
						$data_desc='';
					}
				}else{
					$data_desc='';
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
            if($id_product!=''){
                $dirname = "../product_data/".$id_product."/slide";
                $dir = opendir($dirname);
            
                while(false != ($file = readdir($dir)))
                    {
                    if(($file != ".") and ($file != "..") and ($file != "index.php"))
                        {
                        echo("<img src='$url/product_data/$id_product/slide/$file' style='width:70px;'/><input type='checkbox' name='file_delete[]' value='../product_data/$id_product/slide/$file' />");
                    }
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
        <td>Nhà phát triển</td>
        <td>
            <input type="text" name="company" value="<?php echo $company;?>"  style="width:100%" />
        </td>
    </tr>
    

    <tr>
        <td>Liên kết Youtube</td>
        <td>
            <input type="text" name="link_youtube" value="<?php echo $link_youtube;?>"  style="width:100%" />
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

    <tr>
        <td>Liên kết (Store)</td>
        <td>
            <table id="area_all_link_store">
			<?php
			if($id_product!=''){
			$query_link_list=mysqli_query($link,"SELECT * FROM `product_link` WHERE `id_product` = '$id_product'");
			while($row_l=mysqli_fetch_assoc($query_link_list)){
			?>
			<tr>
				<td><i class="fa <?php echo $row_l['icon']; ?>" aria-hidden="true"></i> <?php echo $row_l['name']; ?><td>
				<td style="width:60%">
					<input type="hidden" name="link_store_name[]" value="<?php echo $row_l['name'];?>">
					<input type="hidden" name="link_store_icon[]" value="<?php echo $row_l['icon'];?>">
					<input type="text" name="link_store[]" value="<?php echo $row_l['link'];?>" style="width:100%" />
				<td>
				<td><span onclick="$(this).parent().parent().remove();" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</span><td>
			</tr>
			<?php
			}}
			?>
			</table>
            <span class="buttonPro small green" onclick="show_list_store();return false;"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
        </td>
    </tr>
	

    <tr>
        <td>Liên kết (Download)</td>
        <td>
            <div id="area_all_link">
            <?php
            if(isset($data_product['link_download'])){
            if($data_product['link_download']!=''){
                $arr_link_download=json_decode($data_product['link_download']);
                for($i=0;$i<count($arr_link_download);$i++){
            ?>
                <div>
                    <input type="text" name="link_download[]" value="<?php echo $arr_link_download[$i]; ?>">
                    <span class="buttonPro red small" onclick="delete_link_download(this);return false;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                </div>
            <?php }}}?>
            </div>
            <span class="buttonPro small green" onclick="add_link_download();return false;"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
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
        <td>Giá</td>
        <td><input value="<?php echo $price_product;?>" name="price_product" style="width:100%"/></td>
    </tr>

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

function add_link_download(){
    var html_field_download='<div><i class="fa fa-download" aria-hidden="true"></i> <input type="text" name="link_download[]" value=""><span class="buttonPro red small" onclick="delete_link_download(this);return false;"><i class="fa fa-minus-circle" aria-hidden="true"></i></span></div>';
    $("#area_all_link").append(html_field_download);
}

function delete_link_download(emp){
    $(emp).parent().remove();
}

function show_list_store(){
	<?php
	$html_box='<table>';
	$query_list_store=mysqli_query($link,"SELECT * FROM `product_link_struct`");
	while($row_link=mysqli_fetch_assoc($query_list_store)){
		$html_box.='<tr>';
		$html_box.='<td><i class="fa '.$row_link['icon'].'" aria-hidden="true"></i><td>';
		$html_box.='<td>'.$row_link['name'].'<td>';
		$html_box.='<td><span class="buttonPro small green" onclick="add_link_store(this)" data-icon="'.$row_link['icon'].'" data-name="'.$row_link['name'].'"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</span><td>';
		$html_box.='</tr>';
	}
	$html_box.='</table>';
	?>
    swal({
        html: true, title: 'Chọn các liên kết store muốn thêm vào sản phẩm',
        text: '<?php echo $html_box;?>',
        showCancelButton: false
    });
}

function add_link_store(emp){
	var data_icon=$(emp).attr("data-icon");
	var data_name=$(emp).attr("data-name");
	var txt_row="<tr>";
	txt_row=txt_row+'<td><i class="fa '+data_icon+'" aria-hidden="true"></i> <b>'+data_name+'</b><td>';
	txt_row=txt_row+'<td style="width:60%"><input type="hidden" name="link_store_name[]" value="'+data_name+'"><input type="hidden" name="link_store_icon[]" value="'+data_icon+'"><input type="text" name="link_store[]" style="width:100%" /><td>';
	txt_row=txt_row+'<td><span onclick="$(this).parent().parent().remove();" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</span><td>';
	txt_row=txt_row+"<tr/>";
	$("#area_all_link_store").append(txt_row);
}

</script>