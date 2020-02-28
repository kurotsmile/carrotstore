<script src="<?php echo $url; ?>/dist/sweetalert.min.js"></script> 
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/dist/sweetalert.css"/>


<?php
include "app_my_girl_template.php";
$sex='0';
$langsel='vi';
$character_sex='1';
$sel_date=date("Y-m-d");

if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
}

if(isset($_GET['sex'])){
    $sex=$_GET['sex'];
}

if(isset($_GET['character_sex'])){
    $character_sex=$_GET['character_sex'];
}

if(isset($_GET['dates'])){
    $sel_date=$_GET['dates'];
}

    $result_tip_count=mysql_query("SELECT  * FROM  `app_my_girl_key` WHERE sex =$sex AND  character_sex=$character_sex AND dates='$sel_date' GROUP BY `key`");  

    $total_records=mysql_num_rows($result_tip_count);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 500;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    mysql_free_result($result_tip_count);
    

    $result_tip=mysql_query("SELECT  * FROM  `app_my_girl_key` WHERE sex =$sex AND  character_sex=$character_sex AND dates='$sel_date' GROUP BY `key` LIMIT $start, $limit");

?>


  <script>
  $(document).ready(function(){
    $("#datepicker").datepicker();
    $("#datepicker").datepicker("option", "dateFormat","yy-mm-dd");
    $("#datepicker").val("<?php echo $sel_date;?>");
  });
  
    function view_device(id_device,date,lang){
        var character_sex="<?php echo $character_sex;?>";
        var sex="<?php echo $sex;?>";
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=view_device&id_device="+id_device+"&dates="+date+"&lang="+lang+"&character_sex="+character_sex+"&sex="+sex, //tham số truyền vào
                success: function(data, textStatus, jqXHR)
                {
                    show_box(data);
                }
            
            });
  }
  
  function show_join(id_row,lang,sex,char_sex,type_show){
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=show_return&key="+id_row+"&lang="+lang+"&sex="+sex+"&character_sex="+char_sex+"&type_show="+type_show, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
               swal({
                    title:id_row,
                    html: true,
                    text:data
               });
            }
        
        });
  }
  
  
  function view_more(key){
    var lang="<?php echo $langsel;?>";
    var sex="<?php echo $sex;?>";
    var character_sex="<?php echo $character_sex;?>";
    var date_sel="<?php echo $sel_date?>";
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=view_history_rate&key="+key+"&lang="+lang+"&sex="+sex+"&sel_date="+date_sel+"&character_sex="+character_sex, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
                show_box(data);
            }
        
        });
    return false;
  }
  
  
  function view_chat_see(id_chat,type_chat){
    if(id_chat=="unclear"||id_chat==""){
        alert("Unclear data :(");
        return false;
    }
    var lang="<?php echo $langsel;?>";
    var sex="<?php echo $sex;?>";
    var char_sex="<?php echo $character_sex;?>";
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "get", //kiểu dũ liệu truyền đi
            data: "function=view_history_see&id="+id_chat+"&type="+type_chat+"&lang="+lang+"&sex="+sex+"&char_sex="+char_sex, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
               show_box(data);
          
            }
        
        });
    return false;
  }

  </script>
  
      <div id="form_loc">
    <strong>Trang hiển thị:</strong>
        <?php
            for($i=1;$i<=$total_page;$i++){
                if($i==$current_page){
                    echo '<a href="'.$url.'/app_my_girl_history_not_chat.php?page='.$i.'&sex='.$sex.'&character_sex='.$character_sex.'&dates='.$sel_date.'" class="buttonPro small">'.$i.'</a>';
                }else{
                    echo '<a href="'.$url.'/app_my_girl_history_not_chat.php?page='.$i.'&sex='.$sex.'&character_sex='.$character_sex.'&dates='.$sel_date.'" class="buttonPro small blue">'.$i.'</a>';
                }
            }
        ?>
         / <?php echo $limit;?> từ khóa
    </div>
    

        
<?php

echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>Key</th><th>Rate</th><th>Lang</th><th>os</th><th>version</th><th>character</th><th>sex</th><th>Info other</th><th>id_device</th><th>Action</th></tr>';
    while ($row = mysql_fetch_array($result_tip)) {
        $key=$row['key'];
        $result_tip2=mysql_query("SELECT DISTINCT text FROM `app_my_girl_$langsel`  WHERE  text='$key' AND  character_sex=$character_sex AND sex=$sex AND pater='' ");
        if(mysql_num_rows($result_tip2)==0){
            echo show_row_history_prefab($row);
        }
        mysql_free_result($result_tip2);
    }
echo '</table>';

mysql_free_result($result_tip);
mysql_free_result($result_count);
?>

