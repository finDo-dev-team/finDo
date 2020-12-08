<template>
  <div>
    <div class="text-right">
      <button
        class="flex-1 select-none bg-gray-100 rounded-md text-black text-2xl leading-tight px-1 py-0.5 hover:bg-gray-200 duration-200 ease-in-out"
        v-on:click="orderDateAsc"
      >
        ↑
      </button>
      <button
        class="flex-1 select-none bg-gray-100 rounded-md text-black text-2xl leading-tight px-1 py-0.5 hover:bg-gray-200 duration-200 ease-in-out"
        v-on:click="orderDateDesc"
      >
        ↓
      </button>
    </div>
    <div class="grid grid-cols-12 gap-2">
      <!-- Colonne filtrage -->
      <div class="col-span-2">
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
      typesToFilter: this.typesEvents.map((type) => type.id),
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
  },
};
</script>