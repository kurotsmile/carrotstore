<?php 
include "config.php";
include "database.php";
include "function.php";
include "app_my_girl_function.php";
header('Content-type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
$func='';
if(isset($_GET['function']))$func=$_GET['function'];
if(isset($_POST['function']))$func=$_POST['function'];



//Core function
function backup_tables($host, $user, $pass, $dbname, $tables,$start_p,$limit_p,$current_page) {
    $link = mysqli_connect($host,$user,$pass, $dbname);

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($link, "SET NAMES 'utf8'");
    $tables = is_array($tables) ? $tables : explode(',',$tables);
 
    $return = '';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link, "SELECT * FROM $table LIMIT $start_p, $limit_p");
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        if($current_page==0){
            //$return.= 'DROP TABLE IF EXISTS '.$table.';';
            //$return.= "TRUNCATE TABLE $dbname.$table ;\n\n";
            //$row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
            //$return.=str_replace("\n","\\n",addslashes($row2[1])).";";
        }
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++) 
        {   //Over rows
            while($row = mysqli_fetch_row($result))
            {   
                if($counter == 1){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                } else{
                    $return.= '(';
                }

                //Over fields
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }

                if($num_rows == $counter){
                    $return.= ");\n";
                } else{
                    $return.= "),\n";
                }
                ++$counter;
            }
        }
        $return.="\n\n\n";
    }
	echo $return;
}

if($func=='db_syn_ready'){
    $table=$_POST['table'];
    $query_empty=mysqli_query($link,"TRUNCATE TABLE `$table`;");
    $data_show=new stdClass();

    if($query_empty){
        $data_show->{"status"}='1';
    }else{
        $data_show->{"status"}='0';
        $data_show->{"error"}=mysqli_error($link);
    }
    echo json_encode($data_show);
    exit;
}

if($func=='db_syn'){
    $table=$_POST['table'];
    $limit = $_POST['limit'];
    $query_count_all = mysqli_query($link,"SELECT COUNT(*) as c FROM `$table` LIMIT 1");
    $data_count_all_acc = mysqli_fetch_assoc($query_count_all);
    $total_records =intval($data_count_all_acc['c']);
    $current_page = 1;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    $txt_html='';
    $txt_html.='<div style="width:100%;height: 200px;float: left;overflow-y: auto;overflow-x: hidden;">';
    for($i=1;$i<=$total_page;$i++){
        $txt_html.='<div id="db_act_'.$i.'" style="font-size: 9px;float: left;width: 100%;text-align: left;cursor: pointer;margin: 2px;padding:2px;" class="db_action" table="'.$table.'" total_page="'.$total_page.'" current_page="'.$i.'" limit="'.$limit.'" total_records="'.$total_records.'">Luồn thao tác '.$i.'</div>';
    }
    $txt_html.='</div>';
    $data_show=new stdClass();
    $data_show->{"html"}=$txt_html;
    $data_show->{"total_page"}=$total_page;
    echo json_encode($data_show);
    exit;
}

if($func=='db_syn_act'){
    $limit=$_POST['limit'];
    $table=$_POST['table'];
    $total_records=intval($_POST['total_records']);
    $current_page=$_POST['current_page'];
    $total_page=intval($_POST['total_page']);
    $current_page = isset($current_page) ? $current_page : 1;
    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;
    echo backup_tables($mysql_host, $mysql_user, $mysql_pass, $mysql_database,$table,$start,$limit,$current_page);
    exit;
}

if($func=='db_syn_act_query'){
    $data_query=trim($_POST['data_query']);
    $query_run=mysqli_query($link, $data_query);

    $data_show=new stdClass();
    $data_show->{"error"}=mysqli_error($link);
    
    if($query_run){
        $data_show->{"status"}='1';
    }else{
        $data_show->{"status"}='0';
    }
    echo json_encode($data_show);
    exit;
}
?>