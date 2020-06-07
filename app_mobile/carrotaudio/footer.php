<footer class="text-muted">
  <div class="container">
    <p class="float-right">
        <a href="#">
            <svg class="bi bi-arrow-up-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path fill-rule="evenodd" d="M4.646 8.354a.5.5 0 0 0 .708 0L8 5.707l2.646 2.647a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 0 0 0 .708z"/>
            <path fill-rule="evenodd" d="M8 11.5a.5.5 0 0 0 .5-.5V6a.5.5 0 0 0-1 0v5a.5.5 0 0 0 .5.5z"/>
            </svg> Back to top
        </a>
    </p>
    
    <a target="_blank" href="https://carrotstore.com/p/com.CarrotApp.musicforlife"><img class="app_music_icon" src="<?php echo $url;?>/images/musicforlifeicon.png"/></a>
    <p>Download the <a target="_blank" href="https://carrotstore.com/p/com.CarrotApp.musicforlife">Music For Life</a> app to listen to many other great songs</p>
    <p>This app and website are sponsored by <a target="_blank" href="https://carrotstore.com/">Carrotstore</a>.</p>
  </div>
</footer>
      <script>window.jQuery || document.write('<script src="<?php echo $url;?>/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="<?php echo $url;?>/js/bootstrap.bundle.js"></script></body>
  <script>
  function check_form_search(){
    var key_search=$("#key_search").val();
    if(key_search!=""){
      $("$form_search").submit();
      return false;
    }else{
      $("#key_search").fadeOut(100).fadeIn(50).fadeOut(100).fadeIn(50);
      return false;
    }
  }
  </script>

</html>