<template>
  <app-layout>
    <template #header>
      <h1 class="font-semibold text-xl text-gray-800 leading-tight">FinDo</h1>
    </template>
    <h2 class="text-2xl">Evénements à venir</h2>
     <input type="text"  class="form-control"  @keyup="searchEvents" v-model="q" placeholder="Rechercher un évenement"  >
       <search-component> 
        <template slot="search"> </template>
       </search-component>
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
            class="inline-block bg-gray-100 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2 mb-2"
            >{{ event.location }}</span
          >
   
      

        </div>
      </div>
    </div>
  </app-layout>
</template>



<script>
import AppLayout from "../Layouts/AppLayout.vue";
import SearchComponent from './Components/SearchComponent';

export default {
  components: {
    AppLayout,
    SearchComponent,
  },

  props: ["events"],

  data() {
    return {
      eventList: this.events,
      q: '',
    };
  },

  methods : {
 
 searchEvents(){
  
    if(this.q.length > 1)
    {
      axios.get("/search/" + this.q)
      .then( response => this.eventList = response.data)
      .catch(error => console.log(error));
    }
    else
    {
      this.eventList= this.events;
     
    }
  
  },

     
  }, 

  mounted() {
    console.log(this.eventList);
  },

}

  
</script>
