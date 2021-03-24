<template>
    <div>
        <a  class="rounded-full bg-red-400 text-white px-1 py-0.5 focus:bg-red-800 duration-200 ease-in-out" @click.prevent="shareTweeter(event.url, event.lead_text)">Twitter</a>
        <a  class="rounded-full bg-red-400 text-white px-1 py-0.5 focus:bg-red-800 duration-200 ease-in-out" @click.prevent="shareFacebook(event.url, event.lead_text)">Facebook</a>
        <a  class="rounded-full bg-red-400 text-white px-1 py-0.5 focus:bg-red-800 duration-200 ease-in-out" @click.prevent="shareLinkedin(event.url, event.lead_text)">Linkedin</a>
    </div>
</template>

<script>
    export default {

        name: "ShareEvent",
        props: ["event"],

        data() {
            return {
                providers: {
                    facebook: 'https://www.facebook.com/sharer.php?u=:u&title=:title',
                    twitter: 'https://twitter.com/intent/tweet?url=:u&title=:title',
                    linkedin: 'https://www.linkedin.com/shareArticle?url=:u&title=:title'
                }
            };
        },

        methods: {

            shareFacebook(url,title) {
                window.open(this.providers.facebook.replace(':u', url).replace(':title', title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            },

            shareTweeter(url,title) {
                window.open(this.providers.twitter.replace(':u', url).replace(':title', title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            },

            shareLinkedin(url,title) {
                window.open(this.providers.linkedin.replace(':u', url).replace(':title', title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            }
        },
    }
</script>

<style>

</style>
