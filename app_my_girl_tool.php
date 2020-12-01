<?php
include "app_my_girl_template.php";
?>
<div class="body">
    <h3>công cụ</h3>
    <i>Các công cụ  hỗ trợ chức năng nân cao của hệ thống</i>
    <ul>
        <?php
        $query_function=mysqli_query($link,"SELECT `url`,`icon`,`describe`,`name` FROM `app_my_girl_function` ORDER BY `orders`");
        while($func=mysqli_fetch_assoc($query_function)){
            ?>
            <a href="<?php echo $url;?>/<?php echo $func['url'];?>">
                <li class="box_tool">
                    <i class="<?php echo $func['icon'];?>" aria-hidden="true"></i>
                    <b><?php echo $func['name'];?></b><br />
                    <?php echo $func['describe'];?>
                </li>
            </a>
         <?php } ?>
    </ul>
</div>