<?php

if(isset($_POST['function'])&&$_POST['function']=='view_top_player'){
    $id_product=$_POST['id_product'];
    $get_list_player=mysql_query("SELECT * FROM `app_carrot` WHERE `product_id` = '$id_product' ORDER BY `data` DESC LIMIT 50");
    ?>
    <table class="tablePro">
    <tr>
        <th>Player</th>
        <th>Score</th>
    </tr>
    <?php
    while ($row = mysql_fetch_array($get_list_player)) {
        $acc=get_account($row['username']);
        ?>
        <tr>
            <td><a href="<?php echo $url;?>/user/<?php echo $row['username'];?>"><img src="<?php echo thumb($acc['avatar'],'20x20');?>"/> <?php echo show_name_User($row['username']);?></a></td>
            <td><?php echo $row['data'];?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
    exit;
}
