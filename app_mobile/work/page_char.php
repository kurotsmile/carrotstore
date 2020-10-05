<?php
$user_name=$_SESSION['login_user'];
include "page_template.php";

class User_data{
    public $name='';
    public $arr_dates=array();
    public $arr_data=array();
    public $total=0;
}


$all_user=array();

    $msql_all_user=mysqli_query($link,'SELECT * FROM `work_user`');
    while($row_user=mysqli_fetch_array($msql_all_user)){
        $txt_user_name=$row_user[1];
        $mysql_query_chat=mysqli_query($link,"SELECT COUNT(*) as c,`dates` FROM `work_chat` where `user_name`='$txt_user_name'  GROUP BY  `dates` ORDER BY `dates`");
        $user_data=new User_data();
        $user_data->name=$txt_user_name;
        while ($row = mysqli_fetch_array($mysql_query_chat)) {
            array_push($user_data->arr_dates,$row['dates']);
            array_push($user_data->arr_data,$row['c']);
            $user_data->total+=intval($row['c']);
        }
        array_push($all_user,$user_data);
        mysqli_free_result($mysql_query_chat);
    }


function comparator($object1, $object2) { 
   return $object1->total < $object2->total;
} 

usort($all_user, 'comparator'); 

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
<div style="text-align: center;padding-bottom: 5px;padding-top: 5px;width: 90%;float: left;">
    <i class="far fa-lightbulb"></i> Biểu đồ làm việc về dữ liệu (không kể các việc liên quan đến code)
</div>

<div style="float: left;width: 100%;">
<div style="float: left;padding: 20px;">
<?php 
for($i=0;$i<count($all_user);$i++){
$arr_dates=$all_user[$i]->arr_dates;
$arr_data=$all_user[$i]->arr_data;
?>
<div class="box_form_add_chat" style="width: 100%;float: left;margin-bottom: 10px;">
<table>
<tr>
    <td style="width: 80%;background-color: white;">
        <canvas id="myChart<?php echo $i;?>" style="position: relative;float: left;" width="100%" height="20px"></canvas>
    </td>
    <td style="text-align: center;">
        <div style="width: 100%;float: left;">
            <strong><?php echo $all_user[$i]->name;?></strong><br />
            <span style="color: #a5a5a5;font-size: 12px;">Xếp hạng thành tích <i class="fas fa-trophy"></i> Hạng <?php echo $i+1;?> với <?php echo $all_user[$i]->total;?> tác vụ</span>
        </div>
        <div style="width: 95%;padding: 5px;float: left;height: 200px;overflow-y: auto;">
            <table>
            <?php
                for($y=sizeof($arr_dates);$y>=0;$y--){
                    if(isset($arr_dates[$y])){
                        $date=date_create($arr_dates[$y]);
                        echo '<tr><td><i style="color:gray" class="fas fa-calendar"></i> '.date_format($date,"d/m/Y").'</td><td style="color:red">'.$arr_data[$y].'</td><td><a class="buttonPro small black" href="'.$url.'/?page_show=work_by_user&dates='.$arr_dates[$y].'&user='.$all_user[$i]->name.'">Xem <i class="fas fa-caret-right"></i></a></td></tr>';
                    }
                }
            ?>
            </table>
        </div>
    </td>
</tr>

</table>
</div>
<script>
var ctx = document.getElementById("myChart<?php echo $i;?>");
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($arr_dates);?>,
        datasets: [{
            label: '<?php echo $all_user[$i]->name; ?>',
            data: <?php echo json_encode($arr_data);?>,
            backgroundColor: "rgba(<?php echo rand(100,225) ?>, <?php echo rand(100,225) ?>, <?php echo rand(100,225) ?>, 1)",
            borderWidth: 5
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        tooltips:{
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        }
    }
});

</script>
<?php
}
?>
</div>
</div>
