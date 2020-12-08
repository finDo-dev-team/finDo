<template>
  <app-layout>
    <template #header>Evenements</template>
    <EventList :events="this.eventList" :typesEvents="this.typeEventList"></EventList>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import EventList from "../Components/EventListComponent";

export default {
  components: {
    AppLayout,
    EventList,
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
    console.log(this.typeEventList);
  },
};
</script>