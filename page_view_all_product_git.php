<div id="containt" style="width: 100%;">
<?php
        while ($row = mysqli_fetch_assoc($result)) {
            include "page_view_all_product_git_template.php";
        }
?>
</div>
