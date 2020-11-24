<template>
  <div class="grid grid-cols-1 gap-2 md:grid-cols-2 lg:grid-cols-3 lg:px-1/12">
    <EventListItem
      v-for="event in this.events"
      v-bind:key="event.id"
      :event="event"
    ></EventListItem>
  </div>
</template>

<script>
import EventListItem from "./EventListItemComponent";

export default {
  components: {
    EventListItem,
  },

  name: "EventList",
  props: ["events"],
};
</script>