    <tr>
        <th style="width: 8%;">Quốc gia</th>
        <th style="width: 15%;">Tên từ khóa</th>
        <th>Nội dung</th>
        <th style="width: 15%;">Hành động</th>
    </tr>
    <?php
        
        while ($row = mysql_fetch_array($result)) {
        ?>
            <tr id="row<?php echo $row[0]; ?>">
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td>
                    <a href="<?php echo $url_admin; ?>/index.php?page_view=page_country.php&sub_view=page_country_key_add.php&edit=<?php echo $row[0]; ?>" class="buttonPro small green"><?php echo lang($link,'chinh_sua'); ?></a>
                    <a href="#" onclick="delete_data(this,<?php echo $row[0]; ?>,'lang_key')" class="buttonPro small red"><?php echo lang($link,'xoa'); ?></a>
                </td>
            </tr>
        <?php
        }
    ?>
