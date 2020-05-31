    <table style="width: 100%;" id="show_table" class="tablePro" >
    <tr>
        <th style="width: 8%;">Biểu tượng</th>
        <th >Tên sản phẩm</th>
        <th >Loại</th>
        <th >Trạng thái</th>
        <th>Thao tác</th>
    </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            $query_type=mysqli_query($link,"SELECT `css_icon` FROM `type` WHERE `id` = '".$row['type']."' LIMIT 1");
            $data_type=mysqli_fetch_array($query_type);
            ?>
                <tr id="row<?php echo $row[0];?>'">
                    <td><a target="_blank" href="<?php echo $url; ?>/product/<?php echo $row[0];?>"><img title="<?php echo $row[1];?>" src="<?php echo get_url_icon_product($row[0],'50',true);?>"/></a></td>
                    <td><a target="_blank" href="<?php echo $url; ?>/product/<?php echo $row[0];?>"><strong><?php echo get_name_product_lang($link,$row[0],'en',true);?></strong></a></td>
                    <td><span class="<?php echo $data_type['css_icon']; ?>"></span> <?php echo '<a target="_blank" href="'.URL.'/type/'.$row['type'].'">'.lang($link,$row['type']).'</a>'; ?></td>
                    <td>
                        <?php 
                            if($row['status']=='1'){
                                echo '<strong style="color:green;"><i class="fa fa-check-circle" aria-hidden="true"></i> Xuất bản<strong>';
                            }else{
                                echo '<span style="color:red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Bản nháp</span>';
                            }
                        ?>
                    </td>
                    <td>
                        <a href="#" onclick="delete_data(this,<?php echo $row[0];?>,'products');return false;" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
                        <a href="<?php echo $url_admin.'?page_view=page_product&sub_view=page_product_update&id='.$row[0];?>" class="buttonPro small purple"><i class="fa fa-pencil-square" aria-hidden="true"></i> Sửa</a>
                    </td>
                </tr>
        <?php
        }
        ?>
    </table>