<template>
    <div class="box" v-if="comments.length > 0">
        <div class="timeline is-rtl">
            <div v-for="comment in comments">
                <header class="timeline-header">
                    <span class="tag is-medium is-primary">
                        {{comment.created_at}}
                    </span>
                </header>
                <div class="timeline-item is-primary">
                    <div class="timeline-marker is-primary"></div>
                    <div class="timeline-content">
                        <p class="has-text-justified">
                            {{comment.body}}
                        </p>
                        <figure class="image pd-t-10" v-if="comment.image_url">
                            <img :src="comment.image_url" :alt="comment.body">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        name: "threads-comments",

        props: ['thread'],

        data() {
            return {
                comments: [],
            }
        },

        created() {
            Event.$on('addComment', (data) => this.comments.push(data.comment));
            this.fetchComments();
        },

        methods: {

            fetchComments() {

                axios.get(`/analysis/${this.thread.slug}/comments`)
                    .then(response => {
                        this.comments = response.data
                    })
                ;

            },

        }

    }
</script>

<style scoped>

</style>