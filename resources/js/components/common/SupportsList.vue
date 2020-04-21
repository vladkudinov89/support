<template>
    <div>

        <table class="table">
            <thead>
            <tr>
                <th v-for="column in columns" @click="sortBy(column)">
                    {{ column }}
                </th>
            </tr>
            </thead>
            <tbody>

                <support-item
                    v-for="(support , index) in supportItems"
                    v-bind:isAdmin="isAdmin"
                    :key="support.id"
                    :support.sync="support"
                    v-on:delete-support-client="deleteSupportByClient"
                    v-on:delete-support-admin="deleteSupportByAdmin"
                ></support-item>

            </tbody>
        </table>

    </div>
</template>

<script>
    import SupportItem from '../../components/common/SupportItem';
    import {mapState, mapGetters, mapActions} from 'vuex';

    export default {
        name: "SupportsList",
        components: {
            SupportItem
        },
        props: ['supports', 'columns', 'isAdmin'],
        data: function () {
            return {
                sortKey: '',
                currentSortDir: 'asc'
            }
        },
        computed: {
            supportItems() {
                return _.orderBy(this.supports, 'support_' + this.sortKey, this.currentSortDir);
            },
        },
        methods: {
            ...mapActions('support', {
                    deleteSupportByClient: 'deleteSupportByClient',
                    deleteSupportByAdmin: 'deleteSupportByAdmin',
                }
            ),
            deleteSupportByClient(id){
                this.$store.dispatch('support/deleteSupportByClient' , id);
            },
            deleteSupportByAdmin(id){
                this.$store.dispatch('support/deleteSupportByAdmin' , id);
            },
            sortBy: function (sortKey) {
                this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
                this.sortKey = sortKey;
            },
        }
    }
</script>

<style scoped>

</style>
