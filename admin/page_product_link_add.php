<div style="float: left;width: 100%;">
	<?php
	$store_name='';
	$store_icon='';
	$func='add';
	if(isset($_POST['store_name'])){
		$store_name=$_POST['store_name'];
		$store_icon=$_POST['store_icon'];
		$func=$_POST['func'];
		
		if($func=='add'){
			$query_add_link_struct=mysqli_query($link,"INSERT INTO `product_link_struct` (`name`, `icon`) VALUES ('$store_name', '$store_icon');");
			if($query_add_link_struct){
				echo alert('Thêm cấu trúc liên kết sản phẩm thành công!','alert');
			}
		}else{
			$query_update_link_struct=mysqli_query($link,"UPDATE `product_link_struct` SET `name` = '$store_name' WHERE `icon` = '$store_icon' ");
			if($query_update_link_struct){
				echo alert('Cập nhật cấu trúc liên kết sản phẩm thành công!','alert');
			}
		}
		
		if(isset($_FILES['store_avatar'])){
			$target_file ='assets/img_link/'.$store_icon.'.jpg';

			if(move_uploaded_file($_FILES["store_avatar"]["tmp_name"], $target_file)) {
				echo "Ảnh đại diện ". basename( $_FILES["store_avatar"]["name"]). " đã được tải lên";
			}else{
				echo "Tải ảnh đại diện không thành công!";
			}
		}
		
	}

	if(isset($_GET['edit'])){
		$store_icon=$_GET['edit'];
		$query_list_link=mysqli_query($link,"SELECT * FROM `product_link_struct` WHERE `icon`='$store_icon'");
		$data_link=mysqli_fetch_assoc($query_list_link);
		$store_name=$data_link['name'];
		$store_icon=$data_link['icon'];
		$func='edit';
	}
	?>
    <form style="padding: 30px;" method="post" enctype="multipart/form-data">
        <h2>Thêm liên kết store</h2>
		
        <p>
			<label for="id_type">Biểu tượng</label><br />
			<input type="file"  name="store_avatar"  />
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
            <button class="buttonPro purple" onclick="">Thêm</button>
        </p>
    </form>
</div>