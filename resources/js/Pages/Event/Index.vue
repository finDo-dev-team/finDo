<template>
  <app-layout>
    <template #header>Evenements</template>
    <EventList :events="this.eventList"></EventList>
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

  props: ["events"],

  data() {
    return {
      eventList: this.events,
    };
  },

  mounted() {
    console.log(this.eventList);
  },
};
</script>