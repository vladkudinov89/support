<template>
    <div>
        <div class="container">
            <div class="row">

                <add-support-by-client
                    v-bind:user="user"
                ></add-support-by-client>

                <supports-list
                    v-bind:supports="supports"
                    v-bind:columns="columns"
                ></supports-list>

            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex';
    import SupportsList from "../../common/SupportsList";
    import AddSupportByClient from  "../client/AddSupportByClient";

    export default {
        name: "ClientCabinetComponent",
        components: {
            SupportsList,
            AddSupportByClient
        },
        data: function () {
            return {
                columns: ['title', 'message', 'status_active', 'status_view'],
            }
        },
        computed: {
            ...mapState('support', {
                supports: 'supportsClient',
                user: 'user'
            }),
        },
        created() {
            const clientId = this.$route.params.userId;

            this.$store.dispatch('support/fetchClientSupport' , clientId);
            this.$store.dispatch('support/fetchUser');
        },

    }
</script>

<style scoped>

</style>
