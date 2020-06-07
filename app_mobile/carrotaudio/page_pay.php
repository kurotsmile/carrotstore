<?php
include "config.php";
include "database.php";
include "function.php";
require("getid3/getid3.php");

$id='';
if(isset($_GET['id']))$id=$_GET['id'];


if($id!='') $query_audio=mysqli_query($link,"SELECT * FROM `data_file` WHERE `name_file` = '$id' LIMIT 1");

$data_audio=mysqli_fetch_assoc($query_audio);
$url_file=$url.'/'.$data_audio['path'];

$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($data_audio['path']);

$data_music_pic='';
$data_music_tag='';
$data_music_artist='';

$url_music='';
if(trim($data_audio['slug']!='')){
  $url_music=$url.'/song/'.$data_audio['slug'];
}else{
  $url_music=$url.'/music/'.$data_audio['name_file'];
}

$data_music_pic=$url.'/images/audio_default.jpg';
if (isset($ThisFileInfo["id3v2"]["comments"])) {
    $data_music_tag = $ThisFileInfo["id3v2"]["comments"];
    if(isset($ThisFileInfo["id3v2"]['APIC'])) {
        $data_music_pic = $ThisFileInfo["id3v2"]['APIC'];
        $data_music_pic = $data_music_pic[0];
        $data_music_pic="data:image/gif;base64,".base64_encode($data_music_pic['data']);
    }
    $data_music_artist=trim($data_music_tag["artist"][0]);
}
$seo_title=$data_audio['name'].' - '.$seo_title;
$seo_description=$data_audio['name'].' lyrics';


include "header.php";
?>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Pay to download music</h1>
      <p class="lead text-muted">To download songs you need to pay by paypal account</p>

      <a href="<?php echo $url_music;?>"><img class="rounded" style="width:60px;" src="<?php echo $data_music_pic;?>" alt="<?php echo $audio["name"];?>"></a>
      <br/>
      <strong><?php echo $data_audio['name'];?></strong><br/>
      <span class="price_song">1$</span>
      <br/>

      <b>Benefits of buying music at <a href="<?php echo $url;?>">Carrot Audio</a>:</b><br/>
        <ul id="list_option_buy">
            <li>The mp3 file has an album image integrated</li>
            <li>Can show lyrics on the device</li>
            <li>Other information about the song, such as the artist performing and the year of publication, is included in the file</li>
        <ul>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        <div class="col-md-12" style="text-align: center;" id="pay_container">
            <h3>Choose form of payment</h3>
            <br/>
            <script>
                var PAYPAL_CLIENT = 'Ab3O6Ncj9H7uhQ90XsolTzfFi5Mu0I-C4ytZG3H5ZEvQUPnwxv5Zb5AIe_z-I_N_JTg1zfhVCFGTaENv';
                var PAYPAL_SECRET = 'EJsD0Vr7k5EFuvmdK81L-iIVDWx1hDDQiUUzrVHh_slwEGM6mfMKPQbveTszIJT-SIdqWUqikgnpd7Qw';
                var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
            </script>
            <script src="https://www.paypal.com/sdk/js?client-id=Ab3O6Ncj9H7uhQ90XsolTzfFi5Mu0I-C4ytZG3H5ZEvQUPnwxv5Zb5AIe_z-I_N_JTg1zfhVCFGTaENv"></script>

            <div id="paypal-button-container"></div>
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                        amount: {
                            currency_code:'USD',
                            value: '1.00',
                            breakdown: {
                                item_total: {value: '1.00', currency_code: 'USD'}
                            }
                        }
                        }]
                    });
                    },
                    onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        pay_success(details.payer.name.given_name,details.payer.email_address);
                    });
                    }
                }).render('#paypal-button-container');

                function pay_success(pay_name,pay_mail){
                    $.ajax({
                        url: "<?php echo $url;?>/ajax.php",
                        type: "post",
                        data: "func=pay_success&id_file=<?php echo $id;?>&pay_name="+pay_name+"&pay_mail="+pay_mail,
                        success: function (data, textStatus, jqXHR) {
                            $("#pay_container").html(data);
                        }
                    });
                }
            </script>
        </div>
      </div>


    </div>
  </div>

</main>

<?php
include "footer.php";
?>
