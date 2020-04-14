<template>
    <div>
        <div class="container">
            <div class="row">

                <h1>Welcome to Cabinet</h1>

                <div v-if="isAdmin == true">
                    <router-link
                        class="btn btn-success"
                        :to="{ name: 'AdminCabinetPage'}"
                    >Admin Cabinet
                    </router-link>
                </div>

                <div v-else>
                    <router-link
                        class="btn btn-success"
                        :to="{ name: 'ClientCabinetPage'}"
                    >Client Cabinet
                    </router-link>
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
                isAdmin: 'isAdmin'
            }),
        },
        created() {
            this.$store.dispatch('support/fetchUserRole');
        },
    }
</script>
