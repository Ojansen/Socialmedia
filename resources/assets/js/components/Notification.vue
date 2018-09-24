<template>
    <li class="dropdown">
        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="flase">
            <i class="fa fa-bell fa-2x" aria-hidden="true"></i><span class="badge">{{notifications.length}}</span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li v-for="notification in notifications">
                <a href="#" v-on:click="MarkAsRead(notification)">

                    {{notification.data.post.user.nickname}} commented on your Post :
                    <small>{{notification.data.post.Text_title}}</small>
                </a>
            </li>
            <li v-if="notifications.length == 0">
                    No Notifications :D
            </li>
           </ul>
    </li>
</template>
<script>
    export default {
        props: ['notifications'],
        methods: {
            MarkAsRead: function(notification) {
                var data = {
                    id: notification.id
                };
                axios.post('/notification/read', data).then(response => {
                    window.location.href = "/post/" + notification.data.post.Post_id;
                });
            }
        }
    }
</script>