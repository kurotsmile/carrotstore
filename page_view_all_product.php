<?php
    $type='';
    $type_menu='';
    $type_url='';

    if(isset($_GET['type'])){
        $type="WHERE `type` = '".$_GET['type']."' ";
        $type_url="&type=".$_GET['type'];
        $type_menu=$_GET['type'];
    }


    if($type==''){
        $result = mysqli_query($link,"SELECT `id`,`type`,`slug` FROM `products` WHERE  `status`='1' AND `company`='Carrot' ORDER BY RAND() LIMIT 20");
        $result_count=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `products` WHERE  `status`='1' ORDER BY RAND()");
    }else{
        $result = mysqli_query($link,"SELECT`id`,`type`,`slug` FROM `products` $type AND `status`='1' ORDER BY RAND() LIMIT 20");
        $result_count=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `products` $type AND  `status`='1' ORDER BY RAND()");
    }


    $data_count=mysqli_fetch_assoc($result_count);


    $view_type="page_view_all_product_git";
    if(isset($_GET['view_type'])){
        $view_type=$_GET['view_type'];
        $_SESSION['view_type']=$_GET['view_type'];
    }else{
        $_SESSION['view_type']=$view_type;
    }
?>
    <div id="bar_menu_sub">
        <li class="menu_item_type"> <a href="<?php echo $url; ?>" <?php if($type_menu==''){ echo 'class="active"';} ?>><?php echo '<span class="fa fa-globe" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang($link,'tat_ca'); ?></a></li>
            <?php
                $results = mysqli_query($link,"SELECT `id`,`css_icon` FROM `type` ORDER BY `position`");
                while ($row = mysqli_fetch_assoc($results)) {
                    ?>
                    <li class="menu_item_type">
                    <a href="<?php echo $url; ?>/type/<?php echo $row['id'];?>" <?php if($type_menu==$row['id']){ echo 'class="active"';} ?>><?php echo '<span class="'.$row['css_icon'].'" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang($link,$row['id']); ?></a>
                    </li>
             <?php
                }
            ?>
    </div>

<?php
        if($view_type!=''){
            include "$view_type.php";
        }
?>

<?php
   echo scroll_load_data($type_obj,$data_count['c']);
?>
