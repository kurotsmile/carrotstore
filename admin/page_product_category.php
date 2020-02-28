<table id="show_table">
    <tr>
        <th >biểu tượng</th>
        <th >Tên</th>
        <th >Loại</th>
        <th >Hành động</th>
    </tr>
    <?php
    $result = mysql_query("SELECT * FROM `product_category` ORDER BY `id`",$link);
    while ($row = mysql_fetch_array($result)) {
        ?>
        <tr id="row<?php echo $row[0]; ?>">
            <td><span class="<?php echo $row[3]; ?> fa-3x"> </span></td>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo lang($row[2]); ?></td>
            <td>
                <a href="<?php echo $url_admin; ?>/index.php?page_view=page_product&sub_view=page_product_category_add&edit=<?php echo $row[0]; ?>" class="buttonPro small light_blue"><?php echo lang('chinh_sua'); ?></a>
                <a href="#" onclick="delete_data(this,<?php echo $row[0];?>,'product_category');return false;" class="buttonPro small red"><?php echo lang('xoa'); ?></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
