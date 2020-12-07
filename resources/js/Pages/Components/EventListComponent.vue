<template>
  <div>
    <div class="text-center mb-3">
      <button
        class="flex-1 select-none bg-gray-100 rounded-md text-black px-1 py-0.5 hover:bg-gray-200 duration-200 ease-in-out"
        v-on:click="orderDateAsc"
      >
        Trier par ordre croissant
      </button>
      <button
        class="flex-1 select-none bg-gray-100 rounded-md text-black px-1 py-0.5 hover:bg-gray-200 duration-200 ease-in-out"
        v-on:click="orderDateDesc"
      >
        Trier par ordre décroissant
      </button>
    </div>
    <div class="grid grid-cols-12 gap-2">
      <!-- Colonne filtrage -->
      <div class="col-span-2">
        <div v-for="type in this.typesEvents" v-bind:key="type.id">
          {{ type.label }}
        </div>
      </div>
      <div
        class="col-span-10 grid grid-cols-1 gap-2 lg:grid-cols-2 2xl:grid-cols-3"
      >
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

export default {
  name: "EventList",

  props: ["events", "typesEvents"],

  data: function () {
    return {
      eventList: this.events,
      typesToFilter: [],
    };
  },

  components: {
    EventListItem,
  },

  methods: {
    orderDateAsc: function () {
      this.eventList.sort(function (a, b) {
        return a.date > b.date;
      });
    },
    orderDateDesc: function () {
      this.eventList.sort(function (a, b) {
        return a.date < b.date;
      });
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
      console.log(this.eventList);
    },
  },
};
</script>