<template>
    <div>

        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                <!-- Button trigger modal -->
                <button type="button" class="m-3 btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Add Support
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" ref="modal" id="exampleModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Support</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Title:</label>
                                    <input type="text" class="form-control" id="recipient-name" v-model="newSupport.title">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:</label>
                                    <textarea class="form-control" id="message-text"
                                              v-model="newSupport.message"></textarea>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" v-on:click="clearSupport">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary" v-on:click="saveSupport">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "AddSupportByClient",
        props : ['user'],
        data: function () {
            return {
                newSupport: {
                    title: '',
                    message: '',
                    user_id: ''
                }
            }
        },
        methods: {
            clearSupport(){
                this.newSupport = {};
            },
            saveSupport(){
                this.newSupport.user_id = this.user.id;
                this.$store.dispatch('support/AddClientSupport' , this.newSupport)
                .then((result)=> {
                    $('#exampleModal').modal('hide');
                    this.clearSupport();
                })
                .catch(function (response) {
                    alert('Could not add support!');
                })
            }
        }
    }
</script>

<style scoped>

</style>
