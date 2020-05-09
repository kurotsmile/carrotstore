<?php
$func='add';

$id_ads='';
$id_product_main='';
$tip_download='';
$arr_id_product=array();

if(isset($_GET['edit'])){
    $func='edit';
    $id_ads=$_GET['edit'];
    $query_ads=mysqli_query($link,"SELECT * FROM `ads` WHERE `id_ads` = '$id_ads' LIMIT 1");
    $data_ads=mysqli_fetch_array($query_ads);
    $id_product_main=$data_ads['id_product_main'];
    $arr_id_product=json_decode($data_ads['id_product']);
    $tip_download=$data_ads['tip_download'];
}

if(isset($_POST['func'])){
    $id_ads=$_POST['id_ads'];
    $id_product=$_POST['product'];
    $data_product=json_encode($id_product);
    $arr_id_product=$_POST['product'];
    $product_main=$_POST['product_main'];
    $func=$_POST['func'];
    $tip_download=$_POST['tip_download'];
    
    if($func=='add'){
        $query_add_ads=mysqli_query($link,"INSERT INTO `ads` (`id_ads`, `id_product`,`id_product_main`,`tip_download`) VALUES ('$id_ads', '$data_product','$product_main','$tip_download');");
        if($query_add_ads){
            echo alert("Thêm mới địa điểm quảng cáo thành công!",'alert');
        }
    }else{
        $id_edit=$_POST['id_edit'];
        $query_edit_ads=mysqli_query($link,"UPDATE `ads` SET `id_ads`='$id_ads' , `id_product` = '$data_product' , `id_product_main` = '$product_main' , `tip_download`='$tip_download' WHERE `id_ads` = '$id_edit' LIMIT 1;");
        if($query_edit_ads){
            echo alert("Cập nhật địa điểm quảng cáo thành công!",'alert');
        } 
         echo mysqli_error($link);
    }
   
}
?>
<form id="form_loc" style="background: white;padding: 10px;border-radius: 10px;margin: 9px;"  method="post" enctype="multipart/form-data" name="add_ads" action="<?php echo $url_admin;?>/?page_view=page_ads">
    
    <div style="display: inline-block;float: left;margin: 2px;">
    <table style="alignment-baseline: text-after-edge;">
        <tr>
        <td>
            <strong>ID Điểm đặc quảng cáo</strong><br />
            <input type="text" name="id_ads" value="<?php echo $id_ads;?>"  />
        </td>
        <td>
            <strong>Chọn các sản phẩm Chính</strong>
            <div style="max-height: 200px;overflow-y: auto;">
            <select name="product_main">
            <?php 
                $list_product=mysqli_query($link,"SELECT `id` FROM `products` WHERE `status`='1'");
                while($p=mysqli_fetch_assoc($list_product)){
            ?>
                <option value="<?php echo $p['id'];?>" <?php if($id_product_main==$p['id']){ ?>selected="true"<?php } ?>><?php echo get_name_product_lang($link,$p['id'],$_SESSION["lang"]);?></option>
            <?php
                }
                mysqli_free_result($list_product);
            ?>
             </select>
             </div>
        </td>
        <td>
            <strong>Chọn các sản phẩm hiển thị</strong>
            <div style="max-height: 200px;overflow-y: auto;">
            <table>
            <?php 
                $list_product=mysqli_query($link,"SELECT `id` FROM `products` WHERE `status`='1'");
                while($p=mysqli_fetch_assoc($list_product)){
            ?>
               <tr>
                <td><a target="_blank" href="<?php echo $url; ?>/product/<?php echo $p['id'];?>"><img  src="<?php echo get_url_icon_product($p['id'],'15',true);?>"/></a></td>
                <td>
                    <strong><?php echo get_name_product_lang($link,$p['id'],$_SESSION["lang"]);?></strong>
                </td>
                <td>
                    <input type="checkbox" name="product[]" value="<?php echo $p['id']; ?>" <?php if(in_array($p['id'],$arr_id_product)){?> checked="true"<?php } ?> />
                </td>
               </tr>
            <?php
                }
                mysqli_free_result($list_product);
            ?>
             </table>
             </div>
        </td>
        
        <td>
            <strong>Từ khóa ngôn ngữ tải xuống</strong><br />
            <input  type="text" name="tip_download" value="<?php echo $tip_download;?>"/>
            
        </td>
        
        <td>
            <?php if($func=="add"){?>
                <button class="buttonPro blue">Thêm mới</button>
            <?php }else{?>
                <button class="buttonPro blue">Cập nhật</button>
                <input type="hidden" name="id_edit" value="<?php echo $id_ads;?>" />
            <?php }?>
            <input type="hidden" name="func" value="<?php echo $func;?>" />
        </td>
       </tr>
    </table>
    </div>
</form>

<?php
$list_ads=mysqli_query($link,"SELECT * FROM `ads`"); 
?>
<table>
<tr>
    <th style="width: 18px;">ID Ads</th>
    <th style="width: 120px;">Sản phẩm chính</th>
    <th>Danh sách sản phẩm</th>
    <th>Từ khóa tải xuống</th>
    <th style="width: 200px;">Thao tác</th>
</tr>
<?php
while($row=mysqli_fetch_array($list_ads)){
?>
    <tr>
        <td><?php echo $row['id_ads'];?></td>
        <td>
        <?php
            $id_product_main=$row['id_product_main'];
            echo '<a target="_blank" href="'.$url.'/product/'.$id_product_main.'"><img  src="'.get_url_icon_product($id_product_main,'25',true).'"/></a>';
        ?>
        </td>
        <td>
            <?php 
                $arr_product=json_decode($row['id_product']);
                for($i=0;$i<count($arr_product);$i++){
                    $id_p=$arr_product[$i];
                    echo '<a target="_blank" href="'.$url.'/product/'.$id_p.'"><img  src="'.get_url_icon_product($id_p,'25',true).'"/></a>';
                }
            ?>
        </td>
        <td>
            <?php echo $row['tip_download']; ?>
        </td>
        <td>
            <a class="buttonPro small orange" href="<?php echo $url_admin;?>/?page_view=page_ads&edit=<?php echo $row['id_ads'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</a>
            <a class="buttonPro small red" href="<?php echo $url_admin;?>/?page_view=page_ads&delete=<?php echo $row['id_ads'];?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Xóa</a>
        </td>
    </tr>
<?php
}
mysqli_free_result($list_ads);
?>
</table>