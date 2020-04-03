<?php
header('Content-type: text/html; charset=utf-8');
include "../config.php";
include "../database.php";

$function=$_POST['function'];
if($function=='view_contatc_backup'){
    $lang=$_POST['lang'];
    $id=$_POST['id'];
    $query_data_backup=mysql_query("SELECT `data` FROM carrotsy_contacts.`backup_contact_$lang` WHERE `id` = '$id' LIMIT 1");
    $data_backup=mysql_fetch_array($query_data_backup);
    $data_backup_json=$data_backup['data'];
    $data_backup_json=str_replace(",}","}",$data_backup_json);
    $data_backup_json=str_replace(",]","]",$data_backup_json);
    $data_bk=json_decode($data_backup_json,true);

    echo '<style>tr:nth-child(even) {background-color: #caffa7;}</style>';
    echo '<div style="width: 100%;overflow-y: auto;max-height: 300px;"><table>';
    for($i=0;$i<count($data_bk);$i++){
        $data_c=$data_bk[$i];
        echo '<tr>';
        echo '<td><i class="fa fa-id-badge" aria-hidden="true"></i> '.$data_c["name"].'</td>';
        echo '<td>';
        $c_phone=$data_c['phone'];
        for($p=0;$p<count($c_phone);$p++){
            echo '<i class="fa fa-phone" aria-hidden="true"></i> '.$c_phone[$p].' ';
        }
        echo '</td>';
        echo '<td>';
        $c_phone=$data_c['email'];
        for($p=0;$p<count($c_phone);$p++){
            echo '<i class="fa fa-envelope-o" aria-hidden="true"></i> '.$c_phone[$p].' ';
        }
        echo '</td>';
        echo '</tr>';
    }
    echo '</table></div>';
}
?>