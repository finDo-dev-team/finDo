<template>
  <div>
      <slot name ="search">
      <input type="text"  class="form-control"  @keyup="searchEvent" v-model="q" placeholder="Rechercher un évenement"  >
      
      </slot>
  </div>
</template>

<script>


export default {

   mounted() {
       console.log('Component mounted.')
   },

   data() {
    return {
      q : '',
      eventList: this.events,
    };
  },
   
   methods: {

       searchEvent(){
           if (this.q.length >0) {
           axios.get('/' + this.q)
           .then(response => this.$parent.eventList = response.data)
           .catch(error => console.log(error));
           
           }
       },
   }


}
</script>