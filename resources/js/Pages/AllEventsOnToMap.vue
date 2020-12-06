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
<template>
<app-layout>
    <template #header>Carte</template>
    <br/>
    <div id="map"></div>
</app-layout>
</template>

<script>
import "leaflet/dist/leaflet.css";
import "esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css";
import L from "leaflet";
import * as esri from "esri-leaflet-geocoder";
import AppLayout from "../Layouts/AppLayout.vue";


export default {
    components : {
        AppLayout,
    },

  props:['address'],
    data() {
    return {
      addressList: this.address,

    };
  },
  mounted() {
    this.init();
  },

  methods: {
    init() {

            const map = L.map("map", { center: [51.505, -13.02626], zoom: 13 });


                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                map.locate({ setView: true, maxZoom: 16 });

                const searchControl = new esri.Geosearch().addTo(map);
                const results = L.layerGroup().addTo(map);
                searchControl.on('results', function (data) {
                    results.clearLayers();
                    for (let i = data.results.length - 1; i >= 0; i--) {
                    results.addLayer(L.marker(data.results[i].latlng));

                    }
                });

                const geocoder = new esri.geocodeService();
                const result = L.layerGroup().addTo(map);
                let tab = this.addressList;
                console.log(tab);

                for(let i = 0; i < tab.length-1; i++){
                    geocoder.geocode().text(tab[i].location).run(function (error, response) {
                        if (error) {
                        return;
                    }
                    //console.log(response.results[0].bounds);
                    result.addLayer(L.marker(response.results[0].latlng));
                    console.log(response.results[0].latlng);
                    });
                }



    },
  },
};
</script>

