<template>
    <div>
        <div class="container">
            <div class="row">

                <div class="jumbotron">
                    <h1 class="display-4">Welcome to Cabinet</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>

                    <div v-if="isAdmin == true">
                        <router-link
                            class="btn btn-primary btn-lg"
                            :to="{ name: 'AdminCabinetPage'}"
                        >Admin Cabinet
                        </router-link>
                    </div>

                    <div v-else>
                        <router-link
                            v-if="user.id"
                            class="btn btn-primary btn-lg"
                            :to="{ name: 'ClientCabinetPage' , params: {userId: user.id}}"
                        >Client Cabinet
                        </router-link>
                    </div>
                </div>



            </div>
        </div>
    </div>
</template>

<script>

    import {mapState} from "vuex";

    export default {
        name: "CabinetPage",
        computed: {
            ...mapState('support', {
                isAdmin: 'isAdmin',
                user: 'user'
            }),
        },
        created() {
            this.$store.dispatch('support/fetchUserRole');
            this.$store.dispatch('support/fetchUser');
        },
    }
</script>
