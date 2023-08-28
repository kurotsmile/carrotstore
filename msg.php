<?php
include "const.php";
include "database.php";

$lang='vi';

$u1=new stdClass();
$u1->{"avatar"}="https://lh3.googleusercontent.com/a/AAcHTteq6PPFniFz0xUeWLo66It0ThtyB7R5Xtkk5sZe8WWVEG0=s512-c";
$u1->{"lang"}="vi";
$u1->{"name"}="Thien Thanh Tran";
$u1->{"id"}="bUqulTDPnfNfqCJ7rnYXziBdcCm2";

$u2=new stdClass();
$u2->{"avatar"}="https://lh3.googleusercontent.com/a/AAcHTtcNwCZ3O5lQd-6MldbMELUg3U2puX1l8sRjdxjUWRA-2g=s512-c";
$u2->{"lang"}="en";
$u2->{"name"}="Au Tri Art";
$u2->{"id"}="cQX5cR3xmWV5sMZdaRC5viraZNq2";

$u3=new stdClass();
$u3->{"avatar"}="https://lh3.googleusercontent.com/a/AAcHTtevHXiAoCbY_WQdFIKNdymvNPnVYhzT-FWkuLGmdmIj7Q=s512-c";
$u3->{"lang"}="en";
$u3->{"name"}="Thiện Thanh Trần";
$u3->{"id"}="xUktUS1cT1MuDjPqi9aCsOo0Wfo2";

$array_u=Array($u1,$u2,$u3);

$limit=500;

if(isset($_POST["page"])){

    $page=$_POST["page"];
    $pageshow=$page*$limit;
    $q_qurey=mysqli_query($link,"SELECT `id`,`text`,`chat`,`color`,`sex`,`character_sex`,`link`,`face`,`action`,`pater`,`pater_type` FROM `app_my_girl_$lang` WHERE  `pater_type` != 'msg' AND `id_redirect` = '' AND `effect` != '2' AND `disable` = '0' LIMIT $pageshow,$limit");

    $json='{';
    $json.='"all_item":';

    $array_obj=array();
    while($row=mysqli_fetch_array($q_qurey)){
        $id_chat="chat".$row['id'];
        $chat=new stdClass();
        $chat->{"key"}=$row["text"];
        $chat->{"id_import"}=$id_chat;
        $chat->{"id"}=$id_chat;
        $chat->{"color"}=$row["color"];
        $chat->{"msg"}=$row["chat"];
        $chat->{"lang"}=$lang;
        $chat->{"icon"}="";
        if(trim($row["pater_type"])=="chat"){
            $chat->{"pater"}="chat".$row["pater"];
        }else{
            $chat->{"pater"}="";
        }
        $chat->{"sex_character"}=$row["character_sex"];
        $chat->{"sex_user"}=$row["sex"];
        $chat->{"limit"}="3";
        $chat->{"mp3"}=null;
        $chat->{"date_create"}="2023-08-11T17:24:15Z";
        $chat->{"link"}=$row["link"];
        $chat->{"status"}="passed";
        $chat->{"user"}=$array_u[rand(0,count($array_u)-1)];
        $chat->{"face"}=$row["face"];
        $chat->{"action"}=$row["action"];
        $chat->{"func"}="0";
        array_push($array_obj,$chat);
    }

    $json.=json_encode($array_obj, JSON_UNESCAPED_UNICODE );
    $json.=',"collection": "chat-'.$lang.'"';
    $json.='}';

    header('Content-disposition: attachment; filename=chat_'.$lang.'_page_'.$page.'.json');
    header('Content-type: application/json');
    echo $json;
}else{

    $query_count_chat=mysqli_query($link,"SELECT count('id') as c FROM `app_my_girl_vi` WHERE `pater_type` != 'msg' AND `id_redirect` = '' AND `effect` != '2' AND `disable` = '0' LIMIT 1");
    $data_count_chat=mysqli_fetch_array($query_count_chat);
    $count_chat=intval($data_count_chat['c']);
    $page=round($count_chat/$limit);
    ?>
    <form name="frm_download" method="post">
        <select name="page" >
        <?php for($i=0;$i<$page;$i++){?><option value="<?php echo $i;?>">Json <?php echo $i;?></option><?php }?>
        </select>
        <button>Done</button>
    </form>
<?php
    }
?>