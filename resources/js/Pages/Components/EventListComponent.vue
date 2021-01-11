<template>
  <div>
    <div class="grid grid-cols-1 lg:grid-cols-12">
      <!-- Colonne carte -->
      <div class="col-span-8">
        <div style="height: 700px; width: 100%">
          <div style="height: 200px overflow: auto;">
            <p>
              First marker is placed at {{ withPopup.lat }}, {{ withPopup.lng }}
            </p>
            <p>
              Center is at {{ currentCenter }} and the zoom is:
              {{ currentZoom }}
            </p>
            <button @click="showLongText">Toggle long popup</button>
            <button @click="showMap = !showMap">Toggle map</button>
          </div>
          <div class="h-1/2 md:h-full">
            <l-map
              v-if="showMap"
              :zoom="zoom"
              :center="center"
              :options="mapOptions"
              @update:center="centerUpdate"
              @update:zoom="zoomUpdate"
            >
              <l-tile-layer :url="url" :attribution="attribution" />
              <l-marker :lat-lng="withPopup">
                <l-popup>
                  <div @click="innerClick">
                    I am a popup
                    <p v-show="showParagraph">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Quisque sed pretium nisl, ut sagittis sapien. Sed vel
                      sollicitudin nisi. Donec finibus semper metus id
                      malesuada.
                    </p>
                  </div>
                </l-popup>
              </l-marker>
              <l-marker :lat-lng="withTooltip">
                <l-tooltip :options="{ permanent: true, interactive: true }">
                  <div @click="innerClick">
                    I am a tooltip
                    <p v-show="showParagraph">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Quisque sed pretium nisl, ut sagittis sapien. Sed vel
                      sollicitudin nisi. Donec finibus semper metus id
                      malesuada.
                    </p>
                  </div>
                </l-tooltip>
              </l-marker>
            </l-map>
          </div>
        </div>
      </div>
      <!-- Colonne filtrage -->
      <div class="col-span-1">
        <h2 class="text-2xl leading-tight">Types:</h2>
        <div v-for="type in this.typesEvents" v-bind:key="type.id">
          <input
            type="checkbox"
            class="appearance-none checked:bg-blue-600 checked:border-transparent"
          />
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
      <div class="col-span-3 grid grid-cols-1 gap-2 2xl:grid-cols-2">
        <EventListItem
          v-for="event in this.eventList"
          v-bind:key="event.id"
          :event="event"
        ></EventListItem>
      </div>
    </div>
  </div>
</template>

<script>
import EventListItem from "./EventListItemComponent";
import { latLng } from "leaflet";
import { LMap, LTileLayer, LMarker, LPopup, LTooltip } from "vue2-leaflet";
import "leaflet/dist/leaflet.css";

export default {
  name: "EventList",

  props: ["events", "typesEvents"],

  data: function () {
    return {
      eventList: this.events,
      typesToFilter: this.typesEvents.map((type) => type.id),
      // Map
      zoom: 12.5,
      center: latLng(48.859043, 2.342759),
      url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
      withPopup: latLng(47.41322, -1.219482),
      withTooltip: latLng(47.41422, -1.250482),
      currentZoom: 11.5,
      currentCenter: latLng(47.41322, -1.219482),
      showParagraph: false,
      mapOptions: {
        zoomSnap: 0.5,
      },
      showMap: true,
    };
  },

  components: {
    EventListItem,
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LTooltip,
  },

  methods: {
    addTypeToFilter: function (typeId) {
      this.typesToFilter.push(typeId);
    },

    removeTypeToFilter: function (typeId) {
      let index = this.typesToFilter.indexOf(typeId);
      if (index > -1) {
        this.typesToFilter.splice(index, 1);
      }
    },

    changeTypeToFilter: function (typeId) {
      if (this.typesToFilter.includes(typeId)) {
        this.removeTypeToFilter(typeId);
      } else {
        this.addTypeToFilter(typeId);
      }
      this.filterWithTypesToFilter();
    },

    passFilter: function (event) {
      return event.types.some((type) =>
        this.typesToFilter.some((typeToFilter) => typeToFilter === type.id)
      );
    },

    filterWithTypesToFilter: function () {
      this.eventList = [];
      this.events.forEach((event) => {
        if (this.passFilter(event)) {
          this.eventList.push(event);
        }
      });
    },

    zoomUpdate(zoom) {
      this.currentZoom = zoom;
    },

    centerUpdate(center) {
      this.currentCenter = center;
    },

    showLongText() {
      this.showParagraph = !this.showParagraph;
    },

    innerClick() {
      alert("Click!");
    },
  },
};
</script>