<template>
  <div>
    <button v-on:click="orderDateAsc">Trier par ordre croissant</button>
    <button v-on:click="orderDateDesc">Trier par ordre décroissant</button>

    <div
      class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-3 lg:px-1/12"
    >
      <EventListItem
        v-for="event in this.events"
        v-bind:key="event.id"
        :event="event"
      ></EventListItem>
    </div>
  </div>
</template>

<script>
import EventListItem from "./EventListItemComponent";

export default {
  name: "EventList",
  props: ["events"],

  components: {
    EventListItem,
  },

  methods: {
    orderDateAsc: function () {
      this.events.sort(function (a, b) {
        return a.date > b.date;
      });
    },
    orderDateDesc: function () {
      this.events.sort(function (a, b) {
        return a.date < b.date;
      });
    },
  },
};
</script>