<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=<?php echo $_SESSION['lang']; ?>&key=AIzaSyCcYpVI8I4osXUeqWkPe-nPrakxNnaND5I"></script>
<script type="text/javascript"> 
var geocoder;

if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng);
    $('#lat').val(lat);
    $('#lng').val(lng);
}

function errorFunction(){
    alert("Geocoder failed");
}

  function initialize() {
    geocoder = new google.maps.Geocoder();
  }

  function codeLatLng(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      //console.log(results);
        if (results[1]) {
        var indice=0;
        for (var j=0; j<results.length; j++)
        {
            if (results[j].types[0]=='locality')
                {
                    indice=j;
                    break;
                }
            }
        //alert('The good number is: '+j);
        console.log(results[j]);
        for (var i=0; i<results[j].address_components.length; i++)
            {
                if (results[j].address_components[i].types[0] == "locality") {
                        //this is the object you are looking for
                        city = results[j].address_components[i];
                    }
                if (results[j].address_components[i].types[0] == "administrative_area_level_1") {
                        //this is the object you are looking for
                        region = results[j].address_components[i];
                    }
                if (results[j].address_components[i].types[0] == "country") {
                        //this is the object you are looking for
                        country = results[j].address_components[i];
                    }
            }
            //city data
            $('#address').val(city.long_name + " , " + region.long_name + " , " + country.short_name);
            } else {
              //alert("No results found");
            }
        //}
      } else {
        //alert("Geocoder failed due to: " + status);
      }
    });
  }
initialize();
</script> 

            <p>
                <div class="group">
                    <div class="title"><input type="checkbox" class="btnGroup" /> <?php echo lang($link,'dia_chi');?> </div>
                    <div class="content">
                        <i><?php echo lang($link,'tip_ps_address'); ?></i><br /><br />
                        <input class="inp" type="text" name="address" id="address" value="" />
                        <input class="inp" type="hidden" name="lat" id="lat" value="" />
                        <input class="inp" type="hidden" name="lng" id="lng" value="" />
                        <script>
                            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});
                            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                                var place = autocomplete.getPlace();
                                console.log(place.address_components);
                                $('#lat').val(place.geometry.location.lat());
                                $('#lng').val(place.geometry.location.lng());
                            });
                        </script>
                    </div>
                </div>
            </p>