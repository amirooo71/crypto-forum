<template>
    <div class="section">
        <div class="field">
            <label class="label">توکن تحلیل</label>
            <div class="control">
                <input class="input" type="text" name="thread_token" v-model="token_thread"
                       placeholder="مثال: f874786bb16ede75957ae7d2a51dc299" @keyup="attach">
            </div>
        </div>
        <div v-if="thread">
            <div class="field">
                <figure class="image">
                    <img :src="imageUrl" alt="نحلیل ارز دیجیتال">
                </figure>
            </div>
            <div class="field">
                <div class="control">
                    <textarea class="textarea" v-html="thread.body"></textarea>
                </div>
                <p class="help">با تغییر این متن توضیحات تحلیل شما تغییر نخواهد کرد. و تغییرات فقط در این قسمت اعمال می
                    شود.</p>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-info" @click="add">ثبت</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "attach-thread",

        data() {
            return {
                token_thread: '',
                thread: '',
            }
        },

        methods: {

            attach() {
                axios.get('/thread/attach/' + this.token_thread)
                    .then(response => {
                        this.thread = response.data;
                    });
            },

            add() {

                let data = {
                    body: this.thread.body,
                    image_url: this.imageUrl,
                    slug: this.thread.slug,
                };
                axios.post(`/thread/attach/${this.thread.slug}`, data)
                    .then(response => {
                        Event.$emit('addComment', {comment: response.data.comment});
                        noty('success', response.data.message);
                    })
                    .catch(error => {
                        noty('error', error.response.data.message);
                    });
            }

        },

        computed: {
            imageUrl() {
                return 'https://www.tradingview.com/x/' + this.thread.analysis.image_url;
            },
        }
    }
</script>

<style scoped>

</style>