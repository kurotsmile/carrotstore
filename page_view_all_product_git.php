<div id="containt" style="width: 100%;">
<?php
        while ($row = mysql_fetch_array($result)) {
            include "page_view_all_product_git_template.php";
        }
?>
</div>
