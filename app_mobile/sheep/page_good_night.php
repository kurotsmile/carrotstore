<?php
$lang='vi';
$sql_active='';

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['active'])){
    $active=$_GET['active'];
    $sql_active=' AND `active`="'.$active.'"';
}

if(isset($_GET['delete'])){
    $query_delete=mysqli_query($link,'DELETE FROM `good_night` WHERE ((`id` = '.$_GET['delete'].'));');
    echo 'Delete Success !!!';
    mysqli_free_result($query_delete);
}

$list_msg_goodnight=mysqli_query($link,"SELECT * FROM `good_night` WHERE `lang`='$lang' $sql_active ORDER BY `id` DESC");
?>
<table>
<tr>
    <th>Id</th>
    <th>Câu thoại</th>
    <th>Ngôn ngữ</th>
    <th>Người đăng</th>
    <th>Loại tài khoản</th>
    <th>Thao tác</th>
</tr>
<?php
while ($row = mysqli_fetch_array($list_msg_goodnight)) {
    $style='';
    $txt_user='';
    
    if($row['active']=='1'){
        $style='style="background-color:#ff8989;"';
    }
    
    if($row['user_type']=='1'){
        $txt_user=get_user($link,$row['user_name'],$row['lang']);
    }else{
        $txt_user=$row['user_name'];
    }
    
    echo '<tr '.$style.'><td>'.$row['id'].'</td><td>'.$row['msg'].'</td><td>'.$row['lang'].'</td><td>'.$txt_user.'</td><td>'.$row['user_type'].'</td><td><a href="'.$url.'?view=good_night&delete='.$row['id'].'" class="buttonPro small red">Xóa</a> <a href="'.$url.'?view=good_night_add&edit='.$row['id'].'" class="buttonPro small yellow">Cập nhật</a></td></tr>';
}
?>
</table>