<template>

  <div id="map"></div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import "esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css";
import { latLng } from "leaflet";
import * as esri from "esri-leaflet-geocoder";

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

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

      map.on("locationfound", onLocationFound);
      map.on("locationerror", onLocationError);
      map.locate({ setView: true, maxZoom: 16 });

      const searchControl = new esri.Geosearch().addTo(map);
      const results = L.layerGroup().addTo(map);
      searchControl.on('results', function (data) {
            results.clearLayers();
            for (let i = data.results.length - 1; i >= 0; i--) {
                results.addLayer(L.marker(data.results[i].latlng));
            }
      });
    },
  },
};
</script>
<style>
#map {
  width: 80%;
  height: 500px;
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
