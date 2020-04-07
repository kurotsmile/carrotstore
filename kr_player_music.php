<div id="kr_player_music">
    <div class="box_area left">
        <div class="btn_play btn_control" id="kr_btn_play"><i class="fa fa-pause-circle" aria-hidden="true"></i></div>
    </div>

    <div class="box_area mid" id="kr_player_music_box_mid">
        <div id="kr_player_name_song">&nbsp;</div>
        <progress class="bar_timer" id="bar_timer_val" ></progress>
        <input type="range"  id="slider_timer_val"/>
        <?php if($is_playlist){?><i class="fa fa-step-backward btn_control btn_backward" aria-hidden="true" onclick="kr_back_song();"></i><?php }?>
        <div class="btn_refresh btn_control" id="kr_btn_refresh"><i class="fa fa-refresh" aria-hidden="true"></i></div>
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

</script>