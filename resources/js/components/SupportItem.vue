<template>
    <div>

        <table class="table">
            <thead>
            <tr>
                <th  v-for="column in columns"  @click="sortBy(column)">
                    {{ column }}
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="support in supportItems">
                <td>{{support.support_title}}</td>
                <td>{{support.support_message}}</td>
                <td>{{support.support_status_active}}</td>
                <td>{{support.support_status_view}}</td>
                <td>{{support.support_user_name}}</td>
                <td>{{support.support_user_role}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    import {mapState, mapGetters, mapActions} from 'vuex';

    export default {
        name: "SupportItem",
        props: ['supports' , 'columns'],
        data: function () {
            return {
                sortKey: '',
                currentSortDir: 'asc'
            }
        },
        computed: {
            supportItems() {
                return _.orderBy(this.supports, 'support_' + this.sortKey, this.currentSortDir );
            },
        },
        methods: {
            sortBy: function(sortKey) {
                this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
                this.sortKey = sortKey;
            },
        }
    }
</script>

<style scoped>

</style>
