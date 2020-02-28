<?php
    if(isset($_GET['view_product'])){
        include "page_view_product.php";  
    }else{
        include "page_view_all_product.php";
    }
?>