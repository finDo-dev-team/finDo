<template>
  <app-layout>
    <template #header>Evenements</template>
    <div
      class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-3 lg:px-1/12"
    >
      <div v-for="event in this.eventList" v-bind:key="event.id">
        <div
          class="rounded overflow-hidden shadow h-full bg-white relative hover:shadow-2xl duration-500 ease-in-out"
        >
          <div class="px-6 py-4 mb-16">
            <p class="text-gray-600 text-xs">
              {{ event.date }}
            </p>
            <div class="inline-flex">
              <div
                class="px-0.5"
                v-for="type in event.types"
                v-bind:key="type.id"
              >
                <span
                  class="flex-1 select-none bg-red-200 rounded-full text-sm text-white px-1 py-0.5 hover:bg-red-300 duration-200 ease-in-out"
                >
                  {{ type.label }}
                </span>
              </div>
            </div>
            <div class="font-bold text-xl mb-2">{{ event.title }}</div>
            <p class="text-gray-700 text-base">
              {{ event.description }}
            </p>
          </div>
          <div class="px-6 pb-2 absolute bottom-0">
            <span
              class="inline-block bg-gray-100 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2 mb-2"
              >{{ event.location }}</span
            >
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
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