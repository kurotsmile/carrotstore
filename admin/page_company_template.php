    <table style="width: 100%;" id="show_table" >
    <tr>
        <th style="width: 8%;"><?php echo lang('bieu_tuong'); ?></th>
        <th ><?php echo lang('ten_sp'); ?></th>
        <th >Tác giả</th>
        <th><?php  echo lang('thao_tac');?></th>
    </tr>
        <?php
        while ($row = mysql_fetch_array($result)) {
            ?>
                <tr id="row<?php echo $row[0];?>'">
                    <td><a target="_blank" href="<?php echo $url; ?>/company/<?php echo $row[0];?>"><img title="<?php echo $row[1];?>" src="<?php echo thumb($row[6],30);?>"/></a></td>
                    <td><a target="_blank" href="<?php echo $url; ?>/company/<?php echo $row[0];?>"><strong><?php echo $row[1];?></strong></a></td>
                    <td><a target="_blank" href="<?php echo $url; ?>/user/<?php echo $row[4];?>"><strong><?php echo $row[4];?></strong></a></td>
                    <td>
                        <a href="#" onclick="delete_data(this,<?php echo $row[0];?>,'company');return false;" class="buttonPro small red"><?php echo lang('xoa');?></a>
                        <a href="<?php echo $url;?>/index.php?page_view=page_company_update.php&id=<?php echo $row[0];?>" class="buttonPro small purple"><?php echo lang('edit');?></a>
                    </td>
                </tr>
        <?php
        }
        ?>
    </table>