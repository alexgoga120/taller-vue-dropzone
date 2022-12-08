<template>
    <v-main>
        <v-container class="fill-height" fluid>
            <div class="d-flex justify-space-around align-center w-100" v-if="userVuex.length !== 0">
                <UserCard v-for="(user, index) in userVuex"
                          :key="index"
                          :user="user"/>
            </div>
        </v-container>
    </v-main>
</template>

<script>

import UserCard from "./UserCard";
export default {
    name: "HomeContainer",
    components: {UserCard},
    created() {
        this.$store.dispatch('getUsersAction')
    },
    computed: {
        userVuex() {
            return this.$store.getters.showUsers
        }
    }
}
</script>

