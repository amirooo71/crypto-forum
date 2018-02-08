<script>

    import Favorite from './Favorite.vue';

    export default {
        name: "reply",
        props: ['attr'],
        components: {Favorite},

        data() {
            return {
                editing: false,
                body: this.attr.body,
            }
        },

        methods: {
            update() {
                axios.patch('/replies/' + this.attr.id, {
                    body: this.body,
                });

                this.editing = false;
            },

            destroy() {
                axios.delete('/replies/' + this.attr.id);
                $(this.$el).fadeOut(300, () => {
                    flash('Your reply has been deleted.');
                });
            },
        },
    }
</script>

<style scoped>

</style>