<?php
/*Tham số chính
 *$date_cur
 *$user_role
 *$url
 *$user_name
*/
$num_work=0;
$row_in_page=50;
$mysql_query_count_work=mysqli_query($link,"SELECT COUNT(`id`) as c FROM `work_chat` WHERE `user_name` = '$user_name' AND `dates` = '$date_cur'");
$data_count_work=mysqli_fetch_assoc($mysql_query_count_work);
$num_work=intval($data_count_work['c']);
$url_cur=$url.'?page_show=work';
$number_page=0;
if($num_work>0){
    $toal_row=$num_work;
    $number_page=$toal_row/$row_in_page;
    $page=0;
    if(isset($_GET['page'])){
        $page=intval($_GET['page']);
        $row_statr=intval($_GET['page'])*$row_in_page;
        $row_end=$row_statr+$row_in_page;
        $txt_limit=" limit $row_statr,$row_end";
    }else{
        $txt_limit=" limit 0,$row_in_page";
    }
    $mysql_query_chat=mysqli_query($link,"SELECT * FROM `work_chat` WHERE `user_name` = '$user_name' AND `dates` = '$date_cur' ORDER BY `id` DESC $txt_limit");
}
?>
<div class="box_form_add_chat" style="width: auto;margin-left: 5px;">
    <div class="row line">
        <strong><i class="fas fa-clipboard-check"></i> Các tác vụ đã làm</strong><br />
        <i style="font-size:10px;">Bạn đã hoàn thành <b style="color: red;"><?php echo $num_work;?></b> tác vụ trong ngày <b><?php echo $date_cur;?></b></i>
    </div>

    <div class="row line">
        <label style="width: 200px;">Xem lại tác vụ ngày</label>
        <input type="text" value="<?php echo $date_cur; ?>" id="date_select_show" onchange="sel_dates(this)" />
    </div>

    <?php if($number_page>1){?>
    <div class="row line">
        <label style="width: 200px;">Trang</label>
        <?php for($i=0;$i<$number_page;$i++){?>
            <a class="buttonPro small <?php if($page==$i){ echo 'yellow';}else{ echo 'blue'; }?>" href="<?php echo $url_cur.'&page='.$i;?>"><?php echo $i+1;?></a>
        <?php }?>
        <span> / trong </span>
        <span><?php echo $row_in_page; ?></span>
        <span>tác vụ mỗi trang</span>
    </div>
    <?php }?>

    <div class="row line">
        <?php
        if($num_work>0){
            ?>
            <table class="table_work" style="background-color: white;">
                <tr>
                    <th>Id</th>
                    <th>Loại</th>
                    <th>Nước</th>
                    <th>Thành viên</th>
                    <th>Thao tác</th>
                    <th>Ngày</th>
                    <th>Hành động</th>
                </tr>


                <?php
                $query_list_parameters = mysqli_query($link,"SELECT `key`,`url_action` FROM `work_report_parameters`");
                $obj_para=new stdClass();
                while($row_para=mysqli_fetch_assoc($query_list_parameters)){
                    $obj_para->{$row_para['key']}=$row_para['url_action'];
                }

                while($row=mysqli_fetch_assoc($mysql_query_chat)){
                    ?>
                    <tr id="item_work_<?php echo $row['id'];?>" data_report='<?php echo json_encode($row);?>'>
                        <td><?php echo $row['id_chat'];?></td>
                        <td><?php echo $row['type_chat'];?></td>
                        <td><?php echo $row['lang_chat'];?></td>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['type_action'];?></td>
                        <td><?php echo $row['dates'];?></td>
                        <td>
                            <?php  echo btn_go_to_obj($link,$row['id_chat'],$row['type_chat'],$row['lang_chat'],$obj_para);?>
                            <a onclick="edit_report_work('<?php echo $row['id'];?>');return false;" class="buttonPro small yellow"><i class="fas fa-edit"></i> Sửa</a>
                            <a href="<?php echo $url?>?del=<?php echo $row['id'];?>" class="buttonPro small red"><i class="fas fa-trash-alt"></i> Xóa</a>
                            <?php if($user_role=='admin'||$user_role=='leader'){ ?>
                                <a target="_blank" href="<?php echo $url?>?page_show=manager_report&id=<?php echo $row['id'];?>&username=<?php echo $row['user_name'];?>" class="buttonPro small red" onclick="$(this).addClass('black');"><i class="fas fa-bug"></i> Báo lỗi</a>
                            <?php }?>
                        </td>
                    </tr>
                    <?php
                }
                ?>

            </table>
            <?php

        }else{
            echo '<p><i class="far fa-frown"></i> <strong> Không có dữ liệu !</strong></p>';
        }
        ?>
    </div>

    <?php if($number_page>1){?>
    <div class="row line">
        <label style="width: 200px;">Trang</label>
        <?php for($i=0;$i<$number_page;$i++){?>
            <a class="buttonPro small <?php if($page==$i){ echo 'yellow';}else{ echo 'blue'; }?>" href="<?php echo $url_cur.'&page='.$i;?>"><?php echo $i+1;?></a>
        <?php }?>
        <span> / trong </span>
        <span><?php echo $row_in_page; ?></span>
        <span>tác vụ mỗi trang</span>
    </div>
    <?php }?>

</div>