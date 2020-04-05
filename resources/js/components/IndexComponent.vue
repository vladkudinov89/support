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

            <!-- Modal -->
            <!--            <div class="modal fade" ref="modal" id="exampleModal" tabindex="-1" role="dialog"-->
            <!--                 aria-labelledby="exampleModalLabel"-->
            <!--                 aria-hidden="true">-->
            <!--                <div class="modal-dialog" role="document">-->
            <!--                    <div class="modal-content">-->
            <!--                        <div class="modal-header">-->
            <!--                            <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>-->
            <!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
            <!--                                <span aria-hidden="true">&times;</span>-->
            <!--                            </button>-->
            <!--                        </div>-->
            <!--                        <div class="modal-body">-->
            <!--                            <form>-->
            <!--                                <div class="form-group">-->
            <!--                                    <label for="recipient-name" class="col-form-label">Name:</label>-->
            <!--                                    <input type="text" class="form-control" id="recipient-name" v-model="newTask.name">-->
            <!--                                </div>-->
            <!--                                <div class="form-group">-->
            <!--                                    <label for="message-text" class="col-form-label">Description:</label>-->
            <!--                                    <textarea class="form-control" id="message-text"-->
            <!--                                              v-model="newTask.description"></textarea>-->
            <!--                                </div>-->
            <!--                                <div class="field">-->
            <!--                                    <label>Select status</label>-->
            <!--                                    <select class="ui dropdown selection search_select " v-model="newTask.status">-->
            <!--                                        <option v-for="(selStatus , index) in selectStatus"-->
            <!--                                                :key="index" v-bind:value="selStatus.status">-->
            <!--                                            {{selStatus.nameParam}}-->
            <!--                                        </option>-->
            <!--                                    </select>-->
            <!--                                </div>-->
            <!--                            </form>-->
            <!--                        </div>-->
            <!--                        <div class="modal-footer">-->
            <!--                            <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="clearUser">-->
            <!--                                Close-->
            <!--                            </button>-->
            <!--                            <button type="button" class="btn btn-primary" v-on:click="saveTask">Save changes</button>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->

            <!--            <div class="card-group justify-content-between">-->
            <!--                <task-item-->
            <!--                    v-on:delete-task="deleteTask"-->
            <!--                    v-bind:status="task.status"-->
            <!--                    v-for="(task , index) in searchTaskF"-->
            <!--                    :key="task.id"-->
            <!--                    :task.sync="task"></task-item>-->
            <!--            </div>-->

            <div class="" v-for="support in supports">
                <div class="">test</div>
                <div class="">{{support.title}}</div>
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

            }
        },
        created() {
            this.$store.dispatch('task/fetchTasks');
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
