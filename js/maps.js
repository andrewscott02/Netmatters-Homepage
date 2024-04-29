var map = L.map('map').setView([51.68221948340496, -0.003204432842098814], 13);
var marker = L.marker([51.68221948340496, -0.003204432842098814]).addTo(map);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);