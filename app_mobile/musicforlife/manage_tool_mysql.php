<form method="post" name="act_chat_month" style="width: 200px;padding: 10px;">
    <label><i class="fa fa-database" aria-hidden="true"></i> Nhập câu lệnh thực hiện mysql cho tất cả các nước với thẻ <strong>{lang}</strong> là tham số từ khóa ngôn ngữ</label><br />
    <textarea style="width: 300px;height: 400px;" name="val_txt"><?php if(isset($_GET['val_txt'])){ echo $_GET['val_txt'];} ?></textarea>
    <input name="act" value="create" type="hidden" />
    <input type="hidden" value="command_mysql" name="func" />
    <input type="submit" value="Thực hiện" class="buttonPro blue" />
</form>
<?php
if(isset($_POST['act'])){
    $txt_mysql_val=$_POST['val_txt'];
    $list_country=mysqli_query($link,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1'");
    while($l=mysqli_fetch_array($list_country)){
        $langsel=$l['key'];
        $txt_mysql=str_replace('{lang}',$langsel,$txt_mysql_val);
        $query_create=mysqli_query($link,$txt_mysql);
        if(mysqli_error($link)==""){
            echo "Thự hiện câu lệnh thành công nước (".$langsel.")<br/>";
        }else{
            echo "Thự hiện câu lệnh thành công nước (".$langsel.")<br/>";
            echo mysqli_error($link)."<br/>";
        }
    }
}
?>