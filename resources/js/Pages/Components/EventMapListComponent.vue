<template>
  <div>
    <!-- Ligne Map + List -->
    <div class="grid grid-cols-1 gap-0 md:grid-cols-12 h-screen2/3">
      <!-- Colonne carte -->
      <div class="md:col-span-7 lg:col-span-8">
        <div class="h-screen2/3 md:h-full w-full">
          <l-map
            v-if="showMap"
            :zoom="zoom"
            :minZoom="minZoom"
            :maxZoom="maxZoom"
            :center="center"
            :options="mapOptions"
            :inertia="true"
          >
            <l-tile-layer
              :options="layerOptions"
              :tile-layer-class="tileLayerClass"
            />
            <l-control-attribution
              position="bottomleft"
              :prefix="attribution"
            ></l-control-attribution>
            <l-marker
              v-for="event in this.eventList"
              v-bind:key="event.id"
              :lat-lng="event.latLng"
            >
              <l-tooltip class="font-semibold font-sans text-base">
                {{ event.title }}
              </l-tooltip>
              <l-popup>
                <p>
                  {{ event.description }}
                </p>
              </l-popup>
            </l-marker>
            <l-marker :lat-lng="withPopup">
              <l-popup>
                <p v-show="showParagraph">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Quisque sed pretium nisl, ut sagittis sapien. Sed vel
                  sollicitudin nisi. Donec finibus semper metus id malesuada.
                </p>
              </l-popup>
            </l-marker>
            <l-marker :lat-lng="withTooltip">
              <l-tooltip :options="{ permanent: true, interactive: true }">
                I am a tooltip
                <p v-show="showParagraph">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Quisque sed pretium nisl, ut sagittis sapien. Sed vel
                  sollicitudin nisi. Donec finibus semper metus id malesuada.
                </p>
              </l-tooltip>
            </l-marker>
          </l-map>
        </div>
      </div>
      <div
        class="md:overflow-y-auto max-h-screen md:col-span-5 lg:col-span-4 no-scrollbar"
      >
        <!-- Colonne liste -->
        <EventListItem
          v-for="event in this.eventList"
          v-bind:key="event.id"
          :event="event"
        ></EventListItem>
      </div>
    </div>
    <!-- Ligne Filtrage -->
    <div class="grid grid-cols-1 gap-0 md:grid-cols-12">
      <!-- Colonne Types -->
      <div class="col-span-1 bg-white rounded-lg shadow px-2 py-1 mt-2">
        <h2 class="text-2xl leading-tight">Types</h2>
        <div v-for="type in this.typesEvents" v-bind:key="type.id">
          <label class="inline-flex items-center mt-3">
            <input
              type="checkbox"
              class="form-checkbox h-5 w-5 text-red-300"
              checked
              v-on:change="changeTypeToFilter(type.id)"
            /><span class="ml-2">{{ type.label }}</span>
          </label>
        </div>
      </div>
      <!-- Colonne date -->
      <div class="col-span-2 ml-2 bg-white rounded-lg shadow px-2 py-1 mt-2">
        <h2 class="text-2xl leading-tight">Dates</h2>
        <label class="inline-flex items-center mt-3">
          <input
            id="todayDate"
            type="date"
            v-model="startDate"
            v-on:change="filterEvent()"
          />
          <span class="ml-2">Début</span>
        </label>
        <label class="inline-flex items-center mt-3">
          <input
            id="twoWeeksDate"
            type="date"
            v-model="endDate"
            v-on:change="filterEvent()"
          />
          <span class="ml-2">Fin</span>
        </label>
      </div>
      <!-- Colonne Recherche par ville
      <div class="col-span-3 ml-10">
        <h2 class="text-2xl leading-tight">Recherche:</h2>
        <input
          class="w-full rounded p-2"
          type="text"
          v-model="q"
          placeholder="Rechercher une vile"
        />
      </div>
       -->
    </div>
  </div>
</template>

<script>
import EventListItem from "./EventListItemComponent";
import { latLng } from "leaflet";
import {
  LMap,
  LTileLayer,
  LMarker,
  LPopup,
  LTooltip,
  LControlAttribution,
} from "vue2-leaflet";
import mapboxgl from "mapbox-gl";
import "mapbox-gl-leaflet";
import "mapbox-gl/dist/mapbox-gl.css";
import "leaflet/dist/leaflet.css";

export default {
  name: "EventMapList",

  props: ["events", "typesEvents"],

  data: function () {
    return {
      eventList: this.events,
      typesToFilter: this.typesEvents.map((type) => type.id),
      // Map
      zoom: 12.5,
      maxZoom: 18,
      minZoom: 13,
      attribution:
        'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      center: latLng(48.859043, 2.342759),
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      withPopup: latLng(47.41322, -1.219482),
      withTooltip: latLng(47.41422, -1.250482),
      currentZoom: 11.5,
      currentCenter: latLng(47.41322, -1.219482),
      showParagraph: false,
      mapOptions: {
        zoomDelta: 0.25,
        zoomSnap: 0,
      },
      showMap: true,
      tileLayerClass: (url, options) => L.mapboxGL(options),
      layerOptions: {
        accessToken:
          "pk.eyJ1IjoiamVzdGluLWciLCJhIjoiY2tqc3Z3bGM4NDRpcjJybzc1NXV1OGl6aiJ9.mlV-NsR4tljhmc20tbqstQ",
        style: "mapbox://styles/jestin-g/ckjswlvw30zyf19pgao32tb4h",
      },
      startDate: new Date().toISOString().substr(0, 10),
      endDate: new Date(Date.now() + 12096e5).toISOString().substr(0, 10),
    };
  },

  components: {
    EventListItem,
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LTooltip,
    LControlAttribution,
  },

  methods: {
    changeTypeToFilter: function (typeId) {
      if (this.typesToFilter.includes(typeId)) {
        this.removeTypeToFilter(typeId);
      } else {
        this.addTypeToFilter(typeId);
      }
      this.filterEvent();
    },

    addTypeToFilter: function (typeId) {
      this.typesToFilter.push(typeId);
    },

    removeTypeToFilter: function (typeId) {
      let index = this.typesToFilter.indexOf(typeId);
      if (index > -1) {
        this.typesToFilter.splice(index, 1);
      }
    },

    filterEvent: function () {
      this.eventList = [];
      this.events.forEach((event) => {
        if (this.passFilter(event)) {
          this.eventList.push(event);
        }
      });
    },

    passFilter: function (event) {
      return this.passFilterType(event) && this.passFilterDate(event);
    },

    passFilterType: function (event) {
      if (event.types.length == 0) return true;
      return event.types.some((type) =>
        this.typesToFilter.some((typeToFilter) => typeToFilter === type.id)
      );
    },

    passFilterDate: function (event) {
      let eventDateSeconds = Date.parse(event.date);
      let startDateSeconds = Date.parse(this.startDate);
      let endDateSeconds = Date.parse(this.endDate);
      if (eventDateSeconds < startDateSeconds) return false;
      if (eventDateSeconds > endDateSeconds) return false;
      return true;
    },
  },
};
</script>

<style>
/* Chrome, Safari and Opera */
.no-scrollbar::-webkit-scrollbar {
  display: none;
}

.no-scrollbar {
  -ms-overflow-style: none; /* IE and Edge */
  scrollbar-width: none; /* Firefox */
}
</style>