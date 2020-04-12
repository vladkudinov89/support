<template>
    <div>
        <div class="container">
            <div class="row">
        <support-item
          v-bind:supports="supports"
          v-bind:columns="columns"
        ></support-item>

    </div>
    </div>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    import SupportItem from "../../../components/SupportItem";

    export default {
        name: "ClientCabinetComponent",
        components : {
            SupportItem
        },
        data: function (){
            return {
                columns:  ['title','message','status_activities', 'status_view'],
            }
        },
        computed: {
           ...mapState('support', {
            supports: 'supports'
        }),
       },
       created() {
        this.$store.dispatch('support/fetchClientSupport');
    },

}
</script>

<style scoped>

</style>
