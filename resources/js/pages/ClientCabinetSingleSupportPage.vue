<template>
    <div class="container">
        <single-support-item
            :key="support.id"
            v-bind:support="support">

        </single-support-item>

       <review-list></review-list>


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
            return {

            }
        },
        computed: {
            ...mapState('support', {
                support: 'supportClient'
            }),
        },
        created() {
            const supportParam = {
                clientId: '',
                supportId: ''
            };

            supportParam.clientId = parseInt(this.$route.params.userId);
            supportParam.supportId = parseInt(this.$route.params.supportId);

            this.$store.dispatch('support/fetchClientSupport' , supportParam.clientId);
            this.$store.dispatch('support/fetchClientSingleSupport' , supportParam);

        },
    }
</script>

<style scoped>

</style>
