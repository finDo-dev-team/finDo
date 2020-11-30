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
      
//var geo = L.marker(e.latlng);
          var clichy= L.marker([48.89953790309629,2.3150881725992]);
          var test = L.marker([48.7,2.315]);

          var cities = L.layerGroup([clichy,test]);

          var map = L.map("map", { center: [48.899, 2.3150], zoom: 13, layers : [cities] });



      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png").addTo(
        map
      );

     // map.locate({ setView: true, maxZoom: 16 });
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
