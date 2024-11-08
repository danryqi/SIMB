const map = L.map('map').setView([-7.7956, 110.3695], 10); // Koordinat Yogyakarta

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
}).addTo(map);

L.marker([-7.7956, 110.3695]).addTo(map) // Marker di Yogyakarta
    .bindPopup('Yogyakarta')
    .openPopup();