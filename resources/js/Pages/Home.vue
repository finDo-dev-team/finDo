<template>
  <app-layout>
    <template #header>Accueil</template>
    <h2 class="text-2xl">Evénements à venir</h2>

    <div
      v-for="event in this.eventList"
      v-bind:key="event.id"
      class="max-w-sm rounded overflow-hidden shadow-lg bg-white mb-2"
    >
      <div class="px-6 py-4">
        <p class="text-gray-600 text-xs">
          {{ event.date }}
        </p>
        <div class="font-bold text-xl mb-2">{{ event.title }}</div>
        <p class="text-gray-700 text-base">
          {{ event.description }}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <span
          class="inline-block bg-gray-100 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2 mb-2"
          >{{ event.location }}</span
        >
      </div>
    </div>
  </app-layout>
</template>



<script>
import AppLayout from "../Layouts/AppLayout.vue";

export default {
  components: {
    AppLayout,
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
