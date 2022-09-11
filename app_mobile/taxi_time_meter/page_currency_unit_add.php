<?php
$func_sub='add';
$c_code='';
$c_symbol='';

$c_id_edit;

if(isset($_GET['edit'])){
    $func_sub='edit';
    $c_id_edit=$_GET['edit'];
    $q_c=$this->q("SELECT `code`,`symbol` FROM `currency_unit` WHERE `code` = '$c_id_edit' LIMIT 1");
    $data_c=mysqli_fetch_assoc($q_c);
    $c_code=$data_c['code'];
    $c_symbol=$data_c['symbol'];
}

function check_code_and_symbol($code,$symbol){
    if(trim($code)==""||trim($code)==""){
        echo $this->msg("Mã tiền tệ và ký hiệu tiền tệ không được để trống!");
        return false;
    }
    return true;
}

if(isset($_POST['func_sub'])){
    $func_sub=$_POST['func_sub'];
    $c_code=strtoupper($_POST['c_code']);
    $c_symbol=addslashes($_POST['c_symbol']);

    if($func_sub=='add'){
        if(check_code_and_symbol($c_code,$c_symbol)){
            $q_add=$this->q("INSERT INTO `currency_unit` (`code`, `symbol`) VALUES ('$c_code', '$c_symbol');");
            if($q_add){
                echo $this->msg("Thêm mới đơn vị tiền tệ thành công!");
                $c_code='';
                $c_symbol='';
            }
            else
                echo $this->msg("Thêm mới đơn vị tiền tệ thất bại!");
        }
    }

    if($func_sub=='edit'){
        $c_id_edit=$_POST['c_id_edit'];
        if(check_code_and_symbol($c_code,$c_symbol)){
            $q_edit=$this->q("UPDATE `currency_unit` SET `code` = '$c_code', `symbol` = '$c_symbol' WHERE `code` = '$c_id_edit' LIMIT 1;");
            if($q_edit)
                echo $this->msg("Cập nhật đơn vị tiền tệ thành công!");
            else
                echo $this->msg("Cập nhật đơn vị tiền tệ thất bại!");
        }
    }
}

?>
<form style="width:auto;float:left" action="" method="post" name="frm_inapp" enctype="multipart/form-data">
<table>
        <tr>
            <td>Mã tiền tệ (vd:USD)</td>
            <td><input style="width:100%;" name="c_code" type="text" value="<?php echo $c_code;?>"></td>
        </tr>
        <tr>
            <td>Ký tự tiền tệ</td>
            <td><input style="width:100%;" name="c_symbol" type="text" value="<?php echo $c_symbol;?>"></td>
        </tr>
        <tr>
            <td>&nbsp</td>
            <td>
                <?php if($func_sub=="add"){ ?>
                    <button class="buttonPro green small"><i class="fa fa-plus-circle"></i> Thêm mới</button>
                <?php }else{ ?>
                    <input type="hidden" value="<?php echo $c_id_edit; ?>" name="c_id_edit"/>
                    <button class="buttonPro green small"><i class="fa fa-edit"></i> Cập nhật</button>
                <?php }?>
                
                <input type="hidden" value="<?php echo $func_sub; ?>" name="func_sub"/>
            </td>
        </tr>
</table>
</form>