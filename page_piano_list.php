<?php
$category='all';
$sql_query='';
if(isset($_GET['category'])){
    $category=$_GET['category'];
    $sql_query=" AND `category`='$category' ";
}
?>
<div id="bar_menu_sub">
    <li class="menu_item_type"> <a href="<?php echo $url; ?>/piano/new" ><?php echo '<span class="fa fa-plus-circle" style="padding: 0px;margin: 0px;margin-right: 5px;float: left;"></span> '.lang($link,'tao_moi_midi'); ?></a></li>
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
    $query_list_piano=mysqli_query($link,"SELECT `id_midi`,`name`,`speed`,`category`,`sell`,`level`,`length`,`length_line`,`author` FROM  carrotsy_piano.`midi` WHERE sell!=0 $sql_query ORDER BY RAND() LIMIT 50");
}
while($row=mysqli_fetch_assoc($query_list_piano)){
    include "page_piano_git.php";
}
echo show_ads_box_main($link,'piano_page');
?>

<script>
var myJsonString='';
<?php
    $query_count_midi=mysqli_query($link,"SELECT COUNT(`id_midi`) as c FROM carrotsy_piano.`midi` WHERE `sell` > '0'");
    $data_count_midi=mysqli_fetch_array($query_count_midi);
	$count_p=$data_count_midi['c'];
?>
var count_p=<?php echo $count_p;?>;
$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() >= ($(document).height()-10)) {
                $('#loading').fadeIn(200);
                $('#loading-page').html(arr_id_piano.length+"/"+count_p);
                myJsonString = JSON.stringify(arr_id_piano);
                $.ajax({
                    url: "<?php echo $url; ?>/index.php",
                    type: "post",
                    data: "function=load_piano&json="+myJsonString+"&lengmidi="+count_p,
                    success: function(data, textStatus, jqXHR)
                    {
                        myJsonString = JSON.stringify(arr_id_piano);
                        $('#containt').append(data);
                        $('#loading').fadeOut(200);
                        reset_tip();
                    }
                });
   }
});
</script>