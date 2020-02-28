<?php
    $type='';
    $type_menu='';
    $type_url='';
    $view_category='';

    if(isset($_GET['type'])){
        $type="WHERE `type` = '".$_GET['type']."' ";
        $type_url="&type=".$_GET['type'];
        $type_menu=$_GET['type'];
    }

    if(isset($_GET['category'])){
        $category="WHERE `category` LIKE '%\"".$_GET['category']."\"%'";
        $view_category=$_GET['category'];
        $result = mysql_query("SELECT * FROM `products` $category ORDER BY RAND() LIMIT 20",$link);
        $result_count=mysql_query("SELECT * FROM `products` $category ORDER BY RAND()",$link);
    }else if(isset($_GET['tags'])){
        $tags=$_GET['tags'];
        $result =mysql_query("SELECT p.* FROM product_tag tag,products p WHERE tag.product_id=p.id AND tag.tag LIKE '%$tags%'");
        $result_count=mysql_query("SELECT p.* FROM product_tag tag,products p WHERE tag.product_id=p.id AND tag.tag LIKE '%$tags%'",$link);
    }else if(isset($_GET['productbyuser'])){
        $view_user=$_GET['productbyuser'];
        $result = mysql_query("SELECT * FROM `products` where `users`='$view_user'  ORDER BY RAND() LIMIT 20",$link);
        $result_count=mysql_query("SELECT * FROM `products` where `users`='$view_user'  ORDER BY RAND()",$link);
    }
    else{
        if($type==''){
            $result = mysql_query("SELECT * FROM `products` WHERE  `status`='1' ORDER BY RAND() LIMIT 20",$link);
            $result_count=mysql_query("SELECT * FROM `products` WHERE  `status`='1' ORDER BY RAND()",$link);
        }else{
            $result = mysql_query("SELECT * FROM `products` $type AND `status`='1' ORDER BY RAND() LIMIT 20",$link);
            $result_count=mysql_query("SELECT * FROM `products` $type AND  `status`='1' ORDER BY RAND()",$link);
        }

    }
    $result_count=mysql_num_rows($result_count);


    $view_type="page_view_all_product_git";
    if(isset($_GET['view_type'])){
        $view_type=$_GET['view_type'];
        $_SESSION['view_type']=$_GET['view_type'];
    }else{
        $_SESSION['view_type']=$view_type;
    }
?>
    <div id="bar_menu_sub">
        <a href="<?php echo $url; ?>" <?php if($type_menu==''){ echo 'class="active"';} ?>><?php echo '<span class="fa fa-globe" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang('tat_ca'); ?></a>
            <?php
                $results = mysql_query("SELECT * FROM `type` ORDER BY `position`",$link);
                while ($row = mysql_fetch_array($results)) {
                    ?>
                    <li class="menu_item_type">
                    <a href="<?php echo $url; ?>/type/<?php echo $row[0];?>" <?php if($type_menu==$row[0]){ echo 'class="active"';} ?>><?php echo '<span class="'.$row[1].'" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang($row[0]); ?></a>
                    <?php
                    $type_id=$row[0];
                    $results_category = mysql_query("SELECT * FROM `product_category` WHERE  `type_cat` ='$type_id'");
                    if(mysql_num_rows($results_category)>0){
                        echo '<ul>';
                    }
                    while ($category = mysql_fetch_array($results_category)) {
                        ?>
                        <li><a href="<?php echo $url.'/category/'.$category['id'];?>"><span class="<?php echo $category['icon'];?>"></span> <?php echo lang($category['name_cat']);?></a></li>
                        <?php
                    }
                    ?>
                    </li>
                    <?php
                     if(mysql_num_rows($results_category)>0){
                        echo '</ul>';
                    }
                }
            ?>
    </div>
    <div id="filter">
        <?php if($view_category!=''){
            $cat=get_row("product_category",$view_category);
            ?>
            <strong><?php echo lang('dang_xem');?>:</strong>
                <a href="<?php echo $url;?>"><?php echo lang('trang_chu');?></a> <strong>></strong>
                <a class="contry_groub" href="<?php echo $url;?>/type/<?php echo $cat[2];?>"><?php echo lang($cat[2]);?></a> <strong>></strong>
                <a style="margin-right: 60px" class="contry_groub" href="<?php echo $url;?>/category/<?php echo $cat[0];?>"><i class="<?php echo $cat[3];?>"></i> <?php echo lang($cat[1]);?></a>
        <?php }?>

        <?php if(isset($_GET['tags'])){
            $tags=$_GET['tags'];
            ?>
            <strong><?php echo lang('dang_xem');?>:</strong>
            <a href="<?php echo $url;?>/products"><?php echo lang('trang_chu');?></a> <strong>></strong>
            <a style="margin-right: 60px" class="contry_groub" href="#"><i class="fa fa-tags"></i> <?php echo $tags;?></a>
        <?php 
        }else if(isset($_GET['productbyuser'])){
            $productbyuser=$_GET['productbyuser'];
            $acc=get_account($productbyuser);
            ?>
            <strong><?php echo lang('dang_xem');?>:</strong>
            <a class="show_user" id_user="<?php echo $productbyuser;?>" href="<?php echo $url.'/user/'.$productbyuser;?>"><img src="<?php echo thumb($acc['avatar'],'18x18'); ?>"/> <?php echo show_name_User($productbyuser);?></a>
        <?php 
        }else{
        ?>
        <!--
        <strong><?php echo lang('bo_loc');?>:</strong>                                                  
        <a href="<?php echo $url; ?>/index.php?page_view=page_view.php<?php echo $type_url;?>&view_type=page_view_all_product_git" class="<?php if($view_type=='page_view_all_product_git'){echo 'active';}; ?> contry_groub"><i class="fa fa-th"></i> <?php echo lang('hien_thi_dang_luoi'); ?></a>
        <a href="<?php echo $url; ?>/index.php?page_view=page_view.php<?php echo $type_url;?>&view_type=page_view_all_product_map" class="<?php if($view_type=='page_view_all_product_map'){echo 'active';}; ?> contry_groub"><i class="fa fa-map-marker"></i> <?php echo lang('hien_thi_dang_ban_do'); ?></a>
        !-->
        <?php }?>
    </div>

<script>
var myJsonString;
</script>

<?php
        include "$view_type.php";
?>

<script>
var count_p=<?php echo $result_count;?>;
$(window).scroll(function() {

   if($(window).scrollTop() + $(window).height() >= ($(document).height()-10)) {
                $('#loading').fadeIn(200);
                $('#loading-page').html(arr_id_product.length+"/"+count_p);
                 myJsonString = JSON.stringify(arr_id_product);

                var type='';
                var category='';
                var tags='';

                $.ajax({
                    url: "<?php echo $url; ?>/index.php",
                    type: "get", //kiêÒu duÞ liêòu truyêÌn ði
                    data: "function=load_product&json="+myJsonString+"&lengProduct="+count_p+"&type="+type+"&category="+category+"&tags="+tags, //tham sôì truyêÌn vaÌo
                    success: function(data, textStatus, jqXHR)
                    {
                        myJsonString = JSON.stringify(arr_id_product);
                        $('#containt').append(data);
                        $('#loading').fadeOut(200);
                        reset_tip();
                    }
                });
   }
   
        if($(window).scrollTop()>35){
            $('#shopping_cart').addClass('shopping_cart_fixed');
        }else{
            $('#shopping_cart').removeClass('shopping_cart_fixed');
        }
});





    $(document).ready(function(){
        $('.menu_item_type').each(function(){
            var menu_item_type=$(this);
            $(this).mouseenter(function(){
                $(menu_item_type).find('ul').fadeIn(200);
            });

            $(this).mouseleave(function(){
                $(menu_item_type).find('ul').fadeOut(200);
            });
        });
    });
</script>
