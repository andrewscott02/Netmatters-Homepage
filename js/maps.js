// Docs
// https://leafletjs.com/index.html

let mapElements = document.querySelectorAll(".map")

let mapCoords = [
    [51.68221948340496, -0.003204432842098814],
    [51, 0]
]

let maps = [];
let markers = [];

mapElements.forEach((item, index) => {
    var coords = mapCoords[index];

    var map = L.map(item).setView([coords[0], coords[1]], 13);
    var marker = L.marker([coords[0], coords[1]]).addTo(map);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    maps.push(map);
    markers.push(marker);
});