<?php
include "config.php";
$name_file=$_GET['name_file'];
header("Content-type: text/sql");
header("Content-Disposition: attachment; filename=$name_file");
header("Pragma: no-cache");
header("Expires: 0");
ini_set('memory_limit', '-1');

    /* Sao lưu cả database hoặc một bảng cụ thể nào đó */
    function backup_tables($host,$user,$pass,$name,$tables = '*')
    {
        $return='';
      $link = mysql_connect($host,$user,$pass);
      mysql_select_db($name,$link);
      mysql_query("SET NAMES 'UTF8'"); 

      //Lấy tất cả các bảng
      if($tables == '*')
      {
        $tables = array();
        $result = mysql_query('SHOW TABLES');
        while($row = mysql_fetch_row($result))
        {
          $tables[] = $row[0];
        }
      }
      else
      {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
      }
     
      //Vòng lặp
      foreach($tables as $table)
      {
        $result = mysql_query('SELECT * FROM '.$table);
        $num_fields = mysql_num_fields($result);
       
        $return.= 'DROP TABLE IF EXISTS '.$table.';';
        $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
       
        for ($i = 0; $i < $num_fields; $i++)
        {
          while($row = mysql_fetch_row($result))
          {
            $return.= 'INSERT INTO '.$table.' VALUES(';
            for($j=0; $j<$num_fields; $j++)
            {
              $row[$j] = addslashes($row[$j]);
              $row[$j] = ereg_replace("\n","\\n",$row[$j]);
              if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
              if ($j<($num_fields-1)) { $return.= ','; }
            }
            $return.= ");\n";
          }
        }
        $return.="\n\n\n";
      }
     
        return $return;
    }
    
    echo backup_tables($mysql_host,$mysql_user,$mysql_pass,$mysql_database);
    exit;
?>