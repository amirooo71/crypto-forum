<template>

    <li class="dropdown" v-if="notifications.length">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
           aria-expanded="false">
            <i :data-count="notifyCount" class="glyphicon glyphicon-bell notification-icon"></i>
        </a>
        <ul class="dropdown-menu">
            <li v-for="notification in notifications">
                <a :href="notification.data.link" @click="markAsRead(notification)">
                    {{notification.data.message}}
                </a>
            </li>
        </ul>
    </li>


</template>

<script>
    export default {
        name: "user-notifications",

        data() {
            return {
                notifications: false,
            }
        },

        created() {
            axios.get("/profiles/" + window.App.user.name + "/notifications")
                .then(response => this.notifications = response.data)
            ;
        },

        methods: {

            markAsRead(notification) {
                axios.delete('/profiles/' + window.App.user.name + '/notifications/' + notification.id);
            },

        },

        computed: {

            notifyCount() {
                return this.notifications.length;
            }

        }
    }
</script>

<style scoped>

</style>