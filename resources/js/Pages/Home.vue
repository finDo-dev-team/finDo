<template>
  <div class="flex flex-row h-full w-full">
    <!-- Sidebar -->
    <nav class="bg-gray-200 w-20 justify-between flex flex-col"></nav>
    <div class="px-16 py-4 text-gray-700 bg-gray-100 h-screen w-screen">
      <!-- Content -->
      <h1 class="text-4xl text-red-300">FinDo</h1>
      <h2 class="text-2xl">Evénements à venir</h2>
      <div v-for="event in this.eventList" v-bind:key="event.id">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
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
              class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2 mb-2"
              >{{ event.location }}</span
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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