<?php

$url_cur=$url.'/admin/?page_view=page_product';
if(isset($_GET['delete'])){
    $id_delete=$_GET['delete'];

    $list_country=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `active`='1'");
    while($l=mysqli_fetch_array($list_country)){
        $lang_data=$l['key'];
        mysqli_query($link,"DELETE FROM `product_name_$lang_data` WHERE `id_product` = '$id_delete'");
        mysqli_query($link,"DELETE FROM `product_desc_$lang_data` WHERE `id_product` = '$id_delete'");
    }

    $query_delete_product=mysqli_query($link,"DELETE FROM `products` WHERE ((`id` = '$id_delete'));");
    if($query_delete_product){
        echo alert('Xóa thành công ('.$id_delete.')','alert');
    }else{
        echo alert('Xóa thành công ('.$id_delete.')','error');
    }

    $dirpath='../product_data/'.$id_delete.'/';
    deleteDirectory($dirpath);
}
?>    
    <table style="width: 100%;" id="show_table" class="tablePro" >
    <tr>
        <th style="width: 8%;">Biểu tượng</th>
        <th >Tên sản phẩm</th>
        <th >Loại</th>
        <th >Trạng thái</th>
        <th>Thao tác</th>
    </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $query_type=mysqli_query($link,"SELECT `css_icon` FROM `type` WHERE `id` = '".$row['type']."' LIMIT 1");
            $data_type=mysqli_fetch_assoc($query_type);
            ?>
                <tr>
                    <td><a target="_blank" href="<?php echo $url; ?>/product/<?php echo $row['id'];?>"><img src="<?php echo get_url_icon_product($row['id'],'50',true);?>"/></a></td>
                    <td><a target="_blank" href="<?php echo $url; ?>/product/<?php echo $row['id'];?>"><strong><?php echo get_name_product_lang($link,$row['id'],'en',true);?></strong></a></td>
                    <td><span class="<?php echo $data_type['css_icon']; ?>"></span> <?php echo '<a target="_blank" href="'.URL.'/type/'.$row['type'].'">'.lang($link,$row['type']).'</a>'; ?></td>
                    <td>
                        <?php 
                            if($row['status']=='1'){
                                echo '<strong style="color:green;"><i class="fa fa-check-circle" aria-hidden="true"></i> Xuất bản<strong>';
                            }else{
                                echo '<span style="color:red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Bản nháp</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <a href="<?php echo $url_cur;?>&delete=<?php echo $row['id'] ?>" onclick="return confirm('Có chắc chắn là muốn xóa?');" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                        <a href="<?php echo $url_admin.'?page_view=page_product&sub_view=page_product_update&id='.$row['id'];?>" class="buttonPro small purple"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa</a>
                    </td>
                </tr>
        <?php
        }
        ?>
    </table>