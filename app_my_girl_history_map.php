<div id="map" style="width: 100%;height: 85%;"></div>

<script>
      function initMap() {
        var uluru = {lat: 16.52854, lng: 107.5241};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: uluru
        });
        
        infoWindow = new google.maps.InfoWindow;
        infoWindow.setPosition(uluru);
        infoWindow.setContent('Trần Thiện Thanh - Carrot');
        infoWindow.open(map);
        
        <?php 
        while ($row = mysql_fetch_array($result_tip)) {
         ?>
            var p<?php echo $row['id'];?> = {lat: <?php echo $row['location_lat'];?>, lng:<?php echo $row['location_lon'];?>};
            var marker<?php echo $row['id'];?>  = new google.maps.Marker({
              position: p<?php echo $row['id'];?> ,
              map: map,
              title: '<?php echo $row['id_device'];?>'
            });
            marker<?php echo $row['id'];?>.addListener('click',function(){
                view_device('<?php echo $row['id_device'];?>','<?php echo $row['dates'];?>','<?php echo $row['lang'];?>');
            });
        <?php
        }
        ?>
      }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $key_api_google; ?>&callback=initMap"></script>


