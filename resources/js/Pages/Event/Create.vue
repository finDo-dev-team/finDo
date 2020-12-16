<template>
  <app-layout>
    <template #header>Créer un évènement</template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
          <form
            @submit.prevent="submit"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 ms-4"
          >
            <div class="mb-4">
              <label
                for="Titre"
                class="block text-gray-700 text-smfont-bold mb-2"
              >
                Titre
              </label>
              <input
                class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10"
                type="text"
                aria-label="Titre"
                placeholder="Titre de l'évènement"
                id="title"
                v-model="form.title"
              />
              <div v-if="$page.errors.title">
                <span class="text-red-500">{{ $page.errors.title[0] }}</span>
              </div>
            </div>
            <div class="mb-4">
              <label
                class="block text-gray-700 text-smfont-bold mb-2"
                for="adresse"
              >
                Localisation
              </label>
              <input
                class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10"
                type="text"
                aria-label="Adresse"
                placeholder="numéro, nom de rue et code postal"
                id="location"
                v-model="form.location"
              />
              <div v-if="$page.errors.location">
                <span class="text-red-500">{{ $page.errors.location[0] }}</span>
              </div>
            </div>
            <div class="mb-4">
              <label
                class="block text-gray-700 text-smfont-bold mb-2"
                for="Evevement"
              >
                Date
              </label>
              <input
                class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10"
                type="date"
                aria-label="Date de l'évènement"
                id="date"
                v-model="form.date"
              />
              <div v-if="$page.errors.date">
                <span class="text-red-500">{{ $page.errors.date[0] }}</span>
              </div>
            </div>
            <div class="mb-4">
              <label
                for="Description"
                class="block text-gray-700 text-smfont-bold mb-2"
              >
                Description
              </label>
              <textarea
                class="form-textarea mt-1 block w-full"
                rows="5"
                id="description"
                v-model="form.description"
              ></textarea>
              <div v-if="$page.errors.description">
                <span class="text-red-500">{{
                  $page.errors.description[0]
                }}</span>
              </div>
            </div>
            <div class="mb-4">
              <label class="block text-gray-700 text-smfont-bold mb-2"
                >Type.s d'évènement</label
              >
              <multiselect
                v-model="form.value"
                :options="form.options"
                :multiple="true"
                :close-on-select="false"
                :clear-on-select="false"
                :preserve-search="true"
                :block-keys="['Enter']"
                :select-label="''"
                :deselectLabel="''"
                :selected-label="'sélectionné'"
                placeholder="Selectionner le/les type.s d'événement"
                :show-labels="true"
                :preselect-first="false"
                label="label"
                track-by="label"
              >
                <template slot="selection" slot-scope="{ values, search }"
                  ><span
                    class="multiselect__single"
                    v-if="values.length &amp;&amp; !isOpen"
                    >{{ values.length }} type(s)</span
                  ></template
                >
              </multiselect>
              <div v-if="$page.errors.value">
                <span class="text-red-500">{{ $page.errors.value[0] }}</span>
              </div>
            </div>
            <br />

            <div class="mb-4">
              <button
                class="h-8 px-4 text-white duration-300 rounded-lg focus:shadow-outline bg-red-300 hover:bg-red-400 transition"
                type="submit"
              >
                Envoyer
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import Multiselect from "vue-multiselect";

export default {
  components: {
    AppLayout,
    Multiselect,
  },

  props: ["eventTypes"],

  data() {
    return {
      form: {
        title: null,
        location: null,
        date: null,
        description: null,
        value: [],
        options: this.eventTypes.map((type) => {
          let rObj = {};
          rObj["id"] = type.id;
          rObj["label"] = type.label;
          return rObj;
        }),
      },
    };
  },

  methods: {
    submit() {
      this.$inertia.post("/event/store", this.form);
    },
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<!-- Override la couleur verte de Vue-multiselect -->
<style>
.multiselect__option--highlight {
  background: #fbc5c5;
}
.multiselect__option--highlight::after {
  background: #fbc5c5;
}
</style>
