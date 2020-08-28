<?php

$bank_code='';
$bank_name='';
$bank_func='add';

$url_avatar=$url.'/product_data/app_default.png';
	
if(isset($_POST['bank_code'])){
	$bank_code=$_POST['bank_code'];
	$bank_name=$_POST['bank_name'];
	$bank_func=$_POST['bank_func'];
	if($bank_func=='add'){
		$query_add_bank=mysqli_query($link,"INSERT INTO `order_bank` (`bank_code`, `bank_name`) VALUES ('$bank_code', '$bank_name');");
		if($query_add_bank){
			echo alert('Thêm ngân hàng thành công ('.$bank_code.')','alert');
		}
	}else{
		$query_update_bank=mysqli_query($link,"UPDATE `order_bank` SET  `bank_name` = '$bank_name' WHERE `bank_code` = '$bank_code'");
		if($query_update_bank){
			echo alert('Cập nhật ngân hàng thành công ('.$bank_code.')','alert');
		}
	}
	
	if(isset($_FILES['bank_avatar'])){

		$target_file ='../assets/img_bank/'.$bank_code.'.jpg';

		if(move_uploaded_file($_FILES["bank_avatar"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["bank_avatar"]["name"]). " has been uploaded.";
		}else{
			echo "Tải ảnh đại diện không thành công!";
		}
	}
	
	$bank_func='add';
}

if(isset($_GET['edit'])){
	$id_edit=$_GET['edit'];
	$query_get_bank=mysqli_query($link,"SELECT * FROM `order_bank` WHERE `bank_code` = '$id_edit' LIMIT 1");
	$data_bank=mysqli_fetch_assoc($query_get_bank);
	$bank_code=$data_bank['bank_code'];
	$bank_name=$data_bank['bank_name'];
	$bank_func='edit';
	if(file_exists('../assets/img_bank/'.$id_edit.'.jpg')){
        $url_avatar=$url.'/assets/img_bank/'.$id_edit.'.jpg';
    }
}

?>
<div style="float: left;width: 100%;">
    <form style="padding: 30px;" id="form_add_product" method="post" enctype="multipart/form-data">
        <h2>Thêm ngân hàng</h2>
		
        <p>
			<label for="id_type">Biểu tượng</label><br />
			<input type="file" value="" name="bank_avatar"/>
			<img src="<?php echo $url_avatar;?>"/>
        </p>
		
        <p>
			<label for="id_type">Mã ngân hàng</label><br />
			<input type="text" value="<?php echo $bank_code;?>" name="bank_code"/>
        </p>
        
        <p>
			<label for="icon_type">Tên ngân hàng</label><br />
			<input type="text" value="<?php echo $bank_name;?>" name="bank_name"  />
        </p>
        
        <p>
			<?php 
			if($bank_func=='add'){
			?>
				<button class="buttonPro purple" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</button>
			<?php }else{?>
				<button class="buttonPro purple" ><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button>
			<?php }?>
			<input type="hidden" name="bank_func" value="<?php echo $bank_func;?>">
        </p>
    </form>
</div>
