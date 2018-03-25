<template>
    <li class="dropdown dropdown-notifications" v-if="notifications.length">
        <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
            <i :data-count="notifyCount" class="glyphicon glyphicon-bell notification-icon"></i>
        </a>
        <div class="dropdown-container">
            <ul class="dropdown-menu">
                <li v-for="notification in notifications">
                    <a :href="notification.data.link" @click="markAsRead(notification)">
                        {{notification.data.message}}
                    </a>
                </li>
            </ul>
        </div>
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