<?php
$id_midi='';
if(isset($_GET['id'])) $id_midi=$_GET['id'];

if($id_midi!=''){
    $query_midi=mysqli_query($link,"SELECT * FROM carrotsy_piano.`midi` WHERE `id_midi` = '$id_midi' LIMIT 1");
    $data_midi=mysqli_fetch_assoc($query_midi);

    $title_midi='Cập nhật Midi';

    $name_midi=$data_midi['name'];
    $speed_midi=$data_midi['speed'];
    $sell_midi=$data_midi['sell'];

    $data_midi_index=array(json_decode($data_midi['data0']),json_decode($data_midi['data1']),json_decode($data_midi['data2']));
    $data_midi_type=array(json_decode($data_midi['type0']),json_decode($data_midi['type1']),json_decode($data_midi['type2']));
}

$arr_note_white=array('c2','d2','e2','f2','g2','a2','b2','c3','d3','e3','f3','g3','a3','b3','c4','d4','e4','f4','g4','a4','b4','c5','d5','e5','f5','g5','a5','b5','c6','d6','e6','f6','g6','a6','b6','c7');
$arr_pc_note_white=array('1','2','3','4','5','6','7','8','9','0','q','w','e','r','t','y','u','i','o','p','a','s','d','f','g','h','j','k','l','z','x','c','v','b','n','m');
$arr_note_black=array('C#2','D#2','','F#2','G#2','A#2','','C#3','D#3','','F#3','G#3','A#3','','C#4','D#4','','F#4','G#4','A#4','','C#5','D#5','','F#5','G#5','A#5','','C#6','D#6','','F#6','G#6','A#6');
$arr_pc_note_black_blank=array('!','@','','$','%','^','','*','(','','Q','W','E','','T','Y','','I','O','P','','S','D','','G','H','J','','L','Z','','C','V','B');
$arr_pc_note_black=array('!','@','$','%','^','*','(','Q','W','E','T','Y','I','O','P','S','D','G','H','J','L','Z','C','V','B');
$arr_n_black=array();
for($i=0;$i<count($arr_note_black);$i++){
    if($arr_note_black[$i]!=''){
        array_push($arr_n_black,$arr_note_black[$i]);
    }
}

$arr_key_pc_w=array('49','50','51','52','53','54','55','56','57','48','81','87','69','82','84','89','85','73','79','80','65','83','68','70','71','72','74','75','76','90','88','67','86','66','78','77');
$arr_key_pc_b=array('49','50','52','53','54','56','57','81','87','69','84','89','73','79','80','83','68','71','72','74','76','90','67','86','66');


function get_index_note_black_by_txt($s_name){
    global $arr_n_black;
    for($i=0;$i<count($arr_n_black);$i++){
        if($arr_n_black[$i]==$s_name){
            return $i;
        }
    }
    return -1;
}

function get_name_note_piano($index,$type_p){
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

function get_txt_note_pc($index,$type_p){
    global $arr_pc_note_white;
    global $arr_pc_note_black;
    $txt_nanme='';
    if($index!='-1'){
        if($type_p==0){
            $txt_nanme=$arr_pc_note_white[$index];
        }else{
            $txt_nanme=$arr_pc_note_black[$index];
        }
    }
    return $txt_nanme;
}

?>

<div id="piano_title">
        <a href="#" class="btn left"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></a>
        <?php echo $name_midi; ?>
        <a href="#" class="btn right"><i onclick="show_setting();" class="fa fa-cog" aria-hidden="true"></i></a>
</div>

<div id="piano">
    <div id="note_white">
        <?php
        for($i=0;$i<count($arr_note_white);$i++){
        ?>
        <div onclick="play_piano(this);" class="note" id="note_piano_w_<?php echo $i;?>" piano_index="<?php echo $i; ?>" piano_type="0" piano_txt="<?php echo $arr_note_white[$i]; ?>"><span class="key_pc"><?php echo $arr_pc_note_white[$i]; ?></span><span class="key_name"><?php echo $arr_note_white[$i]; ?></span></div>
        <?php }?>
    </div>

    <div id="note_black">
        <?php
        for($i=0;$i<count($arr_note_black);$i++){
            $index_b=get_index_note_black_by_txt($arr_note_black[$i]);
        ?>
        <div onclick="play_piano(this);" class="note <?php if($arr_note_black[$i]==''){ echo 'none';} ?>" id="note_piano_b_<?php echo  $index_b;?>" piano_index="<?php echo $index_b; ?>" piano_type="1" piano_txt="<?php echo $arr_note_black[$i]; ?>"><span class="key_pc"><?php echo $arr_pc_note_black_blank[$i]; ?></span><span class="key_name"><?php echo $arr_note_black[$i]; ?></span></div>
        <?php }?>
    </div>
</div>

<div id="editor">
    <div id="editor_control">
    <i onclick="play_midi();" id="btn_play_midi" class="fa fa-play-circle-o fa-4x btn"  aria-hidden="true"></i>
    <i onclick="pause_midi();" id="btn_pause_midi" class="fa fa-pause-circle-o fa-4x btn"  aria-hidden="true"></i><br/>
    <i onclick="stop_midi();" id="btn_stop_midi" class="fa fa-stop-circle-o fa-2x btn"  aria-hidden="true"></i>
    <?php
        $length_data_line_0=count($data_midi_index[0]);
        $width_line=$length_data_line_0*39;
    ?>
    </div>

    <div id="editor_data">
        <div id="editor_all_line" style="width:<?php echo $width_line;?>px">
            <?php
                for($i_line=0;$i_line<count($data_midi_index);$i_line++){
                    $line_data_piano_index=$data_midi_index[$i_line];
                    $line_data_piano_type=$data_midi_type[$i_line];
            ?>
                <div class="line">
                    <?php  
                        for($i_col=0;$i_col<count($data_midi_index[$i_line]);$i_col++){ 
                            $midi_index=$line_data_piano_index[$i_col];
                            $midi_type=$line_data_piano_type[$i_col];
                            $midi_txt=get_name_note_piano($midi_index,$midi_type);
                    ?>
                        <span id="midi_<?php echo $i_line;?>_<?php echo $i_col;?>" class="midi" onclick="click_midi(this)" piano_index="<?php echo $midi_index;?>" piano_type="<?php echo $midi_type;?>" piano_txt="<?php echo $midi_txt; ?>"><?php echo $midi_txt; ?></span>
                    <?php } ?>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<div id="containt" style="width: 100%;float: left;"> 
    <div id="post_product">
        <strong><?php echo lang($link,"midi_info");?></strong><br/>
        <?php echo $label_ten_bai_hat;?>: <?php echo $data_midi['name'];?><br/>
        <?php echo $label_cap_do;?>: <?php echo $arr_midi_level[intval($data_midi['level'])];?><br/>
        <?php echo $label_toc_do_nhip;?>: <?php echo $data_midi['speed'];?><br/>
        <?php echo $label_so_not_nhac;?>: <?php echo $data_midi['length'];?>/3<br/>
        <?php if($data_midi['author']!=''){?><?php echo $label_tac_gia;?>: <?php echo $data_midi['author'].'<br/>';}?>
        <?php if($data_midi['category']!=''){echo $label_loai.' : <a  href="'.$url.'/index.php?page_view=page_piano.php&category='.$data_midi['category'].'"> '.$data_midi['category'].'</a>';}?><br/>

        <?php
            if(isset($user_login)&&$user_login->type=='admin'){
                    ?>
                    <script>function open_edit(){ window.open("<?php echo 'http://'.$name_host;?>/app_mobile/piano/?view=edit&id=<?php echo $id_midi;?>");}</script>
                    <br/>
                    <span class="buttonPro  blue" target="_blank" onclick="open_edit();" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Chỉnh sửa bài nhạc</span>
                    <br/>
                    <?php
            }
        ?>

        <?php echo show_share($link,$url.'/piano/'.$id_midi); ?>

        <div id="piano_lyrics">
        <div style="padding:30px;">
        <?php
            $text_key_pc='';
            $data_line_index_0=$data_midi_index[0];
            $data_line_index_1=$data_midi_index[1];
            $data_line_index_2=$data_midi_index[2];

            $data_line_type_0=$data_midi_type[0];
            $data_line_type_1=$data_midi_type[1];
            $data_line_type_2=$data_midi_type[2];

            for($i_col=0;$i_col<count($data_line_index_0);$i_col++){
                $index_midi0=$data_line_index_0[$i_col];
                $index_midi1=$data_line_index_1[$i_col];
                $index_midi2=$data_line_index_2[$i_col];

                $type_midi0=$data_line_type_0[$i_col];
                $type_midi1=$data_line_type_1[$i_col];
                $type_midi2=$data_line_type_2[$i_col];

                if($index_midi0==-1&&$index_midi1==-1&&$index_midi2==-1){
                    $text_key_pc.="&nbsp";
                }
                else if($index_midi0!=-1&&$index_midi1!=-1&&$index_midi2!=-1){
                    $text_key_pc.="[".get_txt_note_pc($index_midi0,$type_midi0)."".get_txt_note_pc($index_midi1,$type_midi1)."".get_txt_note_pc($index_midi2,$type_midi2)."]";
                }else{
                    if($index_midi0!=-1&&$index_midi1==-1&&$index_midi2==-1){
                        $text_key_pc.=get_txt_note_pc($index_midi0,$type_midi0);
                    }

                    if($index_midi0==-1&&$index_midi1!=-1&&$index_midi2==-1){
                        $text_key_pc.=get_txt_note_pc($index_midi1,$type_midi1);
                    }

                    if($index_midi0==-1&&$index_midi1==-1&&$index_midi2!=-1){
                        $text_key_pc.=get_txt_note_pc($index_midi2,$type_midi2);
                    }

                    if($index_midi0!=-1&&$index_midi1!=-1&&$index_midi2==-1){
                        $text_key_pc.="[".get_txt_note_pc($index_midi0,$type_midi0)."".get_txt_note_pc($index_midi1,$type_midi1)."]";
                    }

                    if($index_midi0==-1&&$index_midi1!=-1&&$index_midi2!=-1){
                        $text_key_pc.="[".get_txt_note_pc($index_midi1,$type_midi1)."".get_txt_note_pc($index_midi2,$type_midi2)."]";
                    }

                    if($index_midi0!=-1&&$index_midi1==-1&&$index_midi2!=-1){
                        $text_key_pc.="[".get_txt_note_pc($index_midi0,$type_midi0)."".get_txt_note_pc($index_midi2,$type_midi2)."]";
                    }
                }
            }
            $text_key_pc=str_ireplace("&nbsp&nbsp&nbsp","<br/>",$text_key_pc);
            $text_key_pc=str_ireplace("&nbsp&nbsp","<br/>",$text_key_pc);
            echo $text_key_pc
        ?>
        </div>
        </div>

        <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts" scrolling="no" frameborder="0" style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;"></iframe>

    </div>

    <div id="sidebar_product">
        <?php
            echo show_box_ads_page($link,'piano_page');
        ?>         
    </div>
</div>

<script>
var run_midi=null;
var index_col_play_midi=0;
var is_pause_midi=false;
var length_midi_note=<?php echo $data_midi['length'];?>;

$("#btn_pause_midi").hide();
$("#btn_stop_midi").hide();

function play_midi(){
    if(is_pause_midi==true){
        is_pause_midi=false;
        $("#btn_pause_midi").show();
        $("#btn_stop_midi").show();
        $("#btn_play_midi").hide();
    }else{
        $("#btn_pause_midi").show();
        $("#btn_stop_midi").show();
        $("#btn_play_midi").hide();
        run_midi=setInterval(play_col_midi, 200);
    }
}

function pause_midi(){
    $("#btn_play_midi").show();
    $("#btn_pause_midi").hide();
    is_pause_midi=true;
}

function stop_midi(){
    $("#editor_all_line .line .midi").removeClass('play').show(100);
    $("#btn_pause_midi").hide();
    $("#btn_stop_midi").hide();
    $("#btn_play_midi").show();
    index_col_play_midi=0;
    is_pause_midi=false;
    clearInterval(run_midi);
}

function play_col_midi(){
    if(is_pause_midi==false){
        $("#midi_0_"+index_col_play_midi).addClass('play').hide(1500);
        $("#midi_1_"+index_col_play_midi).addClass('play').hide(1500);
        $("#midi_2_"+index_col_play_midi).addClass('play').hide(1500);

        var txt_midi_0=$("#midi_0_"+index_col_play_midi).attr('piano_txt');
        var txt_midi_1=$("#midi_1_"+index_col_play_midi).attr('piano_txt');
        var txt_midi_2=$("#midi_2_"+index_col_play_midi).attr('piano_txt');

        var index_midi_0=$("#midi_0_"+index_col_play_midi).attr('piano_index');
        var index_midi_1=$("#midi_1_"+index_col_play_midi).attr('piano_index');
        var index_midi_2=$("#midi_2_"+index_col_play_midi).attr('piano_index');

        var type_midi_0=$("#midi_0_"+index_col_play_midi).attr('piano_type');
        var type_midi_1=$("#midi_1_"+index_col_play_midi).attr('piano_type');
        var type_midi_2=$("#midi_2_"+index_col_play_midi).attr('piano_type');

        $("#piano #note_white .note").removeClass('sel');
        $("#piano #note_black .note").removeClass('sel');

        if(index_midi_0!=-1){
            if(type_midi_0==0){
                $("#note_piano_w_"+index_midi_0).addClass('sel');
            }else{
                $("#note_piano_b_"+index_midi_0).addClass('sel');
            }
        }

        if(index_midi_1!=-1){
            if(type_midi_1==0){
                $("#note_piano_w_"+index_midi_1).addClass('sel');
            }else{
                $("#note_piano_b_"+index_midi_1).addClass('sel');
            }
        }


        if(index_midi_2!=-1){
            if(type_midi_2==0){
                $("#note_piano_w_"+index_midi_2).addClass('sel');
            }else{
                $("#note_piano_b_"+index_midi_2).addClass('sel');
            }
        }

        play_sound(txt_midi_0);
        play_sound(txt_midi_1);
        play_sound(txt_midi_2);

        index_col_play_midi++;
        if(index_col_play_midi>=length_midi_note){
            stop_midi(); 
        }
    }
}

function play_piano(emp){
    $("#piano #note_white .note").removeClass('sel');
    $("#piano #note_black .note").removeClass('sel');
    var piano_txt=$(emp).attr('piano_txt');
    $(emp).addClass('sel');
    play_sound(piano_txt);
}



function click_midi(emp){
    var piano_index=$(emp).attr('piano_index');
    var piano_type=$(emp).attr('piano_type');
    $("#editor_all_line .line .midi").removeClass('sel');
    $(emp).addClass('sel');
    if(piano_index!=-1){
        if(piano_type==0){
            $("#note_piano_w_"+piano_index).click();
        }else{
            $("#note_piano_b_"+piano_index).click();
        }
    }
    else{
        $("#piano #note_white .note").removeClass('sel');
        $("#piano #note_black .note").removeClass('sel');
    }
}

function play_sound(s_name){
    if(s_name[1]=='#'){
        s_name=s_name[0]+s_name[2]+"_1";
        s_name=s_name.toLowerCase();
    }
    if(s_name=='...'){return false;}
    if(s_name==''){return false;}

    var audio = new Audio('<?php echo $url;?>/app_mobile/piano/Sound/'+s_name+'.mp3');
    audio.play();
}

function show_setting(){
    swal("sss");
    $(".key_name").css("font-size","0px");
    $(".key_pc").css("font-size","0px");
}


var key_shift=false;

document.addEventListener("keydown", function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode==16) key_shift=true;
});

document.addEventListener("keydown", function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(key_shift==false){
        <?php for($i=0;$i<count($arr_key_pc_w);$i++){?>
        if(keycode=='<?php echo $arr_key_pc_w[$i];?>'){
            $("#note_piano_w_<?php echo $i;?>").click();
            return false;
        }
        <?php } ?>
    }else{
        <?php for($i=0;$i<count($arr_key_pc_b);$i++){?>
        if(keycode=='<?php echo $arr_key_pc_b[$i];?>'){
            $("#note_piano_b_<?php echo $i;?>").click();
            return false;
        }
        <?php } ?>
    }
});

document.addEventListener("keyup", function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode==16) key_shift=false;
});
</script>

<?php
$list_style='same';
$query_list_piano=mysqli_query($link,"SELECT `id_midi`,`name`,`speed`,`category`,`sell`,`level`,`length`,`author` FROM  carrotsy_piano.`midi` WHERE sell!=0 ORDER BY RAND() LIMIT 10");
?>
<div style="float: left;width: 100%;">
<h2 style="padding-left: 30px;"><?php echo lang($link,'music_same'); ?></h2>
<?php
    $label_choi_nhac=lang($link,'choi_nhac');
    $label_chi_tiet=lang($link,'chi_tiet');
    $label_loi_bai_hat=lang($link,'loi_bai_hat');
    $label_chua_co_loi_bai_hat=lang($link,'chua_co_loi_bai_hat');
    $label_music_no_rank=lang($link,'music_no_rank');
    while ($row = mysqli_fetch_assoc($query_list_piano)) {
        include "page_piano_git.php";
    }
?>
</div>