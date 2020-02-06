<template>
    <div class="card bg-white shadow border-0">

        <div class="card-header-tabs">
            <div class="text-right mb--3 mr-2">
                <base-dropdown class="dropdown"
                               position="right">
                    <a slot="title" class="btn btn-sm btn-icon-only text-light" role="button"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>

                    <template>
                        <!--
                        <a class="dropdown-item" href="#">
                            <i class="ni ni-ui-04 text-cyan"></i> Pengaturan
                        </a>
                        -->
                        <a class="dropdown-item" :href="`/editor/${data.id}`">
                            <i class="ni ni-palette text-success"></i> Ubah
                        </a>
                        <a class="dropdown-item" href="#" @click="modals.url = true">
                            <i class="ni ni-send text-blue"></i> Bagikan
                        </a>
                        <a class="dropdown-item" href="#" @click="modals.deleteAlert = true">
                            <i class="ni ni-fat-remove text-danger"></i> Hapus
                        </a>
                    </template>
                </base-dropdown>
            </div>
        </div>
        <div class="card-img-cover">
            <img :src="poster"
                 class="card-img-top" alt="first">
        </div>
        <div class="card-blockquote">
            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                 class="svg-bg">
                <polygon points="0,52 583,95 0,95" class="fill-white"></polygon>
                <polygon points="0,42 583,95 683,0 0,95" opacity=".2"
                         class="fill-default"></polygon>
            </svg>
            <h3 class="font-weight-bold">{{ getBrideNames }}</h3>
            <a :href="getInvitationUri" class="btn btn-primary btn-sm" target="_blank">
                <i class="fa fa-eye"></i> Lihat
            </a>
            <a class="btn btn-icon btn-2 btn-danger btn-sm" v-bind:href="`details/${data.id}`">
                <span class="btn-inner--icon"><i class="fas fa-chart-bar"></i></span>
            </a>
        </div>
        <modal :show.sync="modals.deleteAlert"
               gradient="danger"
               modal-classes="modal-danger modal-dialog-centered">
            <div class="py-3 text-center">
                <i class="ni ni-fat-remove ni-3x"></i>
                <h4 class="heading mt-4">Hapus Undangan {{ getBrideNames }}</h4>
            </div>

            <template slot="footer">
                <base-button type="white" @click="deleteInvitation">YA, HAPUS</base-button>
                <base-button type="link"
                             text-color="white"
                             class="ml-auto"
                             @click="modals.deleteAlert = false">
                    TUTUP
                </base-button>
            </template>
        </modal>
        <modal :show.sync="modals.url">
            <div>
                <base-input placeholder="url" id="inv-url" :value="getInvitationUri" addon-right-icon="fas fa-link"></base-input>
            </div>
            <template slot="footer">
                <base-button type="secondary" @click="modals.url = false">Copy</base-button>
            </template>
        </modal>
    </div>
</template>

<script>
    import BaseDropdown from "./BaseDropdown";
    import api from '../api'

    export default {
        name: "InvitationCard",
        props: {
            poster: {
                type: String,
                description: "Image poster for card"
            },
            data: Object,
            url: String
        },
        data() {
            return {
                modals: {
                    deleteAlert: false,
                    url: false
                },
                brideNames: ''
            }
        },
        computed: {
            getBrideNames() {
                return `${this.data.bridegroom} & ${this.data.bride}`
            },
            getInvitationUri() {
                return `${this.url}/invitation/${this.data.bridegroom.toLowerCase()}-dan-${this.data.bride.toLocaleLowerCase()}`
            }
        },
        methods: {
            deleteInvitation() {
                const invitationId = this.data.id
                this.modals.deleteAlert = false
                api.delete(`api/invitation/${invitationId}`).then(response => {
                    console.log(response)
                    this.$emit('onDelete', invitationId)
                })
            },
            copyTextToClipboard() {
                const copyText = document.getElementById("inv-url");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
                this.modals.url = false;
            }
        },
        components: {
            BaseDropdown
        }
    }
</script>

