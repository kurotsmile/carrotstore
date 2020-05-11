<div class="contain" style="padding: 20px;">
<strong> <i class="fa fa-calendar" aria-hidden="true"></i> kích hoạt các sự kiện trong tháng</strong><br />
<form name="frm_month_act" id="form_loc" action="<?php echo $url;?>/app_my_girl_handling.php"  method="get">
<?php
$date = date('Y/m/d', time());
$month=date('m', strtotime($date));

$month_act='';

?>
    <p>
        Nhập tháng kích hoạt, những tháng khác với tháng này sẽ tạm ẩn không hoạt động
    </p>
    
    <p>
        <strong>Chọn tháng</strong>
        <select name="month_activer">
        <?php for($i=1;$i<=12;$i++){ ?>
            <option value="<?php echo $i; ?>" <?php if($month==$i){?>selected="true"<?php }?>>Tháng <?php echo $i; ?></option>
        <?php }?>
        </select>
    </p>
    
    <p style="margin-top: 20px;">
        <input type="submit" value="Hoàn tất" style="width: 150px !important;" class="buttonPro blue"/>
        <input type="hidden" value="event_management" name="func" />
    </p>
</form>
    <?php
    if(isset($_GET['month_activer'])){
        $month_act=$_GET['month_activer'];

        $query_list_lang=mysqli_query($link,"SELECT * FROM `app_my_girl_country` WHERE `ver0` = '1' AND `active` = '1' ORDER BY `id`");
        echo '<ul style="width:90%;float:left">';
        while($row_lang=mysqli_fetch_array($query_list_lang)){
            $langsel=$row_lang['key'];
            $lang_name=$row_lang['name'];
            
            //update msg
            $mysql_update1_lang=mysqli_query($link,"UPDATE `app_my_girl_msg_$langsel` SET `disable` = '1' WHERE `limit_month` != '$month_act' AND `limit_month` != '' AND limit_date = ''");
            $mysql_update2_lang=mysqli_query($link,"UPDATE `app_my_girl_msg_$langsel` SET `disable` = '0' WHERE `limit_month` = '$month_act' AND `limit_month` != '' AND limit_date = ''");
            if(mysqli_error($link)!=""){
               echo mysqli_error($link);
            }
            
            //update chat
            $mysql_update1_chat=mysqli_query($link,"UPDATE `app_my_girl_$langsel` SET `disable` = '1' WHERE `limit_month` != '$month_act' AND `limit_month` != '0'");
            $mysql_update2_chat=mysqli_query($link,"UPDATE `app_my_girl_$langsel` SET `disable` = '0' WHERE `limit_month` = '$month_act' AND `limit_month` != '0'");
            if(mysqli_error($link)!=""){
               echo mysqli_error($link);
            }
            
            echo "<li>Kích hoạt thành công tháng ($month_act) của nước $lang_name !</li>";
        }
        echo '</ul>';
    }
    ?>
</div>