<template>
    <div>
        <div class="level">
            <img :src="avatar" class="mr-1" width="50" height="50">
            <h1>
                {{user.name}}
            </h1>
        </div>
        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <image-upload name="avatar" @loaded="onLoad"></image-upload>
        </form>
    </div>
</template>

<script>

    import ImageUpload from './ImageUpload.vue';

    export default {
        name: "avatar-form",

        components: {ImageUpload},

        props: ['user'],


        data() {
            return {
                avatar: this.user.avatar_path,
            }
        },

        methods: {

            onLoad(avatar) {

                this.avatar = avatar.src;
                this.persist(avatar.file);
            },

            persist(avatar) {

                let data = new FormData();
                data.append('avatar', avatar);
                axios.post(`/api/users/${this.user.name}/avatar`, data)
                    .then(() => flash('Avatar uploaded!'));
            },

        },

        computed: {

            canUpdate() {
                return this.authorize(user => user.id === this.user.id);
            },

        },

    }
</script>

<style scoped>

</style>