<?php
$id_midi='';
if(isset($_GET['id'])) $id_midi=$_GET['id'];

$id_device='b8aab5bff0258b764ea64e5a8cc1dfb2aad4a9c6';
$speed_midi='0,2';
$name_midi='New Midi';
$sell_midi=0;
$category_midi="";
$level_midi="";
$author_midi="";

$arr_note_white=array('c2','d2','e2','f2','g2','a2','b2','c3','d3','e3','f3','g3','a3','b3','c4','d4','e4','f4','g4','a4','b4','c5','d5','e5','f5','g5','a5','b5','c6','d6','e6','f6','g6','a6','b6','c7');
$arr_pc_note_white=array('1','2','3','4','5','6','7','8','9','0','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m');
$arr_note_black=array('C#2','D#2','','F#2','G#2','A#2','','C#3','D#3','','F#3','G#3','A#3','','C#4','D#4','','F#4','G#4','A#4','','C#5','D#5','','F#5','G#5','A#5','','C#3','D#3','','F#3','G#3','A#3');
$arr_pc_note_black_blank=array('!','@','','$','%','^','','*','(','','Q','W','E','','T','Y','','I','O','P','','S','D','','G','H','J','','L','Z','','C','V','B');
$arr_pc_note_black=array('!','@','$','%','^','*','(','Q','W','E','T','Y','I','O','P','S','D','G','H','J','L','Z','C','V','B');
$arr_n_black=array();
for($i=0;$i<count($arr_note_black);$i++){
    if($arr_note_black[$i]!=''){
        array_push($arr_n_black,$arr_note_black[$i]);
    }
}

function get_name_note($index,$type_p){
    global $arr_note_white;
    global $arr_n_black;
    $txt_nanme='...';
    if($index!='-1'){
        if($type_p==0){
            $txt_nanme=$arr_note_white[$index];
        }else{
            $txt_nanme=$arr_n_black[$index];
        }
    }
    return $txt_nanme;
}

function get_name_note_pc($index,$type_p){
    global $arr_pc_note_white;
    global $arr_pc_note_black;
    $txt_nanme='...';
    if($index!='-1'){
        if($type_p==0){
            $txt_nanme=$arr_pc_note_white[$index];
        }else{
            $txt_nanme=$arr_pc_note_black[$index];
        }
    }
    return $txt_nanme;
}

function get_index_note_black_by_txt($s_name){
    global $arr_n_black;
    for($i=0;$i<count($arr_n_black);$i++){
        if($arr_n_black[$i]==$s_name){
            return $i;
        }
    }
    return -1;
}

if($id_midi!=''){
    $query_midi=mysqli_query($link,"SELECT * FROM `midi` WHERE `id_midi` = '$id_midi' LIMIT 1");
    $data_midi=mysqli_fetch_assoc($query_midi);

    $title_midi='Cập nhật Midi';

    $name_midi=$data_midi['name'];
    $speed_midi=$data_midi['speed'];
    $sell_midi=$data_midi['sell'];
    $level_midi=$data_midi['level'];
    $author_midi=$data_midi['author'];
    $category_midi=$data_midi['category'];

    $data_line_0=json_decode($data_midi['data0']);
    $data_line_1=json_decode($data_midi['data1']);
    $data_line_2=json_decode($data_midi['data2']);

    $data_type_0=json_decode($data_midi['type0']);
    $data_type_1=json_decode($data_midi['type1']);
    $data_type_2=json_decode($data_midi['type2']);
}else{
    $title_midi="Thêm mới Midi";
    $data_line_0=array(-1);
    $data_line_1=array(-1);
    $data_line_2=array(-1);

    $data_type_0=array(0);
    $data_type_1=array(0);
    $data_type_2=array(0);
}

?>

<h2 style="width:80%;padding:5px;float:left"><?php echo $title_midi;?></h2>
<table style="float:left">
    <tr>
        <td>Tên midi</td>
        <td><input type="text" id="name_midi" value="<?php echo $name_midi;?>"></td>
    </tr>

    <tr>
        <td>Tốc độ đánh</td>
        <td><input type="text" id="speed_midi" value="<?php echo $speed_midi;?>"></td>
    </tr>

    <tr>
        <td>Tình trạng</td>
        <td>
            <select id="sell_midi">
                <option value="0" <?php if($sell_midi=='0'){ echo 'selected=true'; };?>>Bản nháp</option>
                <option value="1" <?php if($sell_midi=='1'){ echo 'selected=true'; };?>>Xuất bản</option>
                <option value="2" <?php if($sell_midi=='2'){ echo 'selected=true'; };?>>Thương mại hóa</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Cấp độ</td>
        <td>
            <select id="level_midi">
                <option value="0" <?php if($level_midi=='0'){ echo 'selected=true'; };?>>Dễ</option>
                <option value="1" <?php if($level_midi=='1'){ echo 'selected=true'; };?>>Trung bình</option>
                <option value="2" <?php if($level_midi=='2'){ echo 'selected=true'; };?>>Khó</option>
            </select>
        </td>
    </tr>

    <tr>
        <td>Tác gải</td>
        <td><input type="text" id="author_midi" value="<?php echo $author_midi;?>"></td>
    </tr>

    <tr>
        <td>Chủ đề</td>
        <td>
            <select id="category_midi">
                <option value="" <?php if($category_midi==''){ echo 'selected=true'; };?>>Không chọn</option>
                <?php
                    $query_list_category=mysqli_query($link,"SELECT `name` FROM `category`");
                    while($row_category=mysqli_fetch_assoc($query_list_category)){
                ?>
                    <option value="<?php echo $row_category['name'];?>" <?php if($category_midi==$row_category['name']){ echo 'selected=true'; };?>><?php echo $row_category['name'];?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
</table>

<div id="piano">
<div id="note_white">
    <?php
    for($i=0;$i<count($arr_note_white);$i++){
    ?>
    <div onclick="sel_note_piano(this);" class="note" id="note_piano_w_<?php echo $i;?>" piano_index="<?php echo $i; ?>" piano_type="0" piano_txt="<?php echo $arr_note_white[$i]; ?>"><span><?php echo $arr_note_white[$i]; ?></span></div>
    <?php }?>
</div>

<div id="note_black">
    <?php
    for($i=0;$i<count($arr_note_black);$i++){
        $index_b=get_index_note_black_by_txt($arr_note_black[$i]);
    ?>
    <div onclick="sel_note_piano(this);" class="note <?php if($arr_note_black[$i]==''){ echo 'none';} ?>" id="note_piano_b_<?php echo  $index_b;?>" piano_index="<?php echo $index_b; ?>" piano_type="1" piano_txt="<?php echo $arr_note_black[$i]; ?>"><span><?php echo $arr_note_black[$i]; ?></span></div>
    <?php }?>
</div>
</div>

<div id="midi_edit">
    <div class="line" id="midi_edit_line0">
        <?php
            for($i=0;$i<count($data_line_0);$i++){
                echo '<div id="l_0_col_'.$i.'" onclick="sel_midi(this)" class="midi col_'.$i.'" midi_col="'.$i.'" piano_index="'.$data_line_0[$i].'" piano_type="'.$data_type_0[$i].'">'.get_name_note($data_line_0[$i],$data_type_0[$i]).'</div>';
            }
        ?>
    </div>

    <div class="line" id="midi_edit_line1">
        <?php
            for($i=0;$i<count($data_line_1);$i++){
                echo '<div id="l_1_col_'.$i.'" onclick="sel_midi(this)" class="midi col_'.$i.'" midi_col="'.$i.'"  piano_index="'.$data_line_1[$i].'" piano_type="'.$data_type_1[$i].'">'.get_name_note($data_line_1[$i],$data_type_1[$i]).'</div>';
            }
        ?>
    </div>

    <div class="line" id="midi_edit_line2">
        <?php
            for($i=0;$i<count($data_line_2);$i++){
                echo '<div id="l_2_col_'.$i.'"onclick="sel_midi(this)" class="midi col_'.$i.'" midi_col="'.$i.'"  piano_index="'.$data_line_2[$i].'" piano_type="'.$data_type_2[$i].'">'.get_name_note($data_line_2[$i],$data_type_2[$i]).'</div>';
            }
        ?>
    </div>
</div>

        <?php
            $txt_pc_key='';
            for($i=0;$i<count($data_line_0);$i++){
                $txt_show=get_name_note_pc($data_line_0[$i],$data_type_0[$i]);
                if($txt_show=='...'){
                    $txt_pc_key.=' ';
                }else{
                    $txt_pc_key.=$txt_show;
                }
            }
        ?>


<textarea rows="9" cols="70" id="midi_pc" style="width:100%;float:left;"><?php echo $txt_pc_key;?></textarea>

<div style="width:100%;float:left;">
<span class="buttonPro small" onclick="conver_pc_to_midi_auto();return false;"><i class="fa fa-compress" aria-hidden="true"></i> Tự động </span>
<span id="btn_delete_midi_sel" class="buttonPro small red" onclick="delete_midi_sel();"><i class="fa fa-trash" aria-hidden="true"></i> Xóa cột midi </span>
<span id="btn_empty_midi_sel" class="buttonPro small red" onclick="empty_midi_sel();"><i class="fa fa-eraser" aria-hidden="true"></i> Làm rỗng</span>

<span id="btn_play_midi"  class="buttonPro small blue" onclick="play_midi();"><i class="fa fa-play" aria-hidden="true"></i> Chơi Midi</span>
<span id="btn_stop_midi" class="buttonPro small black" onclick="stop_midi();"><i class="fa fa-stop" aria-hidden="true"></i> Dừng Midi</span>
<br/>
<br/>

<?php if($id_midi!=''){?>
    <span class="buttonPro yellow" onclick="save_midi('edit');return false;"><i class="fa fa-empire" aria-hidden="true"></i> Cập nhật Midi </span>
<?php }else{?>
    <span class="buttonPro green" onclick="save_midi('add');return false;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới Midi </span>
<?php }?>
</div>

<script>
var id_midi='<?php echo $id_midi;?>';
var arr_pc_note_white=<?php echo json_encode($arr_pc_note_white); ?>;
var arr_note_white=<?php echo json_encode($arr_note_white); ?>;
var arr_pc_note_black_blank=<?php  echo json_encode($arr_pc_note_black_blank);?>;
var arr_pc_note_black=<?php  echo json_encode($arr_pc_note_black);?>;
var arr_note_black=<?php  echo json_encode($arr_note_black);?>;

function get_index_note_by_key_white(key){
    for(var i=0;i<arr_pc_note_white.length;i++){
        if(arr_pc_note_white[i]==key){
            return i;
        }
    }
    return -1;
}

function get_index_note_by_key_black(key){
    for(var i=0;i<arr_pc_note_black_blank.length;i++){
        if(arr_pc_note_black_blank[i]==key){
            return i;
        }
    }
    return -1;
}

function get_index_note_black(s_key){
    for(var i=0;i<arr_pc_note_black.length;i++){
        if(arr_pc_note_black[i]==s_key){
            return i;
        }
    }
    return -1;
}


function add_line_midi(key_name,index_line){
    var index_w=get_index_note_by_key_white(key_name);
    if(index_w!=-1){
            $("#midi_edit_line"+index_line).append("<div onclick='sel_midi(this)' class='midi' piano_index='"+index_w+"' piano_type='0' >"+arr_note_white[index_w]+"</div>");
    }else{
        index_w=get_index_note_by_key_black(key_name);
        index_b=get_index_note_black(key_name);
        $("#midi_edit_line"+index_line).append("<div onclick='sel_midi(this)' class='midi' piano_index='"+index_b+"' piano_type='1' >"+arr_note_black[index_w]+"</div>");
    }
}

function add_line_midi_empty(index_line){
    $("#midi_edit_line"+index_line).append("<div onclick='sel_midi(this)' class='midi'  piano_index='-1' piano_type='0'>...</div>");
}

function conver_pc_to_midi_auto(){
    var midi_pc=$("#midi_pc").val().replace(/\n|\r/g, " ");
    midi_pc=midi_pc.replace("-", " ");
    var arr_pc_data=midi_pc.split(" ");

    $("#midi_edit_line0").html('');
    $("#midi_edit_line1").html('');
    $("#midi_edit_line2").html('');

    for(var i=0;i<arr_pc_data.length;i++){
        var s_txt=arr_pc_data[i];
        if(s_txt.length==1){
            if(s_txt=='|'){
                add_line_midi_empty(0);
                add_line_midi_empty(1);
                add_line_midi_empty(2);
            }else{
                add_line_midi(s_txt,0);
                add_line_midi_empty(1);
                add_line_midi_empty(2);
            }
        }else{
            if(s_txt[0]=='['){
                if(s_txt.length==3){
                    add_line_midi(s_txt[1],0);
                    add_line_midi_empty(1);
                    add_line_midi_empty(2);
                }

                if(s_txt.length==4){
                    add_line_midi(s_txt[1],0);
                    add_line_midi(s_txt[2],1);
                    add_line_midi_empty(2);
                }

                if(s_txt.length>=5){
                    add_line_midi(s_txt[1],0);
                    add_line_midi(s_txt[2],1);
                    add_line_midi(s_txt[3],2);
                }
            }else{
                for(var y=0;y<s_txt.length;y++){
                        add_line_midi(s_txt[y],0);
                        add_line_midi_empty(1);
                        add_line_midi_empty(2);
                }
            }
        }

        add_line_midi_empty(0);
        add_line_midi_empty(1);
        add_line_midi_empty(2);
    }

}

var emp_midi=null;
$("#btn_delete_midi_sel").hide();
$("#btn_empty_midi_sel").hide();
$("#btn_play_midi").show();
$("#btn_stop_midi").hide();

function sel_midi(emp){
    emp_midi=emp;
    var p_index=$(emp).attr("piano_index");
    var p_type=$(emp).attr("piano_type");
    play_sound($(emp).html());
    $("#note_white .note").removeClass("sel");
    $("#note_black .note").removeClass("sel");
    if(p_index!=-1){
        if(p_type==0){
            $("#note_piano_w_"+p_index).addClass("sel");
        }else{
            $("#note_piano_b_"+p_index).addClass("sel");
        }
    }
    $("#midi_edit .line .midi").removeClass("sel");
    $(emp_midi).addClass("sel");
    $("#btn_delete_midi_sel").show(200);
    $("#btn_empty_midi_sel").show(200);
}

function sel_note_piano(emp){
    if(emp_midi!=null){
        var p_index=$(emp).attr("piano_index");
        var p_type=$(emp).attr("piano_type");
        var p_txt=$(emp).attr("piano_txt");
        $(emp_midi).attr('piano_index',p_index);
        $(emp_midi).attr('piano_type',p_type);
        $(emp_midi).html(p_txt);
        play_sound(p_txt);
        $("#note_white .note").removeClass("sel");
        $("#note_black .note").removeClass("sel");
        $(emp).addClass("sel");
    }
}

function delete_midi_sel(){
    var p_col=$(emp_midi).attr("midi_col");
    $("#note_white .note").removeClass("sel");
    $("#note_black .note").removeClass("sel");
    $("#btn_delete_midi_sel").hide(100);
    $("#midi_edit .line .midi.col_"+p_col).remove();
    emp_midi=null;
}

function empty_midi_sel(){
    $(emp_midi).attr('piano_index',-1);
    $(emp_midi).attr('piano_type',0);
    $(emp_midi).html("...");
    $("#btn_delete_midi_sel").hide(100);
    $("#btn_empty_midi_sel").hide(100);
}

function save_midi(type_act){
    var midi_name=$('#name_midi').val();
    var midi_speed=$('#speed_midi').val();
    var midi_sell=$("#sell_midi").val();

    var piano_index_arr1=[];
    var piano_type_arr1=[];

    var piano_index_arr2=[];
    var piano_type_arr2=[];

    var piano_index_arr3=[];
    var piano_type_arr3=[];

    $("#midi_edit_line0 .midi").each(function(i){
        var p_index=$(this).attr("piano_index");
        var p_type=$(this).attr("piano_type");
        piano_index_arr1.push(p_index);
        piano_type_arr1.push(p_type);
    });

    $("#midi_edit_line1 .midi").each(function(i){
        var p_index=$(this).attr("piano_index");
        var p_type=$(this).attr("piano_type");
        piano_index_arr2.push(p_index);
        piano_type_arr2.push(p_type);
    });


    $("#midi_edit_line2 .midi").each(function(i){
        var p_index=$(this).attr("piano_index");
        var p_type=$(this).attr("piano_type");
        piano_index_arr3.push(p_index);
        piano_type_arr3.push(p_type);
    });

    if(piano_index_arr1.length==0){
        swal('Lỗi','Chưa có dữ liệu Midi');
    }else{
        $.ajax({
            url: "<?php echo $url;?>/ajax.php",
            type: "post",
            data: {
                function:'save_midi',
                data_line0:JSON.stringify(piano_index_arr1),
                data_type0:JSON.stringify(piano_type_arr1),

                data_line1:JSON.stringify(piano_index_arr2),
                data_type1:JSON.stringify(piano_type_arr2), 

                data_line2:JSON.stringify(piano_index_arr3),
                data_type2:JSON.stringify(piano_type_arr3),
                category:$("#category_midi").val(),
                level_midi:$("#level_midi").val(),
                author_midi:$("#author_midi").val(),
                id:id_midi,
                act:type_act,
                name_midi:midi_name,
                speed_midi:midi_speed,
                sell_midi:midi_sell,
                id_device:'<?php echo $id_device;?>'
            },
            success: function(data, textStatus, jqXHR)
            {
                swal("Midi",data);
            }
        });
    }
}


var run_m=null;
var count_index_col_midi=0;

function play_sound(s_name){
    if(s_name[1]=='#'){
        s_name=s_name[0]+s_name[2]+"_1";
        s_name=s_name.toLowerCase();
    }

    if(s_name=='...'){return false;}
    if(s_name==''){return false;}

    var audio = new Audio('Sound/'+s_name+'.mp3');
    audio.play();
}

function play_midi(){
    $("#midi_edit .line .midi").removeClass("sel");
    run_m=setInterval(rund_midi, 200);
    $("#btn_play_midi").hide();
    $("#btn_stop_midi").show();
}

function stop_midi(){
    $("#midi_edit .line .midi").removeClass("play");
    count_index_col_midi=0;
    clearInterval(run_m);
    $("#btn_play_midi").show();
    $("#btn_stop_midi").hide();
}

function rund_midi() {
    var name_sound0=$("#l_0_col_"+count_index_col_midi).html();
    play_sound(name_sound0);

    var name_sound1=$("#l_1_col_"+count_index_col_midi).html();
    play_sound(name_sound1);

    var name_sound2=$("#l_2_col_"+count_index_col_midi).html();
    play_sound(name_sound2);

    $("#l_0_col_"+count_index_col_midi).addClass("play");
    $("#l_1_col_"+count_index_col_midi).addClass("play");
    $("#l_2_col_"+count_index_col_midi).addClass("play");
    count_index_col_midi++;
}
</script>