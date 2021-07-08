<?php
$lang='vi';
$sql_active='';
$url_active='';

if(isset($_GET['lang'])){
    $lang=$_GET['lang'];
}

if(isset($_GET['active'])){
    $active=$_GET['active'];
    $sql_active=' AND `active`="'.$active.'"';
    $url_active='active='.$active;
}

if(isset($_GET['delete'])){
    $query_delete=$this->q('DELETE FROM `good_night` WHERE ((`id` = '.$_GET['delete'].'));');
    if($query_delete) echo $this->msg('Delete Success !!!');
}

$url_cur=$this->cur_url.'&'.$url_active;
$this->setup_page('good_night',"WHERE `lang`='$lang' $sql_active ");
echo $this->show_page_nav($url_cur.'&page=good_night');
$list_msg_goodnight=$this->q("SELECT * FROM `good_night` WHERE `lang`='$lang' $sql_active ORDER BY `id` DESC LIMIT ".$this->p_start.",".$this->p_limit." ");
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
if($list_msg_goodnight){
    if(mysqli_num_rows($list_msg_goodnight)>0){
        while ($row = mysqli_fetch_array($list_msg_goodnight)) {
            $style='';
            $txt_user='';
            if($row['active']=='1')$style='style="background-color:#ff8989;"';
            if($row['user_type']=='1')$txt_user=$this->user($row['user_name'],$row['lang']);
            if($row['user_type']=='0') $txt_user=$row['user_name'];
            ?>
            <tr <?php echo $style;?>>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['msg'];?></td>
                <td><?php echo $row['lang'];?></td>
                <td><?php echo $txt_user;?></td>
                <td><?php echo $row['user_type'];?></td>
                <td>
                    <a href="<?php echo $url_cur.'&page=good_night_add&edit='.$row['id'];?>" class="buttonPro small yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i> Cập nhật</a>
                    <a href="<?php echo $url_cur.'&page=good_night&delete='.$row['id'];?>" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                </td>
            </tr>
            <?php
        }
    }else{
        echo '<tr><td></td><td></td><td>Không có dữ liệu</td><td></td><td></td><td></td></tr>';
    }
}
?>
</table>
<?php
echo $this->show_page_nav();
?>