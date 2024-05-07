<script></script>
<script>
    // Get the latitude and longitude values from the saved record
    var latitude = '$record->latitude ';
    var longitude = '$record->longitude' ;

    // Initialize the map and set the view to the saved coordinates
    var map = L.map('map').setView([latitude, longitude], 13);

    // Add the OpenStreetMap tiles to the map
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add a marker at the saved coordinates
    L.marker([latitude, longitude]).addTo(map)
        .bindPopup('Saved Location') // Optional: Add a popup message
        .openPopup();
</script>
this to display map with exact locations 