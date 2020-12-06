<template>
  <app-layout>
    <template #header>Carte</template>
    <div class="mt-10">
        <ul>
            <li class="mb-6">
                <inertia-link href="/map/event">
                    <span>
                        <button class="h-8 px-4 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg cursor-pointer focus:shadow-outline hover:bg-indigo-800" type="submit">Voir les évènements sur la carte</button>
                    </span>
                </inertia-link>
            </li>
        </ul>
    </div>
    <br/><br/>
    <map-component></map-component>
  </app-layout>
</template>

<script>
import AppLayout from "../Layouts/AppLayout.vue";
import MapComponent from "./Components/MapComponent";
export default {
  components: {
    AppLayout,
    MapComponent,
  },
};
</script>


