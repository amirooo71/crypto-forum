<script>
    export default {
        name: "reply",
        props: ['attr'],
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
            }
        },
    }
</script>

<style scoped>

</style>