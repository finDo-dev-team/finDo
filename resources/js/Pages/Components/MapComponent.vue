<template>
  <div id="map"></div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import { latLng } from "leaflet";
export default {
  mounted() {
    this.init();
  },

  methods: {
    init() {
      var map = L.map("map", { center: [51.505, -13.02626], zoom: 13 }),
        onLocationFound = function (e) {
          var radius = e.accuracy / 2;
          //L.marker(e.latlng).addTo(map)
          L.circle(e.latlng, radius).addTo(map);
          console.log(e.latlng);
        };
      function onLocationError(e) {
        alert(e.message);
      }

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(
        map
      );

      map.on("locationfound", onLocationFound);
      map.on("locationerror", onLocationError);
      map.locate({ setView: true, maxZoom: 16 });
    },
  },
};
</script>
<style>
#map {
  width: 50%;
  height: 450px;
  margin-right: 10px;
  margin-left: 100px;
  padding-bottom: 1px;
  border-radius: 1%;
  border: thick double #32a1ce;
}

html,
body {
  margin: 0;
  padding: 0;
  background-color: rgb(230, 232, 233);
}
</style>
