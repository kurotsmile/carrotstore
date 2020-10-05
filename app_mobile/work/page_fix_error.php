
<?php
include "page_template.php";
$view_by_user=$data_user['user_name'];
if(isset($_GET['user'])){
    $view_by_user=$_GET['user'];
}
?>
<?php
mysql_query('SET GLOBAL log_bin_trust_function_creators = 1;');
$query_fix=mysql_query ('set global sql_mode = "ERROR_FOR_DIVISION_BY_ZERO, NO_AUTO_CREATE_USER, NO_ENGINE_SUBSTITUTION"');
echo mysql_error();
$a=mysql_query("SELECT @@GLOBAL.sql_mode;");
$a=mysql_fetch_array($a);
echo var_dump($a);
echo alert("Sửa lỗi thành công!","alert");
?>