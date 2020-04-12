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
            
            <support-item
            ></support-item>



        </div>
    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';
    import SupportItem from "./SupportItem";

    export default {
        name: "IndexComponent",
        components: {SupportItem},
        data: function () {
            return {}
        },
    }
</script>

<style scoped>

</style>
