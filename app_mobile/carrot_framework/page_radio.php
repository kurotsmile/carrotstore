<?php
$list_country=$this->get_list_lang();
$item_country=$list_country[0];
$lang=$item_country['key'];if(isset($_GET['lang']))$lang=$_GET['lang'];
$cur_url=$this->cur_url;
$func='list';

if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
?>
<div class="cms_tool_page">
    <a class="buttonPro small <?php if($func=='list'){?>yellow<?php }?>" href="<?php echo $cur_url;?>&func=list&lang=<?php echo $lang;?>"><i class="fa fa-list" aria-hidden="true"></i> Danh sách</a>
    <a class="buttonPro small <?php if($func=='add'){?>yellow<?php }?>" href="<?php echo $cur_url;?>&func=add&lang=<?php echo $lang;?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm đài phát thanh</a>
</div>
<?php
if($func=='list'){
if(isset($_GET['del'])){
    $id_del=$_GET['del'];
    $q_del=$this->q("DELETE FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE (`id` = '$id_del');");
    if($q_del){
        $path_icon='../../app_mygirl/obj_radio/icon_'.$id_del.'.png';
        if(file_exists($path_icon)) unlink($path_icon);
        echo $this->msg("Xóa thành công đài phát thanh $id_del !");
    }
}
?>
<div class="cms_menu_lang">
<?php
    for($i=0;$i<count($list_country);$i++){
        $item_country=$list_country[$i];
        if($lang==$item_country['key'])$style_active='class="active"';else $style_active="";
        $url_cur_func=$this->cur_url."&lang=".$item_country["key"];
        echo '<a href="'.$url_cur_func.'" '.$style_active.'><i class="fa fa-globe" aria-hidden="true"></i> '.$item_country["name"].'</a>';
    }
?>
</div>

<?php
$list_radio=$this->q("SELECT * FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `lang` = '$lang'");
?>
<table>
    <?php 
    while($r=mysqli_fetch_assoc($list_radio)){
        $r_id=$r['id'];
        $icon_radio=$this->url_carrot_store.'/thumb.php?src='.$this->url_carrot_store.'/app_mygirl/obj_radio/icon_'.$r_id.'.png&size=30';
    ?>
    <tr>
        <td><?php echo $r['id'];?></td>
        <td><img src="<?php echo $icon_radio;?>"/></td>
        <td><?php echo $r['name_radio'];?></td>
        <td><a target="_blank" href="<?php echo $r['stream'];?>"><?php echo $r['stream'];?></a></td>
        <td>
            <a href="<?php echo $cur_url;?>&func=edit&lang=<?php echo $lang;?>&id=<?php echo $r_id;?>" class="buttonPro small yellow"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
            <a href="<?php echo $cur_url;?>&del=<?php echo $r_id;?>&lang=<?php echo $lang;?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php }?>
</table>
<?php }?>

<?php
if($func=='add'||$func=='edit'){
$r_name='';
$r_stream='';
$id_edit='';
$r_icon=$this->url_carrot_store.'/images/128.png';

if(isset($_POST['r_name'])){
    $r_name=$_POST['r_name'];
    $r_stream=$_POST['r_stream'];
    $lang=$_POST['r_lang'];
    $func=$_POST['r_func'];
    if($func=='add'){
        $q_add=$this->q("INSERT INTO carrotsy_virtuallover.`app_my_girl_radio` (`name_radio`, `stream`, `lang`) VALUES ('$r_name', '$r_stream', '$lang');");
        if($q_add){
            echo $this->msg("Thêm mới thành công!");
            $id_edit=mysqli_insert_id($this->link_mysql);
        }
    }

    if($func=='edit'){
        $id_edit=$_POST['r_id'];
        $q_update=$this->q("UPDATE carrotsy_virtuallover.`app_my_girl_radio` SET `name_radio`='$r_name', `stream`='$r_stream', `lang`='$lang' WHERE `id`='$id_edit';");
        if($q_update) echo $this->msg("Cập nhật thành công!");
    }

    if(isset($_FILES['r_icon'])&&$id_edit!=''){
        $path_upload="../../app_mygirl/obj_radio/icon_".$id_edit.".png";
        move_uploaded_file($_FILES['r_icon']['tmp_name'], $path_upload);
    }
}

if($func=='edit'){
    $id_edit=$_GET['id'];
    $data_r=$this->q_data("SELECT `name_radio`,`stream` FROM carrotsy_virtuallover.`app_my_girl_radio` WHERE `id` = '$id_edit' LIMIT 1");
    $r_name=$data_r['name_radio'];
    $r_stream=$data_r['stream'];
    if(file_exists('../../app_mygirl/obj_radio/icon_'.$id_edit.'.png')) $r_icon=$this->url_carrot_store.'/app_mygirl/obj_radio/icon_'.$id_edit.'.png';
}
?>
<form action="" method="post" style="width:auto;float:left" enctype="multipart/form-data">
<table>
    <tr>
        <td>Biểu tượng (png)</td>
        <td>
            <?php if($r_icon!=''){?><img src="<?php echo $r_icon;?>"/><br/><?php }?>
            <input type="file" name="r_icon" id="r_icon"/>
        </td>
        <td> </td>
    </tr>
    <tr>
        <td>Tên đài phát thanh</td>
        <td><input type="text" name="r_name" id="r_name" value="<?php echo $r_name;?>"></td>
        <td><?php echo $this->cp("r_name");?></td>
    </tr>
    <tr>
        <td>Liên kết trực tiếp kênh</td>
        <td><input type="text" name="r_stream" id="r_stream" value="<?php echo $r_stream;?>"></td>
        <td><?php echo $this->cp("r_stream");?></td>
    </tr>
    <tr>
        <td>Quốc gia</td>
        <td>
            <select name="r_lang">
            <?php
            for($i=0;$i<count($list_country);$i++){
                $l_item=$list_country[$i];
            ?>
            <option <?php if($lang==$l_item['key']) echo 'selected="true"';?> value="<?php echo $l_item['key'];?>"><?php echo $l_item['name'];?></option>
            <?php }?>
            </select>
        </td>
        <td> </td>
    </tr>
</table>
<button class="buttonPro green">Hoàn tất</button>
<input type="hidden" value="<?php echo $func;?>" name="r_func"/>
<input type="hidden" value="<?php echo $id_edit;?>" name="r_id"/>
<a href="<?php echo $cur_url;?>&func=list&lang=<?php echo $lang;?>" class="buttonPro"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Trở về</a>
</form>
<?php }?>