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
        $result = mysql_query("SELECT * FROM `products` WHERE  `status`='1' ORDER BY RAND() LIMIT 20",$link);
        $result_count=mysql_query("SELECT * FROM `products` WHERE  `status`='1' ORDER BY RAND()",$link);
    }else{
        $result = mysql_query("SELECT * FROM `products` $type AND `status`='1' ORDER BY RAND() LIMIT 20",$link);
        $result_count=mysql_query("SELECT * FROM `products` $type AND  `status`='1' ORDER BY RAND()",$link);
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
        <li class="menu_item_type"> <a href="<?php echo $url; ?>" <?php if($type_menu==''){ echo 'class="active"';} ?>><?php echo '<span class="fa fa-globe" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang('tat_ca'); ?></a></li>
            <?php
                $results = mysql_query("SELECT * FROM `type` ORDER BY `position`",$link);
                while ($row = mysql_fetch_array($results)) {
                    ?>
                    <li class="menu_item_type">
                    <a href="<?php echo $url; ?>/type/<?php echo $row[0];?>" <?php if($type_menu==$row[0]){ echo 'class="active"';} ?>><?php echo '<span class="'.$row[1].'" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang($row[0]); ?></a>
                    </li>
             <?php
                }
            ?>
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
                    type: "get",
                    data: "function=load_product&json="+myJsonString+"&lengProduct="+count_p+"&type="+type+"&category="+category+"&tags="+tags, //tham s�� truy��n va�o
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
