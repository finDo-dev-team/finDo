<template>
  <app-layout>
    <template #header>Carte</template>
    <map-component></map-component>
  </app-layout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import MapComponent from "./Components/MapComponent";
export default {
  components: {
    AppLayout,
    MapComponent,
  },
};
</script>


