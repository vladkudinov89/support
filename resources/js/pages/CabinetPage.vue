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
                        v-if="user.id"
                        class="btn btn-success"
                        :to="{ name: 'ClientCabinetPage' , params: {userId: user.id}}"
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
