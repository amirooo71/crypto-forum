<template>
    <button class="btn btn-default btn-block"
            :class="classes"
            @click="subscribe">Subscribe
    </button>
</template>

<script>
    export default {
        name: "subscribe-button",

        props: ['active'],

        computed: {
            classes() {
                return ['btn', this.active ? 'btn-primary' : 'btn-default'];
            }
        },

        methods: {
            subscribe() {
                axios[(this.active ? 'delete' : 'post')](location.pathname + '/subscriptions');
                this.active = ! this.active;
            }
        },
    }
</script>

<style scoped>

</style>