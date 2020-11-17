<template>
  <div>
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
            class="inline-block bg-gray-100 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2 mb-2"
            >{{ event.location }}</span
          >
   
       <input type="text"  class="form-control"  @keyup="searchEvents" v-model="q" placeholder="Rechercher un évenement"  >
       

       <search-component> 
        <template slot="search"> </template>
       </search-component>

        </div>
      </div>
    </div>
  </div>
</template>



<script>
//import { component } from 'vue/types/umd';
import SearchComponent from './Components/SearchComponent';

export default {

  

  props: ["events"],

  data() {
    return {
      eventList: this.events,
      q: '',
    };
  },

  methods : {
 
 
  searchEvents(){
  
    if(this.q.length > 0)
    {
      axios.get("/search/" + this.q)
      .then( response => this.eventList = response.data)
      .catch(error => console.log(error));
    }
    else
    {
      this.eventList= this.events;
     
    }

  }
    
  },


  computed: {
     /* getFilteredEvents (){

        return this.eventList.filter( event =>{
          return event.title.toLowerCase().includes(this.q.toLowerCase());
        }

        )
      }
*/
  }, 

  mounted() {
    console.log(this.eventList);
  },

  components:{

    SearchComponent

  },
}

  
</script>
