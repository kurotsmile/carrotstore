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
            if(trim($row[15])!=''){
                $address=(object)json_decode($row[15]);
        ?>
        <div class="app_list" onclick="show_pos_map(<?php echo $address->lat;?>,<?php echo $address->lng;?>)">
            <img src="<?php echo thumb($row[3],'40x40');?>" style="float: left;margin-right: 6px;" />
            <strong><?php echo $row[1]; ?></strong>
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
        title: 'Nhà c?a Thi?n Thanh CEO c?a Carrot'
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
        while ($row = mysql_fetch_array($result)) {
            if(trim($row[15])!=''){
                $address=(object)json_decode($row[15]);
        ?>
              var productMarker<?php echo $row[0]; ?> = new google.maps.Marker({
                position: {lat:<?php echo $address->lat;?>,lng:<?php echo $address->lng;?>},
                map: map,
                icon: '<?php echo thumb($row[3],'40x40');?>',
                title: '<?php echo $row[1];?>'
              });
              
              productMarker<?php echo $row[0]; ?>.addListener('click', function() {
                    var infoWindow = new google.maps.InfoWindow({map: map});
                    var txt_content='';
                    map.setZoom(15);
                    map.setCenter(productMarker<?php echo $row[0]; ?>.getPosition());
                    infoWindow.setPosition(productMarker<?php echo $row[0]; ?>.getPosition());
                    txt_content="<strong><?php echo $row[1];?></strong>";
                    txt_content=txt_content+"<div class='hr'></div>";
                    txt_content=txt_content+"<br/><img src='<?php echo thumb($row[3],'90x90'); ?>'/><br/>";
                    txt_content=txt_content+"<?php echo lang('loai').":<a href='".URL."/type/".$row[8]."'>".lang($row[8])."</a>"; ?></br>";
                    txt_content=txt_content+"<?php echo lang('dia_chi').":<a href='".URL."/type/".$row[8]."'>".$address->address."</a>"; ?></br></br>";
                    txt_content=txt_content+"<a class='buttonPro small purple' href='index.php?page_view=page_view.php&view_product=<?php echo $row[0];?>'><?php echo lang('chi_tiet');?></a>";
                    txt_content=txt_content+"<a onclick='add_cart(<?php echo $row[0]; ?>)' class='buttonPro small orange'><i class='fa fa-cart-plus'></i> <?php echo lang('them_vao_gio_hang'); ?></a>";
                    infoWindow.setContent(txt_content);
              });
        <?php
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
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&callback=initMap&key=AIzaSyCcYpVI8I4osXUeqWkPe-nPrakxNnaND5I"></script> 


    
