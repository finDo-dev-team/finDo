<template>

  
  <div class="grid grid-cols-1 gap-2 lg:grid-cols-2 2xl:grid-cols-3 ml-40">
    <slot name="search">
    
    <input type="text"  class="form-control" v-model="q" placeholder="Rechercher un évenement">
    <a :href="'/search/' + q" class=" grid grid-cols-2 gap-2 lg:grid-cols-2 2xl:grid-cols-3 ml-5"> Rechercher </a>

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