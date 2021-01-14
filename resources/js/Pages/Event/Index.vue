<template>
  <app-layout>
    <template #header>Evenements</template>
    <EventMapList :events="this.eventList" :typesEvents="this.typeEventList"></EventMapList>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import EventMapList from "../Components/EventMapListComponent";

export default {
  components: {
    AppLayout,
    EventMapList,
  },

  props: [
    "events",
    "typesEvents"
    ],

  data() {
    return {
      eventList: this.events,
      typeEventList: this.typesEvents,
    };
  },

  mounted() {
    // display data
  },
};
</script>