<template>
    <v-card max-width="500">
        <v-carousel v-if="user.users_images.length !== 0"
                    hide-delimiters>
            <v-carousel-item
                v-for="(img,i) in user.users_images"
                :key="i"
                :src="img.img_url"
            ></v-carousel-item>
        </v-carousel>

        <v-img v-else
               src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
        >
            <template v-slot:placeholder>
                <v-progress-linear
                    color="deep-purple"
                    height="250"
                    indeterminate
                ></v-progress-linear>
            </template>
        </v-img>

        <v-card-title>
            {{ user.name }}
        </v-card-title>
        <v-card-actions class="justify-end">
            <DialogDropzone :user="user"/>
        </v-card-actions>
    </v-card>
</template>
<script>
import DialogDropzone from "./DialogDropzone";

export default {
    name: 'UserCard',
    components: {DialogDropzone},
    props: {
        user: {
            required: true
        }
    },
    data: () => ({
        dialog: false
    }),
}
</script>
