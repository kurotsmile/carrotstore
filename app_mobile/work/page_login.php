
<?php
$query_bk=mysqli_query($link,"SELECT `id` from carrotsy_virtuallover.app_my_girl_background WHERE `version` = '1' AND `category` != '15' AND `category` != '16' AND `category` != '17' AND `category` != '18' AND `category` != '19' AND `category` != '20' AND `category` != '21' AND `category` != '22' AND `category` != '23' AND `category` != '24' AND `category` != '25' AND `category` != '26' ORDER BY RAND() limit 1");
$data_bk=mysqli_fetch_array($query_bk);
$url_bk=$url_carrot_store.'/app_mygirl/obj_background/icon_'.$data_bk['id'].'.png';
$query_bk2=mysqli_query($link,"SELECT `id` from carrotsy_virtuallover.app_my_girl_background WHERE `version`='1' AND `category` != '15' AND `category` != '16' AND `category` != '17' AND `category` != '18' AND `category` != '19' AND `category` != '20' AND `category` != '21' AND `category` != '22' AND `category` != '23' AND `category` != '24' AND `category` != '25' AND `category` != '26' ORDER BY RAND() limit 1");
$data_bk2=mysqli_fetch_array($query_bk2);
$url_bk2=$url_carrot_store.'/app_mygirl/obj_background/icon_'.$data_bk2['id'].'.png';
mysqli_free_result($query_bk);
mysqli_free_result($query_bk2);

$query_cham_ngon=mysqli_query($link,"SELECT `chat` FROM carrotsy_virtuallover.`app_my_girl_vi` WHERE `disable` = 0 AND  `effect`='36' ORDER BY RAND() limit 1");
$data_cham_ngon=mysqli_fetch_array($query_cham_ngon);
mysqli_free_result($query_cham_ngon);

$id_object='';
$lang='';
$type_chat='';
$type_action='';

if(isset($_GET['id_object'])){
    $id_object=$_GET['id_object'];
    $lang=$_GET['lang'];
    $type_chat=$_GET['type_chat'];
    $type_action=$_GET['type_action'];
}
?>


<div id="back">
  <div class="backRight" style="background: #3498db url('<?php echo $url_bk; ?>');background-size: cover;background-position: 50% 50%;"></div>
  <div class="backLeft"  style="background: #e74c3c url('<?php echo $url_bk2; ?>');background-size: cover;background-position: 50% 50%;"></div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2>Quotes</h2>
        <form method="post" onsubmit="return false;">
            <q style="color: #ffed00;">
                <?php echo $data_cham_ngon['chat']; ?>
            </q>
          <div class="form-group"></div>
          <div class="form-group"></div>
          <div class="form-group"></div>
        </form>
        <button id="goLeft" class="off">Đăng nhập</button>
      </div>
    </div>
    <div class="right">
      <div class="content">
        <h2>Đăng Nhập</h2>
        <form  method="post" action="<?php echo $url.'/'; ?>">
          <div class="form-group">
            <label for="user_id" class="form-label">Tên User</label>
            <input name="user_id" type="text" class="input" placeholder="Nhập tên" /><br />
            <label for="user_pass" class="form-label">Mật Khẩu</label>
            <input name="user_pass" class="input" type="password" placeholder="Nhập mật khẩu" />
            <input type="hidden" value="<?php if(isset($user_name)) echo $user_name;?>" name="user_work" />
            
            <input type="hidden" name="id_object" value="<?php echo $id_object; ?>" />
            <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
            <input type="hidden" name="type_chat" value="<?php echo $type_chat; ?>" />
            <input type="hidden" name="type_action" value="<?php echo $type_action; ?>" />
          </div>
          <button id="goRight" class="off" onclick="go_right();return false;">Quotes</button>
          <button id="login" name="submit_login" type="submit">đăng nhập</button>
          <?php
          if(isset($_SESSION['msg'])){
            echo '<p><i  style="color:red">'.$_SESSION['msg'].'</i></p>';
			unset($_SESSION['msg']);
          }
        ?>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function(){
  $('#goRight').on('click', function(){

  });
  $('#goLeft').on('click', function(){
    $('#slideBox').animate({
      'marginLeft' : '50%'
    });
    $('.topLayer').animate({
      'marginLeft': '0'
    });
  });
});

function go_right(){
        $('#slideBox').animate({
      'marginLeft' : '0'
    });
    $('.topLayer').animate({
      'marginLeft' : '100%'
    });
}
</script>