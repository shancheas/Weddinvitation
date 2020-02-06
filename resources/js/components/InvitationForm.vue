<template>
    <div class="card-body">
        <form @submit.prevent="submit">
            <h6 class="heading-small text-muted mb-4">Informasi mempelai</h6>
            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nama Mempelai Pria</label>
                            <base-input placeholder="contoh: Ricardo Milos" v-model="$v.brideInfo.bridegroom.$model"
                                        :valid="$v.brideInfo.bridegroom.$error ? false : undefined"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nama Mempelai Wanita</label>
                            <base-input placeholder="contoh: Ai Kayano" v-model.trim="$v.brideInfo.bride.$model"
                                        :valid="$v.brideInfo.bride.$error ? false : undefined"/>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <!-- Address -->
            <h6 class="heading-small text-muted mb-4">Waktu & Tempat</h6>

            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Tempat</label>
                            <base-input placeholder="contoh: Hotel, Gedung Serbaguna"
                                        v-model="$v.brideInfo.places.$model"
                                        :valid="$v.brideInfo.places.$error ? false : undefined"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-control-label">Alamat</label>
                            <base-input placeholder="Alamat tempat resepsi"
                                        v-model="$v.brideInfo.address.$model"
                                        :valid="$v.brideInfo.address.$error ? false : undefined"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Tanggal</label>
                            <base-input addon-left-icon="ni ni-calendar-grid-58"
                                        :valid="$v.brideInfo.date.$error ? false : undefined">
                                <flat-picker slot-scope="{focus, blur}"
                                             @on-open="focus"
                                             @on-close="blur"
                                             :config="{allowInput: true}"
                                             class="form-control datepicker"
                                             v-model="$v.brideInfo.date.$model">
                                </flat-picker>
                            </base-input>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Jam</label>
                            <base-input placeholder="Waktu mulai" addon-left-icon="fas fa-clock"
                                        type="time"
                                        v-model="$v.brideInfo.time.$model"
                                        :valid="$v.brideInfo.time.$error ? false : undefined"/>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <!-- Description
            -->
            <h6 class="heading-small text-muted mb-4">Lokasi</h6>
            <div class="pl-lg-4">
                <google-map :center="center" :zoom="15" style="width: 100%; height: 500px">
                    <google-marker :position="marker.position" :clickable="true" :draggable="true"
                                   @position_changed="updateMarker"
                                   @click="center=marker.position"/>
                </google-map>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-pink btn-round-lg my-4">Simpan</button>
            </div>
        </form>
    </div>

</template>

<script>
    import flatPicker from "vue-flatpickr-component";
    import BaseInput from "./BaseInput";
    import {Map, Marker} from 'vue2-google-maps';
    import {required, minLength} from 'vuelidate/lib/validators'
    import api from '../api'

    import 'flatpickr/dist/flatpickr.css';

    export default {
        name: "InvitationForm",
        data() {
            return {
                brideInfo: {
                    bride: "",
                    bridegroom: "",
                    places: "",
                    address: "",
                    date: "2020/02/02",
                    time: "09:00",
                    latitude: -6.8880563,
                    longitude: 107.6291544
                },
                center: null,
                marker: {
                    position: {
                        lat: -6.8880563,
                        lng: 107.6291544
                    }
                }
            };
        },
        validations: {
            brideInfo: {
                bride: {
                    required,
                    minLength: minLength(4)
                },
                bridegroom: {
                    required,
                    minLength: minLength(4)
                },
                places: {
                    required,
                    minLength: minLength(6)
                },
                address: {
                    required,
                    minLength: minLength(6)
                },
                date: {
                    required,
                    minLength: minLength(6)
                },
                time: {
                    required,
                },
            }
        },
        methods: {
            submit() {
                this.$v.$touch()
                if (!this.$v.$invalid) {
                    const userId = document.getElementById('params').getAttribute('data-id');
                    this.brideInfo.date = `${this.brideInfo.date} ${this.brideInfo.time}`
                    this.brideInfo.user_id = userId
                    api.post('api/invitation/create', this.brideInfo)
                    .then(response => {
                        console.log(response)
                        window.location.replace(`/editor/${response.data.data.id}`);
                    })
                }
            },
            updateMarker(latLng) {
                this.brideInfo.longitude = latLng.lng();
                this.brideInfo.latitude = latLng.lat();
            }
        },
        beforeMount() {
            this.center = {
                lat: this.brideInfo.latitude,
                lng: this.brideInfo.longitude
            };
        },
        components: {
            flatPicker,
            BaseInput,
            GoogleMap: Map,
            GoogleMarker: Marker,
        }
    }
</script>

