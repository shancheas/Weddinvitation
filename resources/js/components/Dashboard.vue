<template>
    <empty--dashboard
        v-if="(invitations && invitations.length <= 0)"
        :name="name"
        :route="route"/>
    <div v-else>
        <div class="row mb-3">
            <div class="col-lg-8">
                <h2 class="display-3">Undangan-undangan Keren {{ name }}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row row-grid">
                    <div class="col-lg-3" v-for="invitation in invitations" :key="invitation.id">
                        <invitation-card :poster="poster" :data="invitation" @onDelete="onDelete" :url="url"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Dashboard",
        props: {
            data: String,
            poster: String,
            name: String,
            route: String,
            url: String
        },
        data() {
            return {
                invitations: null
            }
        },
        mounted() {
            this.invitations = JSON.parse(this.data)
            console.log(this.invitations)
        },
        methods: {
            onDelete(id) {
                this.invitations = this.invitations.filter(invitation => {
                    return invitation.id != id
                })
            }
        }
    }
</script>
