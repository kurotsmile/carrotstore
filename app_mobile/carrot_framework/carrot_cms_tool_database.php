<?php
$query_name_database=mysqli_query($this->link_mysql,"SELECT database() AS the_db");
$data_name_database=mysqli_fetch_assoc($query_name_database);
$name_database=$data_name_database['the_db'];
$name_sel_table='Tables_in_'.$name_database;

$query_username=mysqli_query($this->link_mysql,"select user();");
$data_username=mysqli_fetch_assoc($query_username);
$user_name=$data_username["user()"];
$user_name=str_replace("@localhost","",$user_name);
$query_tabel=mysqli_query($this->link_mysql,"SHOW TABLES;");
while($table=mysqli_fetch_assoc($query_tabel)){
    $name_table=$table[$name_sel_table];
    $link_view=$this->url_carrot_store.'/adminer.php?username='.$user_name.'&db='.$name_database.'&select='.$name_table;
    $link_download=$this->url_carrot_store.'/adminer.php?username='.$user_name.'&db='.$name_database.'&dump='.$name_table;
    ?>
    <div class="db_table">
        <a  target="_blank" href="<?php echo $link_view;?>" class="buttonPro small"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
        <a  target="_blank" href="<?php echo $link_download;?>" class="buttonPro small"><i class="fa fa-download" aria-hidden="true"></i></a>
        <i class="fa fa-cube" aria-hidden="true"></i> <?php echo $name_table;?>
    </div>
<?php
}
?>