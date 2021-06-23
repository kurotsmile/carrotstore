<?php
$query_name_database=mysqli_query($this->link_mysql,"SELECT database() AS the_db");
$data_name_database=mysqli_fetch_assoc($query_name_database);
$name_database=$data_name_database['the_db'];
$return='';
$this->q("SET NAMES 'UTF8'"); 

$tables = array();
$result = $this->q('SHOW TABLES');
while($row = mysqli_fetch_row($result)) $tables[] = $row[0];

    foreach($tables as $table)
    {
      $result = $this->q('SELECT * FROM '.$table);
      $num_fields = mysqli_num_fields($result);
     
      $return.= 'DROP TABLE IF EXISTS '.$table.';';
      $row2 = mysqli_fetch_row($this->q('SHOW CREATE TABLE '.$table));
      $return.= "\n\n".$row2[1].";\n\n";
     
      for ($i = 0; $i < $num_fields; $i++)
      {
        while($row = mysqli_fetch_row($result))
        {
          $return.= 'INSERT INTO '.$table.' VALUES(';
          for($j=0; $j<$num_fields; $j++)
          {
            $row[$j] = addslashes($row[$j]);
            $row[$j] = str_replace("\n","\\n",$row[$j]);
            if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
            if ($j<($num_fields-1)) { $return.= ','; }
          }
          $return.= ");\n";
        }
      }
      $return.="\n\n\n";
    }
   
file_put_contents("$name_database.sql", $return);
?>
<a class="buttonPro small blue" href="<?php echo $this->url.'/'.$name_database;?>.sql" target="_blank" rel="noopener noreferrer">Tải xuống tệp sao lưu sql</a>