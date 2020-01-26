@isset($place)
<div class="row">
	<div class="col-12">
		<div class="place_description">
			<h4>{{ $place['data']['displayString'] }}</h4>
			@isset($weather)
				<h5>Weather {{ $weather['weather'][0]['main'] }} <img id="wicon" src="http://openweathermap.org/img/w/{{ $weather['weather'][0]['icon'] }}.png" alt="Weather icon"> temp {{ $weather['main']['temp'] }}°F ({{ $weather['main']['temp_min'] }}°F / {{ $weather['main']['temp_max'] }}°F)</h5>
			@endisset
			<!-- <div id="map"></div> -->
		</div>
	</div>
</div>
<script>
	var map;
	var lateral = "{{ $place['data']['lat'] }}";
	var longitude = "{{ $place['data']['lng'] }}";

	function initMap() {
	    map = new google.maps.Map(document.getElementById('map'), {
	      center: {lat: parseInt(lateral), lng: parseInt(longitude)},
	      zoom: 8
	    });
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACJj6R0Xwm4PQeIuNMrFf60xzWeipvL9M&callback=initMap"
async defer> </script>
@endisset

@include('recommended')