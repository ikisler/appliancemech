<?php
           global $options;
		  $info_latitude = ott_option('map_latitude') ? ott_option('map_latitude') : "30.0495371";
		  $info_longitude = ott_option('map_longitude') ? ott_option('map_longitude'): "31.2261273";
		  $address = ott_option('map_adreess');

      ?>

<div class="row-fluid">
  <div id="map"></div>
  <div id="map-side-bar">
    <div class="map-location" data-jmapping="{id: 5, point: {lat: <?php echo $info_latitude ;?>, lng:<?php echo $info_longitude ;?>}}">
      <div class="info-box">
        <p><?php echo $address ? $address : "20 South Park Haram, Cairo , CA 135155, EGYPT";?></p>
      </div>
    </div>
  </div>
</div>
