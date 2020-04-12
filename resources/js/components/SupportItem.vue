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
                <td>{{support.title}}</td>
                <td>{{support.message}}</td>
                <td>{{support.status_activities}}</td>
                <td>{{support.status_view}}</td>
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
                sortKey: 'title',
                currentSortDir: 'asc'
            }
        },
        computed: {
            supportItems() {
                return _.orderBy(this.supports, this.sortKey, this.currentSortDir );
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
