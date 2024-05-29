// Initialize and add the map
function initMap() {
	// The map, centered at an initial location (example: London)
	var map = new google.maps.Map(document.getElementById('googleMap'), {
		zoom: 10,
		center: { lat: 51.5074, lng: -0.1278 }, // Default center (London)
	});

	addPredefinedMarkers(map);
}


// Add predefined markers with info windows using lat long
function addPredefinedMarkers(map) {
	var locations = [
		{
			lat: 52.2004,
			lng: -1.37,
			content: '<div><strong>Home address</strong><br><a href="https://www.google.co.uk" target="_blank">Visit Google</a></div>',
			title: 'Home address',
		},
		{
			lat: 51.9954,
			lng: -2.1574,
			content: '<div><strong>Away address</strong><br><a href="https://www.yahoo.co.uk" target="_blank">Visit Yahoo</a></div>',
			title: 'Away address',
		},
	];

	locations.forEach(function (location) {
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
