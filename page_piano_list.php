<?php
$category='all';
$sql_query='';
if(isset($_GET['category'])){
    $category=$_GET['category'];
    $sql_query=" AND `category`='$category' ";
}
?>
<div id="bar_menu_sub">
    <li class="menu_item_type"> <a href="<?php echo $url; ?>/piano" <?php if($category=='all'){ echo 'class="active"';} ?>><?php echo '<span class="fa fa-globe" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang($link,'tat_ca'); ?></a></li>
    <?php
        $query_list_category=mysqli_query($link,"SELECT `name` FROM carrotsy_piano.`category` ORDER BY RAND() LIMIT 20");
        while($row_category=mysqli_fetch_assoc($query_list_category)){
    ?>
        <li class="menu_item_type"><a href="<?php echo $url_cur;?>&category=<?php echo $row_category['name']; ?>"><?php echo $row_category['name'];?></a></li>
    <?php } ?>
</div>

<?php
if(!isset($query_list_piano)){
    $query_list_piano=mysqli_query($link,"SELECT `id_midi`,`name`,`speed`,`category`,`sell`,`level`,`length`,`author` FROM  carrotsy_piano.`midi` WHERE sell!=0 $sql_query ORDER BY RAND() LIMIT 50");
}
while($row=mysqli_fetch_assoc($query_list_piano)){
    include "page_piano_git.php";
}
echo show_ads_box_main($link,'piano_page');
?>

