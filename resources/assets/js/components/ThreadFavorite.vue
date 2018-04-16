<template>
    <nav class="level is-mobile is-clipped">
        <div class="level-left">
            <div class="level-item">
                <span>
                    <span>{{favoritesCount}}</span>
                    <a @click="toggle">
                        <i :class="classes"></i>
                    </a>
                </span>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {

        name: "thread-favorite",

        props: ['thread'],

        data() {
            return {
                favoritesCount: this.thread.favoritesCount,
                isFavorited: this.thread.isFavorited,
            }
        },
        
        computed: {

            classes() {
                return [this.isFavorited ? 'fas fa-heart has-text-danger' : 'far fa-heart has-text-danger'];
            },

            endpoint() {
                return '/api/threads/' + this.thread.slug + '/favorites';
            },
        },

        methods: {

            toggle() {
                return this.isFavorited ? this.destory() : this.create();
            },

            destory() {
                axios.delete(this.endpoint);
                this.isFavorited = false;
                this.favoritesCount--;
            },

            create() {
                axios.post(this.endpoint);
                this.isFavorited = true;
                this.favoritesCount++;
            },
        }
    }
</script>

<style scoped>

</style>