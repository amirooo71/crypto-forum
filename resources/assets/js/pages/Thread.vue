<script>

    import Replies from '../components/Replies.vue';
    import SubscribeButton from '../components/SubscribeButton.vue'

    export default {

        components: {Replies, SubscribeButton},

        props: ['dataRepliesCount', 'thread'],

        data() {
            return {
                repliesCount: this.dataRepliesCount,
                locked: this.thread.locked,
                editing: false,
                form: {},
            }
        },

        created() {
            this.resetForm();
        },

        methods: {

            toggleLock() {

                let uri = `/lock-threads/${this.thread.slug}`;

                axios[this.locked ? 'delete' : 'post'](uri);
                this.locked = !this.locked;
            },

            update() {

                let uri = `/threads/${this.thread.channel.slug}/${this.thread.slug}`;

                axios.patch(uri, this.form).then(() => {
                    this.editing = false;
                    Event.$emit('ThreadUpdated',{'title': this.form.title});
                    flash('Your thread has been updated');
                });
            },

            resetForm() {

                this.form = {

                    title: this.thread.title,
                    body: this.thread.body,
                };

                this.editing = false;
            },

        }


    }

</script>

<style scoped>

</style>