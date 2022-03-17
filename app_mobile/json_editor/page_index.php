<table>
<tr>
    <th>Id</th>
    <th>Tên dự án</th>
    <th>Ngày</th>
    <th>Người đăng</th>
    <th>Quốc gia</th>
</tr>
<?php
$list_json=$this->q("SELECT * FROM `json` LIMIT 50");
while($j=mysqli_fetch_assoc($list_json)){
?>
<tr>
    <td><a class="buttonPro small" href="<?php echo $this->url_carrot_store;?>/json_editor/<?php echo $j["id"];?>"  target="_blank"><i class="fa fa-id-card-o" aria-hidden="true"></i> <?php echo $j["id"];?></a></td>
    <td><i class="fa fa-object-group" aria-hidden="true"></i> <?php echo $j["name"];?></td>
    <td><?php echo $j["date"];?></td>
    <td><a class="buttonPro small" href="<?php echo $this->url_carrot_store;?>/app_mobile/carrot_framework/?function=show_user&user_id=<?php echo $j["user_id"];?>&user_lang=<?php echo $j["user_lang"];?>"  target="_blank"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $j["user_id"];?></a></td>
    <td><?php echo $j["user_lang"];?></td>
</tr>
<?php
}
?>
</table>