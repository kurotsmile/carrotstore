<?php
$is_user_login="";
if(isset($_SESSION["user_login"])){
  $is_user_login=$_SESSION["user_login"];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo $seo_description;?>">
    <meta name="author" content="carrotstore">
    <meta name="generator" content="carrotstore">
    <title><?php echo $seo_title;?></title>

	<link href="<?php echo $url;?>/css/bootstrap.css?v=<?php echo $ver;?>" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <link href="<?php echo $url;?>/css/style.css?v=<?php echo $ver;?>" rel="stylesheet">
    <script src="<?php echo $url;?>/js/jquery.js?v=<?php echo $ver;?>"></script>
    <script src="<?php echo $url;?>/js/player.js?v=<?php echo $ver;?>"></script>
  </head>
  <body>
    <header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p style="color:white">
            Carrotaudio.com is a website that stores songs and music for free<br/>
            Let the music heal your soul and make you happy immediately!
          </p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="https://twitter.com/carrotstore1" class="text-white">Follow on Twitter</a></li>
            <li><a href="https://www.facebook.com/virtuallover" class="text-white">Like on Facebook</a></li>
            <li><a href="mailto:tranthienthanh93@gmail.com" class="text-white">Email me</a></li>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="<?php echo $url;?>" class="navbar-brand d-flex align-items-center">
        <img id="logo" src="<?php echo $url;?>/images/icon_music30.png" >
        <strong>Carrot Audio</strong>
      </a>

      <form class="form-inline" action="<?php echo $url;?>/page_search.php" method="get" id="form_search">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="key_search" id="key_search">
          <button class="btn my-2 my-sm-0 btn-sm  btn_play" onclick="check_form_search();return false;" >Search</button>
      </form>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>