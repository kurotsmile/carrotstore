

<?php
echo '<table  style="border:solid 1px green">';
echo '<tr style="border:solid 1px green"><th>Key</th><th>Rate</th><th>Lang</th><th>os</th><th>version</th><th>character</th><th>sex</th><th>Info other</th><th>id_device</th><th>Action</th></tr>';
    while ($row = mysql_fetch_array($result_tip)) {
        echo show_row_history_prefab($row);
    }
echo '</table>';
?>