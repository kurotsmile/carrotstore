<?php
include "app_my_girl_template.php";

$sex='0';
$langsel='vi';
$character_sex='1';

$key_search='';
$txt_query_search='';

$type_chat_see='';
$txt_type_chat_see_query='';

$id_chat_see='';
$txt_id_chat_see_query='';

$id_device='';
$txt_id_device='';

$view_group='0';
$sel_date=date('Y/m/d', time());


if(isset($_GET['lang'])){
    $langsel=$_GET['lang'];
}

if(isset($_GET['sex'])){
    $sex=$_GET['sex'];
}


if(isset($_GET['character_sex'])){
    $character_sex=$_GET['character_sex'];
}

if(isset($_GET['id_chat_see'])){
    $id_chat_see=$_GET['id_chat_see'];
    $txt_id_chat_see_query=" AND `id_question` = '$id_chat_see' ";
}

if(isset($_GET['type_chat_see'])){
    $type_chat_see=$_GET['type_chat_see'];
    $txt_type_chat_see_query=" AND `type_question` = '$type_chat_see' ";
}


if(isset($_POST['sex'])){
    $sex=$_POST['sex'];
    $langsel=$_POST['lang'];
    $character_sex=$_POST['character_sex'];

    if($_POST['key_search']!=''){
        $key_search=$_POST['key_search'];
        $txt_query_search=" AND `key` LIKE '%".$key_search."%' ";
    }
    
    if($_POST['type_chat_see']!=''){
        $type_chat_see=$_POST['type_chat_see'];
        $txt_type_chat_see_query=" AND `type_question` = '$type_chat_see' ";
    }
    
    if($_POST['id_chat_see']!=''){
        $id_chat_see=$_POST['id_chat_see'];
        $txt_id_chat_see_query=" AND `id_question` = '$id_chat_see' ";
    }
    
    if($_POST['id_device']!=''){
        $id_device=$_POST['id_device'];
        $txt_id_device=" AND `id_device` = '$id_device'";
    }
}


$result_tip=mysqli_query($link,"SELECT COUNT(`key`) as c, `key`,`lang`,`sex`,`os`,`character_sex`,`character`,`version`,`id_question`,`type_question`,`id_device`,`location_lon`,`location_lat`,`dates` FROM `app_my_girl_key` WHERE `sex` = '$sex' AND `lang`='$langsel'  AND `character_sex`='$character_sex' $txt_query_search $txt_type_chat_see_query $txt_id_chat_see_query  $txt_id_device GROUP BY `key` ORDER BY RAND() LIMIT 50"); 

?>
<script>
    function view_device(id_device,date,lang){
        var character_sex="<?php echo $character_sex;?>";
        var sex="<?php echo $sex;?>";
            $.ajax({
                url: "app_my_girl_jquery.php",
                type: "get", 
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
            type: "get",
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
            type: "get",
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
            type: "get",
            data: "function=view_history_see&id="+id_chat+"&type="+type_chat+"&lang="+lang+"&sex="+sex+"&char_sex="+char_sex, //tham số truyền vào
            success: function(data, textStatus, jqXHR)
            {
               show_box(data);
            }
        
        });
    return false;
  }
</script>
  
<form method="post" id="form_loc">

<div style="display: inline-block;float: left;margin: 2px;">
<label>Đối tượng:</label> 
<select name="sex" >
    <option value="0" <?php if($sex=='0'){?> selected="true"<?php }?>>Nam</option>
    <option value="1" <?php if($sex=='1'){?> selected="true"<?php }?>>Nữ</option>
</select>
</div>

<div style="display: inline-block;float: left;margin: 2px;">
<label>Giới tính nhân vật:</label> 
<select name="character_sex" >
    <option value="0" <?php if($character_sex=='0'){?> selected="true"<?php }?>>Nam</option>
    <option value="1" <?php if($character_sex=='1'){?> selected="true"<?php }?>>Nữ</option>
</select>
</div>


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

<div style="display: inline-block;float: left;margin: 2px;width: 193px;">
<label>Từ khóa:</label> 
<input type="text" id="key_search" name="key_search" value="<?php echo $key_search;?>" />
</div>


<div style="display: inline-block;float: left;margin: 2px;width: 193px;">
<label>Loại trò chuyện người dùng thấy:</label> 
<select name="type_chat_see" >
    <option value="" <?php if($type_chat_see==''){?> selected="true"<?php }?>>None</option>
    <option value="msg" <?php if($type_chat_see=='msg'){?> selected="true"<?php }?>>Msg</option>
    <option value="chat" <?php if($type_chat_see=='chat'){?> selected="true"<?php }?>>chat</option>
</select>
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 193px;">
<label>ID trò chuyện người dùng thấy:</label> 
<input type="text" id="id_chat_see" name="id_chat_see" value="<?php echo $id_chat_see;?>" />
</div>

<div style="display: inline-block;float: left;margin: 2px;width: 193px;">
<label>ID Device:</label> 
<input type="text" id="id_device" name="id_device" value="<?php echo $id_device;?>" />
</div>

<div style="display: inline-block;float: left;margin: 2px;">
    <input type="submit" name="loc" value="Lọc" class="link_button" />
</div>
</form>

<?php include "app_my_girl_history_nomal.php"; ?>