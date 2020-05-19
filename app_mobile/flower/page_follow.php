<?php
$lang='vi';
$to_day=date("Y-m-d");
$sel_date=date("Y-m-d");

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}
$mysql_follow=mysqli_query($link,"SELECT count(*) as dem,`id_user`,`dates`,`lang` FROM `log_day` WHERE DATE(`dates`)='$sel_date' group by `id_user` order by dem desc");
?>
<table>
<tr>
    <td>Id</td>
    <td>Số lần dùng</td>
    <td>Ngày</td>
</tr>
<?php
while($row_follow=mysqli_fetch_array($mysql_follow)){
?>
<tr>
    <td><?php echo get_user($row_follow['id_user'],$row_follow['lang']);?></td>
    <td><?php echo $row_follow[0];?></td>
    <td><?php echo $row_follow['dates'];?></td>
</tr>
<?php
}
?>
</table>