<template>
    <div>
        <div v-if="signedIn">
            <div class="form-group">
                <!--<wysiwyg name="body" v-model="body" placeholder="Have something to say?"-->
                <!--:shouldClear="completed"></wysiwyg>-->
                <textarea name="body" id="body" v-model="body" cols="30" rows="10" class="form-control"
                          placeholder="Have you somthing to say?"></textarea>

            </div>
            <div class="form-group">
                <button type="submit" class="btn" @click="addReply">ارسال</button>
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

    import 'at.js';
    import 'jquery.caret';

    export default {
        name: "new-reply",

        data() {
            return {
                body: '',
                completed: false,
            }
        },

        mounted() {
            $('#body').atwho({
                at: "@",
                delay: 750,
                callbacks: {
                    remoteFilter: function (query, callback) {
                        $.getJSON("/api/users", {name: query}, function (usernames) {
                            callback(usernames);
                        });
                    }
                }
            });
        },

        methods: {

            addReply() {
                axios.post(location.pathname + '/replies', {body: this.body})
                    .then(response => {
                        this.body = '';
                        this.completed = true;
                        flash('Your Reply has been posted');
                        this.$emit('created', response.data);
                    })
                    .catch(error => {
                        flash(error.response.data, 'danger');
                    })
                ;
            },

        },
    }
</script>

<style scoped>

</style>