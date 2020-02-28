<?php
$view='list';
if(isset($_GET['view'])){ $view=$_GET['view'];}

if($view=='list'){
    include "page_quote_list.php";
}else{
    include "page_quote_detail.php";
}
?>