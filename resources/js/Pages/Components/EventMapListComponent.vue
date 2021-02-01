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
            @ready="onReady"
            @locationfound="onLocationFound"
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
              :lat-lng="[userLocation.lat,userLocation.lng]"
              :icon="icone1"
            >
              <l-tooltip class="font-semibold font-sans text-base">
                Vous êtes ici !
              </l-tooltip>
            </l-marker>
           <L-circle
            :lat-lng="[userLocation.lat,userLocation.lng]"
            :stroke="true"
            />
            <l-marker
              v-for="event in this.eventList"
              v-bind:key="event.id"
              :lat-lng="event.latLng"
              :icon="icone2"

            >
              <l-tooltip class="font-semibold font-sans text-base">
                {{ event.title }}
              </l-tooltip>
              <l-popup>
                <p>
                  {{ event.lead_text }}
                </p>
              </l-popup>
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

 <!-- colonne distance-->
      <div class="col-span-2 ml-2 bg-white rounded-lg shadow px-2 py-1 mt-2">
        <h2 class="text-2xl leading-tight">Distance</h2>
        <label class="inline-flex items-center mt-3">
          <span class="ml-2">Moins de </span>
          <select  v-model="distance" v-on:change="filterEvent()">
          <option v-for="option in distanceValue" v-bind:key="option.text" v-bind:value="option.value">
              {{option.text}}
          </option>
          </select>
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
import { latLng, icon } from "leaflet";
import {LAwesomeMarkersIcon} from "leaflet.awesome-markers";
import {
  LMap,
  LTileLayer,
  LMarker,
  LPopup,
  LTooltip,
  LControlAttribution,
  LCircle
} from "vue2-leaflet";
import mapboxgl from "mapbox-gl";
import "mapbox-gl-leaflet";
import "mapbox-gl/dist/mapbox-gl.css";
import "leaflet/dist/leaflet.css";
import "leaflet.awesome-markers/dist/leaflet.awesome-markers.css";
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
      minZoom: 8,
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
      distance:'50',
      distanceValue: [
          {text: '2 km', value: 2},
          {text: '5 km', value: 5},
          {text: '10 km', value: 10},
          {text: '20 km', value: 20},
          {text: '30 km', value: 30},
          {text: '50 km', value: 50},
      ],
      userLocation: {
          lat: '',
          lng: ''
      },
      icone1: L.AwesomeMarkers.icon( {
            markerColor : 'red'
      }),
      icone2: L.AwesomeMarkers.icon( {
            markerColor : 'darkblue'
      }),

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
    LCircle,
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
      return this.passFilterType(event) && this.passFilterDate(event) && this.passFilterDistance(event);
    },

    passFilterType: function (event) {
      if (event.types.length == 0) return true;
      return event.types.some((type) =>
        this.typesToFilter.some((typeToFilter) => typeToFilter === type.id)
      );
    },

    passFilterDate: function (event) {
      let eventDateSeconds = Date.parse(event.date_start);
      let startDateSeconds = Date.parse(this.startDate);
      let endDateSeconds = Date.parse(this.endDate);
      if (eventDateSeconds < startDateSeconds) return false;
      if (eventDateSeconds > endDateSeconds) return false;
      return true;
    },

    //Calcul la distance entre 2 coordonnées géographique
    calculDistance: function(latitude1,longitude1,latitude2,longitude2){


       const RADIAN = 57.29577951;
       const a = Math.acos((Math.sin(latitude1/RADIAN)*Math.sin(latitude2/RADIAN)+Math.cos(latitude1/RADIAN)*Math.cos(latitude2/RADIAN)*Math.cos((longitude2/RADIAN)-(longitude1/RADIAN))));
       return 6373*a; //  6373 est le rayon entre le centre de la terre et l'équateur

    },
    //Filtre les événements en fonction de leur distance par rapport à l'utilisateur
    passFilterDistance: function(event){

        if( (this.calculDistance(this.userLocation.lat,this.userLocation.lng,event.latitude,event.longitude)).toFixed(2) <= this.distance) return true;

        return false;

    },

    onReady (mapObject) {
        mapObject.locate();
    },
    onLocationFound(location){
        this.userLocation = {
            lat: location.latitude,
            lng: location.longitude
        };
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
