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
    <br />
    <div class="mb-4">
      <form @submit.prevent="submit">
        <input
          class="h-8 px-4 text-white duration-300 rounded-lg focus:shadow-outline bg-red-300 hover:bg-red-400 transition"
          type="submit"
          value="Search"
        />
        &emsp;
        <input
          type="number"
          aria-label="postalCode"
          id="postalCode"
          v-model="form.Code_Postal"
          placeholder="Code postal : 75001"

        />
        <div v-if="$page.errors.Code_Postal">
          <span class="text-red-500"
            >&emsp;&emsp;&emsp;&emsp;&emsp;{{
              $page.errors.Code_Postal[0]
            }}</span
          >
        </div>
      </form>
    </div>
    <br /><br />
    <div id="map"></div>
    <br /><br />
    <br /><br />
  </app-layout>
</template>

<script>
import "leaflet/dist/leaflet.css";
import "esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css";
import L from "leaflet";
import * as esri from "esri-leaflet-geocoder";
import AppLayout from "../Layouts/AppLayout.vue";

export default {
  components: {
    AppLayout,
  },

  props: ["address"],
  data() {
    return {
      addressList: this.address,
      form: {
        Code_Postal: null,
      },
    };
  },
  mounted() {
    this.init();
  },

  methods: {
    init() {
      const map = L.map("map", { center: [51.505, -13.02626], zoom: 13 });

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);

      map.locate({ setView: true, maxZoom: 16 });

      const searchControl = new esri.Geosearch().addTo(map);
      const results = L.layerGroup().addTo(map);
      searchControl.on("results", function (data) {
        results.clearLayers();
        for (let i = data.results.length - 1; i >= 0; i--) {
          results.addLayer(L.marker(data.results[i].latlng));
        }
      });

      const geocoder = new esri.geocodeService();
      let tabAdress = this.addressList;
      console.log(tabAdress);
      for (let i = 0; i < tabAdress.length; i++) {
        geocoder
          .geocode()
          .text(tabAdress[i].location)
          .run(function (error, response) {
            if (error) {
              return;
            }

            const marker = L.marker(response.results[0].latlng).addTo(map);
            const event =
              "<h1>Activité: " +
              tabAdress[i].title +
              "<h1><br/><h1>Adresse: " +
              tabAdress[i].location +
              "<h1><br/><h1>Date: " +
              tabAdress[i].date +
              "<h1>";
            marker.bindPopup(event);
            marker.addTo(map);

            map.fitBounds(response.results[0].bounds);
            console.log(response.results[0]);
          });
      }
    },

    submit() {
      this.$inertia.visit("/map/event", {
        method: "get",
        data: this.form,
      });
    },
  },
};
</script>

