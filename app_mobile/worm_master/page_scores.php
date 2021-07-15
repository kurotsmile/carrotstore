<table>
<?php
$list_score=$this->q("SELECT * FROM `scores` ORDER BY `score` DESC");
while($s=mysqli_fetch_assoc($list_score)){
    $s_user_id=$s['id_user'];
    $s_user_lang=$s['lang'];
?>
<tr>
    <td><?php echo $this->user($s_user_id,$s_user_lang);?></td>
    <td><?php echo $s['score'];?></td>
    <td><?php echo $s_user_lang;?></td>
</tr>
<?php }?>
<table>