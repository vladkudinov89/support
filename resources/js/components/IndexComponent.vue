<template>
    <div>
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <!-- Button trigger modal -->
                    <button type="button" class="m-3 btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Create new Support
                    </button>
                </div>
            </div>

            <div class="" v-for="support in supports">
                <div class="">{{support}}</div>
            </div>

        </div>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';

    export default {
        name: "IndexComponent",
        data: function () {
            return {
                // supports : []
            }
        },
        created() {
            this.$store.dispatch('support/fetchSupport');
        },
        computed: {
            ...mapState('support', {
                supports: 'supports'
            }),
        }
    }
</script>

<style scoped>

</style>
