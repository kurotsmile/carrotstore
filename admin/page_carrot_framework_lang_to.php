<?php
$lang_from='';
$lang_to='';
if(isset($_POST['lang_from']))$lang_from=$_POST['lang_from'];
if(isset($_POST['lang_to']))$lang_to=$_POST['lang_to'];

function translate($q, $sl, $tl){
    $res= file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&ie=UTF-8&oe=UTF-8&dt=bd&dt=ex&dt=ld&dt=md&dt=qca&dt=rw&dt=rm&dt=ss&dt=t&dt=at&sl=".$sl."&tl=".$tl."&hl=hl&q=".urlencode($q), $_SERVER['DOCUMENT_ROOT']."/transes.html");
    $res=json_decode($res);
    return $res[0][0][0];
}
?>
<form method="post" style="float:left;margin:20px;">
<label>Từ quốc gia</label>
<select name="lang_from">
<?php
$query_all_country=mysqli_query($link,"SELECT `key`, `name` FROM `app_my_girl_country`");
while ($l = mysqli_fetch_assoc($query_all_country)) {
    if($lang_from==$l['key'])
        echo '<option value="'.$l['key'].'" selected="true">'.$l['name'].'</option>';
    else
        echo '<option value="'.$l['key'].'">'.$l['name'].'</option>';
}
?>
</select>

<label>Sang quốc gia</label>
<select name="lang_to">
<?php
$query_all_country=mysqli_query($link,"SELECT `key`, `name` FROM `app_my_girl_country`");
while ($l = mysqli_fetch_assoc($query_all_country)) {
    if($lang_to==$l['key'])
        echo '<option value="'.$l['key'].'" selected="true">'.$l['name'].'</option>';
    else
        echo '<option value="'.$l['key'].'">'.$l['name'].'</option>';
}
?>
</select>
<button class="buttonPro blue"><i class="fa fa-bolt" aria-hidden="true"></i> Thực hiện</button>
</form>

<?php
if($lang_from!=''&&$lang_to!=''){
    $query_cr_key=mysqli_query($link,"SELECT `key` FROM `cr_framework_lang_key`");

    $query_cr_val=mysqli_query($link,"SELECT `data` FROM `cr_framework_lang_val` WHERE `lang` = '$lang_from'");
    $data_cr_val=mysqli_fetch_assoc($query_cr_val);
    $data_cr=(array)json_decode($data_cr_val['data']);

    $arr_key=array();
    $arr_val_from=array();
    $arr_val_to=array();
    $arr_data_val=array();
    while ($key=mysqli_fetch_assoc($query_cr_key)) {
        $key_cr=$key['key'];
        $val_from=$data_cr[$key_cr];
        array_push($arr_key,$key_cr);
        array_push($arr_val_from,$val_from);
        $val_to=translate($val_from, $lang_from, $lang_to);
        array_push($arr_val_to,$val_to);
        $arr_data_val[$key_cr]=$val_to;
    }

    echo var_dump($arr_key);
    echo '<hr/>';
    echo var_dump($arr_val_from);
    echo '<hr/>';
    echo var_dump($arr_val_to);

    $val_data=json_encode($arr_data_val,JSON_UNESCAPED_UNICODE);
    $val_data=addslashes($val_data);
    $query_cr_val=mysqli_query($link,"SELECT `data` FROM `cr_framework_lang_val` WHERE `lang` = '$lang_to' LIMIT 1");
    $data_cr=mysqli_fetch_assoc($query_cr_val);
    if($data_cr==null){
        $query_add_val=mysqli_query($link,"INSERT INTO `cr_framework_lang_val` (`lang`, `data`) VALUES ('$lang_to', '$val_data');");
    }else{
        $query_add_val=mysqli_query($link,"UPDATE `cr_framework_lang_val` SET `data` = '$val_data' WHERE `lang` = '$lang_to' LIMIT 1;");
    }
}
?>