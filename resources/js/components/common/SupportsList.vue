<template>
    <div>
        <back></back>
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
                ></support-item>

            </tbody>
        </table>

    </div>
</template>

<script>

    import SupportItem from '../../components/common/SupportItem';
    import Back from '../common/Back';
    import { mapActions} from 'vuex';

    export default {
        name: "SupportsList",
        components: {
            SupportItem,
            Back
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
            sortBy: function (sortKey) {
                this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
                this.sortKey = sortKey;
            },
        }
    }
</script>

<style scoped>

</style>
