<template>
  <div>
  <div id="map">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.1.0/leaflet.css"/>
    <button @click="show">Map</button>
  </div>
  </div>
</template>

<script>

import OpenStreetMapProvider from 'leaflet-geosearch'
export default {

   methods:{

        show: function() {

            var map = L.map('map').setView([47.8316,2.36078477], 13);
            L.tileLayer('//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            var fes = L.marker([48.83463210, 2.36332710]).addTo(map);
            map.locate(({setView: true, maxZoom: 14}));
            return map;

        }
   }


}
</script>
<style>
            #map {
            width: 90%;
            height: 680px;
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
            background-color:rgb(230, 232, 233);
        }

</style>
