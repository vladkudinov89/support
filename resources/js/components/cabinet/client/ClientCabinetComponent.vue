<template>
    <div>
        <div class="container">
            <div class="row">

                <supports-list
                    v-bind:supports="supports"
                    v-bind:columns="columns"
                ></supports-list>

            </div>
        </div>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    import SupportsList from "../../common/SupportsList";

    export default {
        name: "ClientCabinetComponent",
        components: {
            SupportsList
        },
        data: function () {
            return {
                columns: ['title', 'message', 'status_active', 'status_view'],
            }
        },
        computed: {
            ...mapState('support', {
                supports: 'supportsClient'
            }),
        },
        created() {
            const clientId = this.$route.params.userId;

            this.$store.dispatch('support/fetchClientSupport' , clientId);
        },

    }
</script>

<style scoped>

</style>
