<?php


if(isset($_GET['delete'])){
    $id_user=$_GET['delete'];
    $query_delete=mysql_query("DELETE FROM `account_login` WHERE `user_id` = '$id_user' LIMIT 1;");
    echo alert("Xóa đóng góp lịch sử đăng nhập (".$id_user.") thành công !!!",'error');
}

$list_login=mysql_query("SELECT * FROM `account_login`"); 
?>
<table>
<tr>
    <th style="width: 200px;">Người dùng</th>
    <th>ID</th>
    <th>Ngày</th>
    <th>Trạng Thái</th>
    <th>Thao tác</th>
</tr>
<?php
while($row=mysql_fetch_array($list_login)){
?>
    <tr>
        <td>
            <a class="buttonPro small" href="<?php echo $url;?>/user/<?php echo $row['user_id'];?>/<?php echo $row['lang'];?>" target="_blank">
                <img src="<?php echo get_url_avatar_user($row['user_id'],'vi','20x20',true); ?>"/>
                <?php echo get_username_by_id($row['user_id'],true);?>
            </a>
        </td>
        <td>
            <i class="fa fa-id-card"></i> <?php echo $row['user_id'];?>
        </td>
        <td><?php echo $row['dates'];?></td>
        <td>
        <?php
            if($row['status']=='0'){
                echo '<i class="fa fa-times-circle"></i> Chưa hoàn tất';
            }else{
                echo '<i class="fa fa-check-circle"></i> Thành công';
            }
        ?>
        </td>
        <td><a href="<?php echo $url;?>/admin/?page_view=page_login_manager&delete=<?php echo $row['user_id'];?>" class="buttonPro small red"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</a></td>
    </tr>
<?php
}
mysql_free_result($list_login);
?>
</table>