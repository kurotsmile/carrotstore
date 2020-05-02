
<?php
include "app_my_girl_template.php";
$langsel=$_GET['lang'];
$timezone='';
$list_log=mysqli_query($link,"SELECT `data`,`dates` FROM `app_my_girl_log_data` ");

$char_category=array();
$char_data=array();
while($row_log=mysqli_fetch_array($list_log)){
    array_push($char_category,$row_log['dates']);
    $d=json_decode($row_log['data']);
    foreach($d as $d_log){
        if($d_log->key==$langsel){
            array_push($char_data,$d_log->count);
        }
    }
}
$list_log_android=mysqli_query($link,"SELECT COUNT(`id_device`) FROM `app_my_girl_key` WHERE `lang` = '$langsel' AND `os` = 'android' ");
$data_log_android=mysqli_fetch_array($list_log_android);
$list_log_ios=mysqli_query($link,"SELECT COUNT(`id_device`) FROM `app_my_girl_key` WHERE `lang` = '$langsel' AND `os` = 'ios' ");
$data_log_ios=mysqli_fetch_array($list_log_ios);
?>

<script src="<?php echo $url;?>/js/Chart.min.js"></script>
<h2><img src="<?php echo  thumb('/app_mygirl/img/'.$langsel.'.png','50');?>" style="width: 20px;margin-right: 2px;float: left;" /> (<?php echo  $langsel;?>) <?php echo show_name_country_by_key($link,$langsel); ?></h2><br />

<?php
if(isset($_GET['func'])){
    $func=$_GET['func'];
    if($func=='act_msg'){
        $array_id=$_GET['msg_act'];
        $disable=0;
        if(isset($_GET['submit_1'])){
            $disable=0;
        }else{
            $disable=1;
        }
        echo implode(',', array_map('intval', $array_id));
        $mysql_act=mysqli_query($link,"UPDATE `app_my_girl_msg_$langsel` SET `disable` = '$disable' WHERE `id` IN (". implode(',', array_map('intval', $array_id)) . ")");
    }
}
?>
<div style="width: 100%;float:left;background-color: none !important;" id="menu_child_home">
    <a href="#"><i class="fa fa-android" aria-hidden="true"></i> Thiết bị Android đang hoặt động <strong><?php echo $data_log_android[0]; ?></strong></a>
    <a href="#"><i class="fa fa-apple" aria-hidden="true"></i> Thiết bị Ios đang hoặt động <strong><?php echo $data_log_ios[0]; ?></strong></a>
    <a href="<?php echo $url;?>/app_my_girl_handling.php?func=event_management"><i class="fa fa-calendar" aria-hidden="true"></i> Kích hoặt sự kiện</a>
     <?php echo $timezone;?>
</div>
<?php
mysqli_free_result($list_log_android);
mysqli_free_result($list_log_ios);
?>
<canvas id="myChart" style="position: relative;" width="100%" height="20px"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($char_category) ?>,
                        datasets: [{
                            label: "<?php echo  $langsel;?>",
                            backgroundColor: '#944dff',
                            borderColor: '#944dff',
                            fill:false,
                            data: <?php echo json_encode($char_data) ?>,
                        }]
                    },

    options: {}
});
</script>
<?php
function _date($format="r", $timestamp=false, $timezone=false)
{
    $userTimezone = new DateTimeZone(!empty($timezone) ? $timezone : 'GMT');
    $gmtTimezone = new DateTimeZone('GMT');
    $myDateTime = new DateTime(($timestamp!=false?date("r",(int)$timestamp):date("r")), $gmtTimezone);
    $offset = $userTimezone->getOffset($myDateTime);
    return date($format, ($timestamp!=false?(int)$timestamp:$myDateTime->format('U')) + $offset);
}

$house=_date('H', false,$timezone);
$house=intval($house);

$date = date('Y/m/d', time());

if(isset($_POST['date_sel'])){
      $date=$_POST['date_sel'];
}
$date_in_month=date('d', strtotime($date));
$weekday = date('l', strtotime($date));
$month=date('m', strtotime($date));
?>
<form id="frm_seach" action="<?php echo $url; ?>/app_my_girl_info_country.php?lang=<?php echo $langsel;  ?>" method="post" >
    <div class="col">
    <label style="float: left;"><i class="fa fa-calendar" aria-hidden="true"></i> Ngày Xem</label>
    </div>
    <div class="col">
    <input type="text" style="float: left;width: 150px;" value="" id="datepicker" name="date_sel"  onchange="$('#frm_seach').submit();" style="width: 200px;" />
    </div>
</form>
<h2>Sự kiên trong ngày chờ được kích hoạt (ngày:<?php echo $date_in_month;?>, tháng <?php echo $month;?>)</h2>
<form method="get" action="<?php echo $url;?>/app_my_girl_info_country.php">
<?php
$query_msg_current=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `limit_month` = '$month' AND `limit_date` = '$date_in_month'");
if(mysqli_num_rows($query_msg_current)>0){
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>func</th><th>chat</th><th>Character sex</th><th>Ver 1</th><th>Ver 2</th><th>Giới hạng</th><th>Audio</th><th>Disable</th><th>Action</th></tr>';
while($row_mssg=mysqli_fetch_array($query_msg_current)){
     $btn_check='<input style="width:auto" type="checkbox" name="msg_act[]" value="'.$row_mssg['id'].'" />';
    show_row_msg_prefab($link,$row_mssg,$langsel,$btn_check);
}
echo '</table>';
}else{
    echo '<br/><b style="float:left;width:90%">Không có!</b>';
}

if(mysqli_num_rows($query_msg_current)>0){
?>
<input style="width: auto; display: inline-block;" type="submit" value="Bật" name="submit_1" class="buttonPro small blue" />
<input style="width: auto; display: inline-block;"  type="submit" value="tắc" name="submit_2" class="buttonPro small red" />
<input style="width: auto; display: inline-block;"  type="hidden" value="<?php echo $langsel;?>" name="lang" />
<input style="width: auto; display: inline-block;"  type="hidden" value="act_msg" name="func" />
<?php
}
mysqli_free_result($query_msg_current);
?>
</form>

<h2>Sự kiên trong ngày chưa tắt kích hoặt (ngày:<?php echo $date_in_month;?>, tháng <?php echo $month;?>)</h2>

<form method="get" action="<?php echo $url;?>/app_my_girl_info_country.php">
<?php
$query_msg_current=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `limit_month` = '$month' AND `limit_date` != '$date_in_month' AND `disable`='0' AND `limit_date` != ''");
if(mysqli_num_rows($query_msg_current)>0){
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>func</th><th>chat</th><th>Character sex</th><th>Ver 1</th><th>Ver 2</th><th>Giới hạng</th><th>Audio</th><th>Disable</th><th>Action</th></tr>';
while($row_mssg=mysqli_fetch_array($query_msg_current)){
    $btn_check='<input style="width:auto" type="checkbox" name="msg_act[]" value="'.$row_mssg['id'].'" />';
    show_row_msg_prefab($row_mssg,$langsel,$btn_check);
}
echo '</table>';
}else{
    echo '<br/><b style="float:left;width:90%">Không có!</b>';
}

if(mysqli_num_rows($query_msg_current)>0){
?>
<input style="width: auto; display: inline-block;" type="submit" value="Bật" name="submit_1" class="buttonPro small blue" />
<input style="width: auto; display: inline-block;"  type="submit" value="tắc" name="submit_2" class="buttonPro small red" />
<input style="width: auto; display: inline-block;"  type="hidden" value="<?php echo $langsel;?>" name="lang" />
<input style="width: auto; display: inline-block;"  type="hidden" value="act_msg" name="func" />
<?php
}
mysqli_free_result($query_msg_current);
?>
</form>
  <script>
  $(document).ready(function(){
    $("#datepicker").datepicker();
    $("#datepicker").datepicker("option", "dateFormat","yy-mm-dd");
    $("#datepicker").val("<?php echo $sel_date;?>");
  });
  </script>
<h2><i class="fa fa-clock-o" aria-hidden="true"></i> Sự kiện theo giờ <?php echo _date('H:i:s', false,'Asia/Ho_Chi_Minh');?> <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=chao_<?php echo $house; ?>"><img src="<?php echo $url;?>/app_mygirl/img/0.png" /></a> <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=chao_<?php echo $house; ?>&sex=1&character_sex=0"><img src="<?php echo $url;?>/app_mygirl/img/1.png" /></a></h2> 
<?php
$list_msg_event=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `func` = 'chao_$house'");
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>func</th><th>chat</th><th>Character sex</th><th>Ver 1</th><th>Ver 2</th><th>Giới hạng</th><th>Audio</th><th>Disable</th><th>Action</th></tr>';
        while ($row = mysqli_fetch_assoc($list_msg_event)) {
            show_row_msg_prefab($link,$row,$langsel);
        }
echo '</table>';
mysqli_free_result($list_msg_event);


?>

<h2><i class="fa fa-calendar" aria-hidden="true"></i> Sự kiện trong ngày <?php echo $weekday; ?> 
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=dam&limit_day=<?php echo $weekday; ?>" class="buttonPro blue small"><i class="fa fa-male"></i> Đấm nam</a>
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=dam&sex=1&character_sex=0&limit_day=<?php echo $weekday; ?>" class="buttonPro blue small"><i class="fa fa-female"></i> Đấm nữ</a>
    
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=bat_chuyen&limit_day=<?php echo $weekday; ?>" class="buttonPro blue small"><i class="fa fa-male"></i> Bắt chuyện</a>
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=bat_chuyen&sex=1&character_sex=0&limit_day=<?php echo $weekday; ?>" class="buttonPro blue small"><i class="fa fa-female"></i> Bắt chuyện</a>
</h2>
<?php
$list_msg_event=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `limit_day` = '$weekday'");
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>func</th><th>chat</th><th>Character sex</th><th>Ver 1</th><th>Ver 2</th><th>Giới hạng</th><th>Audio</th><th>Disable</th><th>Action</th></tr>';
        while ($row = mysqli_fetch_array($list_msg_event)) {
            show_row_msg_prefab($link,$row,$langsel);
        }
echo '</table>';
mysqli_free_result($list_msg_event);
?>


<h2><i class="fa fa-calendar-o" aria-hidden="true"></i> Sự kiện trong tháng <?php echo $month; ?> 
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=dam&limit_month=<?php echo $month; ?>" class="buttonPro blue small"><i class="fa fa-male"></i> Đấm nam</a>
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=dam&sex=1&character_sex=0&limit_month=<?php echo $month; ?>" class="buttonPro blue small"><i class="fa fa-female"></i> Đấm nữ</a>
    
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=bat_chuyen&limit_month=<?php echo $month; ?>" class="buttonPro blue small"><i class="fa fa-male"></i> Bắt chuyện</a>
    <a target="_blank" href="<?php echo $url;?>/app_my_girl_add.php?lang=<?php echo $langsel; ?>&msg=1&func=bat_chuyen&sex=1&character_sex=0&limit_month=<?php echo $month; ?>" class="buttonPro blue small"><i class="fa fa-female"></i> Bắt chuyện</a>
</h2>
<?php
$list_msg_event=mysqli_query($link,"SELECT * FROM `app_my_girl_msg_$langsel` WHERE `limit_month` = '$month' AND `limit_date`=''");
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>id</th><th>func</th><th>chat</th><th>Character sex</th><th>Ver 1</th><th>Ver 2</th><th>Giới hạng</th><th>Audio</th><th>Disable</th><th>Action</th></tr>';
        while ($row = mysqli_fetch_array($list_msg_event)) {
            show_row_msg_prefab($link,$row,$langsel);
        }
echo '</table>';
mysqli_free_result($list_msg_event);

?>


<?php
$get_list_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `limit_month` = '$month'");
if(mysqli_num_rows($get_list_chat)>0){
?>
<h2>Trò chuyện tương ứng tháng <?php echo $month; ?></h2>
<table>
    <?php
        while($row=mysqli_fetch_array($get_list_chat)){
            show_row_chat_prefab($link,$row,$langsel,'');
        }
    ?>
</table>
<?php  
}
?>

<?php
$get_list_chat=mysqli_query($link,"SELECT * FROM `app_my_girl_$langsel` WHERE `limit_month` != '$month' AND `limit_month` != '0'");
if(mysqli_num_rows($get_list_chat)>0){
?>
<h2><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Trò chuyện không phải trong tháng <?php echo $month; ?></h2>
<table>
    <?php
        while($row=mysqli_fetch_array($get_list_chat)){
            echo show_row_chat_prefab($link,$row,$langsel,'');
        }
    ?>
</table>
<?php  
}
?>