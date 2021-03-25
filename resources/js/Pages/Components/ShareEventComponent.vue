<template>
    <div>
        <a :href="'/download/' + event.id" class="btn-space"><i class="twitter far fa-calendar-alt"></i></i></a>
        <button  class=" btn-space" @click.prevent="shareTweeter()"><i class=" twitter fab fa-twitter"></i></button>
        <button class="btn-space" @click.prevent="shareFacebook()"><i class="twitter fab fa-facebook"></i></button>
        <button class="btn-space " @click.prevent="shareLinkedin()"><i class="twitter fab fa-linkedin"></i></button>
    </div>
</template>

<script>
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';
    export default {
        components:{
        },

        name: "ShareEvent",
        props: ["event"],


        data() {
            return {
                url: 'http%3A%2F%2Flocalhost%3A8000/DetailledEvent/'+this.event.id,
                title: this.event.lead_text,
                providers: {
                    facebook: 'https://www.facebook.com/sharer.php?u=:u&title=:title',
                    twitter: 'https://twitter.com/intent/tweet?url=:u&title=:title',
                    linkedin: 'https://www.linkedin.com/shareArticle?url=:u&title=:title'
                }
            };
        },

        methods: {

            shareFacebook() {
                window.open(this.providers.facebook.replace(':u', this.url).replace(':title', this.title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            },

            shareTweeter() {
                window.open(this.providers.twitter.replace(':u', this.url).replace(':title', this.title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            },

            shareLinkedin() {
                window.open(this.providers.linkedin.replace(':u', this.url).replace(':title', this.title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            }
        },
    }
</script>

<style>
    .btn-space{
        margin: 8px;
    }

    .twitter{
        color: #00c3ff;
    }

</style>
