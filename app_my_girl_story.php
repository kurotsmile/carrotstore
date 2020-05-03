<?php
include "app_my_girl_template.php";
$langsel='vi';
$sexsel="0";
$sex_char="1";
$key_search='';
$limit='20';
$limit_txt_query=' LIMIT '.$limit;
$limit_chat='';
$limit_chat_query='';
$effect_search='';
$disable_chat='';
$disable_chat_sql="";

$txt_query_effect="AND  `effect`='49'";

if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
}

if(isset($_GET['sex'])){
    $sexsel=$_GET['sex'];
}



if(isset($_GET['disable_chat'])){
    $disable_chat=$_GET['disable_chat']; 
}

if(isset($_POST['loc'])){
    $langsel=$_POST['lang'];
    $tip=$_POST['tip'];
    $key_search=$_POST['key_word'];
    $txt_key_search='';
    if($key_search!=''){
        $txt_key_search="AND  (`chat` LIKE '%$key_search%')";
    }

    if(isset($_POST['limit'])){
        if($_POST['limit']!=''){
            $limit=$_POST['limit'];
            $limit_txt_query=' LIMIT '.$limit;
        }else{
            $limit='';
            $limit_txt_query='';
        }
    }
    
    if(isset($_POST['limit_chat'])){
        if($_POST['limit_chat']!=''){
            $limit_chat=$_POST['limit_chat'];
            $limit_chat_query=" AND `limit_chat`=".$limit_chat."";
        }
    }
    
    if($tip!=''){
        $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE  `tip` = '$tip'  $txt_key_search $txt_query_effect $limit_chat_query $disable_chat_sql ORDER BY `id` DESC $limit_txt_query");
    }else{
        $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE  `disable` = 0  $txt_key_search $txt_query_effect $limit_chat_query $disable_chat_sql ORDER BY `id` DESC $limit_txt_query");
    }
}else{
    $result_tip=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = 0  $txt_query_effect ORDER BY `id` DESC  $limit_txt_query");
}

$result_tip_all=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `disable` = 0  $txt_query_effect ORDER BY `id`");
?>
<form method="post" id="form_loc">

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Ngôn ngữ:</label> 
    <select name="lang">
    <?php     
    $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
    while($row_lang=mysqli_fetch_array($query_list_lang)){?>
    <option value="<?php echo $row_lang['key'];?>" <?php if($langsel==$row_lang['key']){?> selected="true"<?php }?>><?php echo $row_lang['name'];?></option>
    <?php }?>
    </select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 120px;">
    <label>Từ khóa:</label> 
    <input type="text" name="key_word" value="<?php echo $key_search;?>"/>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <label>Gợi ý:</label> 
    <select name="tip">
        <option value="" <?php if(isset($_POST['tip'])&&$_POST['tip']==''){?> selected="true"<?php }?>>All</option>
        <option value="1" <?php if(isset($_POST['tip'])&&$_POST['tip']=='1'){?> selected="true"<?php }?>>on</option>
        <option value="0" <?php if(isset($_POST['tip'])&&$_POST['tip']=='0'){?> selected="true"<?php }?>>off</option>
    </select>
</div>


<div style="display: inline-block;float: left;margin: 2px;width: 100px;">
    <label>Giới hạng:</label> 
    <select name="limit">
        <option <?php if($limit=='50'){ echo 'selected="true"';}?> value="50">500 dòng</option>
        <option <?php if($limit=='1000'){ echo 'selected="true"';}?>  value="1000">1000 dòng</option>
        <option <?php if($limit=='1500'){ echo 'selected="true"';}?>  value="1500">1500 dòng</option>
        <option <?php if($limit==''){ echo 'selected="true"';}?> value="">không giới hạng</option>
    </select>
</div>


<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <a href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel;?>&sex=<?php echo $sexsel; ?>&character_sex=<?php echo $sex_char;?>&effect=36" target="_blank" class="link_button"><i class="fa fa-plus"></i> Thêm châm ngôn (<?php echo $langsel;?>)</a>
</div>
</form>

<div id="form_loc" style="font-size: 11px;">
    <div style="display: inline-block;float: left;margin: 2px;">
        <i class="fa fa-book" aria-hidden="true"></i> có <?php echo mysqli_num_rows($result_tip);?> hiển thị / <?php echo mysqli_num_rows($result_tip_all);?> truyện ngắn
    </div>
</div>

<script>

function delete_table(id_row){
    if (confirm('Có chắc là sẽ xóa?')) {
        $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", //kiểu dũ liệu truyền đi
                data: "function=delete_chat&id="+id_row+"&lang=<?php echo $langsel;?>", //tham số truyền vào
                success: function(data, textStatus, jqXHR)
                {
                    $('.chat_row_'+id_row).remove();
                    alert('Delete success!!!');
                }
            
            });
        return false;
    }

}


</script>
<?php
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>Loại</th><th>Trả lời</th><th>chat</th><th>Giới tính</th><th>Chức năng</th><th>Giới hạng</th><th>Giọng</th><th>Action</th><th>Action</th></tr>';
        while ($row = mysqli_fetch_array($result_tip)) {
            $bnt_del='<a href="#" class="buttonPro small red" onclick="delete_table('.$row['id'].');return false;">Xóa</a>';
            echo show_row_chat_prefab($link,$row,$langsel,' '.$bnt_del);
        }
echo '</table>';
mysqli_free_result($result_tip);
?>

