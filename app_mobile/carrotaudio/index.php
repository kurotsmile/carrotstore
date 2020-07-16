<?php
include "config.php";
include "database.php";
include "header.php";
require("getid3/getid3.php");
?>
<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Carrot Audio</h1>
      <blockquote class="blockquote text-center">
        <p class="lead mb-0 text-muted">“Remember that wherever your heart is, there you will find your treasure.”</p>
        <p class="blockquote-footer"><cite title="Source Title">Paulo Coelho, The Alchemist</cite></p>
      </blockquote>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
      <?php
      $query_list_audio=mysqli_query($link,"SELECT `name_file`,`path`,`name`,`slug` FROM `data_file` ORDER BY RAND() LIMIT 20");
      while($audio=mysqli_fetch_assoc($query_list_audio)){
        $getID3 = new getID3;
        $ThisFileInfo = $getID3->analyze($audio['path']);

        $data_music_pic=$url.'/images/audio_default.jpg';
        $url_music='';
        if(trim($audio['slug']!='')){
          $url_music=$url.'/song/'.$audio['slug'];
        }else{
          $url_music=$url.'/music/'.$audio['name_file'];
        }

        if (isset($ThisFileInfo["id3v2"]["comments"])) {
          $data_music_tag = $ThisFileInfo["id3v2"]["comments"];
          if(isset($ThisFileInfo["id3v2"]['APIC'])) {
              $data_music_pic = $ThisFileInfo["id3v2"]['APIC'];
              $data_music_pic = $data_music_pic[0];
              $data_music_pic="data:image/gif;base64,".base64_encode($data_music_pic['data']);
          }
        }
      ?>

        <div class="col-md-3">
          <div class="card mb-4 shadow-sm">
            <a href="<?php echo $url_music;?>" class="thumbnail">
              <img class="bd-placeholder-img card-img-top" src="<?php echo $data_music_pic;?>" alt="<?php echo $audio["name"];?>">
            </a>

            <div class="card-body">
              <p class="card-text"><?php echo $audio["name"];?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="<?php echo $url_music;?>" type="button" class="btn btn-sm btn_play">
                  <svg class="bi bi-play-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                  </svg> Play
                  </a>

                  <a href="<?php echo $url;?>/pay/<?php echo $audio['name_file'];?>" type="button" class="btn btn-secondary btn-sm">
                  <svg class="bi bi-download" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z"/>
                    <path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z"/>
                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z"/>
                  </svg> Download  <cite>1$</cite>
                  </a>

                  <?php if($is_user_login!=''){?><a href="<?php echo $url.'/file/'.$audio['name_file'];?>" class="btn btn-sm">Edit</a><?php }?>
                </div>
                <small class="text-muted">
                  <svg class="bi bi-music-note-beamed" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13c0-1.104 1.12-2 2.5-2s2.5.896 2.5 2zm9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2z"/>
                    <path fill-rule="evenodd" d="M14 11V2h1v9h-1zM6 3v10H5V3h1z"/>
                    <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4V2.905z"/>
                  </svg>
                </small>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>



      </div>
    </div>
  </div>

</main>

<?php
include "footer.php";
?>