<template>
  <app-layout>
    <template #header> Mon espace </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <welcome />
          <div class="p-4 text-xl">
            Vos événements enregistrés:
          </div>
          <ul>
            <li v-for="event in eventList" v-bind:key="event.id">
              <ul>
                <li><b>{{ event.title }}</b></li>
                <li>{{ event.date_start }}</li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";

export default {
  components: {
    AppLayout,
    Welcome,
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
