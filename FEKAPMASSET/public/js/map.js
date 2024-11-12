var map = L.map("mapid", {
  // Set latitude and longitude of the map center (required)
  center: [38.89, -77.03],
  // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
  zoom: 11,
});

// Create a Tile Layer and add it to the map
var tiles = new L.tileLayer("https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png", {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
  subdomains: "abcd",
  maxZoom: "19",
}).addTo(map);
