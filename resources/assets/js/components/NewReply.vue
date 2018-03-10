<template>
    <div>
        <div v-if="signedIn">
            <div class="form-group">
            <textarea name="body" id="body" v-model="body" cols="30" rows="10" class="form-control"
                      placeholder="Have you somthing to say?"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn" @click="addReply">Post</button>
            </div>
        </div>
        <div v-else>
            <p class="text-center">Please <a href="/login">sing in</a> in to participate in this
                discussion
            </p>
        </div>

    </div>
</template>

<script>
    export default {
        name: "new-reply",

        props: ['endpoint'],

        data() {
            return {
                body: '',
            }
        },

        methods: {

            addReply() {
                axios.post(this.endpoint, {body: this.body})
                    .then(response => {
                        this.body = '';
                        flash('Your Reply has been posted');
                        this.$emit('created', response.data);
                    });
            },

        },

        computed: {

            signedIn() {
                return window.App.signedIn;
            }

        },

    }
</script>

<style scoped>

</style>