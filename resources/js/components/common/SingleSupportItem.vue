<template>
<div class="d-flex">
    <div class="col-6">
        <back></back>
        <h1>View "{{ support.support_title }}"</h1>

        <div class="form-group">
            <label>Title</label>
            <input v-if="!isEditing" type="text" :value="support.support_title" class="form-control" placeholder="Title"
                   readonly>
            <input v-if="isEditing" type="text" v-model="currentSingleSupport.title" class="form-control"
                   placeholder="Title">
        </div>

        <div class="form-group">
            <label>Message</label>
            <textarea v-if="!isEditing" :value="support.support_message" class="form-control" rows="3" readonly></textarea>
            <textarea v-if="isEditing" v-model="currentSingleSupport.message" class="form-control" rows="3"></textarea>
        </div>
        <div v-show="isAdmin" class="form-group">
            <label>Status Active</label>
            <input v-if="!isEditing" :value="support.support_status_active" class="form-control" readonly>

            <select v-if="isEditing" class="custom-select" v-model="currentSingleSupport.status">
                <option v-for="(selStatus , index) in selectStatus"
                        :key="index" v-bind:value="selStatus.nameParam">
                    {{selStatus.nameParam}}
                </option>
            </select>
        </div>

        <div v-show="isAdmin" class="form-group">
            <label>Status Viewed</label>
            <input v-if="!isEditing" :value="support.support_status_view" class="form-control" readonly>

            <select v-if="isEditing" class="custom-select" v-model="currentSingleSupport.viewed">
                <option v-for="(selView , index) in selectView"
                        :key="index" v-bind:value="selView.nameParam">
                    {{selView.nameParam}}
                </option>
            </select>

        </div>
        <a
            v-if="!isEditing"
            class="btn btn-warning" @click="editSupport()"
        >Edit Support
        </a>


        <a
            v-if="isEditing"
            class="btn btn-success" @click="update(support.id)"
        >Update Support
        </a>
        <a
            v-if="isEditing"
            class="btn btn-danger" @click="cancelEditSupport()"
        >Cancel Edit Support
        </a>


    </div>
    <div class="col-6">
        <div class="">
            <h2>Support Actions</h2>
            <a v-show="isStatusActive" class="btn btn-primary" @click="closeSupport(support.id)">Close Support</a>
            <a class="btn btn-danger" @click="deleteSupportByClient(support.id)">Delete Support</a>
        </div>
    </div>
</div>
</template>

<script>
    import Back from "./Back";
    import {mapActions , mapGetters} from "vuex";

    export default {
        name: "SingleSupportItem",
        components: {Back},
        props: ['support'],
        data: function () {
            return {
                isEditing: false,
                selectStatus: [
                    {
                        nameParam: 'active',
                    },
                    {
                        nameParam: 'closed',
                    }
                ],
                selectView: [
                    {
                        nameParam: 'viewed',
                    },
                    {
                        nameParam: 'unviewed',
                    }
                ],
                currentSingleSupport: {
                    id: this.support.id,
                    title: this.support.support_title,
                    message: this.support.support_message,
                    status: this.support.support_status_active,
                    viewed: this.support.support_status_view
                }
            }
        },
        computed: {
            ...mapGetters('support' , {
                getAuthenticatedUser : 'getAuthenticatedUser'
            }),
            isAdmin(){
                return this.getAuthenticatedUser.role === 'admin';
            },
            isStatusActive(){
                return this.support.support_status_active === 'active';
            },
        },
        methods: {
            ...mapActions('support', {
                updateSupportClient: 'updateSupportByClient'
            }),

            editSupport() {
                this.isEditing = true;
            },
            cancelEditSupport() {
                this.isEditing = false;
            },
            update(id) {
                this.updateSupportClient({
                    id: id,
                    title: this.currentSingleSupport.title,
                    message: this.currentSingleSupport.message,
                    status_activities: this.currentSingleSupport.status,
                    status_view: this.currentSingleSupport.viewed
                })
                    .then((result) => {
                        this.isEditing = false;
                    })
                    .catch(function (response) {
                        alert("Could not update support!");
                    })
            },
            closeSupport(id){
                this.$store.dispatch('support/closeSupportByClient' , id);
            },
            deleteSupportByClient(id){
                this.$store.dispatch('support/deleteSupportByClient' , id);
                this.$router.go(-1);
            },
        }
    }
</script>

<style scoped>

</style>
