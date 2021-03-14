<template>
    <div>
        <div v-for="event in events" v-bind:key="event.id">
            <a @click.prevent="shareFacebook(event.url, event.title)">Share on Facebook</a>
            <a @click.prevent="shareTweeter(event.url, event.title)">Share on Twitter</a>
        </div>
    </div>
</template>

<script>
    export default {

        name: "ShareEvent",
        props: ["event"],

        data() {
            return {
                providers: {
                    twitter: 'https://twitter.com/intent/tweet/?url=:url&text=:text',
                    facebook: 'https://www.facebook.com/sharer/sharer.php?u=:u&title=:title'
                }
            };
        },

        methods: {

            shareFacebook(url,title) {
                window.open(this.providers.facebook.replace(':u', url).replace(':title', title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            },

            shareTweeter(url,title) {
                window.open(this.providers.twitter.replace(':u', url).replace(':title', tilte), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            }
        },
    }
</script>

<style>

</style>
