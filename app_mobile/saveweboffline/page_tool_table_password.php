<?php
$lang_sel='vi';

if(isset($_POST['lang_sel'])) $lang_sel=$_POST['lang_sel'];
if(isset($_GET['lang_sel'])) $lang_sel=$_GET['lang_sel'];
?>
<form method="post" action="" class="form">
    <label for="lang_sel">Quốc gia muốn tạo bản <b>Password</b></label>
    <br/>
    <select name="lang_sel" id="lang_sel">
    <?php
    $query_list_country=mysqli_query($link,"SELECT `key`,`name` FROM carrotsy_virtuallover.`app_my_girl_country`");
    while($row_country=mysqli_fetch_assoc($query_list_country)){
    ?>
        <option value="<?php echo $row_country['key'];?>" <?php if($lang_sel==$row_country['key']){ echo 'selected'; } ?>><?php echo $row_country['name'];?></option>
    <?php
    }
    ?>
    </select>
    <br/>
    <input class="buttonPro red" type="submit" value="Thự hiện"/>
</form>

<?php
if(isset($_POST['lang_sel'])){
    $txt_mysql_create_table="
        CREATE TABLE `web_$lang_sel` (
            `id` varchar(50) NOT NULL,
            `id_user` varchar(100) NOT NULL,
            `data` text NOT NULL,
            `url` text NOT NULL
        )
    ";
    if(mysqli_query($link,$txt_mysql_create_table)){
        echo alert('Tạo bản mật khẩu thành công nước ('.$lang_sel.')','alert');
    }else{
        echo alert('Bản mật khẩu này đã có!','error');
    }
}
?>