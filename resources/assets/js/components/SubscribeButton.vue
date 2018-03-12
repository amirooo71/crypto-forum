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


        data() {
            return {
                isActive: this.active,
            }
        },

        computed: {
            classes() {
                return ['btn', this.isActive ? 'btn-primary' : 'btn-default'];
            }
        },

        methods: {
            subscribe() {
                axios[(this.isActive ? 'delete' : 'post')](location.pathname + '/subscriptions');
                this.isActive = !this.isActive;
            }
        },
    }
</script>

<style scoped>

</style>