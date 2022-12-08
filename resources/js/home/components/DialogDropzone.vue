<template>
    <v-dialog max-width="580"
              scrollable
              v-model="dialog">
        <template v-slot:activator="{ on, attrs }">
            <v-btn text
                   color="red"
                   v-on="on"
                   v-bind="attrs">
                Agregar imagenes
            </v-btn>
        </template>
        <v-card>
            <v-card-title>
                Subir imagenes para {{ user.name }}
            </v-card-title>
            <v-card-subtitle>
                {{ user.email }}
            </v-card-subtitle>
            <v-card-text>
                <v-container>
                    <vue-dropzone ref="dropzone" id="dropzone"
                                  :duplicateCheck="true"
                                  :useCustomSlot="true"
                                  :options="dropzoneOptions"

                                  @vdropzone-file-added="(file) =>{dzGenericFunction(file,'Archivo añadido')}"
                                  @vdropzone-files-added="(file) =>{dzGenericFunction(file,'Archivos añadidos', true)}"

                                  @vdropzone-max-files-reached="(file) =>{dzGenericFunction(file,'Seria bueno desactivar ')}"

                                  @vdropzone-duplicate-file="errDuplicateFile"
                                  @vdropzone-sending-multiple="dzSending">
                        <template>
                            <div>
                                <v-btn color="orange">
                                    Subir imagenes
                                </v-btn>
                                <v-icon>
                                    mdi-magnify
                                </v-icon>
                            </div>
                        </template>
                    </vue-dropzone>
                </v-container>
            </v-card-text>
            <v-card-actions class="justify-space-around">
                <v-btn text>
                    Cancelar
                </v-btn>
                <v-btn text @click="dzSubmit">
                    Aceptar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>
<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    name: 'DialogDropzone',
    props: {
        user: {}
    },
    components: {
        vueDropzone: vue2Dropzone
    },
    data: () => ({
        dialog: false
    }),
    created() {
        // this.dropzoneOptions = {
        //     url: route('home.uploadFiles'),
        //     thumbnailMethod: 'contain',
        //     maxFilesize: 0.5,
        //     addRemoveLinks: true,
        //     uploadMultiple: true,
        //     autoProcessQueue: false,
        //     acceptedFiles: 'image/*',
        //     headers: {"X-CSRF-TOKEN": document.getElementById('csrf_token').value}
        // }
        this.dropzoneOptions = {
            url: '/',
            thumbnailMethod: 'contain',
            maxFiles: 2,
            addRemoveLinks: true,
            uploadMultiple: true,
            autoProcessQueue: false,
            acceptedFiles: 'image/png, .jpg',
        }
    },
    methods: {
        async dzGenericFunction(file, text, validate = false) {
            console.log('---> ', file, ' <---');
            console.log('~~~> ', text, ' <~~~');
            if (validate) {
                const files = [...file];
                for (const item of files) {
                    if (item.size > (2 * (10 ** 6))) {
                        await this.$swal.fire('error', `Archivo muy grande ${item.name}`, 'error').then(() => {
                            this.$refs.dropzone.removeFile(item);
                        });
                    }
                }
                // if (file.size > (2 * (10 ^ 6))) {
                //     this.$swal.fire('error',
                //         'el tamaño de la imagen es superior a 2 mb',
                //         'error');
                // }
            }
            console.log();
        },
        errDuplicateFile({name}) {
            this.$swal(`Archivo duplicado ${name}`);
        },
        dzSending(file, xhr, formData) {
            formData.append('userId', this.user.id);
        },
        dzSubmit() {
            // this.$refs.dropzone.processQueue()
            let formData = new FormData();
            this.$refs.dropzone.getAcceptedFiles().forEach((file) => {
                formData.append('file[]', file);
            });
            formData.append('userId', this.user.id);
            this.$store.dispatch('addUserImageAction', formData).then(() => {
                this.$refs.dropzone.removeAllFiles()
                this.$swal.fire('imagenes subidas');
            });
        }
    }
}
</script>
