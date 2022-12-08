<template>
    <div>

        <v-app-bar
            app
            color="#6A76AB"
            dark
        >

            <v-app-bar-nav-icon @click="drawerNavbar = true"></v-app-bar-nav-icon>

            <v-app-bar-title>Vue dropzone</v-app-bar-title>

            <v-spacer></v-spacer>

        </v-app-bar>

        <v-navigation-drawer
            v-model="drawerNavbar"
            absolute
            temporary
        >
            <v-list
                nav
                dense
            >
                <v-list-item class="px-2">
                    <v-list-item-avatar>
                        <v-img src="https://randomuser.me/api/portraits/men/70.jpg"></v-img>
                    </v-list-item-avatar>
                </v-list-item>
                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title class="text-h6">
                            Alex
                        </v-list-item-title>
                        <v-list-item-subtitle>alex.satoritech@gmail.com</v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
    </div>
</template>
<script>
export default {
    name: 'HomeNavbar',
    data: () => ({
        drawerNavbar: false,
        groupNavbar: null,
    })
}
</script>
