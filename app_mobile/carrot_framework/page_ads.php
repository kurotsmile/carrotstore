<?php
$cur_url=$this->cur_url;
$func='list';
if(isset($_REQUEST['func'])) $func=$_REQUEST['func'];
?>
<div class="cms_menu_lang" style="background-color:#a8b6d2">
    <a href="<?php echo $cur_url;?>&func=list" class="buttonPro small <?php if($func=='list'){ echo 'black'; }?>"><i class="fa fa-list-alt" aria-hidden="true"></i> Danh sách</a>
    <a href="<?php echo $cur_url;?>&func=add" class="buttonPro small <?php if($func=='add'){ echo 'black'; }?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</a>
</div>

<?php
if($func=='add'||$func=='edit'){
    $ads_app_id='';
    if(isset($_GET['app_id']))$ads_app_id=$_GET['app_id'];
    $ads_Google_Play='';
    $ads_Samsung_Galaxy_Store='';
    $ads_Microsoft_Store='';
    $ads_Amazon_app_store='';
    $ads_Carrot_store='';
    $ads_type='';

    if(isset($_POST['ads_app_id'])){
        $ads_app_id=$_POST['ads_app_id'];
        $ads_Google_Play=$_POST['Google_Play'];
        $ads_Samsung_Galaxy_Store=$_POST['Galaxy_Store'];
        $ads_Microsoft_Store=$_POST['Microsoft_Store'];
        $ads_Amazon_app_store=$_POST['Amazon_app_store'];
        $ads_Carrot_store=$_POST['Carrot_store'];
        $ads_type=$_POST['type'];

        if($func=='add'){
            $q_add=$this->q("INSERT INTO carrotsy_virtuallover.`app_ads` (`id_app`, `google_Play`, `samsung_galaxy_store`, `microsoft_store`, `amazon_app_store`, `carrot_store`,`type`) VALUES ('$ads_app_id', '$ads_Google_Play', '$ads_Samsung_Galaxy_Store', '$ads_Microsoft_Store', '$ads_Amazon_app_store', '$ads_Carrot_store','$ads_type');");
            if($q_add) echo $this->msg("Thêm quảng cáo thành công!");
        }else{
            $q_edit=$this->q("UPDATE carrotsy_virtuallover.`app_ads` SET `google_Play`='$ads_Google_Play',`samsung_galaxy_store`='$ads_Samsung_Galaxy_Store',`microsoft_store`='$ads_Microsoft_Store',`amazon_app_store`='$ads_Amazon_app_store', `carrot_store`='$ads_Carrot_store', `type`='$ads_type' WHERE `id_app` = '$ads_app_id' LIMIT 1;");
            if($q_edit) echo $this->msg("Cập nhật quảng cáo thành công!");
        }
    }

    if($func=='edit'){
        $ads_app_id=$_GET['app_id'];
        $data_edit=$this->q_data("SELECT * FROM carrotsy_virtuallover.`app_ads` WHERE `id_app` = '$ads_app_id' LIMIT 1");
        if($data_edit!=null){
            $ads_Google_Play=$data_edit['google_Play'];
            $ads_Samsung_Galaxy_Store=$data_edit['samsung_galaxy_store'];
            $ads_Microsoft_Store=$data_edit['microsoft_store'];
            $ads_Amazon_app_store=$data_edit['amazon_app_store'];
            $ads_Carrot_store=$data_edit['carrot_store'];
            $ads_type=$data_edit['type'];
        }

    }

    $list_app=$this->q("SELECT `id` FROM carrotsy_virtuallover.`products` WHERE `company` = 'Carrot'");
?>
<div style="float:left;margin: 10px;">
    <h2>Thêm mới quảng cáo ứng dụng</h2>
    <form style="float:left;width:auto" method="post" action="" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Chọn ứng dụng để quảng cáo</td>
            <td>
                <select name="ads_app_id" onChange="onSelect_app(this.value)">
                <option value="">Chọn ứng dụng</option>
                <?php 
                while($app=mysqli_fetch_assoc($list_app)){
                    $id_app=$app['id'];
                    $name_app=$this->q_data("SELECT `data` FROM carrotsy_virtuallover.`product_name_en` WHERE `id_product` = '$id_app' LIMIT 1");
                    $name_app=$name_app['data'];
                ?>
                    <option <?php if($ads_app_id==$id_app){ echo 'selected=true';}?> value="<?php echo $id_app;?>"><?php echo $name_app;?></option>
                <?php }?>
                </select>
            </td>
            <td>&nbsp</td>
            <td>&nbsp</td>
        </tr>
        <tr>
            <td><i class="fa fa-asterisk" aria-hidden="true"></i> Loại sản phẩm</td>
            <td>
                <select id="type" name="type">
                <option value="mobile_game" <?php if($ads_type=="mobile_game") echo 'selected';?>>mobile_game</option>
                <option value="mobile_application" <?php if($ads_type=="mobile_application") echo 'selected';?>>mobile_application</option>
                </select>
            </td>
            <td><?php echo $this->cp('type'); ?></td>
            <td>
                <?php
                $data_type=$this->q_data("SELECT `type` FROM carrotsy_virtuallover.`products` WHERE `id` = '$ads_app_id' LIMIT 1");
                if($data_type){
                    $type=$data_type['type'];
                    if($type!=null) echo '<a class="buttonPro small" onclick="$(\'#type\').val(\''.$type.'\');"><i class="fa fa-asterisk" aria-hidden="true"></i> '.$type.'</a>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-android" aria-hidden="true"></i> Google_Play</td>
            <td><input type="text" name="Google_Play" id="Google_Play" value="<?php echo $ads_Google_Play;?>"/></td>
            <td><?php echo $this->cp('Google_Play'); ?></td>
            <td>
                <?php
                $data_link=$this->q_data("SELECT `link`,`icon` FROM carrotsy_virtuallover.`product_link` WHERE `name` = 'Google Play' AND `id_product`='$ads_app_id' LIMIT 1");
                if($data_link){
                    $link_url=$data_link['link'];
                    if($data_link!=null) echo '<a class="buttonPro small" onclick="$(\'#Google_Play\').val(\''.$link_url.'\');"><i class="fa '.$data_link['icon'].'" aria-hidden="true"></i> '.$link_url.'</a>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-scribd" aria-hidden="true"></i> Samsung_Galaxy_Store</td>
            <td><input type="text" name="Galaxy_Store" id="Galaxy_Store" value="<?php echo $ads_Samsung_Galaxy_Store;?>"/></td>
            <td><?php echo $this->cp('Galaxy_Store'); ?></td>
            <td>
                <?php
                $data_link=$this->q_data("SELECT `link`,`icon` FROM carrotsy_virtuallover.`product_link` WHERE `name` = 'Samsung Galaxy Store'  AND `id_product`='$ads_app_id' LIMIT 1");
                if($data_link){
                    $link_url=$data_link['link'];
                    if($data_link!=null)  echo '<a class="buttonPro small" onclick="$(\'#Galaxy_Store\').val(\''.$link_url.'\');"><i class="fa '.$data_link['icon'].'" aria-hidden="true"></i> '.$link_url.'</a>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-windows" aria-hidden="true"></i> Microsoft_Store</td>
            <td><input type="text" name="Microsoft_Store" id="Microsoft_Store" value="<?php echo $ads_Microsoft_Store;?>"/></td>
            <td><?php echo $this->cp('Microsoft_Store'); ?></td>
            <td>
                <?php
                $data_link=$this->q_data("SELECT `link`,`icon` FROM carrotsy_virtuallover.`product_link` WHERE `name` = 'Microsoft Store' AND `id_product`='$ads_app_id' LIMIT 1");
                if($data_link){
                    $link_url=$data_link['link'];
                    if($data_link!=null) echo '<a class="buttonPro small" onclick="$(\'#Microsoft_Store\').val(\''.$link_url.'\');"><i class="fa '.$data_link['icon'].'" aria-hidden="true"></i> '.$link_url.'</a>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-amazon" aria-hidden="true"></i> Amazon_app_store</td>
            <td><input type="text" name="Amazon_app_store" id="Amazon_app_store" value="<?php echo $ads_Amazon_app_store;?>"/></td>
            <td><?php echo $this->cp('Amazon_app_store'); ?></td>
            <td>
                <?php
                $data_link=$this->q_data("SELECT `link`,`icon` FROM carrotsy_virtuallover.`product_link` WHERE `name` = 'Amazon app store' AND `id_product`='$ads_app_id' LIMIT 1");
                if($data_link){
                    $link_url=$data_link['link'];
                    if($data_link!=null) echo '<a class="buttonPro small" onclick="$(\'#Amazon_app_store\').val(\''.$link_url.'\');"><i class="fa '.$data_link['icon'].'" aria-hidden="true"></i> '.$link_url.'</a>';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td><i class="fa fa-play" aria-hidden="true"></i> Carrot_store</td>
            <td><input type="text" name="Carrot_store" id="Carrot_store" value="<?php echo $ads_Carrot_store;?>"/></td>
            <td><?php echo $this->cp('Carrot_store'); ?></td>
            <td>
                <?php
                $data_link=$this->q_data("SELECT `link`,`icon` FROM carrotsy_virtuallover.`product_link` WHERE `name` = 'Carrot store' AND `id_product`='$ads_app_id' LIMIT 1");
                if($data_link){
                    $link_url=$data_link['link'];
                    if($data_link!=null) echo '<a class="buttonPro small" onclick="$(\'#Carrot_store\').val(\''.$link_url.'\');"><i class="fa '.$data_link['icon'].'" aria-hidden="true"></i> '.$link_url.'</a>';
                }
                ?>
            </td>
        </tr>
    </table>
    <?php if($func=='add'){?>
        <button class="buttonPro green"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm mới</button>
    <?php }else{?>
        <button class="buttonPro yellow"><i class="fa fa-pencil-square" aria-hidden="true"></i> Cập nhật</button>
    <?php }?>
    <input type="hidden" value="<?php echo $func;?>" name="func" >
    </form>
<div>
<script>
function onSelect_app(val){
    window.location="<?php echo $cur_url;?>&func=<?php echo $func;?>&app_id="+val;
}
</script>
<?php
}

if($func=='list'){
    if(isset($_GET['del'])){
        $id_del=$_GET['del'];
        $q_delete=$this->q("DELETE FROM carrotsy_virtuallover.`app_ads` WHERE `id_app` ='$id_del' LIMIT 1;");
        if($q_delete) echo $this->msg("Xóa thành công $id_del !");
    }
?>
<table>
    <tr>
        <th>Biểu tượng</th>
        <th>Liên kết quảng cáo</th>
        <th>Loại</th>
        <th>Thao tác</th>
    </tr>
    <?php
    $q_list=$this->q("SELECT * FROM carrotsy_virtuallover.`app_ads`");
    while($ads=mysqli_fetch_assoc($q_list)){
        $id_app=$ads['id_app'];
        $icon_app=$this->url_carrot_store."/thumb.php?src=".$this->url_carrot_store."/product_data/".$id_app."/icon.jpg&size=60&trim=1";
    ?>
    <tr>
        <td><img src="<?php echo $icon_app;?>"/></td>
        <td>
            <ul>
            <?php if($ads['google_Play']!=''){?><li><i class="fa fa-android" aria-hidden="true"></i> <b>google_Play:</b> <a href="<?php echo $ads['google_Play'];?>" target="_blank"><?php echo $ads['google_Play'];?></a></li><?php }?>
            <?php if($ads['samsung_galaxy_store']!=''){?><li><i class="fa fa-scribd" aria-hidden="true"></i> <b>samsung_galaxy_store:</b> <a href="<?php echo $ads['samsung_galaxy_store'];?>" target="_blank"><?php echo $ads['samsung_galaxy_store'];?></a></li><?php }?>
            <?php if($ads['microsoft_store']!=''){?><li><i class="fa fa-windows" aria-hidden="true"></i> <b>microsoft_store:</b> <a href="<?php echo $ads['microsoft_store'];?>" target="_blank"><?php echo $ads['microsoft_store'];?></a></li><?php }?>
            <?php if($ads['amazon_app_store']!=''){?><li><i class="fa fa-amazon" aria-hidden="true"></i> <b>amazon_app_store:</b> <a href="<?php echo $ads['amazon_app_store'];?>" target="_blank"><?php echo $ads['amazon_app_store'];?></a></li><?php }?>
            <?php if($ads['carrot_store']!=''){?><li><i class="fa fa-play" aria-hidden="true"></i> <b>carrot_store:</b> <a href="<?php echo $ads['carrot_store'];?>" target="_blank"><?php echo $ads['carrot_store'];?></a></li><?php }?>
            </ul>
        </td>
        <td><i class="fa fa-asterisk" aria-hidden="true"></i> <?php echo $ads['type'];?></td>
        <td>
            <a class="buttonPro small yellow" href="<?php echo $cur_url;?>&func=edit&app_id=<?php echo $id_app;?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
            <a class="buttonPro small red" href="<?php echo $cur_url;?>&func=list&del=<?php echo $id_app;?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<?php
}
?>