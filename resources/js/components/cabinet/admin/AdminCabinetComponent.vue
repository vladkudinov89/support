<template>
    <div>

        <support-item
            v-bind:supports="supports"
            v-bind:columns="columns"
            v-bind:isAdmin="isAdmin"
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
                columns: [
                    'title',
                    'message',
                    'status_active',
                    'status_view' ,
                    'user_name'
                ],
            }
        },
        computed: {
            ...mapState('support', {
                supports: 'supportsAdmin',
                isAdmin: 'isAdmin'
            }),
        },
        created() {
            this.$store.dispatch('support/fetchSupport');
            this.$store.dispatch('support/fetchUserRole');
        },

    }
</script>

<style scoped>

</style>
