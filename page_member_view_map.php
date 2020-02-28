   <style type="text/css">
      #map {         
        width: 100%;
        height: 480px;
      }
      
    </style>
    <div id="list_map">
        <div class="title"><?php echo lang('danh_sach_tim_thay'); ?></div>
        <div class="content">
        <?php
        while ($row = mysql_fetch_array($result)) {
            if(trim($row[4])!=''){
                $address=(object)json_decode($row[4]);
        ?>
        <div class="app_list" onclick="show_pos_map(<?php echo $address->lat;?>,<?php echo $address->lng;?>)">
            <?php if($row[7]!=''){?>
                <img src="<?php echo thumb($row[7],'40x40');?>" style="float: left;margin-right: 6px;" />
            <?php }else{?>
                <img src="<?php echo thumb('images/avatar_default.png','40x40');?>" style="float: left;margin-right: 6px;" />
            <?php }?>
            <strong><?php if(trim($row[8])==''){echo limit_text($row[0],20); }else{ echo limit_words($row[8],5); } ?></strong>
        </div>
        <?php
            }
        }
        if(mysql_num_rows($result)>0){
            mysql_data_seek( $result, 0 );
        }
        ?>
        </div>
    </div>
    <div id="map">
        
    </div>
    <script type="text/javascript">

var map;
function initMap() {
    
  var image = '<?php echo $url;?>/images/carot.png';

    map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 16.525, lng:107.520},
    zoom: 10
  });
  var infoWindow = new google.maps.InfoWindow({map: map});

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      infoWindow.setPosition(pos);
      infoWindow.setContent('Bạn đang lộ diện ở gần đây :D');
      map.setCenter(pos);
      map.setZoom(12);
      
      
      var beachMarker = new google.maps.Marker({
        position: {lat:16.525,lng:107.520},
        map: map,
        icon: image,
        title: 'Nhà Trần Thiện Thanh Seo của Carrot',
        animation: google.maps.Animation.DROP,
      });
      
       var meMarker = new google.maps.Marker({
        position: pos,
        map: map,
        icon: '<?php echo thumb('images/position_me.png','60x60'); ?>',
        title: 'Vị trí của bạn',
        animation: google.maps.Animation.BOUNCE
      });

      beachMarker.addListener('click', function() {
            var infoWindow = new google.maps.InfoWindow({map: map});
            map.setZoom(15);
            map.setCenter(beachMarker.getPosition());
            infoWindow.setPosition(beachMarker.getPosition());
            infoWindow.setContent('Tran Thien Thanh');
      });
      
        <?php
        $count_row=0;
        while ($row = mysql_fetch_array($result)) {
            if(trim($row[4])!=''){
                $address=(object)json_decode($row[4]);
        ?>
              var productMarker<?php echo $count_row; ?> = new google.maps.Marker({
                position: {lat:<?php echo $address->lat;?>,lng:<?php echo $address->lng;?>},
                map: map,
                icon: '<?php echo thumb($row[7],'40x40');?>',
                title: '<?php echo show_name_User($row[0]) ?>'
              });
              
              productMarker<?php echo $count_row; ?>.addListener('click', function() {
                    var infoWindow = new google.maps.InfoWindow({map: map});
                    var txt_content='';
                    map.setZoom(15);
                    map.setCenter(productMarker<?php echo $count_row; ?>.getPosition());
                    infoWindow.setPosition(productMarker<?php echo $count_row; ?>.getPosition());
                    txt_content="<strong><?php echo show_name_User($row[0]) ?></strong>";
                    txt_content=txt_content+"<div class='hr'></div>";
                    txt_content=txt_content+"<br/><img src='<?php echo thumb($row[7],'90x90'); ?>'/><br/>";
                    infoWindow.setContent(txt_content);
              });
        <?php
                $count_row++;
            }
        }
        ?>
                  

    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
    

    
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
}

function show_pos_map(lat,lng){
    var pos = {
        lat: lat,
        lng: lng
    };
   map.setCenter(pos);
   map.setZoom(15);
}

    </script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap"></script> 
    
    </script>


    
