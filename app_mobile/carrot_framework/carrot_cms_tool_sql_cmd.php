
<form method="post" name="act_chat_month" style="width: 200px;padding: 10px;">
    <label><i class="fa fa-database" aria-hidden="true"></i> Nhập câu lệnh thực hiện mysql cho tất cả các nước với thẻ <strong>{lang}</strong> là tham số từ khóa ngôn ngữ</label><br />
    <textarea name="val_txt" style="width:100%;height:150px;"><?php if(isset($_POST['val_txt'])){ echo $_POST['val_txt'];} ?></textarea>
    <input name="act" value="create" type="hidden" />
    <input type="hidden" value="command_mysql" name="func" />
    <input type="hidden" value="6" name="menu" />
    <input type="hidden" value="sql_cmd" name="tool" />
    <input type="submit" value="Thực hiện" class="buttonPro blue" />
</form>

<?php
    if(isset($_POST['act'])){
        $txt_mysql_val=$_POST['val_txt'];
        $list_country=mysqli_query($this->link_mysql,"SELECT * FROM carrotsy_virtuallover.`app_my_girl_country` WHERE `active`='1'");
        while($l=mysqli_fetch_array($list_country)){
                $langsel=$l['key'];
                $txt_mysql=str_replace('{lang}',$langsel,$txt_mysql_val);
                $query_create=mysqli_query($this->link_mysql,$txt_mysql);
                if(mysqli_error($this->link_mysql)==""){
                    echo "Thự hiện câu lệnh thành công nước (".$langsel.")<br/>";
                }else{
                    echo "Thự hiện câu lệnh thành công nước (".$langsel.")<br/>";
                    echo mysqli_error($this->link_mysql)."<br/>";
                }
        }
    }
?>