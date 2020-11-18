<template>

  
  <div>
    <slot name="search">
    
    <input type="text"  class="form-control" v-model="q" placeholder="Rechercher un évenement">
    <a :href="'/search/' + q"> Rechercher </a>

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
     q: '',

    };
  },
      
}

</script>