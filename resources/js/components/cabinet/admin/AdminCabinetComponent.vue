<template>
    <div>

        <supports-list
            v-bind:supports="supports"
            v-bind:columns="columns"
            v-bind:isAdmin="isAdmin"
        ></supports-list>

    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    import SupportsList from "../../common/SupportsList";

    export default {
        name: "AdminCabinetComponent",
        components: {
            SupportsList
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
