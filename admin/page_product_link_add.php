<div style="float: left;width: 100%;">
	<?php
	$store_name='';
	$store_icon='';
	$store_img='';
	$store_svg='';
	$store_id='';
	$func='add';
	if(isset($_POST['store_name'])){
		$store_name=$_POST['store_name'];
		$store_icon=$_POST['store_icon'];
		$func=$_POST['func'];
		
		if($func=='add'){
			$query_add_link_struct=mysqli_query($link,"INSERT INTO `product_link_struct` (`name`, `icon`) VALUES ('$store_name', '$store_icon');");
			if($query_add_link_struct){
				$store_id=mysqli_insert_id($link);
				echo alert('Thêm cấu trúc liên kết sản phẩm thành công!','alert');
			}
		}else{
			$store_id=$_POST['store_id'];
			$query_update_link_struct=mysqli_query($link,"UPDATE `product_link_struct` SET `name` = '$store_name' WHERE `icon` = '$store_icon' ");
			if($query_update_link_struct){
				echo alert('Cập nhật cấu trúc liên kết sản phẩm thành công!','alert');
			}
		}
		
		if(isset($_FILES['store_avatar'])){
			$target_file ='../images_link_store/'.$store_icon.'.jpg';
			if(move_uploaded_file($_FILES["store_avatar"]["tmp_name"], $target_file)) {
				echo "Ảnh đại diện ". basename( $_FILES["store_avatar"]["name"]). " đã được tải lên";
			}else{
				echo "Tải ảnh đại diện không thành công!";
				print_r(error_get_last());
			}
		}

		if(isset($_FILES['store_svg'])){
			$target_file ='../images_link_store/'.$store_id.'.svg';
			if(move_uploaded_file($_FILES["store_svg"]["tmp_name"], $target_file)) {
				echo "Ảnh svg ". basename( $_FILES["store_svg"]["name"]). " đã được tải lên";
			}else{
				echo "Tải ảnh svg không thành công!";
				print_r(error_get_last());
			}
		}
		
	}

	if(isset($_GET['edit'])){
		$store_icon=$_GET['edit'];
		$query_list_link=mysqli_query($link,"SELECT * FROM `product_link_struct` WHERE `icon`='$store_icon'");
		$data_link=mysqli_fetch_assoc($query_list_link);
		$store_name=$data_link['name'];
		$store_icon=$data_link['icon'];
		$store_id=$data_link['id'];
		$store_img=$url_carrot_store.'/images_link_store/'.$store_icon.'.jpg';
		if(file_exists('../images_link_store/'.$store_id.'.svg')) $store_svg=$url_carrot_store.'/images_link_store/'.$store_id.'.svg';
		$func='edit';
	}
	?>
    <form style="padding: 30px;" method="post" enctype="multipart/form-data">
        <h2>Thêm liên kết store</h2>
		
        <p>
			<label for="id_type">Biểu tượng</label><br />
			<input type="file"  name="store_avatar"  />
			<?php if($store_img!=''){?>
				<img src="<?php echo $store_img;?>"/>
			<?php }?>
        </p>

		<p>
			<label for="id_type">Biểu tượng svg</label><br />
			<input type="file"  name="store_svg"  />
			<?php if($store_svg!=''){?>
				<img src="<?php echo $store_svg;?>"/>
			<?php }?>
        </p>
		
        <p>
			<label for="id_type">Tên store</label><br />
			<input type="text" value="<?php echo $store_name;?>" name="store_name"  />
        </p>
        
        <p>
			<label for="icon_type">Css icon</label><br />
			<input type="text" value="<?php echo $store_icon;?>" name="store_icon" />
        </p>
        
        <p>
			<input name="func" type="hidden" value="<?php echo $func;?>"/>
			<input name="store_id" type="hidden" value="<?php echo $store_id;?>"/>
            <button class="buttonPro purple" onclick="">Thêm</button>
        </p>
    </form>
</div>