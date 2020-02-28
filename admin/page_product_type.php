<table id="show_table">
    <tr>
        <th >biểu tượng</th>
        <th >Url định danh</th>
        <th >Css</th>
        <th >Hành động</th>
    </tr>
    <?php
    $result = mysql_query("SELECT * FROM `type` ORDER BY `position`",$link);
    while ($row = mysql_fetch_array($result)) {
        ?>
        <tr id="listItem_<?php echo $row['id_order'];?>">
            <td><span class="<?php echo $row[1]; ?> fa-3x"> </span></td>
            <td><?php echo $row[0]; ?></td>
            <td><?php echo $row[1]; ?></td>
            <td>
                <a href="<?php echo $url_admin; ?>/index.php?page_view=page_product&sub_view=page_product_type_update&edit=<?php echo $row[0]; ?>" class="buttonPro small green"><i class="fa fa-wrench" aria-hidden="true"></i> Sửa</a>
                <a href="#" onclick="delete_data(this,'<?php echo $row[0]; ?>','type');return false;" class="buttonPro small red"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<script>
    $(function() {
        $( "#show_table tbody" ).sortable({
            axis: 'y',
            update: function (event, ui) {
                var data = $(this).sortable('serialize');
                $('#loading').fadeIn(200);
                $.ajax({
                    data: "function=save_type_order&"+data,
                    type: 'post',
                    url: '<?php echo $url_admin;?>/index.php',
                    success: function(data, textStatus, jqXHR)
                    {
                        $('#loading').fadeOut(200);
                    }
                });
            }
        });
        $( "#sortable" ).disableSelection();
    });
</script>