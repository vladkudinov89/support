<template>
    <div class="container">
        <single-support-item
            :key="support.id"
            v-bind:support="support"
        >

        </single-support-item>

        <div v-if="isAdminViewSupport()">
            <review-list></review-list>
        </div>
        <div v-else>
            <p class="bg-info m-3">You can add review to your support after visited admin.</p>
        </div>


    </div>
</template>

<script>
    import SingleSupportItem from '../components/common/SingleSupportItem';
    import {mapState} from "vuex";
    import ReviewList from "../components/review/ReviewList";

    export default {
        name: "ClientCabinetSingleSupportPage",
        components: {
            ReviewList,
            SingleSupportItem
        },
        data: function () {
            return {}
        },
        computed: {
            ...mapState('support', {
                support: 'supportClient',
                user: 'user'
            }),
        },
        created() {
            const supportParam = {
                clientId: '',
                supportId: ''
            };

            supportParam.clientId = parseInt(this.$route.params.userId);
            supportParam.supportId = parseInt(this.$route.params.supportId);

            this.$store.dispatch('support/fetchClientSupport', supportParam.clientId);
            this.$store.dispatch('support/fetchClientSingleSupport', supportParam);

            this.$store.dispatch('support/fetchUser');

        },
        methods: {
            isAdminViewSupport() {
                return this.support.is_admin_viewed_support === 1;
            }
        }
    }
</script>

<style scoped>

</style>
