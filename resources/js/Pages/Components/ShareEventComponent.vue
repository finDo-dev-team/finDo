<template>
    <div>
        <a :href="'/download/' + event.id" class="btn-space"><i class="icon-color far fa-calendar-alt"></i></a>
        <a  class=" btn-space pointer" @click.prevent="shareTweeter()"><i class=" icon-color fab fa-twitter"></i></a>
        <a class="btn-space pointer" @click.prevent="shareFacebook()"><i class="icon-color fab fa-facebook"></i></a>
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
                url: window.location.host+'%2FDetailledEvent%2F'+this.event.id,
                title: this.event.lead_text,
                providers: {
                    facebook: 'https://www.facebook.com/sharer.php?u=:u&title=:text',
                    twitter: 'https://twitter.com/intent/tweet?url=:u&title=:text'
                }
            };
        },

        methods: {

            shareFacebook() {
                window.open(this.providers.facebook.replace(':u', this.url).replace(':text', this.title), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            },

            shareTweeter() {
                window.open(this.providers.twitter.replace(':u', this.url).replace(':text', this.title).replace(':tag', this.tag), 'sharer', 'toolbar=0,status=0,width=648,height=395');
                return true;
            },

        },

    }
</script>

<style>
    .btn-space{
        margin: 8px;
    }

    .icon-color{
        color: #00c3ff;
    }
    .pointer{
        cursor: pointer;
    }
    .pointer:active{
        cursor: progress;
    }

</style>
