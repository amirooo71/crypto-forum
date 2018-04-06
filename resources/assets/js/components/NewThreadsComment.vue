<template>
    <div class="section">
        <div class="field">
            <label class="label">آدرس تصویر تحلیل (اختیاری)</label>
            <div class="control">
                <input class="input" type="text" name="image_url" v-model="image_url"
                       placeholder="مثال: https://www.tradingview.com/x/A5pM7jjZ">
            </div>
            <p class="help">در صورت نیاز به تصویر تحلیل با مراجعه به صفحه نمودار و کپی کردن آدرس تصویر در این قسمت،
                تصویر تحلیل شما در قسمت کامنت نمایش خواهد داده شد. <a href="/analysis/chart">(نمودار)</a>
            </p>
        </div>
        <div class="field">
            <label class="label">توضیحات</label>
            <div class="control">
                <textarea class="textarea" name="body" v-model="body"></textarea>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-info" @click="add">ثبت</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        name: "new-threads-comment",

        props: ['thread'],

        data() {
            return {
                image_url: '',
                body: '',
            }
        },

        methods: {

            add() {

                let data = {
                    image_url: this.image_url,
                    body: this.body,
                };

                axios.post(`/analysis/${this.thread.slug}/comment`, data)
                    .then(response => {
                        Event.$emit('addComment');
                        noty('success',response.data.message);
                    })
                ;
            }

        }

    }
</script>

<style scoped>

</style>