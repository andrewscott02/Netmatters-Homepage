// Docs
// https://leafletjs.com/index.html

let mapElements = document.querySelectorAll(".map")

let maps = [];
let markers = [];

mapElements.forEach((item, index) => {

    var coords = [offices[index]["x_coord"], offices[index]["y_coord"]]

    var map = L.map(item, {
        center: [coords[0], coords[1]],
        zoom: 17
    });
    var marker = L.marker([coords[0], coords[1]]).addTo(map);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    maps.push(map);
    markers.push(marker);
});