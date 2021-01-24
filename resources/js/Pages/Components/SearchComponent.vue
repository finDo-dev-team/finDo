<template>

  <div>
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
    <div>
        <slot name="distance">

        <div class="bg-white shadow p-4 flex">
        <span class="w-auto flex justify-end items-center text-gray-500 p-2">
            <i class="material-icons text-3xl">distance</i>
        </span>
        <select v-model = "distance">
            <option value="10">10 km</option>
            <option value="15">15 km</option>
            <option value="20">20 km</option>
            <option value="25">25 km</option>
        </select>
            <a :href="'/search3/' + this.distance" class="bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4" >
                        <p class="font-semibold text-s">Rechercher</p>
                </a>
            </div>
        </slot>
    </div>
 <span> {{this.distance}}</span>
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
     distance: '',

    };
  },

}

</script>
