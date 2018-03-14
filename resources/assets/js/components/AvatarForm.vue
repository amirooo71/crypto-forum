<template>
    <div>
        <h1>
            {{user.name}}
        </h1>
        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <input type="file" name="avatar" accept="image/*" @change="onChange">
        </form>
        <img :src="avatar" alt="" width="50" height="50">
    </div>
</template>

<script>
    export default {
        name: "avatar-form",

        props: ['user'],

        data() {
            return {
                avatar: '',
            }
        },

        methods: {

            onChange(e) {

                if (!e.target.files.length) return;
                let avatar = e.target.files[0];
                let reader = new FileReader();
                reader.readAsDataURL(avatar);

                reader.onload = e => {
                    this.avatar = e.target.result;
                };

                this.persist(avatar);
            },

            persist(avatar) {
                let data = new FormData();
                data.append('avatar', avatar);
                axios.post(`/api/users/${this.user.name}/avatar`, data);
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