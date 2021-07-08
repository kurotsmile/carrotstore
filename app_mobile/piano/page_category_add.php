<?php
$name_category='';
$func='add';

if(isset($_GET['name_category'])){
    $name_category=$_GET['name_category'];
    $func='update';
}

if(isset($_POST['name_category'])){
    $name_category=$_POST['name_category'];
    $func=$_POST['func'];

    if($name_category==''){
        echo $this->msg('Tên chuyên mục không được để trống');
    }else{
        if($func=='add'){
            $query_add_cat=$this->q("INSERT INTO `category` (`name`) VALUES ('$name_category');");
            if($query_add_cat){
                echo $this->msg('Thêm chủ đề '.$name_category.' thành công! ');
                $name_category='';
            }
        }else{
            $name_new_category=$_POST['name_new_category'];
            $query_update_cat=$this->q("UPDATE `category` SET `name` = '$name_new_category' WHERE `name` = '$name_category' LIMIT 1;");
            if($query_update_cat){
                echo $this->msg('Cập nhật tên chủ đề từ '.$name_category.' sang '.$name_new_category.' thành công! ');
                $query_midi_update=$this->q("UPDATE `midi` SET `category`='$name_new_category' WHERE `category`='$name_category'");
            }
        }
    }
}
?>

<form method="post">
<table style="width:auto;">
    <tr>
        <td>Tên chuyên mục (lang_key):</td>
        <td><input value="<?php echo $name_category;?>" type="text" name="name_category" ></td>
    </tr>
    <?php if($func!='add'){?>
        <tr>
        <td>Tên chuyên mục Mới:</td>
        <td><input value="" type="text" name="name_new_category" ></td>
    </tr>
    <?php }?>
    <tr>
        <td>&nbsp</td>
        <td>
        <?php if($func=='add'){?>
            <input type="submit" value="Thêm mới" class="buttonPro green"/>
            <input type="hidden" value="add" name="func"/>
        <?php }else{?>
            <input type="submit" value="Cập nhật" class="buttonPro yellow"/>
            <input type="hidden" value="update" name="func"/>
        <?php }?>
        </td>
    </tr>
</table>
</form>