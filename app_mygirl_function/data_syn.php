<div>
    <button onclick="show_all_table();"  class="buttonPro large blue"><i class="fa fa-table" aria-hidden="true"></i> Hiện tất cả các bản</button>
</div>
<table id="all_table" style="display: none">

</table>
<form id="data_show" method="post" action="" style="display: none;">
    <textarea style="width: 100%;height: 500px;" name="data" id="data_mysql"></textarea>
    <input type="text" name="name_table" id="name_table" value="">
    <input type="submit" class="buttonPro green" value="Thự hiện lệnh Mysql">
    <input type="hidden" value="act_mysql" name="function">
</form>

<?php
function downloadUrlToFile($url, $outFileName)
{
    if(is_file($url)) {
        copy($url, $outFileName);
    } else {
        $options = array(
            CURLOPT_FILE    => fopen($outFileName, 'w'),
            CURLOPT_TIMEOUT =>  998800, // set this to 8 hours so we dont timeout on big files
            CURLOPT_URL     => $url
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
    }
}

if(isset($_POST['function'])){
    $name_table=$_POST['name_table'];
    downloadUrlToFile($_POST['data'],'data_temp/data_table.txt');

    $string = file_get_contents("data_temp/data_table.txt");
    $data_act=json_decode($string,true);

    echo 'Đã nhập '.count($data_act).' dối tượng vào dữ liệu '.$name_table.' !<br/>';
    echo "Lỗi json (".json_last_error()."):".json_last_error_msg();

    $query_reset_table=mysqli_query($link,"TRUNCATE TABLE `$name_table`;");
    for($i=0;$i<count($data_act);$i++) {
        $keys = array();
        $vals=array();

        foreach($data_act[$i] as $key => $val) {
            array_push($keys,$key);
            array_push($vals,"'".addslashes($val)."'");
        }
        $txt_keys=implode(",",$keys);
        $txt_val=implode(",",$vals);
        $query_insert_table = mysqli_query($link,"INSERT INTO $name_table ($txt_keys) VALUES ($txt_val)");
        echo mysqli_error($link);
    }

}
?>

<script>
    function  show_all_table() {
        $("#all_table").html("<tr><td><i class='fa fa-spinner' aria-hidden='true'></i> Đang tải dữ liệu...</td></tr>");
        $.ajax({
            url: "http://carrotstore.com/app_my_girl_jquery.php",
            type: "post",
            data: {function:'data_syn'},
            success: function (data, textStatus, jqXHR) {
                $("#all_table").html('');
                $("#all_table").show(500);
                $("#data_show").hide(200);
                var data_table=JSON.parse(data);
                for (let i=0;i<data_table.length;i++){
                    $("#all_table").append("<tr><td><i class='fa fa-table' aria-hidden='true'></i> "+data_table[i]+"</td><td><span class='buttonPro  small light_blue' onclick=\"get_table('"+data_table[i]+"')\"><i class='fa fa-cloud-download' aria-hidden='true'></i></span></td></tr>");
                }

            }
        });
    }

    function  get_table(name_table) {
        $("#name_table").val(name_table);
        $.ajax({
            url: "http://carrotstore.com/app_my_girl_jquery.php",
            type: "post",
            data: {function:'data_syn_get_table',table:name_table},
            success: function (data, textStatus, jqXHR) {
                $("#all_table").hide(500);
                $("#data_mysql").val(data);
                $("#data_show").show(200);
            }
        });
    }

</script>
