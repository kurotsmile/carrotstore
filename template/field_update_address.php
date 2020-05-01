<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places"></script>
                <p>
                <div class="group">
                    <div class="title"><input type="checkbox" class="btnGroup" <?php if(trim($data[15])!=''){ echo 'checked="true"';}?> /> <?php echo lang($link,'dia_chi');?> </div>
                    <div class="content" <?php if(trim($data[15])!=''){ echo 'style="display: block;"';}?> >
                        <?php
                            $address=(object)json_decode($data[15]);
                        ?>
                        <i><?php echo lang($link,'tip_ps_address'); ?></i><br /><br />
                        <input class="inp" type="text" name="address" id="address" value="<?php echo $address->address; ?>" />
                        <input class="inp" type="hidden" name="lat" id="lat" value="<?php echo $address->lat; ?>" />
                        <input class="inp" type="hidden" name="lng" id="lng" value="<?php echo $address->lng; ?>" />
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