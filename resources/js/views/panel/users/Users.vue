<template>
    <div>
        <ul>
            <li v-for="(user, index) in usersList" :key="index">
                {{ user }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                usersList
            }
        },

        created() {
            this.usersList = this.getUsersList();
        },

        methods: {
            getUsersList() {
                return ['ehsan', 'taghi', 'naghi'];
            }
        }
    }
</script>