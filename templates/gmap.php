<section class="mapblock">
	<div class="wrapper wrapper--fullwidth">
<!-- 		<div class="mapblock__streetview">
			<img src="img/subheronight.jpg" alt="">
		</div> -->
    <div class="mapblock__map">
      <div id="map-canvas"></div>
    </div>
	</div>
</section>


<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
  var map;
  
  function initialize() {
    var mapOptions = {
      center: new google.maps.LatLng(59.927708, 10.779035),
      zoom: 14,
      zoomControl: false,
      zoomControlOptions: {style: google.maps.ZoomControlStyle.DEFAULT,},
      disableDoubleClickZoom: true,
      mapTypeControl: true,
      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,},
      scaleControl: true,
      scrollwheel: false,
      streetViewControl: true,
      draggable: true,
      overviewMapControl: true,
      overviewMapControlOptions: {opened: false,},
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [{featureType: "landscape",stylers: [{saturation: -100}, {lightness: 65}, {visibility: "on"}]}, {featureType: "poi",stylers: [{saturation: -100}, {lightness: 51}, {visibility: "simplified"}]}, {featureType: "road.highway",stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "road.arterial",stylers: [{saturation: -100}, {lightness: 30}, {visibility: "on"}]}, {featureType: "road.local",stylers: [{saturation: -100}, {lightness: 40}, {visibility: "on"}]}, {featureType: "transit",stylers: [{saturation: -100}, {visibility: "simplified"}]}, {featureType: "administrative.province",stylers: [{visibility: "off"}]/** /},{featureType: "administrative.locality",stylers: [{ visibility: "off" }]},{featureType: "administrative.neighborhood",stylers: [{ visibility: "on" }]/**/}, {featureType: "water",elementType: "labels",stylers: [{visibility: "on"}, {lightness: -25}, {saturation: -100}]}, {featureType: "water",elementType: "geometry",stylers: [{hue: "#ffff00"}, {lightness: -25}, {saturation: -97}]}],
    }
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var myLatLng = new google.maps.LatLng(59.927708, 10.779035);
    var officeMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      //icon: image,
      animation: google.maps.Animation.DROP,
    });
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>