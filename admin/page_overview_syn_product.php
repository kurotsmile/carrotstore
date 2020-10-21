<?php
$query_product=mysqli_query($link,"SELECT `id` FROM `products`");
$path_data="product_data";
$url_syn_data=$url_syn.'/'.$path_data;
echo '<ul>';
while($p=mysqli_fetch_assoc($query_product)){
    $id_product=$p['id'];
    $path_product='../'.$path_data.'/'.$id_product;
    if(is_dir($path_product)){
        echo '<li>';
        echo 'Đã có '.$p['id'];
        echo '<ul>';
        if(!file_exists($path_product.'/icon.jpg')){
            $url_icon=$url_syn_data.'/'.$id_product.'/icon.jpg';
            $url_new_icon=$url.'/'.$path_data.'/'.$id_product.'/icon.jpg';
            $path_icon=$path_product.'/icon.jpg';
            downloadUrlToFile($url_icon, $path_icon);
            echo '<li>Tải xuống ảnh biểu tưởng sản phầm <a target="_blank" href="'.$url_new_icon.'">'.$url_new_icon.'</a></li>';
        }
        echo '</ul>';
        echo '</li>';
    }else{
        mkdir($path_product);
        echo '<li> Tạo thành công thư mục <a target="_blank" href="#">'.$path_product.'</a></li>';
    }
}
echo '</ul>';
?>