<?php
include "config.php";
include "database.php";
include "function.php";
require("getid3/getid3.php");

$id='';
$slug='';
if(isset($_GET['id']))$id=$_GET['id'];
if(isset($_GET['slug']))$slug=$_GET['slug'];

if($id!='') $query_audio=mysqli_query($link,"SELECT * FROM `data_file` WHERE `name_file` = '$id' LIMIT 1");
if($slug!='') $query_audio=mysqli_query($link,"SELECT * FROM `data_file` WHERE `slug` = '$slug' LIMIT 1");

$data_audio=mysqli_fetch_assoc($query_audio);
$url_file=$url.'/'.$data_audio['path'];

$getID3 = new getID3;
$ThisFileInfo = $getID3->analyze($data_audio['path']);

$data_music_pic='';
$data_music_tag='';
$data_music_artist='';
$data_music_year='';
$data_music_album='';
$data_music_lyric='';

$data_music_pic=$url.'/images/audio_default.jpg';
if (isset($ThisFileInfo["id3v2"]["comments"])) {
    $data_music_tag = $ThisFileInfo["id3v2"]["comments"];
    if(isset($ThisFileInfo["id3v2"]['APIC'])) {
        $data_music_pic = $ThisFileInfo["id3v2"]['APIC'];
        $data_music_pic = $data_music_pic[0];
        $data_music_pic="data:image/gif;base64,".base64_encode($data_music_pic['data']);
    }
    $data_music_artist=trim($data_music_tag["artist"][0]);
    $data_music_year=trim($data_music_tag["year"][0]);
    $data_music_album=trim($data_music_tag["album"][0]);
    $data_music_lyric=strip_tags(trim($data_music_tag["unsynchronised_lyric"][0]));
}
$seo_title=$data_audio['name'].' - '.$seo_title;
$seo_description=$data_audio['name'].' lyrics';


include "header.php";
?>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1><?php echo $data_audio['name'];?></h1>
      <p class="lead text-muted"><?php echo $data_music_artist;?></p>

      <div class="mediPlayer">
        <audio class="listen" preload="none" data-size="100" src="<?php echo $url_file;?>" autoplay></audio>
      </div>
      <script>
            $(document).ready(function () {
                $('.mediPlayer').mediaPlayer();
            });
        </script>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        <div class="col-md-2">
          <img class="bd-placeholder-img card-img-top rounded" src="<?php echo $data_music_pic;?>" alt="<?php echo $audio["name"];?>">
        </div>
        <div class="col-md-10">
        <?php
        if($data_music_artist!=''){ echo '<strong><svg class="bi bi-person-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path fill-rule="evenodd" d="M2 15v-1c0-1 1-4 6-4s6 3 6 4v1H2zm6-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg> Artist : </strong> '.$data_music_artist.'<br/>';}
        if($data_music_year!=''){ echo '<strong><svg class="bi bi-calendar-date" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
            <path fill-rule="evenodd" d="M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1zm1-3a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2z"/>
            <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zm9 0a.5.5 0 0 1 .5.5V1a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5z"/>
          </svg> Year : </strong> '.$data_music_year.'<br/>';}
        if($data_music_album!=''){ echo '<strong><svg class="bi bi-music-note-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
            <path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
            <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
            <path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
          </svg> Album : </strong> '.$data_music_album.'<br/>';}
        ?>
        <br/>
        <a href="<?php echo $url;?>/pay/<?php echo $data_audio['name_file'];?>" type="button" class="btn  btn-sm btn_play">
          <svg class="bi bi-download" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z"/>
            <path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z"/>
            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z"/>
          </svg> Download  <cite>1$</cite>
        </a>

        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <?php
          if($data_music_lyric!=''){ 
            echo '<strong><svg class="bi bi-blockquote-left" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm5 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            <path d="M3.734 6.352a6.586 6.586 0 0 0-.445.275 1.94 1.94 0 0 0-.346.299 1.38 1.38 0 0 0-.252.369c-.058.129-.1.295-.123.498h.282c.242 0 .431.06.568.182.14.117.21.29.21.521a.697.697 0 0 1-.187.463c-.12.14-.289.21-.503.21-.336 0-.577-.108-.721-.327C2.072 8.619 2 8.328 2 7.969c0-.254.055-.485.164-.692.11-.21.242-.398.398-.562.16-.168.33-.31.51-.428.18-.117.33-.213.451-.287l.211.352zm2.168 0a6.588 6.588 0 0 0-.445.275 1.94 1.94 0 0 0-.346.299c-.113.12-.199.246-.257.375a1.75 1.75 0 0 0-.118.492h.282c.242 0 .431.06.568.182.14.117.21.29.21.521a.697.697 0 0 1-.187.463c-.12.14-.289.21-.504.21-.335 0-.576-.108-.72-.327-.145-.223-.217-.514-.217-.873 0-.254.055-.485.164-.692.11-.21.242-.398.398-.562.16-.168.33-.31.51-.428.18-.117.33-.213.451-.287l.211.352z"/>
            </svg> Lyric </strong><br/><p>'.$data_music_lyric.'</p>'; 
          }
          ?>
        </div>
      </div>

    </div>
  </div>

</main>

<?php
include "footer.php";
?>
