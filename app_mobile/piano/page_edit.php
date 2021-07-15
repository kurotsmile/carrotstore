<?php
$id_midi='';
if(isset($_GET['id'])) $id_midi=$_GET['id'];

$user_id_midi='b8aab5bff0258b764ea64e5a8cc1dfb2aad4a9c6';
$user_lang_midi='vi';
$speed_midi='0.2';
$name_midi='';
$sell_midi=0;
$category_midi="";
$level_midi="";
$author_midi="";

if(isset($_POST['name_midi'])){
    $id_midi=$_POST['id_midi'];
    $name_midi=addslashes($_POST['name_midi']);
    $speed_midi=$_POST['speed_midi'];
    $sell_midi=$_POST['sell_midi'];
    $level_midi=$_POST['level_midi'];
    $author_midi=addslashes($_POST['author_midi']);
    $category_midi=addslashes($_POST['category_midi']);
    $user_id_midi=$_POST['user_id_midi'];
    $q_update_midi=$this->q("UPDATE `midi` SET `id_device`='$user_id_midi',`name`='$name_midi',`speed`='$speed_midi',`sell`='$sell_midi',`author`='$author_midi',`level`='$level_midi',`category`='$category_midi' WHERE `id_midi`='$id_midi' LIMIT 1;");
    if($q_update_midi)
        echo $this->msg("Cập nhật midi thành công!");
    else
        echo $this->msg("Cập nhật midi không thành công!");
}

if($id_midi!=''){
    $data_midi=$this->q_data("SELECT * FROM `midi` WHERE `id_midi`='$id_midi' LIMIT 1");
    $title_midi='Cập nhật Midi';
    $name_midi=$data_midi['name'];
    $speed_midi=$data_midi['speed'];
    $sell_midi=$data_midi['sell'];
    $level_midi=$data_midi['level'];
    $author_midi=$data_midi['author'];
    $category_midi=$data_midi['category'];
    $user_id_midi=$data_midi['id_device'];
}
?>
<form method="post" action="">
<h2 style="width:80%;padding:5px;float:left"><?php echo $title_midi;?></h2>
<table style="float:left" class="edit">
    <tr>
        <td>Tên midi</td>
        <td><input type="text" id="name_midi" name="name_midi" value="<?php echo $name_midi;?>"></td>
        <td><?php echo $this->cp('name_midi');?></td>
    </tr>

    <tr>
        <td>Tốc độ đánh</td>
        <td><input type="text" id="speed_midi" name="speed_midi" value="<?php echo $speed_midi;?>"></td>
        <td>&nbsp</td>
    </tr>

    <tr>
        <td>Tình trạng</td>
        <td>
            <select id="sell_midi" name="sell_midi">
                <option value="0" <?php if($sell_midi=='0'){ echo 'selected=true'; };?>>Bản nháp</option>
                <option value="1" <?php if($sell_midi=='1'){ echo 'selected=true'; };?>>Xuất bản</option>
                <option value="2" <?php if($sell_midi=='2'){ echo 'selected=true'; };?>>Thương mại hóa</option>
                <option value="3" <?php if($sell_midi=='3'){ echo 'selected=true'; };?>>Lưu trữ</option>
            </select>
        </td>
        <td>&nbsp</td>
    </tr>

    <tr>
        <td>Cấp độ</td>
        <td>
            <select id="level_midi" name="level_midi">
                <option value="0" <?php if($level_midi=='0'){ echo 'selected=true'; };?>>Dễ</option>
                <option value="1" <?php if($level_midi=='1'){ echo 'selected=true'; };?>>Trung bình</option>
                <option value="2" <?php if($level_midi=='2'){ echo 'selected=true'; };?>>Khó</option>
            </select>
        </td>
        <td>&nbsp</td>
    </tr>

    <tr>
        <td>Tác gải</td>
        <td><input type="text" id="author_midi" name="author_midi" value="<?php echo $author_midi;?>"></td>
        <td><?php echo $this->cp('author_midi');?></td>
    </tr>

    <tr>
        <td>Chủ đề</td>
        <td>
            <select id="category_midi" name="category_midi">
                <option value="" <?php if($category_midi==''){ echo 'selected=true'; };?>>Không chọn</option>
                <?php
                    $query_list_category=$this->q("SELECT `name` FROM `category`");
                    while($row_category=mysqli_fetch_assoc($query_list_category)){
                ?>
                    <option value="<?php echo $row_category['name'];?>" <?php if($category_midi==$row_category['name']){ echo 'selected=true'; };?>><?php echo $row_category['name'];?></option>
                <?php } ?>
            </select>
        </td>
        <td>&nbsp</td>
    </tr>

    <tr>
        <td>Id người đăng</td>
        <td><input type="text" id="user_id_midi" name="user_id_midi" value="<?php echo $user_id_midi;?>"></td>
        <td><?php echo $this->cp('user_id_midi');?></td>
    </tr>

    <tr>
        <td>Quốc gia của người đăng</td>
        <td>
            <select id="user_lang_midi" name="user_lang_midi">
                <?php
                    $list_lang=$this->get_list_lang();
                    for($i=0;$i<count($list_lang);$i++){
                        $item_lang=$list_lang[$i];
                ?>
                    <option vlaue="<?php echo $item_lang["key"];?>"><?php echo $item_lang["key"];?> - <?php echo $item_lang["name"];?></option>
                <?php }?>
            </select>
        </td>
        <td>&nbsp</td>
    </tr>
</table>
<input type="hidden" name="id_midi" value="<?php echo $id_midi;?>"/>
<button class="buttonPro purple"><i class="fa fa-check-circle" aria-hidden="true"></i> Cập nhật</button>
</form>