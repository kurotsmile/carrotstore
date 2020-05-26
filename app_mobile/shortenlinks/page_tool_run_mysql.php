
 <?php
 $txt_mysql_val='';
if(isset($_POST['val_txt'])){
    $txt_mysql_val=$_POST['val_txt'];
}
 ?>
 <form method="post" name="act_chat_month" style="width: 600px;padding: 10px;" action="">
        <label><i class="fa fa-database" aria-hidden="true"></i> Nhập câu lệnh thực hiện mysql cho tất cả các nước với thẻ <strong>{lang}</strong> là tham số từ khóa ngôn ngữ</label><br />
        <textarea style="width:500px;height:200px;" name="val_txt"><?php echo $txt_mysql_val;?></textarea>
        <input type="hidden" value="command_mysql" name="func" />
        <br/>
        <input type="submit" value="Thực hiện" class="buttonPro blue" />
</form>
    <?php
    if(isset($_POST['func'])){
        $list_country=mysqli_query($link,"SELECT `key` FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1'");
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