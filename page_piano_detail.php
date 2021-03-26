<?php
$id_midi='';
$name_midi='';
if(isset($_GET['id'])) $id_midi=$_GET['id'];

if($id_midi!=''||$id_midi!='new'){
    $query_midi=mysqli_query($link,"SELECT * FROM carrotsy_piano.`midi` WHERE `id_midi` = '$id_midi' LIMIT 1");
    $data_midi=mysqli_fetch_assoc($query_midi);

    $title_midi='Cập nhật Midi';

    $name_midi=$data_midi['name'];
    $speed_midi=$data_midi['speed'];
    $sell_midi=$data_midi['sell'];
    $length_midi=$data_midi['length'];
    $length_line_midi=$data_midi['length_line'];

    $data_midi_index=array();
    $data_midi_type=array();

    if($data_midi['data0']!=''){ array_push($data_midi_index,json_decode($data_midi['data0']));}
    if($data_midi['type0']!=''){ array_push($data_midi_type,json_decode($data_midi['type0']));}

    if($data_midi['data1']!=''){ array_push($data_midi_index,json_decode($data_midi['data1']));}
    if($data_midi['type1']!=''){ array_push($data_midi_type,json_decode($data_midi['type1']));}

    if($data_midi['data2']!=''){ array_push($data_midi_index,json_decode($data_midi['data2']));}
    if($data_midi['type2']!=''){ array_push($data_midi_type,json_decode($data_midi['type2']));}

    if($data_midi['data3']!=''){ array_push($data_midi_index,json_decode($data_midi['data3']));}
    if($data_midi['type3']!=''){ array_push($data_midi_type,json_decode($data_midi['type3']));}

    if($data_midi['data4']!=''){ array_push($data_midi_index,json_decode($data_midi['data4']));}
    if($data_midi['type4']!=''){ array_push($data_midi_type,json_decode($data_midi['type4']));}

    if($data_midi['data5']!=''){ array_push($data_midi_index,json_decode($data_midi['data5']));}
    if($data_midi['type5']!=''){ array_push($data_midi_type,json_decode($data_midi['type5']));}

    if($data_midi['data6']!=''){ array_push($data_midi_index,json_decode($data_midi['data6']));}
    if($data_midi['type6']!=''){ array_push($data_midi_type,json_decode($data_midi['type6']));}

    if($data_midi['data7']!=''){ array_push($data_midi_index,json_decode($data_midi['data7']));}
    if($data_midi['type7']!=''){ array_push($data_midi_type,json_decode($data_midi['type7']));}

    if($data_midi['data8']!=''){ array_push($data_midi_index,json_decode($data_midi['data8']));}
    if($data_midi['type8']!=''){ array_push($data_midi_type,json_decode($data_midi['type8']));}

    if($data_midi['data9']!=''){ array_push($data_midi_index,json_decode($data_midi['data9']));}
    if($data_midi['type9']!=''){ array_push($data_midi_type,json_decode($data_midi['type9']));}
}

if($id_midi=='new'){
    $name_midi=lang($link,"tao_moi_midi");
    $data_midi_index=array(array(-1));
    $data_midi_type=array(array(0));
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
$is_show_key_pc='1';
$is_show_key_name='1';

if(isset($_SESSION['is_show_key_pc'])){ $is_show_key_pc=$_SESSION['is_show_key_pc']; }
if(isset($_SESSION['is_show_key_name'])){ $is_show_key_name=$_SESSION['is_show_key_name']; }

?>

<div id="piano_title">
    <?php if($id_midi=='new'){?>
        <a href="<?php echo $url;?>/piano" class="btn left"><i class="fa fa-list" aria-hidden="true"></i></a>
    <?php }else{?>
        <a href="<?php echo $url;?>/piano/new" class="btn left"><i class="fa fa-dot-circle-o" aria-hidden="true"></i></a>
    <?php }?>
    <?php echo $name_midi; ?>
    <a href="#" class="btn right"><i onclick="show_setting();" class="fa fa-cog" aria-hidden="true"></i></a>
</div>

<div id="piano">
    <div id="note_white">
        <?php
        for($i=0;$i<count($arr_note_white);$i++){
        ?>
        <div onclick="play_piano(this);" class="note" id="note_piano_w_<?php echo $i;?>" piano_index="<?php echo $i; ?>" piano_type="0" piano_txt="<?php echo $arr_note_white[$i]; ?>">
            <span class="key_pc" <?php if($is_show_key_pc=='0'){ echo 'style="font-size:0px"'; } ?>><?php echo $arr_pc_note_white[$i]; ?></span>
            <span class="key_name" <?php if($is_show_key_name=='0'){ echo 'style="font-size:0px"'; } ?>><?php echo $arr_note_white[$i]; ?></span>
        </div>
        <?php }?>
    </div>

    <div id="note_black">
        <?php
        for($i=0;$i<count($arr_note_black);$i++){
            $index_b=get_index_note_black_by_txt($arr_note_black[$i]);
        ?>
        <div onclick="play_piano(this);" class="note <?php if($arr_note_black[$i]==''){ echo 'none';} ?>" id="note_piano_b_<?php echo  $index_b;?>" piano_index="<?php echo $index_b; ?>" piano_type="1" piano_txt="<?php echo $arr_note_black[$i]; ?>">
            <span class="key_pc" <?php if($is_show_key_pc=='0'){ echo 'style="font-size:0px"'; } ?>><?php echo $arr_pc_note_black_blank[$i]; ?></span>
            <span class="key_name" <?php if($is_show_key_name=='0'){ echo 'style="font-size:0px"'; } ?>><?php echo $arr_note_black[$i]; ?></span>
        </div>
        <?php }?>
    </div>
</div>

<div id="editor" <?php if($id_midi=='new'){ echo 'class="draft"';}?>>
    <div id="editor_control">
    <i onclick="play_midi();" id="btn_play_midi" class="fa fa-play-circle-o fa-4x btn"  aria-hidden="true"></i>
    <i onclick="pause_midi();" id="btn_pause_midi" class="fa fa-pause-circle-o fa-4x btn"  aria-hidden="true"></i><br/>
    <i onclick="stop_midi();" id="btn_stop_midi" class="fa fa-stop-circle-o fa-2x btn"  aria-hidden="true"></i>
    <?php
        $length_data_line_0=count($data_midi_index[0]);
        if($id_midi=='new'){
            $width_line="500";
        }else{
            $width_line=$length_data_line_0*39;
        }
    ?>
    </div>

    <div id="editor_data">
        <div id="editor_all_line" style="width:<?php echo $width_line;?>px">
            <?php
                for($i_line=0;$i_line<count($data_midi_index);$i_line++){
                    $line_data_piano_index=$data_midi_index[$i_line];
                    $line_data_piano_type=$data_midi_type[$i_line];
            ?>
                <div class="line" id="editor_line_<?php echo $i_line;?>">
                    <?php  
                        for($i_col=0;$i_col<count($data_midi_index[$i_line]);$i_col++){ 
                            $midi_index=$line_data_piano_index[$i_col];
                            $midi_type=$line_data_piano_type[$i_col];
                            $midi_txt=get_name_note_piano($midi_index,$midi_type);
                    ?>
                        <span id="midi_<?php echo $i_line;?>_<?php echo $i_col;?>" class="midi" onclick="click_midi(this)" piano_index="<?php echo $midi_index;?>" piano_type="<?php echo $midi_type;?>" piano_txt="<?php echo $midi_txt; ?>" editor_line="<?php echo $i_line;?>" editor_col="<?php echo $i_col;?>"><?php echo $midi_txt; ?></span>
                    <?php } ?>
                </div>
            <?php }?>
        </div>
    </div>
</div>

<?php if($id_midi!='new'){?>
<div id="containt" style="width: 100%;float: left;"> 
    <div id="post_product">
        <strong><?php echo lang($link,"midi_info");?></strong><br/>
        <div  style="width: 100%;float: left;"> 
            <?php 
                include_once "phpqrcode/qrlib.php";
                QRcode::png($url.'/piano/'.$id_midi, 'phpqrcode/img_piano/'.$id_midi.'.png', 'M', 4, 2);
            ?>
            <img alt="Download song" src="<?php echo $url;?>/phpqrcode/img_piano/<?php echo $id_midi;?>.png" style="float: left;margin: 2px;" />
            <span onclick="export_midi_file();" id="download_song" class="full" style="cursor: pointer;"> <i class="fa fa-download fa-3x" aria-hidden="true" style="margin-top: 20px;"></i><br> <span style="word-wrap: break-word;width: 99%;float: left;"><?php echo lang($link,"midi_download");?></span><span style="font-size: 12px;text-align: center;width: 100%;float: left;">(.Mid)</span> </span>
        </div>
        <?php echo $label_ten_bai_hat;?>: <?php echo $data_midi['name'];?><br/>
        <?php echo $label_cap_do;?>: <?php echo $arr_midi_level[intval($data_midi['level'])];?><br/>
        <?php echo $label_toc_do_nhip;?>: <?php echo $data_midi['speed'];?><br/>
        <?php echo $label_so_not_nhac;?>: <?php echo $length_midi;?>/<?php echo $length_line_midi;?><br/>
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
            echo '<strong>'.lang($link,"midi_show_pc_key").'</strong><br/><br/>';
            echo $text_key_pc;
        ?>
        </div>
        </div>

        <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/virtuallover?ref=ts&fref=ts" scrolling="no" frameborder="0" style="border:none;height: 50px;float: left; width: 100%;margin-top: 20px;"></iframe>
        
    </div>

    <div id="sidebar_product">
        <?php
            echo show_box_ads_page($link,'piano_page');
        ?>   

        <?php
        if(get_setting($link,'show_ads')=='1') {
        ?>
            <ins class="adsbygoogle" style="display:inline-block;width:300px;height:300px" data-ad-client="ca-pub-5388516931803092" data-ad-slot="5771636042"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        <?php }?>      
    </div>
</div>
<?php }else{?>
<div style="float:left;width:100%">
    <div id="btn_add_line_midi" class="buttonPro green" onclick="add_line_midi();"><i class="fa fa-plus-square-o" aria-hidden="true"></i> <?php echo lang($link,"midi_add_line");?></div>
    <div id="btn_add_col_midi" class="buttonPro green" onclick="add_col_empty();"><i class="fa fa-plus-square" aria-hidden="true"></i> <?php echo lang($link,"midi_add_column");?></div>
    <div id="btn_delete_line_midi" class="buttonPro red" onclick="delete_line_midi();"><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang($link,"midi_del_row");?></div>
    <div id="btn_delete_col_midi" class="buttonPro red" onclick="delete_col_midi();"><i class="fa fa-trash" aria-hidden="true"></i> <?php echo lang($link,"midi_del_col");?></div>
    <div id="btn_empty_midi" class="buttonPro red" onclick="empty_midi();"><i class="fa fa-eraser" aria-hidden="true"></i> <?php echo lang($link,"midi_empty");?></div>
    <div id="btn_import_key_pc" class="buttonPro green" onclick="show_import_key_pc();"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo lang($link,"midi_form_pc");?></div>
</div>
<div style="float:left;width:100%">
    <div id="btn_public_midi" class="buttonPro green large" onclick="show_public_midi();"><i class="fa fa-telegram" aria-hidden="true"></i> <?php echo lang($link,"midi_publish");?></div>
    <div id="btn_export_midi" class="buttonPro green large" onclick="export_midi_file();"><i class="fa fa-download" aria-hidden="true"></i> <?php echo lang($link,"midi_export");?></div>
</div>

<div style="float:left;width:100%">
    <div style="padding:10px;">
    <h3><?php echo lang($link,"midi_help");?></h3>
    <p><?php echo lang($link,"midi_help_tip");?></p>

    <p>
        <strong><?php echo lang($link,"midi_use");?></strong>
        <ul>
            <li><?php echo lang($link,"midi_use1");?></li>
            <li><?php echo lang($link,"midi_use2");?></i>
            <li><?php echo lang($link,"midi_use3");?></i>
            <li><?php echo lang($link,"midi_use4");?>
                <table>
                    <tr><td><i class="fa fa-plus-square-o" aria-hidden="true"></i> <?php echo lang($link,"midi_add_line");?></td><td><?php echo lang($link,"midi_add_line_tip");?></td><td><span class="key_code" style="margin:0px;">Enter</span></td></tr>
                    <tr><td><i class="fa fa-plus-square" aria-hidden="true"></i> <?php echo lang($link,"midi_add_column");?></td><td><?php echo lang($link,"midi_add_column_tip");?></td><td><span class="key_code" style="margin:0px;">Spacebar</span></td></tr>
                    <tr><td><i class="fa fa-trash-o" aria-hidden="true"></i> <?php echo lang($link,"midi_del_row");?></td><td><?php echo lang($link,"midi_del_row_tip");?></td><td><span class="key_code" style="margin:0px;">-</span></td></td></tr>
                    <tr><td><i class="fa fa-trash" aria-hidden="true"></i> <?php echo lang($link,"midi_del_col");?></td><td><?php echo lang($link,"midi_del_col_tip");?></td><td><span class="key_code" style="margin:0px;">Delete</span></td></tr>
                    <tr><td><i class="fa fa-eraser" aria-hidden="true"></i> <?php echo lang($link,"midi_empty");?></td><td><?php echo lang($link,"midi_empty_tip");?></td><td><span class="key_code" style="margin:0px;">Erase</span></td></tr>
                    <tr><td><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo lang($link,"midi_form_pc");?></td><td><?php echo lang($link,"midi_form_pc_tip");?></td><td><span class="key_code" style="margin:0px;">Ins</span></td></tr>
                    <tr><td><i class="fa fa-download" aria-hidden="true"></i> <?php echo lang($link,"midi_export");?></td><td><?php echo lang($link,"midi_export_tip");?></td><td><span class="key_code" style="margin:0px;">F4</span></td></tr>
                    <tr><td><i class="fa fa-telegram" aria-hidden="true"></i> <?php echo lang($link,"midi_publish");?></td><td><?php echo lang($link,"midi_publish_tip");?></td><td><span class="key_code" style="margin:0px;">F2</span></td></tr>
                </table>
            </li>
        </ul>
    </p>
    </div>
</div>
<?php }?>

<script>
var run_midi=null;
var index_col_play_midi=0;
var is_pause_midi=false;
var length_midi_note=<?php echo count($data_midi_index[0]);?>;
var length_midi_line=<?php echo count($data_midi_index);?>;
var key_shift=false;
var is_show_key_pc='<?php echo $is_show_key_pc;?>';
var is_show_key_name='<?php echo $is_show_key_name;?>';
var emp_midi_select=null;
var is_new=<?php if($id_midi=='new'){ echo 'true'; }else{ echo 'false'; }?>;
var sel_index_line_midi=-1;
var sel_index_col_midi=-1;
var is_focus_piano=true;
var arr_pc_note_white=<?php echo json_encode($arr_pc_note_white); ?>;
var arr_pc_note_black=<?php echo json_encode($arr_pc_note_black); ?>;

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
    if(is_new){
        select_col_midi_cur();
        $("#editor_line_"+sel_index_line_midi).addClass('sel');
    }
    clearInterval(run_midi);
}

function play_col_midi(){
    if(is_pause_midi==false){
        $("#piano #note_white .note").removeClass('sel');
        $("#piano #note_black .note").removeClass('sel');
        $("#editor_all_line .line .midi").removeClass('sel');
        $("#editor_all_line .line .midi").removeClass('sel_col');
        $("#editor_all_line .line").removeClass('sel');

        for(var i_line=0;i_line<length_midi_line;i_line++){
            $("#midi_"+i_line+"_"+index_col_play_midi).addClass('play').hide(1500);

            var piano_txt=$("#midi_"+i_line+"_"+index_col_play_midi).attr('piano_txt');
            var piano_index=$("#midi_"+i_line+"_"+index_col_play_midi).attr('piano_index');
            var piano_type=$("#midi_"+i_line+"_"+index_col_play_midi).attr('piano_type');
            play_sound(piano_txt);

            if(piano_index!=-1){
                if(piano_type==0){
                    $("#note_piano_w_"+piano_index).addClass('sel');
                }else{
                    $("#note_piano_b_"+piano_index).addClass('sel');
                }
            }
        }

        index_col_play_midi++;
        if(index_col_play_midi>=length_midi_note){
            stop_midi(); 
        }
    }
}

function play_piano(emp){
    var piano_txt=$(emp).attr('piano_txt');
    $("#piano #note_white .note").removeClass('sel');
    $("#piano #note_black .note").removeClass('sel');
    if(emp_midi_select==null){
        if(is_new){
            if(sel_index_line_midi==-1){
                sel_index_line_midi=0;
                sel_index_col_midi=0;
                $("#editor_line_"+sel_index_line_midi).addClass('sel');
            }
            add_col_midi(sel_index_line_midi,emp);
        }
    }else{
        if(is_new){
            var piano_type=$(emp).attr('piano_type');
            var piano_index=$(emp).attr('piano_index');

            $(emp_midi_select).html(piano_txt);
            $(emp_midi_select).attr("piano_type",piano_type);
            $(emp_midi_select).attr("piano_index",piano_index);
            $(emp_midi_select).attr("piano_txt",piano_txt);
            emp_midi_select=null;
            $("#editor_all_line .line .midi").removeClass('sel_col');
            $("#editor_all_line .line .midi").removeClass('sel');

            $("#btn_delete_line_midi").hide(100);
            $("#btn_delete_col_midi").hide(100);
            $("#btn_empty_midi").hide(100);

        }
    }
    $(emp).addClass('sel');
    play_sound(piano_txt);
}

function click_midi(emp){
    $("#editor_all_line .line").removeClass('sel');
    $("#editor_all_line .line .midi").removeClass('sel');

    sel_index_line_midi=$(emp).attr('editor_line');
    sel_index_col_midi=$(emp).attr('editor_col');

    $(emp).addClass('sel');
    if(is_new){
        $("#editor_line_"+sel_index_line_midi).addClass('sel');
        $("#btn_delete_line_midi").show(100);
        $("#btn_delete_col_midi").show(100);
        if($(emp).attr("piano_index")>-1){
            $("#btn_empty_midi").show(100);
        }else{
            $("#btn_empty_midi").hide(100);
        }
    }

    emp_midi_select=emp;
    select_col_midi_cur();
    play_piano_buy_col_midi_cur();
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
    var html_box_setting_piano='';
    html_box_setting_piano='<div>';
    html_box_setting_piano = html_box_setting_piano + '<div style="float: left;width: 100%;">';
    if(is_show_key_pc=='1'){
        html_box_setting_piano = html_box_setting_piano + '<div style="float: left;width: 100%;"><input type="checkbox" onclick="setting_piano_key_pc(this)" style="display:block;display: block;float: left;width: 25px;margin: 0px;padding: 0px;margin-right: 6px;" name="is_show_key_pc" value="1" checked><strong style="float: left;line-height: 44px;"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo lang($link,"setting_piano_key_pc");?></strong></div>';
    }else{
        html_box_setting_piano = html_box_setting_piano + '<div style="float: left;width: 100%;"><input type="checkbox" onclick="setting_piano_key_pc(this)" style="display:block;display: block;float: left;width: 25px;margin: 0px;padding: 0px;margin-right: 6px;"  name="is_show_key_pc" value="0"><strong style="float: left;line-height: 44px;"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo lang($link,"setting_piano_key_pc");?></strong></div>';
    }

    if(is_show_key_name=='1'){
        html_box_setting_piano = html_box_setting_piano + '<div style="float: left;width: 100%;"><input type="checkbox" onclick="setting_piano_key_name(this)" style="display:block;display: block;float: left;width: 25px;margin: 0px;padding: 0px;margin-right: 6px;"  name="is_show_key_name" value="1" checked><strong style="float: left;line-height: 44px;"><i class="fa fa-music" aria-hidden="true"></i> <?php echo lang($link,"setting_piano_key_name");?></strong></div>';
    }else{
        html_box_setting_piano = html_box_setting_piano + '<div style="float: left;width: 100%;"><input type="checkbox" onclick="setting_piano_key_name(this)" style="display:block;display: block;float: left;width: 25px;margin: 0px;padding: 0px;margin-right: 6px;"  name="is_show_key_name" value="0"><strong style="float: left;line-height: 44px;"><i class="fa fa-music" aria-hidden="true"></i> <?php echo lang($link,"setting_piano_key_name");?></strong></div>';
    }
    html_box_setting_piano = html_box_setting_piano + '<div style="float: left;width: 100%;"><span class="buttonPro" onclick="swal.close();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,"back");?></span></div>';
    html_box_setting_piano = html_box_setting_piano + '</div>';
    swal({html: true, title: '<?php echo lang($link,"setting_piano");?>', text: html_box_setting_piano, showConfirmButton: false,});
}

function setting_piano_key_pc(emp){
    if($(emp).attr("value")=="0"){
        $(emp).attr("value",1);
        $(".key_pc").css("font-size","16px");
        $("#note_black .note .key_pc").css("font-size","10px");
        is_show_key_pc='1';
    }else{
        $(emp).attr("value",0);
        $(".key_pc").css("font-size","0px");
        is_show_key_pc='0';
    }
    save_setting_piano_key('is_show_key_pc',is_show_key_pc);
}

function setting_piano_key_name(emp){
    if($(emp).attr("value")=="0"){
        $(emp).attr("value",1);
        $(".key_name").css("font-size","10px");
        is_show_key_name='1';
    }else{
        $(emp).attr("value",0);
        $(".key_name").css("font-size","0px");
        is_show_key_name='0';
    }
    save_setting_piano_key('is_show_key_name',is_show_key_name);
}

function save_setting_piano_key(name_func,val_save){
    $.ajax({
        url: "<?php echo $url;?>/index.php",
        type: "post",
        data: "function=save_setting_piano_key&val="+val_save+"&name_func="+name_func,
        success: function (data, textStatus, jqXHR) {}
    });
}

document.addEventListener("keydown", function(event) {
    if(is_focus_piano){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode==16) key_shift=true;
    }
});

document.addEventListener("keydown", function(event) {
    if(is_focus_piano){
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
    }
});

document.addEventListener("keyup", function(event) {
    if(is_focus_piano){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode==16) key_shift=false;
    }
});

<?php if($id_midi=='new'){?>
function add_line_midi(){
    if(length_midi_line<10){
        var txt_note_midi='';
        for(var i_midi_col=0;i_midi_col<length_midi_note;i_midi_col++){
            txt_note_midi=txt_note_midi+"<span id='midi_"+length_midi_line+"_"+i_midi_col+"' class='midi' onclick='click_midi(this)' piano_index='-1' piano_type='0' piano_txt='...' editor_line='"+length_midi_line+"' editor_col='"+i_midi_col+"'>...</span>";
        }
        $("#editor_all_line").append("<div class='line' id='editor_line_"+length_midi_line+"' >"+txt_note_midi+"</div>");
        length_midi_line++;
    }
    if(length_midi_line>=10){$("#btn_add_line_midi").hide();}
}

function add_col_midi(index_line,emp_piano){
    for(var i=0;i<length_midi_line;i++){
        if(i==index_line){
            var piano_type=$(emp_piano).attr('piano_type');
            var piano_index=$(emp_piano).attr('piano_index');
            var piano_txt=$(emp_piano).attr('piano_txt');
            $("#editor_line_"+i).append("<span id='midi_"+i+"_"+length_midi_note+"' class='midi' onclick='click_midi(this)' piano_index='"+piano_index+"' piano_type='"+piano_type+"' piano_txt='"+piano_txt+"' editor_line='"+i+"' editor_col='"+length_midi_note+"'>"+piano_txt+"</span>");
        }else{
            $("#editor_line_"+i).append("<span id='midi_"+i+"_"+length_midi_note+"' class='midi' onclick='click_midi(this)' piano_index='-1' piano_type='0' piano_txt='...' editor_line='"+i+"' editor_col='"+length_midi_note+"'>...</span>");
        }
    }
    
    sel_index_col_midi=length_midi_note;
    select_col_midi_cur();
    length_midi_note++;
    $("#editor_all_line").width(40*length_midi_note);
}

function add_col_empty(){
    for(var i=0;i<length_midi_line;i++){
        $("#editor_line_"+i).append("<span id='midi_"+i+"_"+length_midi_note+"' class='midi' onclick='click_midi(this)' piano_index='-1' piano_type='0' piano_txt='...' editor_line='"+i+"' editor_col='"+length_midi_note+"'>...</span>");
    }
    sel_index_col_midi=length_midi_note;
    select_col_midi_cur();
    length_midi_note++;
    $("#editor_all_line").width(40*length_midi_note);
}

function delete_line_midi(){
    if(sel_index_line_midi>-1){
        $("#editor_line_"+sel_index_line_midi).remove();
        length_midi_line--;
        fix_and_update_editor_midi();
    }
}

function delete_col_midi(){
    if(sel_index_col_midi>-1){
        for(var i=0;i<length_midi_line;i++){
            $("#midi_"+i+"_"+sel_index_col_midi).remove();
        }
        length_midi_note--;
        fix_and_update_editor_midi();
    }
}

function fix_and_update_editor_midi(){
    var i_line=0;
    $("#editor_all_line .line").each(function(){
        $(this).attr("id","editor_line_"+i_line);
        var i_col=0;
        $(this).find(".midi").each(function(){
            $(this).attr("id","midi_"+i_line+"_"+i_col);
            $(this).attr("editor_line",i_line);
            $(this).attr("editor_col",i_col);
            i_col++;
        });
        i_line++;
    });
}

function empty_midi(){
    $(emp_midi_select).html("...");
    $(emp_midi_select).attr("piano_type",0);
    $(emp_midi_select).attr("piano_index",-1);
    $(emp_midi_select).attr("piano_txt","...");
    emp_midi_select=null;
    $("#btn_empty_midi").hide(100);
}

document.addEventListener("keyup", function(event) {
    if(is_focus_piano){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode=="32"){add_col_empty();}
        if(keycode=="8"){empty_midi();}
        if(keycode=="46"){delete_col_midi();}
        if(keycode=="189"){delete_line_midi();}
        if(keycode=="45"){show_import_key_pc();}
        if(keycode=="13"){add_line_midi();}
        if(keycode=="115"){export_midi_file();}
        if(keycode=="112"){show_public_midi();}
    }
});

function show_midi_by_key_pc(index_line,index_col,s_name_key_pc){
    var txt_midi_html="";
    var piano_index=-1;
    var piano_txt="...";
    var piano_type=0;

    for(var i_n=0;i_n<arr_pc_note_white.length;i_n++){
        if(s_name_key_pc==arr_pc_note_white[i_n]){
            piano_txt=$("#note_piano_w_"+i_n).attr("piano_txt");
            piano_index=i_n;
            piano_type=0;
        }
    }

    for(var i_n=0;i_n<arr_pc_note_black.length;i_n++){
        if(s_name_key_pc==arr_pc_note_black[i_n]){
            piano_txt=$("#note_piano_b_"+i_n).attr("piano_txt");
            piano_index=i_n;
            piano_type=1;
        }
    }

    txt_midi_html="<span id='midi_"+index_line+"_"+index_col+"' class='midi' onclick='click_midi(this)' piano_index='"+piano_index+"' piano_type='"+piano_type+"' piano_txt='"+piano_txt+"' editor_line='"+index_line+"' editor_col='"+index_col+"'>"+piano_txt+"</span>";
    return txt_midi_html;
}

function load_midi_from_key_pc(){
    length_midi_note=0;
    $("#editor_all_line .line").html("");
    $("#editor_all_line").width(0);
    var data_key_pc=$("#key_pc_midi").val();
    arr_key=data_key_pc.split(" ");
    $.each(arr_key, function( i, val ) {
        if(val.indexOf("[")>-1){
            var s_note_midi_group=val.substring(val.indexOf("[")+1,val.indexOf("]"));
            add_col_midi_buy_group_midi_note(s_note_midi_group);
        }else{
            for(var i_index_s=0;i_index_s<val.length;i_index_s++){
                add_col_midi_one_note(val[i_index_s]);
            }
        }
        add_col_empty();
    });
}

function add_col_midi_buy_group_midi_note(s_note_group){
    if(s_note_group.length>length_midi_line){
        for(var i=length_midi_line;i<s_note_group.length;i++){
            add_line_midi();
        }
    }
    for(var i=0;i<length_midi_line;i++){
        if(i<s_note_group.length){
            $("#editor_line_"+i).append(show_midi_by_key_pc(i,length_midi_note,s_note_group[i]));
        }else{
            $("#editor_line_"+i).append("<span id='midi_"+i+"_"+length_midi_note+"' class='midi' onclick='click_midi(this)' piano_index='-1' piano_type='0' piano_txt='...' editor_line='"+i+"' editor_col='"+length_midi_note+"'>...</span>");
        }
    }
    sel_index_col_midi=length_midi_note;
    select_col_midi_cur();
    length_midi_note++;
    $("#editor_all_line").width(40*length_midi_note);
}

function add_col_midi_one_note(s_note){
    for(var i=0;i<length_midi_line;i++){
        if(i==0){
            var piano_type=0;
            var piano_index=1;
            var piano_txt=s_note;
            $("#editor_line_"+i).append(show_midi_by_key_pc(i,length_midi_note,s_note));
        }else{
            $("#editor_line_"+i).append("<span id='midi_"+i+"_"+length_midi_note+"' class='midi' onclick='click_midi(this)' piano_index='-1' piano_type='0' piano_txt='...' editor_line='"+i+"' editor_col='"+length_midi_note+"'>...</span>");
        }
    }

    sel_index_col_midi=length_midi_note;
    select_col_midi_cur();
    length_midi_note++;
    $("#editor_all_line").width(40*length_midi_note);
}

function show_import_key_pc(){
    var html_box_import='';
    html_box_import='<div>';
    html_box_import = html_box_import + '<div style="float: left;width: 100%;">';
    html_box_import = html_box_import + '<div style="float: left;width: 100%;"><?php echo lang($link,"midi_form_pc_tip");?></div>';
    html_box_import = html_box_import + '<div style="float: left;width: 100%;"><textarea id="key_pc_midi" style="width:100%;height:200px;" cols="70"  onfocus="set_no_focus_piano()" onblur="set_focus_piano()"></textarea></div>';
    html_box_import = html_box_import + '<div style="float: left;width: 100%;"><span class="buttonPro green" onclick="load_midi_from_key_pc();swal.close();"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo lang($link,"hoan_tat");?></span><span class="buttonPro" onclick="set_focus_piano();swal.close();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,"back");?></span></div>';
    html_box_import = html_box_import + '</div>';
    swal({html: true, title: "<?php echo lang($link,"midi_form_pc");?>", text: html_box_import, showConfirmButton: false,});
}

function show_public_midi(){
    set_no_focus_piano();
    var html_public_midi='';
    html_public_midi='<div>';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;">';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;"><label for="inp_name_midi"><?php echo lang($link,"ten_bai_hat");?></label></div>';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;"><input id="inp_name_midi" style="display:block" class="inp"/></div>';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;"><label for="sel_level_midi"><?php echo lang($link,"cap_do");?></label></div>';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;"><select class="inp" id="midi_level">';
    <?php for($i=0;$i<count($arr_midi_level);$i++){ ?>
        html_public_midi = html_public_midi + '<option value="<?php echo $i;?>"><?php echo $arr_midi_level[$i];?></option>';
    <?php } ?>
    html_public_midi = html_public_midi + '</select></div>';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;"><label for="sel_level_midi"><?php echo $label_loai;?></label></div>';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;"><select class="inp" id="midi_category">';
    html_public_midi = html_public_midi + '<option value="">None</option>';
    <?php 
        $query_category_midi=mysqli_query($link,"SELECT `name` FROM carrotsy_piano.`category`");
        while($row_category=mysqli_fetch_assoc($query_category_midi)){
    ?>
        html_public_midi = html_public_midi + '<option value="<?php echo $row_category['name'];?>"><?php echo  $row_category['name'];?></option>';
    <?php } ?>
    html_public_midi = html_public_midi + '</select></div>';
    html_public_midi = html_public_midi + '<div style="float: left;width: 100%;margin-top: 29px;"><span class="buttonPro green" onclick="sub_mid_midi();"><i class="fa fa-check-circle" aria-hidden="true"></i> <?php echo lang($link,"hoan_tat");?></span><span class="buttonPro" onclick="set_focus_piano();swal.close();"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> <?php echo lang($link,"back");?></span></div>';
    html_public_midi = html_public_midi + '</div>';
    swal({html: true, title: "<?php echo lang($link,"midi_publish");?>", text: html_public_midi, showConfirmButton: false,});
}

function sub_mid_midi(){
    var data_midi_index=[];
    var data_midi_type=[];
    var i_line=0;
    var data_midi_name=$("#inp_name_midi").val();
    var midi_level=$("#midi_level").val();
    var midi_category=$("#midi_category").val();
    swal_loading();

    $("#editor_all_line .line").each(function(){
        $(this).attr("id","editor_line_"+i_line);
        var i_col=0;
        var data_midi_line_index=[];
        var data_midi_line_type=[];

        $(this).find(".midi").each(function(){
            var piano_index=$(this).attr("piano_index");
            var piano_type=$(this).attr("piano_type");
            data_midi_line_index.push(piano_index);
            data_midi_line_type.push(piano_type);
        });
        data_midi_index.push(data_midi_line_index);
        data_midi_type.push(data_midi_line_type);
        i_line++;
    });

    if(data_midi_index[0].length>1){
        if(data_midi_name.length>0){
            $.ajax({
                url: "<?php echo $url;?>/index.php",
                type: "post",
                data: "function=sub_mid_midi&data_midi_index="+JSON.stringify(data_midi_index)+"&data_midi_type="+JSON.stringify(data_midi_type)+"&name_midi="+data_midi_name+"&midi_level="+midi_level+"&midi_category="+midi_category,
                success: function(data, textStatus, jqXHR)
                {
                    set_focus_piano();
                    swal("<?php echo lang($link,"midi_publish");?>", data, "success");
                    length_midi_note=0;
                    $("#editor_all_line .line").html("");
                    $("#editor_all_line").width(0);
                }
            });
        }else{
            swal("<?php echo lang($link,"midi_publish");?>", "<?php echo lang($link,"midi_erro_no_name");?>", "warning");
        }
    }else{
        swal("<?php echo lang($link,"midi_publish");?>", "<?php echo lang($link,"midi_erro_no_data");?>", "warning");
    }
}

<?php }?>

$(document).ready(function(){
    if(is_new){
        $("#btn_delete_line_midi").hide();
        $("#btn_delete_col_midi").hide();
        $("#btn_empty_midi").hide();
    }

    <?php for($i=0;$i<count($arr_note_white);$i++){ ?>
        var audio = new Audio('<?php echo $url;?>/app_mobile/piano/Sound/<?php echo $arr_note_white[$i];?>.mp3');
        audio.volume = 0;
        audio.addEventListener("canplay",function(){
            $("#note_piano_w_<?php echo $i;?>").fadeIn(200).fadeOut(2333).fadeIn(200);
         });
    <?php }?>

    <?php for($i=0;$i<count($arr_n_black);$i++){ ?>
        s_name='<?php echo $arr_n_black[$i]?>';
        s_name=s_name[0]+s_name[2]+"_1";
        s_name=s_name.toLowerCase();
        var audio = new Audio('<?php echo $url;?>/app_mobile/piano/Sound/'+s_name+'.mp3');
        audio.addEventListener("canplay",function(){
            $("#note_piano_b_<?php echo $i;?>").fadeIn(200).fadeOut(2333).fadeIn(200);
         });
    <?php }?>
});

function select_col_midi_cur(){
    $("#editor_all_line .line .midi").removeClass('sel_col');
    for(var i=0;i<length_midi_line;i++){
        if(i!=sel_index_line_midi) $("#midi_"+i+"_"+sel_index_col_midi).addClass('sel_col');
    }
}

function play_piano_buy_col_midi_cur(){
    $("#piano #note_white .note").removeClass('sel');
    $("#piano #note_black .note").removeClass('sel');
    for(var i_line=0;i_line<length_midi_line;i_line++){
        var piano_txt=$("#midi_"+i_line+"_"+sel_index_col_midi).attr('piano_txt');
        var piano_index=$("#midi_"+i_line+"_"+sel_index_col_midi).attr('piano_index');
        var piano_type=$("#midi_"+i_line+"_"+sel_index_col_midi).attr('piano_type');
        play_sound(piano_txt);

        if(piano_index!=-1){
            if(piano_type==0){
                $("#note_piano_w_"+piano_index).addClass('sel');
            }else{
                $("#note_piano_b_"+piano_index).addClass('sel');
            }
        }
    }
}

function set_no_focus_piano(){
    is_focus_piano=false;
}

function set_focus_piano(){
    is_focus_piano=true;
}

$("#inp_search").focus(function() {is_focus_piano=false;});
$("#inp_search").blur(function() {is_focus_piano=true;});

function export_midi_file(){
    var data_midi_index=[];
    var data_midi_type=[];
    var i_line=0;

    swal_loading();

    $("#editor_all_line .line").each(function(){
        $(this).attr("id","editor_line_"+i_line);
        var i_col=0;
        var data_midi_line_index=[];
        var data_midi_line_type=[];

        $(this).find(".midi").each(function(){
            var piano_index=$(this).attr("piano_index");
            var piano_type=$(this).attr("piano_type");
            data_midi_line_index.push(piano_index);
            data_midi_line_type.push(piano_type);
        });
        data_midi_index.push(data_midi_line_index);
        data_midi_type.push(data_midi_line_type);
        i_line++;
    });

    if(data_midi_index[0].length>1){
        $.ajax({
            url: "<?php echo $url;?>/page_piano_export_midi.php",
            type: "post",
            data: "data_midi_index="+JSON.stringify(data_midi_index)+"&data_midi_type="+JSON.stringify(data_midi_type),
            success: function(data, textStatus, jqXHR)
            {
                window.location.href='<?php echo $url; ?>/page_piano_download_midi.php?midi_name_file='+data;
                swal("<?php echo lang($link,"midi_export");?>", "<?php echo lang($link,"midi_export_success");?>", "success");
            }
        });
    }else{
        swal("<?php echo lang($link,"midi_export");?>", "<?php echo lang($link,"midi_erro_no_data");?>", "warning");
    }
}
</script>

<?php
if($id_midi!='new'){
$list_style='same';
$query_list_piano=mysqli_query($link,"SELECT `id_midi`,`name`,`speed`,`category`,`sell`,`level`,`length`,`length_line`,`author` FROM  carrotsy_piano.`midi` WHERE sell!=0 ORDER BY RAND() LIMIT 10");
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
<?php }?>

<?php
    if(get_setting($link,'show_ads')=='1') {
?>
<div style="float:left:width:100%;">
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="autorelaxed"
     data-ad-client="ca-pub-5388516931803092"
     data-ad-slot="8557873995"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php
    }
?>