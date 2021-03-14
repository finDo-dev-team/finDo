<template>
  <div
    class="rounded overflow-hidden mb-2 shadow bg-white relative hover:shadow-2xl duration-500 ease-in-out"
  >
    <div class="px-6 py-4 mb-16">
      <p class="text-gray-600 text-xs">
        {{ event.date_start }}
      </p>
      <div class="inline-flex">
        <div class="px-0.5 relative" v-for="type in event.types" v-bind:key="type.id">
          <span
            class="flex-1 select-none bg-red-200 rounded-full text-sm text-white px-1 py-0.5 hover:bg-red-300 duration-200 ease-in-out"
          >
            {{ type.label }}
          </span>
        </div>
        <span class=" inline-block ">
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <a :href="'/download/' + event.id" class="rounded-full bg-red-400 text-white px-1 py-0.5 focus:bg-red-800 duration-200 ease-in-out">Ajouter au calendrier</a>
        </span>
        <span>

        </span>
      </div>
      <div class="font-bold text-xl mb-2">{{ event.title }}</div>
      <p class="text-gray-700 text-base">
        {{ event.lead_text }}
      </p>
    </div>
    <div class="px-6 pb-2 absolute bottom-0">
      <span
        class="inline-block bg-gray-100 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2 mb-2"
        >{{ event.address_name }}, {{event.address_street}}, {{event.address_city}}, {{event.address_zipcode}}</span>
      <a class="rounded-full px-2 hover:bg-gray-100 duration-200 ease-in-out" :href="'/DetailledEvent/' + event.id"> Plus d'info... </a>
    </div>
  </div>
</template>

<script>

export default {
  name: "EventListItem",
  props: ["event"],
};
</script>

