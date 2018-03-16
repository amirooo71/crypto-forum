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
            }
        },

        methods: {

            toggleLock() {
                axios[this.locked ? 'delete' : 'post'](`/lock-threads/${this.thread.slug}`);
                this.locked = !this.locked;
            }

        }


    }

</script>

<style scoped>

</style>