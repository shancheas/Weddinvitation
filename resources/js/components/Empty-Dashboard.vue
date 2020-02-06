<template>
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
                <h1>Hai {{ name.toUpperCase() }}</h1>
                <p class="text-lead">Sepertinya kamu belum mempunyai undangan sama sekali. Yuk buat undanganmu
                    sekarang.</p>
                <a class="btn btn-lg btn-round-lg btn-pink" :href="route">
                    <span class="nav-link-inner--text">Buat Undangan</span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Empty-Dashboard",
        props: {
            name: String,
            route: String
        }
    }
</script>
