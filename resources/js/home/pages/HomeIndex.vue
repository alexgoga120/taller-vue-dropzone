<template>
    <v-app>
        <HomeNavbar/>
        <HomeContainer/>
    </v-app>
</template>

<script>
import HomeNavbar from "../commons/HomeNavbar";
import HomeContainer from "../components/HomeContainer";
export default {
    name: "HomeIndex",
    components: {HomeContainer, HomeNavbar},
}
</script>

<style>
.w-100 {
    width: 100% !important;
}
</style>
