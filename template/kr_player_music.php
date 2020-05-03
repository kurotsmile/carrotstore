<div id="kr_player_music" oncontextmenu="kr_show_mini_player();return false">
    <div class="box_area left">
        <div class="btn_play btn_control" id="kr_btn_play"><i class="fa fa-pause-circle" aria-hidden="true"></i></div>
    </div>

    <div class="box_area mid" id="kr_player_music_box_mid">
        <div id="kr_player_name_song">&nbsp;</div>
        <progress class="bar_timer" id="bar_timer_val" ></progress>
        <input type="range"  id="slider_timer_val"/>
        <?php if($is_playlist){?><i class="fa fa-step-backward btn_control btn_backward" aria-hidden="true" onclick="kr_back_song();"></i><?php }?>
        <div class="btn_refresh btn_control" id="kr_btn_refresh"><i class="fa fa-refresh" aria-hidden="true"></i></div>
        <div class="btn_control" onclick="kr_show_help();"><i class="fa fa-question-circle" aria-hidden="true"></i></div>
        <?php if($is_playlist){?><i class="fa fa-step-forward btn_control btn_next" aria-hidden="true" onclick="kr_next_song();"></i><?php }?>
    </div>

    <div class="box_area volume">
        <div class="slidecontainer_volume">
            <input type="range" min="1" max="100" value="90"  id="slider_volume"/>
        </div>
        <div class="btn_mute btn_control" id="kr_btn_mute"><i class="fa fa-volume-up" aria-hidden="true"></i></div>
    </div>

    <div class="box_area timer">
        <div class="kr_timer">
            <span id="kr_timer_currentTime">00:00</span> / <span id="kr_timer_length">00:00</span>
        </div>
    </div>
</div>

<script>
    var top_bar_player=false;
    var top_x_player=500;
    const kr_audio = document.createElement('audio');
    kr_audio.autoplay=true;

    function readableDuration(seconds) {
        sec = Math.floor( seconds );
        min = Math.floor( sec / 60 );
        min = min >= 10 ? min : '0' + min;
        sec = Math.floor( sec % 60 );
        sec = sec >= 10 ? sec : '0' + sec;
        return min + ':' + sec;
    }

    $(document).ready(function() {
        top_x_player=$("#kr_player_music").offset().top;
        kr_audio.setAttribute('src', '<?php echo $url_mp3; ?>');
        kr_audio.addEventListener('ended', function() {
            <?php if($is_playlist){?>
            kr_next_song();
            <?php }else{?>
            this.play();
            <?php }?>
        }, false);
        kr_audio.addEventListener("canplay",function(){
            $("#kr_timer_length").html(readableDuration(kr_audio.duration));
            $("#bar_timer_val").attr("max",kr_audio.duration);
        });
        kr_audio.addEventListener("timeupdate",function(){
            $("#kr_timer_currentTime").html(readableDuration(kr_audio.currentTime));
            $('#bar_timer_val').val(kr_audio.currentTime);
        });

        kr_audio.addEventListener('error', function failed(e) {
            switch (e.target.error.code) {
                case e.target.error.MEDIA_ERR_ABORTED:
                    break;
                case e.target.error.MEDIA_ERR_NETWORK:
                    break;
                case e.target.error.MEDIA_ERR_DECODE:
                    break;
                case e.target.error.MEDIA_ERR_SRC_NOT_SUPPORTED:
                    $("#kr_player_music").addClass("error");
                    $("#kr_btn_play").html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i>');
                    break;
                default:
                    break;
            }
        }, true);

        $('#kr_btn_play').click(function() {
            kr_play_or_pause();
        });

        $('#kr_btn_mute').click(function() {
            kr_mute();
        });

        $('#kr_btn_refresh').click(function() {
            $("#slider_timer_val").val(0);
            kr_audio.currentTime = 0;
        });

        $('#slider_volume').change(function() {
            kr_audio.volume =parseInt($("#slider_volume").val()) / 100;
        });

        $("#kr_player_music_box_mid").mouseover(function () {
            $("#bar_timer_val").hide();
            $("#slider_timer_val").show();
            $('#slider_timer_val').val(kr_audio.currentTime);
            $("#slider_timer_val").attr("max",kr_audio.duration);
        });

        $("#kr_player_music_box_mid").mouseout(function () {
            $("#bar_timer_val").show();
            $("#slider_timer_val").hide();
        });

        $("#slider_timer_val").change(function () {
            kr_audio.currentTime = $("#slider_timer_val").val()
        });

        $(".item_playlis").click(function () {
            var index=$(this).attr("index");
            play_song_index(index);
        });

        $("#inp_search").focus(function () {
            shortcut_key_music=false;
        });

        $("#inp_search").focusout(function () {
            shortcut_key_music=true;
        });

        kr_audio.error = function() {
            console.log("Error thanh s" + videoElement.error.code + "; details: " + videoElement.error.message);
        }
    });

    function kr_play_or_pause(){
        if(kr_audio.paused) {
            kr_audio.play();
            $("#kr_btn_play").html('<i class="fa fa-pause-circle" aria-hidden="true"></i>');
        }else{
            kr_audio.pause();
            $("#kr_btn_play").html('<i class="fa fa-play-circle" aria-hidden="true"></i>');
        }
    }

    function kr_mute(){
        if(kr_audio.muted) {
            kr_audio.muted=false;
            $("#kr_btn_mute").html('<i class="fa fa-volume-up" aria-hidden="true"></i>');
        }else{
            kr_audio.muted=true;
            $("#kr_btn_mute").html('<i class="fa fa-volume-off" aria-hidden="true"></i>');
        }
    }

    document.addEventListener("keydown", function(event) {
        if(shortcut_key_music) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == 32 || keycode == 118) {
                kr_play_or_pause();
                event.preventDefault();
                return false;
            }
            if (keycode == 40 || keycode == 39) {
                kr_next_song();
                event.preventDefault();
                return false;
            }
            if (keycode == 37 || keycode == 38) {
                kr_back_song();
                event.preventDefault();
                return false;
            }

            if (keycode == 77) {
                kr_mute();
                event.preventDefault();
                return false;
            }
        }
    });

    function  kr_show_mini_player() {

    }

    function kr_show_help(){
        var html_help='';
        html_help=html_help+'<div class="kr_help_item"><span class="key_code">Space</span> <span class="txt"><?php echo lang($link,'kr_help_space'); ?></span></div>';
        html_help=html_help+'<div class="kr_help_item"><span class="key_code"><i class="fa fa-arrow-left" aria-hidden="true"></i></span> <span class="key_code"><i class="fa fa-arrow-up" aria-hidden="true"></i></span> <span class="txt"><?php echo lang($link,'kr_help_back'); ?></span></div>';
        html_help=html_help+'<div class="kr_help_item"><span class="key_code"><i class="fa fa-arrow-right" aria-hidden="true"></i></span> <span class="key_code"><i class="fa fa-arrow-down" aria-hidden="true"></i></span> <span class="txt"><?php echo lang($link,'kr_help_next'); ?></span></div>';
        html_help=html_help+'<div class="kr_help_item"><span class="key_code">M</span> <span class="txt"><?php echo lang($link,'kr_help_mute'); ?></span></div>';
        swal({html: true, title: '<?php echo lang($link,"kr_player_help"); ?>', text: html_help, showConfirmButton: true,});
    }

    $(window).scroll( function(){
        if($(window).scrollTop()>top_x_player) {
            if (top_bar_player == false) {
                $("#kr_player_music").addClass("top_bar");
                top_bar_player=true;
            }
        }else{
            if (top_bar_player ==true) {
                $("#kr_player_music").removeClass("top_bar");
                top_bar_player=false;
            }
        }
    });

</script>