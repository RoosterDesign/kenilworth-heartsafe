// Initialize and add the map
function initMap() {
	// The map, centered at an initial location (example: London)
	var map = new google.maps.Map(document.getElementById('googleMap'), {
		zoom: 13,
		center: { lat: 52.33916997837139, lng: -1.5817860065996157 },
	});


	if (window.location.pathname === "/") {
		var geocoder = new google.maps.Geocoder();
		document.getElementById('postcodeForm').addEventListener('submit', function (event) {
			event.preventDefault();
			geocodePostcode(geocoder, map);
		});
	}

	addPredefinedMarkers(map);
}

// Geocode the postcode and update the map
if (window.location.pathname === "/") {	
	function geocodePostcode(geocoder, map) {
		var postcode = document.getElementById('postcode').value;

		geocoder.geocode({ address: postcode }, function (results, status) {
			if (status === 'OK') {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location,
				});
				var infowindow = new google.maps.InfoWindow({
					content: '<div><strong>Location</strong><br>' + results[0].formatted_address + '</div>',
				});
				marker.addListener('click', function () {
					infowindow.open(map, marker);
				});
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}
}

// Add predefined markers with info windows using lat long
function addPredefinedMarkers(map) {

	defibrillatorData.forEach(function (location) {
		var marker = new google.maps.Marker({
			position: { lat: location.lat, lng: location.lng },
			map: map,
			title: location.title,
		});
		var infowindow = new google.maps.InfoWindow({
			content: location.content,
		});
		marker.addListener('click', function () {
			infowindow.open(map, marker);
		});
	});
}

// Load the map
window.onload = initMap;
