<template>
    <app-layout>
        <template #header>Créer un évènement</template>
    <div class= "py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 ms-4">
                   <div class="mb-4">
                        <label for="Titre" class="block text-gray-700 text-smfont-bold mb-2">
                            Titre
                        </label>
                         <input class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" type="text" aria-label="Titre" placeholder="Titre de l'évènement" id="title" v-model="form.title" />
                        <div v-if="$page.errors.title"><span class="text-red-500">{{ $page.errors.title[0] }}</span></div>
                   </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-smfont-bold mb-2" for="adresse">
                            Localisation
                        </label>
                         <input class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" type="text" aria-label="Adresse" placeholder="numéro, nom de rue et code postal" id="location" v-model="form.location" />
                        <div v-if="$page.errors.location"><span class="text-red-500">{{ $page.errors.location[0] }}</span></div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-smfont-bold mb-2" for="Evevement" >
                            Date
                        </label>
                         <input class="focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none w-full text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md py-2 pl-10" type="date" aria-label="Date de l'évènement" id="date" v-model="form.date" />
                        <div v-if="$page.errors.date"><span class="text-red-500">{{ $page.errors.date[0] }}</span></div>
                    </div>
                    <div class="mb-4">
                        <label for="Description" class="block text-gray-700 text-smfont-bold mb-2">
                            Description
                        </label>
                         <textarea class="form-textarea mt-1 block w-full" rows="5" id="description" v-model="form.description" ></textarea>
                        <div v-if="$page.errors.description"><span class="text-red-500">{{ $page.errors.description[0] }}</span></div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-smfont-bold mb-2">Type(s) d'évènement</label>
                        <multiselect v-model="form.value" :options="form.options" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="true" placeholder="Select the event type(s)" :show-labels="false"  :preselect-first="false">
                        <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length }} options selected</span></template>
                        </multiselect>
                        <div v-if="$page.errors.value"><span class="text-red-500">{{ $page.errors.value[0] }}</span></div>
                    </div>
                    <br/>

                    <div class="mb-4">
                        <button class="h-8 px-4 text-sm text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg cursor-pointer focus:shadow-outline hover:bg-indigo-800" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 </app-layout>
</template>

<script>

import AppLayout from "../Layouts/AppLayout.vue";
import Multiselect from 'vue-multiselect';

export default {

    components: {
        AppLayout,
        Multiselect,
    },
    data() {
        return {
            form : {
                title: null,
                location: null,
                date: null,
                description: null,
                value: [],
                options:[
                    'dolor',
                    'voluptatibus',
                    'quam',
                    'et',
                    'aut',
                    'maxime',
                    'est',
                    'aliquid',
                    'dolores',
                    'molestiae',
                    'exercitalionem'
                ],
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/form-submit', this.form)

        },
    },


}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
