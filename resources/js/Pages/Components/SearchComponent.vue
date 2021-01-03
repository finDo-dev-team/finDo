<template>

  
  <div>
    <slot name="search">
    
    <div class="bg-white shadow p-4 flex">
      <span class="w-auto flex justify-end items-center text-gray-500 p-2">
        <i class="material-icons text-3xl">search</i>
      </span>
      <input class="w-full rounded p-2" type="text" v-model="q" placeholder="Rechercher un évenement">
           <a :href="'/search/' + q" class="bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4" > 
                    <p class="font-semibold text-s">Rechercher</p>
            </a>
        </div>
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