<template>
    <div>

        <support-item
            v-bind:supports="supports"
            v-bind:columns="columns"
        ></support-item>

    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    import SupportItem from "../../../components/SupportItem";

    export default {
        name: "AdminCabinetComponent",
        components: {
            SupportItem
        },
        data: function () {
            return {
                columns: ['title', 'message', 'status_activities', 'status_view'],
            }
        },
        computed: {
            ...mapState('support', {
                supports: 'supports'
            }),
        },
        created() {
            this.$store.dispatch('support/fetchSupport');
        },

    }
</script>

<style scoped>

</style>
