<?php
$func='add';

Class Style_Flower{
    public $name='';
    public $petal=array();
    public $pistil='';
    public $pistil_smile='';
    public $pistil_border='';
    public $bouquet_top='';
    public $bouquet_bottom='';
    public $leaf=array();
    public $ground='';
    public $pot='';
    public $sound='';
}

$style_flower=new Style_Flower();

Class Item_Obt_flower{
    public $color='';
}


for($i=0;$i<16;$i++){
    $petal=new Item_Obt_flower();
    $petal->color='#ffffff';
    array_push($style_flower->petal,$petal);
}

$pistil=new Item_Obt_flower();
$pistil->color='#ffffff';
$style_flower->pistil=$pistil;

$pistil_smile=new Item_Obt_flower();
$pistil_smile->color='#ffffff';
$style_flower->pistil_smile=$pistil_smile;

$pistil_border=new Item_Obt_flower();
$pistil_border->color='#ffffff';
$style_flower->pistil_border=$pistil_border;

$bouquet_top=new Item_Obt_flower();
$bouquet_top->color='#ffffff';
$style_flower->bouquet_top=$bouquet_top;

$bouquet_bottom=new Item_Obt_flower();
$bouquet_bottom->color='#ffffff';
$style_flower->bouquet_bottom=$bouquet_bottom;


for($i=0;$i<2;$i++){
    $leaf=new Item_Obt_flower();
    $leaf->color='#ffffff';
    array_push($style_flower->leaf,$leaf);
}

$ground=new Item_Obt_flower();
$ground->color='#ffffff';
$style_flower->ground=$ground;

$pot=new Item_Obt_flower();
$pot->color='#ffffff';
$style_flower->pot=$pot;

$style_flower->sound='1';

if(isset($_POST['act_flower'])){
    $func=$_POST['func'];
    $petal_data=$_POST['petal'];
    $pistil_data=$_POST['pistil'];
    $pistil_smile_data=$_POST['pistil_smile'];
    $pistil_border_data=$_POST['pistil_border'];
    $bouquet_top_data=$_POST['bouquet_top'];
    $bouquet_bottom_data=$_POST['bouquet_bottom'];
    $leaf_data=$_POST['leaf'];
    $ground_data=$_POST['ground'];
    $pot_data=$_POST['pot'];
    
    $style_flower=new Style_Flower();
    $style_flower->name=$_POST['flower_name'];
    
    for($i=0;$i<count($petal_data);$i++){
        $petal=new Item_Obt_flower();
        $petal->color=$petal_data[$i];
        array_push($style_flower->petal,$petal);
    }

    $pistil=new Item_Obt_flower();
    $pistil->color=$pistil_data;
    $style_flower->pistil=$pistil;
    
    $pistil_smile=new Item_Obt_flower();
    $pistil_smile->color=$pistil_smile_data;
    $style_flower->pistil_smile=$pistil_smile;
    
    $pistil_border=new Item_Obt_flower();
    $pistil_border->color=$pistil_border_data;
    $style_flower->pistil_border=$pistil_border;
    
    $bouquet_top=new Item_Obt_flower();
    $bouquet_top->color=$bouquet_top_data;
    $style_flower->bouquet_top=$bouquet_top;
    
    $bouquet_bottom=new Item_Obt_flower();
    $bouquet_bottom->color=$bouquet_bottom_data;
    $style_flower->bouquet_bottom=$bouquet_bottom;
    
    
    for($i=0;$i<2;$i++){
        $leaf=new Item_Obt_flower();
        $leaf->color=$leaf_data[$i];
        array_push($style_flower->leaf,$leaf);
    }
    
    $ground=new Item_Obt_flower();
    $ground->color=$ground_data;
    $style_flower->ground=$ground;
    
    $pot=new Item_Obt_flower();
    $pot->color=$pot_data;
    $style_flower->pot=$pot;
    
    $style_flower->sound=$_POST['sound'];
    
    $data=json_encode($style_flower);
    if($func=='add'){
        $query_add_flower=mysql_query("INSERT INTO `flower_style` (`data`) VALUES ('$data');");
        mysql_free_result($query_add_flower);
        echo 'Add Flower';
    }else{
        $id_edit=$_POST['id_edit'];
        $query_update_flower=mysql_query("UPDATE `flower_style` SET `data` = '$data' WHERE `id` = '$id_edit';");
        mysql_free_result($query_update_flower);
        echo 'Update Flower';
    }
    
}

if(isset($_GET['edit'])){
    $id_edit=$_GET['edit'];
    $func='edit';
    $get_style=mysql_query("SELECT * FROM `flower_style` WHERE `id`='$id_edit'");
    $data_style=mysql_fetch_array($get_style);
    $style_flower=new Style_Flower();
    $style_flower->name=$data_style['name'];
    $style_flower=json_decode($data_style['data']);
}

?>

<form method="POST" name="add_flower_style" id="frm_add">
    <p>
        <label>Tên hoa</label><br />
        <input type="text" name="flower_name" value="<?php echo $style_flower->name; ?>" />
    </p>

    <p>
        <label>Cánh hoa</label><br />
        <table>
        <?php
        for($i=0;$i<count($style_flower->petal);$i++){
        ?>
        <tr>
            <td>Lá <?php echo $i.':'.$style_flower->petal[$i]->color;?></td>
            <td><input type="text" name="petal[]" class="jscolor" value="#<?php echo $style_flower->petal[$i]->color;?>" /></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </p>
    
    <p>
        <label>Nhụy hoa</label><br />
        <input type="text" name="pistil" class="jscolor" value="<?php echo $style_flower->pistil->color; ?>" />
    </p>
    
    <p>
        <label>Nhụy hoa biểu tượng</label><br />
        <input type="text" name="pistil_smile" class="jscolor" value="<?php echo $style_flower->pistil_smile->color; ?>" />
    </p>
    
    <p>
        <label>Viềng hoa</label><br />
        <input type="text" name="pistil_border" class="jscolor" value="<?php echo $style_flower->pistil_border->color; ?>" />
    </p>
    
    <p>
        <label>Cuốn Trên hoa</label><br />
        <input type="text" name="bouquet_top" class="jscolor" value="<?php echo $style_flower->bouquet_top->color; ?>" />
    </p>
    
    <p>
        <label>Cuốn dưới hoa</label><br />
        <input type="text" name="bouquet_bottom" class="jscolor" value="<?php echo $style_flower->bouquet_bottom->color; ?>" />
    </p>
    
    <p>
        <label>Lá</label><br />
        <table>
        <?php
        for($i=0;$i<count($style_flower->leaf);$i++){
        ?>
        <tr>
            <td>Lá <?php echo $i.':'.$style_flower->leaf[$i]->color;?></td>
            <td><input type="text" name="leaf[]" class="jscolor" value="#<?php echo $style_flower->leaf[$i]->color;?>" /></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </p>
    
    <p>
        <label>Đất trong chậu</label><br />
        <input type="text" name="ground" class="jscolor" value="<?php echo $style_flower->ground->color; ?>" />
    </p>
    
    <p>
        <label>Chậu hoa</label><br />
        <input type="text" name="pot" class="jscolor" value="<?php echo $style_flower->pot->color; ?>" />
    </p>
    
    <p>
        <label>Âm thanh</label><br />
        <?php
        $query_list_sound=mysql_query("SELECT * FROM `sound`");
        ?>
        <select name="sound">
            <?php
            while($row_sound=mysql_fetch_array($query_list_sound)){
            ?>
            <option value="<?php echo $row_sound['id']; ?>" <?php if($style_flower->sound==$row_sound['id']){?>selected="true"<?php }?>><?php echo $row_sound['name']; ?></option>
            <?php
            }
            ?>
        </select>
        <?php
        mysql_free_result($query_list_sound);
        ?>
    </p>
    
    <p>
    <input type="hidden" name="func" value="<?php echo $func;?>" />
    <?php if($func=='add'){?>
        <input type="submit" name="act_flower" value="Thêm mới" class="buttonPro green" />
    <?php }else{?>
        <input type="hidden" name="id_edit" value="<?php echo $id_edit;?>" />
        <input type="submit" name="act_flower" value="Cập nhật" class="buttonPro green" />
    <?php }?>
    </p>
</form>